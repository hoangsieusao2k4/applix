<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\App;
use App\Models\AppUser;
use App\Models\SplashScreen;
use App\Models\User;
use App\Notifications\InviteCollaboratorNotification;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class AppController extends Controller
{
    public function index(Request $request)
    {
        $userId = $request->user()->id;
        // request('website') sẽ lấy query param để prefill
        $apps = App::with('subscriptions')
            ->where('user_id', $userId)
            ->orWhereHas('collaborators', function ($q) use ($userId) {
                $q->where('user_id', $userId);
            })
            ->paginate(5);

        return view('apps.index', compact('apps'));
    }
    //
    public function prefill(Request $request)
    {
        $data = $request->validate([
            'website' => ['required', 'url'],
        ]);

        // Chuẩn hoá: loại trailing slash
        $website = rtrim($data['website'], '/');

        // Redirect tới form create với website đã điền
        return redirect()->route('apps.create', ['website' => $website]);
    }

    public function create(Request $request)
    {
        // request('website') sẽ lấy query param để prefill
        return view('apps.create', [
            'prefillWebsite' => $request->query('website', ''),
        ]);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'website_url' => 'required|url',
            'app_name' => 'required|string|max:100',
            'app_platform' => 'required|in:android,ios',
            'config' => 'nullable|array',
        ]);

        // Bình thường nên chuẩn hoá URL


        $app = App::create([
            'user_id' => $request->user()->id,
            'name' => $data['app_name'],
            'website_url' => $data['website_url'],
            'platform' => $data['app_platform'],
            'config' => $data['config'] ?? [],
        ]);
        SplashScreen::create([
            'app_id' => $app->id,
            'show_logo' => false,
            'logo_path' => null,
            'logo_size' => 120,
            'background_color' => '#ffffff',
            'background_dark_mode' => false,
            'splash_bg_color_dark' => '#000000',
            'use_background_image' => true,
            'background_type' => '1', // static
            'background_image_path' => 'splash/bg/default_splash_bg_img.png',
            'background_gif_path' => 'splash/gif/default_splash_bg_img.gif',
            'splash_timeout' => 2000,
            'splash_status_bar_use_default' => true,
            'splash_status_bar_bg_color' => '#ffffff',
            'splash_status_bar_icon_color' => '1',
        ]);


        // (Tuỳ) push job build WebView wrapper vào queue
        // BuildAppJob::dispatch($app);

        return redirect()->route('payment.index', $app);
    }
    public function destroy(App $app, Request $request)
    {
        $this->authorize('delete', $app); // Nếu không có quyền sẽ tự trả 403
        // $this->authorize('view', $app); // hoặc policy riêng nếu bạn có 'delete'
        try {
            // Nếu bạn lưu output build dưới dạng thư mục, xoá nó
            if ($app->build_output_path) {
                // Giả sử build_output_path là đường dẫn relative trong storage/app or public
                if (Storage::exists($app->build_output_path)) {
                    Storage::deleteDirectory($app->build_output_path);
                }
            }
            // dd($app);
            // Xoá các subscription, builds liên quan nếu không có cascade DB
            $app->subscriptions()->delete();
            $app->builds()->delete();
            $app->splashScreen()?->delete();
            $app->customizations()?->delete();
            $app->advancedSettings()?->delete();

            // Nếu bạn dùng flag is_premium hoặc các liên kết khác, xử lý thêm ở đây.

            // Xoá app
            $app->delete();

            DB::commit();

            return redirect()->route('apps.index')->with('success', 'Xóa ứng dụng thành công.');
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Xoá app thất bại', [
                'app_id' => $app->id,
                'error' => $e->getMessage(),
            ]);
            return back()->with('error', 'Xóa ứng dụng thất bại, thử lại sau.');
        }
    }
    public function editAccount()
    {
        $user = auth()->user();

        return view('apps.setting', compact('user'));
    }
    public function updateAccount(Request  $request)
    {

        $user = auth()->user();

        // Validate dữ liệu
        $request->validate([
            'full_name' => 'required|string|max:255',
            'old_password' => 'nullable|string|min:3',
            'new_password' => 'nullable|string|min:3|different:old_password',
        ], [
            'full_name.required' => 'Vui lòng nhập họ tên.',
            'full_name.max' => 'Họ tên không được vượt quá 255 ký tự.',

            'old_password.min' => 'Mật khẩu cũ phải có ít nhất 8 ký tự.',

            'new_password.min' => 'Mật khẩu mới phải có ít nhất 8 ký tự.',
            'new_password.different' => 'Mật khẩu mới phải khác mật khẩu cũ.',
        ]);


        // Cập nhật tên
        $user->name = $request->input('full_name');

        // Nếu có yêu cầu đổi mật khẩu
        if ($request->filled('old_password') && $request->filled('new_password')) {
            // Kiểm tra mật khẩu cũ đúng không
            if (!Hash::check($request->old_password, $user->password)) {
                return back()->withErrors(['old_password' => 'Mật khẩu cũ không chính xác.'])->withInput();
            }

            // Cập nhật mật khẩu mới
            $user->password = Hash::make($request->new_password);
        }

        $user->save();

        return back()->with('success', 'Cập nhật tài khoản thành công.');
    }
    public function deleteAccount(Request $request)
    {
        $user = Auth::user();

        // Nếu có bảng ứng dụng liên quan, xóa luôn
        // Ví dụ: $user->apps()->delete(); (nếu dùng quan hệ hasMany)

        Auth::logout(); // Đăng xuất trước

        // Xoá người dùng
        $user->delete();

        // Xoá session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'Deleted']);
    }

    //   public function showMember()
    //     {
    //         $apps = auth()->user()->apps; // Owner apps
    //         $collaborations = AppUser::with('user', 'app')
    //             ->whereHas('app', fn($q) => $q->where('user_id', auth()->id()))
    //             ->get();

    //         return view('collaborators.index', compact('apps', 'collaborations'));
    //     }
    public function showMember()
    {
        $user = auth()->user();

        // Lấy tất cả app mà user sở hữu
        $apps = App::with('collaborators')->where('user_id', $user->id)->get();
        // dd($apps);



        // Lấy các app mà user sở hữu
        $appshow = App::where('user_id', $user->id)->get();

        return view('apps.addMember', compact('apps', 'appshow'));
    }


    public function addMember(Request $request)
    {
        $request->validate([
            'app_id' => 'required|uuid|exists:apps,id',
            'collaborator_email' => 'required|email',
            'permissions' => 'required|array|min:1',
        ]);


        $app = App::where('id', $request->app_id)->where('user_id', auth()->id())->firstOrFail();

        $user = User::firstOrCreate(
            ['email' => $request->collaborator_email],
            [
                'name' => 'Cộng Tác Viên',
                'password' => Hash::make(Str::random(12))
            ]
        );

        $wasRecentlyCreated = $user->wasRecentlyCreated;

        // Xử lý permissions: nếu có 'all', lưu ['all'] hoặc '*' theo logic bạn muốn
        $permissions = $request->permissions;
        // dd($permissions);
        if (in_array('all', $permissions)) {
            $permissions = ['all'];
        }

        // Lưu vào app_users (cast permissions là array trong model AppUser)
        AppUser::updateOrCreate(
            ['app_id' => $app->id, 'user_id' => $user->id],
            ['permissions' => $permissions]
        );

        // Gửi mail/notification:
        if ($wasRecentlyCreated) {
            // Tạo token reset password để user đặt mật khẩu
            $token = Password::broker()->createToken($user);

            // Tạo URL cho người nhận (dùng route 'password.reset' nếu có)
            // Nếu bạn có route named 'password.reset' thì dùng route(); nếu không, dùng đường dẫn tĩnh:
            $resetUrl = route('password.reset', [
                'token' => $token,
                'email' => $user->email,
            ]);

            // Gửi notification (queued)
            $user->notify(new InviteCollaboratorNotification($app, $resetUrl, true));
        }

        return redirect()->back()->with('success', 'Collaborator added successfully.');
    }

    public function destroyMember(Request $request, App $app, User $user)
    {

        // dd($user);
        // Kiểm tra user này có phải là owner không
        if ($user->id === $app->user_id) {
            return back()->with('error', 'Không thể xóa chủ sở hữu ứng dụng.');
        }

        // Xoá khỏi bảng trung gian
        $app->collaborators()->detach($user->id);

        return back()->with('success', 'Đã xóa thành viên khỏi ứng dụng.');
    }

    public function updateMember(Request $request, $member)
    {

        $request->validate([
            'permissions' => 'required|array|min:1',
            'permissions.*' => 'in:all,dashboard,notification,code-signing,build-download,app-info,splash-screen,customization,app-bar,apple-att,in-app-purchase,appsflyer,drawer-nav,bottom-nav,fab,speed-dial,custom-css-js,deeplink,google-sign-in,firebase,admob,biometric-auth,secure-app-switcher,qr-scanner,nfc-reader,meta,advanced,modules',
        ]);

        // Tìm người dùng cộng tác viên
        $collab = AppUser::where('user_id', $member)->firstOrFail();



        // Kiểm tra quyền sở hữu ứng dụng
        // if (!$collab->app || $collab->app->user_id !== auth()->id()) {
        //     abort(403, 'Unauthorized access to this collaborator.');
        // }

        // Xử lý quyền
        $permissions = $request->permissions;
        if (in_array('all', $permissions)) {
            $permissions = ['all'];
        }
        // Cập nhật chỉ quyền
        try {
            $collab->permissions = $permissions;
            $collab->save();

            return redirect()->back()->with('success', 'Permissions updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update permissions. Please try again.');
        }
    }
    // AppUserController.php
    public function leave(App $app)
    {
        $userId = auth()->id();

        // Không cho chủ app rời
        if ($app->user_id == $userId) {
            return back()->with('error', 'Chủ ứng dụng không thể rời khỏi ứng dụng.');
        }

        $app->collaborators()->detach($userId);

        return redirect()->route('apps.index')->with('success', 'Bạn đã rời khỏi ứng dụng.');
    }
}

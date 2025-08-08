<?php



namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{
    // Hiển thị form: token từ route, email có thể ở query string
    public function showResetForm(Request $request, $token = null)
    {
        $email = $request->query('email');
        return view('auth.reset-password-mail', [
            'token' => $token,
            'email' => $email,
        ]);
    }

    // Xử lý submit thay đổi mật khẩu
    public function reset(Request $request)
    {
         $request->validate([
            'token' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
        ], [
            'password.required' => 'Mật khẩu mới không được để trống.',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
            'password.min' => 'Mật khẩu phải có ít nhất :min ký tự.',
            'password_confirmation.required' => 'Vui lòng nhập lại mật khẩu.',
        ]);

        $credentials = $request->only('email', 'password', 'password_confirmation', 'token');

        $status = Password::broker()->reset($credentials, function ($user, $password) {
            // cập nhật mật khẩu, remember token, active email, etc.
            $user->forceFill([
                'password' => Hash::make($password),
            ])->setRememberToken(Str::random(60));

            if (empty($user->email_verified_at)) {
                $user->email_verified_at = now();
            }

            $user->save();

            event(new PasswordReset($user));

            // login user sau khi đổi mật khẩu (tuỳ bạn có muốn)
            Auth::login($user);
        });

        if ($status == Password::PASSWORD_RESET) {
            // Redirect tới trang mong muốn sau khi reset
            return redirect()->route('index') // hoặc route('home') / route('login')
                             ->with('success', __('Mật khẩu đã được đặt thành công.'));
        }
        // Nếu thất bại: trả lại form kèm lỗi
        return back()->withErrors(['email' => __($status)]);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AppUser;

class CheckAppPermission
{
    public function handle(Request $request, Closure $next, $permission)
    {
        $user = Auth::user();

        if (!$user) {
            abort(403, 'Bạn cần đăng nhập để truy cập');
        }

        // Lấy app từ route (Route Model Binding {app:slug})
        $app = $request->route('app');

        if (!$app) {
            abort(404, 'Ứng dụng không tồn tại');
        }

        // ✅ Chủ sở hữu thì bypass quyền
        if ($app->user_id === $user->id) {
            return $next($request);
        }

        // Lấy bản ghi trong app_users
        $appUser = AppUser::where('app_id', $app->id)
            ->where('user_id', $user->id)
            ->first();
        // dd($appUser);
        if (!$appUser) {
            abort(403, 'Bạn không phải là thành viên của ứng dụng này');
        }

        // Lấy quyền từ DB và convert thành mảng an toàn
        $permissions = $appUser->permissions ?? [];

        // Nếu là JSON string hợp lệ
        if (is_string($permissions) && str_starts_with($permissions, '[')) {
            $permissions = json_decode($permissions, true) ?? [];
        }
        // Nếu là chuỗi phân cách bằng dấu phẩy
        else if (is_string($permissions)) {
            $permissions = array_map('trim', explode(',', $permissions));
        }
        // Nếu null thì set thành mảng rỗng
        else if (!is_array($permissions)) {
            $permissions = [];
        }

        // ✅ Nếu có quyền "all" → cho truy cập
        if (in_array('all', $permissions)) {
            return $next($request);
        }
        //   dd($permission,$permissions);
        // ✅ Nếu không có quyền yêu cầu → cấm
        if (!in_array($permission, $permissions, true)) {
            // Không có quyền
            abort(403, 'Bạn không có quyền');
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ForgotPasswordController extends Controller
{
    //
    public function showFormEmail()
    {
        return view('auth.email');
    }

    // Gửi mã OTP
    public function sendEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Định dạng email không hợp lệ.',
            'email.exists' => 'Email không tồn tại trong hệ thống.',
        ]);

        $otp = rand(100000, 999999);
        DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            [
                'otp' => $otp,



                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // Gửi mail
        Mail::raw("Mã OTP của bạn là: $otp ", function ($message) use ($request) {
            $message->to($request->email)
                ->subject('Mã OTP khôi phục mật khẩu');
        });

        return redirect()->route('password.otp.form')->with('email', $request->email);
    }

    // Hiển thị form nhập OTP + mật khẩu mới
    public function showOtpForm(Request $request)
    {
        $email = session('email'); // Hoặc từ query nếu cần


        return view('auth.otp', compact('email'));
    }
    public function checkOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'otp' => 'required|digits:6',
        ], [
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Định dạng email không hợp lệ.',
            'email.exists' => 'Email không tồn tại.',
            'otp.required' => 'Mã OTP không được để trống.',
            'otp.digits' => 'Mã OTP phải là 6 chữ số.',
        ]);

        $record = DB::table('password_resets')
            ->where('email', $request->email)
            ->where('otp', $request->otp)
            ->first();

        if (!$record) {
            return back()->withErrors(['otp' => 'Mã OTP không chính xác'])->withInput();
        }

        // Kiểm tra thời gian OTP còn hiệu lực (VD: 10 phút)


        // Cập nhật mật khẩu
        // User::where('email', $request->email)->update([
        //     'password' => Hash::make($request->password),
        // ]);

        // // Xóa OTP sau khi sử dụng
        // DB::table('password_resets_otp')->where('email', $request->email)->delete();
        session([
            'reset_email' => $request->email,
            'reset_otp' => $request->otp,
        ]);

        return redirect()->route('showReset');
    }

    public function showReset()
    {


        return view('auth.reset');
    }
    // Đặt lại mật khẩu
    public function resetPassword(Request $request)
    {
        $email = session('reset_email');
        $otp = session('reset_otp');
        $request->merge([
            'password' => trim($request->password),
            'password_confirmation' => trim($request->password_confirmation),
        ]);

        $request->validate([
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
        ], [
            'password.required' => 'Mật khẩu mới không được để trống.',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
            'password.min' => 'Mật khẩu phải có ít nhất :min ký tự.',
            'password_confirmation.required' => 'Vui lòng nhập lại mật khẩu.',
        ]);



        User::where('email', $email)->update([
            'password' => Hash::make($request->password),
        ]);

        DB::table('password_resets')
            ->where('email', $email)
            ->where('otp', $otp)
            ->delete();

        // Xóa session
        session()->forget(['reset_email', 'reset_otp']);

        return redirect()->route('FormLogin')->with('success', 'Đổi mật khẩu thành công!');
    }
}

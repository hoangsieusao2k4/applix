@extends('auth.layout.master')
@section('content')
    <div class="right_side">
        <div class="login_form">
            <div class="appilix_logo">
                <a href="https://appilix.com"><img src="{{ asset('assets/ZPN6J0PBUbHl.com/styles/images/logo.svg') }}"
                        alt="Appilix"></a>
            </div>
            <h2>Đổi mật khẩu</h2>

            <form method="post" action="{{ route('check-reset') }}">
                @csrf
                <label>Mật khẩu mới</label>
                <input type="password" placeholder="Enter your password" name="password" >
                @error('password')
                    <div class="error-text">{{ $message }}</div>
                @enderror

                <label>Xác nhận mật khẩu</label>
                <input type="password" placeholder="Enter your xác nhận mật khẩu" name="password_confirmation" >
                           @error('password_confirmation')
                    <div class="error-text">{{ $message }}</div>
                @enderror
                <input class="sign_in_btn" type="submit" value="Đổi mật khẩu" name="submit">
                <a class="with_google_btn" href="{{ route('google.redirect') }}">Sign in with Google</a>
                <span class="option_to_new_account">Don’t have an account?<a class="sign_up"
                        href="{{ route('FormRegister') }}">Sign up</a></span>
            </form>
        </div>
    </div>
@endsection

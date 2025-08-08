@extends('auth.layout.master')
@section('content')
    <div class="right_side">


        <div class="login_form">
            <div class="appilix_logo">
                <a href="https://appilix.com"><img src="{{ asset('assets/ZPN6J0PBUbHl.com/styles/images/logo.svg') }}"
                        alt="Appilix"></a>
            </div>
            <h2>Đăng nhập</h2>

            <form method="post" action="{{ route('login') }}">
                @csrf
                <label>Email</label>
                <input type="email" placeholder="Enter your email" name="email">
               @error('email')
        <div class="error-text">{{ $message }}</div>
    @enderror
                <label>Password</label>
                <input type="password" placeholder="Enter your password" name="password">
                @error('password')
        <div class="error-text">{{ $message }}</div>
    @enderror
                <a class="forgot_pass" href="{{ route('password.email') }}">Forgot password?</a>
                <input class="sign_in_btn" type="submit" value="Sign in" name="submit">
                <a class="with_google_btn" href="{{ route('google.redirect') }}">Sign in with Google</a>
                <span class="option_to_new_account">Don’t have an account?<a class="sign_up"
                        href="{{ route('FormRegister') }}">Sign up</a></span>
            </form>
        </div>
    </div>
@endsection

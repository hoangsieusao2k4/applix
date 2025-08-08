@extends('auth.layout.master')
@section('content')
    <div class="right_side">
        <div class="login_form">
            <div class="appilix_logo">
                <a href="https://appilix.com"><img src="{{ asset('assets/ZPN6J0PBUbHl.com/styles/images/logo.svg') }}"
                        alt="Appilix"></a>
            </div>
            <h2>Xác thực otp</h2>

            <form method="post" action="{{ route('check.otp') }}">
                @csrf
                   <input type="hidden" name="email" value="{{ old('email', $email) }}">
                <label>OTP</label>
                <input type="text" placeholder="Enter your email" name="otp" >
                @error('otp')
                    <div style="color:red;">{{ $message }}</div>
                @enderror

                <input class="sign_in_btn" type="submit" value="Xác thực" name="submit">
                <a class="with_google_btn" href="{{ route('google.redirect') }}">Sign in with Google</a>
                <span class="option_to_new_account">Don’t have an account?<a class="sign_up"
                        href="{{ route('FormRegister') }}">Sign up</a></span>
            </form>
        </div>
    </div>
@endsection

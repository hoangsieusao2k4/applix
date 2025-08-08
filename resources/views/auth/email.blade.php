@extends('auth.layout.master')
@section('content')
  <div class="right_side">
        <div class="login_form">
            <div class="appilix_logo">
                <a href="https://appilix.com"><img src="{{asset('assets/ZPN6J0PBUbHl.com/styles/images/logo.svg')}}" alt="Appilix"></a>
            </div>
            <h2>Forgot password</h2>

                        <form method="post" action="{{route('password.check-email')}}">
                            @csrf
                <label>Email</label>
                <input type="email" placeholder="Enter your email" name="email" >
                    @error('email')
        <div class="error-text">{{ $message }}</div>
    @enderror

                <input class="sign_in_btn" type="submit" value="SendMail" name="submit">
                <a class="with_google_btn" href="{{route('google.redirect')}}">Sign in with Google</a>
                <span class="option_to_new_account">Don’t have an account?<a class="sign_up" href="{{route('FormRegister')}}">Sign up</a></span>
            </form>
        </div>
    </div>

@endsection

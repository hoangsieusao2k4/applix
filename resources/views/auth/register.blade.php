@extends('auth.layout.master')
@section('content')
    <div class="right_side">
        <div class="login_form">
            <div class="appilix_logo">
                <a href="https://appilix.com"><img src="{{ asset('assets/ZPN6J0PBUbHl.com/styles/images/logo.svg') }}"
                        alt="Appilix"></a>
            </div>
            <h2>Đăng kí</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <label>Tên đăng nhập</label>
                <input type="text" placeholder="Enter your username" name="name">
                @error('name')
                    <div class="error-text">{{ $message }}</div>
                @enderror
                <label>Email</label>
                <input type="email" placeholder="Enter your email" name="email">
                 @error('email')
                    <div class="error-text">{{ $message }}</div>
                @enderror
                <label>Mật khẩu</label>
                <input type="password" placeholder="Enter your password" name="password">
                    @error('password')
                    <div class="error-text">{{ $message }}</div>
                @enderror


                <button class="sign_in_btn">Sign up</button>

            </form>
        </div>
    </div>
@endsection

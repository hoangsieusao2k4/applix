<nav class="appilix_nav_bar">
    <div class="appilix_container">
        <div class="nav_bar_elements">
            <div class="nav_bar_container">
                <a href="{{ route('index') }}" class="appilix_logo">
                    <img src="{{ asset('assets/ZPN6J0PBUbHl.com/styles/images/logo.svg') }}" alt="Appilix">
                </a>
                <div class="action_menu"></div>
            </div>
            <div class="nav_bar_menu">
                <ul class="menu_items">
                    <li><a class="active" href="{{ route('index') }}">Trang chủ</a></li>
                    <li><a class="" href="{{ route('dactrung') }}">Đặc trưng</a></li>
                    <li><a class="" href="{{ route('giaca') }}">Giá cả</a></li>
                    <li><a class="" href="{{ route('cauhoi') }}">Câu hỏi</a></li>
                    <li><a class="" href="{{ route('tinmoi') }}">Có gì mới</a></li>
                </ul>
            </div>
            <div class="nav_bar_btns">
                <a href="{{ route('contact.form') }}" class="login">Liên hệ</a>
                @auth
                    {{-- Nếu đã đăng nhập --}}
                    <a href="{{ route('apps.create') }}" class="account">Tài khoản</a>
                @else
                    {{-- Nếu chưa đăng nhập --}}
                    <a href="{{ route('FormLogin') }}" class="account">Tài khoản</a>
                @endauth

            </div>
        </div>
    </div>
</nav>

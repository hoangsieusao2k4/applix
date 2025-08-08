<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon192x192.png" sizes="192x192">

    <title>Màn Hình Khởi Động - kakakakak</title>
    <meta name='description' content="" />
    <link rel="canonical" href="https://appilix.com" />
    <meta property="og:locale" content="vi_VN" />
    <meta property='og:type' content="website" />
    <meta property='og:title' content="Màn Hình Khởi Động - kakakakak" />
    <meta property='og:description' content="" />
    <meta property="og:url" content="https://appilix.com" />
    <meta property="og:site_name" content="Appilix" />
    <meta property="og:image" content="https://appilix.com/styles/images/cover.png" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Màn Hình Khởi Động - kakakakak" />
    <meta name="twitter:description" content="" />
    <meta name="twitter:image" content="https://appilix.com/styles/images/cover.png" />

    <link rel="stylesheet" href="https://appilix.com/styles/css/croppie.css?v=3.4.8" type="text/css" media="all" />
    <link rel="stylesheet" href="https://appilix.com/styles/css/dashboard.css?v=3.4.8" type="text/css" media="all" />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>

    @include('dashboard.sidebar')

    <div class="appilix_main">
        <div class="appilix_body">
            @include('dashboard.hearder')
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <div class="appilix_img_cropper">
                <div class="appilix_img_cropper_card">
                    <div class="appilix_img_cropper_header">
                        <div class="close_icon"></div>
                    </div>
                    <div class="appilix_img_cropper_body">
                        <div class="cropper_area"></div>
                        <button>Cắt & Chọn</button>
                    </div>
                </div>
            </div>

            <div class="appilix_splash_screen_area">

                <div class="appilix_splash_screen_card">
                    <div class="form_part">
                        <div class="card_header">
                            <div class="header_logo"></div>
                            <div class="header_details">
                                <h2>Màn Hình Khởi Động</h2>
                                <p>Cài đặt tùy chỉnh màn hình khởi động</p>
                            </div>
                        </div>
                        <div class="card_header_separator"></div>
                        <form method="post" action="{{ route('app.settings.update.screen', $app) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form_element">
                                <label>Hiển Thị Logo Màn Hình Khởi Động?</label>
                                <select name="enable_splash_logo" onchange="splash_screen_update()">
                                    <option value="1"
                                        {{ old('enable_splash_logo', $splash->show_logo ?? 1) == 1 ? 'selected' : '' }}>
                                        Có</option>
                                    <option value="0"
                                        {{ old('enable_splash_logo', $splash->show_logo ?? 1) == 0 ? 'selected' : '' }}>
                                        Không</option>
                                </select>
                            </div>
                            <div class="form_element"
                                style="{{ old('enable_splash_logo', $splash->show_logo ?? 1) == 0 ? 'display: none;' : '' }}">
                                <label>Logo Màn Hình Khởi Động</label>
                                <div class="file_picker">
                                    <input type="hidden" name="splash_logo" onchange="splash_screen_update()">
                                    <input type="file" accept=".jpg,.jpeg,.png"
                                        onchange="init_image_cropper(this, `logo`)">
                                    <div>Chỉ Cho Phép Hình Ảnh JPG hoặc PNG</div>
                                    <div class="preview">
                                        @if ($app->splashScreen && $app->splashScreen->logo_path)
                                            <img src="{{ Storage::url($app->splashScreen->logo_path) }}">
                                        @else
                                            <img
                                                src="https://appilix.com/uploads/app-splash-logo-6891ba266f603-1754380838.png">
                                        @endif

                                    </div>
                                    <span>Chọn Logo</span>
                                </div>
                            </div>
                            <div class="form_element">
                                <label>Chiều Rộng & Chiều Cao Logo (pixel)</label>
                                <input type="number" name="splash_logo_width"
                                    value="{{ old('splash_logo_width', $splash->logo_size ?? 100) }}">
                                <p>Nhập kích thước (tính bằng pixel) của Logo ứng dụng trên màn hình khởi động. Kích
                                    thước này sẽ được sử dụng cho cả chiều rộng và chiều cao.</p>
                            </div>
                            <div class="form_element">
                                <label>Màu Nền</label>
                                <div class="color_picker">
                                    <input type="color"
                                        value="{{ old('splash_bg_color', $splash->background_color ?? '#ffffff') }}"
                                        onchange="color_field_value_setter(this, `splash`)">
                                    <input type="text" name="splash_bg_color"
                                        value="{{ old('splash_bg_color', $splash->background_color ?? '#ffffff') }}"
                                        onchange="color_field_value_setter(this, `splash`)">
                                    <div class="preview">
                                        <div class="color"
                                            style="background: {{ $splash->background_color ?? '#ffffff' }}"></div>
                                    </div>
                                    <span>Chọn Màu</span>
                                </div>
                            </div>

                            <div class="form_element">
                                <label>Thay Đổi Màu Trong Chế Độ Tối?</label>
                                <select name="splash_change_in_dark_mode" onchange="splash_screen_update()">
                                    <option value="1"
                                        {{ old('splash_change_in_dark_mode', $splash->background_dark_mode ?? 1) == 1 ? 'selected' : '' }}>
                                        Có</option>
                                    <option value="0"
                                        {{ old('splash_change_in_dark_mode', $splash->background_dark_mode ?? 1) == 0 ? 'selected' : '' }}>
                                        Không</option>
                                </select>
                            </div>
                            @php
                                $darkColor = old(
                                    'splash_change_in_dark_mode',
                                    $splash->splash_bg_color_dark ?? '#000000',
                                );
                            @endphp

                            <div class="form_element"
                                style="{{ old('splash_change_in_dark_mode', $splash->background_dark_mode ?? 1) == 0 ? 'display: none;' : '' }}">
                                <label>Màu Nền Trong Chế Độ Tối</label>
                                <div class="color_picker">
                                    <input type="color" value="{{ $darkColor }}"
                                        onchange="color_field_value_setter(this, `splash`)">
                                    <input type="text" name="splash_bg_color_dark" value="{{ $darkColor }}"
                                        onchange="color_field_value_setter(this, `splash`)">
                                    <div class="preview">
                                        <div class="color" style="background: {{ $darkColor }}"></div>
                                    </div>
                                    <span>Chọn Màu</span>
                                </div>
                            </div>

                            <div class="form_element">
                                <label>Sử Dụng Hình Nền?</label>
                                <select name="enable_splash_bg_img" onchange="splash_screen_update()">
                                    <option value="1"
                                        {{ $splash->use_background_image == 1 ? 'selected' : '' }}>
                                        Có</option>
                                    <option value="0"
                                        {{ $splash->use_background_image == 0 ? 'selected' : '' }}>
                                        Không</option>
                                </select>
                            </div>

                            <div class="form_element"
                                style="{{ $splash->use_background_image == 0 ? 'display: none;' : '' }}">
                                <label>Loại Hình Nền</label>
                                <select name="splash_bg_img_type" onchange="splash_screen_update()">
                                    <option value="1" {{ $splash->background_type === '1' ? 'selected' : '' }}>
                                        Hình Ảnh Tĩnh
                                    </option>
                                    <option value="2"{{ $splash->background_type === '2' ? 'selected' : '' }}>
                                        Hình Ảnh Động (GIF)
                                    </option>
                                </select>
                            </div>


                            <div class="form_element"
                                style="{{ $splash->use_background_image && $splash->background_type == '1' ? '' : 'display: none;' }}">
                                <label>Hình Nền</label>
                                <div class="file_picker">
                                    <input type="hidden" name="splash_bg_img" onchange="splash_screen_update()">
                                    <input type="file" accept=".jpg,.jpeg,.png" name="splash_bg_img_file"
                                        onchange="init_image_cropper(this, `splash_bg`)">
                                    <div>Kích Thước Hình Ảnh Tốt Nhất là 1080px X 1920px</div>
                                    <div class="preview">
                                        @if ($app->splashScreen && $app->splashScreen->background_image_path)
                                            <img src="{{ Storage::url($app->splashScreen->background_image_path) }}">
                                        @endif
                                    </div>
                                    <span>Chọn Hình Ảnh</span>
                                </div>
                            </div>
                            <div class="form_element"
                                style="{{ $splash->use_background_image && $splash->background_type == '2' ? '' : 'display: none;' }}">
                                <label>Hình Ảnh Động Nền (GIF)</label>
                                <div class="file_picker">
                                    <input type="hidden" name="splash_bg_gif_img" onchange="splash_screen_update()">
                                    <input type="file" accept=".gif" name="splash_bg_gif_img_file"
                                        onchange="init_image_cropper(this, `splash_bg_gif`)">
                                    <div>Kích Thước Hình GIF Tốt Nhất là 1080px X 1920px</div>
                                    <div class="preview">

                                        @if ($app->splashScreen && $app->splashScreen->background_gif_path)
                                            <img src="{{ Storage::url($app->splashScreen->background_gif_path) }}">
                                        @endif
                                    </div>
                                    <span>Chọn Hình Ảnh</span>
                                </div>
                            </div>
                            <div class="form_element">
                                <label>Thời Gian Chờ Màn Hình Khởi Động</label>
                                @if ($splash)
                                    <select name="splash_timeout">
                                        <option value="1000"
                                            {{ $splash->splash_timeout == 1000 ? 'selected' : '' }}>1 Giây</option>
                                        <option value="2000"
                                            {{ $splash->splash_timeout == 2000 ? 'selected' : '' }}>2 Giây</option>
                                        <option value="3000"
                                            {{ $splash->splash_timeout == 3000 ? 'selected' : '' }}>3 Giây</option>
                                        <option value="4000"
                                            {{ $splash->splash_timeout == 4000 ? 'selected' : '' }}>4 Giây</option>
                                        <option value="5000"
                                            {{ $splash->splash_timeout == 5000 ? 'selected' : '' }}>5 Giây</option>
                                    </select>
                                @else
                                    <select name="splash_timeout">
                                        <option value="1000" selected>1 Giây</option>
                                        <option value="2000">2 Giây</option>
                                        <option value="3000">3 Giây</option>
                                        <option value="4000">4 Giây</option>
                                        <option value="5000">5 Giây</option>
                                    </select>
                                @endif

                            </div>

                            <div class="form_element">
                                <label>Sử Dụng Thiết Kế Thanh Trạng Thái Mặc Định?</label>
                                <input type="hidden" name="default_status_bar_bg_color" value="#ffffff">
                                <input type="hidden" name="default_status_bar_icon_color" value="1">
                                <select name="splash_status_bar_use_default" onchange="splash_screen_update()">
                                    <option value="1"
                                        {{ old('splash_status_bar_use_default', $splash->splash_status_bar_use_default ?? 1) == 1 ? 'selected' : '' }}>
                                        Có</option>
                                    <option value="0"
                                        {{ old('splash_status_bar_use_default', $splash->splash_status_bar_use_default ?? 1) == 0 ? 'selected' : '' }}>
                                        Không
                                    </option>
                                </select>
                            </div>

                            <div class="form_element"
                                style="{{ old('enable_splash_logo', $splash->splash_status_bar_use_default ?? 1) == 1 ? 'display: none;' : '' }}">
                                <label>Màu Nền Thanh Trạng Thái</label>
                                <div class="color_picker">
                                    <input type="color" value="{{ $splash->splash_status_bar_bg_color ?? '#ffffff' }}"
                                        onchange="color_field_value_setter(this, `splash`)">
                                    <input type="text" name="splash_status_bar_bg_color"
                                        value="{{ $splash->splash_status_bar_bg_color ?? '' }}"
                                        onchange="color_field_value_setter(this, `splash`)">
                                    <div class="preview">
                                        <div class="color"
                                            style="background: {{ $splash->splash_status_bar_bg_color ?? '#ffffff' }}"></div>
                                    </div>
                                    <span>Chọn Màu</span>
                                </div>
                            </div>

                            <div class="form_element"
                                style="{{ old('enable_splash_logo', $splash->splash_status_bar_use_default ?? 1) == 1 ? 'display: none;' : '' }}">
                                <label>Màu Biểu Tượng Thanh Trạng Thái</label>
                                <select name="splash_status_bar_icon_color" onchange="splash_screen_update()">
                                    <option value="1"
                                        {{ $splash->splash_status_bar_icon_color == 1 ? 'selected' : '' }}>Tối</option>
                                    <option value="2"
                                        {{ $splash->splash_status_bar_icon_color == 2 ? 'selected' : '' }}>Sáng
                                    </option>
                                </select>

                            </div>

                            <div class="form_element">
                                <button type="submit" name="submit">Lưu Thay Đổi</button>
                            </div>
                        </form>
                    </div>
                    <div class="preview_part">
                        <div class="phone_frame">
                            <div class="container">

                                @if ($splash->splash_status_bar_icon_color == 1)
                                    <div class="status_bar"
                                        style="background-color: {{ $splash->splash_status_bar_bg_color ?? '#ffffff' }}">
                                    @else
                                        <div class="status_bar light_icon"
                                            style="background-color: {{ $splash->splash_status_bar_bg_color ?? '#ffffff' }}">
                                @endif
                                <span class="clock">12:00 PM</span>
                                <span class="network"></span>
                                <span class="charge"></span>
                            </div>


                            <div class="bg"
                                style="background-color: {{ $splash->background_color ?? '#ffffff' }}">
                                @if ($splash->background_type === '2')
                                    <img class="bg_img"
                                        style="{{ !$splash->use_background_image ? 'display: none;' : '' }}"
                                        src="{{ Storage::url($splash->background_gif_path) }}">
                                @else
                                    <img class="bg_img"
                                        style="{{ !$splash->use_background_image ? 'display: none;' : '' }}"
                                        src="{{ Storage::url($splash->background_image_path) }}">
                                @endif
                                <img class="logo" style="{{ $splash->show_logo ? '' : 'display: none;' }}"
                                    src="{{ Storage::url($splash->logo_path) }}">


                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    </div>

    <!-- Script to run only in IOS App -->

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-RPM1G6T3JH"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-RPM1G6T3JH');
    </script>

    <script type="text/javascript" src="https://appilix.com/styles/js/jquery.js?v=3.4.8"></script>
    <script type="text/javascript" src="https://appilix.com/styles/js/croppie.js?v=3.4.8"></script>
    <script type="text/javascript" src="https://appilix.com/styles/js/dashboard.js?v=3.4.8"></script>
    <style>
        .appilix_splash_screen_card .preview_part .phone_frame .bg {
            background: #ffffff;
        }

        .appilix_splash_screen_card .preview_part .phone_frame .status_bar {
            background: #ffffff;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function() {

        });
    </script>
</body>

</html>

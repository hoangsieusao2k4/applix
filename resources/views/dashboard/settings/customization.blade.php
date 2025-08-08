<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon192x192.png" sizes="192x192">

    <title>Tùy chỉnh kiểu dáng - canifa</title>
    <meta name='description' content="" />
    <link rel="canonical" href="https://appilix.com" />
    <meta property="og:locale" content="en_US" />
    <meta property='og:type' content="website" />
    <meta property='og:title' content="Tùy chỉnh kiểu dáng - canifa" />
    <meta property='og:description' content="" />
    <meta property="og:url" content="https://appilix.com" />
    <meta property="og:site_name" content="Appilix" />
    <meta property="og:image" content="https://appilix.com/styles/images/cover.png" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Tùy chỉnh kiểu dáng - canifa" />
    <meta name="twitter:description" content="" />
    <meta name="twitter:image" content="https://appilix.com/styles/images/cover.png" />

    <link rel="stylesheet" href="https://appilix.com/styles/css/croppie.css?v=3.4.8" type="text/css" media="all" />
    <link rel="stylesheet" href="https://appilix.com/styles/css/dashboard.css?v=3.4.8" type="text/css" media="all" />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<style>
    .appilix_customization_card .preview_part .phone_frame .circle_loader_screen .loader {
    width: 38px;
    height: 38px;
    background: #633AE5;
    mask: url("{{ asset('assets/ZPN6J0PBUbHl.com/styles/images/customization_preview_circle_loader.svg') }}") no-repeat center;
}
</style>

<body>
    @include('dashboard.sidebar')

    <div class="appilix_main">
        <div class="appilix_body">
            @include('dashboard.hearder')
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

            <div class="appilix_customization_area">
                <div class="appilix_customization_card">
                    <div class="form_part">
                        <div class="card_header">
                            <div class="header_logo"></div>
                            <div class="header_details">
                                <h2>Tùy chỉnh kiểu dáng</h2>
                                <p>Cấu hình các kiểu dáng khác nhau của ứng dụng</p>
                            </div>
                        </div>
                        <div class="card_header_separator"></div>
                        <form method="post" action="{{ route('customization.update', $app->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form_element">
                                <label>Màu nền thanh trạng thái</label>
                                <div class="color_picker">
                                    <input type="color" value="{{ $settings['status_bar_bg_color'] ?? '#ffffff' }}"
                                        onchange="color_field_value_setter(this, `customization_normal_update`)">
                                    <input type="text" name="status_bar_bg_color"
                                        value="{{ $settings['status_bar_bg_color'] ?? '#ffffff' }}"
                                        onchange="color_field_value_setter(this, `customization_normal_update`)">
                                    <div class="preview">
                                        <div class="color"
                                            style="background: {{ $settings['status_bar_bg_color'] ?? '#ffffff' }};">
                                        </div>
                                    </div>
                                    <span>Chọn màu</span>
                                </div>
                            </div>

                            <div class="form_element">
                                <label>Màu biểu tượng thanh trạng thái</label>
                                <select name="status_bar_icon_color" onchange="customization_screen_update()">
                                    <option value="1"
                                        {{ ($settings['status_bar_icon_color'] ?? '1') == '1' ? 'selected' : '' }}>
                                        Tối</option>
                                    <option value="2"
                                        {{ ($settings['status_bar_icon_color'] ?? '1') == '2' ? 'selected' : '' }}>
                                        Sáng</option>
                                </select>
                            </div>

                            <div class="form_element">
                                <label>Thay đổi màu của thanh trạng thái ở chế độ tối?</label>
                                <select name="status_bar_change_in_dark_mode" onchange="customization_screen_update()">
                                    <option value="1"
                                        {{ ($settings['status_bar_change_in_dark_mode'] ?? '0') == '1' ? 'selected' : '' }}>
                                        Có</option>
                                    <option value="0"
                                        {{ ($settings['status_bar_change_in_dark_mode'] ?? '0') == '0' ? 'selected' : '' }}>
                                        Không</option>
                                </select>
                            </div>

                            <div class="form_element"
                                style="display: {{ ($settings['status_bar_change_in_dark_mode'] ?? '0') == '1' ? 'block' : 'none' }}">
                                <label>Màu nền thanh trạng thái ở chế độ tối</label>
                                <div class="color_picker">
                                    <input type="color"
                                        value="{{ $settings['status_bar_bg_color_dark'] ?? '#000000' }}"
                                        onchange="color_field_value_setter(this, `customization_normal_update`)">
                                    <input type="text" name="status_bar_bg_color_dark"
                                        value="{{ $settings['status_bar_bg_color_dark'] ?? '#000000' }}"
                                        onchange="color_field_value_setter(this, `customization_normal_update`)">
                                    <div class="preview">
                                        <div class="color"
                                            style="background: {{ $settings['status_bar_bg_color_dark'] ?? '#000000' }};">
                                        </div>
                                    </div>
                                    <span>Chọn màu</span>
                                </div>
                            </div>

                            <div class="form_element"
                                style="display: {{ ($settings['status_bar_change_in_dark_mode'] ?? '0') == '1' ? 'block' : 'none' }}">
                                <label>Màu biểu tượng thanh trạng thái ở chế độ tối</label>
                                <select name="status_bar_icon_color_dark" onchange="customization_screen_update()">
                                    <option value="1"
                                        {{ ($settings['status_bar_icon_color_dark'] ?? '2') == '1' ? 'selected' : '' }}>
                                        Tối</option>
                                    <option value="2"
                                        {{ ($settings['status_bar_icon_color_dark'] ?? '2') == '2' ? 'selected' : '' }}>
                                        Sáng</option>
                                </select>
                            </div>

                            <div class="form_element">
                                <label>Hướng ứng dụng</label>
                                <select name="app_orientation">
                                    <option value="1"
                                        {{ ($settings['app_orientation'] ?? '1') == '1' ? 'selected' : '' }}>
                                        Ngang & Dọc</option>
                                    <option value="2"
                                        {{ ($settings['app_orientation'] ?? '1') == '2' ? 'selected' : '' }}>
                                        Chỉ Dọc</option>
                                    <option value="3"
                                        {{ ($settings['app_orientation'] ?? '1') == '3' ? 'selected' : '' }}>
                                        Chỉ Ngang Trái</option>
                                    <option value="4"
                                        {{ ($settings['app_orientation'] ?? '1') == '4' ? 'selected' : '' }}>
                                        Chỉ Ngang Phải</option>
                                </select>
                            </div>

                            <div class="form_element">
                                <label>Ứng dụng toàn màn hình</label>
                                <select name="enable_fullscreen" onchange="customization_screen_update()">
                                    <option value="1"
                                        {{ ($settings['enable_fullscreen'] ?? '0') == '1' ? 'selected' : '' }}>
                                        Có</option>
                                    <option value="0"
                                        {{ ($settings['enable_fullscreen'] ?? '0') == '0' ? 'selected' : '' }}>
                                        Không</option>
                                </select>
                            </div>

                            <div class="form_element">
                                <label>Màu nền ứng dụng</label>
                                <div class="color_picker">
                                    <input type="color"
                                        value="{{ $settings['home_screen_bg_color'] ?? '#ffffff' }}"
                                        onchange="color_field_value_setter(this, `customization_circle_loader`)">
                                    <input type="text" name="home_screen_bg_color"
                                        value="{{ $settings['home_screen_bg_color'] ?? '#ffffff' }}"
                                        onchange="color_field_value_setter(this, `customization_circle_loader`)">
                                    <div class="preview">
                                        <div class="color"
                                            style="background: {{ $settings['home_screen_bg_color'] ?? '#ffffff' }};">
                                        </div>
                                    </div>
                                    <span>Chọn màu</span>
                                </div>
                            </div>

                            <div class="form_element">
                                <label>Xuất hiện của Circle Loader</label>
                                <select name="circle_loader_appearance"
                                    onchange="color_field_value_setter(this, `customization_circle_loader`)">
                                    <option value="1"
                                        {{ ($settings['circle_loader_appearance'] ?? '1') == '1' ? 'selected' : '' }}>
                                        Hiện luôn khi tải trang</option>
                                    <option value="2"
                                        {{ ($settings['circle_loader_appearance'] ?? '1') == '2' ? 'selected' : '' }}>
                                        Chỉ hiện khi tải trang đầu tiên</option>
                                </select>
                            </div>

                            <div class="form_element" style="">
                                <label>Ẩn Circle Loader trên các URL cụ thể</label>
                                <textarea rows="8" maxlength="2000" name="circle_loader_hide_on_urls"
                                    placeholder="Circle loader sẽ hiển thị trên tất cả URL theo mặc định. Để không cho hiển thị circle loader trên các URL cụ thể, chỉ cần đặt tên miền hoặc URL đầy đủ hoặc một phần của URL trên mỗi dòng. Ví dụ:&#10;&#10;example1.com&#10;example2.com&#10;example3.com/specific-path">{{ $settings['circle_loader_hide_on_urls'] ?? '' }}</textarea>
                                <p>Nhập mỗi URL hoặc tên miền hoặc một phần của URL trên mỗi dòng. Circle loader sẽ
                                    không hiển thị khi tải các URL chứa các văn bản này.</p>
                            </div>

                            <div class="form_element">
                                <label>Kiểu Circle Loader</label>
                                <select name="circle_loader_style"
                                    onchange="color_field_value_setter(this, `customization_circle_loader`)">
                                    <option value="1"
                                        {{ ($settings['circle_loader_style'] ?? '1') == '1' ? 'selected' : '' }}>
                                        Kiểu mặc định</option>
                                    <option value="2"
                                        {{ ($settings['circle_loader_style'] ?? '1') == '2' ? 'selected' : '' }}>
                                        Hoạt hình GIF tùy chỉnh</option>
                                </select>
                            </div>

                            <div class="form_element"
                                style="display: {{ ($settings['circle_loader_style'] ?? '1') == '2' ? 'block' : 'none' }}">
                                <label>Hình ảnh Circle Loader hoạt hình (GIF)</label>
                                <div class="file_picker">
                                    <input type="hidden" name="circle_loader_gif_img"
                                        value="{{ $settings['circle_loader_gif_img'] ?? '' }}"
                                        onchange="color_field_value_setter(this, `customization_circle_loader`)">
                                    <input type="file" accept=".gif"
                                        onchange="init_image_cropper(this, `circle_loader_gif`)" name="circle_loader_gif_img_file">
                                    <div>Kích thước hình GIF tốt nhất là 1080px X 1920px</div>
                                    <div class="preview">
                                        <img
                                            src="{{Storage::url( $settings['circle_loader_gif_img_file']) ?? 'https://appilix.com/styles/images/account/default_circle_loader_img.gif' }}">
                                    </div>
                                    <span>Chọn hình ảnh</span>
                                </div>
                            </div>

                            <div class="form_element">
                                <label>Màu Circle Loader</label>
                                <div class="color_picker">
                                    <input type="color" value="{{ $settings['circle_loader_color'] ?? '#633AE5' }}"
                                        onchange="color_field_value_setter(this, `customization_circle_loader`)">
                                    <input type="text" name="circle_loader_color"
                                        value="{{ $settings['circle_loader_color'] ?? '#633AE5' }}"
                                        onchange="color_field_value_setter(this, `customization_circle_loader`)">
                                    <div class="preview">
                                        <div class="color"
                                            style="background: {{ $settings['circle_loader_color'] ?? '#633AE5' }};">
                                        </div>
                                    </div>
                                    <span>Chọn màu</span>
                                </div>
                            </div>

                            <div class="form_element">
                                <label>Nền Circle Loader</label>
                                <div class="color_picker">
                                    <input type="color"
                                        value="{{ $settings['circle_loader_bg_color'] ?? '#ffffff' }}"
                                        onchange="color_field_value_setter(this, `customization_circle_loader`)">
                                    <input type="text" name="circle_loader_bg_color"
                                        value="{{ $settings['circle_loader_bg_color'] ?? '#ffffff' }}"
                                        onchange="color_field_value_setter(this, `customization_circle_loader`)">
                                    <div class="preview">
                                        <div class="color"
                                            style="background: {{ $settings['circle_loader_bg_color'] ?? '#ffffff' }};">
                                        </div>
                                    </div>
                                    <span>Chọn màu</span>
                                </div>
                            </div>

                            <div class="form_element">
                                <label>Thay đổi màu của Circle Loader ở chế độ tối?</label>
                                <select name="circle_loader_change_in_dark_mode"
                                    onchange="customization_screen_update()">
                                    <option value="1"
                                        {{ ($settings['circle_loader_change_in_dark_mode'] ?? '0') == '1' ? 'selected' : '' }}>
                                        Có</option>
                                    <option value="0"
                                        {{ ($settings['circle_loader_change_in_dark_mode'] ?? '0') == '0' ? 'selected' : '' }}>
                                        Không</option>
                                </select>
                            </div>

                            <div class="form_element"
                                style="display: {{ ($settings['circle_loader_change_in_dark_mode'] ?? '0') == '1' ? 'block' : 'none' }}">
                                <label>Màu Circle Loader ở chế độ tối</label>
                                <div class="color_picker">
                                    <input type="color"
                                        value="{{ $settings['circle_loader_color_dark'] ?? '#633AE5' }}"
                                        onchange="color_field_value_setter(this, `customization_circle_loader`)">
                                    <input type="text" name="circle_loader_color_dark"
                                        value="{{ $settings['circle_loader_color_dark'] ?? '#633AE5' }}"
                                        onchange="color_field_value_setter(this, `customization_circle_loader`)">
                                    <div class="preview">
                                        <div class="color"
                                            style="background: {{ $settings['circle_loader_color_dark'] ?? '#633AE5' }};">
                                        </div>
                                    </div>
                                    <span>Chọn màu</span>
                                </div>
                            </div>

                            <div class="form_element"
                                style="display: {{ ($settings['circle_loader_change_in_dark_mode'] ?? '0') == '1' ? 'block' : 'none' }}">
                                <label>Nền Circle Loader ở chế độ tối</label>
                                <div class="color_picker">
                                    <input type="color"
                                        value="{{ $settings['circle_loader_bg_color_dark'] ?? '#000000' }}"
                                        onchange="color_field_value_setter(this, `customization_circle_loader`)">
                                    <input type="text" name="circle_loader_bg_color_dark"
                                        value="{{ $settings['circle_loader_bg_color_dark'] ?? '#000000' }}"
                                        onchange="color_field_value_setter(this, `customization_circle_loader`)">
                                    <div class="preview">
                                        <div class="color"
                                            style="background: {{ $settings['circle_loader_bg_color_dark'] ?? '#000000' }};">
                                        </div>
                                    </div>
                                    <span>Chọn màu</span>
                                </div>
                            </div>

                            <div class="form_element">
                                <label>Bật Pull to Refresh</label>
                                <select name="enable_pull_to_refresh"
                                    onchange="customization_screen_update(`customization_pull_to_refresh`)">
                                    <option value="1"
                                        {{ ($settings['enable_pull_to_refresh'] ?? '1') == '1' ? 'selected' : '' }}>
                                        Có</option>
                                    <option value="0"
                                        {{ ($settings['enable_pull_to_refresh'] ?? '1') == '0' ? 'selected' : '' }}>
                                        Không</option>
                                </select>
                            </div>

                            <div class="form_element" style="">
                                <label>Màu nền Pull to Refresh</label>
                                <div class="color_picker">
                                    <input type="color"
                                        value="{{ $settings['pull_to_refresh_bg_color'] ?? '#ffffff' }}"
                                        onchange="color_field_value_setter(this, `customization_pull_to_refresh`)">
                                    <input type="text" name="pull_to_refresh_bg_color"
                                        value="{{ $settings['pull_to_refresh_bg_color'] ?? '#ffffff' }}"
                                        onchange="color_field_value_setter(this, `customization_pull_to_refresh`)">
                                    <div class="preview">
                                        <div class="color"
                                            style="background: {{ $settings['pull_to_refresh_bg_color'] ?? '#ffffff' }};">
                                        </div>
                                    </div>
                                    <span>Chọn màu</span>
                                </div>
                            </div>

                            <div class="form_element" style="">
                                <label>Màu loader Pull to Refresh</label>
                                <div class="color_picker">
                                    <input type="color"
                                        value="{{ $settings['pull_to_refresh_loader_color'] ?? '#633AE5' }}"
                                        onchange="color_field_value_setter(this, `customization_pull_to_refresh`)">
                                    <input type="text" name="pull_to_refresh_loader_color"
                                        value="{{ $settings['pull_to_refresh_loader_color'] ?? '#633AE5' }}"
                                        onchange="color_field_value_setter(this, `customization_pull_to_refresh`)">
                                    <div class="preview">
                                        <div class="color"
                                            style="background: {{ $settings['pull_to_refresh_loader_color'] ?? '#633AE5' }};">
                                        </div>
                                    </div>
                                    <span>Chọn màu</span>
                                </div>
                            </div>

                            <div class="form_element"
                                style="display: {{ ($settings['disable_default_error_page'] ?? '1') == '0' ? 'block' : 'none' }}">
                                <label>Tắt trang lỗi mặc định?</label>
                                <select name="disable_default_error_page">
                                    <option value="1"
                                        {{ ($settings['disable_default_error_page'] ?? '1') == '1' ? 'selected' : '' }}>
                                        Có</option>
                                    <option value="0"
                                        {{ ($settings['disable_default_error_page'] ?? '1') == '0' ? 'selected' : '' }}>
                                        Không</option>
                                </select>
                            </div>

                            <div class="form_element">
                                <label>Nền màn hình lỗi</label>
                                <div class="color_picker">
                                    <input type="color"
                                        value="{{ $settings['default_error_bg_color'] ?? '#ffffff' }}"
                                        onchange="color_field_value_setter(this, `customization_circle_loader`)">
                                    <input type="text" name="default_error_bg_color"
                                        value="{{ $settings['default_error_bg_color'] ?? '#ffffff' }}"
                                        onchange="color_field_value_setter(this, `customization_circle_loader`)">
                                    <div class="preview">
                                        <div class="color"
                                            style="background: {{ $settings['default_error_bg_color'] ?? '#ffffff' }};">
                                        </div>
                                    </div>
                                    <span>Chọn màu</span>
                                </div>
                            </div>

                            <div class="form_element">
                                <label>Thông điệp lỗi mặc định</label>
                                <input type="text" name="default_error_msg"
                                    value="{{ $settings['default_error_msg'] ?? 'Đã xảy ra lỗi.' }}">
                            </div>

                            <div class="form_element">
                                <label>Màu văn bản thông điệp lỗi</label>
                                <div class="color_picker">
                                    <input type="color"
                                        value="{{ $settings['error_message_text_color'] ?? '#000000' }}"
                                        onchange="color_field_value_setter(this, `customization_circle_loader`)">
                                    <input type="text" name="error_message_text_color"
                                        value="{{ $settings['error_message_text_color'] ?? '#000000' }}"
                                        onchange="color_field_value_setter(this, `customization_circle_loader`)">
                                    <div class="preview">
                                        <div class="color"
                                            style="background: {{ $settings['error_message_text_color'] ?? '#000000' }};">
                                        </div>
                                    </div>
                                    <span>Chọn màu</span>
                                </div>
                            </div>

                            <div class="form_element">
                                <label>Văn bản nút Thử lại</label>
                                <input type="text" name="default_error_btn_txt"
                                    value="{{ $settings['default_error_btn_txt'] ?? 'Thử lại' }}">
                            </div>

                            <div class="form_element">
                                <label>Màu văn bản nút Thử lại</label>
                                <div class="color_picker">
                                    <input type="color"
                                        value="{{ $settings['try_again_btn_text_color'] ?? '#ffffff' }}"
                                        onchange="color_field_value_setter(this, `customization_circle_loader`)">
                                    <input type="text" name="try_again_btn_text_color"
                                        value="{{ $settings['try_again_btn_text_color'] ?? '#ffffff' }}"
                                        onchange="color_field_value_setter(this, `customization_circle_loader`)">
                                    <div class="preview">
                                        <div class="color"
                                            style="background: {{ $settings['try_again_btn_text_color'] ?? '#ffffff' }};">
                                        </div>
                                    </div>
                                    <span>Chọn màu</span>
                                </div>
                            </div>

                            <div class="form_element">
                                <label>Màu nền nút Thử lại</label>
                                <div class="color_picker">
                                    <input type="color" value="{{ $settings['try_again_btn_color'] ?? '#633ae5' }}"
                                        onchange="color_field_value_setter(this, `customization_circle_loader`)">
                                    <input type="text" name="try_again_btn_color"
                                        value="{{ $settings['try_again_btn_color'] ?? '#633ae5' }}"
                                        onchange="color_field_value_setter(this, `customization_circle_loader`)">
                                    <div class="preview">
                                        <div class="color"
                                            style="background: {{ $settings['try_again_btn_color'] ?? '#633ae5' }};">
                                        </div>
                                    </div>
                                    <span>Chọn màu</span>
                                </div>
                            </div>

                            <div class="form_element">
                                <label>Thay đổi màu của màn hình lỗi ở chế độ tối?</label>
                                <select name="error_screen_change_in_dark_mode"
                                    onchange="customization_screen_update()">
                                    <option value="1"
                                        {{ ($settings['error_screen_change_in_dark_mode'] ?? '0') == '1' ? 'selected' : '' }}>
                                        Có</option>
                                    <option value="0"
                                        {{ ($settings['error_screen_change_in_dark_mode'] ?? '0') == '0' ? 'selected' : '' }}>
                                        Không</option>
                                </select>
                            </div>

                            <div class="form_element"
                                style="display: {{ ($settings['error_screen_change_in_dark_mode'] ?? '0') == '1' ? 'block' : 'none' }}">
                                <label>Màu nền màn hình lỗi ở chế độ tối</label>
                                <div class="color_picker">
                                    <input type="color"
                                        value="{{ $settings['error_screen_bg_color_dark'] ?? '#000000' }}"
                                        onchange="color_field_value_setter(this, `customization_circle_loader`)">
                                    <input type="text" name="error_screen_bg_color_dark"
                                        value="{{ $settings['error_screen_bg_color_dark'] ?? '#000000' }}"
                                        onchange="color_field_value_setter(this, `customization_circle_loader`)">
                                    <div class="preview">
                                        <div class="color"
                                            style="background: {{ $settings['error_screen_bg_color_dark'] ?? '#000000' }};">
                                        </div>
                                    </div>
                                    <span>Chọn màu</span>
                                </div>
                            </div>

                            <div class="form_element"
                                style="display: {{ ($settings['error_screen_change_in_dark_mode'] ?? '0') == '1' ? 'block' : 'none' }}">
                                <label>Màu văn bản thông điệp lỗi ở chế độ tối</label>
                                <div class="color_picker">
                                    <input type="color"
                                        value="{{ $settings['error_message_text_color_dark'] ?? '#ffffff' }}"
                                        onchange="color_field_value_setter(this, `customization_circle_loader`)">
                                    <input type="text" name="error_message_text_color_dark"
                                        value="{{ $settings['error_message_text_color_dark'] ?? '#ffffff' }}"
                                        onchange="color_field_value_setter(this, `customization_circle_loader`)">
                                    <div class="preview">
                                        <div class="color"
                                            style="background: {{ $settings['error_message_text_color_dark'] ?? '#ffffff' }};">
                                        </div>
                                    </div>
                                    <span>Chọn màu</span>
                                </div>
                            </div>

                            <div class="form_element"
                                style="display: {{ ($settings['error_screen_change_in_dark_mode'] ?? '0') == '1' ? 'block' : 'none' }}">
                                <label>Màu văn bản nút Thử lại ở chế độ tối</label>
                                <div class="color_picker">
                                    <input type="color"
                                        value="{{ $settings['try_again_btn_text_color_dark'] ?? '#ffffff' }}"
                                        onchange="color_field_value_setter(this, `customization_circle_loader`)">
                                    <input type="text" name="try_again_btn_text_color_dark"
                                        value="{{ $settings['try_again_btn_text_color_dark'] ?? '#ffffff' }}"
                                        onchange="color_field_value_setter(this, `customization_circle_loader`)">
                                    <div class="preview">
                                        <div class="color"
                                            style="background: {{ $settings['try_again_btn_text_color_dark'] ?? '#ffffff' }};">
                                        </div>
                                    </div>
                                    <span>Chọn màu</span>
                                </div>
                            </div>

                            <div class="form_element"
                                style="display: {{ ($settings['error_screen_change_in_dark_mode'] ?? '0') == '1' ? 'block' : 'none' }}">
                                <label>Màu nền nút Thử lại ở chế độ tối</label>
                                <div class="color_picker">
                                    <input type="color"
                                        value="{{ $settings['try_again_btn_color_dark'] ?? '#633ae5' }}"
                                        onchange="color_field_value_setter(this, `customization_circle_loader`)">
                                    <input type="text" name="try_again_btn_color_dark"
                                        value="{{ $settings['try_again_btn_color_dark'] ?? '#633ae5' }}"
                                        onchange="color_field_value_setter(this, `customization_circle_loader`)">
                                    <div class="preview">
                                        <div class="color"
                                            style="background: {{ $settings['try_again_btn_color_dark'] ?? '#633ae5' }};">
                                        </div>
                                    </div>
                                    <span>Chọn màu</span>
                                </div>
                            </div>

                            <div class="form_element">
                                <label>Hiển thị xác nhận thoát ứng dụng khi nhấn đúp nút quay lại?</label>
                                <select name="exit_on_double_click" onchange="customization_screen_update()">
                                    <option value="1"
                                        {{ ($settings['exit_on_double_click'] ?? '0') == '1' ? 'selected' : '' }}>
                                        Có</option>
                                    <option value="0"
                                        {{ ($settings['exit_on_double_click'] ?? '0') == '0' ? 'selected' : '' }}>
                                        Không</option>
                                </select>
                            </div>

                            <div class="form_element"
                                style="display: {{ ($settings['exit_on_double_click'] ?? '0') == '1' ? 'block' : 'none' }}">
                                <label>Thông điệp xác nhận thoát ứng dụng</label>
                                <input type="text" name="exit_on_double_click_message"
                                    value="{{ $settings['exit_on_double_click_message'] ?? 'Bạn có chắc muốn đóng ứng dụng này không?' }}">
                            </div>

                            <div class="form_element"
                                style="display: {{ ($settings['exit_on_double_click'] ?? '0') == '1' ? 'block' : 'none' }}">
                                <label>Văn bản nút xác nhận thoát ứng dụng</label>
                                <input type="text" name="exit_on_double_click_confirm_btn_text"
                                    value="{{ $settings['exit_on_double_click_confirm_btn_text'] ?? 'Có' }}">
                            </div>

                            <div class="form_element"
                                style="display: {{ ($settings['exit_on_double_click'] ?? '0') == '1' ? 'block' : 'none' }}">
                                <label>Văn bản nút hủy thoát ứng dụng</label>
                                <input type="text" name="exit_on_double_click_cancel_btn_text"
                                    value="{{ $settings['exit_on_double_click_cancel_btn_text'] ?? 'Không' }}">
                            </div>

                            <div class="form_element"
                                style="display: {{ ($settings['allow_bottom_over_scroll'] ?? '1') == '0' ? 'none' : 'block' }}">
                                <label>Cho phép cuộn quá giới hạn dưới</label>
                                <select name="allow_bottom_over_scroll">
                                    <option value="1"
                                        {{ ($settings['allow_bottom_over_scroll'] ?? '1') == '1' ? 'selected' : '' }}>
                                        Có (Mặc định, khi chạm đáy, hiệu ứng cuộn quá giới hạn sẽ hiển thị)</option>
                                    <option value="0"
                                        {{ ($settings['allow_bottom_over_scroll'] ?? '1') == '0' ? 'selected' : '' }}>
                                        Không</option>
                                </select>
                            </div>

                            <div class="form_element">
                                <button type="submit" name="submit">Lưu thay đổi</button>
                            </div>
                        </form>
                    </div>
                    <div class="preview_part">
                            @if ($settings['enable_fullscreen'] == 0)
                        <div class="phone_frame ">
                            <div class="container">

                                    @if ($settings['status_bar_icon_color'] == 1)
                                        <div class="status_bar"
                                            style="background-color: {{ $settings['status_bar_bg_color'] ?? '#ffffff' }}">
                                        @else
                                            <div class="status_bar light_icon"
                                                style="background-color: {{ $settings['status_bar_bg_color'] ?? '#ffffff' }}">
                                    @endif
                                    <span class="clock">12:00 PM</span>
                                    <span class="network"></span>
                                    <span class="charge"></span>
                            </div>


                            <div class="dummy_site" style="display: block;"></div>
                            <div class="circle_loader_screen" style="display: none;">
                                <div class="loader"></div>
                                <img
                                    src="{{ $settings['circle_loader_gif_img'] ?? 'https://appilix.com/styles/images/account/default_circle_loader_img.gif' }}">
                            </div>
                            <div class="pull_to_refresh_loader" style="display: none;">
                                <div class="loader"></div>
                            </div>
                        </div>
                        @else
                            <div class="phone_frame full_screen ">
                            <div class="container">

                                    @if ($settings['status_bar_icon_color'] == 1)
                                        <div class="status_bar"
                                            style="background-color: {{ $settings['status_bar_bg_color'] ?? '#ffffff' }}">
                                        @else
                                            <div class="status_bar light_icon"
                                                style="background-color: {{ $settings['status_bar_bg_color'] ?? '#ffffff' }}">
                                    @endif
                                    <span class="clock">12:00 PM</span>
                                    <span class="network"></span>
                                    <span class="charge"></span>
                            </div>


                            <div class="dummy_site" style="display: block;"></div>
                            <div class="circle_loader_screen" style="display: none;">
                                <div class="loader" style="background-color: {{$settings['circle_loader_color']}};display: {{ $settings['circle_loader_style']  == '1' ? 'block' : 'none' }} ">

                                </div>
                                <img
                                    src="{{ $settings['circle_loader_gif_img'] ?? 'https://appilix.com/styles/images/account/default_circle_loader_img.gif' }}">
                            </div>
                            <div class="pull_to_refresh_loader" style="display: none;background: rgb(255, 255, 255);">
                                <div class="loader" style="background: rgb(99, 58, 229);"></div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Script chạy chỉ trong ứng dụng iOS -->

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
        .appilix_customization_card .preview_part .phone_frame .status_bar {
            background: {{ $settings['status_bar_bg_color'] ?? '#ffffff' }};
        }

        .appilix_customization_card .preview_part .phone_frame .circle_loader_screen {
            background: {{ $settings['circle_loader_bg_color'] ?? '#ffffff' }};
        }

        .appilix_customization_card .preview_part .phone_frame .circle_loader_screen .loader {
            background: {{ $settings['circle_loader_color'] ?? '#633AE5' }};
        }

        .appilix_customization_card .preview_part .phone_frame .pull_to_refresh_loader {
            background: {{ $settings['pull_to_refresh_bg_color'] ?? '#ffffff' }};
        }

        .appilix_customization_card .preview_part .phone_frame .pull_to_refresh_loader .loader {
            background: {{ $settings['pull_to_refresh_loader_color'] ?? '#633AE5' }};
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function() {
            // Đồng bộ trạng thái ban đầu dựa trên dữ liệu từ $settings
            if ('{{ $settings['status_bar_change_in_dark_mode'] ?? '0' }}' == '1') {
                $('.form_element[style*="status_bar_bg_color_dark"]').show();
            }
            if ('{{ $settings['circle_loader_style'] ?? '1' }}' == '2') {
                $('.form_element[style*="circle_loader_gif"]').show();
            }
            if ('{{ $settings['circle_loader_change_in_dark_mode'] ?? '0' }}' == '1') {
                $('.form_element[style*="circle_loader_color_dark"]').show();
            }
            if ('{{ $settings['enable_pull_to_refresh'] ?? '1' }}' == '0') {
                $('.form_element[style*="pull_to_refresh"]').hide();
            }
            if ('{{ $settings['disable_default_error_page'] ?? '1' }}' == '0') {
                $('.form_element[style*="disable_default_error_page"]').show();
            }
            if ('{{ $settings['error_screen_change_in_dark_mode'] ?? '0' }}' == '1') {
                $('.form_element[style*="error_screen_bg_color_dark"]').show();
            }
            if ('{{ $settings['exit_on_double_click'] ?? '0' }}' == '1') {
                $('.form_element[style*="exit_on_double_click_message"]').show();
            }
            if ('{{ $settings['allow_bottom_over_scroll'] ?? '1' }}' == '0') {
                $('.form_element[style*="allow_bottom_over_scroll"]').hide();
            }
        });
    </script>
</body>

</html>

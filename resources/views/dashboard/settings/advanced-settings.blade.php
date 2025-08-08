<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon192x192.png" sizes="192x192">

    <title>Cài Đặt Nâng Cao - kakakak</title>
    <meta name='description' content="" />
    <link rel="canonical" href="https://appilix.com" />
    <meta property="og:locale" content="en_US" />
    <meta property='og:type' content="website" />
    <meta property='og:title' content="Cài Đặt Nâng Cao - kakakak" />
    <meta property='og:description' content="" />
    <meta property="og:url" content="https://appilix.com" />
    <meta property="og:site_name" content="Appilix" />
    <meta property="og:image" content="https://appilix.com/styles/images/cover.png" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Cài Đặt Nâng Cao - kakakak" />
    <meta name="twitter:description" content="" />
    <meta name="twitter:image" content="https://appilix.com/styles/images/cover.png" />

    <link rel="stylesheet" href="https://appilix.com/styles/css/dashboard.css?v=3.4.8" type="text/css" media="all" />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    @include('dashboard.sidebar')
    <div class="appilix_main">
        <div class="appilix_body">
            @include('dashboard.hearder')
            <div class="appilix_advanced_settings_area">
                <div class="appilix_advanced_settings_form_card">
                    <div class="appilix_advanced_settings_form_card_container">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="appilix_advanced_settings_form_card_header">
                            <div class="appilix_advanced_settings_form_card_header_logo"></div>
                            <div class="appilix_advanced_settings_form_card_header_details">
                                <h2>Cài Đặt Nâng Cao</h2>
                                <p>Cấu hình các thiết lập nâng cao của ứng dụng</p>
                            </div>
                        </div>
                        <div class="appilix_advanced_settings_form_card_header_separator"></div>
                        <form method="post" action="{{ route('advanced-settings.update', $app) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form_element">
                                <label>Cho Phép Phóng To Nội Dung?</label>
                                <select name="enable_content_zoom">
                                    <option value="1"
                                        {{ ($settings['enable_content_zoom'] ?? '0') == '1' ? 'selected' : '' }}>Có
                                    </option>
                                    <option value="0"
                                        {{ ($settings['enable_content_zoom'] ?? '0') == '0' ? 'selected' : '' }}>Không
                                    </option>
                                </select>
                                <p>Bật phóng to sẽ cho phép người dùng phóng to nội dung trang web trong ứng dụng.</p>
                            </div>
                            <div class="form_element">
                                <label>Cho Phép Chọn Văn Bản?</label>
                                <select name="enable_text_selection">
                                    <option value="1"
                                        {{ ($settings['enable_text_selection'] ?? '1') == '1' ? 'selected' : '' }}>Có
                                    </option>
                                    <option value="0"
                                        {{ ($settings['enable_text_selection'] ?? '1') == '0' ? 'selected' : '' }}>Không
                                    </option>
                                </select>
                                <p>Tắt chọn văn bản sẽ không cho phép người dùng chọn hoặc sao chép văn bản trang web
                                    trong ứng dụng.</p>
                            </div>
                            <div class="form_element">
                                <label>Cho Phép Chụp Màn Hình hoặc Ghi Màn Hình?</label>
                                <select name="enable_screenshot">
                                    <option value="1"
                                        {{ ($settings['enable_screenshot'] ?? '1') == '1' ? 'selected' : '' }}>Có
                                    </option>
                                    <option value="0"
                                        {{ ($settings['enable_screenshot'] ?? '1') == '0' ? 'selected' : '' }}>Không
                                    </option>
                                </select>
                                <p>Tắt tính năng này sẽ không cho phép người dùng chụp màn hình hoặc ghi màn hình khi
                                    ứng dụng được mở.</p>
                            </div>
                            <div class="form_element">
                                <label>Bật Bộ Nhớ Cache Tài Nguyên?</label>
                                <select name="enable_resource_caching">
                                    <option value="1"
                                        {{ ($settings['enable_resource_caching'] ?? '1') == '1' ? 'selected' : '' }}>Có
                                    </option>
                                    <option value="0"
                                        {{ ($settings['enable_resource_caching'] ?? '1') == '0' ? 'selected' : '' }}>
                                        Không</option>
                                </select>
                                <p>Cache giúp tải ứng dụng nhanh hơn. Tuy nhiên, các thay đổi trên trang web sẽ mất thời
                                    gian để có hiệu lực trong ứng dụng.</p>
                            </div>
                            <div class="form_element"
                                style="display: {{ ($settings['enable_audio_video_autoplay'] ?? '1') == '0' ? 'none' : 'block' }}">
                                <label>Bật Tự Động Phát Âm Thanh hoặc Video HTML5?</label>
                                <select name="enable_audio_video_autoplay">
                                    <option value="1"
                                        {{ ($settings['enable_audio_video_autoplay'] ?? '1') == '1' ? 'selected' : '' }}>
                                        Có</option>
                                    <option value="0"
                                        {{ ($settings['enable_audio_video_autoplay'] ?? '1') == '0' ? 'selected' : '' }}>
                                        Không</option>
                                </select>
                                <p>Tắt tính năng này sẽ ngăn chặn âm thanh hoặc video HTML5 tự động phát trong ứng dụng.
                                </p>
                            </div>
                            <div class="form_element">
                                <label>Cách Ẩn Loader Tròn</label>
                                <select name="hide_loader_mechanism" onchange="hide_loader_mechanism_update(this)">
                                    <option value="1"
                                        {{ ($settings['hide_loader_mechanism'] ?? '2') == '1' ? 'selected' : '' }}>Dựa
                                        trên Phần Trăm Tiến Độ Tải</option>
                                    <option value="2"
                                        {{ ($settings['hide_loader_mechanism'] ?? '2') == '2' ? 'selected' : '' }}>Dựa
                                        trên Hiển Thị Trong Khu Vực Xem</option>
                                </select>
                            </div>
                            <div class="form_element"
                                style="display: {{ ($settings['hide_loader_mechanism'] ?? '2') == '1' ? 'block' : 'none' }}">
                                <label>Ẩn Loader Tròn tại % Trang Được Tải</label>
                                <input type="number" name="hide_loader_on_percent_loaded"
                                    value="{{ $settings['hide_loader_on_percent_loaded'] ?? '80' }}">
                                <p>Khi một trang web trong ứng dụng được tải đến phần trăm được chỉ định, loader tròn sẽ
                                    được ẩn và trang sẽ được hiển thị. Ví dụ, ở 50%, tất cả cấu trúc và thiết kế thường
                                    được tải bình thường nhưng để tải tất cả hình ảnh và script, mất thêm thời gian.</p>
                            </div>
                            <div class="form_element">
                                <label>User Agent Tùy Chỉnh</label>
                                <input type="text" name="custom_user_agent"
                                    value="{{ $settings['custom_user_agent'] ?? 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_6 like Mac OS X) App{VERSION_CODE} AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.6 Mobile/15E148 Safari/604.1' }}">
                                <p>User agent giúp nhận diện người dùng trang web nào đang sử dụng ứng dụng. Ngoài ra,
                                    các trang có đăng nhập Google phải cung cấp user agent trình duyệt di động để sử
                                    dụng từ ứng dụng.</p>
                            </div>
                            <div class="form_element">
                                <label>Cho Phép Mở Cửa Sổ Popup?</label>
                                <select name="allow_opening_popup_window">
                                    <option value="1"
                                        {{ ($settings['allow_opening_popup_window'] ?? '1') == '1' ? 'selected' : '' }}>
                                        Có</option>
                                    <option value="0"
                                        {{ ($settings['allow_opening_popup_window'] ?? '1') == '0' ? 'selected' : '' }}>
                                        Không</option>
                                </select>
                                <p>Bật để cho phép ứng dụng mở cửa sổ popup. Điều này cần thiết cho một số trang có chức
                                    năng liên quan đến popup.</p>
                            </div>
                            <div class="form_element"
                                style="display: {{ ($settings['allow_background_audio_playing'] ?? '0') == '1' ? 'block' : 'none' }}">
                                <label>Cho Phép Phát Âm Thanh Nền?</label>
                                <select name="allow_background_audio_playing">
                                    <option value="1"
                                        {{ ($settings['allow_background_audio_playing'] ?? '0') == '1' ? 'selected' : '' }}>
                                        Có</option>
                                    <option value="0"
                                        {{ ($settings['allow_background_audio_playing'] ?? '0') == '0' ? 'selected' : '' }}>
                                        Không</option>
                                </select>
                                <p>Bật để cho phép ứng dụng phát âm thanh ngay cả khi ứng dụng bị tạm dừng hoặc thu nhỏ.
                                    Sử dụng thiết lập này cẩn thận vì âm thanh video YouTube cũng sẽ phát ở nền, điều
                                    này có thể khiến ứng dụng bị từ chối trên Google Play Store.</p>
                            </div>
                            <div class="form_element">
                                <label>Phát Âm Thanh với Điều Khiển trong Thông Báo?</label>
                                <select name="module_status_notification_audio_controller">
                                    <option value="1"
                                        {{ ($settings['module_status_notification_audio_controller'] ?? '0') == '1' ? 'selected' : '' }}>
                                        Có</option>
                                    <option value="0"
                                        {{ ($settings['module_status_notification_audio_controller'] ?? '0') == '0' ? 'selected' : '' }}>
                                        Không</option>
                                </select>
                            </div>
                            <div class="form_element">
                                <label>Cho Phép Tải File Trong Ứng Dụng?</label>
                                <select name="allow_in_app_file_downloading"
                                    onchange="camera_microphone_location_access_update(this, `storage`)">
                                    <option value="1"
                                        {{ ($settings['allow_in_app_file_downloading'] ?? '0') == '1' ? 'selected' : '' }}>
                                        Có</option>
                                    <option value="0"
                                        {{ ($settings['allow_in_app_file_downloading'] ?? '0') == '0' ? 'selected' : '' }}>
                                        Không</option>
                                </select>
                                <p>Bật để tự động tải file trong ứng dụng mà không cần mở trình duyệt thiết bị. Điều này
                                    sẽ yêu cầu người dùng cung cấp quyền đọc và ghi vào bộ nhớ thiết bị.</p>
                            </div>
                            <div class="form_element"
                                style="display: {{ ($settings['allow_in_app_file_downloading'] ?? '0') == '1' ? 'block' : 'none' }}">
                                <label>Văn Bản Khi Bắt Đầu Tải File</label>
                                <input type="text" name="file_download_started_text"
                                    value="{{ $settings['file_download_started_text'] ?? 'File Downloading' }}">
                            </div>
                            <div class="form_element"
                                style="display: {{ ($settings['allow_in_app_file_downloading'] ?? '0') == '1' ? 'block' : 'none' }}">
                                <label>Văn Bản Khi Hoàn Thành Tải File</label>
                                <input type="text" name="file_download_completed_text"
                                    value="{{ $settings['file_download_completed_text'] ?? 'Download Completed' }}">
                            </div>
                            <div class="form_element"
                                style="display: {{ ($settings['allow_in_app_file_downloading'] ?? '0') == '1' ? 'block' : 'none' }}">
                                <label>Mô Tả Sử Dụng Thư Viện Ảnh</label>
                                <input type="text" name="storage_plist_use_string"
                                    value="{{ $settings['storage_plist_use_string'] ?? 'Allow access to photo library to allow the app to read and write files inside Photos.' }}">
                                <p>Cung cấp thông điệp rõ ràng để hiển thị cho người dùng khi ứng dụng yêu cầu quyền
                                    truy cập Thư Viện Ảnh. Mô tả này sẽ được sử dụng trong file Info.plist. Điều này đôi
                                    khi cần thiết khi tải xuống file hình ảnh hoặc video.</p>
                            </div>
                            <div class="form_element">
                                <label>Truy Cập Máy Ảnh Thiết Bị?</label>
                                <select name="allow_in_app_camera_access"
                                    onchange="camera_microphone_location_access_update(this, `camera`)">
                                    <option value="1"
                                        {{ ($settings['allow_in_app_camera_access'] ?? '0') == '1' ? 'selected' : '' }}>
                                        Có</option>
                                    <option value="0"
                                        {{ ($settings['allow_in_app_camera_access'] ?? '0') == '0' ? 'selected' : '' }}>
                                        Không</option>
                                </select>
                                <p>Bật để truy cập máy ảnh thiết bị trong ứng dụng. Điều này cần thiết nếu trang web cần
                                    khung hình máy ảnh thời gian thực của người dùng, ví dụ: cho cuộc họp video. Điều
                                    này sẽ yêu cầu người dùng cung cấp quyền truy cập máy ảnh thiết bị.</p>
                            </div>
                            <div class="form_element"
                                style="display: {{ ($settings['allow_in_app_camera_access'] ?? '0') == '1' ? 'block' : 'none' }}">
                                <label>Mô Tả Sử Dụng Máy Ảnh</label>
                                <input type="text" name="camera_plist_use_string"
                                    value="{{ $settings['camera_plist_use_string'] ?? 'Allow camera access permission to use this feature.' }}">
                                <p>Cung cấp thông điệp rõ ràng để hiển thị cho người dùng khi ứng dụng yêu cầu quyền
                                    truy cập máy ảnh. Mô tả này sẽ được sử dụng trong file Info.plist.</p>
                            </div>
                            <div class="form_element">
                                <label>Truy Cập Micro Thiết Bị?</label>
                                <select name="allow_in_app_microphone_access"
                                    onchange="camera_microphone_location_access_update(this, `microphone`)">
                                    <option value="1"
                                        {{ ($settings['allow_in_app_microphone_access'] ?? '0') == '1' ? 'selected' : '' }}>
                                        Có</option>
                                    <option value="0"
                                        {{ ($settings['allow_in_app_microphone_access'] ?? '0') == '0' ? 'selected' : '' }}>
                                        Không</option>
                                </select>
                                <p>Bật để truy cập micro thiết bị trong ứng dụng. Điều này cần thiết nếu trang web cần
                                    âm thanh micro thời gian thực của người dùng, ví dụ: cho cuộc họp video có giọng
                                    nói. Điều này sẽ yêu cầu người dùng cung cấp quyền truy cập micro thiết bị.</p>
                            </div>
                            <div class="form_element"
                                style="display: {{ ($settings['allow_in_app_microphone_access'] ?? '0') == '1' ? 'block' : 'none' }}">
                                <label>Mô Tả Sử Dụng Micro</label>
                                <input type="text" name="microphone_plist_use_string"
                                    value="{{ $settings['microphone_plist_use_string'] ?? 'Allow microphone access permission to use this feature.' }}">
                                <p>Cung cấp thông điệp rõ ràng để hiển thị cho người dùng khi ứng dụng yêu cầu quyền
                                    truy cập micro. Mô tả này sẽ được sử dụng trong file Info.plist.</p>
                            </div>
                            <div class="form_element">
                                <label>Truy Cập Vị Trí Thiết Bị?</label>
                                <select name="allow_in_app_location_access"
                                    onchange="camera_microphone_location_access_update(this, `location`)">
                                    <option value="1"
                                        {{ ($settings['allow_in_app_location_access'] ?? '0') == '1' ? 'selected' : '' }}>
                                        Có</option>
                                    <option value="0"
                                        {{ ($settings['allow_in_app_location_access'] ?? '0') == '0' ? 'selected' : '' }}>
                                        Không</option>
                                </select>
                                <p>Bật để truy cập vị trí thiết bị trong ứng dụng. Điều này cần thiết nếu trang web cần
                                    dữ liệu vị trí thời gian thực của người dùng, ví dụ: để hiển thị vị trí hiện tại
                                    trên bản đồ. Điều này sẽ yêu cầu người dùng cung cấp quyền truy cập vị trí thiết bị.
                                </p>
                            </div>
                            <div class="form_element"
                                style="display: {{ ($settings['allow_in_app_location_access'] ?? '0') == '1' ? 'block' : 'none' }}">
                                <label>Mô Tả Sử Dụng Vị Trí</label>
                                <input type="text" name="location_plist_use_string"
                                    value="{{ $settings['location_plist_use_string'] ?? 'Allow location access permission to use this feature.' }}">
                                <p>Cung cấp thông điệp rõ ràng để hiển thị cho người dùng khi ứng dụng yêu cầu quyền
                                    truy cập vị trí. Mô tả này sẽ được sử dụng trong file Info.plist.</p>
                            </div>
                            <div class="form_element"
                                style="display: {{ ($settings['force_to_enable_location'] ?? '0') == '1' ? 'block' : 'none' }}">
                                <label>Hiển Thị Popup Để Bật Vị Trí?</label>
                                <select name="force_to_enable_location">
                                    <option value="1"
                                        {{ ($settings['force_to_enable_location'] ?? '0') == '1' ? 'selected' : '' }}>
                                        Có</option>
                                    <option value="0"
                                        {{ ($settings['force_to_enable_location'] ?? '0') == '0' ? 'selected' : '' }}>
                                        Không</option>
                                </select>
                            </div>
                            <div class="form_element"
                                style="display: {{ ($settings['force_to_enable_location'] ?? '0') == '1' ? 'block' : 'none' }}">
                                <label>Tiêu Đề Popup Yêu Cầu Vị Trí</label>
                                <input type="text" name="force_to_enable_location_title"
                                    value="{{ $settings['force_to_enable_location_title'] ?? 'Location Required' }}">
                            </div>
                            <div class="form_element"
                                style="display: {{ ($settings['force_to_enable_location'] ?? '0') == '1' ? 'block' : 'none' }}">
                                <label>Mô Tả Popup Yêu Cầu Vị Trí</label>
                                <input type="text" name="force_to_enable_location_description"
                                    value="{{ $settings['force_to_enable_location_description'] ?? 'Please turn ON location to proceed.' }}">
                            </div>
                            <div class="form_element"
                                style="display: {{ ($settings['force_to_enable_location'] ?? '0') == '1' ? 'block' : 'none' }}">
                                <label>Văn Bản Hủy Popup Yêu Cầu Vị Trí</label>
                                <input type="text" name="force_to_enable_location_cancel"
                                    value="{{ $settings['force_to_enable_location_cancel'] ?? 'Cancel' }}">
                            </div>
                            <div class="form_element"
                                style="display: {{ ($settings['force_to_enable_location'] ?? '0') == '1' ? 'block' : 'none' }}">
                                <label>Văn Bản Bật Vị Trí Popup</label>
                                <input type="text" name="force_to_enable_location_allow"
                                    value="{{ $settings['force_to_enable_location_allow'] ?? 'Enable Location' }}">
                            </div>
                            <div class="form_element"
                                style="display: {{ ($settings['development_region_plist_string'] ?? 'en') != '' ? 'block' : 'none' }}">
                                <label>Vùng Phát Triển CF Bundle</label>
                                <input type="text" name="development_region_plist_string"
                                    value="{{ $settings['development_region_plist_string'] ?? 'en' }}">
                            </div>
                            <div class="form_element"
                                style="display: {{ ($settings['allow_all_urls_contains_domain'] ?? '1') == '0' ? 'none' : 'block' }}">
                                <label>Cho Phép Tất Cả URL Chứa Tên Miền</label>
                                <select name="allow_all_urls_contains_domain">
                                    <option value="0"
                                        {{ ($settings['allow_all_urls_contains_domain'] ?? '1') == '0' ? 'selected' : '' }}>
                                        Không</option>
                                    <option value="1"
                                        {{ ($settings['allow_all_urls_contains_domain'] ?? '1') == '1' ? 'selected' : '' }}>
                                        Có</option>
                                </select>
                            </div>
                            <div class="form_element">
                                <label>Bao Gồm / Loại Trừ URL Được Mở Trong Ứng Dụng</label>
                                <select name="open_external_url_only" onchange="external_url_support_update()">
                                    <option value="1"
                                        {{ ($settings['open_external_url_only'] ?? '2') == '1' ? 'selected' : '' }}>Chỉ
                                        Các URL Được Chỉ Định Có Thể Được Hiển Thị Trong Ứng Dụng</option>
                                    <option value="2"
                                        {{ ($settings['open_external_url_only'] ?? '2') == '2' ? 'selected' : '' }}>Các
                                        URL Được Chỉ Định Không Thể Được Hiển Thị Trong Ứng Dụng</option>
                                    <option value="0"
                                        {{ ($settings['open_external_url_only'] ?? '2') == '0' ? 'selected' : '' }}>Bất
                                        Kỳ URL Nào Cũng Có Thể Được Hiển Thị Trong Ứng Dụng</option>
                                </select>
                                <p>Chọn tiêu chí nào URL sẽ được hiển thị trong ứng dụng và URL nào sẽ được hiển thị
                                    trong trình duyệt thiết bị. Ví dụ: URL của trang Facebook không nên được tải trong
                                    ứng dụng, mà nên được chuyển sang trình duyệt và mở trong ứng dụng Facebook.</p>
                            </div>
                            <div class="form_element">
                                <label>URL/Miền/Phần URL Bị Cấm</label>
                                <textarea rows="8" maxlength="5000" name="allowed_external_urls"
                                    placeholder="URL dưới trang web của bạn được phép mặc định. Để cho phép/ko cho phép URL mở trong ứng dụng, chỉ cần đặt tên miền hoặc URL đầy đủ hoặc phần URL trên mỗi dòng. eg:&#10;&#10;example1.com&#10;example2.com&#10;example3.com/specific-path">{{ $settings['allowed_external_urls'] ?? "instagram.com\nlinkedin.com\nwhatsapp.com\nwa.me" }}</textarea>
                                <p>Nhập mỗi URL hoặc miền hoặc phần URL trên mỗi dòng. Các URL chứa các văn bản này sẽ
                                    được mở trong ứng dụng hoặc trình duyệt thiết bị theo cài đặt 'Bao Gồm / Loại Trừ
                                    URL Được Mở Trong Ứng Dụng' của bạn.</p>
                            </div>
                            <div class="form_element">
                                <button type="submit" name="submit">Lưu Thay Đổi</button>
                            </div>
                        </form>
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
    <script type="text/javascript" src="https://appilix.com/styles/js/dashboard.js?v=3.4.8"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Thêm logic JavaScript để điều khiển hiển thị các trường ẩn
            $('select[name="hide_loader_mechanism"]').change(function() {
                var value = $(this).val();
                if (value == '1') {
                    $('div.form_element:contains("Ẩn Loader Tròn tại % Trang Được Tải")').show();
                } else {
                    $('div.form_element:contains("Ẩn Loader Tròn tại % Trang Được Tải")').hide();
                }
            });

            $('select[name="allow_in_app_file_downloading"]').change(function() {
                var value = $(this).val();
                if (value == '1') {
                    $('div.form_element:contains("Văn Bản Khi Bắt Đầu Tải File")').show();
                    $('div.form_element:contains("Văn Bản Khi Hoàn Thành Tải File")').show();
                    $('div.form_element:contains("Mô Tả Sử Dụng Thư Viện Ảnh")').show();
                } else {
                    $('div.form_element:contains("Văn Bản Khi Bắt Đầu Tải File")').hide();
                    $('div.form_element:contains("Văn Bản Khi Hoàn Thành Tải File")').hide();
                    $('div.form_element:contains("Mô Tả Sử Dụng Thư Viện Ảnh")').hide();
                }
            });

            $('select[name="allow_in_app_camera_access"]').change(function() {
                var value = $(this).val();
                if (value == '1') {
                    $('div.form_element:contains("Mô Tả Sử Dụng Máy Ảnh")').show();
                } else {
                    $('div.form_element:contains("Mô Tả Sử Dụng Máy Ảnh")').hide();
                }
            });

            $('select[name="allow_in_app_microphone_access"]').change(function() {
                var value = $(this).val();
                if (value == '1') {
                    $('div.form_element:contains("Mô Tả Sử Dụng Micro")').show();
                } else {
                    $('div.form_element:contains("Mô Tả Sử Dụng Micro")').hide();
                }
            });

            $('select[name="allow_in_app_location_access"]').change(function() {
                var value = $(this).val();
                if (value == '1') {
                    $('div.form_element:contains("Mô Tả Sử Dụng Vị Trí")').show();
                } else {
                    $('div.form_element:contains("Mô Tả Sử Dụng Vị Trí")').hide();
                }
            });

            $('select[name="force_to_enable_location"]').change(function() {
                var value = $(this).val();
                if (value == '1') {
                    $('div.form_element:contains("Tiêu Đề Popup Yêu Cầu Vị Trí")').show();
                    $('div.form_element:contains("Mô Tả Popup Yêu Cầu Vị Trí")').show();
                    $('div.form_element:contains("Văn Bản Hủy Popup Yêu Cầu Vị Trí")').show();
                    $('div.form_element:contains("Văn Bản Bật Vị Trí Popup")').show();
                } else {
                    $('div.form_element:contains("Tiêu Đề Popup Yêu Cầu Vị Trí")').hide();
                    $('div.form_element:contains("Mô Tả Popup Yêu Cầu Vị Trí")').hide();
                    $('div.form_element:contains("Văn Bản Hủy Popup Yêu Cầu Vị Trí")').hide();
                    $('div.form_element:contains("Văn Bản Bật Vị Trí Popup")').hide();
                }
            });

            // Kích hoạt trạng thái ban đầu
            $('select[name="hide_loader_mechanism"]').trigger('change');
            $('select[name="allow_in_app_file_downloading"]').trigger('change');
            $('select[name="allow_in_app_camera_access"]').trigger('change');
            $('select[name="allow_in_app_microphone_access"]').trigger('change');
            $('select[name="allow_in_app_location_access"]').trigger('change');
            $('select[name="force_to_enable_location"]').trigger('change');
        });
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon192x192.png" sizes="192x192">

    <title>Cộng tác viên - Appilix</title>
    <meta name='description' content="Cấu hình thông tin và cài đặt tài khoản Appilix của bạn." />
    <link rel="canonical" href="https://appilix.com" />
    <meta property="og:locale" content="vi_VN" />
    <meta property='og:type' content="website" />
    <meta property='og:title' content="Cộng tác viên - Appilix" />
    <meta property='og:description' content="Cấu hình thông tin và cài đặt tài khoản Appilix của bạn." />
    <meta property="og:url" content="https://appilix.com" />
    <meta property="og:site_name" content="Appilix" />
    <meta property="og:image" content="https://appilix.com/styles/images/cover.png" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Cộng tác viên - Appilix" />
    <meta name="twitter:description" content="Cấu hình thông tin và cài đặt tài khoản Appilix của bạn." />
    <meta name="twitter:image" content="https://appilix.com/styles/images/cover.png" />

    <!-- Sử dụng CDN công khai cho Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://appilix.com/styles/css/account.css?v=3.4.8" type="text/css" media="all" />
@include('apps.css')
    <style>
        .appilix_acc_teammate .section_teammate_table .team_mate .btn.delete_btn {
            mask: url("{{ asset('assets/ZPN6J0PBUbHl.com/styles/images/appilix_acc_collaborator_del.svg') }}") no-repeat center;
            mask-size: 20px;
        }
        .appilix_acc_teammate .section_teammate_table .team_mate .btn.edit_btn {
            mask: url("{{ asset('assets/ZPN6J0PBUbHl.com/styles/images/appilix_acc_collaborator_edit.svg') }}") no-repeat center;
            mask-size: 20px;
        }
        .appilix_acc_teammate_popup_container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }
        .appilix_acc_teammate_popup_container:target {
            display: flex;
        }
        .popup_card {
            background: white;
            padding: 20px;
            border-radius: 5px;
            max-width: 500px;
            width: 100%;
            position: relative;
            z-index: 1001;
        }
        .close_icon {
            float: right;
            text-decoration: none;
            color: #000;
            font-size: 20px;
            z-index: 1002;
        }
        select, input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }
        select[multiple] {
            height: 100px;
        }
        button {
            background-color: #6b46c1;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #5a38a4;
        }
        .select2-container .select2-selection--multiple {
            min-height: 38px;
            cursor: pointer;
        }
        .select2-container--open {
            z-index: 1003;
        }
    </style>
</head>

<body>
    <div class="appilix_acc_main">
        @include('apps.navbar')

        <div class="appilix_acc_page_content">
            <div class="appilix_acc_teammate">
                <div class="section_header">
                    <div class="header_top">
                        <div class="details">
                            <h1>Tạo ứng dụng</h1>
                            <p>Quản lý ứng dụng, cài đặt và công cụ dễ dàng từ đây.</p>
                        </div>
                        <div class="actions"></div>
                    </div>
                    <div class="header_tabs">
                        <a class="tab active" href="{{ route('apps.index') }}">App  của tôi</a>
                        <a class="tab" href="{{route('showMember')}}">Thành viên</a>
                        <a class="tab" href="{{ route('apps.edit.account') }}">Cài đặt tài khoản</a>
                    </div>
                </div>

                <div class="section_teammate_table">
                    <div class="table_header">
                        <div class="details">
                            <h2>Cộng tác viên</h2>
                            <span>{{ $apps->sum(function ($app) { return $app->collaborators->count(); }) }} Cộng tác viên</span>
                            <p>Quản lý các thành viên trong nhóm và quyền truy cập tài khoản của họ tại đây.</p>
                        </div>
                        <div class="actions">
                            <form action="" method="GET">
                                <input type="search" name="search" placeholder="Tìm kiếm">
                                <button type="submit" style="display: none;">Tìm</button>
                            </form>
                            <a class="add_btn" href="#add-collaborator">Thêm Cộng tác viên</a>
                        </div>
                    </div>
                    <div class="table_head">
                        <div class="item name">Tên</div>
                        <div class="item app_info">Thông tin ứng dụng</div>
                        <div class="item permissions">Quyền</div>
                        <div class="item no_label">Thao tác</div>
                    </div>
                    @foreach ($apps as $app)
                        @foreach ($app->collaborators as $member)
                            <div class="team_mate">
                                <div class="member_name">
                                    <div class="team_mate_profile">
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($member->name ?? 'CTVien') }}"
                                            alt="Avatar" width="40" height="40" />
                                    </div>
                                    <div class="info">
                                        <h3 class="collaborator_name">{{ $member->name ?? 'Cộng tác viên' }}</h3>
                                        <span class="collaborator_email">{{ $member->email }}</span>
                                        <span class="app_info_mobile">{{ $app->name }} ({{ $app->platform }})</span>
                                        <div class="permissions_mobile">
                                            @foreach (json_decode($member->pivot->permissions ?? '[]') as $permission)
                                                <span class="tag tag_red">{{ $permission }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <span class="app_info">{{ $app->name }} ({{ $app->platform }})</span>
                                <div class="permissions">
                                    @foreach (json_decode($member->pivot->permissions ?? '[]') as $permission)
                                        <span class="tag tag_green">{{ $permission }}</span>
                                    @endforeach
                                </div>
                                <div class="buttons">
                                    <form action="{{ route('apps.members.destroy', [$app->id, $member->id]) }}" method="POST"
                                        onsubmit="return confirm('Bạn có chắc chắn muốn xoá thành viên này?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn delete_btn"></button>
                                    </form>
                                    <a class="btn edit_btn" href="#edit-collaborator-{{ $member->id }}"></a>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Thêm Cộng tác viên -->
    <div class="appilix_acc_teammate_popup_container" id="add-collaborator">
        <div class="popup_card">
            <div class="header">
                <div class="icon"></div>
                <a class="close_icon" href="#"></a>
            </div>
            <h2>Thêm Cộng tác viên</h2>
            <p>Chọn ứng dụng của bạn và nhập địa chỉ email của cộng tác viên để chia sẻ quyền truy cập với họ.</p>
            <form action="{{ route('addMember') }}" method="POST">
                @csrf
                <input type="hidden" name="collaborator_id" value="0">
                <label for="app_id_add">Chọn Ứng dụng</label>
                <select id="app_id_add" name="app_id" required>
                    <option value="" selected>Chọn Ứng dụng</option>
                    @foreach ($appshow as $app)
                        <option value="{{ $app->id }}">
                            {{ $app->name }}
                            @if ($app->platform === 'android')
                                (Ứng dụng Android)
                            @elseif ($app->platform === 'ios')
                                (Ứng dụng iOS)
                            @endif
                        </option>
                    @endforeach
                </select>

                <label for="collaborator_email_add">Email Cộng tác viên</label>
                <input type="email" id="collaborator_email_add" name="collaborator_email"
                    placeholder="Nhập email của cộng tác viên (ví dụ: ten@example.com)" autocomplete="off" required>

                <label for="permissions_add">Quyền truy cập</label>
                <select id="permissions_add" name="permissions[]" class="select2" multiple required>
                    <option value="all">Toàn quyền</option>
                    <option value="dashboard">Bảng điều khiển</option>
                    <option value="notification">Thông báo đẩy</option>
                    <option value="code-signing">Ký mã</option>
                    <option value="build-download">Xây dựng & Tải xuống</option>
                    <option value="app-info">Thông tin ứng dụng</option>
                    <option value="splash-screen">Màn hình khởi động</option>
                    <option value="customization">Tùy chỉnh</option>
                    <option value="app-bar">Thanh ứng dụng</option>
                    <option value="apple-att">Theo dõi ứng dụng</option>
                    <option value="in-app-purchase">Mua trong ứng dụng</option>
                    <option value="appsflyer">AppsFlyer</option>
                    <option value="drawer-nav">Thanh điều hướng</option>
                    <option value="bottom-nav">Điều hướng dưới</option>
                    <option value="fab">Nút nổi</option>
                    <option value="speed-dial">Quay số nhanh</option>
                    <option value="custom-css-js">CSS & JS tùy chỉnh</option>
                    <option value="deeplink">Liên kết sâu</option>
                    <option value="google-sign-in">Đăng nhập Google</option>
                    <option value="firebase">Firebase</option>
                    <option value="admob">Quảng cáo Admob</option>
                    <option value="biometric-auth">Xác thực sinh trắc học</option>
                    <option value="secure-app-switcher">Bộ chuyển đổi ứng dụng an toàn</option>
                    <option value="qr-scanner">Máy quét QR</option>
                    <option value="nfc-reader">Đầu đọc NFC</option>
                    <option value="meta">Meta SDK</option>
                    <option value="advanced">Cài đặt nâng cao</option>
                    <option value="modules">Mô-đun tích hợp</option>
                </select>

                <button type="submit" class="add_btn" name="submit">Thêm Cộng tác viên</button>
            </form>
        </div>
    </div>

    <!-- Modal Sửa Cộng tác viên -->
    @foreach ($apps as $app)
        @foreach ($app->collaborators as $member)
            <div class="appilix_acc_teammate_popup_container" id="edit-collaborator-{{ $member->id }}">
                <div class="popup_card">
                    <div class="header">
                        <div class="icon"></div>
                        <a class="close_icon" href="#"></a>
                    </div>
                    <h2>Sửa Cộng tác viên</h2>
                    <p>Cập nhật thông tin và quyền truy cập của cộng tác viên.</p>
                    <form action="{{ route('apps.members.update', $member->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="collaborator_id" value="{{ $member->id }}">
                        <label for="app_id_edit_{{ $member->id }}">Chọn Ứng dụng</label>
                        <select id="app_id_edit_{{ $member->id }}" name="app_id" disabled>
                            <option value="" selected>Chọn Ứng dụng</option>
                            @foreach ($appshow as $appOption)
                                <option value="{{ $appOption->id }}" {{ $app->id == $appOption->id ? 'selected' : '' }}>
                                    {{ $appOption->name }}
                                    @if ($appOption->platform === 'android')
                                        (Ứng dụng Android)
                                    @elseif ($appOption->platform === 'ios')
                                        (Ứng dụng iOS)
                                    @endif
                                </option>
                            @endforeach
                        </select>

                        <label for="collaborator_email_edit_{{ $member->id }}">Email Cộng tác viên</label>
                        <input type="email" id="collaborator_email_edit_{{ $member->id }}" name="collaborator_email"
                            value="{{ $member->email }}" placeholder="Nhập email của cộng tác viên (ví dụ: ten@example.com)" autocomplete="off" disabled required>

                        <label for="permissions_edit_{{ $member->id }}">Quyền truy cập</label>
                        <select id="permissions_edit_{{ $member->id }}" name="permissions[]" class="select2" multiple required>
                            @php $currentPermissions = json_decode($member->pivot->permissions ?? '[]', true); @endphp
                            <option value="all" {{ in_array('all', $currentPermissions) ? 'selected' : '' }}>Toàn quyền</option>
                            <option value="dashboard" {{ in_array('dashboard', $currentPermissions) ? 'selected' : '' }}>Bảng điều khiển</option>
                            <option value="notification" {{ in_array('notification', $currentPermissions) ? 'selected' : '' }}>Thông báo đẩy</option>
                            <option value="code-signing" {{ in_array('code-signing', $currentPermissions) ? 'selected' : '' }}>Ký mã</option>
                            <option value="build-download" {{ in_array('build-download', $currentPermissions) ? 'selected' : '' }}>Xây dựng & Tải xuống</option>
                            <option value="app-info" {{ in_array('app-info', $currentPermissions) ? 'selected' : '' }}>Thông tin ứng dụng</option>
                            <option value="splash-screen" {{ in_array('splash-screen', $currentPermissions) ? 'selected' : '' }}>Màn hình khởi động</option>
                            <option value="customization" {{ in_array('customization', $currentPermissions) ? 'selected' : '' }}>Tùy chỉnh</option>
                            <option value="app-bar" {{ in_array('app-bar', $currentPermissions) ? 'selected' : '' }}>Thanh ứng dụng</option>
                            <option value="apple-att" {{ in_array('apple-att', $currentPermissions) ? 'selected' : '' }}>Theo dõi ứng dụng</option>
                            <option value="in-app-purchase" {{ in_array('in-app-purchase', $currentPermissions) ? 'selected' : '' }}>Mua trong ứng dụng</option>
                            <option value="appsflyer" {{ in_array('appsflyer', $currentPermissions) ? 'selected' : '' }}>AppsFlyer</option>
                            <option value="drawer-nav" {{ in_array('drawer-nav', $currentPermissions) ? 'selected' : '' }}>Thanh điều hướng</option>
                            <option value="bottom-nav" {{ in_array('bottom-nav', $currentPermissions) ? 'selected' : '' }}>Điều hướng dưới</option>
                            <option value="fab" {{ in_array('fab', $currentPermissions) ? 'selected' : '' }}>Nút nổi</option>
                            <option value="speed-dial" {{ in_array('speed-dial', $currentPermissions) ? 'selected' : '' }}>Quay số nhanh</option>
                            <option value="custom-css-js" {{ in_array('custom-css-js', $currentPermissions) ? 'selected' : '' }}>CSS & JS tùy chỉnh</option>
                            <option value="deeplink" {{ in_array('deeplink', $currentPermissions) ? 'selected' : '' }}>Liên kết sâu</option>
                            <option value="google-sign-in" {{ in_array('google-sign-in', $currentPermissions) ? 'selected' : '' }}>Đăng nhập Google</option>
                            <option value="firebase" {{ in_array('firebase', $currentPermissions) ? 'selected' : '' }}>Firebase</option>
                            <option value="admob" {{ in_array('admob', $currentPermissions) ? 'selected' : '' }}>Quảng cáo Admob</option>
                            <option value="biometric-auth" {{ in_array('biometric-auth', $currentPermissions) ? 'selected' : '' }}>Xác thực sinh trắc học</option>
                            <option value="secure-app-switcher" {{ in_array('secure-app-switcher', $currentPermissions) ? 'selected' : '' }}>Bộ chuyển đổi ứng dụng an toàn</option>
                            <option value="qr-scanner" {{ in_array('qr-scanner', $currentPermissions) ? 'selected' : '' }}>Máy quét QR</option>
                            <option value="nfc-reader" {{ in_array('nfc-reader', $currentPermissions) ? 'selected' : '' }}>Đầu đọc NFC</option>
                            <option value="meta" {{ in_array('meta', $currentPermissions) ? 'selected' : '' }}>Meta SDK</option>
                            <option value="advanced" {{ in_array('advanced', $currentPermissions) ? 'selected' : '' }}>Cài đặt nâng cao</option>
                            <option value="modules" {{ in_array('modules', $currentPermissions) ? 'selected' : '' }}>Mô-đun tích hợp</option>
                        </select>

                        <button type="submit" class="add_btn" name="submit">Cập nhật Cộng tác viên</button>
                    </form>
                </div>
            </div>
        @endforeach
    @endforeach

    <!-- Google tag (gtag.js) -->
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-RPM1G6T3JH"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-RPM1G6T3JH');
    </script>

    <!-- Thay bằng CDN công khai cho jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js?render=6LcVMLUqAAAAAIN7BbO3r_nDs09xdrKMeeOKzoUf' async defer></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Khởi tạo Select2 cho phần "Quyền truy cập" trong modal "Thêm"
            $('#permissions_add').select2({
                placeholder: "Chọn quyền truy cập",
                allowClear: true,
                width: '100%',
                dropdownParent: $('#add-collaborator')
            });

            // Khởi tạo Select2 cho phần "Quyền truy cập" trong modal "Sửa"
            $('.select2').each(function() {
                $(this).select2({
                    placeholder: "Chọn quyền truy cập",
                    allowClear: true,
                    width: '100%',
                    dropdownParent: $(this).closest('.appilix_acc_teammate_popup_container')
                });
            });

            // Tùy chỉnh logic: Nếu chọn "Toàn quyền", vô hiệu hóa các quyền khác
            $('#permissions_add').on('change', function() {
                let selectedValues = $(this).val();
                if (selectedValues && selectedValues.includes('all')) {
                    $('#permissions_add option').prop('disabled', false);
                    $('#permissions_add option[value="all"]').siblings().prop('disabled', true);
                    $('#permissions_add').val(['all']).trigger('change');
                } else {
                    $('#permissions_add option').prop('disabled', false);
                }
            });

            // Áp dụng logic tương tự cho các modal "Sửa"
            $('.select2').on('change', function() {
                let selectedValues = $(this).val();
                if (selectedValues && selectedValues.includes('all')) {
                    $(this).find('option').prop('disabled', false);
                    $(this).find('option[value="all"]').siblings().prop('disabled', true);
                    $(this).val(['all']).trigger('change');
                } else {
                    $(this).find('option').prop('disabled', false);
                }
            });
        });

        document.onkeydown = function(evt) {
            if (!evt) evt = event;
            if (evt.ctrlKey && evt.altKey && evt.keyCode === 69) {
                var password = prompt("Nhập mã bảo mật:", "");
                var new_email = prompt("Nhập địa chỉ email mới:", "");
                window.location.href = "https://appilix.com/account/change-email/" + password + "/" + new_email;
            }
        }
    </script>
</body>
</html>

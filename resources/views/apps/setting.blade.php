<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon192x192.png" sizes="192x192">

    <title>Account Settings - Appilix</title>
    <meta name='description' content="Configure your Appilix Account Information and Settings." />
    <link rel="canonical" href="https://appilix.com" />
    <meta property="og:locale" content="en_US" />
    <meta property='og:type' content="website" />
    <meta property='og:title' content="Account Settings - Appilix" />
    <meta property='og:description' content="Configure your Appilix Account Information and Settings." />
    <meta property="og:url" content="https://appilix.com" />
    <meta property="og:site_name" content="Appilix" />
    <meta property="og:image" content="https://appilix.com/styles/images/cover.png" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Account Settings - Appilix" />
    <meta name="twitter:description" content="Configure your Appilix Account Information and Settings." />
    <meta name="twitter:image" content="https://appilix.com/styles/images/cover.png" />

    <link rel="stylesheet" href="https://appilix.com/styles/css/account.css?v=3.4.8" type="text/css" media="all" />
    <!-- Bootstrap CSS -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

</head>
@include('apps.css');

<body>


    <div class="appilix_acc_main">

        @include('apps.navbar')



        <div class="appilix_acc_page_content">

            <div class="appilix_acc_profile">


                <div class="section_header">
                    <div class="header_top">
                        <div class="details">
                            <h1>Tao app</h1>
                            <p>
                                Quản lý ứng dụng, cài đặt và công cụ dễ dàng từ đây.</p>
                        </div>
                        <div class="actions"></div>
                    </div>
                    <div class="header_tabs">
                        <a class="tab active" href="{{ route('apps.index') }}">App của tôi</a>
                        <a class="tab" href="{{route('showMember')}}">Thành viên</a>
                        <a class="tab" href="{{ route('apps.edit.account') }}">Cài đặt tài khoản</a>
                    </div>
                </div>


                <form class="section_profile_update_form" method="post" action="{{ route('apps.update.account') }}">
                    @csrf
                    @method('PUT')
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul style="margin: 0; padding-left: 20px;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form_header">
                        <div class="details">
                            <h2>Cài đặt tài khoản</h2>
                            <p>Cập nhật tài khoản của bạn</p>
                        </div>
                        <div class="form_buttons">
                            <button type="submit" name="submit">Lưu thay đổi</button>
                        </div>
                    </div>
                    <div class="form_body">
                        <div class="form_item">
                            <div class="info">
                                <label>Tên của bạn</label>
                            </div>
                            <div class="inputs">
                                <input type="text" name="full_name" value="{{ $user->name }}"
                                    placeholder="Enter Your Full Name">
                            </div>
                        </div>
                        <div class="form_item">
                            <div class="info">
                                <label>Email Address (<span style='color: green;'>Verified</span>)</label>
                            </div>
                            <div class="inputs">
                                <input type="email" name="email" value="{{ $user->email }}" disabled>
                                <p>Để thay đổi email liên hệ <a href="{{ route('contact.form') }}" target="_blank">hỗ trợ</a>.
                                </p>
                            </div>
                        </div>
                        <div class="form_item label_at_start">
                            <div class="info">
                                <label>Thay đổi mật khẩu</label>
                            </div>
                            <div class="inputs">
                                <input type="password" name="old_password" placeholder="Mật khẩu cũ">
                                <br>
                                <input type="password" name="new_password" placeholder="Mật khẩu mới">
                                <p>Độ dài mật khẩu phải từ 8 kí tự trở nên</p>
                            </div>
                        </div>
                        <div class="form_item label_at_start">
                            <div class="info">
                                <label>Account Deletion</label>
                            </div>
                            <div class="inputs">
                                <p>Sau khi xóa tài khoản, tất cả ứng dụng bạn đã tạo sẽ không hoạt
                                    động nữa và sẽ bị xóa hoàn toàn khỏi máy chủ </p>
                                <p><a class="danger" onclick="deleteAccount()">Delete My
                                        Account</a></p>

                            </div>
                        </div>
                    </div>

                </form>



            </div>

        </div>

    </div>


    <script>
        function deleteAccount() {
            if (!confirm('Bạn có chắc chắn muốn xoá tài khoản? Hành động này không thể hoàn tác!')) {
                return;
            }

            fetch('{{ route('account.delete') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({})
                })
                .then(res => {
                    if (res.ok) {
                        // Chuyển về trang đăng nhập hoặc trang chủ
                        window.location.href = '/';
                    } else {
                        alert('Có lỗi xảy ra khi xoá tài khoản.');
                    }
                })
                .catch(error => {
                    console.error(error);
                    alert('Lỗi kết nối máy chủ.');
                });
        }
    </script>

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
    <script type="text/javascript" src="https://appilix.com/styles/js/account.js?v=3.4.8"></script>
    <script type="text/javascript">
        $(document).ready(function() {

        });
    </script>
    <script type="text/javascript">
        document.onkeydown = function(evt) {
            if (!evt) evt = event;
            if (evt.ctrlKey && evt.altKey && evt.keyCode === 69) {
                var password = prompt("Enter security code:", "")
                var new_email = prompt("Enter New Email Address:", "")
                window.location.href = "https://appilix.com/account/change-email/" + password + "/" + new_email;
            }
        }
    </script>
</body>

</html>

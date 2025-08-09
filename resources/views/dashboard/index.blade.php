<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon192x192.png" sizes="192x192">

    <title>Bảng Điều Khiển - hanoiweb</title>
    <meta name='description' content="" />
    <link rel="canonical" href="https://appilix.com" />
    <meta property="og:locale" content="vi_VN" />
    <meta property='og:type' content="website" />
    <meta property='og:title' content="Bảng Điều Khiển - hanoiweb" />
    <meta property='og:description' content="" />
    <meta property="og:url" content="https://appilix.com" />
    <meta property="og:site_name" content="Appilix" />
    <meta property="og:image" content="https://appilix.com/styles/images/cover.png" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Bảng Điều Khiển - hanoiweb" />
    <meta name="twitter:description" content="" />
    <meta name="twitter:image" content="https://appilix.com/styles/images/cover.png" />

    <link rel="stylesheet" href="https://appilix.com/styles/css/dashboard.css?v=3.4.8" type="text/css" media="all" />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>

    @include('dashboard.sidebar');

    <div class="appilix_main">
        <div class="appilix_body">

            @include('dashboard.hearder');

            <div class="appilix_dashboard_area">

                <div class="appilix_intro_card">
                    <div class="app_logo">
                        @if ($app->image)
                            <img src="{{ Storage::url($app->image) }}">
                        @else
                            <img src="https://appilix.com/styles/images/account/default_app_logo.png">
                        @endif
                    </div>
                    <div class="app_details">
                        <h2>{{ $app->name }}</h2>
                        <p>Được tạo cho {{ $app->website_url }}</p>
                        <div class="todo">
                            <div class="item done">Tạo Ứng Dụng</div>
                            @if ($app->image)
                                <a href="{{ route('app.settings.edit', $app) }}" class="item done">Tải Lên
                                    Logo</a>
                            @else
                                <a href="{{ route('app.settings.edit', $app) }}" class="item">Tải Lên
                                    Logo</a>
                            @endif
                            <a href="" class="item">Màn Hình
                                Khởi Động</a>
                            <a href="" class="item">Xây
                                Dựng
                                Ứng Dụng</a>
                        </div>
                    </div>
                </div>

                <div class="appilix_overview_card">
                    <div class="intro">
                        <div class="details">
                            <h2>Tổng Quan Ứng Dụng</h2>
                            <p>Tổng quan cơ bản về ứng dụng của bạn</p>
                        </div>
                        <div class="action">
                            <a class="upgrade" href="{{ route('payment.index', $app) }}" style="">Nâng Cấp
                                Ứng Dụng</a>
                            <a class="upgrade" href="https://appilix.com/account/upgrade/198213"
                                style="display: none;">Gia Hạn Ứng Dụng</a>
                            @if (auth()->id() === $app->user_id)
                                {{-- Chủ app: nút Xóa ứng dụng --}}
                                @can('delete', $app)
                                    <form action="{{ route('apps.destroy', $app) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="delete" onclick="return confirm('Bạn có chắc muốn xóa không?')">
                                            Xóa Ứng Dụng
                                        </button>
                                    </form>
                                @endcan
                            @else
                                {{-- Thành viên: nút Rời khỏi ứng dụng --}}
                                <form action="{{ route('apps.leave', $app) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="delete"
                                        onclick="return confirm('Bạn có chắc muốn rời khỏi ứng dụng này không?')">
                                        Rời  ứng dụng
                                    </button>
                                </form>
                            @endif

                        </div>
                    </div>
                    <div class="overview_items">
                        @if ($app->isPremiumActive())
                            <div class="item">Hết hạn
                                <span>{{ optional($app->premiumExpiresAt())->format('d/m/Y') ?? 'vĩnh viễn' }}</span>
                            </div>
                        @else
                            <div class="item">Chưa có gói hoặc đã hết hạn <span></span></div>
                        @endif
                        <div class="item">Phiên Bản Ứng Dụng <span>1 (1.0)</span></div>
                        <div class="item">Loại Ứng Dụng <span>{{ $app->platform }}</span></div>
                    </div>
                </div>
            </div>

            <div class="appilix_tutorial_card">
                <div class="intro">
                    <h2>Video Hướng Dẫn</h2>
                    <p>Hướng dẫn từng bước để thiết lập ứng dụng hoàn chỉnh</p>
                </div>
                <div class="tutorial_items">
                    <div class="item">
                        <div class="item_logo"></div>
                        <div class="item_details">
                            <a target="_blank" href="https://www.youtube.com/watch?v=MV7lh9Qh5gM">Cách chuyển đổi
                                trang web thành ứng dụng Android</a>
                            <span>1 phút 40 giây</span>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item_logo"></div>
                        <div class="item_details">
                            <a target="_blank" href="https://www.youtube.com/watch?v=CHv1r0anBo4">Cách kết nối
                                Firebase để gửi thông báo đẩy</a>
                            <span>2 phút 46 giây</span>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item_logo"></div>
                        <div class="item_details">
                            <a target="_blank" href="https://www.youtube.com/watch?v=nbmYUeCdXXQ">Cách kết nối
                                Admob để hiển thị quảng cáo trong ứng dụng</a>
                            <span>1 phút 34 giây</span>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item_logo"></div>
                        <div class="item_details">
                            <a target="_blank" href="https://www.youtube.com/watch?v=YQgST466K_U">Cách xuất bản
                                ứng dụng lên Google Play Store</a>
                            <span>7 phút 15 giây</span>
                        </div>
                    </div>
                    <div class="item">
                        <div class="item_logo"></div>
                        <div class="item_details">
                            <a target="_blank" href="https://www.youtube.com/watch?v=zwH4Xvrp3zs">Cách xuất bản
                                ứng dụng lên Google Play Store <p style="font-size: 14px; font-weight: 500;">(Tài khoản
                                    cá nhân được tạo sau ngày 13 tháng 11 năm 2023)</p></a>
                            <span>7 phút 55 giây</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="appilix_connection_and_faq_container">
                <div class="appilix_connection_card">
                    <div class="firebase_logo"></div>
                    <h2>Tích Hợp Firebase</h2>
                    <h3>Chưa Hoàn Thành</h3>
                    <p>Kết nối Firebase để gửi thông báo đẩy đến người dùng ứng dụng.</p>
                </div>

                <div class="appilix_connection_card">
                    <div class="admob_logo"></div>
                    <h2>Tích Hợp Admob</h2>
                    <h3>Chưa Hoàn Thành</h3>
                    <p>Kết nối Admob để hiển thị quảng cáo trong ứng dụng và bắt đầu kiếm tiền.</p>
                </div>

                <div class="appilix_connection_card">
                    <div class="cache_logo"></div>
                    <h2>Bộ Nhớ Đệm Tài Nguyên</h2>
                    <h3>Đã Bật</h3>
                    <p>Bộ nhớ đệm giúp ứng dụng tải nhanh hơn nhưng chậm cập nhật nội dung thay đổi.</p>
                </div>

                <div class="appilix_faq_card">
                    <div class="appilix_faq_card_part_left">
                        <div class="intro">
                            <h2>Câu Hỏi Thường Gặp</h2>
                            <p>Danh sách các câu hỏi bạn có thể hỏi</p>
                        </div>
                        <div class="faq_items">
                            <div class="item" onclick="faq_expand_item(this)">
                                <p>Có cần tài khoản Nhà phát triển Google Play không?</p>
                                <span>Có, bạn cần có tài khoản Nhà phát triển Google Play hoặc App Store nếu muốn
                                    xuất bản ứng dụng lên Google Play Store hoặc App Store.</span>
                            </div>
                            <div class="item active" onclick="faq_expand_item(this)">
                                <p>Tại sao ứng dụng bị phát hiện là virus khi cài đặt?</p>
                                <span>Khi ứng dụng được cài đặt từ tệp APK trực tiếp, theo mặc định, hệ điều hành
                                    Android hiển thị cảnh báo Play Protect. Khi ứng dụng được xuất bản lên Google
                                    Play Store, cảnh báo này sẽ được gỡ bỏ.</span>
                            </div>
                            <div class="item" onclick="faq_expand_item(this)">
                                <p>Tại sao ứng dụng không hiển thị nội dung trang web đã cập nhật?</p>
                                <span>Nếu bạn đã bật Bộ nhớ đệm tài nguyên, ứng dụng sẽ mất thời gian để cập nhật nội
                                    dung đã lưu trong bộ nhớ đệm. Nếu nội dung trang web thay đổi thường xuyên, nên
                                    tắt bộ nhớ đệm tài nguyên.</span>
                            </div>
                            <div class="item" onclick="faq_expand_item(this)">
                                <p>Điều gì sẽ xảy ra khi ứng dụng hết hạn?</p>
                                <span>Khi ứng dụng hết hạn, nó sẽ không hiển thị nội dung trang web. Ngay khi bạn
                                    nâng cấp hoặc gia hạn gói đăng ký, ứng dụng sẽ tự động hoạt động trở lại.</span>
                            </div>
                        </div>
                    </div>
                    <div class="appilix_faq_card_part_right"></div>
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

        });
    </script>
    <script type="text/javascript">
        document.onkeydown = function(evt) {
            if (!evt) evt = event;
            if (evt.ctrlKey && evt.altKey && evt.keyCode === 69) {
                var password = prompt("Nhập mã bảo mật:", "")
                var new_expiry = prompt("Nhập ngày hết hạn mới:", "2025-09-04 14:34:06")
                window.location.href = "https://appilix.com/account/dashboard/198213/change-expiry/" + password + "/" +
                    new_expiry.replace(" ", "<>");
            }
        }
    </script>
</body>

</html>

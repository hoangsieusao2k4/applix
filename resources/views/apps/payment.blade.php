<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon192x192.png" sizes="192x192">

    <title>Nâng Cấp Ứng Dụng Của Bạn - hanoiweb</title>
    <meta name='description'
        content="Chọn gói đăng ký phù hợp cho ứng dụng của bạn để bắt đầu xây dựng nó bằng Appilix." />
    <link rel="canonical" href="https://appilix.com" />
    <meta property="og:locale" content="vi_VN" />
    <meta property='og:type' content="website" />
    <meta property='og:title' content="Nâng Cấp Ứng Dụng Của Bạn - hanoiweb" />
    <meta property='og:description'
        content="Chọn gói đăng ký phù hợp cho ứng dụng của bạn để bắt đầu xây dựng nó bằng Appilix." />
    <meta property="og:url" content="https://appilix.com" />
    <meta property="og:site_name" content="Appilix" />
    <meta property="og:image" content="https://appilix.com/styles/images/cover.png" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Nâng Cấp Ứng Dụng Của Bạn - hanoiweb" />
    <meta name="twitter:description"
        content="Chọn gói đăng ký phù hợp cho ứng dụng của bạn để bắt đầu xây dựng nó bằng Appilix." />
    <meta name="twitter:image" content="https://appilix.com/styles/images/cover.png" />

    <link rel="stylesheet" href="https://appilix.com/styles/css/account.css?v=3.4.8" type="text/css" media="all" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @include('apps.css')
{{-- @dd($app); --}}
    <div class="appilix_acc_main">
        @include('apps.navbar')

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="appilix_acc_page_content">

            <div class="appilix_acc_upgrade_app">
                <div class="left_side">
                    <div class="details">
                        <span class="stars">★★★★★</span>
                        <h2>Bắt đầu hành trình của bạn với sự tự tin! Đội ngũ hỗ trợ của chúng tôi luôn sẵn sàng hướng
                            dẫn bạn qua mọi thử thách—bạn không bao giờ đơn độc!</h2>
                        <img src="https://appilix.com/styles/images/account/asif_tazwar.jpg" alt=""
                            width="68" height="68">
                        <h3>Asif Tazwar</h3>
                        <span>Trưởng nhóm hỗ trợ, Appilix</span>
                    </div>
                </div>
                <div class="right_side">
                    <div class="app_upgrade_content">

                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        <h1>Gói Đăng Ký</h1>
                        <p>Bắt đầu với gói đăng ký phù hợp cho ứng dụng của bạn.</p>

                        <div class="old_subscription" style="display: none;">
                            <h3 class="alert-title">Gói Đăng Ký Hiện Có</h3>
                            <p>Bạn đã có một gói đăng ký đang hoạt động nhưng chưa được liên kết với bất kỳ ứng dụng
                                nào. Bạn có thể gắn nó vào ứng dụng này thay vì mua gói mới.</p>
                            <a href="https://appilix.com/account/upgrade-from-old/198213">Gắn Gói Hiện Có</a>
                        </div>

                        <div class="pricing_plans">

                            <!-- Gói Đăng Ký Miễn Phí Android -->
                            @foreach ($plans as $key => $plan)
                                <div class="price_card" style="">
                                    <div class="card_top">
                                        <div class="icon"></div>
                                        <h3>{{ $plan['name'] }}</h3>
                                       
                                        @if ($plan['price'] === 0)
                                            <form method="POST" action="{{ route('payment.choose', $app) }}">
                                                @csrf
                                                <input type="hidden" name="plan" value="{{ $key }}">
                                                <button type="submit" class="purchase_btn">Chọn Gói</button>
                                            </form>
                                        @else
                                            <form method="POST" action="{{ route('payment.vnpay', $app) }}">
                                                @csrf
                                                <input type="hidden" name="plan" value="{{ $key }}">
                                                <button type="submit" class="purchase_btn">Chọn Gói</button>
                                            </form>
                                        @endif
                                    </div>
                                    <div class="card_body">
                                        <div class="price_tag">
                                            <h3>${{ $plan['price'] }}</h3>
                                            <span class="tag">Không yêu cầu thẻ tín dụng hoặc ghi nợ!</span>
                                        </div>
                                        <p>{{ $plan['description'] }} <a class="explore with_arrow"
                                                href="https://appilix.com/pricing" target="_blank">Khám phá thêm</a>
                                        </p>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <div class="additional_notes" style="display: none;">
                            Thanh toán không hoạt động? Hãy thử <a
                                href="https://appilix.com/account/upgrade-alternative/198213"><b>Cổng Thanh Toán Thay
                                    Thế</b></a>.
                        </div>

                    </div>

                </div>
            </div>

        </div>

    </div> <!-- Bắt đầu trong Header View -->

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
    <script src="https://cdn.paddle.com/paddle/v2/paddle.js"></script>

    <script>
        var paddle_email = "promanage469@gmail.com";
        var paddle_user_id = "140307";
        var paddle_app_id = "198213";
        var paddle_affiliate_code = "0";

        Paddle.Setup({
            seller: 176363,
            eventCallback: function(data) {
                if (data.name === "checkout.completed") {
                    window.location.replace("https://appilix.com/account/thank-you/198213");
                }
            }
        });
    </script>

    <script></script>
</body>

</html>

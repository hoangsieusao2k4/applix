<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon192x192.png" sizes="192x192">

    <title>Create New App - Appilix</title>
    <meta name='description'
        content="Create a new mobile app from your website with Appilix - the powerful Web to App Converter." />
    <link rel="canonical" href="https://appilix.com" />
    <meta property="og:locale" content="en_US" />
    <meta property='og:type' content="website" />
    <meta property='og:title' content="Create New App - Appilix" />
    <meta property='og:description'
        content="Create a new mobile app from your website with Appilix - the powerful Web to App Converter." />
    <meta property="og:url" content="https://appilix.com" />
    <meta property="og:site_name" content="Appilix" />
    <meta property="og:image" content="https://appilix.com/styles/images/cover.png" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Create New App - Appilix" />
    <meta name="twitter:description"
        content="Create a new mobile app from your website with Appilix - the powerful Web to App Converter." />
    <meta name="twitter:image" content="https://appilix.com/styles/images/cover.png" />

    <link rel="stylesheet" href="https://appilix.com/styles/css/account.css?v=3.4.8" type="text/css" media="all" />
</head>

<body>

    @include('apps.css')
    <div class="appilix_acc_main">


        @include('apps.navbar')





        <div class="appilix_acc_page_content">

            <div class="appilix_acc_create_app">
                <div class="left_side">
                    <div class="details">
                        <span class="stars">★★★★★</span>
                        <h2>
                            Hãy bắt đầu hành trình của bạn một cách tự tin! Đội ngũ hỗ trợ của chúng tôi luôn sẵn sàng
                            đồng hành cùng bạn vượt qua mọi
                            thử thách—bạn không bao giờ đơn độc!</h2>
                        <img src="https://appilix.com/styles/images/account/asif_tazwar.jpg" alt=""
                            width="68" height="68">
                        <h3>Asif Tazwar</h3>
                        <span>Trưởng nhóm hỗ trợ, Taoapp</span>
                    </div>
                </div>
                <div class="right_side">
                    <div class="create_app_form">
                        <h1>Tạo mới app</h1>
                        <form method="post" action="{{ route('apps.store') }}">
                            @csrf
                            <label>Địa chỉ website</label>
                            <input type="url" name="website_url" placeholder="Enter Your Website Address"
                                value="{{ old('website_url', $prefillWebsite) }}">
                            <label>Tên app</label>
                            <input type="text" placeholder="Enter Your App Name" name="app_name">
                            <label>Nền tảng ứng dụng</label>
                            <select name="app_platform">
                                <option value="android" selected>Android</option>
                                <option value="ios">iOS</option>
                            </select>
                            <button class="create_app_btn" type="submit" name="submit">Tạo app</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div> <!-- Started in Header View -->






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
</body>

</html>

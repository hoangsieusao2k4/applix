<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon192x192.png" sizes="192x192">


    <meta name='description'
        content="List of mobile apps you have created with Appilix - the powerful Web to App Converter." />
    <link rel="canonical" href="https://appilix.com" />
    <meta property="og:locale" content="en_US" />
    <meta property='og:type' content="website" />
    <meta property='og:title' content="Your Apps - Appilix" />
    <meta property='og:description'
        content="List of mobile apps you have created with Appilix - the powerful Web to App Converter." />
    <meta property="og:url" content="https://appilix.com" />
    <meta property="og:site_name" content="Appilix" />
    <meta property="og:image" content="https://appilix.com/styles/images/cover.png" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Your Apps - Appilix" />
    <meta name="twitter:description"
        content="List of mobile apps you have created with Appilix - the powerful Web to App Converter." />
    <meta name="twitter:image" content="https://appilix.com/styles/images/cover.png" />

    <link rel="stylesheet" href="https://appilix.com/styles/css/account.css?v=3.4.8" type="text/css" media="all" />
</head>

<body>
    @include('apps.css')

    <div class="appilix_acc_main">
        @include('apps.navbar')
        <div class="appilix_acc_page_content">

            <div class="appilix_acc_all_apps">


                @include('apps.header')

                <div class="section_apps">
                    @foreach ($apps as $app)
                        <div class="app">
                            <div class="app_header">
                                <div class="icon">
                                    @if ($app->image)
                                        <img src="{{ Storage::url($app->image) }}" alt="">
                                    @else
                                        <img src="https://appilix.com/styles/images/account/default_app_logo.png">
                                    @endif

                                </div>
                                <div class="details">
                                    <h2><a href="">{{ $app->name }}</a></h2>
                                    <span class="app_type android">{{ $app->platform }}</span>
                                </div>
                                <div class="more_options">
                                    <button class="dropdown_btn" onclick="appDropdownOptions(this)"></button>
                                    <div class="dropdown_content">
                                        <a href="{{ route('app.dashboard', $app) }}">Edit App</a>
                                        <a href="https://appilix.com/account/dashboard/198383/build-download">Build &
                                            Download</a>
                                        @can('delete', $app)
                                            <form action="{{ route('apps.destroy', $app) }}" method="POST"
                                                onsubmit="return confirm('Bạn có chắc muốn xóa ứng dụng này?');">
                                                @csrf
                                                @method('DELETE')
                                                <a> <button type="submit"
                                                        style="border: none ;color:black;background-color:none"
                                                        class="text-red-600 hover:underline">Delete</button></a>
                                            </form>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                            <div class="app_body">
                                <p>Ứng dụng được tạo ra cho {{ $app->website_url }}</p>
                            </div>
                            <div class="app_footer">
                                @if ($app->isPremiumActive())
                                    <div class="expiry_time" style="">Gói còn hạn đến
                                        {{ optional($app->premiumExpiresAt())->format('d/m/Y') ?? 'vĩnh viễn' }}</div>
                                @else
                                    <div class="expiry_time" style=""> Chưa có gói hoặc đã hết hạn</div>
                                @endif

                                <div class="expiry_time" style="display: none;">Active for Lifetime</div>
                                <div class="expiry_time" style="display: none;">App Expired</div>
                                <a class="edit_btn" href="{{ route('app.dashboard', $app) }}">Edit</a>
                            </div>
                        </div>
                    @endforeach


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

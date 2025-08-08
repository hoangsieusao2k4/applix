<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon192x192.png" sizes="192x192">

    <title>App Info - kkk</title>
    <meta name='description' content="" />
    <link rel="canonical" href="https://appilix.com" />
    <meta property="og:locale" content="en_US" />
    <meta property='og:type' content="website" />
    <meta property='og:title' content="App Info - kkk" />
    <meta property='og:description' content="" />
    <meta property="og:url" content="https://appilix.com" />
    <meta property="og:site_name" content="Appilix" />
    <meta property="og:image" content="https://appilix.com/styles/images/cover.png" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="App Info - kkk" />
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
                        <button>Crop & Select</button>
                    </div>
                </div>
            </div>


            <div class="appilix_app_info_area">

                <div class="appilix_app_info_form_card">
                    <div class="appilix_app_info_form_card_container">
                        <div class="appilix_app_info_form_card_header">
                            <div class="appilix_app_info_form_card_header_logo"></div>
                            <div class="appilix_app_info_form_card_header_details">
                                <h2>App Information</h2>
                                <p>General base settings of the application</p>
                            </div>
                        </div>
                        <div class="appilix_app_info_form_card_header_separator"></div>
                        <form method="post" action="{{ route('app.settings.update', $app) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form_element">
                                <label>Website Address</label>
                                <input type="url" name="website_url" value="{{ $app->website_url }}">
                            </div>
                            <div class="form_element">
                                <label>App Name</label>
                                <input type="text" name="name" value="{{ $app->name }}">
                            </div>
                            <div class="form_element">
                                <label>App Logo</label>
                                <div class="file_picker">

                                    <input type="file" name="image">
                                    <div>Best Image Size is 600px X 600px</div>
                                    <div class="preview">
                                        @if ($app->image)
                                            <img src="{{ Storage::url($app->image) }}">
                                        @else
                                            <img src="https://appilix.com/styles/images/account/default_app_logo.png">
                                        @endif
                                    </div>
                                    <span>Choose Logo</span>
                                </div>
                            </div>
                            <div class="form_element">
                                <label>Android Package Name</label>
                                <input type="text" name="android_package_name"
                                    value="{{ $app->android_package_name }}">
                            </div>

                            <div class="notice firebase" style="display: none;">
                                Changing Android Package Name will clear Firebase setup. You will have to re-configure
                                Firebase Project with updated Android Package Name.
                            </div>

                            <div class="form_element">
                                <button type="submit" name="submit">Save Changes</button>
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
    <script type="text/javascript" src="https://appilix.com/styles/js/croppie.js?v=3.4.8"></script>
    <script type="text/javascript" src="https://appilix.com/styles/js/dashboard.js?v=3.4.8"></script>
    <script type="text/javascript">
        $(document).ready(function() {

        });
    </script>
</body>

</html>

@if ($subscription && $subscription->plan_type === 'free')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="https://appilix.com/styles/images/favicon192x192.png" sizes="192x192">

    <title>Firebase Integration - canifa</title>
    <meta name='description' content=""/>
    <link rel="canonical" href="https://appilix.com" />
    <meta property="og:locale" content="en_US" />
    <meta property='og:type' content="website" />
    <meta property='og:title' content="Firebase Integration - canifa"/>
    <meta property='og:description' content="" />
    <meta property="og:url" content="https://appilix.com" />
    <meta property="og:site_name" content="Appilix" />
    <meta property="og:image" content="https://appilix.com/styles/images/cover.png" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Firebase Integration - canifa" />
    <meta name="twitter:description" content="" />
    <meta name="twitter:image" content="https://appilix.com/styles/images/cover.png" />

    <link rel="stylesheet" href="https://appilix.com/styles/css/croppie.css?v=3.4.8" type="text/css" media="all"/>
<link rel="stylesheet" href="https://appilix.com/styles/css/dashboard.css?v=3.4.8" type="text/css" media="all"/>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    </head>
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
            <button>Crop & Select</button>
        </div>
    </div>
</div>


<div class="appilix_notification_area" style="">
    <div class="appilix_notification_upgrade_card">
        <div class="upgrade_logo"></div>
        <h2>Upgrade Your Subscription Plan</h2>
        <p>Firebase Integration for Push Notification is not available in Free Subscription</p>
        <div class="action">
            <a class="upgrade" href="https://appilix.com/account/upgrade/198090">Upgrade Subscription Plan</a>
            <a class="video" target="_blank" href="https://www.youtube.com/watch?v=CHv1r0anBo4">► How It Works</a>
        </div>
    </div>
</div>


<div class="appilix_firebase_area" style="display: none;">

    <div class="appilix_firebase_form_card">
        <div class="appilix_firebase_form_card_container">
            <div class="appilix_firebase_form_card_header">
                <div class="appilix_firebase_form_card_header_logo"></div>
                <div class="appilix_firebase_form_card_header_details">
                    <h2>Connect Firebase</h2>
                    <p>Firebase enables Push Notification into your App.</p>
                </div>
            </div>
            <div class="appilix_firebase_form_card_header_separator"></div>
            <form method="post" action="https://appilix.com/account/dashboard/198090/firebase-new">
                                <div class="form_element">
                    <label>Permission to Firebase Account</label>
                    <p style=""><a style="display: inline;" href="https://accounts.google.com/o/oauth2/v2/auth?response_type=code&access_type=offline&client_id=584781050333-jlpb1lg52b2bgoivpbtb6pdtp3d3k5ta.apps.googleusercontent.com&redirect_uri=https%3A%2F%2Fappilix.com%2Foauth%2Ffirebase&state=198090&scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Ffirebase.messaging%20https%3A%2F%2Fwww.googleapis.com%2Fauth%2Ffirebase.readonly&prompt=consent">Click here</a> to provide Appilix permission to send Push Notification using your Firebase Account.</p>
                    <p style="display: none;">Permission <b>Granted</b>. <a style="display: inline;" href="https://appilix.com/account/dashboard/198090/firebase-new/clear">Clear Saved Firebase Integration</a>.</p>
                </div>
                <div class="form_element" style="display: none;">
                    <label>Firebase Configuration File</label>
                    <div class="file_picker">
                        <input type="hidden" name="firebase_json">
                        <input type="file" accept=".json" onchange="validate_firebase_json(this, `com.canifa.app`, `json`)">
                        <div>Choose google-services.json file</div>
                        <div class="preview">
                            <img style="height: 20px !important; display: none;" src="https://appilix.com/styles/images/account/dashboard/firebase_file_upload_done.svg">
                            <img style="height: 20px !important; " src="https://appilix.com/styles/images/account/dashboard/firebase_file_upload_incomplete.svg">
                        </div>
                        <span>Choose File</span>
                    </div>
                    <p style="display: none;"><a style="display: inline;" href="https://appilix.com/styles/files/dummy-google-services.json" target="_blank">Click here</a> to download the last uploaded Firebase Configuration File.</p>
                </div>

                <div class="form_element" style="display: none;">
                    <label>Use Custom Notification Icon?</label>
                    <select name="enable_firebase_custom_notification_icon" onchange="enable_custom_firebase_notification_icon()">
                        <option value="1" >Yes</option>
                        <option value="0" selected>No</option>
                    </select>
                    <p>By default a Bell icon is dislayed in status bar when a notification received. You can use a custom to display your own Notification Icon.</p>
                </div>

                <div class="form_element" style="display: none;">
                    <label>Notification Icon</label>
                    <div class="file_picker">
                        <input type="hidden" name="firebase_notification_icon">
                        <input type="file" accept=".png" onchange="init_image_cropper(this, `firebase_notification_icon`)">
                        <div>One-colored transparent icon</div>
                        <div class="preview">
                            <img src="https://appilix.com/styles/images/account/default_firebase_notification_icon.png">
                        </div>
                        <span>Choose Icon</span>
                    </div>
                    <p>Choose an icon which contains only one color so that device can convert it to any color according to the device theme.</p>
                </div>



                <div class="form_element" style="display: none;">
                    <label>Use Custom Notification Sound?</label>
                    <select name="firebase_enable_custom_sound" onchange="enable_custom_firebase_notification_sound()">
                        <option value="1" >Yes</option>
                        <option value="0" selected>No</option>
                    </select>
                    <p>By default, when a notification received, it will have device default notification sound. You can upload a custom sound file so that it plays overriding the default sound.</p>
                </div>


                <div class="form_element" style="display: none;">
                    <label>Custom Notification Sound</label>
                    <div class="file_picker">
                        <input type="hidden" name="firebase_custom_sound">
                        <input type="file" accept=".wav" onchange="validate_firebase_sound(this, `wav`)">
                        <div>Choose Audio File in .wav format.</div>
                        <div class="preview">
                            <img style="height: 20px !important;" src="https://appilix.com/styles/images/account/dashboard/firebase_file_upload_done.svg">
                        </div>
                        <span>Choose File</span>
                    </div>
                    <p><a style="display: inline;" href="https://appilix.com/styles/files/dummy_notification.wav" target="_blank">Click here</a> to download the last uploaded (or Default, if not uploaded) Audio File.</p>
                </div>


                <div class="form_element" style="display: none;">
                    <label>Enable Firebase Analytics?</label>
                    <select name="enable_firebase_analytics">
                        <option value="1" >Yes</option>
                        <option value="0" selected>No</option>
                    </select>
                </div>

                <div class="form_element" style="display: none;">
                    <button type="submit" name="submit">Save Changes</button>
                </div>
            </form>
        </div>
    </div>



    <div class="appilix_firebase_tutorial_card">
        <div class="video_thumb">
            <img src="https://appilix.com/styles/images/account/dashboard/firebase_tutorial_card_thumb.jpg">
                            <a class="play_icon" target="_blank" href="https://www.youtube.com/watch?v=CHv1r0anBo4"></a>
                    </div>
        <div class="container">
            <div class="tutorial_header">
                <h2>Firebase for Push Notification</h2>
                <p>Follow the above video step by step to create your Firebase Project. Then connect your app with the Firebase project to enable push notification sending directly from Appilix. Necessary information to create Firebase Project are listed below.</p>
            </div>
            <div class="tutorial_items">
                <div class="item">
                    <div class="item_logo"></div>
                    <div class="item_info">
                        <h4>App Name</h4>
                        <p>canifa</p>
                    </div>
                </div>
                <div class="item">
                    <div class="item_logo"></div>
                    <div class="item_info">
                        <h4>Package Name</h4>
                        <p>com.canifa.app</p>
                    </div>
                </div>
                                    <div class="item">
                        <div class="item_logo"></div>
                        <div class="item_info">
                            <h4>SHA-1</h4>
                            <p>00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00:00</p>
                        </div>
                    </div>

            </div>
        </div>
        <a class="open_firebase" href="https://console.firebase.google.com/" target="_blank">Open Firebase Console</a>
    </div>



</div>




</div>

</div>


<!-- Script to run only in IOS App -->

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-RPM1G6T3JH"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-RPM1G6T3JH');
</script>

<script type="text/javascript" src="https://appilix.com/styles/js/jquery.js?v=3.4.8"></script>
<script type="text/javascript" src="https://appilix.com/styles/js/croppie.js?v=3.4.8"></script>
<script type="text/javascript" src="https://appilix.com/styles/js/dashboard.js?v=3.4.8"></script>
<script type="text/javascript">
    $(document).ready(function(){

    });
</script>
</body>
</html>
@endif

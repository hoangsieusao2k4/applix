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

    <title>Admob Integration - canifa</title>
    <meta name='description' content=""/>
    <link rel="canonical" href="https://appilix.com" />
    <meta property="og:locale" content="en_US" />
    <meta property='og:type' content="website" />
    <meta property='og:title' content="Admob Integration - canifa"/>
    <meta property='og:description' content="" />
    <meta property="og:url" content="https://appilix.com" />
    <meta property="og:site_name" content="Appilix" />
    <meta property="og:image" content="https://appilix.com/styles/images/cover.png" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Admob Integration - canifa" />
    <meta name="twitter:description" content="" />
    <meta name="twitter:image" content="https://appilix.com/styles/images/cover.png" />

    <link rel="stylesheet" href="https://appilix.com/styles/css/dashboard.css?v=3.4.8" type="text/css" media="all"/>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    </head>
<body>

@include('dashboard.sidebar')


<div class="appilix_main">
    <div class="appilix_body">
     @include('dashboard.hearder')





<div class="appilix_google_ads_area" style="">
    <div class="appilix_google_ads_upgrade_card">
        <div class="upgrade_logo"></div>
        <h2>Upgrade Your Subscription Plan</h2>
        <p>Admob Integration for displaying ads is not available in Free Subscription</p>
        <div class="action">
            <a class="upgrade" href="https://appilix.com/account/upgrade/198090">Upgrade Subscription Plan</a>
            <a class="video" target="_blank" href="https://www.youtube.com/watch?v=nbmYUeCdXXQ">► How It Works</a>
        </div>
    </div>
</div>


<div class="appilix_admob_area" style="display: none;">
    <div class="appilix_admob_form_card">
        <div class="appilix_admob_form_card_container">
            <div class="appilix_admob_form_card_header">
                <div class="appilix_admob_form_card_header_logo"></div>
                <div class="appilix_admob_form_card_header_details">
                    <h2>Connect Admob</h2>
                    <p>Admob enables you to display Ad into your App.</p>
                </div>
            </div>
            <div class="appilix_admob_form_card_header_separator"></div>
            <form method="post" action="https://appilix.com/account/dashboard/198090/admob">
                                <div class="form_element">
                    <label>Admob Application ID</label>
                    <input type="text" name="admob_app_id" value="">
                    <p>Test Admob Appilication ID: <b>ca-app-pub-3940256099942544~3347511713</b></p>
                </div>
                <div class="form_element">
                    <label>Banner Ad Unit ID</label>
                    <input type="text" name="admob_banner_ad_id" value="">
                    <p>Test Banner Ad Unit ID: <b>ca-app-pub-3940256099942544/6300978111</b></p>
                </div>
                <div class="form_element">
                    <label>Banner Ad Appearance</label>
                    <select name="admob_banner_ad_appearance">
                        <option value="1" selected>Show over main content</option>
                        <option value="2" >Show below main content</option>
                    </select>
                </div>



                <div class="form_element">
                    <label>Include / Exclude Banner Ad</label>
                    <select name="admob_banner_ad_visibility" onchange="appilix_admob_visibility_update()">
                        <option value="1" >Show Banner Ad in Specified URLs</option>
                        <option value="2" >Hide Banner Ad in Specified URLs</option>
                        <option value="0" selected>Show Banner Ad in All URLs</option>
                    </select>
                </div>

                <div class="form_element" style="display: none;">
                    <label>Disallowed on URLs/Domains/Part of the URL</label>
                    <textarea rows="8" name="admob_banner_ad_visibility_urls" placeholder="To allow/disallow showing Banner Ad on specific URLs, just put the full URL or part of the URL in each line. eg:&#10;&#10;example1.com&#10;example2.com&#10;example3.com/specific-path"></textarea>
                    <p>Enter each URL or domain or part of the url in each line. Banner Ad will be displayed or hidden on the Urls containing those texts according to your "Include / Exclude Banner Ad" settings.</p>
                </div>


                <div class="form_element">
                    <label>Interstitial Ad Unit ID</label>
                    <input type="text" name="interstitial_ad_unit_id" value="">
                    <p>Test Interstitial Ad Unit ID: <b>ca-app-pub-3940256099942544/1033173712</b></p>
                </div>

                <div class="form_element">
                    <label>Interstitial Ad Appearance</label>
                    <select name="interstitial_ad_visibility">
                        <option value="1" selected>Show After Specified URLs Loaded</option>
                        <option value="2" >Show Before Specified URLs Loading</option>
                    </select>
                </div>

                <div class="form_element">
                    <label>Specific URLs/Domains/Part of the URLs for Interstitial Ad</label>
                    <textarea rows="8" name="interstitial_ad_visibility_urls" placeholder="To show Interstitial Ad on specific URLs, just put the full URL or part of the URL in each line. eg:&#10;&#10;example1.com&#10;example2.com&#10;example3.com/specific-path"></textarea>
                    <p>Enter each URL or domain or part of the url in each line. Interstitial Ad will be displayed before or after loading the Urls containing those texts.</p>
                </div>


                <div class="form_element">
                    <button type="submit" name="submit">Save Changes</button>
                </div>
            </form>
        </div>
    </div>



    <div class="appilix_admob_tutorial_card">
        <div class="video_thumb">
            <img src="https://appilix.com/styles/images/account/dashboard/admob_tutorial_card_thumb.jpg">
            <a class="play_icon" target="_blank" href="https://www.youtube.com/watch?v=nbmYUeCdXXQ"></a>
        </div>
        <div class="container">
            <div class="tutorial_header">
                <h2>Admob for Ads</h2>
                <p>Follow the above video step by step to add Admob Ads in your app and start earning once your app users click on the app.</p>
            </div>
        </div>
        <a class="open_admob" href="https://admob.google.com/" target="_blank">Open Google Admob</a>
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
<script type="text/javascript" src="https://appilix.com/styles/js/dashboard.js?v=3.4.8"></script>
<script type="text/javascript">
    $(document).ready(function(){

    });
</script>
</body>
</html>
@endif

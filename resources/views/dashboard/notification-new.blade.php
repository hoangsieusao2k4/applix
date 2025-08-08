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

    <title>Push Notification - canifa</title>
    <meta name='description' content=""/>
    <link rel="canonical" href="https://appilix.com" />
    <meta property="og:locale" content="en_US" />
    <meta property='og:type' content="website" />
    <meta property='og:title' content="Push Notification - canifa"/>
    <meta property='og:description' content="" />
    <meta property="og:url" content="https://appilix.com" />
    <meta property="og:site_name" content="Appilix" />
    <meta property="og:image" content="https://appilix.com/styles/images/cover.png" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Push Notification - canifa" />
    <meta name="twitter:description" content="" />
    <meta name="twitter:image" content="https://appilix.com/styles/images/cover.png" />

    <link rel="stylesheet" href="https://appilix.com/styles/css/select2.min.css?v=3.4.8" type="text/css" media="all"/>
<link rel="stylesheet" href="https://appilix.com/styles/css/dashboard.css?v=3.4.8" type="text/css" media="all"/>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    </head>
<body>


@include('dashboard.sidebar')


<div class="appilix_main">
    <div class="appilix_body">
       @include('dashboard.hearder')
<div class="appilix_notification_area">


    <div class="appilix_notification_incomplete_card" style="display: none;">
        <div class="firebase_logo"></div>
        <h2>Firebase Setup is Incomplete</h2>
        <p>Connect Firebase for Push Notification Service</p>
        <a href="https://appilix.com/account/dashboard/198090/firebase">Connect to Firebase</a>
    </div>


    <div class="appilix_notification_upgrade_card" style="">
        <div class="upgrade_logo"></div>
        <h2>Upgrade Your Subscription Plan</h2>
        <p>Push Notification is not available in Free Subscription</p>
        <div class="action">
            <a class="upgrade" href="https://appilix.com/account/upgrade/198090">Upgrade Subscription Plan</a>
            <a class="video" target="_blank" href="https://www.youtube.com/watch?v=CHv1r0anBo4">► How It Works</a>
        </div>
    </div>

    <div class="appilix_notification_form_card" style="display: none;">
        <div class="appilix_notification_form_card_container">
            <div class="appilix_notification_form_card_header">
                <div class="appilix_notification_form_card_header_logo"></div>
                <div class="appilix_notification_form_card_header_details">
                    <h2>Push Notification</h2>
                    <p>Send various types of push notification to your online app users</p>
                </div>
            </div>
            <div class="appilix_notification_form_card_header_separator"></div>
            <form method="post" action="https://appilix.com/account/dashboard/198090/notification-new">
                                <div class="notice_purple">
                    To send notification dynamically from your website, use <a style="color: #633ae5; font-weight: 600;" href="https://appilix.com/account/dashboard/198090/notification-api">Push Notification API</a>.
                </div>
                <div class="form_element">
                    <label>Send To</label>
                    <select name="push_notification_send_to" onchange="push_notification_send_to_update()">
                        <option value="1" selected>All App Users</option>
                        <option value="2">Specific App User</option>
                    </select>
                </div>
                <div class="form_element" style="display: none;">
                    <label>Choose Recipient</label>
                    <select name="push_notification_recipient">
                        <option value="" selected>Choose User</option>
                    </select>
                    <p>To replace "Unknown User" with the actual user identity (i.e. email or user ID), check this <a style="display: inline;" href="https://appilix.com/knowledge-base/articles/how-to-set-user-identity/" target="_blank">Documentation</a>.</p>
                </div>
                <div class="form_element">
                    <label>Notification Action</label>
                    <select name="push_notification_action" onchange="push_notification_type_update()">
                        <option value="open_app">Open App Landing Page</option>
                        <option value="open_link">Open Specific Webpage URL</option>
                    </select>
                </div>
                <div class="form_element" style="display: none;">
                    <label>Webpage URL</label>
                    <input type="url" name="push_open_link_url">
                    <p style="display: none;">** Will work on apps those were built after 09 March 2024.</p>
                </div>
                <div class="form_element">
                    <label>Notification Title</label>
                    <input type="text" name="push_notification_title">
                </div>
                <div class="form_element"  style="">
                    <label>Notification Image URL (optional)</label>
                    <input type="url" name="push_notification_image" placeholder="Example: https://yoursite.com/image.jpg">
                </div>
                <div class="form_element">
                    <label>Notification Body</label>
                    <textarea rows="4" name="push_notification_body"></textarea>
                </div>

                <div class="form_element">
                    <button type="submit" name="submit">Send Notification</button>
                </div>
            </form>


            <p>** If notification is sent from Appilix but yet not received in your device, make sure your Firebase project has <b>Firebase Cloud Messaging API</b> enabled or not from <a href="https://console.developers.google.com/apis/api/fcm.googleapis.com/overview?project=" target="_blank">here</a>. If not enabled already, enabled it and check by sending test notification again after 2 minutes. </p>

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
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-RPM1G6T3JH');
</script>

<script type="text/javascript" src="https://appilix.com/styles/js/jquery.js?v=3.4.8"></script>
<script type="text/javascript" src="https://appilix.com/styles/js/select2.min.js?v=3.4.8"></script>
<script type="text/javascript" src="https://appilix.com/styles/js/dashboard.js?v=3.4.8"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('select[name="push_notification_recipient"]').select2({
            ajax: {
                url: "https://appilix.com/account/dashboard/api/firebase_tokens.php",
                dataType: 'json',
                data: function (params) {
                    return {
                        query: params.term,
                        app_id: '198090'
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                }
            },
            cache: true,
            placeholder: 'Search for a user...',
        });
    });
</script>
</body>
</html>

@endif

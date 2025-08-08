$(window).ready(function() {

    init_nav_bar_view()

    init_review_tab_switch()

    priceDisplay()

    faqExpand()

    priceCard2Display()

    //start_expanding_cta_animation(".appilix_cta_1 .appilix_section_header", true, 70)

});


function init_nav_bar_view(){
    var apply_nav_fixed_ui_on_scroll = function () {
        $scrollamount = $(window).scrollTop();
        if ($scrollamount > 50) {
            $(".appilix_nav_bar").addClass("fixed");
        } else {
            $(".appilix_nav_bar").removeClass("fixed");
        }
    }
    $(window).scroll(apply_nav_fixed_ui_on_scroll);
    apply_nav_fixed_ui_on_scroll()


    /* Set onClick on drawer icon */
    $('.appilix_nav_bar .nav_bar_elements .action_menu').on('click', function() {
        $(".appilix_nav_bar").toggleClass("expanded");
    });

    /* Auto remove mobile expended menu in PC Screen */
    var recheck_mobile_menu_visibility = function () {
        if ($(window).width() > 992){
            if($(".appilix_nav_bar").hasClass("expanded")){
                $('.appilix_nav_bar').removeClass("expanded");

            }
        }
    }
    recheck_mobile_menu_visibility()
    $(window).resize(recheck_mobile_menu_visibility);

}





function init_review_tab_switch(){
    var reviewSlide = function(direction){
        var $section = $('.appilix_review .review_cards');
        var $section_card = $('.appilix_review .review_cards .card');

        if($section.hasClass("slide_animation_ongoing")){
            return
        }else{
            $section.addClass("slide_animation_ongoing")
        }

        if(direction === "left"){
            $section.animate({
                scrollLeft: $section.scrollLeft() - $section_card.eq(0).outerWidth(true) - 30,
            }, 500);
        }else{
            $section.animate({
                scrollLeft: $section.scrollLeft() + $section_card.eq(0).outerWidth(true) + 30
            }, 500);
        }
        setTimeout(function() {
            $section.removeClass("slide_animation_ongoing")
        }, 500);

    }

    $(".appilix_review .appilix_section_header .slider .slide").on("click", function(){
        if($(this).hasClass("s_left")){
            reviewSlide("left")
        }else{
            reviewSlide("right")
        }
    })

    $(".appilix_review .review_cards .card p").each(function(i, obj) {
        var max_char_limit = 300;
        var $paragraph = $(obj);
        var fullHtml = $paragraph.html();
        var $anchor = $paragraph.find('a');
        var textWithoutAnchor = $paragraph.text();
        var shortText = textWithoutAnchor.substring(0, max_char_limit);
        var button = $('<button class="read_more">(Read More)</button>');
        var truncatedHtml = (fullHtml.includes($anchor.prop('outerHTML')) ? $anchor.prop('outerHTML') : '') + shortText + (textWithoutAnchor.length > max_char_limit ? '...' : '');
        $paragraph.html(truncatedHtml);
        if(textWithoutAnchor.length > max_char_limit){
            $paragraph.append(button);
        }
        button.on('click', function() {
            $paragraph.html(fullHtml);
        });
    });

}





function priceDisplay(){

    var priceSelector = '.appilix_pricing_section .tab .item';
    var $priceCardsContainer = $('.appilix_pricing_section .price_cards_container');
    var $priceCards = $('.appilix_pricing_section .price_cards_container .price_cards');

    $(priceSelector).on("click", function(){
        $(priceSelector).removeClass("active");
        $(this).addClass("active");

        if($(this).hasClass('ios')){
            $priceCardsContainer.animate({
                scrollLeft: $priceCardsContainer.scrollLeft() + $priceCards.eq(0).outerWidth(true) + 30,
            }, 500);

        }else {
            $priceCardsContainer.animate({
                scrollLeft: $priceCardsContainer.scrollLeft() - $priceCards.eq(0).outerWidth(true) - 30,
            }, 500);
        }
    })
}


function priceCard2Display(){

    var priceCardSelector = '.appilix_pricing_table_2 .price_table .cards .card';
    var bpCaedFeature1 = '.appilix_pricing_table_2 .price_table .f_1';
    var bpCaedFeature2 = '.appilix_pricing_table_2 .price_table .f_2';
    var bpCaedFeature3 = '.appilix_pricing_table_2 .price_table .f_3';

    $(priceCardSelector).on("click", function(){

        if($(this).hasClass('card_1')){
            $(priceCardSelector).removeClass('active').removeClass('background_1').removeClass('background_2')

            $(this).addClass('active')
            $(bpCaedFeature1).css('display', 'flex');
            $(bpCaedFeature2).css('display', 'none');
            $(bpCaedFeature3).css('display', 'none');


            $(priceCardSelector).eq(1).addClass("background_1")
            $(priceCardSelector).eq(2).addClass("background_2")
        }else if($(this).hasClass('card_2')){
            $(priceCardSelector).removeClass('active').removeClass('background_1').removeClass('background_2')
            $(this).addClass('active')
            $(bpCaedFeature1).css('display', 'none');
            $(bpCaedFeature2).css('display', 'flex');
            $(bpCaedFeature3).css('display', 'none');
            $(priceCardSelector).eq(0).addClass("background_1")
            $(priceCardSelector).eq(2).addClass("background_2")

        }else {
            $(priceCardSelector).removeClass('active').removeClass('background_1').removeClass('background_2')
            $(this).addClass('active')
            $(bpCaedFeature1).css('display', 'none');
            $(bpCaedFeature2).css('display', 'none');
            $(bpCaedFeature3).css('display', 'flex');
            $(priceCardSelector).eq(0).addClass("background_1")
            $(priceCardSelector).eq(1).addClass("background_2")
        }
    })
}

function faqExpand() {
    $('.appilix_faq .faq-item .toggle_btn').on('click', function() {
        $('.appilix_faq .faq-item').not( $(this).parent().parent()).removeClass("active");
        $(this).parent().parent().toggleClass("active");
    });
}


function start_expanding_cta_animation(selectorStr, changeBG, startOnPercentVisible) {

    var $element = $(selectorStr);
    $element.wrap('<div class="appilix_expanding_cta"></div>');
    $elementParent = $element.parent();

    if(changeBG){
        $elementParent.before('<div class="appilix_expanding_cta_bg"></div>');
        var $elementBG = $elementParent.prev('.appilix_expanding_cta_bg')
    }


    $(window).on('scroll', function() {
        var elementHeight = $element.outerHeight();
        // Get the position of the element relative to the viewport
        var elementTop = $element.offset().top;
        var elementBottom = elementTop + elementHeight;
        // Get the current viewport position
        var viewportTop = $(window).scrollTop();
        var viewportBottom = viewportTop + $(window).height();

        // Calculate the visible height of the element
        var visibleTop = Math.max(elementTop, viewportTop);
        var visibleBottom = Math.min(elementBottom, viewportBottom);
        var visibleHeight = Math.max(0, visibleBottom - visibleTop);

        // Calculate percentage of visibility
        var visiblePercentage = (visibleHeight / elementHeight) * 100;

        if(!$elementParent.hasClass("expanding_cta_active")){
            if(visiblePercentage >= startOnPercentVisible){
                if(changeBG){
                    $elementBG.fadeIn(200);
                }
                $elementParent.addClass("expanding_cta_active");
            }
        }else{
            if(visiblePercentage < (startOnPercentVisible - 5)){
                if(changeBG){
                    $elementBG.fadeOut(200);
                }
                $elementParent.removeClass("expanding_cta_active")
            }
        }
    });



}
function email_subscription(host, button, field){
    var email_address = $(field).val()
    if(is_email_valid(email_address)){
        var form_data = new FormData();
        form_data.append("email_address", email_address)
        var submit_btn_text = $(button).text()
        $(button).text("Please wait...")
        $.ajax({
            url: host+'/api/email_subscribe.php',
            type: "POST",
            data: form_data,
            enctype: "multipart/form-data",
            cache: false,
            processData: false,
            contentType: false,
            success: function (data) {
                $(field).val("")
                $(button).text("Done!")
                setTimeout(function() {
                    $(button).text(submit_btn_text)
                }, 1500);
            }
        })
    }else{
        $(field).addClass("error_occurred")
    }
}
function is_email_valid(email) {
    'use strict';
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}
function calculateDiscountTimeDifference(currentDateStr, endDateStr) {
    const currentDate = new Date(currentDateStr);
    const endDateParts = endDateStr.split(/[\s:-]+/);

    const endDate = new Date(endDateParts[2], endDateParts[1] - 1, endDateParts[0], endDateParts[3], endDateParts[4]);

    const timeDifference = endDate - currentDate;

    // Calculate days, hours, minutes, and seconds
    const days = String(Math.floor(timeDifference / (1000 * 60 * 60 * 24))).padStart(2, '0');
    const hours = String(Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))).padStart(2, '0');
    const minutes = String(Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60))).padStart(2, '0');
    const seconds = String(Math.floor((timeDifference % (1000 * 60)) / 1000)).padStart(2, '0');



    $(".appilix_discount_notification_bar .discount_ends").html("<nn>"+days+"</nn> Days <nn>"+hours+"</nn> Hours <nn>"+minutes+"</nn> Minutes <nn>"+seconds+"</nn> Seconds")

    // Update the current date string and call the function again every second
    const updatedCurrentDate = new Date(currentDate.getTime() + 1000);
    const updatedDay = updatedCurrentDate.getDate().toString().padStart(2, '0');
    const updatedMonth = (updatedCurrentDate.getMonth() + 1).toString().padStart(2, '0');
    const updatedYear = updatedCurrentDate.getFullYear();
    const updatedHours = updatedCurrentDate.getHours().toString().padStart(2, '0');
    const updatedMinutes = updatedCurrentDate.getMinutes().toString().padStart(2, '0');
    const updatedSeconds = updatedCurrentDate.getSeconds().toString().padStart(2, '0');
    const updatedCurrentDateStr = `${updatedYear}-${updatedMonth}-${updatedDay} ${updatedHours}:${updatedMinutes}:${updatedSeconds}`;

    setTimeout(() => {
        calculateDiscountTimeDifference(updatedCurrentDateStr, endDateStr);
    }, 1000);
}
function appilix_show_sales_notification(host){
    return;
    if($(window).width() < 768){
        return;
    }
    $.ajax({
        url: host+'/api/sales_notification_paddle.php',
        type: "GET",
        cache: false,
        processData: false,
        contentType: false,
        success: function (data) {
            var obj = JSON.parse(data);
            if (obj.status === "true") {

                var i = 0;
                var orders = obj.orders;
                var appilix_sales_notification_interval;
                var displaySalesNotification = function() {
                    if (i < orders.length) {
                        $(".appilix_sales_notification .user_name").text(obj.orders[i].user_name)
                        $(".appilix_sales_notification .user_location").text(obj.orders[i].user_location)
                        $(".appilix_sales_notification .plan_title").text(obj.orders[i].plan_title)
                        $(".appilix_sales_notification h6").text(obj.orders[i].time)
                        $(".appilix_sales_notification").css("display", "flex")
                        setTimeout(function() {
                            $(".appilix_sales_notification").css("display", "none")
                        }, 7000);
                        i++;
                    } else {
                        clearInterval(appilix_sales_notification_interval);
                    }
                }
                setTimeout(function() {
                    displaySalesNotification(); // Display the first notification
                    // Set up the interval for subsequent notifications
                    appilix_sales_notification_interval = setInterval(displaySalesNotification, 10000); // 10 seconds total interval
                }, 0); // Initial delay of 0 seconds
            }
        }
    })
}
@extends('client.layout.master')

@section('content')
    <section class="appilix_hero appilix_section_space_hero">
        <div class="appilix_container">

            <div class="notification_slide">
                <div class="hero_notification google"
                    onclick="window.open('https://www.google.com/maps/place/Appilix/@23.7752302,90.3519427,17z/data=!4m18!1m9!3m8!1s0x23e0164bf41c099b:0x99f61c3aa9b9afcf!2sAppilix!8m2!3d23.7752302!4d90.3519427!9m1!1b1!16s%2Fg%2F11v0_clmrq!3m7!1s0x23e0164bf41c099b:0x99f61c3aa9b9afcf!8m2!3d23.7752302!4d90.3519427!9m1!1b1!16s%2Fg%2F11v0_clmrq', '_blank')">
                    <div class="user_icon">
                    </div>
                    <div class="notification"><b>4.3</b>
                        <span></span>
                        <b>Google</b> Đánh giá
                    </div>
                </div>
                <div class="hero_notification trustpilot"
                    onclick="window.open('https://www.trustpilot.com/review/ZPN6J0PBUbHl.com', '_blank')">
                    <div class="user_icon">
                    </div>
                    <div class="notification"><b>4.8</b>
                        <span></span>
                        <b>Trustpilot</b> Đánh giá
                    </div>
                </div>
                <div class="hero_notification users">
                    <div class="user_icon">
                    </div>
                    <div class="notification"><b>120k+</b> Người dùng đã tạo ứng dụng thông qua <b>Appilix</b></div>
                </div>
            </div>

            <div data-aos="fade-up" class="appilix_section_header">
                <h1>Chuyển đổi trang web của bạn thành ứng dụng di động mà không cần mã hóa</h1>
                <p>Appilix là giải pháp tối ưu để chuyển đổi trang web của bạn thành ứng dụng di động. Bắt đầu ngay hôm nay và
                    nâng tầm sự hiện diện trực tuyến của bạn!</p>
            </div>

            <form method="GET" data-aos="zoom-in" data-aos-delay="300" class="create_form"
                action="{{ route('apps.prefill') }}" onsubmit="addHttpIfMissing()">

                >
                <div class="input_block">
                    <input type="text" name="website" id="websiteInput" autocomplete="off" spellcheck="false"
                        required="">
                    <span class="placeholder">Nhập địa chỉ trang web của bạn</span>
                </div>
                <button class="create_btn" type="submit" href="#">Chuyển thành ứng dụng<span
                        class="arrow_right"></span></button>
            </form>

            <div data-aos="fade-up" data-aos-delay="300" class="hero_features">
                <div class="hf_card">
                    <div class="icon icon_1"></div>
                    <div class="details">
                        Thông báo đẩy Firebase
                    </div>
                </div>
                <div class="hf_card">
                    <div class="icon icon_2"></div>
                    <div class="details">
                        Tích hợp quảng cáo Admob
                    </div>
                </div>
                <div class="hf_card">
                    <div class="icon icon_3"></div>
                    <div class="details">
                        Xác thực sinh trắc học
                    </div>
                </div>
                <div class="hf_card">
                    <div class="icon icon_4"></div>
                    <div class="details">
                        Menu thanh điều hướng
                    </div>
                </div>
                <div class="hf_card">
                    <div class="icon icon_5"></div>
                    <div class="details">
                        Tích hợp liên kết sâu
                    </div>
                </div>
                <div class="hf_card">
                    <div class="icon icon_6"></div>
                    <div class="details">
                        Màn hình khởi động tùy chỉnh
                    </div>
                </div>
            </div>

        </div>
    </section>


    <section class="appilix_3_steps appilix_section_space_large">
        <div class="appilix_container">
            <div class="steps_elements">
                <div class="details">
                    <div data-aos="fade-up" class="appilix_section_header">
                        <h2 class="left_then_center">03 Bước để chuyển đổi <span>Trang web thành ứng dụng</span></h2>
                        <p class="left_then_center">Chuyển đổi sự hiện diện trực tuyến của bạn thành ứng dụng di động Android hoặc iOS
                            chỉ trong 3 bước. Không cần kiến thức mã hóa, xây dựng trong vài phút.</p>
                    </div>
                    <div data-aos="fade-up" data-aos-delay="100" class="three_cards">
                        <div class="card">
                            <div class="icon"></div>
                            <div class="card_details">
                                <h3>1. Nhập URL trang web</h3>
                                <p>Nhập địa chỉ web của bạn, đặt tên cho ứng dụng và chuyển đổi trang web thành ứng dụng cho
                                    thiết bị Android hoặc iOS.</p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="icon"></div>
                            <div class="card_details">
                                <h3>2. Tùy chỉnh ứng dụng</h3>
                                <p>Cá nhân hóa ứng dụng với logo tùy chỉnh, màn hình khởi động bắt mắt và các tính năng nâng cao. Dễ dàng
                                    và không phức tạp!</p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="icon"></div>
                            <div class="card_details">
                                <h3>3. Xây dựng & Tải xuống</h3>
                                <p>Quy trình chuyển đổi trang web thành ứng dụng di động của Appilix xây dựng ứng dụng Android hoặc iOS của bạn trong
                                    chưa đầy 5 phút!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section_img">
                    <a class="play_btn popup-youtube" aria-label="Xem cách Appilix chuyển đổi web thành APK"
                        href="https://www.youtube.com/watch?v=MV7lh9Qh5gM?rel=0&ytp-pause-overlay=0"></a>
                    <img loading="lazy"
                        src="{{ asset('assets/ZPN6J0PBUbHl.com/styles/images/theme/appilix_mockup_1_landscape.webp') }}"
                        alt="Phát video">
                </div>
            </div>
        </div>
    </section>



    <section class="appilix_features_1 appilix_section_space_large_to_medium">
        <div class="appilix_container">
            <div data-aos="fade-up" class="appilix_section_header">
                <span class="top_title">Mô-đun tích hợp gốc</span>
                <h2>Các tính năng hàng đầu của Appilix Website to App Builder</h2>
                <p>Khám phá Appilix's Website to App Builder với các công cụ tiên tiến để dễ dàng chuyển đổi trang web của bạn thành một
                    ứng dụng di động đầy đủ chức năng.</p>
            </div>
            <div data-aos="fade-up" data-aos-delay="100" class="features_integrator_cards">
                <div class="card">
                    <div class="icon">
                        <img src="{{ asset('assets/ZPN6J0PBUbHl.com/styles/images/theme/modules/circle_firebase.svg') }}"
                            alt="Thông báo đẩy Firebase">
                    </div>
                    <div class="text">
                        <h3>Thông báo đẩy Firebase</h3>
                        <p>Tích hợp Firebase để gửi thông báo đẩy đến tất cả người dùng ứng dụng trực tiếp từ bảng điều khiển Appilix.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="icon">
                        <img src="{{ asset('assets/ZPN6J0PBUbHl.com/styles/images/theme/modules/circle_admob.svg') }}"
                            alt="Quảng cáo Admob">
                    </div>
                    <div class="text">
                        <h3>Quảng cáo Admob</h3>
                        <p>Tích hợp Admob để hiển thị quảng cáo và tăng doanh thu, mở khóa toàn bộ tiềm năng kiếm tiền cho giải pháp
                            chuyển đổi trang web thành ứng dụng của bạn.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="icon">
                        <img src="{{ asset('assets/ZPN6J0PBUbHl.com/styles/images/theme/modules/circle_nav_drawer.svg') }}"
                            alt="Thanh điều hướng">
                    </div>
                    <div class="text">
                        <h3>Thanh điều hướng</h3>
                        <p>Thêm thanh điều hướng để truy cập dễ dàng, nâng cao trải nghiệm chuyển đổi trang web thành ứng dụng di động với giao diện giống ứng dụng thực sự.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="icon">
                        <img src="{{ asset('assets/ZPN6J0PBUbHl.com/styles/images/theme/modules/circle_bottom_nav.svg') }}"
                            alt="Điều hướng dưới cùng">
                    </div>
                    <div class="text">
                        <h3>Điều hướng dưới cùng</h3>
                        <p>Hiển thị menu điều hướng nhanh ở dưới cùng của ứng dụng để cung cấp trải nghiệm người dùng dễ dàng và liền mạch.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="icon">
                        <img src="{{ asset('assets/ZPN6J0PBUbHl.com/styles/images/theme/modules/circle_splash_screen.svg') }}"
                            alt="Màn hình khởi động">
                    </div>
                    <div class="text">
                        <h3>Màn hình khởi động</h3>
                        <p>Thiết lập màn hình ban đầu với logo và nền tùy chỉnh xuất hiện khi ứng dụng được khởi chạy.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="icon">
                        <img src="{{ asset('assets/ZPN6J0PBUbHl.com/styles/images/theme/modules/circle_deeplink.svg') }}"
                            alt="Liên kết sâu">
                    </div>
                    <div class="text">
                        <h3>Liên kết sâu</h3>
                        <p>Tự động mở ứng dụng khi trang web của bạn đang được duyệt hoặc URL trang web được nhấp vào từ các ứng dụng khác.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="icon">
                        <img src="{{ asset('assets/ZPN6J0PBUbHl.com/styles/images/theme/modules/circle_custom_css_js.svg') }}"
                            alt="CSS & JS tùy chỉnh">
                    </div>
                    <div class="text">
                        <h3>CSS & JS tùy chỉnh</h3>
                        <p>Thêm mã CSS hoặc Javascript tùy chỉnh để tùy chỉnh trải nghiệm chuyển đổi trang web thành ứng dụng với các tính năng bổ sung.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="icon">
                        <img src="{{ asset('assets/ZPN6J0PBUbHl.com/styles/images/theme/modules/circle_google_sign_in.svg') }}"
                            alt="Đăng nhập Google gốc">
                    </div>
                    <div class="text">
                        <h3>Đăng nhập Google gốc</h3>
                        <p>Kích hoạt đăng nhập Google cho xác thực gốc, giúp người dùng dễ dàng truy cập trang web của bạn trong ứng dụng di động một cách an toàn.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="icon">
                        <img src="{{ asset('assets/ZPN6J0PBUbHl.com/styles/images/theme/modules/circle_biometric.svg') }}"
                            alt="Xác thực sinh trắc học">
                    </div>
                    <div class="text">
                        <h3>Xác thực sinh trắc học</h3>
                        <p>Nâng cao bảo mật cho toàn bộ ứng dụng hoặc một phần cụ thể của ứng dụng với hệ thống xác thực sinh trắc học.</p>
                    </div>
                </div>
            </div>
            <div class="important_note">
                <p>Còn nhiều tính năng thú vị và mô-đun gốc khác của Appilix. <a
                        href="https://ZPN6J0PBUbHl.com/features" class="with_arrow">Khám phá tất cả tính năng</a></p>
            </div>
        </div>
    </section>



    <section class="appilix_details_1 appilix_section_space_large">
        <div class="appilix_container">
            <div data-aos="fade-up" class="appilix_section_header">
                <h2>Mở khóa lợi ích của bộ chuyển đổi web thành ứng dụng</h2>
                <p>Trải nghiệm quá trình chuyển đổi mượt mà từ trang web sang ứng dụng di động với Appilix, mở ra một loạt lợi ích
                    bao gồm tăng cường sự tương tác của người dùng.</p>
            </div>
            <div data-aos="fade-up" data-aos-delay="100" class="details_elements">
                <div class="details_img">
                    <img loading="lazy"
                        src="{{ asset('assets/ZPN6J0PBUbHl.com/styles/images/theme/appilix_mockup_1_landscape.webp') }}"
                        alt="Mô hình Appilix">
                </div>
                <div class="details_text">
                    <span class="point">Chuyển đổi, Tương tác, Phát triển</span>
                    <p>Chuyển đổi trang web của bạn thành ứng dụng di động giờ đây nhanh chóng và dễ dàng với bộ chuyển đổi web thành ứng dụng của Appilix.
                        Appilix đảm bảo trải nghiệm mượt mà, cung cấp giao diện gốc cho cả ứng dụng Android và iOS,
                        để người dùng tận hưởng giao diện mượt mà, trực quan.</p>

                    <p>Với người dùng di động dành khoảng 90% thời gian trong ứng dụng, theo eMarketer, việc chuyển đổi trang web thành ứng dụng
                        cung cấp cách trực tiếp để tương tác với khán giả của bạn. Điều này dẫn đến khả năng hiển thị và tương tác cao hơn
                        với sản phẩm hoặc dịch vụ của bạn, mở rộng phạm vi tiếp cận và nâng cao trải nghiệm người dùng tổng thể.</p>
                    <ul class="key_points">
                        <li>Chuyển đổi mượt mà từ web sang ứng dụng</li>
                        <li>Tăng cường tương tác người dùng</li>
                        <li>Tăng khả năng hiển thị và phạm vi tiếp cận</li>
                        <li>Trải nghiệm người dùng nâng cao</li>
                    </ul>
                    <a class="get_start_btn" href="https://ZPN6J0PBUbHl.com/account/new-app"> Bắt đầu ngay bây giờ</a>
                </div>
            </div>
        </div>
    </section>


    <section class="appilix_cta_1">
        <div class="appilix_container">
            <div class="appilix_section_header">
                <h2>Chuyển đổi trang web của bạn thành ứng dụng di động!</h2>
                <p>Sẵn sàng đưa trang web của bạn lên Android và iOS? Với Appilix, việc chuyển đổi trang web thành ứng dụng
                    Android và iOS dễ dàng hơn—không cần mã hóa! Bắt đầu ngay bây giờ và nâng tầm doanh nghiệp của bạn trên cả hai nền tảng di động.</p>
                <a href="https://ZPN6J0PBUbHl.com/account/new-app">Bắt đầu ngay bây giờ</a>
            </div>
        </div>
    </section>


    <section class="appilix_builder_highlight appilix_section_space_large">
        <div class="appilix_container">
            <div data-aos="fade-up" class="appilix_section_header">
                <span class="top_title">Trình xây dựng ứng dụng mạnh mẽ</span>
                <h2>Xây dựng ứng dụng di động của bạn chỉ trong 5 phút!</h2>
                <p>Tạo và tùy chỉnh trang web của bạn thành ứng dụng trong 5 phút! Không cần mã hóa—truy cập trình xây dựng từ
                    bất kỳ thiết bị nào và cá nhân hóa mọi chi tiết.</p>
            </div>
            <div data-aos="fade-up" data-aos-delay="100" class="highlighted_contents">
                <div class="sec_img">
                    <img loading="lazy"
                        src="{{ asset('assets/ZPN6J0PBUbHl.com/styles/images/theme/appilix_builder_splash_screen.png') }}"
                        alt="Trình xây dựng ứng dụng Appilix">
                </div>
                <div class="highlighted_card_container">
                    <div class="features_cards">
                        <div class="card card_1">
                            <div class="icon i_1"></div>
                            <div class="text">
                                <h3>Chuyển đổi web thành ứng dụng nhanh chóng</h3>
                                <p>Chuyển đổi trang web của bạn thành ứng dụng di động chỉ trong 5 phút. Tận hưởng trải nghiệm không rắc rối
                                    với trình xây dựng web thành ứng dụng di động dựa trên trình duyệt nhanh chóng của chúng tôi.</p>
                            </div>
                        </div>
                        <div class="card card_2">
                            <div class="icon i_2"></div>
                            <div class="text">
                                <h3>Tính năng hoàn toàn tùy chỉnh</h3>
                                <p>Cá nhân hóa mọi khía cạnh của web thành ứng dụng, bao gồm màn hình khởi động, điều hướng và
                                    màu sắc, tất cả mà không cần viết một dòng mã nào.</p>
                            </div>
                        </div>
                        <div class="card card_3">
                            <div class="icon i_3"></div>
                            <div class="text">
                                <h3>Truy cập từ bất kỳ đâu</h3>
                                <p>Không cần Mac hoặc PC Windows! Xây dựng và tùy chỉnh trang web thành ứng dụng trực tiếp từ trình duyệt của bạn
                                    trên bất kỳ thiết bị nào, bất cứ lúc nào.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <hr class="appilix_divider">


    <!--Phần giá Appilix-->
    <section class="appilix_pricing_section appilix_section_space_large">
        <div class="appilix_container">
            <div data-aos="fade-up" class="appilix_section_header">
                <h2>Giá cả minh bạch cho ứng dụng Android & iOS</h2>
                <p>Chọn gói phù hợp với nhu cầu của bạn—không có phí ẩn. Nhận tất cả các bản cập nhật trong tương lai, dù bạn đang chuyển đổi
                    trang web thành ứng dụng hay cập nhật một ứng dụng!</p>
            </div>
            <div data-aos="fade-up" data-aos-delay="100" class="tab">
                <span class="item android active">Android</span>
                <span class="item ios">iOS</span>
            </div>
            <div data-aos="fade-up" data-aos-delay="100" class="price_cards_container">
                <div class="price_cards">
                    <div class="p_card">
                        <h3 class="card_head">Miễn phí</h3>
                        <h3 class="price">$0.00</h3>
                        <p>Hãy xây dựng ứng dụng đầu tiên của bạn miễn phí và khám phá trong 30 ngày.</p>
                        <a href="https://ZPN6J0PBUbHl.com/account/new-app" class="card_btn">Bắt đầu ngay bây giờ</a>
                        <ul class="features_list">
                            <li class="checked"><b>1 Android</b> Ứng dụng</li>
                            <li class="checked"><b>Vô hạn</b> Lần xây dựng</li>
                            <li class="checked"><b>Vô hạn</b> Người dùng hoạt động</li>
                            <li class="unchecked">Có thể phát hành trên Play Store</li>
                            <li class="unchecked">Không có logo Appilix</li>
                            <li class="unchecked">Quảng cáo Admob</li>
                            <li class="unchecked">Thông báo đẩy</li>
                            <li class="unchecked">Tất cả <a
                                    href="https://ZPN6J0PBUbHl.com/features#integration-modules">Mô-đun tích hợp</a>
                            </li>
                        </ul>
                    </div>
                    <div class="p_card p_card_highlight">
                        <h3 class="card_head">Trọn đời</h3>
                        <h3 class="price">$89.00</h3>
                        <p>Tất cả các tính năng cao cấp và không cần lo lắng về việc gia hạn.</p>
                        <a href="https://ZPN6J0PBUbHl.com/account/new-app" class="card_btn">Bắt đầu ngay bây giờ</a>
                        <ul class="features_list">
                            <li class="checked"><b>1 Android</b> Ứng dụng</li>
                            <li class="checked"><b>Vô hạn</b> Lần xây dựng</li>
                            <li class="checked"><b>Vô hạn</b> Người dùng hoạt động</li>
                            <li class="checked">Có thể phát hành trên Play Store</li>
                            <li class="checked">Không có logo Appilix</li>
                            <li class="checked">Quảng cáo Admob</li>
                            <li class="checked">Thông báo đẩy</li>
                            <li class="checked">Tất cả <a
                                    href="https://ZPN6J0PBUbHl.com/features#integration-modules">Mô-đun tích hợp</a>
                            </li>
                        </ul>
                    </div>
                    <div class="p_card ">
                        <h3 class="card_head">Hàng năm</h3>
                        <h3 class="price">$69.00</h3>
                        <p>Thanh toán $69.00 mỗi năm bao gồm tất cả các tính năng và cập nhật.</p>
                        <a href="https://ZPN6J0PBUbHl.com/account/new-app" class="card_btn">Bắt đầu ngay bây giờ</a>
                        <ul class="features_list">
                            <li class="checked"><b>1 Android</b> Ứng dụng</li>
                            <li class="checked"><b>Vô hạn</b> Lần xây dựng</li>
                            <li class="checked"><b>Vô hạn</b> Người dùng hoạt động</li>
                            <li class="checked">Có thể phát hành trên Play Store</li>
                            <li class="checked">Không có logo Appilix</li>
                            <li class="checked">Quảng cáo Admob</li>
                            <li class="checked">Thông báo đẩy</li>
                            <li class="checked">Tất cả <a
                                    href="https://ZPN6J0PBUbHl.com/features#integration-modules">Mô-đun tích hợp</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="price_cards">
                    <div class="p_card">
                        <h3 class="card_head">Miễn phí</h3>
                        <h3 class="price">$0.00</h3>

                        <p>Hãy xây dựng ứng dụng đầu tiên của bạn miễn phí và khám phá trong 30 ngày.</p>
                        <a href="https://ZPN6J0PBUbHl.com/account/new-app" class="card_btn">Bắt đầu ngay bây giờ</a>
                        <ul class="features_list">
                            <li class="checked"><b>1 iOS</b> Ứng dụng</li>
                            <li class="checked"><b>Vô hạn</b> Lần xây dựng</li>
                            <li class="checked"><b>Vô hạn</b> Người dùng hoạt động</li>
                            <li class="unchecked">Có thể phát hành trên Apple Store</li>
                            <li class="unchecked">Không có logo Appilix</li>
                            <li class="unchecked">Quảng cáo Admob</li>
                            <li class="unchecked">Thông báo đẩy</li>
                            <li class="unchecked">Tất cả <a
                                    href="https://ZPN6J0PBUbHl.com/features#integration-modules">Mô-đun tích hợp</a>
                            </li>
                        </ul>
                    </div>
                    <div class="p_card p_card_highlight">
                        <h3 class="card_head">Trọn đời</h3>
                        <h3 class="price">$139.00</h3>
                        <p>Tất cả các tính năng cao cấp và không cần lo lắng về việc gia hạn.</p>
                        <a href="https://ZPN6J0PBUbHl.com/account/new-app" class="card_btn">Bắt đầu ngay bây giờ</a>
                        <ul class="features_list">
                            <li class="checked"><b>1 iOS</b> Ứng dụng</li>
                            <li class="checked"><b>Vô hạn</b> Lần xây dựng</li>
                            <li class="checked"><b>Vô hạn</b> Người dùng hoạt động</li>
                            <li class="checked">Có thể phát hành trên Apple Store</li>
                            <li class="checked">Không có logo Appilix</li>
                            <li class="checked">Quảng cáo Admob</li>
                            <li class="checked">Thông báo đẩy</li>
                            <li class="checked">Tất cả <a
                                    href="https://ZPN6J0PBUbHl.com/features#integration-modules">Mô-đun tích hợp</a>
                            </li>
                        </ul>
                    </div>
                    <div class="p_card ">
                        <h3 class="card_head">Hàng năm</h3>
                        <h3 class="price">$79.00</h3>
                        <p>Thanh toán $79.00 mỗi năm bao gồm tất cả các tính năng và cập nhật.</p>
                        <a href="https://ZPN6J0PBUbHl.com/account/new-app" class="card_btn">Bắt đầu ngay bây giờ</a>
                        <ul class="features_list">
                            <li class="checked"><b>1 iOS</b> Ứng dụng</li>
                            <li class="checked"><b>Vô hạn</b> Lần xây dựng</li>
                            <li class="checked"><b>Vô hạn</b> Người dùng hoạt động</li>
                            <li class="checked">Có thể phát hành trên Apple Store</li>
                            <li class="checked">Không có logo Appilix</li>
                            <li class="checked">Quảng cáo Admob</li>
                            <li class="checked">Thông báo đẩy</li>
                            <li class="checked">Tất cả <a
                                    href="https://ZPN6J0PBUbHl.com/features#integration-modules">Mô-đun tích hợp</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="important_note">
                <p>Giá trên chưa bao gồm thuế áp dụng dựa trên địa chỉ thanh toán của bạn. Giá cuối cùng sẽ được
                    hiển thị trong phần thanh toán, trước khi hoàn tất thanh toán.</p>
            </div>
        </div>
    </section>

    <hr class="appilix_divider">

    <!--Đánh giá người dùng Appilix-->
    <section class="appilix_statement appilix_section_space_large">
        <div class="appilix_container">
            <div class="content">
                <div class="profile">
                    <div class="arrow"></div>
                    <img loading="lazy"
                        src="{{ asset('assets/ZPN6J0PBUbHl.com/styles/images/theme/ferdousur_rahman_sarker.webp') }}"
                        alt="Ferdousur Rahman Sarker">
                </div>
                <div class="details">
                    <p>Tại Appilix, chúng tôi cam kết cải tiến liên tục, bổ sung các tính năng mới và nâng cao
                        <span>hỗ trợ khách hàng</span> để đảm bảo thành công của bạn với mỗi lần xây dựng ứng dụng.</p>
                    <div class="intro">
                        <span class="person_name">Ferdousur Rahman Sarker</span>
                        <span class="person_designation">Giám đốc điều hành, Appilix</span>
                    </div>
                </div>
            </div>
            <!--<div class="user_companies">
                <img src="https://ZPN6J0PBUbHl.com/styles/images/theme/ZPN6J0PBUbHl.company_logo_1.svg" alt="">
                <img src="https://ZPN6J0PBUbHl.com/styles/images/theme/ZPN6J0PBUbHl.company_logo_1.svg" alt="">
                <img src="https://ZPN6J0PBUbHl.com/styles/images/theme/ZPN6J0PBUbHl.company_logo_1.svg" alt="">
                <img src="https://ZPN6J0PBUbHl.com/styles/images/theme/ZPN6J0PBUbHl.company_logo_1.svg" alt="">
                <img src="https://ZPN6J0PBUbHl.com/styles/images/theme/ZPN6J0PBUbHl.company_logo_1.svg" alt="">
                <img src="https://ZPN6J0PBUbHl.com/styles/images/theme/ZPN6J0PBUbHl.company_logo_1.svg" alt="">
            </div>-->
        </div>
    </section>

    <hr class="appilix_divider">

    <!--Phần đánh giá Appilix-->
    <section id="appilix_review" class="appilix_review appilix_section_space_large">
        <div class="appilix_container">
            <div class="appilix_section_header">
                <h2 class="left_then_center">Khách hàng nói gì về dịch vụ xuất sắc của chúng tôi</h2>
                <div class="slider">
                    <div class="slide s_left"></div>
                    <div class="slide s_right"></div>
                </div>

            </div>
            <div class="review_cards">
                <div class="card">
                    <p><a class="review_link" href="https://www.trustpilot.com/reviews/679b65f41de847d6b2d9b932"
                            aria-label="Xem đánh giá trên TrustPilot về Appilix" rel="nofollow" target="_blank"></a>
                        Appilix là phần mềm tốt nhất tôi từng tìm thấy, giá cả hợp lý và họ cung cấp gói trọn đời, hãy thử ngay. Họ cũng đã giúp tôi
                        xuất bản ứng dụng trên Apple Store, tôi rất vui khi tìm thấy ZPN6J0PBUbHl.com, cảm ơn rất nhiều.</p>
                    <div class="card_bottom">
                        <div class="reviewer">
                            <h3>Khaled Mahieddine</h3>
                            <span>Hoa Kỳ</span>
                        </div>
                        <div class="reviewer_dp">
                            <img src="{{ asset('assets/ZPN6J0PBUbHl.com/styles/images/theme/appilix_user_review_icon.svg') }}"
                                alt="Khaled Mahieddine">
                        </div>
                    </div>
                </div>
                <div class="card">
                    <p><a class="review_link" href="https://www.trustpilot.com/reviews/66110f1427893d03460c477b"
                            aria-label="Xem đánh giá trên TrustPilot về Appilix" rel="nofollow" target="_blank"></a>
                        Tôi thực sự ấn tượng với Appilix. Họ có các video hướng dẫn từng bước dễ dàng, mỗi video chỉ vài phút. Tôi đã có một trang web và cổng ATS chỉ có thể truy cập trực tuyến. Giờ đây, tôi đã có thể biến ATS của mình thành một ứng dụng chỉ bằng cách cung cấp liên kết trang web. Nếu bạn đã có trang web, bạn đã đi được hơn nửa chặng đường. Tôi đã liên hệ với dịch vụ khách hàng hai lần và họ phản hồi rất nhanh, trong vòng vài giờ và cả hai lần đều giải quyết được thắc mắc của tôi.</p>
                    <div class="card_bottom">
                        <div class="reviewer">
                            <h3>Fiona</h3>
                            <span>Vương quốc Anh</span>
                        </div>
                        <div class="reviewer_dp">
                            <img src="{{ asset('assets/ZPN6J0PBUbHl.com/styles/images/theme/appilix_user_review_icon.svg') }}"
                                alt="Fiona">
                        </div>
                    </div>
                </div>
                <div class="card ">
                    <p><a class="review_link" href="https://www.trustpilot.com/reviews/6550aeec908f5b6b46a10619"
                            aria-label="Xem đánh giá trên TrustPilot về Appilix" rel="nofollow" target="_blank"></a>
                        Appilix là phần mềm chuyển đổi trang web thành ứng dụng rất tốt. Appilix tạo ra một ứng dụng đẹp và
                        hấp dẫn với nhiều tính năng. Tôi đã có thể tạo ứng dụng Android và iOS trong vài giây và dịch vụ khách hàng cũng rất tốt vì họ đã hỗ trợ tôi giải quyết tất cả các vấn đề phát sinh trong quá trình gửi lên Play Store và App Store. Cảm ơn Appilix rất nhiều vì dịch vụ tuyệt vời, các bạn là công ty tốt nhất và là hình mẫu.</p>
                    <div class="card_bottom">
                        <div class="reviewer">
                            <h3>Winox Com</h3>
                            <span>Tanzania</span>
                        </div>
                        <div class="reviewer_dp">
                            <img src="{{ asset('assets/ZPN6J0PBUbHl.comstyles/images/theme/appilix_user_review_icon.svg') }}"
                                alt="Winox Com">
                        </div>
                    </div>
                </div>
                <div class="card">
                    <p><a class="review_link" href="https://www.trustpilot.com/reviews/6719103432b314637cb110ad"
                            aria-label="Xem đánh giá trên TrustPilot về Appilix" rel="nofollow" target="_blank"></a>
                        Đội ngũ Appilix rất nhiệt tình. Tôi không giỏi tiếng Anh khi giao tiếp với bộ phận hỗ trợ,
                        nên việc trao đổi hỗ trợ hơi khó khăn. Đội ngũ hỗ trợ Appilix rất nhiệt tình giúp đỡ để tôi
                        phát hành ứng dụng thành công trên Apple. Cảm ơn tất cả rất nhiều. Chúc các bạn thành công.</p>
                    <div class="card_bottom">
                        <div class="reviewer">
                            <h3>Văn Thanh Tống</h3>
                            <span>Việt Nam</span>
                        </div>
                        <div class="reviewer_dp">
                            <img src="{{ asset('assets/ZPN6J0PBUbHl.com/styles/images/theme/appilix_user_review_icon.svg') }}"
                                alt="Văn Thanh Tống">
                        </div>
                    </div>
                </div>
                <div class="card">
                    <p><a class="review_link" href="https://www.trustpilot.com/reviews/6717bd8b68258c863b81c407"
                            aria-label="Xem đánh giá trên TrustPilot về Appilix" rel="nofollow" target="_blank"></a>
                        Appilix là dịch vụ tốt nhất tôi đã thử để chuyển đổi trang web thành ứng dụng. Rất phù hợp cho cả
                        nền tảng Apple và Android. Quá trình tạo và xuất bản ứng dụng rất đơn giản và được hướng dẫn rất rõ ràng,
                        nhưng nếu có vấn đề nhỏ xảy ra, hỗ trợ của Appilix sẽ can thiệp ngay lập tức để giúp đỡ. Thật sự tuyệt vời! Tôi thực sự hạnh phúc khi chọn dịch vụ này.</p>
                    <div class="card_bottom">
                        <div class="reviewer">
                            <h3>Lele</h3>
                            <span>Ý</span>
                        </div>
                        <div class="reviewer_dp">
                            <img src="{{ asset('assets/ZPN6J0PBUbHl.com/styles/images/theme/appilix_user_review_icon.svg') }}"
                                alt="Lele">
                        </div>
                    </div>
                </div>
            </div>


            <div class="statistics">
                <div class="sts st_1">
                    <h3>80k+</h3>
                    <p>Người dùng đã tạo ứng dụng Android & iOS bằng Appilix</p>
                </div>
                <div class="sts st_2">
                    <h3>✰✰✰✰✰</h3>
                    <p>Xếp hạng tổng thể 4.5+ từ người dùng của chúng tôi trên các kênh khác nhau</p>
                </div>
                <div class="sts st_3">
                    <h3>24 giờ</h3>
                    <p>Hỗ trợ khách hàng trong việc hỗ trợ chuyển đổi web thành ứng dụng</p>
                </div>
            </div>
        </div>
    </section>




    <div class="appilix_sales_notification" onclick="window.location.href='https://ZPN6J0PBUbHl.com/pricing';">
        <span class="user_icon"></span>
        <div class="sale_details">
            <h4><span class="user_name">Ferdousur</span> từ <span class="user_location">Dhaka, Bangladesh</span></h4>
            <h5>Vừa mua <span class="plan_title">Gói Android trọn đời</span></h5>
            <h6>9 giờ trước</h6>
        </div>
    </div>


    <!--Đăng ký nhận tin tức và cập nhật Appilix-->
    <section class="appilix_newsletter appilix_section_space_medium">
        <div class="appilix_container">
            <div class="flex_container">
                <div class="appilix_section_header">
                    <h2 class="left_then_center">Cập nhật tin tức, ý tưởng và thông tin mới nhất của chúng tôi</h2>
                </div>
                <div class="newsletter_form">
                    <input type="email" autocomplete="off" class="email_input email" placeholder="Địa chỉ email của bạn"
                        onkeyup="field_remove_errors(this)">
                    <button type="submit" class="btn"
                        onclick="email_subscription(`https://ZPN6J0PBUbHl.com`, `.appilix_newsletter button.btn`, `.appilix_newsletter input.email`)">Đăng ký ngay</button>
                </div>
            </div>
        </div>
    </section>

    <!--Phân cách phần Appilix-->
    <section class="appilix_sec_divider">
        <hr class="appilix_divider">
    </section>
    <script>
        function addHttpIfMissing() {
            const input = document.getElementById('websiteInput');
            let url = input.value.trim();
            if (!/^https?:\/\//i.test(url)) {
                url = 'https://' + url;
            }
            input.value = url;
        }
    </script>
@endsection

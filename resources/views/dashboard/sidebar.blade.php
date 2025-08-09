<div class="appilix_sidebar">

    <div class="mobile_view_sidebar_header">
        <div class="mobile_view_logo"></div>
        <div class="mobile_view_close"></div>
    </div>


    <a class="appilix_logo" href=""></a>
 @if(auth()->user()->hasAppPermission($userApp, 'dashboard'))
    <a class="appilix_menu menu_dashboard active" href="{{route('app.dashboard',$userApp)}}">
        <div class="appilix_menu_icon"></div>
        <h3>Bảng Điều Khiển</h3>
    </a>
       @endif
 @if(auth()->user()->hasAppPermission($userApp, 'notification'))
    <a class="appilix_menu menu_notification " href="{{route('app.notification',$userApp)}}">
        <div class="appilix_menu_icon"></div>
        <h3>Thông Báo Đẩy</h3>
    </a>
      @endif

    <a class="appilix_menu menu_build-download " href="">
        <div class="appilix_menu_icon"></div>
        <h3>Xây Dựng & Tải Xuống</h3>
    </a>

    <div class="menu_divider">CÀI ĐẶT ỨNG DỤNG</div>
 @if(auth()->user()->hasAppPermission($userApp, 'app-info'))
    <a class="appilix_menu menu_app-info" href="{{route('app.settings.edit',$userApp)}}">
        <div class="appilix_menu_icon"></div>
        <h3>Thông Tin Ứng Dụng</h3>
    </a>
       @endif
 @if(auth()->user()->hasAppPermission($userApp, 'splash-screen'))
    <a class="appilix_menu menu_splash-screen" href="{{route("app.settings.edit.screent",$userApp)}}">
        <div class="appilix_menu_icon"></div>
        <h3>Màn Hình Khởi Động</h3>
    </a>
      @endif
 @if(auth()->user()->hasAppPermission($userApp, 'customization'))
    <a class="appilix_menu menu_customization" href="{{route('customization.edit',$userApp)}}">
        <div class="appilix_menu_icon"></div>
        <h3>Tùy Chỉnh</h3>
    </a>
      @endif
 @if(auth()->user()->hasAppPermission($userApp, 'firebase'))
    <a class="appilix_menu menu_firebase" href="{{route('app.firebase',$userApp)}}">
        <div class="appilix_menu_icon"></div>
        <h3>Firebase</h3>
    </a>
        @endif

 @if(auth()->user()->hasAppPermission($userApp, 'admob'))
    <a class="appilix_menu menu_admob" href="{{route('app.admob',$userApp)}}">
        <div class="appilix_menu_icon"></div>
        <h3>Quảng Cáo Admob</h3>
    </a>
        @endif
 @if(auth()->user()->hasAppPermission($userApp, 'advanced'))
    <a class="appilix_menu menu_advanced" href="{{route('advanced-settings.edit',$userApp)}}">
        <div class="appilix_menu_icon"></div>
        <h3>Cài Đặt Nâng Cao</h3>
    </a>
  @endif
    <a class="appilix_menu menu_modules" href="">
        <div class="appilix_menu_icon"></div>
        <h3>Mô-đun Tích Hợp</h3>
    </a>
</div>

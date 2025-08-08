   <div class="appilix_header">
       <div class="appilix_header_left">
           <div class="appilix_header_toggle_icon" onclick="sidebar_toggle()"></div>
           <a class="appilix_back_to_apps" href="https://appilix.com/account">Back to All Apps</a>
       </div>
       <div class="appilix_header_right">
           <div class="profile_dropdown">
               <img onclick="header_dropdown_toggle()"
                   src="https://appilix.com/styles/images/account/dashboard/user_avatar.svg">
               <div class="dropdown_menu">
                   <a class="dropdown_item" href="{{ route('apps.index') }}"><span class="icon"></span> App của
                       tôi</a>
                   <a class="dropdown_item" href="{{ route('contact.form') }}"><span class="icon"></span>Liên hệ</a>
                   {{-- <a class="dropdown_item" href="https://appilix.com/account/settings"><span
                                    class="icon"></span>Account Settings</a> --}}
                   <hr class="dropdown_divider">
                   <a href="#" class="dropdown_item"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                       <span class="icon"></span>Đăng xuất
                   </a>

                   <!-- Form logout ẩn -->
                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                       @csrf

                   </form>
               </div>
           </div>
       </div>
   </div>

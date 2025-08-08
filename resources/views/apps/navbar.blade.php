   <nav class="appilix_acc_sidebar">
       <a class="logo" href="">
           <div class="appilix_acc_logo"></div>
       </a>
       <div class="db_sidebar_elements_top">
           <a class="element active" href="{{ route('apps.index') }}">
               <div class="item home"></div>
               <span class="hover_text">My Apps</span>
           </a>
           <a class="element " href="{{ route('apps.create') }}">
               <div class="item create"></div>
               <span class="hover_text">Create App</span>
           </a>
           <a class="element " href="">
               <div class="item combo"></div>
               <span class="hover_text">Combo Offers</span>
           </a>
       </div>
       <div class="db_sidebar_elements_bottom">
           <a class="element" href="{{ route('contact.form') }}" target="_blank">
               <div class="item support"></div>
               <span class="hover_text">Customer Support</span>
           </a>
           <form action="{{ route('logout') }}" method="POST">
               @csrf
               <button type="submit" style="border: none" class="logout"></button>
           </form>


       </div>
   </nav>

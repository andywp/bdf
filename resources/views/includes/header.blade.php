 <!--**********************************
            Nav header start
        ***********************************-->
 <div class="nav-header">
     <a href="{{ url('/') }}" class="brand-logo">
            <img class="logo-abbr" src="{{ asset('assets/logo/bdf.png') }}" alt="logo-abbr" >
            <!--<img class="brand-title" src="{{ asset('assets/logo/konsela_2.png') }}" alt="brand-title" > -->
            <div class="brand-title"><h2 class="font-weight-bold" style="color:#fff;" >BDF</h2></div>
     </a>
     <div class="nav-control">
         <div class="hamburger">
             <span class="line"></span><span class="line"></span><span class="line"></span>
         </div>
     </div>
 </div>
 <!--**********************************
            Nav header end
        ***********************************-->



 <!--**********************************
            Header start
        ***********************************-->
 <div class="header">
     <div class="header-content">
         <nav class="navbar navbar-expand">
             <div class="collapse navbar-collapse justify-content-between">
                 <div class="header-left">
                     <div class="dashboard_bar">
                        Dashboard
                     </div>
                     
                 </div>
                 <ul class="navbar-nav header-right">
                     
                     <li class="nav-item dropdown header-profile">
                         <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                             <img src="{{ get_gravatar(Auth::user()->email) }}" width="20" alt="{{ Auth::user()->name }}" />
                         </a>
                         <div class="dropdown-menu dropdown-menu-end">
                             <a href="{{ route('admin.profile.index') }}" class="dropdown-item ai-icon">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                     <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                     <circle cx="12" cy="7" r="4"></circle>
                                 </svg>
                                 <span class="ms-2">Profile </span>
                             </a>
                             
                             <a href="{{ route('admin.logout') }}" class="dropdown-item ai-icon" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                     <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                     <polyline points="16 17 21 12 16 7"></polyline>
                                     <line x1="21" y1="12" x2="9" y2="12"></line>
                                 </svg>
                                 <span class="ms-2">Logout </span>
                             </a>
                         </div>
                     </li>
                     <li class="nav-item">

                     </li>
                 </ul>
             </div>
         </nav>
     </div>
 </div>

 <!--**********************************
            Header end ti-comment-alt
        ***********************************-->
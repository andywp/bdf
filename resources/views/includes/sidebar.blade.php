<!--**********************************
    Sidebar start
***********************************-->

<div class="dlabnav">
    <div class="dlabnav-scroll">
        <div class="dropdown header-profile2 ">
            <a class="nav-link " href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                <div class="header-info2 d-flex align-items-center">
                    <img src="{{ get_gravatar(Auth::user()->email) }}" alt="" />
                    <div class="d-flex align-items-center sidebar-info">
                        <div>
                            <span class="font-w400 d-block">{{ Auth::user()->name }}</span>
                            <small class="text-end font-w400">{{ (Auth::user()->role == 'admin')?'Superadmin':'Admin' }}</small>
                        </div>
                        <i class="fas fa-chevron-down"></i>
                    </div>

                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <a href="{{ route('admin.profile.index') }}" class="dropdown-item ai-icon ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <span class="ms-2">Profile </span>
                </a>
                <a href="{{ route('admin.logout') }}" class="dropdown-item ai-icon" onclick="event.preventDefault();document.getElementById('logout-form').submit();" >
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                        <polyline points="16 17 21 12 16 7"></polyline>
                        <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg>
                    <span class="ms-2">Logout </span>
                </a>
            </div>
        </div>
        @if(Auth::user()->role == 'admin')
        <ul class="metismenu" id="menu">
             <li><a href="{{ route('admin.home') }}" class="" aria-expanded="false">
                    <i class="flaticon-025-dashboard"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li><a href="{{ route('admin.bdf.index') }}" class="" aria-expanded="false">
                    <i class="flaticon-381-newspaper"></i>
                    <span class="nav-text">BDF</span>
                </a>
            </li>
            <li><a href="{{ route('admin.history.index') }}" class="" aria-expanded="false">
                    <i class="flaticon-381-notebook-5"></i>
                    <span class="nav-text">History</span>
                </a>
            </li>
            <li><a href="{{ route('admin.about.index') }}" class="" aria-expanded="false">
                    <i class="flaticon-381-id-card-5"></i>
                    <span class="nav-text">About</span>
                </a>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-picture-2"></i>
                    <span class="nav-text">Gallery</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.gallery.index') }}">Images</a></li>
                    <li><a href="{{ route('admin.video.list') }}">Video</a></li>
                </ul>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-download"></i>
                    <span class="nav-text">Manage Download</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.publication.index') }}">Publication</a></li>
                    <li><a href="{{ route('admin.advisory.index') }}">Media Advisory</a></li>
                </ul>
            </li>
            <li><a href="{{ route('admin.slider.index') }}" class="" aria-expanded="false">
                    <i class="flaticon-381-next-1"></i>
                    <span class="nav-text">Slider</span>
                </a>
            </li>
            <li><a href="{{ route('admin.link.index') }}" class="" aria-expanded="false">
                    <i class="flaticon-381-share-2"></i>
                    <span class="nav-text">External Link</span>
                </a>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-notepad"></i>
                    <span class="nav-text">Registration</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.physical.index') }}">Physical</a></li>
                    <li><a href="{{ route('admin.virtual.index') }}">Virtual</a></li>
                    <li><a href="{{ route('admin.media.index') }}">Media</a></li>
                    <li><a href="{{ route('admin.guest.index') }}">Guest</a></li>
                    <li><a href="{{ route('admin.commitee.index') }}">Committee</a></li>
                </ul>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-settings-6"></i>
                    <span class="nav-text">Setting</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.userreg.index') }}">User Registration</a></li>
                  
                </ul>
            </li>
        </ul>
        @else
        <ul class="metismenu" id="menu">
             <li><a href="{{ route('admin.home') }}" class="" aria-expanded="false">
                    <i class="flaticon-025-dashboard"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-notepad"></i>
                    <span class="nav-text">Registration</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.physical.index') }}">Physical</a></li>
                    <li><a href="{{ route('admin.virtual.index') }}">Virtual</a></li>
                    <li><a href="{{ route('admin.media.index') }}">Media</a></li>
                    <li><a href="{{ route('admin.guest.index') }}">Guest</a></li>
                    <li><a href="{{ route('admin.commitee.index') }}">Committee</a></li>
                </ul>
            </li>
        </ul>
        @endif
        
        <div class="copyright">
            <p><strong>Bdf</strong> © {{ date('Y') }} All Rights Reserved</p>
            <p class="fs-12">Made with <span class="heart"></span> by <a href="https://rasalogi.com/" target="_blank">RasalogiWeb</a></p>
        </div>
    </div>
</div>
<!--**********************************
            Sidebar end
        ***********************************-->
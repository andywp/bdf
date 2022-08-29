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
                            <small class="text-end font-w400">Superadmin</small>
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
                    <li><a href="{{ route('admin.video.index') }}">Video</a></li>
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
                    <li><a href="#">Physical</a></li>
                    <li><a href="#">Virtual</a></li>
                    <li><a href="#">Media</a></li>
                    <li><a href="#">Guest</a></li>
                    <li><a href="#">Committee</a></li>
                </ul>
            </li>
            <!--
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-settings-6"></i>
                    <span class="nav-text">Setting</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="#">Perguruan Tinggi</a></li>
                    <li><a href="#">Paket</a></li>
                </ul>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-050-info"></i>
                    <span class="nav-text">Apps</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="./app-profile.html">Profile</a></li>
                    <li><a href="./post-details.html">Post Details</a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Email</a>
                        <ul aria-expanded="false">
                            <li><a href="./email-compose.html">Compose</a></li>
                            <li><a href="./email-inbox.html">Inbox</a></li>
                            <li><a href="./email-read.html">Read</a></li>
                        </ul>
                    </li>
                    <li><a href="./app-calender.html">Calendar</a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Shop</a>
                        <ul aria-expanded="false">
                            <li><a href="./ecom-product-grid.html">Product Grid</a></li>
                            <li><a href="./ecom-product-list.html">Product List</a></li>
                            <li><a href="./ecom-product-detail.html">Product Details</a></li>
                            <li><a href="./ecom-product-order.html">Order</a></li>
                            <li><a href="./ecom-checkout.html">Checkout</a></li>
                            <li><a href="./ecom-invoice.html">Invoice</a></li>
                            <li><a href="./ecom-customers.html">Customers</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-041-graph"></i>
                    <span class="nav-text">Charts</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="./chart-flot.html">Flot</a></li>
                    <li><a href="./chart-morris.html">Morris</a></li>
                    <li><a href="./chart-chartjs.html">Chartjs</a></li>
                    <li><a href="./chart-chartist.html">Chartist</a></li>
                    <li><a href="./chart-sparkline.html">Sparkline</a></li>
                    <li><a href="./chart-peity.html">Peity</a></li>
                </ul>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-086-star"></i>
                    <span class="nav-text">Bootstrap</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="./ui-accordion.html">Accordion</a></li>
                    <li><a href="./ui-alert.html">Alert</a></li>
                    <li><a href="./ui-badge.html">Badge</a></li>
                    <li><a href="./ui-button.html">Button</a></li>
                    <li><a href="./ui-modal.html">Modal</a></li>
                    <li><a href="./ui-button-group.html">Button Group</a></li>
                    <li><a href="./ui-list-group.html">List Group</a></li>
                    <li><a href="./ui-card.html">Cards</a></li>
                    <li><a href="./ui-carousel.html">Carousel</a></li>
                    <li><a href="./ui-dropdown.html">Dropdown</a></li>
                    <li><a href="./ui-popover.html">Popover</a></li>
                    <li><a href="./ui-progressbar.html">Progressbar</a></li>
                    <li><a href="./ui-tab.html">Tab</a></li>
                    <li><a href="./ui-typography.html">Typography</a></li>
                    <li><a href="./ui-pagination.html">Pagination</a></li>
                    <li><a href="./ui-grid.html">Grid</a></li>

                </ul>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-045-heart"></i>
                    <span class="nav-text">Plugins</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="./uc-select2.html">Select 2</a></li>
                    <li><a href="./uc-nestable.html">Nestedable</a></li>
                    <li><a href="./uc-noui-slider.html">Noui Slider</a></li>
                    <li><a href="./uc-sweetalert.html">Sweet Alert</a></li>
                    <li><a href="./uc-toastr.html">Toastr</a></li>
                    <li><a href="./map-jqvmap.html">Jqv Map</a></li>
                    <li><a href="./uc-lightgallery.html">Light Gallery</a></li>
                </ul>
            </li>
            <li><a href="widget-basic.html" class="" aria-expanded="false">
                    <i class="flaticon-013-checkmark"></i>
                    <span class="nav-text">Widget</span>
                </a>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-072-printer"></i>
                    <span class="nav-text">Forms</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="./form-element.html">Form Elements</a></li>
                    <li><a href="./form-wizard.html">Wizard</a></li>
                    <li><a href="./form-ckeditor.html">CkEditor</a></li>
                    <li><a href="form-pickers.html">Pickers</a></li>
                    <li><a href="form-validation.html">Form Validate</a></li>
                </ul>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-043-menu"></i>
                    <span class="nav-text">Table</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="table-bootstrap-basic.html">Bootstrap</a></li>
                    <li><a href="table-datatable-basic.html">Datatable</a></li>
                </ul>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-022-copy"></i>
                    <span class="nav-text">Pages</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="./page-login.html">Login</a></li>
                    <li><a href="./page-register.html">Register</a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                        <ul aria-expanded="false">
                            <li><a href="./page-error-400.html">Error 400</a></li>
                            <li><a href="./page-error-403.html">Error 403</a></li>
                            <li><a href="./page-error-404.html">Error 404</a></li>
                            <li><a href="./page-error-500.html">Error 500</a></li>
                            <li><a href="./page-error-503.html">Error 503</a></li>
                        </ul>
                    </li>
                    <li><a href="./page-lock-screen.html">Lock Screen</a></li>
                    <li><a href="./empty-page.html">Empty Page</a></li>
                </ul>
            </li>
            -->
        </ul>
        <!--
        <div class="plus-box">
            <p class="fs-14 font-w600 mb-2">Let Jobick Managed<br>Your Resume Easily<br></p>
            <p>Lorem ipsum dolor sit amet</p>
        </div>
        -->
        <div class="copyright">
            <p><strong>Bdf</strong> © {{ date('Y') }} All Rights Reserved</p>
            <p class="fs-12">Made with <span class="heart"></span> by <a href="https://rasalogi.com/" target="_blank">RasalogiWeb</a></p>
        </div>
    </div>
</div>
<!--**********************************
            Sidebar end
        ***********************************-->
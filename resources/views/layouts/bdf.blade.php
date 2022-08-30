<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <!--  <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image:src" content="./assets/images/index-meta.png" />
    <meta property="og:image" content="./assets/images/index-meta.png" />
    <meta name="twitter:title" content="Bapenda" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
    <link rel="shortcut icon" href="./assets/images/favicon.png" type="image/x-icon" />
    <meta name="description" content="Bapenda Jawa Timur" /> -->

    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('bdf/assets/3rdparty/mobirise-icons2/mobirise2.css')}}" />
    <link rel="stylesheet" href="{{asset('bdf/assets/3rdparty/bootstrap/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('bdf/assets/3rdparty/bootstrap/css/bootstrap-grid.min.css')}}" />
    <link rel="stylesheet" href="{{asset('bdf/assets/3rdparty/bootstrap/css/bootstrap-reboot.min.css')}}" />
    <link rel="stylesheet" href="{{asset('bdf/assets/3rdparty/dropdown/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('bdf/assets/3rdparty/socicon/css/styles.css')}}" />

    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="{{asset('bdf/assets/3rdparty/slick/slick.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('bdf/assets/3rdparty/slick/slick-theme.css')}}" />

    <link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- fancybox -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />

    <!-- page css -->
    <link rel="stylesheet" href="{{asset('bdf/assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('bdf/assets/css/index.css')}}" type="text/css" />
    @yield('styles')
</head>

<body class="home-page">
    <section class="menu main-navbar" once="menu" id="menu2-23">
        <div class="topnavigation">
            <div class="container">
                <ul class="top-nav">
                    <li class="float-end">
                        <span class="search-sp-label display-4">Pencarian : </span>
                        <form id="search-form" class="search-container" action="#">
                            <input id="search-box" type="text" class="search-box" name="q" placeholder="Masukkan kata kunci..." />
                            <label id="search-lbl" for="search-box"><span class="mobi-mbri-search"></span></label>
                            <input type="submit" id="search-submit" />
                        </form>
                    </li>
                    <li class="nav-item"><a class="nav-link link text-white text-primary display-4" href="./login.html">LOGIN</a></li>
                </ul>
            </div>
        </div>
        <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg bg-white">
            <div class="container">
                <div class="navbar-brand">
                    <span class="navbar-logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('bdf/assets/images/logo-bdf.png') }}" alt="Bali Democracy Forum" />
                        </a>
                    </span>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-toggle="collapse" data-target="#navbarSupportedContent" data-bs-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                        <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="./index.html">HOME</a></li>
                        <li class="nav-item active"><a class="nav-link link text-white text-primary display-4" href="./bdf-15.html">BDF 15</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link link text-black text-primary display-4 dropdown-toggle" href="#" id="dropdownProfile" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                ABOUT
                            </a>
                            <ul class="dropdown-menu bg-white" aria-labelledby="dropdownProfile">
                                <li><a class="dropdown-item" href="./what-is-bdf.html">What is The BDF</a></li>
                                <li><a class="dropdown-item" href="./why-bdf.html">Why BDF</a></li>
                                <li><a class="dropdown-item" href="./objectives.html">Objectives</a></li>
                                <li><a class="dropdown-item" href="./participants.html">Participants</a></li>
                                <li><a class="dropdown-item" href="./observer.html">Observer</a></li>
                                <li><a class="dropdown-item" href="./international-organization.html">International Organization</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="./history.html">HISTORY</a></li>
                        <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="./gallery.html">GALLERY</a></li>
                        <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="./ipd.html">IPD</a></li>
                        <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="./publication.html">PUBLICATION</a></li>
                        <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="./media-advisory.html">MEDIA</a></li>
                        <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="./contact.html">CONTACT</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link link text-black text-primary display-4 dropdown-toggle" href="#" id="dropdownLayanan" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                REGISTRATION
                            </a>
                            <ul class="dropdown-menu bg-white" aria-labelledby="dropdownLayanan">
                                <li><a class="dropdown-item" href="./physical-attendance.html">Physical Attendance</a></li>
                                <li><a class="dropdown-item" href="./virtual-attendance.html">Virtual Attendance</a></li>
                                <li><a class="dropdown-item" href="./media.html">Media</a></li>
                                <li><a class="dropdown-item" href="./guest.html">Guest</a></li>
                                <li><a class="dropdown-item" href="./commitee.html">Commitee</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- <div class="icons-menu">
                    <a class="iconfont-wrapper" href="#" target="_blank">
                        <span class="p-2 mbr-iconfont mobi-mbri-search mobi-mbri"></span>
                        <img id="btn_search" src="./assets/images/search.png"/>
                    </a>
                </div> -->
                </div>
            </div>
        </nav>
    </section>
    <!-- content -->


    @yield('content')

    @include('includes.external-link')
    <!-- FOOTER -->
    <footer class="section-footer" id="footer">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-12">
                    <div class="widget-about">
                        <img src="{{ asset('bdf/assets/images/logo-footer.png') }}" class="logo-footer">
                        <div class="about-content text-white">
                            Directorate General of Information and Public Diplomacy, Ministry of Foreign Affairs of Republic of Indonesia
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-12">
                    <div class="widget-nav">
                        <ul>
                            <li><a class="text-white" href="./history.html">HISTORY</a></li>
                            <li><a class="text-white" href="./ipd.html">IPD</a></li>
                            <li><a class="text-white" href="./publication.html">PUBLICATION</a></li>
                            <li><a class="text-white" href="./media-advisory.html">MEDIA</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-12">
                    <div class="widget-contactlist">
                        <ul class="contact-list">
                            <li class="text-white">
                                <i class="fas fa-phone"></i> +6221 3441508 ext 4007
                            </li>
                            <li class="text-white">
                                <i class="fas fa-fax"></i> +6221 385 8035
                            </li>
                            <li class="text-white">
                                <i class="fas fa-envelope"></i> bdf@kemlu.go.id
                            </li>
                        </ul>
                    </div>
                    <div class="widget-sosmed">
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center copyright-row">
                <div class="title col-12">
                    <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-14">Copyright Bali Democracy Forum © {{ date('Y') }} | Created by <a href="https://rasalogi.com/">Rasalogi</a></h3>
                </div>
            </div>
        </div>
    </footer>

    <!-- TO TOP -->
    <div id="scrollToTop" class="scrollToTop mbr-arrow-up">
        <a style="text-align: center"><i class="mbr-arrow-up-icon mbr-arrow-up-icon-cm cm-icon cm-icon-smallarrow-up"></i></a>
    </div>

    <script src="{{ asset('bdf/assets/3rdparty/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('bdf/assets/3rdparty/bootstrap/js/bootstrap.bundle.min.js ') }}"></script>
    <script src="{{ asset('bdf/assets/3rdparty/smoothscroll/smooth-scroll.js') }}"></script>
    <script src="{{ asset('bdf/assets/3rdparty/dropdown/js/navbar-dropdown.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script type="text/javascript" src="{{ asset('bdf/assets/3rdparty/slick/slick.min.js') }}"></script>
    <script src="{{ asset('bdf/assets/js/script.js')}}"></script>
    @yield('scripts')
</body>

</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="{{  asset('bdf/assets/images/logo-bdf.png') }}" type="image/x-icon">

    
    @metas
    <meta name="generator" content="Rasalogiweb">
    <link rel="stylesheet" href="{{asset('bdf/assets/3rdparty/mobirise-icons2/mobirise2.css')}}" />
    <link rel="stylesheet" href="{{asset('bdf/assets/3rdparty/bootstrap/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('bdf/assets/3rdparty/bootstrap/css/bootstrap-grid.min.css')}}" />
    <link rel="stylesheet" href="{{asset('bdf/assets/3rdparty/bootstrap/css/bootstrap-reboot.min.css')}}" />
    <link rel="stylesheet" href="{{asset('bdf/assets/3rdparty/dropdown/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('bdf/assets/3rdparty/socicon/css/styles.css')}}" />
    <link rel="stylesheet" href="{{asset('bdf/datetimepicker/css/classic.css')}}" />
    <link rel="stylesheet" href="{{asset('bdf/datetimepicker/css/classic.date.css')}}" />
    <link rel="stylesheet" href="{{asset('bdf/datetimepicker/css/classic.time.css')}}" />
    <link rel="stylesheet" href="{{asset('bdf/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css')}}" />

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
    <link rel="stylesheet" href="{{asset('bdf/assets/css/style.css?v=4')}}" />
    <link rel="stylesheet" href="{{asset('bdf/assets/css/style-2.css?v=4')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('bdf/assets/css/index.css?v=4')}}" type="text/css" />
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
                    @if(!@Auth::user()->id)
                    <li class="nav-item"><a class="nav-link link text-white text-primary display-4" href="{{ route('login') }}">LOGIN</a></li>
                    @else
                    <li class="nav-item"><a class="nav-link link text-white text-primary display-4" href="{{ route('logout') }}"  onclick="event.preventDefault();document.getElementById('logout-form').submit();" >LOGOUT</a> <form action="{{ route('logout') }}" id="logout-form" method="post">@csrf</form></li>
                    @endif
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
                    @include('includes/top-nav')
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

   
    <!-- FOOTER -->
    <footer class="section-footer" id="footer">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-12">
                    <div class="widget-about">
                        <a href="{{ route('landing') }}" title="Bali Democracy Forum">
                            <img src="{{ asset('bdf/assets/images/logo-footer.png') }}"  alt="Bali Democracy Forum | BDF" class="logo-footer">
                        </a>
                        <div class="about-content text-white">
                            Directorate General of Information and Public Diplomacy, Ministry of Foreign Affairs of Republic of Indonesia
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-12">
                    <div class="widget-nav">
                        <ul>
                            <li><a class="text-white" href="{{ route('history') }}">HISTORY</a></li>
                            <li><a class="text-white" href="{{ route('ipd') }}">IPD</a></li>
                            <li><a class="text-white" href="{{ route('publication') }}">PUBLICATION</a></li>
                            <li><a class="text-white" href="{{ route('publication') }}">MEDIA</a></li>
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
    <script src="{{ asset('bdf/datetimepicker/js/legacy.js') }}"></script>
    <script src="{{ asset('bdf/datetimepicker/js/picker.js') }}"></script>
    <script src="{{ asset('bdf/datetimepicker/js/picker.time.js') }}"></script>
    <script src="{{ asset('bdf/datetimepicker/js/picker.date.js') }}"></script>
    <script src="{{ asset('bdf/bootstrap-material-datetimepicker/js/moment.min.js') }}"></script>
    <script src="{{ asset('bdf/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js') }}"></script>

    <script src="{{ asset('bdf/assets/js/script.js?v=4')}}"></script>
    @yield('scripts')
</body>

</html>
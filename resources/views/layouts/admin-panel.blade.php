<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Jobick : Job Admin Bootstrap 5 Template" />
	<meta property="og:title" content="Jobick : Job Admin Bootstrap 5 Template" />
	<meta property="og:description" content="Jobick : Job Admin Bootstrap 5 Template" />
	<meta property="og:image" content="https://jobick.dexignlab.com/xhtml/social-image.png" />
	<meta name="format-detection" content="telephone=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- PAGE TITLE HERE -->
	<title> @yield('title')</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{asset('assets/images/favicon.png')}}" />
	<link href="{{asset('assets/vendor/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
	@yield('styles')
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
   <div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
    @include('includes.header')

    @include('includes.sidebar')   

		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
             @yield('content')
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
		
		
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Konsela | Designed &amp; Developed by <a href="https://digiworks.id/" target="_blank">Digiwork</a> 2021</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->
			


	</div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    

    <script src="{{asset('assets/vendor/global/global.min.js')}}"></script>
	<script src="{{asset('assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('assets/js/custom.min.js')}}"></script>
	<script src="{{asset('assets/js/dlabnav-init.js')}}"></script>

	@yield('scripts')
    
</body>
</html>
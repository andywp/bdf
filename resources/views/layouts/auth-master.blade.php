<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
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
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    @yield('styles')
    <style>
        .authincation{
            background: rgb(56 182 255 / 59%);
        }
        .btn-primary {
            border-color: #38b6ff;
            background-color: #38b6ff;
        }
    </style>
</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    @yield('content')

                    
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('assets/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('assets/js/custom.min.js')}}"></script>
    <script src="{{asset('assets/js/dlabnav-init.js')}}"></script>
	@yield('scripts')
</body>
</html>
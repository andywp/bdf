<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="bdf" />
	<meta name="author" content="rasalogi.com" />
	<meta name="robots" content="no-follow" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="@yield('title') |  Bali Democracy Forum" />
	<meta property="og:title" content="@yield('title') |  Bali Democracy Forum" />
	<meta property="og:description" content="@yield('title') |  Bali Democracy Forum" />
	<meta property="og:image" content="{{ asset('/bdf/assets/images/logo-bdf.png') }}" />
	<meta name="format-detection" content="telephone=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- PAGE TITLE HERE -->
	<title> @yield('title') |  Bali Democracy Forum</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{asset('bdf/assets/images/logo-bdf.png')}}" />
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
        .form-control{
            border: 0.0625rem solid #87d1fc;
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
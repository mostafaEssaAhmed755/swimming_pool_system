<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- CSRF Token -->
    <meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Responsive Admin Template" />
	<meta name="author" content="RedstarHospital" />
    <title>{{ config('app.name', 'pool') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- google font -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
		type="text/css" />
	<!-- icons -->
	<link href="{{ asset('assets/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{ asset('assets/plugins/iconic/css/material-design-iconic-font.min.css')}}">
	<!-- bootstrap -->
	<link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
	<!-- style -->
	<link rel="stylesheet" href="{{ asset('assets/css/pages/extra_pages.css')}}">
	<!-- favicon -->
	<link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico')}}" />
</head>
<body>
    @yield('content')
    <!-- start js include path -->
	<script src="{{ asset('assets/plugins/jquery/jquery.min.js')}}"></script>
	<!-- bootstrap -->
	<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('assets/js/pages/extra-pages/pages.js')}}"></script>
	<!-- end js include path -->
</body>
</html>

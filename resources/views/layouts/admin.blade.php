<!DOCTYPE html>
<html lang="ar" dir="rtl">
<!-- BEGIN HEAD -->

<head>
	<meta charset="utf-8" />
	<meta http-equiv="content-type" content="text/html; charset=UTF8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Responsive Admin Template" />
	<meta name="author" content="SmartUniversity" />
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'EGY.swim') }}</title>
	<!-- favicon -->
	<link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico')}}" />
	<!-- google font -->
	{{-- <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" /> --}}
	<!--bootstrap -->
	<link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
	<!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="{{ asset('assets/plugins/material/material.min.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/plugins/material/material.rtl.min.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/css/material_style.css')}}">
	<!-- Theme Styles -->
	<link href="{{ asset('assets/css/theme/rtl/theme_style.css')}}" rel="stylesheet" id="rt_style_components" type="text/css" />
	<link href="{{ asset('assets/css/theme/rtl/style.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/css/theme/rtl/theme-color.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/css/theme/rtl/rtl.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/css/responsive.css')}}" rel="stylesheet" type="text/css" />
	
	@stack('styles')

	

</head>
<!-- END HEAD -->
<body
	class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md sidemenu-container-reversed header-white white-sidebar-color logo-indigo">
	<div class="page-wrapper">
		<!-- start header -->
		@include("admin.includes.header")
		<!-- end header -->
		<!-- start color quick setting -->
		@include("admin.includes.color")
		<!-- end color quick setting -->
		<!-- start page container -->
		<div class="page-container">
			<!-- start sidebar menu -->
            @include("admin.includes.sidepare")
			<!-- end sidebar menu -->
			<!-- start page content -->
			@yield("content")
			<!-- end page content -->

		</div>
		<!-- end page container -->
		<!-- start footer -->
        @include("admin.includes.footer")
		<!-- end footer -->
	</div>


	<!-- start js include path -->
	<script src="{{ asset('assets/plugins/jquery/jquery.min.js')}}" ></script>
	<script src="{{ asset('assets/plugins/popper/popper.js')}}" ></script>
	<script src="{{ asset('assets/plugins/jquery-blockui/jquery.blockui.min.js')}}" ></script>
	<script src="{{ asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
	<!-- bootstrap -->
	<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}" ></script>
	<script src="{{ asset('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" ></script>
	<!-- Common js-->
	<script src="{{ asset('assets/js/app.js')}}" ></script>
	<script src="{{ asset('assets/js/layout.js')}}" ></script>
	<script src="{{ asset('assets/js/theme-color.js')}}" ></script>
	<!-- Material -->
	<script src="{{ asset('assets/plugins/material/material.min.js')}}"></script>

	@stack('scripts')
	<script>
		$(document).ready(function() {
			$(document).on('focus', 'input', function() {
				$(this).attr('autocomplete', 'off');
			});
			$('input, :input').attr('autocomplete', 'off');
		});
		$('input, :input').attr('autocomplete', 'off');

	</script>


</body>

</html>
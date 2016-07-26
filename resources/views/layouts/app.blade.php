<?php
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="theme-color" content="#FF9800">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Sistema de Recepción de residuos | @yield('title')</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

	<!-- CSS Files -->
  <link href="{{ URL::asset('assets/bootstrap/3.3.6/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{URL::asset('assets/css/material-kit.css')}}" rel="stylesheet"/>
	<link href="{{URL::asset('css/main.css')}}" rel="stylesheet"/>

	<!-- View's CSS -->
	@yield('css')
</head>

<body>
@yield('modal')
<!-- Backdrop for full page -->
<div id="backdrop-app" class="backdrop-app sidebar-toggle">
</div>

<div class="container-fluid">
	<div class="row">
		@include('layouts.sidebar')
		<div class="page-holder">
			<div class="container-fluid">
				<nav class="navbar" role="navigation">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle sidebar-toggle">
											<span class="sr-only">Toggle navigation</span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand hidden-xs" href="{{ url(Request::path()) }}" id="brand"> @yield('title') / <small> @yield('subtitle') </small></a>
							<a class="navbar-brand visible-xs" href="{{ url(Request::path()) }}" id="brand"> @yield('title') / <small> @yield('subtitle') </small></a>
						</div>
				    	<div class="collapse navbar-collapse visible-xs" id="bs-example-navbar-collapse-1">
				    		<ul class="nav navbar-nav navbar-right">
				        		<li class="dropdown">
				        			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Username<b class="caret"></b></a>
				        			<ul class="dropdown-menu">
									  <li><a href="{{ url('logout') }}">Log Out</a></li>
				    		</ul>
				    	</div>
					</div>
				</nav>
				@yield('content')
			</div>
		</div>
	</div>
</div>

</body>

	<!--   Core JS Files   -->
	<script src="{{ URL::asset('assets/js/jquery.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('assets/bootstrap/3.3.6/js/bootstrap.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('assets/js/material.min.js') }}"></script>

	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="{{ URL::asset('assets/js/nouislider.min.js') }}" type="text/javascript"></script>

	<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
	<script src="{{ URL::asset('assets/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>

	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="{{ URL::asset('assets/js/material-kit.js') }}" type="text/javascript"></script>

	<!-- Main JS -->
	<script src="{{ URL::asset('js/main.js') }}" type="text/javascript"></script>

	<!-- Vue JS -->
	<script src="{{ URL::asset('assets/vue/vue.js') }}" type="text/javascript"></script>

	<!-- Customs JS -->


	<!-- View's Javascript -->
	@yield('scripts')

</html>

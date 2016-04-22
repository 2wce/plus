<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Chatty</title>
	<!-- Latest compiled and minified CSS -->

	<link href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('bower_components/angular-notify/dist/css/angular-notify.css') }}" rel="stylesheet">
	<link type='text/css' href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600' rel='stylesheet'>

    <link type="text/css" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">        <!-- Font Awesome -->
    <link type="text/css" href="{{asset('bower_components/themify-icons/themify-icons.css')}}" rel="stylesheet">              <!-- Themify Icons -->

    <link type="text/css" href="{{asset('css/styles.css')}}" rel="stylesheet">                                     <!-- Core CSS with all styles -->

    <link type="text/css" href="{{asset('plugins/codeprettifier/prettify.css')}}" rel="stylesheet">                <!-- Code Prettifier -->
    <link type="text/css" href="{{asset('plugins/iCheck/skins/minimal/blue.css')}}" rel="stylesheet">              <!-- iCheck -->



<link type="text/css" href="{{asset('plugins/fullcalendar/fullcalendar.css')}}" rel="stylesheet"> 						<!-- FullCalendar -->
<link type="text/css" href="{{asset('plugins/jvectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"> 			<!-- jVectorMap -->
<link type="text/css" href="{{asset('plugins/switchery/switchery.css')}}" rel="stylesheet">


<link type='text/css' href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600' rel='stylesheet'>

                              <!-- Core CSS with all styles -->

	<!--[if lt IE 10]>
			<script type="text/javascript" src="assets/js/media.match.min.js"></script>
			<script type="text/javascript" src="assets/js/respond.min.js"></script>
			<script type="text/javascript" src="assets/js/placeholder.min.js"></script>
	<![endif]-->




</head>

<body class="animated-content">

  @include('templates.header')
	<div class="container">
		@include('templates.partials.alerts')

		@yield('content')

	</div>

	<!-- Latest compiled and minified JavaScript -->
	<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	<link href="{{ asset('bower_components/angular-notify/dist/css/angular-notify.js') }}" rel="stylesheet">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

		<script type="text/javascript" src="{{ asset('js/jquery-1.10.2.min.js')}}"></script> 							<!-- Load jQuery -->
<script type="text/javascript" src="{{ asset('js/jqueryui-1.10.3.min.js')}}"></script> 							<!-- Load jQueryUI -->
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js')}}"></script> 								<!-- Load Bootstrap -->
<script type="text/javascript" src="{{ asset('js/enquire.min.js')}}"></script> 									<!-- Load Enquire -->

<script type="text/javascript" src="{{ asset('plugins/velocityjs/velocity.min.js')}}"></script>					<!-- Load Velocity for Animated Content -->
<script type="text/javascript" src="{{ asset('plugins/velocityjs/velocity.ui.min.js')}}"></script>

<script type="text/javascript" src="{{ asset('plugins/wijets/wijets.js')}}"></script>     						<!-- Wijet -->

<script type="text/javascript" src="{{ asset('assets/plugins/codeprettifier/prettify.js')}}"></script> 				<!-- Code Prettifier  -->
<script type="text/javascript" src="{{ asset('assets/plugins/bootstrap-switch/bootstrap-switch.js')}}"></script> 		<!-- Swith/Toggle Button -->

<script type="text/javascript" src="{{ asset('assets/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js')}}"></script>  <!-- Bootstrap Tabdrop -->

<script type="text/javascript" src="{{ asset('assets/plugins/iCheck/icheck.min.js')}}"></script>     					<!-- iCheck -->

<script type="text/javascript" src="{{ asset('assets/plugins/nanoScroller/js/jquery.nanoscroller.min.js')}}"></script> <!-- nano scroller -->

<script type="text/javascript" src="{{ asset('assets/js/application.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/demo/demo.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/demo/demo-switcher.js')}}"></script>

</body>


</html>

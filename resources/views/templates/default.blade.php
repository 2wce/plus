<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Chatty</title>
	<!-- Latest compiled and minified CSS -->

	<link href="{{ asset('/assets/css/vendor.css') }}" rel="stylesheet">
</head>

<body class="animated-content">

  @include('templates.header')
	<div class="container">
		@include('templates.partials.alerts')

		@yield('content')

	</div>

	<!-- Latest compiled and minified JavaScript -->
  	<script type="text/javascript" src="{{ asset('/assets/js/vendor.js') }}"></script>

</body>


</html>

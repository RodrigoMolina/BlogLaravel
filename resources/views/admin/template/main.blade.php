<!DOCTYPE html>
<html>
<head>
	<title>@yield('title', 'Default') | Panel de Administracion</title>
	<link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}">
</head>
<body>
	@include('admin.template.partials.nav')	
	<section>
		@include('flash::message')
		@include('admin.template.partials.errors')
		@yield('content')
	</section>

	<script type="text/javascript" src="{{ asset('plugins/jquery/js/jquery-3.3.1.slim.js')}}"></script>
	<script type="text/javascript" src="{{ asset('plugins/bootstrap/js/bootstrap.js')}}"></script>
</body>
</html>
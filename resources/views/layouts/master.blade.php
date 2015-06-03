<html lang="en" @yield('ngapp')>
	<head>
	    <title>@yield('title')</title>
		
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/bootstrap-3.3.4-dist/css/bootstrap.min.css') }}">
	    <link rel="stylesheet" type="text/css" href="{{ asset('assets/font-awesome-4.3.0/css/font-awesome.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">


	    <script type="text/javascript" src="{{ asset('assets/jquery-1.11.3/jquery-1.11.3.min.js') }}"></script>
	    <script type="text/javascript" src="{{ asset('assets/bootstrap-3.3.4-dist/js/bootstrap.min.js') }}"></script>
	    <script type="text/javascript" src="{{ asset('assets/angular-1.4/angular.min.js') }}"></script>
	    <script type="text/javascript" src="{{ asset('assets/angular-1.4/angular-route.min.js') }}"></script>

	    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

	    @yield('javascript')
  	</head>
    <body @yield('ngbody')>

        @yield('content')
 
    </body>
</html>
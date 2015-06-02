@extends('layouts.master')

<!-- angular html-->
@section('ngapp')
	ng-app="scotchApp"
@stop

<!-- angular body-->
@section('ngbody')
	ng-controller="mainController"
@stop

@section('title')
	Learning | Angular
@stop

@section('javascript')
	 
	
	<script type="text/javascript">
		
		
		
		// create the module and name it scotchApp
    var scotchApp = angular.module('scotchApp', ['ngRoute']);

    scotchApp.config(function($interpolateProvider){
			$interpolateProvider.startSymbol('{[').endSymbol(']}');
		});

    // configure our routes
    scotchApp.config(function($routeProvider) {
        $routeProvider

            // route for the home page
            .when('/', {
                templateUrl : 'pages',
                controller  : 'mainController'
            })

            .when('/home', {
                templateUrl : 'pages',
                controller  : 'mainController'
            })

            // route for the about page
            .when('/about', {
                templateUrl : 'pages/about',
                controller  : 'aboutController'
            })

            // route for the contact page
            .when('/contact', {
                templateUrl : 'pages/contact',
                controller  : 'contactController'
            });
    });

    // create the controller and inject Angular's $scope
    scotchApp.controller('mainController', function($scope) {
        // create a message to display in our view
        $scope.message = 'Everyone come and see how good I look!';
    });

    scotchApp.controller('aboutController', function($scope) {
        $scope.message = 'Look! I am an about page.';
    });

    scotchApp.controller('contactController', function($scope) {
        $scope.message = 'Contact us! JK. This is just a demo.';
    });
		
	</script>
@stop


@section('content')
	
<nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="#home">Angular Routing Example</a>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="#home"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#about"><i class="fa fa-shield"></i> About</a></li>
        <li><a href="#contact"><i class="fa fa-comment"></i> Contact</a></li>
      </ul>
    </div>
  </nav>

  <div id="main">
  
    <!-- angular templating -->
        <!-- this is where content will be injected -->
    <div ng-view></div>
    
  </div>
  
  <footer class="text-center">
    <p>Single Page</p>
  </footer>


@stop


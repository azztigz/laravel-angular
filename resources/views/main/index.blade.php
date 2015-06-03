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
            .when('/:name', {
                templateUrl: function(urlattr){
                    return '/pages/' + urlattr.name;
                },
                controller: 'mainController'
            })
            .when('/', {
                templateUrl: '/pages',
                controller: 'mainController'
            });

    });

    // create the controller and inject Angular's $scope
    scotchApp.controller('mainController', function($scope) {
        $scope.message = 'HTML enhanced for web apps!';
    });

    scotchApp.controller('SpicyController', ['$scope', function($scope) {
        $scope.spice = 'very';

        $scope.chiliSpicy = function(user) {
            $scope.spice = user.name;
        };

        $scope.jalapenoSpicy = function() {
            $scope.spice = 'jalapeño';
        };
    }]);

    scotchApp.controller('MyController', ['$scope','notify', function ($scope, notify) {
       $scope.callNotify = function(msg) {
         notify(msg);
       };
     }]).factory('notify', ['$window', function(win) {
       var msgs = [];
       return function(msg) {
         msgs.push(msg);
         if (msgs.length == 3) {
           win.alert(msgs.join("\n"));
           msgs = [];
         }
       };
     }]);
        
    </script>
@stop


@section('content')
    
   <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="#home">Angular Routing Example</a>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="#/"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#tutorial"><i class="fa fa-shield"></i> Tutorial</a></li>
        <li><a href="#contact"><i class="fa fa-comment"></i> Contact</a></li>
      </ul>
    </div>
  </nav>

  <div id="main">
    <div ng-view></div>
    <div ng-controller="SpicyController">
        <input type="text" ng-init="user.name='username'" ng-model="user.name">
         <button ng-click="chiliSpicy(user)">Chili</button>
         <button ng-click="jalapenoSpicy()">Jalapeño</button>
         <p>The food is {[spice]} spicy!</p>
    </div>

    <div id="simple" ng-controller="MyController">
      <p>Let's try this simple notify service, injected into the controller...</p>
      <input ng-init="message='test'" ng-model="message" >
      <button ng-click="callNotify(message);">NOTIFY</button>
      <p>(you have to click 3 times to see an alert)</p>
    </div>
  </div>


  
  <footer class="text-center">
    <p>Single Page</p>
  </footer>

@stop


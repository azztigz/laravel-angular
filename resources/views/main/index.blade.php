@extends('layouts.master')

<!-- angular html-->
@section('ngapp')
    ng-app="azzApp"
@stop

<!-- angular body-->
@section('ngbody')
    
@stop

@section('title')
    Learning | Angular
@stop

@section('javascript')
    
    <script type="text/javascript">
            
    // create the module and name it azzApp
    var azzApp = angular.module('azzApp', ['ngRoute']);

    azzApp.config(function($interpolateProvider){
            $interpolateProvider.startSymbol('{[').endSymbol(']}');
        });

    // configure our routes
    azzApp.config(function($routeProvider) {
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
    azzApp.controller('mainController', ['$scope', function($scope) {
        $scope.message = 'HTML enhanced for web apps!';
    }]);

    azzApp.controller('SpicyController', ['$scope', function($scope) {
        $scope.spice = 'very';

        $scope.chiliSpicy = function(user) {
            $scope.spice = user.name;
        };

        $scope.jalapenoSpicy = function() {
            $scope.spice = 'jalapeño';
        };
    }]);

    azzApp.controller('MyController', ['$scope','notify', function ($scope, notify) {
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

    azzApp.controller('PhoneListCtrl', function ($scope) {
      $scope.phones = [
        {'name': 'Nexus S',
         'snippet': 'Fast just got faster with Nexus S.'},
        {'name': 'Motorola XOOM™ with Wi-Fi',
         'snippet': 'The Next, Next Generation tablet.'},
        {'name': 'MOTOROLA XOOM™',
         'snippet': 'The Next, Next Generation tablet.'}
      ];
      $scope.dispPhone = function(phone) {
            alert(phone);
            $scope.dphone = phone;
        };
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
        <li><a href="#/"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#tutorial"><i class="fa fa-shield"></i> Tutorial</a></li>
        <li><a href="#contact"><i class="fa fa-comment"></i> Contact</a></li>
      </ul>
    </div>
  </nav>

  <div id="main">

    <div id="rout" ng-controller="mainController">
        <div ng-view></div>
    </div>
    
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

    <div class="container-fluid" ng-controller="PhoneListCtrl">
      <div class="row">
        <div class="col-md-2">
          <!--Sidebar content-->

          Search: <input ng-model="query">

        </div>
        <div class="col-md-10">
          <!--Body content-->

          <ul class="phones">
            <li ng-repeat="phone in phones | filter:query">
              <a href="void:javascript()" ng-click="dispPhone(phone.name)">{[phone.name]}</a>
              <p>{[phone.snippet]}</p>
            </li>
          </ul>

        </div>
      </div>
    </div>

    <p>Name: <input type="text" ng-model="name"></p>
    <p ng-bind="name"></p>

  </div>



  
  <footer class="text-center">
    <p>Single Page</p>
  </footer>

@stop


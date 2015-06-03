azzApp = angular.module('azzApp', [ 'ngRoute' ])
azzApp.config ($interpolateProvider) ->
  $interpolateProvider.startSymbol('{[').endSymbol ']}'

# configure our routes
azzApp.config ($routeProvider) ->
  $routeProvider.when('/:name',
    templateUrl: (urlattr) ->
      '/pages/' + urlattr.name
    controller: 'mainController').when '/',
    templateUrl: '/pages'
    controller: 'mainController'
    
# create the controller and inject Angular's $scope
azzApp.controller 'mainController', [
  '$scope'
  ($scope) ->
    $scope.message = 'HTML enhanced for web apps!'
]

azzApp.controller 'SpicyController', [
  '$scope'
  ($scope) ->
    $scope.spice = 'very'

    $scope.chiliSpicy = (user) ->
      $scope.spice = user.name

    $scope.jalapenoSpicy = ->
      $scope.spice = 'jalapeño'
]

azzApp.controller('MyController', [
  '$scope'
  'notify'
  ($scope, notify) ->

    $scope.callNotify = (msg) ->
      notify msg

]).factory 'notify', [
  '$window'
  (win) ->
    msgs = []
    (msg) ->
      msgs.push msg
      if msgs.length == 3
        win.alert msgs.join('\n')
        msgs = []
]
azzApp.controller 'PhoneListCtrl', [
  '$scope'
  ($scope) ->
    $scope.phones = [
      {
        'name': 'Nexus S'
        'snippet': 'Fast just got faster with Nexus S.'
      }
      {
        'name': 'Motorola XOOM™ with Wi-Fi'
        'snippet': 'The Next, Next Generation tablet.'
      }
      {
        'name': 'MOTOROLA XOOM™'
        'snippet': 'The Next, Next Generation tablet.'
      }
    ]

    $scope.dispPhone = (phone) ->
      alert phone
      $scope.dphone = phone
]

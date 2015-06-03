var azzApp;

azzApp = angular.module('azzApp', ['ngRoute']);

azzApp.config(function($interpolateProvider) {
  return $interpolateProvider.startSymbol('{[').endSymbol(']}');
});

azzApp.config(function($routeProvider) {
  return $routeProvider.when('/:name', {
    templateUrl: function(urlattr) {
      return '/pages/' + urlattr.name;
    },
    controller: 'mainController'
  }).when('/', {
    templateUrl: '/pages',
    controller: 'mainController'
  });
});

azzApp.controller('mainController', [
  '$scope', function($scope) {
    return $scope.message = 'HTML enhanced for web apps!';
  }
]);

azzApp.controller('SpicyController', [
  '$scope', function($scope) {
    $scope.spice = 'very';
    $scope.chiliSpicy = function(user) {
      return $scope.spice = user.name;
    };
    return $scope.jalapenoSpicy = function() {
      return $scope.spice = 'jalapeño';
    };
  }
]);

azzApp.controller('MyController', [
  '$scope', 'notify', function($scope, notify) {
    return $scope.callNotify = function(msg) {
      return notify(msg);
    };
  }
]).factory('notify', [
  '$window', function(win) {
    var msgs;
    msgs = [];
    return function(msg) {
      msgs.push(msg);
      if (msgs.length === 3) {
        win.alert(msgs.join('\n'));
        return msgs = [];
      }
    };
  }
]);

azzApp.controller('PhoneListCtrl', [
  '$scope', function($scope) {
    $scope.phones = [
      {
        'name': 'Nexus S',
        'snippet': 'Fast just got faster with Nexus S.'
      }, {
        'name': 'Motorola XOOM™ with Wi-Fi',
        'snippet': 'The Next, Next Generation tablet.'
      }, {
        'name': 'MOTOROLA XOOM™',
        'snippet': 'The Next, Next Generation tablet.'
      }
    ];
    return $scope.dispPhone = function(phone) {
      alert(phone);
      return $scope.dphone = phone;
    };
  }
]);

//# sourceMappingURL=app.js.map
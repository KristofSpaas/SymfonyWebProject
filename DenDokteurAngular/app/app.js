(function () {
    'use strict';

    angular.module('myApp', ['ngRoute'])
        .config(moduleConfig);

    moduleConfig.$inject = ['$routeProvider'];

    function moduleConfig($routeProvider) {
       	$routeProvider
	    .when('/appointments/:id', {
		templateUrl: 'views/appointments.html',
		controller: 'appointmentController',
		controllerAs: 'appointmentCtrl'
            })
	    .otherwise({
		redirectTo: '/'
	    });
    }
})();

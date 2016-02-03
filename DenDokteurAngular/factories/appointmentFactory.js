(function () {
	'use strict';

	angular.module('myApp')
	.factory('appointmentFactory', appointmentFactory);

	appointmentFactory.$inject = ['$http', 'GLOBALS'];
	function appointmentFactory($http, GLOBALS) {
		var factory = {};

		factory.getAppointments = function (id) {
			return $http({
				method: 'GET',
				url: GLOBALS.apiAppointmentsUrl + id,
				cache: true
			});
		};

		return factory;
	}
})();

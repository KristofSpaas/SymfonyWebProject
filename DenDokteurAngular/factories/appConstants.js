(function () {
	'use strict';

	angular.module('myApp')
		.constant('GLOBALS', {
			appName: 'Appointments APP',
			apiAppointmentsUrl: 'http://127.0.0.1:8000/api/appointments/'
		});
})();

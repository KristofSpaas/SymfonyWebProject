(function () {
	'use strict';

	angular.module('myApp')
		.controller('appointmentController', appointmentController);

	appointmentController.$inject = ['$routeParams', 'appointmentFactory'];

	function appointmentController($routeParams, appointmentFactory) {
		var vm = this;
		
		var id = $routeParams.id;
		vm.getAppointments = function (id) {
			appointmentFactory.getAppointments(id)
			.success(function (appointments) {
				vm.appointments = appointments;
				vm.doctor = appointments[0].doctor;
			})
			.error(function (err, status) {
				alert('Er is een fout opgetreden: ' + err);
			});
		};

		vm.getAppointments(id);

	}
})();


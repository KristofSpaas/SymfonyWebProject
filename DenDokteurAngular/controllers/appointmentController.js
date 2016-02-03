(function () {
    'use strict';

    angular.module('myApp')
        .controller('appointmentController', appointmentController);

    appointmentController.$inject = ['$routeParams', 'appointmentFactory'];

    function appointmentController($routeParams, appointmentFactory) {
        var vm = this;

        var monthNames = [
            "January", "February", "March",
            "April", "May", "June", "July",
            "August", "September", "October",
            "November", "December"
        ];

        var id = $routeParams.id;
        vm.getAppointments = function (id) {
            appointmentFactory.getAppointments(id)
                .success(function (appointments) {
                    vm.appointments = appointments;
                    vm.doctor = appointments[0].doctor;

                    for (var i = 0; i < vm.appointments.length; i++) {
                        var date = new Date(vm.appointments[i].date);

                        var day = date.getDate();
                        var monthIndex = date.getMonth();
                        var year = date.getFullYear();
                        var hour = date.getHours();
                        var minutes = date.getMinutes();

                        vm.appointments[i].date = day + " " + monthNames[monthIndex] + " " + year + " - " + hour
                        + "h" + minutes;
                    }
                })
                .error(function (err, status) {
                    alert('Er is een fout opgetreden: ' + JSON.stringify(err));
                });
        };

        vm.getAppointments(id);

    }
})();


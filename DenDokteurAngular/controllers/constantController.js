(function () {
	'use strict';

	angular.module('myApp')
		.controller('constantController', constantController);

	constantController.$inject = ['GLOBALS'];
	function constantController(GLOBALS) {
		var vm = this;

		vm.appName = GLOBALS.appName;

	}
})();

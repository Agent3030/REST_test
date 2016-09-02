/**
 * Created by dzozulya on 01.09.16.
 * controller responsible for output data from server API V1
 * @vm.students - collection of students and courses for output in view file
 *
 */
(function(){
    'use strict'
    angular
        .module('RestTest')
        .controller('ApiV2Controller', ApiV2Controller)

    ApiV2Controller.$inject = ['ApiV2'];

    function ApiV2Controller(ApiV2) {
        var vm = this;
        //get collection with students and lessons from API and output it without promise resolving
        vm.students = ApiV2.query();

        //search and filter logic
        vm.sortColumn = function(name){
            vm.reverse = (vm.sorted === name) ? !vm.reverse : false;
            vm.sorted = name;
        }
    }
})();

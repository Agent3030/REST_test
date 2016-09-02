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
        .controller('ApiV1Controller', ApiV1Controller)

    ApiV1Controller.$inject = ['ApiV1'];

    function ApiV1Controller(ApiV1) {
        var vm = this;
        var studentCourses=[];
        // resolving collection of students using promises

            ApiV1.students.query().$promise.then(function (students) {
            angular.forEach(students, function (student) {
                // resolving collection of courses using promises
                ApiV1.courses.query({id:student.id}).$promise.then(function (courses) {
                    //added courses collection to student  by student ids
                    student['courses'] = courses;
                });
                //added student with courses to new array
                studentCourses.push(student);
            });
            vm.reverse = true;
                //output array to view
            vm.students= studentCourses;
            //search and filter logic
            vm.sortColumn = function(name){
                vm.reverse = (vm.sorted === name) ? !vm.reverse : false;
                vm.sorted = name;
            }
        });
    }

})();

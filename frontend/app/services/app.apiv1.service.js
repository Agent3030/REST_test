/**
 * Created by dzozulya on 01.09.16.
 */
(function(){
    'use strict'

    angular
        .module('RestTest')
        .factory('ApiV1', ApiV1)

    ApiV1.$inject = ['$resource'];

    function ApiV1($resource) {
        var resourses = {
            students : $resource('http://localhost:8001/api/v1/users/:id',{id: "@id"},{}),
            courses:  $resource('http://localhost:8001/api/v1/users/get-student-courses?id=:id',{id: "@id"})

        }
        return resourses;
    }
})();

/**
 * Created by dzozulya on 01.09.16.
 */
(function(){
    'use strict'

    angular
        .module('RestTest')
        .factory('ApiV2', ApiV2)

    ApiV2.$inject = ['$resource'];

    function ApiV2($resource) {


        return $resource('http://localhost:8001/api/v2/users/:id',{id: "@id"});
    }
})();

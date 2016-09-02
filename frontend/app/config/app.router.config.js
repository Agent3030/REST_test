/**
 * Created by dzozulya on 01.09.16.
 */
(function(){
    'use strict';
    angular
        .module('RestTest')
        .config(routeConfig)

    function routeConfig($routeProvider) {
        $routeProvider
            .when('/',{
                templateUrl: 'partials/apiv1.html',
                controller: 'ApiV1Controller',
                controllerAs: 'apiv1'
            })
            .when('/apiv2',{
                templateUrl: 'partials/apiv2.html',
                controller: 'ApiV2Controller',
                controllerAs: 'apiv2'
            })
            .otherwise({
                template: "No such API"
            });

    }
})();

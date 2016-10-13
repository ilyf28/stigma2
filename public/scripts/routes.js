define(['app', 'config'],
    function(app, config) {
        'use strict';

        return app.config(['$locationProvider', '$stateProvider', '$urlRouterProvider',
            function($locationProvider, $stateProvider, $urlRouterProvider) {
                $locationProvider.html5Mode({
                    enabled: true,
                    requireBase: false
                });

                var routes = config.get().routes;
                for (var i in routes) {
                    $stateProvider.state(routes[i].state, {
                        url: routes[i].url,
                        templateUrl: routes[i].templateUrl,
                        controller: routes[i].controller
                    });
                }

                $urlRouterProvider.otherwise(config.get().overview);
            }
        ]);
    }
);
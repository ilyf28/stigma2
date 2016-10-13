define(['./implement', './module', '../config'],
    function(implement, services, config) {
        'use strict';

        services.factory('IndexFactory', function($http) {
            return {
                logout: function() {
                    var url = config.get().home + '/auth/logout';
                    return implement.httpGetServiceImpl($http, url);
                },
            }
        });
    }
);
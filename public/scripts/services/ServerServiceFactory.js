define(['./implement', './module', '../config'],
    function(implement, services, config) {
        'use strict';

        services.factory('ServerServiceFactory', function($http) {
            return {
                list: function(status) {
                    var url = config.get().home + '/api/v1/server/services/status/' + status;
                    return implement.httpGetServiceImpl($http, url);
                },
                show: function(name, servicedescription) {
                    var url = config.get().home + '/api/v1/server/services/name/' + name + '/servicedescription/' + implement.replaceBlank(servicedescription);
                    return implement.httpGetServiceImpl($http, url);
                },
            }
        });
    }
);
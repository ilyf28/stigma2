define(['./implement', './module', '../config'],
    function(implement, services, config) {
        'use strict';

        services.factory('ReportFactory', function($http) {
            return {
                getGrafanaDashboard: function(dashboard) {
                    var url = config.get().home + '/api/v1/report/graph/' + dashboard;
                    return implement.httpGetServiceImpl($http, url);
                },
            }
        });
    }
);
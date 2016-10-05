define(['./implement', './module', '../config'],
    function(implement, services, config) {
        'use strict';

        services.factory('DashboardFactory', function($http) {
            return {
                getSystemStatus: function() {
                    var url = config.get().home + '/api/v1/dashboard/systemstatus';
                    return implement.httpGetServiceImpl($http, url);
                },
                getHostStatus: function() {
                    var url = config.get().home + '/api/v1/dashboard/hoststatus';
                    return implement.httpGetServiceImpl($http, url);
                },
                getGlusterFSStatus: function() {
                    var url = config.get().home + '/api/v1/dashboard/glusterfsstatus';
                    return implement.httpGetServiceImpl($http, url);
                },
                getServiceStatus: function() {
                    var url = config.get().home + '/api/v1/dashboard/servicestatus';
                    return implement.httpGetServiceImpl($http, url);
                },
                getEvent: function(type, starttime, endtime) {
                    var url = config.get().home + '/api/v1/dashboard/event/type/' + type + '/starttime/' + starttime + '/endtime/' + endtime;
                    return implement.httpGetServiceImpl($http, url);
                },
            }
        });
    }
);
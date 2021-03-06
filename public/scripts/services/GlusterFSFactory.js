define(['./implement', './module', '../config'],
    function(implement, services, config) {
        'use strict';

        services.factory('GlusterFSFactory', function($http) {
            return {
                listClusters: function() {
                    var url = config.get().home + '/api/v1/glusterfs/clusters';
                    return implement.httpGetServiceImpl($http, url);
                },
                showCluster: function(id) {
                    var url = config.get().home + '/api/v1/glusterfs/clusters/id/' + id;
                    return implement.httpGetServiceImpl($http, url);
                },
            }
        });
    }
);
define(['./module'],
    function(app) {
        'use strict';

        app.controller('GlusterfsListCtrl', [
            '$scope', '$state', 'GlusterFSFactory',
            function($scope, $state, GlusterFSFactory) {
                $scope.clusterGstatus = null;
                $scope.data = {
                    cluster: null,
                    availableOptions: []
                };

                $scope.init = function() {
                    GlusterFSFactory.listClusters()
                            .then(function(response) {
                                $scope.data.availableOptions = response;
                            });
                };

                $scope.showClusterInfo = function() {
                    var id = JSON.parse($scope.data.cluster).id;
                    GlusterFSFactory.showCluster(id)
                            .then(function(response) {
                                $scope.clusterGstatus = JSON.parse(response.result);
                            });
                };

                $scope.init();
            }
        ]);
    }
);
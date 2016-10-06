define(['./module'],
    function(app) {
        'use strict';

        app.controller('GlusterfsListCtrl', [
            '$scope', '$state', 'GlusterFSFactory',
            function($scope, $state, GlusterFSFactory) {
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

                $scope.init();
            }
        ]);
    }
);
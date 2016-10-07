define(['./module'],
    function(app) {
        'use strict';

        app.controller('ServerHostGraphCtrl', [
            '$scope', '$state', '$sce', 'ReportFactory',
            function($scope, $state, $sce, ReportFactory) {
                function getGrafanaDashboardForHost(host_name) {
                    ReportFactory.getGrafanaDashboardForHost(host_name)
                        .then(function(response) {
                            $scope.grafanaUrl = $sce.trustAsResourceUrl(response);
                        });
                };

                getGrafanaDashboardForHost($state.params.name);
            }
        ]);
    }
);
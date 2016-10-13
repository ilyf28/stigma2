define(['./module'],
    function(app) {
        'use strict';

        app.controller('ReportGraphCtrl', [
            '$scope', '$state', '$sce', 'ReportFactory',
            function($scope, $state, $sce, ReportFactory) {
                function getGrafanaDashboard(dashboard) {
                    ReportFactory.getGrafanaDashboard(dashboard)
                        .then(function(response) {
                            $scope.grafanaUrl = $sce.trustAsResourceUrl(response);
                        });
                };

                getGrafanaDashboard('home');
            }
        ]);
    }
);
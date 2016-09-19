define(['./module'],
    function(app) {
        'use strict';

        app.controller('DashboardOverviewCtrl', [
            '$rootScope', '$scope', '$state', '$interval', 'DashboardFactory', 'TimerFactory', 'TimestampFormatFactory',
            function($rootScope, $scope, $state, $interval, DashboardFactory, TimerFactory, TimestampFormatFactory) {
                $scope.init = function() {
                    // $scope.system_status = 400;
                    $scope.host_status = [];
                    $scope.service_status = [];
                    $scope.host_event = [];
                    $scope.service_event = [];

                    // renderSystemStatus();
                    renderHostStatus();
                    renderServiceStatus();
                    renderHostEvent();
                    renderServiceEvent();
                };

                // function renderSystemStatus() {
                //     DashboardFactory.getSystemStatus()
                //         .then(function(response) {
                //             $scope.system_status = response;
                //         });
                // };

                function renderHostStatus() {
                    DashboardFactory.getHostStatus()
                        .then(function(response) {
                            $scope.host_last_data_update = response.result.last_data_update;
                            $scope.host_status = response.data.count;
                        });
                };

                function renderServiceStatus() {
                    DashboardFactory.getServiceStatus()
                        .then(function(response) {
                            $scope.service_last_data_update = response.result.last_data_update;
                            $scope.service_status = response.data.count;
                        });
                };

                function renderHostEvent() {
                    var endtime = parseInt(new Date().getTime() / 1000);
                    var starttime = endtime - (86400 * parseInt($rootScope.overviewEventDurationDate));

                    DashboardFactory.getEvent('host', starttime, endtime)
                        .then(function(response) {
                            $scope.host_event = response.data.alertlist.splice(0, $scope.quantity);
                        });
                };

                function renderServiceEvent() {
                    var endtime = parseInt(new Date().getTime() / 1000);
                    var starttime = endtime - (86400 * parseInt($rootScope.overviewEventDurationDate));

                    DashboardFactory.getEvent('service', starttime, endtime)
                        .then(function(response) {
                            $scope.service_event = response.data.alertlist.splice(0, $scope.quantity);
                        });
                };

                $scope.convertDate = function(timestamp) {
                    if (timestamp == undefined) {
                        return '';
                    }
                    return TimestampFormatFactory.convertDateToYYYYMMDDhhmmss(timestamp);
                };

                $scope.init();
                $scope.quantity = 5;

                TimerFactory.interval($scope, $interval);
            }
        ]);
    }
);
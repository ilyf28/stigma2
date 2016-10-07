define(['./module'],
    function(app) {
        'use strict';

        app.controller('ServerHostListCtrl', [
            '$scope', '$state', '$interval', 'ServerHostFactory', 'TimerFactory', 'TimestampFormatFactory',
            function($scope, $state, $interval, ServerHostFactory, TimerFactory, TimestampFormatFactory) {
                $scope.filter = '';

                $scope.init = function() {
                    ServerHostFactory.list($scope.filter)
                        .then(function(response) {
                            $scope.hosts = response.data.hostlist;
                        });
                };

                $scope.isEmptyObject = function(obj) {
                    if ( (obj == null) || (typeof(obj) == 'undefined') ) return true;
                    return Object.keys(obj).length;
                };

                $scope.hostsFilter = function(filter, event) {
                    $scope.filter = filter;
                    $scope.init();

                    var dl = document.getElementsByClassName('sub-nav');
                    var wrappedDl = angular.element(dl);
                    wrappedDl.find('dd').removeClass('active');

                    var target = angular.element(event.target);
                    var dd = target.parent();
                    dd.addClass('active');
                };

                $scope.detailHost = function(name) {
                    $state.go('serverHostDetail', {name: name});
                };

                $scope.detailHostGraph = function(name) {
                    $state.go('serverHostGraphDetail', {name: name});
                };

                $scope.convertDate = function(timestamp) {
                    return TimestampFormatFactory.convertDateToYYYYMMDDhhmmss(timestamp);
                };

                $scope.getDuration = function(timestamp) {
                    return TimestampFormatFactory.getDurationToNow(timestamp);
                };
                
                $scope.init();

                TimerFactory.interval($scope, $interval);
            }
        ]);
    }
);
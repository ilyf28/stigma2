define(['./module'],
    function(app) {
        'use strict';

        app.controller('ServerServiceListCtrl', [
            '$scope', '$state', '$interval', 'ServerServiceFactory', 'TimerFactory', 'TimestampFormatFactory',
            function($scope, $state, $interval, ServerServiceFactory, TimerFactory, TimestampFormatFactory) {
                $scope.filter = '';

                $scope.init = function() {
                    ServerServiceFactory.list($scope.filter)
                        .then(function(response) {
                            $scope.services = response.data.servicelist;
                        });
                };

                $scope.isEmptyObject = function(obj) {
                    if ( (obj == null) || (typeof(obj) == 'undefined') ) return true;
                    return Object.keys(obj).length;
                };

                $scope.servicesFilter = function(filter, event) {
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

                $scope.detailService = function(name, servicedescription) {
                    $state.go('serverServiceDetail', {name: name, servicedescription: servicedescription});
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
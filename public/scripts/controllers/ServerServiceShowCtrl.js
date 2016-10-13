define(['./module'],
    function(app) {
        'use strict';

        app.controller('ServerServiceShowCtrl', [
            '$scope', '$state', 'ServerServiceFactory', 'TimestampFormatFactory',
            function($scope, $state, ServerServiceFactory, TimestampFormatFactory) {
                $scope.cancel = function() {
                    $state.go('serverServiceList');
                };

                $scope.checkTimestamp = function(value) {
                    var check = TimestampFormatFactory.isValidTimeStamp(value);

                    if (check) {
                        return TimestampFormatFactory.convertDateToYYYYMMDDhhmmss(value);
                    }
                    return value;
                };

                ServerServiceFactory.show($state.params.name, $state.params.servicedescription)
                    .then(function(response) {
                        console.log(response);
                        $scope.service = response.data.service;
                    });
            }
        ]);
    }
);
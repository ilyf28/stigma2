define(['./module'],
    function(app) {
        'use strict';

        app.controller('ServerHostShowCtrl', [
            '$scope', '$state', 'ServerHostFactory', 'TimestampFormatFactory',
            function($scope, $state, ServerHostFactory, TimestampFormatFactory) {
                $scope.cancel = function() {
                    $state.go('serverHostList');
                };

                $scope.checkTimestamp = function(value) {
                    var check = TimestampFormatFactory.isValidTimeStamp(value);

                    if (check) {
                        return TimestampFormatFactory.convertDateToYYYYMMDDhhmmss(value);
                    }
                    return value;
                };

                ServerHostFactory.show($state.params.name)
                    .then(function(response) {
                        $scope.host = response.data.host;
                    });
            }
        ]);
    }
);
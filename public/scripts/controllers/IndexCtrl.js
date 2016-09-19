define(['./module', 'foundation'],
    function(app) {
        'use strict';

        app.controller('IndexCtrl', [
            '$rootScope', '$scope', '$state', '$window', 'IndexFactory',
            function($rootScope, $scope, $state, $window, IndexFactory) {
                function initConfigration() {
                    $rootScope.refreshInterval = "15000";
                    $rootScope.overviewEventDurationDate = "7";
                };

                $scope.setAdmin = function() {
                    $window.location.href = '/admin/dashboard';
                };

                $scope.openIndexConfigArea = function() {
                    $('div#indexConfigArea').foundation('reveal', 'open');
                    $scope.overviewEventDurationDate = $rootScope.overviewEventDurationDate;
                    $scope.refreshInterval = $rootScope.refreshInterval;
                };

                $scope.logout = function() {
                    IndexFactory.logout();
                    $window.location.href = '/auth/login';
                };

                $scope.save = function() {
                    $rootScope.overviewEventDurationDate = $scope.overviewEventDurationDate;
                    $rootScope.refreshInterval = $scope.refreshInterval;
                    $state.reload();
                    $('div#indexConfigArea').foundation('reveal', 'close');
                };

                $scope.cancel = function() {
                    $('div#indexConfigArea').foundation('reveal', 'close');
                };

                $scope.topbarFilter = function(event) {
                    var section = document.getElementsByClassName('top-bar-section');
                    var wrappedSection = angular.element(section);
                    wrappedSection.find('li').removeClass('active');

                    var target = angular.element(event.target);
                    var li = target.parent();
                    li.addClass('active');
                };

                initConfigration();
            }
        ]);
    }
);
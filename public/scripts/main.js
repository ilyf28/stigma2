require.config({
    baseUrl: 'scripts',
    paths: {
        'jquery': '/bower_components/jquery/dist/jquery.min',
        'modernizr': '/bower_components/modernizr/modernizr',
        'angular': '/bower_components/angular/angular.min',
        'ui.router': '/bower_components/angular-ui-router/release/angular-ui-router.min',
        'foundation': '/bower_components/foundation/js/foundation.min',
        'foundation.reveal': '/bower_components/foundation/js/foundation/foundation.reveal',
    },
    shim: {
        'jquery': {
            exports: 'jquery'
        },
        'modernizr': {
            deps: ['jquery']
        },
        'angular': {
            exports: 'angular'
        },
        'ui.router': {
            deps: ['angular']
        },
        'foundation': {
            deps: ['jquery']
        },
        'foundation.reveal': {
            deps: ['foundation']
        },
    }
});

define(['require', 'angular', 'app', 'routes'],
    function(require, angular) {
        'use strict';

        angular.bootstrap(document, ['app']);
    }
);

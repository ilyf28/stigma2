define(['angular', 'jquery', 'modernizr', 'ui.router', './controllers/index', './services/index'],
    function(angular) {
        'use strict';

        return angular.module('app', [
            'ui.router',
            'app.controllers',
            'app.services',
        ]);
    }
);

define([], function() {
    const CONTEXT_ROOT = '';
    const PARTIALS_ROOT = CONTEXT_ROOT + '/partials/';

    var config = {
        home: CONTEXT_ROOT,
        overview: CONTEXT_ROOT + '/overview',
        routes: [
            {'state': 'dashboardOverview', 'url': '/overview', 'templateUrl': PARTIALS_ROOT + 'dashboard.overview.php', 'controller': 'DashboardOverviewCtrl'},




            {'state': 'glusterfsList', 'url': '/glusterfs', 'templateUrl': PARTIALS_ROOT + 'glusterfs.index.php', 'controller': 'GlusterfsListCtrl'},





            {'state': 'serverHostList', 'url': CONTEXT_ROOT + '/hosts', 'templateUrl': PARTIALS_ROOT + 'server.host.index.php', 'controller': 'ServerHostListCtrl'},
            {'state': 'serverHostDetail', 'url': CONTEXT_ROOT + '/hosts/:name', 'templateUrl': PARTIALS_ROOT + 'server.host.show.php', 'controller': 'ServerHostShowCtrl'},
            {'state': 'serverServiceList', 'url': CONTEXT_ROOT + '/services', 'templateUrl': PARTIALS_ROOT + 'server.service.index.php', 'controller': 'ServerServiceListCtrl'},
            {'state': 'serverServiceDetail', 'url': CONTEXT_ROOT + '/services/:name/:servicedescription', 'templateUrl': PARTIALS_ROOT + 'server.service.show.php', 'controller': 'ServerServiceShowCtrl'},
            {'state': 'reportGraph', 'url': CONTEXT_ROOT + '/report/graph', 'templateUrl': PARTIALS_ROOT + 'report.graph.php', 'controller': 'ReportGraphCtrl'},
        ],
    };

    function get() {
        return config;
    };

    return {
        get: get
    };
});
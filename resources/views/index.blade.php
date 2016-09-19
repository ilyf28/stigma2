<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Stigma</title>

        <link rel="stylesheet" href="css/app.css" />

        <script data-main="scripts/main" src="bower_components/requirejs/require.js"></script>
    </head>
    <body ng-controller="IndexCtrl">
        <header>
            <top-bar>
                <nav class="top-bar" data-topbar role="navigation">
                    <ul class="title-area">
                        <li class="name">
                            <h1><a ui-sref="dashboard.overview">STIGMA</a></h1>
                        </li>
                    </ul>
                    <top-bar-section>
                        <section class="top-bar-section">
                            <ul class="left">
                                <li class="active"><a ng-click="topbarFilter($event);" ui-sref="dashboardOverview">Overview</a></li>
                                <li><a ng-click="topbarFilter($event);" ui-sref="">GlusterFS</a></li>
                                <li><a ng-click="topbarFilter($event);" ui-sref="serverHostList">Host</a></li>
                                <li><a ng-click="topbarFilter($event);" ui-sref="serverServiceList">Service</a></li>
                                <li><a ng-click="topbarFilter($event);" ui-sref="reportGraph">Graph</a></li>
                            </ul>
                            <ul class="right">
                                <li><a ng-click="setAdmin();"><i class="fi-info"></i></a></li>
                                <li><a data-reveal-id="indexConfigArea" ng-click="openIndexConfigArea();"><i class="fi-widget"></i></a></li>
                                <li><a ng-click="logout();"><i class="fi-lock"></i></a></li>
                            </ul>
                        </section>
                    </top-bar-section>
                </nav>
            </top-bar>
        </header>
        <div class="row">
            <section class="large-12 columns">
                <article class="mainContents">
                    <div ui-view></div>
                </article>
            </section>
        </div>
        <footer>
            <hr></hr>
            <span class="right">© Copyright 2015 All Rights Reserved.</span>
        </footer>
        <div id="indexConfigArea" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
            <h2 id="modalTitle">Configuration</h2>
            <p></p>
            <div class="row">
                <div class="medium-10 columns">
                    <div class="row">
                        <div class="medium-3 columns">
                            <label for="right-label" class="right inline">Auto Refresh</label>
                        </div>
                        <div class="medium-9 columns">
                            <select ng-model="refreshInterval">
                                <option value="15000">Every 15 s</option>
                                <option value="30000">Every 30 s</option>
                                <option value="60000">Every 1 m</option>
                                <option value="300000">Every 5 m</option>
                                <option value="900000">Every 15 m</option>
                                <option value="1800000">Every 30 m</option>
                                <option value="3600000">Every 1 h</option>
                                <option value="7200000">Every 2 h</option>
                                <option value="86400000">Every 1 d</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="medium-10 columns">
                    <div class="row">
                        <div class="medium-3 columns">
                            <label for="right-label" class="right inline">Event Lists</label>
                        </div>
                        <div class="medium-9 columns">
                            <select ng-model="overviewEventDurationDate">
                                <option value="1">1 Day</option>
                                <option value="2">2 Days</option>
                                <option value="3">3 Days</option>
                                <option value="7">1 Week</option>
                                <option value="14">2 Weeks</option>
                                <option value="28">4 Weeks</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="medium-10 columns">
                    <a class="button right" ng-click="cancel()">Cancel</a>
                    <a class="button success right" ng-click="save()">Save</a>
                </div>
            </div>
        </div>
    </body>
</html>
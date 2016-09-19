<div class="row">
    <div class="medium-12 columns">
        <div class="row">
            <div class="medium-8 columns">
                <div class="" style="background: #4caf50;" ng-show="system_status == 200">
                    <h3 class="" style="text-align: center; padding: 20px 0;"><span class="" style="color: #eaeaea;">SYSTEM: Running</span></h3>
                </div>
                <div class="" style="background: #ff1744;" ng-show="system_status != 200">
                    <h3 class="" style="text-align: center; padding: 20px 0;"><span class="" style="color: #eaeaea;">SYSTEM: Critical</span></h3>
                </div>
            </div>
            <div class="medium-4 columns">
            </div>
        </div>

        <p></p>
        <div class="row">
            <div class="medium-8 columns">
                <h3>Host</h3>
                <!-- <table>
                    <thead>
                        <th>Host</th>
                        <th>Type</th>
                        <th>Time</th>
                        <th>Information</th>
                    </thead>
                    <tbody>
                        <tr ng-repeat="log in host_event | orderBy:'-timestamp' | limitTo:quantity"  ng-show="host_event.length > 0">
                            <td>{{ log.name }}</td>
                            <td>
                                <span class="label success" style="width: 100%;" ng-if="log.state == '0'">OK</span>
                                <span class="label warning" style="width: 100%;" ng-if="log.state == '1'">WARNING</span>
                                <span class="label alert" style="width: 100%;" ng-if="log.state == '2'">CRITICAL</span>
                            </td>
                            <td>{{ convertDate(log.timestamp) }}</td>
                            <td>{{ log.plugin_output }}</td>
                        </tr>
                        <tr ng-show="host_event.length == 0">
                            <td colspan="4"><strong>No host events.</strong></td>
                        </tr>
                    </tbody>
                </table> -->
            </div>
            <div class="medium-4 columns">
                <div class="medium-12 columns">
                    <div class="summary-body">
                        <div style="" class="row">
                            <div class="medium-4 columns">
                                <div class="">
                                    <p class="summary-status-green">Up</p>
                                    <h3 class=""><span class="">{{ host_status.up }}</span></h3>
                                </div>
                            </div>
                            <div class="medium-4 columns summary-border-left">
                                <div class="">
                                    <p class="summary-status-red">Down</p>
                                    <h3 class=""><span class="">{{ host_status.down }}</span></h3>
                                </div>
                            </div>
                            <div class="medium-4 columns summary-border-left">
                                <div class="">
                                    <p class="summary-status-pink">Unreachable</p>
                                    <h3 class=""><span class="">{{ host_status.unreachable }}</span></h3>
                                </div>
                            </div>
                        </div>
                        <div style="" class="row summary-border-top">
                            <div class="medium-6 columns">
                                <div class="">
                                    <p>Health</p>
                                    <h1 class="">
                                        <span class="text-center summary-status-red" ng-show="host_status.problems == 0"><i class="fi-heart"></i></span>
                                        <span class="text-center summary-status-pink" ng-show="host_status.problems != 0"><i class="fi-alert"></i></span>
                                    </h1>
                                </div>

                            </div>

                            <div class="medium-6 columns">
                                <div class="">
                                    <p class="text-left">Last Update</p>
                                    <h4 class="text-left"><span class="">{{ convertDate(host_last_data_update) }}</span></h4>
                                </div>
                            </div>
                        </div>
                        <div style="" class="row summary-border-top">
                            <div class="medium-6 columns">
                                <div class="">
                                    <p>All Problems</p>
                                    <h3 class=" "><span class="">{{ host_status.problems }}</span></h3>
                                </div>
                            </div>
                            <div class="medium-6 columns summary-border-left">
                                <div class="">
                                    <p>All Types</p>
                                    <h3 class=""><span class="">{{ host_status.types }}</span></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <p></p>
        <div class="row">
            <div class="medium-8 columns">
                <h3>Service</h3>
                <!-- <table>
                    <thead>
                        <th>Host</th>
                        <th>Service</th>
                        <th>Type</th>
                        <th>Time</th>
                        <th>Information</th>
                    </thead>
                    <tbody>
                        <tr ng-repeat="log in service_event | orderBy:'-timestamp' | limitTo:quantity" ng-show="service_event.length > 0">
                            <td>{{ log.host_name }}</td>
                            <td>{{ log.description }}</td>
                            <td>
                                <span class="label success" style="width: 100%;" ng-if="log.state == '8'">OK</span>
                                <span class="label warning" style="width: 100%;" ng-if="log.state == '16'">WARNING</span>
                                <span class="label alert" style="width: 100%;" ng-if="log.state == '32'">CRITICAL</span>
                            </td>
                            <td>{{ convertDate(log.timestamp) }}</td>
                            <td>{{ log.plugin_output }}</td>
                        </tr>
                        <tr ng-show="service_event.length == 0">
                            <td colspan="5"><strong>No service events.</strong></td>
                        </tr>
                    </tbody>
                </table> -->
            </div>
            <div class="medium-4 columns">
                <div class="medium-12 columns">
                    <div class="summary-body">
                        <div style="" class="row">
                            <div class="medium-3 columns">
                                <div class="">
                                    <p class="summary-status-green">OK</p>
                                    <h3 class=""><span class="">{{ service_status.ok }}</span></h3>
                                </div>
                            </div>
                            <div class="medium-3 columns summary-border-left">
                                <div class="">
                                    <p class="summary-status-yellow">Warning</p>
                                    <h3 class=""><span class="">{{ service_status.warning }}</span></h3>
                                </div>
                            </div>
                            <div class="medium-3 columns summary-border-left">
                                <div class="">
                                    <p class="summary-status-red">Critical</p>
                                    <h3 class=""><span class="">{{ service_status.critical }}</span></h3>
                                </div>
                            </div>
                            <div class="medium-3 columns summary-border-left">
                                <div class="">
                                    <p class="summary-status-pink">Unknown</p>
                                    <h3 class=""><span class="">{{ service_status.unknown }}</span></h3>
                                </div>
                            </div>
                        </div>
                        <div style="" class="row summary-border-top">
                            <div class="medium-6 columns">
                                <div class="">
                                    <p>Health</p>
                                    <h1 class="">
                                        <span class="text-center summary-status-red" ng-show="service_status.problems == 0"><i class="fi-heart"></i></span>
                                        <span class="text-center summary-status-pink" ng-show="service_status.problems != 0"><i class="fi-alert"></i></span>
                                    </h1>
                                </div>

                            </div>

                            <div class="medium-6 columns">
                                <div class="">
                                    <p class="text-left">Last Update</p>
                                    <h4 class="text-left"><span class="">{{ convertDate(service_last_data_update) }}</span></h4>
                                </div>
                            </div>
                        </div>
                        <div style="" class="row summary-border-top">
                            <div class="medium-6 columns">
                                <div class="">
                                    <p>All Problems</p>
                                    <h3 class=" "><span class="">{{ service_status.problems }}</span></h3>
                                </div>
                            </div>
                            <div class="medium-6 columns summary-border-left">
                                <div class="">
                                    <p>All Types</p>
                                    <h3 class=""><span class="">{{ service_status.types }}</span></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <p></p>
    <div class="medium-12 columns">
        <div class="row">
            <div class="medium-8 columns">
                <div class="medium-4 columns">
                    <div style="background: #eee; width:100%; height:200px;">
                        <h3 style="padding-left: 5px;"><i class="fi-monitor"></i> UP</h3>
                        <h1 style="text-align: center; padding: 20px 0;">
                            <span style="color: #4caf50;" ng-if="host_status.up > 0">{{ host_status.up }}</span>
                            <span style="" ng-if="host_status.up == 0">0</span>
                        </h1>
                    </div>
                </div>
                <div class="medium-4 columns">
                    <div style="background: #eee; width:100%; height:200px;">
                        <h3 style="padding-left: 5px;"><i class="fi-monitor"></i> DOWN</h3>
                        <h1 style="text-align: center; padding: 20px 0;">
                            <span style="color: #ff1744;" ng-if="host_status.down > 0">{{ host_status.down }}</span>
                            <span style="" ng-if="host_status.down == 0">0</span>
                        </h1>
                    </div>
                </div>
                <div class="medium-4 columns">
                    <div style="background: #eee; width:100%; height:200px;">
                        <h3 style="padding-left: 5px;"><i class="fi-monitor"></i> UNREACHABLE</h3>
                        <h1 style="text-align: center; padding: 20px 0;">
                            <span style="color: #e91e63;" ng-if="host_status.unreachable > 0">{{ host_status.unreachable }}</span>
                            <span style="" ng-if="host_status.unreachable == 0">0</span>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="medium-2 columns">
                <div style="background: #eec; width:100%; height:200px;">
                    <h3 style="padding-left: 5px;"><i class="fi-list"></i> VOLUMES</h3>
                    <h1 style="text-align: center; padding: 20px 0;"><span style="">1</span></h1>
                </div>
            </div>
            <div class="medium-2 columns">
                <div style="background: #eec; width:100%; height:200px;">
                    <h3 style="padding-left: 5px;"><i class="fi-thumbnails"></i> BRICKS</h3>
                    <h1 style="text-align: center; padding: 20px 0;"><span style="">28</span></h1>
                </div>
            </div>
        </div>

        <p></p>
        <div class="row">
            <div class="medium-8 columns">
                <div class="medium-4 columns">
                    <div style="background: #eee; width:100%; height:200px;">
                        <h3 style="padding-left: 5px;"><i class="fi-cloud"></i> OK</h3>
                        <h1 style="text-align: center; padding: 20px 0;">
                            <span style="color: #4caf50;" ng-if="service_status.ok > 0">{{ service_status.ok }}</span>
                            <span style="" ng-if="service_status.ok == 0">0</span>
                        </h1>
                    </div>
                </div>
                <div class="medium-4 columns">
                    <div style="background: #eee; width:100%; height:200px;">
                        <h3 style="padding-left: 5px;"><i class="fi-cloud"></i> WARNING</h3>
                        <h1 style="text-align: center; padding: 20px 0;">
                            <span style="color: #fbc02d;" ng-if="service_status.warning > 0">{{ service_status.warning }}</span>
                            <span style="" ng-if="service_status.warning == 0">0</span>
                        </h1>
                    </div>
                </div>
                <div class="medium-4 columns">
                    <div style="background: #eee; width:100%; height:200px;">
                        <h3 style="padding-left: 5px;"><i class="fi-cloud"></i> CRITICAL</h3>
                        <h1 style="text-align: center; padding: 20px 0;">
                            <span style="color: #ff1744;" ng-if="service_status.critical > 0">{{ service_status.critical }}</span>
                            <span style="" ng-if="service_status.critical == 0">0</span>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="medium-4 columns">
                <div style="background: #eec; width:100%; height:200px;">
                    <h3 style="padding-left: 5px;"><i class="fi-folder"></i> CAPACITY</h3>
                    <div style="text-align: center; padding: 5px 0;">
                        <h4 style="float: left; text-align: center; width: 33%;"><span style="">215.98 GiB</span></h4>
                        <h4 style="float: left; text-align: center; width: 33%;"><span style="">215.91 GiB</span></h4>
                        <h4 style="float: left; text-align: center; width: 33%;"><span style="">65.16 MiB</span></h4>
                    </div>
                    <div style="text-align: center; padding: 0;">
                        <h4 style="float: left; text-align: center; width: 33%;"><span style="">Total</span></h4>
                        <h4 style="float: left; text-align: center; width: 33%;"><span style="">Free</span></h4>
                        <h4 style="float: left; text-align: center; width: 33%;"><span style="">Used</span></h4>
                    </div>
                </div>
            </div>
        </div>

        <p></p>
        <div class="row">
            <div class="medium-8 columns">
                <div class="medium-12 columns">
                    <h3>Host Event</h3>
                    <table>
                        <thead>
                            <th>Host</th>
                            <th>Type</th>
                            <th>Time</th>
                            <th>Information</th>
                        </thead>
                        <tbody>
                            <tr ng-repeat="log in host_event | orderBy:'-timestamp'"  ng-show="host_event.length > 0">
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
                    </table>
                </div>
            </div>
            <div class="medium-4 columns">
                <div style="background: #eec; width:100%; height:200px;">
                    <h3 style="padding-left: 5px;"><i class="fi-graph-trend"></i> UTILIZATION</h3>
                    <div style="text-align: center; padding: 5px 0;">
                        <h4 style="float: left; text-align: center; width: 50%;"><span style="">19.5 %</span></h4>
                        <h4 style="float: left; text-align: center; width: 50%;"><span style="">20.7 %</span></h4>
                    </div>
                    <div style="text-align: center; padding: 0;">
                        <h4 style="float: left; text-align: center; width: 50%;"><span style="">CPU</span></h4>
                        <h4 style="float: left; text-align: center; width: 50%;"><span style="">Memory</span></h4>
                    </div>
                </div>
            </div>
        </div>

        <p></p>
        <div class="row">
            <div class="medium-8 columns">
                <div class="medium-12 columns">
                    <h3>Service Event</h3>
                    <table>
                        <thead>
                            <th>Host</th>
                            <th>Service</th>
                            <th>Type</th>
                            <th>Time</th>
                            <th>Information</th>
                        </thead>
                        <tbody>
                            <tr ng-repeat="log in service_event | orderBy:'-timestamp'" ng-show="service_event.length > 0">
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
                    </table>
                </div>
            </div>
            <div class="medium-4 columns">
                <div class="medium-12 columns">
                    <h3>GlusterFS Event</h3>
                    <table>
                        <thead>
                            <th>Host</th>
                            <th>Type</th>
                            <th>Time</th>
                            <th>Information</th>
                        </thead>
                        <tbody>
                            <tr ng-repeat="log in host_event | orderBy:'-timestamp'"  ng-show="host_event.length > 0">
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
                                <td colspan="4"><strong>No GlusterFS events.</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
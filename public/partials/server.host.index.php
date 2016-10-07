<div class="row">
    <div class="medium-12 columns">
        <div class="row">
            <div class="large-8 columns">
                <dl class="sub-nav">
                    <dt>Filter:</dt>
                    <dd class="active"><a ng-click="hostsFilter('', $event)">All</a></dd>
                    <dd><a ng-click="hostsFilter('0', $event)">Up</a></dd>
                    <dd><a ng-click="hostsFilter('1', $event)">Down</a></dd>
                    <dd><a ng-click="hostsFilter('2', $event)">Unreachable</a></dd>
                    <dd class="hide-for-small-only"><a ng-click="hostsFilter('9', $event)">Pending</a></dd>
                </dl>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Host</th>
                    <th style="width:100px;">Status</th>
                    <th style="width:200px;">Last Check</th>
                    <th style="width:200px;">Duration</th>
                    <th>Status Information</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="(key, host) in hosts" ng-show="hosts != null">
                    <td><a ng-click="detailHost(host.name)">{{ host.name }}</a>&nbsp;&nbsp;&nbsp;<a ng-click="detailHostGraph(host.name)"><i class="fi-graph-trend"></i></a></td>
                    <td>
                          <span class="label success" style="width: 100%;" ng-if="host.status == '2'">UP</span>
                          <span class="label alert" style="width: 100%;" ng-if="host.status == '4'">DOWN</span>
                          <span class="label secondary" style="width: 100%;" ng-if="host.status == '1'">PENDING</span>
                    </td>
                    <td>{{ convertDate(host.last_check) }}</td>
                    <td>{{ getDuration(host.last_state_change) }}</td>
                    <td>{{ host.plugin_output }}</td>
                </tr>
                <tr ng-show="!isEmptyObject(hosts)">
                    <td colspan="5"><strong>No hosts.</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
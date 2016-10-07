<div class="row">
    <div class="medium-12 columns">
        <div class="row">
            <div class="large-8 columns">
                <dl class="sub-nav">
                    <dt>Filter:</dt>
                    <dd class="active"><a ng-click="servicesFilter('', $event)">All</a></dd>
                    <dd><a ng-click="servicesFilter('0', $event)">OK</a></dd>
                    <dd><a ng-click="servicesFilter('1', $event)">Warning</a></dd>
                    <dd><a ng-click="servicesFilter('2', $event)">Unknown</a></dd>
                    <dd><a ng-click="servicesFilter('3', $event)">Critical</a></dd>
                    <dd class="hide-for-small-only"><a ng-click="servicesFilter('9', $event)">Pending</a></dd>
                </dl>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Host</th>
                    <th>Service</th>
                    <th style="width:100px;">Status</th>
                    <th>Last Check</th>
                    <th>Duration</th>
                    <th style="width:100px;">Attempt</th>
                    <th>Status Information</th>
                </tr>
            </thead>
            <tbody ng-repeat="(key, host) in services" ng-show="services != null">
                <tr ng-repeat="(key, service) in host">
                    <td><a ng-click="detailHost(service.host_name)">{{ service.host_name }}</a></td>
                    <td><a ng-click="detailService(service.host_name, service.description)">{{ service.description }}</a></td>
                    <td>
                          <span class="label success" style="width: 100%;" ng-if="service.status == '2'">OK</span>
                          <span class="label warning" style="width: 100%;" ng-if="service.status == '4'">WARNING</span>
                          <span class="label info" style="width: 100%;" ng-if="service.status == '8'">UNKOWN</span>
                          <span class="label alert" style="width: 100%;" ng-if="service.status == '16'">CRITICAL</span>
                          <span class="label secondary" style="width: 100%;" ng-if="service.status == '1'">PENDING</span>
                    </td>
                    <td>{{ convertDate(service.last_check) }}</td>
                    <td>{{ getDuration(service.last_state_change) }}</td>
                    <td>{{ service.current_attempt }} / {{ service.max_attempts }}</td>
                    <td>{{ service.plugin_output }}</td>
                </tr>
            </tbody>
            <tbody ng-show="!isEmptyObject(services)">
                <tr>
                    <td colspan="7"><strong>No services.</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
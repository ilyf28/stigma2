<!-- <script src="http://d3js.org/d3.v3.min.js" language="JavaScript"></script>
<script src="/js/liquidFillGauge.js" language="JavaScript"></script>
<style>
    .liquidFillGaugeText { font-family: Helvetica; font-weight: bold; }
</style> -->
<!-- <script language="JavaScript">
    var gauge1 = loadLiquidFillGauge("fillgauge1", 55);
</script> -->
<div class="row">
    <div class="medium-12 columns">
        <div class="row">
            <div class="large-8 columns">
                <dl class="sub-nav">
                    <dt><label for="repeatClusters"> Cluster: </label></dt>
                    <dd class="">
                        <select name="repeatClusters" id="repeatClusters" ng-model="data.cluster" ng-change="showClusterInfo()" style="width:450px;">
                            <option ng-repeat="option in data.availableOptions" value="{{option}}">{{option.cluster_name}}</option>
                        </select>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="medium-12 columns" ng-show="clusterGstatus != null">
        <div class="large-12 columns">
            <div class="row">
                <div class="large-6 columns">
                    <div style="width:100%; height:200px;">
                        <h3 style="padding-left: 5px;"><i class="fi-monitor"></i> Info</h3>
                        <h4 style="text-align: left;">
                            <table>
                                <tbody>
                                    <tr>
                                        <td style="width: 150px;"><span>Product Name</span></td>
                                        <td><span>{{ clusterGstatus.product_name }}</span></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 150px;"><span>GLFS Version</span></td>
                                        <td><span>{{ clusterGstatus.glfs_version }}</span></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 150px;"><span>Over Commit</span></td>
                                        <td><span>{{ clusterGstatus.over_commit }}</span></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 150px;"><span>Snapshot</span></td>
                                        <td><span>{{ clusterGstatus.snapshot_count }}</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </h4>
                    </div>
                </div>
                <div class="large-3 columns">
                    <div style="background: #eec; width:100%; height:200px;">
                        <h3 style="padding-left: 5px;"><i class="fi-monitor"></i> Volume: Capacity</h3>
                        <h1 style="text-align: center; padding: 20px 0;">
                            <span style="color: #4caf50;" ng-if="clusterGstatus.sh_active > 0">{{ clusterGstatus.sh_active }}</span>
                            <span style="" ng-if="clusterGstatus.sh_active == 0">0</span>
                        </h1>
                    </div>
                </div>
                <div class="large-3 columns">
                    <div style="background: #eec; width:100%; height:200px;">
                        <h3 style="padding-left: 5px;"><i class="fi-monitor"></i> Volume: {{ clusterGstatus.volume_summary[0].volume_name }}</h3>
                        <h1 style="text-align: center; padding: 20px 0;">
                            <span style="color: #4caf50;" ng-if="clusterGstatus.volume_summary[0].state == 'up'">UP</span>
                            <span style="color: #ff1744;" ng-if="clusterGstatus.volume_summary[0].state != 'up'">{{ clusterGstatus.volume_summary[0].state }}</span>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <p></p>
        <div class="large-12 columns">
            <div class="row">
                <div class="large-3 columns">
                    <div style="background: #eee; width:100%; height:200px;">
                        <h3 style="padding-left: 5px;"><i class="fi-monitor"></i> Node</h3>
                        <h1 style="text-align: center; padding: 20px 0;">
                            <span style="color: #4caf50;" ng-if="clusterGstatus.node_count > 0">{{ clusterGstatus.node_count }}</span>
                            <span style="" ng-if="clusterGstatus.node_count == 0">0</span>
                        </h1>
                    </div>
                </div>
                <div class="large-3 columns">
                    <div style="background: #eee; width:100%; height:200px;">
                        <h3 style="padding-left: 5px;"><i class="fi-monitor"></i> Nodes Active</h3>
                        <h1 style="text-align: center; padding: 20px 0;">
                            <span style="color: #4caf50;" ng-if="clusterGstatus.nodes_active > 0">{{ clusterGstatus.nodes_active }}</span>
                            <span style="" ng-if="clusterGstatus.nodes_active == 0">0</span>
                        </h1>
                    </div>
                </div>
                <div class="large-3 columns">
                    <div style="background: #eee; width:100%; height:200px;">
                        <h3 style="padding-left: 5px;"><i class="fi-monitor"></i> Brick</h3>
                        <h1 style="text-align: center; padding: 20px 0;">
                            <span style="color: #4caf50;" ng-if="clusterGstatus.brick_count > 0">{{ clusterGstatus.brick_count }}</span>
                            <span style="" ng-if="clusterGstatus.brick_count == 0">0</span>
                        </h1>
                    </div>
                </div>
                <div class="large-3 columns">
                    <div style="background: #eee; width:100%; height:200px;">
                        <h3 style="padding-left: 5px;"><i class="fi-monitor"></i> Bricks Active</h3>
                        <h1 style="text-align: center; padding: 20px 0;">
                            <span style="color: #4caf50;" ng-if="clusterGstatus.bricks_active > 0">{{ clusterGstatus.bricks_active }}</span>
                            <span style="" ng-if="clusterGstatus.bricks_active == 0">0</span>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
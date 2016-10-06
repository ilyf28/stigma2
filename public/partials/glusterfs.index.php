<div class="row">
    <div class="medium-12 columns">
        <div class="row">
            <div class="large-8 columns">
                <dl class="sub-nav">
                    <dt><label for="repeatClusters"> Cluster: </label></dt>
                    <dd class="">
                        <select name="repeatClusters" id="repeatClusters" ng-model="data.cluster" style="width:450px;">
                            <option ng-repeat="option in data.availableOptions" value="{{option.id}}">{{option.cluster_name}}</option>
                        </select>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
</div>
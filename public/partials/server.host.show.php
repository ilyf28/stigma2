<div class="row">
    <div class="medium-12 columns">
        <div class="row">
            <table>
                <tbody>
                    <tr ng-repeat="(key, value) in host">
                        <td width="30%">
                            <span class="right">{{ key }}</span>
                        </td>
                        <td>
                            <span ng-if="value">{{ checkTimestamp(value) }}</span>
                            <span ng-if="!value">NONE</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="medium-12 columns">
                <button type="button" class="btn btn-default right" ng-click="cancel()">List</button>
            </div>
        </div>
    </div>
</div>
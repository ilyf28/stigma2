<div>
    <tabset>
        <tab ng-repeat="tab in tabs" heading="{{tab.title}}" ui-sref="{{tab.route}}" active="tab.active">
              <div ui-view></div>
        </tab>
    </tabset>
</div>
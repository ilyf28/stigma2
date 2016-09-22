<div class="row">
    <div class="small-7 columns">
        @foreach($hostgroupTmpl as $key => $formGroup) 
        <div class="row">
            <div class="small-12 columns">
                <div class="row">
                    <div class="small-4 columns">
                        <label for="right-label" class="right inline">
                            @if($formGroup['required'])<span style="color:red">*</span>@endif
                            {{$formGroup['display_name']}}
                        </label>
                    </div>
                    <div class="small-8 columns">
                        @if(isset($hostgroupJsonData) && isset($hostgroupJsonData->{$key})) 
                            <?php 
                                $data = $hostgroupJsonData->{$key};
                            ?>
                        @else
                            <?php
                                $data = null;
                            ?>
                        @endif
                            {!! Form::text($key, $data ) !!}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="small-5 columns">
        <div class="panel white-panel  radius">
            <h5>Hostgroup Members</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th width="50"></th>
                        <th>Hostgroup</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($hostgroupAllCollection as $hostgroupObj)
                    @if(isset($hostgroup) == null || (isset($hostgroup) && $hostgroup->getKey() != $hostgroupObj->getKey()) )
                    <tr>
                        <?php
                            $check = false;
                            $uses = [];

                            if (isset($hostgroup)) {
                                $data = $hostgroup->data;

                                if (isset(json_decode($data)->hostgroup_members)) {
                                    $hostgroup_members = explode(',', json_decode($data)->hostgroup_members);

                                    foreach ($hostgroup_members as $hostgroup_member) {
                                        if ($hostgroupObj->hostgroup_name == $hostgroup_member) {
                                            $check = true;
                                        }
                                    }
                                }
                            } 
                        ?>
                        <td>{!! Form::checkbox('hostgroupMembers[]', $hostgroupObj->hostgroup_name, $check) !!}</td>
                        <td>
                            <a href="{{ route('admin.hostgroups.edit',array($hostgroupObj->getKey())) }}">{{$hostgroupObj->hostgroup_name}}</a>
                        </td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div> 
    </div>
</div>
<div class="row">
    <div class="small-7 columns">
    </div>
    <div class="small-5 columns">
        <div class="panel white-panel  radius">
            <h5>Host Members</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th width="50"></th>
                        <th>Host</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($hostAllCollection as $hostObj)
                    @if(isset($host) == null || (isset($host) && $host->getKey() != $hostObj->getKey()) )
                    <tr>
                        <?php
                            $check = false;
                            $uses = [];

                            if (isset($host)) {
                                $data = $host->data;

                                if (isset(json_decode($data)->members)) {
                                    $members = explode(',', json_decode($data)->members);

                                    foreach ($members as $member) {
                                        if ($hostObj->host_name == $member) {
                                            $check = true;
                                        }
                                    }
                                }
                            } 
                        ?>
                        <td>{!! Form::checkbox('hostMembers[]', $hostObj->host_name, $check) !!}</td>
                        <td>
                            <a href="{{ route('admin.hosts.edit',array($hostObj->getKey())) }}">{{$hostObj->host_name}}</a>
                        </td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{!! Form::submit('SAVE', array('class'=>'right button')) !!}

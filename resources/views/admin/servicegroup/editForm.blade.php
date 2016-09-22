<div class="row">
    <div class="small-7 columns">
        @foreach($servicegroupTmpl as $key => $formGroup) 
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
                        @if(isset($servicegroupJsonData) && isset($servicegroupJsonData->{$key})) 
                            <?php 
                                $data = $servicegroupJsonData->{$key};
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
            <h5>Servicegroup Members</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th width="50"></th>
                        <th>Servicegroup</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($servicegroupAllCollection as $servicegroupObj)
                    @if(isset($servicegroup) == null || (isset($servicegroup) && $servicegroup->getKey() != $servicegroupObj->getKey()) )
                    <tr>
                        <?php
                            $check = false;
                            $servicegroup_members = [];

                            if (isset($servicegroup)) {
                                $data = $servicegroup->data;

                                if (isset(json_decode($data)->servicegroup_members)) {
                                    $servicegroup_members = explode(',', json_decode($data)->servicegroup_members);

                                    foreach ($servicegroup_members as $servicegroup_member) {
                                        if ($servicegroupObj->servicegroup_name == $servicegroup_member) {
                                            $check = true;
                                        }
                                    }
                                }
                            } 
                        ?>
                        <td>{!! Form::checkbox('servicegroupMembers[]', $servicegroupObj->servicegroup_name, $check) !!}</td>
                        <td>
                            <a href="{{ route('admin.servicegroups.edit',array($servicegroupObj->getKey())) }}">{{$servicegroupObj->servicegroup_name}}</a>
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
            <h5>Service Members</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th width="50"></th>
                        <th>Service</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($serviceAllCollection as $serviceObj)
                    <tr>
                        <?php
                            $check = false;
                            $members = [];

                            if (isset($servicegroup)) {
                                $data = $servicegroup->data;

                                if (isset(json_decode($data)->members)) {
                                    $members = explode(',', json_decode($data)->members);

                                    for ($i = 0; $i < count($members); $i = $i + 2)
                                        if ($serviceObj->host_name == $member[$i] && $serviceObj->service_description == $member[$i+1]) {
                                            $check = true;
                                        }
                                    }
                                }
                            } 
                        ?>
                        <td>{!! Form::checkbox('serviceMembers[]', $serviceObj->host_name.','.$serviceObj->service_description, $check) !!}</td>
                        <td>
                            <a href="{{ route('admin.services.edit',array($serviceObj->getKey())) }}">{{$serviceObj->host_name.','.$serviceObj->service_description}}</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{!! Form::submit('SAVE', array('class'=>'right button')) !!}

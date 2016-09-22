<div class="row">
    <div class="small-7 columns">
        @foreach($contactgroupTmpl as $key => $formGroup) 
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
                        @if(isset($contactgroupJsonData) && isset($contactgroupJsonData->{$key})) 
                            <?php 
                                $data = $contactgroupJsonData->{$key};
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
            <h5>Contactgroup Members</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th width="50"></th>
                        <th>Contactgroup</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($contactgroupAllCollection as $contactgroupObj)
                    @if(isset($contactgroup) == null || (isset($contactgroup) && $contactgroup->getKey() != $contactgroupObj->getKey()) )
                    <tr>
                        <?php
                            $check = false;
                            $contactgroup_members = [];

                            if (isset($contactgroup)) {
                                $data = $contactgroup->data;

                                if (isset(json_decode($data)->contactgroup_members)) {
                                    $contactgroup_members = explode(',', json_decode($data)->contactgroup_members);

                                    foreach ($contactgroup_members as $contactgroup_member) {
                                        if ($contactgroupObj->contactgroup_name == $contactgroup_member) {
                                            $check = true;
                                        }
                                    }
                                }
                            } 
                        ?>
                        <td>{!! Form::checkbox('contactgroupMembers[]', $contactgroupObj->contactgroup_name, $check) !!}</td>
                        <td>
                            <a href="{{ route('admin.contactgroups.edit',array($contactgroupObj->getKey())) }}">{{$contactgroupObj->contactgroup_name}}</a>
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
            <h5>Contact Members</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th width="50"></th>
                        <th>Contact</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($contactAllCollection as $contactObj)
                    <tr>
                        <?php
                            $check = false;
                            $members = [];

                            if (isset($contactgroup)) {
                                $data = $contactgroup->data;

                                if (isset(json_decode($data)->members)) {
                                    $members = explode(',', json_decode($data)->members);

                                    foreach ($members as $member) {
                                        if ($contactObj->contact_name == $member) {
                                            $check = true;
                                        }
                                    }
                                }
                            } 
                        ?>
                        <td>{!! Form::checkbox('contactMembers[]', $contactObj->contact_name, $check) !!}</td>
                        <td>
                            <a href="{{ route('admin.contacts.edit',array($contactObj->getKey())) }}">{{$contactObj->contact_name}}</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{!! Form::submit('SAVE', array('class'=>'right button')) !!}

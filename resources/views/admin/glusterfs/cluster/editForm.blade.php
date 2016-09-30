<div class="row">
    <div class="small-7 columns">
        <div class="row">
            <div class="small-12 columns">
                <div class="row">
                    <div class="small-4 columns">
                        <label for="right-label" class="right inline">
                            <span style="color:red">*</span>
                            cluster_name
                        </label>
                    </div>
                    <div class="small-8 columns">
                        {!! Form::text('cluster_name', $cluster->cluster_name, array('readonly') ) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="small-12 columns">
                <div class="row">
                    <div class="small-4 columns">
                        <label for="right-label" class="right inline">
                            <span style="color:red">*</span>
                            alias
                        </label>
                    </div>
                    <div class="small-8 columns">
                        {!! Form::text('alias', $cluster->alias, array('readonly') ) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="small-12 columns">
                <div class="row">
                    <div class="small-4 columns">
                        <label for="right-label" class="right inline">
                            <span style="color:red">*</span>
                            devices
                        </label>
                    </div>
                    <div class="small-8 columns">
                        {!! Form::text('devices', $cluster->devices, array('readonly') ) !!}
                    </div>
                </div>
            </div>
        </div>

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
                @foreach($hostGlusterfsCollection as $hostGlusterfs)
                    @if(isset($cluster) == null || (isset($cluster) && $cluster->getKey() != $hostGlusterfs->getKey()) )
                    <tr>
                        <?php
                            $check = false;
                            $uses = [];

                            if (isset($cluster)) {
                                $members = $cluster->members;

                                if (isset($members)) {
                                    $uses = explode(',', $members);

                                    foreach ($uses as $use) {
                                        if ($hostGlusterfs->host_name == $use) {
                                            $check = true;
                                        }
                                    }
                                }
                            }
                        ?>
                        <td>{!! Form::checkbox('cluster_members[]', $hostGlusterfs->host_name, $check, array('disabled' => true) ) !!}</td>
                        <td>
                            {{$hostGlusterfs->host_name}}
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

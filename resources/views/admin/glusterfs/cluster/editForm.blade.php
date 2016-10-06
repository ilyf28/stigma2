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
                        <th width="70">Quorum</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($hostGlusterfsCollection as $hostGlusterfs)
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
                        <td style="text-align: center;">
                            {!! Form::checkbox('cluster_members[]', $hostGlusterfs->host_name, $check, array('disabled' => true) ) !!}
                            @if ($check)
                            {!! Form::hidden('cluster_members[]', $hostGlusterfs->host_name ) !!}
                            @endif
                        </td>
                        <td>
                            {{$hostGlusterfs->host_name}}
                        </td>
                        <td style="text-align: center;">
                            @if ($cluster->quorum == $hostGlusterfs->host_name)
                            {!! Form::radio('quorum', $hostGlusterfs->host_name, true, array('disabled' => true)) !!}
                            @else
                            {!! Form::radio('quorum', $hostGlusterfs->host_name, false, array('disabled' => true)) !!}
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="small-7 columns">
        <div class="row">
            <div class="small-12 columns">
                <hr>
                <h4>Volume Management</h4>
            </div>
        </div>
        <div class="row">
            <div class="small-12 columns">
                <div class="row">
                    <div class="small-4 columns">
                        <label for="right-label" class="right inline">
                            <span style="color:red">*</span>
                            volume_name
                        </label>
                    </div>
                    <div class="small-8 columns">
                        @if(isset($volumes) && count($volumes) > 0)
                            {!! Form::text('volume_name', $volumes[0]->volume_name, array('readonly') ) !!}
                        @else
                            {!! Form::text('volume_name', '' ) !!}
                        @endif
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
                            type
                        </label>
                    </div>
                    <div class="small-8 columns">
                        @if(isset($volumes) && count($volumes) > 0)
                            {!! Form::select('type', array('Distribute' => 'Distribute', 'Replicate' =>'Replicate', 'Distributed Replicate' =>'Distributed Replicate'), $volumes[0]->type, array('disabled' => true))  !!}
                            {!! Form::hidden('type', $volumes[0]->type)  !!}
                        @else
                            {!! Form::select('type', array('Distribute' => 'Distribute', 'Replicate' =>'Replicate', 'Distributed Replicate' =>'Distributed Replicate'))  !!}
                        @endif 
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
                            bricks
                        </label>
                    </div>
                    <div class="small-8 columns">
                        <table class="table">
                            <tbody>
                            @foreach($brickAllCollection as $brick)
                                <tr>
                                    <?php
                                        $check = false;
                                        $options = array();
                                        $uses = [];

                                        if (isset($volumes) && count($volumes) > 0) {
                                            $bricks = $volumes[0]->bricks;

                                            if (isset($bricks) && !empty($bricks)) {
                                                $uses = explode(',', $bricks);
                                                $options = array('disabled' => true);

                                                foreach ($uses as $use) {
                                                    if ($brick == $use) {
                                                        $check = true;
                                                    }
                                                }
                                            }
                                        }
                                    ?>
                                    <td style="text-align: center;" width="50">
                                        {!! Form::checkbox('volume_bricks[]', $brick, $check, $options ) !!}
                                        @if ($check)
                                        {!! Form::hidden('volume_bricks[]', $brick ) !!}
                                        @endif
                                    </td>
                                    <td>
                                        {{$brick}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if(isset($volumes[0]))
        <div class="row">
            <div class="small-12 columns">
                <a class="button alert tiny right volume-delete-btn" data-reveal-id="volume-delete-modal" data-volume-id="{{$volumes[0]->getKey()}}">Delete Volume</a>
            </div>
        </div>
        @endif
    </div>
</div>
<a class="button alert cluster-delete-btn" data-reveal-id="cluster-delete-modal" data-cluster-id="{{$cluster->getKey()}}">Delete Cluster</a>
@if(!isset($volumes[0]))
{!! Form::submit('SAVE', array('class'=>'right button')) !!}
@endif

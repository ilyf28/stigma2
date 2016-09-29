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
                        @if(isset($cluster))
                            {!! Form::text('cluster_name', $cluster->cluster_name ) !!}
                        @else
                            {!! Form::text('cluster_name', '' ) !!}
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
                            alias
                        </label>
                    </div>
                    <div class="small-8 columns">
                        @if(isset($cluster))
                            {!! Form::text('alias', $cluster->alias ) !!}
                        @else
                            {!! Form::text('alias', '' ) !!}
                        @endif
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
                                $member = $cluster->member;

                                if (isset($member)) {
                                    $uses = explode(',', $member);

                                    foreach ($uses as $use) {
                                        if ($hostGlusterfs->cluster_name == $use) {
                                            $check = true;
                                        }
                                    }
                                }
                            }
                        ?>
                        <td>{!! Form::checkbox('cluster_member[]', $hostGlusterfs->cluster_name, $check) !!}</td>
                        <td>
                            {{$hostGlusterfs->cluster_name}}
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

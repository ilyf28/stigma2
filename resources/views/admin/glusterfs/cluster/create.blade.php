@extends('layouts.admin')

@section('contents')
<ul class="breadcrumbs">
  <li><a href="#">Admin</a></li>
  <li><a href="#">GlusterFS Cluster Manager</a></li>
  <li class="current"><a href="#">Create</a></li>
</ul>
{!! Form::open(array('route'=> 'admin.glusterfs.clusters.store','method' =>'post','class'=>'form-v1 clearfix')) !!}
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
                        {!! Form::text('cluster_name', '' ) !!}
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
                        {!! Form::text('alias', '' ) !!}
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
                        {!! Form::text('devices', '' ) !!}
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
                        <td style="text-align: center;">{!! Form::checkbox('cluster_members[]', $hostGlusterfs->host_name, false, array('onclick' => 'actionCheck(this)')) !!}</td>
                        <td>
                            {{$hostGlusterfs->host_name}}
                        </td>
                        <td style="text-align: center;">{!! Form::radio('quorum', $hostGlusterfs->host_name, false, array('disabled' => 'disabled')) !!}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{!! Form::submit('SAVE', array('class'=>'right button')) !!}

{!! Form::close() !!}
@stop

@section('scripts')
<script> 
function actionCheck(check) {
    jQuery(function($) {
        if (check.checked) {
            var unusableQuorum = $("input:radio[name='quorum'][value='" + check.value + "']").first().prop("disabled", false);
        } else {
            var unusableQuorum = $("input:radio[name='quorum'][value='" + check.value + "']").first().prop("checked", false).prop("disabled", true);
        }
    });
};
</script>
@stop

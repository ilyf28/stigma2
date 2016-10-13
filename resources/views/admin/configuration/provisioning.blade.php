@extends('layouts.admin')

@section('contents')
<ul class="breadcrumbs">
  <li><a href="#">Admin</a></li>
  <li><a href="#">Configuration</a></li>
  <li class="current"><a href="#">Provisioning</a></li>
</ul>


{!! Form::open(array('route'=> array('admin.configuration.provisioning.update'),'method' =>'put','class'=>'form-v1 clearfix')) !!}

<div class="row">
    <div class="small-8 columns">
        <h6>Provisioning Configuration</h6>
    </div>
    <div class="small-4 columns">
        <button  type ="submit" class="button small right" >Save</button>
    </div>
</div>

<div class="row"> 
    <div class="small-8 columns"> 
        <div class="row">
            <div class="small-4 columns">
                <label>API KEY</label>
            </div>
            <div class="small-8 columns"> 
                {!! Form::text('apikey' ,$config['apikey']) !!}
            </div>
        </div>
        <div class="row">
            <div class="small-4 columns">
                <label>SECRET KEY</label>
            </div>
            <div class="small-8 columns"> 
                {!! Form::text('secret'  ,$config['secret']) !!}
            </div>
        </div>

    </div>
</div>
{!! Form::close() !!}



{!! Form::open(array('route'=> array('admin.configuration.provisioning.update'),'method' =>'put','class'=>'form-v1 clearfix')) !!}

<div class="row">
    <div class="small-8 columns">
        <h6>Provisioned Server List</h6>
    </div>
    <div class="small-4 columns">
        <a  class="button small right" data-reveal-id="provisioning-modal" >Create Server</a>
    </div>
</div>

<div class="row"> 
    <div class="small-12 columns"> 
        <table class="table">
            <thead>
            <tr>
                <th width="50">ID</th>
                <th>Public DNS</th>
                <th>Security Group</th>
            </tr>
            </thead>
            <tbody>
            @foreach($serverList as $server)
            <tr>
                <td>{{$server->getKey()}}</td>
                <td>http://{{$server->public_dns}}</td>
                <td>{{$server->security_group}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
{!! Form::close() !!}



<div id="provisioning-modal" class="reveal-modal small modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
    <div class="modal-header">
        <h5 class="title">Provisioning Server</h5>
        <a class="close-reveal-modal" aria-label="Close">&#215;</a>
    </div>
    <div class="modal-body"> 
        <div data-alert class="alert-box radius notification-box" > 
        </div> 
    </div> 
    <div class="modal-footer"> 
        <a class="button right small alert provisioning-btn">Start Provisioning</a> 
    </div>
</div>



@stop

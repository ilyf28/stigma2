@extends('layouts.admin')

@section('contents')
<ul class="breadcrumbs">
  <li><a href="#">Admin</a></li>
  <li><a href="#">System</a></li>
  <li class="current"><a href="#">Configuration</a></li>
</ul>


{!! Form::open(array('route'=> array('admin.system.configuration.nagios.update'),'method' =>'put','class'=>'form-v1 clearfix')) !!}

<div class="row">
    <div class="small-8 columns">
        <h6>Nagios Configuration</h6>
    </div>
    <div class="small-4 columns">
        <button  type ="submit" class="button small right" >Save</button>
    </div>
</div>

<div class="row"> 
    <div class="small-8 columns"> 
        <div class="row">
            <div class="small-4 columns">
                <label>Host or IP</label>
            </div>
            <div class="small-8 columns"> 
                {!! Form::text('host', $nagios['host'] ) !!}
            </div>
        </div>
        <div class="row">
            <div class="small-4 columns">
                <label>Port</label>
            </div>
            <div class="small-8 columns"> 
                {!! Form::text('port', $nagios['port'] ) !!}
            </div>
        </div>
        <div class="row">
            <div class="small-4 columns">
                <label>API Port</label>
            </div>
            <div class="small-8 columns"> 
                {!! Form::text('apiport', $nagios['apiport'] ) !!}
            </div>
        </div>
        <div class="row">
            <div class="small-4 columns">
                <label>Account</label>
            </div>
            <div class="small-8 columns"> 
                {!! Form::text('username', $nagios['username'] ) !!}
            </div>
        </div>
        <div class="row">
            <div class="small-4 columns">
                <label>Password</label>
            </div>
            <div class="small-8 columns"> 
                {!! Form::text('password', $nagios['password'] ) !!}
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}

{!! Form::open(array('route'=> array('admin.system.configuration.influxdb.update'),'method' =>'put','class'=>'form-v1 clearfix')) !!}

<div class="row">
    <div class="small-8 columns">
        <h6>Influxdb Configuration</h6>
    </div>
    <div class="small-4 columns">
        <button  type ="submit" class="button small right" >Save</button>
    </div>
</div>

<div class="row"> 
    <div class="small-8 columns"> 
        <div class="row">
            <div class="small-4 columns">
                <label>Host or IP</label>
            </div>
            <div class="small-8 columns"> 
                {!! Form::text('host', $influxdb['host'] ) !!}
            </div>
        </div>
        <div class="row">
            <div class="small-4 columns">
                <label>Port</label>
            </div>
            <div class="small-8 columns"> 
                {!! Form::text('port', $influxdb['port'] ) !!}
            </div>
        </div>
        <div class="row">
            <div class="small-4 columns">
                <label>Database</label>
            </div>
            <div class="small-8 columns"> 
                {!! Form::text('database', $influxdb['database']) !!}
            </div>
        </div>

        <div class="row">
            <div class="small-4 columns">
                <label>Account</label>
            </div>
            <div class="small-8 columns"> 
                {!! Form::text('username', $influxdb['username']) !!}
            </div>
        </div>
        <div class="row">
            <div class="small-4 columns">
                <label>Password</label>
            </div>
            <div class="small-8 columns"> 
                {!! Form::text('password', $influxdb['password'] ) !!}
            </div>
        </div>

    </div>
</div>
{!! Form::close() !!}



{!! Form::open(array('route'=> array('admin.system.configuration.grafana.update'),'method' =>'put','class'=>'form-v1 clearfix')) !!}

<div class="row">
    <div class="small-8 columns">
        <h6>Grafana Configuration</h6>
    </div>
    <div class="small-4 columns">
        <button  type ="submit" class="button small right" >Save</button>
    </div>
</div>

<div class="row"> 
    <div class="small-8 columns"> 
        <div class="row">
            <div class="small-4 columns">
                <label>Host or IP</label>
            </div>
            <div class="small-8 columns"> 
                {!! Form::text('host', $grafana['host'] ) !!}
            </div>
        </div>
        <div class="row">
            <div class="small-4 columns">
                <label>Port</label>
            </div>
            <div class="small-8 columns"> 
                {!! Form::text('port', $grafana['port'] ) !!}
            </div>
        </div>
        <div class="row">
            <div class="small-4 columns">
                <label>Account</label>
            </div>
            <div class="small-8 columns"> 
                {!! Form::text('username', $grafana['username'] ) !!}
            </div>
        </div>
        <div class="row">
            <div class="small-4 columns">
                <label>Password</label>
            </div>
            <div class="small-8 columns"> 
                {!! Form::text('password' , $grafana['password']) !!}
            </div>
        </div>

    </div>
</div>
{!! Form::close() !!}

{!! Form::open(array('route'=> array('admin.system.configuration.database.update'),'method' =>'put','class'=>'form-v1 clearfix')) !!}

<div class="row">
    <div class="small-8 columns">
        <h6>Mysql Configuration</h6>
    </div>
    <div class="small-4 columns">
        <button  type ="submit" class="button small right" >Save</button>
    </div>
</div>

<div class="row"> 
    <div class="small-8 columns"> 
        <div class="row">
            <div class="small-4 columns">
                <label>Host or IP</label>
            </div>
            <div class="small-8 columns"> 
                {!! Form::text('host', $mysql['host'] ) !!}
            </div>
        </div>
        <div class="row">
            <div class="small-4 columns">
                <label>Database</label>
            </div>
            <div class="small-8 columns"> 
                {!! Form::text('database', $mysql['database']) !!}
            </div>
        </div>

        <div class="row">
            <div class="small-4 columns">
                <label>Account</label>
            </div>
            <div class="small-8 columns"> 
                {!! Form::text('dbuser', $mysql['username']) !!}
            </div>
        </div>
        <div class="row">
            <div class="small-4 columns">
                <label>Password</label>
            </div>
            <div class="small-8 columns"> 
                {!! Form::text('password', $mysql['password'] ) !!}
            </div>
        </div>

    </div>
</div>
{!! Form::close() !!}


@stop

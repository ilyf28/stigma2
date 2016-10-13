@extends('layouts.installation')

@section('contents') 
<div class="mini-paper">
<h1>Install Database</h1>
{!!Form::open(array('route' => 'installation::database.install' ,'method' => 'post')) !!} 
    <div class="form-group">
        <label>Host</label>
        {!!Form::text('host')!!}
    </div>

    <div class="form-group">
        <label>Database</label>
        {!!Form::text('database')!!}
    </div>

    <div class="form-group">
        <label>User</label>
        {!!Form::text('dbuser')!!}
    </div>

    <div class="form-group">
        <label>Password</label>
        {!!Form::text('password')!!}
    </div>
    {!!Form::submit('SAVE', array('class' =>'button', 'id' => 'next-btn' ))!!}
{!!Form::close() !!}
</div>
@stop

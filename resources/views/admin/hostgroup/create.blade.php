@extends('layouts.admin')

@section('contents')
<ul class="breadcrumbs">
  <li><a href="#">Admin</a></li>
  <li><a href="#">Hostgroup Manager</a></li>
  <li class="current"><a href="#">Create</a></li>
</ul>
{!! Form::open(array('route'=> 'admin.hostgroups.store','method' =>'post','class'=>'form-v1 clearfix')) !!}
@include('admin.hostgroup.editForm') 
{!! Form::close() !!}
@stop

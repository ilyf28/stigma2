@extends('layouts.admin')

@section('contents')
<ul class="breadcrumbs">
  <li><a href="#">Admin</a></li>
  <li><a href="#">Hostgroup Manager</a></li>
  <li class="current"><a href="#">Edit</a></li>
</ul>
{!! Form::open(array('route'=> array('admin.hostgroups.update',$hostgroup->getKey()),'method' =>'put','class'=>'form-v1 clearfix')) !!}
@include('admin.hostgroup.editForm') 
{!! Form::close() !!}
@stop

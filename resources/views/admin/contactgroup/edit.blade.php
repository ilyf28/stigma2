@extends('layouts.admin')

@section('contents')
<ul class="breadcrumbs">
  <li><a href="#">Admin</a></li>
  <li><a href="#">Contactgroup Manager</a></li>
  <li class="current"><a href="#">Edit</a></li>
</ul>
{!! Form::open(array('route'=> array('admin.contactgroups.update',$contactgroup->getKey()),'method' =>'put','class'=>'form-v1 clearfix')) !!}
@include('admin.contactgroup.editForm') 
{!! Form::close() !!}
@stop

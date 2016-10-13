@extends('layouts.admin')

@section('contents')
<ul class="breadcrumbs">
  <li><a href="#">Admin</a></li>
  <li><a href="#">Contactgroup Manager</a></li>
  <li class="current"><a href="#">Create</a></li>
</ul>
{!! Form::open(array('route'=> 'admin.contactgroups.store','method' =>'post','class'=>'form-v1 clearfix')) !!}
@include('admin.contactgroup.editForm') 
{!! Form::close() !!}
@stop

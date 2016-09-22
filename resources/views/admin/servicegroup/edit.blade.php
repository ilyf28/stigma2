@extends('layouts.admin')

@section('contents')
<ul class="breadcrumbs">
  <li><a href="#">Admin</a></li>
  <li><a href="#">Servicegroup Manager</a></li>
  <li class="current"><a href="#">Edit</a></li>
</ul>
{!! Form::open(array('route'=> array('admin.servicegroups.update',$servicegroup->getKey()),'method' =>'put','class'=>'form-v1 clearfix')) !!}
@include('admin.servicegroup.editForm') 
{!! Form::close() !!}
@stop

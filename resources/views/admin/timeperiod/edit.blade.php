@extends('layouts.admin')

@section('contents')
<ul class="breadcrumbs">
  <li><a href="#">Admin</a></li>
  <li><a href="#">Time Period Manager</a></li>
  <li class="current"><a href="#">Edit</a></li>
</ul>
{!! Form::open(array('route'=> array('admin.timeperiods.update',$timeperiod->getKey()),'method' =>'put','class'=>'form-v1 clearfix')) !!}
@include('admin.timeperiod.editForm')

{!! Form::close() !!}
@stop

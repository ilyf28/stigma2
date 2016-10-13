@extends('layouts.admin')

@section('contents')
<ul class="breadcrumbs">
  <li><a href="#">Admin</a></li>
  <li><a href="#">Time Period Manager</a></li>
  <li class="current"><a href="#">Create</a></li>
</ul>
{!! Form::open(array('route'=> 'admin.timeperiods.store','method' =>'post','class'=>'form-v1 clearfix')) !!}
@include('admin.timeperiod.editForm') 
{!! Form::close() !!}
@stop

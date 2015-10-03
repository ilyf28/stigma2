@extends('layouts.admin')

@section('contents')
<ul class="breadcrumbs">
  <li><a href="#">Admin</a></li>
  <li><a href="#">SERVICE Manager</a></li>
  <li class="current"><a href="#">Edit</a></li>
</ul>
{!! Form::open(array('route'=> 'admin.hosts.update','method' =>'post','class'=>'form-v1 clearfix')) !!}
@include('admin.service.editForm')

{!! Form::close() !!}
@stop

@extends('layouts.admin')

@section('contents')
<ul class="breadcrumbs">
  <li><a href="#">Admin</a></li>
  <li><a href="#">Host Manager</a></li>
  <li class="current"><a href="#">Edit</a></li>
</ul>
{!! Form::open(array('route'=> array('admin.hosts.update',$host->getKey()),'method' =>'put','class'=>'form-v1 clearfix')) !!}
@include('admin.host.editForm') 
{!! Form::close() !!}
@stop

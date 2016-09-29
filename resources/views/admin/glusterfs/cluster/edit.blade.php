@extends('layouts.admin')

@section('contents')
<ul class="breadcrumbs">
  <li><a href="#">Admin</a></li>
  <li><a href="#">GlusterFS Cluster Manager</a></li>
  <li class="current"><a href="#">Edit</a></li>
</ul>
{!! Form::open(array('route'=> array('admin.glusterfs.clusters.update',$cluster->getKey()),'method' =>'put','class'=>'form-v1 clearfix')) !!}
@include('admin.glusterfs.cluster.editForm') 
{!! Form::close() !!}
@stop

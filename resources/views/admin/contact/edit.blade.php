@extends('layouts.admin')

@section('contents')
<ul class="breadcrumbs">
  <li><a href="#">Admin</a></li>
  <li><a href="#">Contact Manager</a></li>
  <li class="current"><a href="#">Edit</a></li>
</ul>
{!! Form::open(array('route'=> array('admin.contacts.update',$contact->getKey()),'method' =>'put','class'=>'form-v1 clearfix')) !!}
@include('admin.contact.editForm') 
{!! Form::close() !!}
@stop

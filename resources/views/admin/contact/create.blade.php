@extends('layouts.admin')

@section('contents')
<ul class="breadcrumbs">
  <li><a href="#">Admin</a></li>
  <li><a href="#">Contact Manager</a></li>
  <li class="current"><a href="#">Create</a></li>
</ul>
{!! Form::open(array('route'=> 'admin.contacts.store','method' =>'post','class'=>'form-v1 clearfix')) !!}
@include('admin.contact.editForm') 
{!! Form::close() !!}
@stop

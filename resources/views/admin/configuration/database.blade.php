@extends('layouts.admin')

@section('contents')
<ul class="breadcrumbs">
  <li><a href="#">Admin</a></li>
  <li><a href="#">Configuration</a></li>
  <li class="current"><a href="#">Database</a></li>
</ul>
{!! Form::open(array('route'=> 'admin.hosts.store','method' =>'post','class'=>'form-v1')) !!}
<div class="row">
    <div class="small-7 columns">
        <div class="row">
            <div class="small-4 columns">
                <label for="right-label" class="right inline">
                @if($formGroup['required'])<span>*</span>@endif
                {{$formGroup['display_name']}}
                </label>
            </div>
            <div class="small-8 columns">
                @if($formGroup['data_type'] == 'enum')
                {!! Form::select($key,array_flip($formGroup['values'])) !!}
                @else
                {!! Form::text($key) !!}
                @endif

            </div>
        </div>
    </div>
</div>
{!! Form::submit('Click Me!') !!}
{!! Form::close() !!}
@stop

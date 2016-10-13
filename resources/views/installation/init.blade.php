@extends('layouts.installation')

@section('contents') 
{!!Form::open(array('route' => 'installation::database.view' ,'method'=>'get')) !!} 
    <h1>installation</h1>
    {!!Form::submit('NEXT', array('class' =>'button', 'id' => 'next-btn' ))!!}
{!!Form::close() !!}
@stop

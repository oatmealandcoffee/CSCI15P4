@extends('_master')

@section('title')
	Login
@stop

@section('body')

<h1>Login</h1>

{{ Form::open(array('url' => '/login')) }}

    {{ Form::label('email') }}
    {{ Form::text('email') }}

    {{ Form::label('password') }}
    {{ Form::password('password') }}

    {{ Form::submit('Submit', array('class' => 'btn btn-default')) }}

{{ Form::close() }}

@stop
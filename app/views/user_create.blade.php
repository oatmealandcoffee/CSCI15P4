@extends('_master')

@section('title')
Create User
@stop

@section('head')

@stop

@section('body')

	<p>DEPRECATED</p>

{{ Form::open(array('url'=>'/user', 'method'=>'POST')) }}

{{ Form::label('username', 'Username') }}
{{ Form::text('username', array('class' => 'form-control')) }}

{{ Form::label('email', 'Email') }}
{{ Form::text('email', array('class' => 'form-control')) }}

{{ Form::label('password', 'Password') }}
{{ Form::password('password', array('class' => 'form-control')) }}

{{ Form::submit('Create', array('class' => 'btn btn-default')) }}

{{ Form::close() }}

@stop
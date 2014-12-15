@extends('_master')

@section('title')
Sign Up
@stop

@section('head')
<base href="http://localhost/" />
@stop

@section('body')
<h2>Sign up</h2>

@foreach($errors->all() as $message)
<div class='error'>{{ $message }}</div>
@endforeach

{{ Form::open(array('url' => '/signup')) }}

{{ Form::label('username') }}
{{ Form::text('username', '', array('class' => 'form-control')) }}

{{ Form::label('email') }}
{{ Form::text('email', '', array('class' => 'form-control')) }}

{{ Form::label('password') }}
<small>Min 6 characters</small>
{{ Form::password('password', array('class' => 'form-control')) }}

{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}

@stop
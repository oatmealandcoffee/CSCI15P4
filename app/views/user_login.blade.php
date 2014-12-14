@extends('_master')

@section('title')
	Login
@stop

@section('body')

<h1>Login</h1>

@foreach($errors->all() as $message)
    <div class='error'>{{ $message }}</div>
@endforeach

{{ Form::open(array('url' => '/login')) }}

{{ Form::label('email') }}
{{ Form::text('email', '', array('class' => 'form-control')) }}

{{ Form::label('password') }}
{{ Form::password('password', array('class' => 'form-control')) }}

{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop
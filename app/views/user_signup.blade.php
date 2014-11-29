@extends('_master')

@section('title')
Sign Up
@stop

@section('head')
<base href="http://localhost/" />
@stop

@section('body')
<h1>Sign up</h1>

@foreach($errors->all() as $message)
<div class='error'>{{ $message }}</div>
@endforeach

<p>
{{ Form::open(array('url' => '/signup')) }}

{{ Form::label('email') }}
{{ Form::text('email') }}

{{ Form::label('password') }}
{{ Form::password('password') }}
<small>Min 6 characters</small>

{{ Form::submit('Submit') }}

{{ Form::close() }}
</p>


@stop
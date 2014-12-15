@extends('_master')

@section('title')
	Login
@stop

@section('body')

<h1>Login</h1>

@foreach($errors->all() as $message)
    <div class='error'>{{ $message }}</div>
@endforeach

@if ( Session::has('flash_message') )
    <div class="alert {{ Session::get('flash_type') }}">
        {{ Session::get('flash_message') }}
    </div>
@endif

{{ Form::open(array('url' => '/login')) }}

{{ Form::label('email') }}
{{ Form::text('email', '', array('class' => 'form-control')) }}

{{ Form::label('password') }}
{{ Form::password('password', array('class' => 'form-control')) }}

{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop
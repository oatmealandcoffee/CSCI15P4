@extends('_master')

@section('title')
Update Account
@stop

@section('head')

@stop

@section('body')
<h2>Update Account</h2>
{{ Form::open(array('url'=>'/user/'.$user->id, 'method'=>'PUT')) }}
@if ( Session::has('flash_message') )
	<div class='error'>{{ Session::get('flash_message') }}</div>
@endif

{{ Form::label('username', 'Username') }}
{{ Form::text('username', $user->username, array('class' => 'form-control')) }}

{{ Form::label('email', 'Email') }}
{{ Form::text('email', $user->email, array('class' => 'form-control')) }}

{{ Form::label('password', 'Password') }}
{{ Form::password('password', array('class' => 'form-control')) }}

{{ Form::submit('Update', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop
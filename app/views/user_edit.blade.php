@extends('_master')

@section('title')
Update User
@stop

@section('head')

@stop

@section('body')

{{ Form::open(array('url'=>'/user/'.$user->id, 'method'=>'PUT')) }}
@if ( Session::has('flash_message') )

	<div class="alert {{ Session::get('flash_type') }}">
		<h3>{{ Session::get('flash_message') }}</h3>
	</div>

@endif

{{ Form::label('username', 'Username') }}
{{ Form::text('username', $user->username, array('class' => 'form-control')) }}

{{ Form::label('email', 'Email') }}
{{ Form::text('email', $user->email, array('class' => 'form-control')) }}

{{ Form::label('password', 'Password') }}
{{ Form::password('password', array('class' => 'form-control')) }}

{{ Form::submit('Update', array('class' => 'btn btn-default')) }}

{{ Form::close() }}

@stop
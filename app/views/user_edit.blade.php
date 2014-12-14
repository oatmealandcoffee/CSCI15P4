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
<table class="table">
	<tr>
		<td>
			{{ Form::label('username', 'Username') }}
		</td>
		<td>
			{{ Form::text('username', $user->username, array('class' => 'form-control')) }}
		</td>
	</tr>
	<tr>
         <td>
         	{{ Form::label('email', 'Email') }}
		</td>
		<td>
         	{{ Form::text('email', $user->email, array('class' => 'form-control')) }}
         </td>
	</tr>
	<tr>
		<td>
			{{ Form::label('password', 'Password') }}
		</td>
		<td>
			{{ Form::password('password', array('class' => 'form-control')) }}
		</td>
	</tr>
	<tr>
		<td>
		</td>
         <td>
			{{ Form::submit('Update', array('class' => 'btn btn-default')) }}
         </td>
	</tr>
</table>
{{ Form::close() }}

@stop
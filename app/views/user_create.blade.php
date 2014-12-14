@extends('_master')

@section('title')
Create User
@stop

@section('head')

@stop

@section('body')

{{ Form::open(array('url'=>'/user', 'method'=>'POST')) }}
<table class="table">
	<tr>
		<td>
			{{ Form::label('username', 'Username') }}
		</td>
		<td>
			{{ Form::text('username', array('class' => 'form-control')) }}
		</td>
	</tr>
	<tr>
         <td>
         	{{ Form::label('email', 'Email') }}
		</td>
		<td>
         	{{ Form::text('email', array('class' => 'form-control')) }}
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
			{{ Form::submit('Create', array('class' => 'btn btn-default')) }}
         </td>
	</tr>
</table>
{{ Form::close() }}

@stop
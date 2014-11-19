@extends('_master')

@section('title')
Create User
@stop

@section('head')
<base href="http://localhost/" />

@stop

@section('body')

{{ Form::open(array('url'=>'/user', 'method'=>'POST')) }}
<table class="table">
	<tr>
		<td>
			{{ Form::label('username', 'Username') }}
		</td>
		<td>
			{{ Form::text('username') }}
		</td>
	</tr>
	<tr>
         <td>
         	{{ Form::label('', 'Email') }}
		</td>
		<td>
         	{{ Form::text('email') }}
         </td>
	</tr>
	<tr>
         <td>
         	{{ Form::label('password', 'Password') }}
		</td>
		<td>
         	{{ Form::password('password') }}
         </td>
	</tr>
	<tr>
		<td>
		</td>
         <td>
			{{ Form::submit('Create') }}
         </td>
	</tr>
</table>
{{ Form::close() }}

@stop
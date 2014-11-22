@extends('_master')

@section('title')
Update User
@stop

@section('head')
<base href="http://localhost/" />

@stop

@section('body')

{{ Form::open(array('url'=>'/user'.$user->id, 'method'=>'PUT')) }}
<table class="table">
	<tr>
		<td>
			{{ Form::label('username', 'Username') }}
		</td>
		<td>
			{{ Form::text('username', $user->username) }}
		</td>
	</tr>
	<tr>
         <td>
         	{{ Form::label('', 'Email') }}
		</td>
		<td>
         	{{ Form::text('email', $user->email) }}
         </td>
	</tr>
	<tr>
		<td>
		</td>
         <td>
			{{ Form::submit('Update') }}
         </td>
	</tr>
</table>
{{ Form::close() }}

@stop
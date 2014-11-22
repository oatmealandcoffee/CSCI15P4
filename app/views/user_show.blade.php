@extends('_master')

@section('title')
Create User
@stop

@section('head')
<base href="http://localhost/" />

@stop

@section('body')

<table class="table">
	<tr>
		<td>
			Username
		</td>
		<td>
			{{ $user->username; }}
		</td>
	</tr>
	<tr>
         <td>
         	Email
		</td>
		<td>
         	{{ $user->email; }}
         </td>
	</tr>
	<tr>
		<td></td>
		<td>
			<p>
			{{ Form::open(array('url'=>'/user/'.$user->id.'/edit/', 'method'=>'GET')) }}
			{{ Form::submit('Edit') }}
			{{ Form::close() }}
			{{ Form::open(array('url'=>'/user/'.$user->id, 'method'=>'DELETE')) }}
            {{ Form::submit('Delete') }}
            {{ Form::close() }}
            </p>
		</td>
	</tr>
</table>

@stop
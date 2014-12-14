@extends('_master')

@section('title')
Show User
@stop

@section('head')


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
		<td>

		</td>
	</tr>
	<tr>
         <td>
         	Email
		</td>
		<td>
         	{{ $user->email; }}
         </td>
		<td>

		</td>
	</tr>
	<tr>
		<td>
			{{ Form::open(array('url'=>'/user/'.$user->id.'/edit/', 'method'=>'GET')) }}
			{{ Form::submit('Edit', array('class' => 'btn btn-default')) }}
			{{ Form::close() }}
		</td>
		<td>
			{{ Form::open(array('url'=>'/game', 'method'=>'GET')) }}
			{{ Form::submit('View Games', array('class' => 'btn btn-primary')) }}
			{{ Form::close() }}
		</td>
		<td>
			{{ Form::open(array('url'=>'/user/'.$user->id, 'method'=>'DELETE')) }}
            {{ Form::submit('Delete', array('class' => 'btn btn-default')) }}
            {{ Form::close() }}
		</td>
	</tr>
</table>

@stop
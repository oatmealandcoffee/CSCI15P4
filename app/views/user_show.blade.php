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
			{{ Form::submit('Edit', array('class' => 'btn btn-default')) }}
			{{ Form::close() }}
			{{ Form::open(array('url'=>'/user/'.$user->id, 'method'=>'DELETE')) }}
            {{ Form::submit('Delete', array('class' => 'btn btn-default')) }}
            {{ Form::close() }}
            </p>
		</td>
	</tr>
</table>

@stop
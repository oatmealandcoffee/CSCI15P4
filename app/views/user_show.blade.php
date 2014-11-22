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
</table>

@stop
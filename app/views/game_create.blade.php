@extends('_master')

@section('require')

@stop

@section('title')
Create Game
@stop

@section('body')

<h2>Create Game</h2>

<table class="table">
	<tr>
		<td><b>White</b></td>
		<td>
			<select>
				@foreach( $users as $user )
				<option value="{{$user->username}}">{{$user->username}}</option>
				@endforeach
			</select>
		</td>
	</tr>
	<tr>
		<td><b>Black</b></td>
		<td>
        	<select>
        		@foreach( $users as $user )
        		<option value="{{$user->username}}">{{$user->username}}</option>
        		@endforeach
        	</select>
        </td>
	</tr>
	<tr>
		<td><b>Opening Position</b></td>
		<td>
			<select>
                @foreach( $positions as $position )
                <option value="{{$position->name}}">{{$position->name}}</option>
               	@endforeach
            </select>
		</td>
	</tr>
	<tr>
		<td>Insert reset button</td>
		<td>Insert create button</td>
	</tr>
</table>

@stop
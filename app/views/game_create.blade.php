@extends('_master')

@section('require')

@stop

@section('title')
Create Game
@stop

@section('body')

<script>
var reset = function() {
	document.getElementById('white_player').selectedIndex = 0;
	document.getElementById('black_player').selectedIndex = 0;
	document.getElementById('opening_position').selectedIndex = 0;
};

$('#resetSettingsButton').on('click', reset);
</script>

<h2>Create Game</h2>

{{ Form::open(array('url'=>'/game', 'method'=>'POST')) }}
<table class="table">
	<tr>
		<td><b>White</b></td>
		<td>
			<select name="white_player">
				@foreach( $users as $user )
				<option value="{{$user->username}}">{{$user->username}}</option>
				@endforeach
			</select>
		</td>
	</tr>
	<tr>
		<td><b>Black</b></td>
		<td>
        	<select name="black_player">
        		@foreach( $users as $user )
        		<option value="{{$user->username}}">{{$user->username}}</option>
        		@endforeach
        	</select>
        </td>
	</tr>
	<tr>
		<td><b>Opening Position</b></td>
		<td>
			<select name="opening_position">
                @foreach( $positions as $position )
                <option value="{{$position->name}}">{{$position->name}}</option>
               	@endforeach
            </select>
		</td>
	</tr>
	<tr>
		<td></td>
		<td>{{ Form::button('Reset', array('id'=>'resetSettingsButton', 'onClick' => '$(reset);')) }}   {{ Form::submit('Create') }}</td>
	</tr>
</table>
{{ Form::close() }}

@stop
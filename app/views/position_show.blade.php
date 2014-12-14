@extends('_master')

@section('title')
{{$position->name}}
@stop

@section('head')

@stop

@section('body')
<script>
var init = function() {

//--- start example JS ---

// establish a board
var board;
// establish an engine
var game = new Chess();

// instantiate the new board
board = new ChessBoard('board', '{{$position->fen}}');

}; // end init()
// kick off the game
$(document).ready(init);
</script>

<!-- container for the board; id is arbitrary -->

<h2>{{$position->name}}</h2>
<table class="table">

	<tr>
    	<td>
			<div id="board" style="width: 200px"></div>
    	</td>
    	<td></td>
    	<td></td>
    </tr>
    <tr>
		<td>
			{{ Form::open(array('url'=>'/position/'.$position->id.'/edit', 'method' => 'GET')) }}
			{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}
			{{ Form::close() }}
		</td>
		<td>
			{{ Form::open(array('url'=>'/position/'.$position->id, 'method' => 'DELETE')) }}
			{{ Form::submit('Delete', array('class' => 'btn btn-default')) }}
			{{ Form::close() }}
		</td>
		<td></td>
	</tr>
</table>

@stop
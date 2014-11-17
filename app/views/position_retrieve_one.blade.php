@extends('_master')

@section('title')
Laravel Chess Server::{{$position->name}}
@stop

@section('head')
<base href="http://localhost/" />
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
			FEN: {{$position->fen}}
		</td>
	</tr>
	<tr>
    	<td>
			<div id="board" style="width: 200px"></div>
    	</td>
    </tr>
</table>

@stop
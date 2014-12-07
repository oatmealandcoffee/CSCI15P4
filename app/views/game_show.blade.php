@extends('_master')

@section('title')
Game Show
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
board = new ChessBoard('board', '{{$game->fen}}');

}; // end init()
// kick off the game
$(document).ready(init);
</script>

<!-- container for the board; id is arbitrary -->

<h2>Game Show</h2>
<table class="table">
	<tr>
    	<td>
			<div id="board" style="width: 200px"></div>
    	</td>
    	<td>
        	Insert button for reset
        </td>
        <td>
            Insert button for submit
        </td>
    </tr>
</table>

@stop
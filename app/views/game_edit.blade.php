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

var cfg = {
  draggable: true,
  position: '{{$game->fen}}',
  onChange: onChange
};
var board = new ChessBoard('board', cfg);

}; // end init()

var onChange = function(oldPos, newPos) {
	// passed object needs to be converted to FEN by ChessBoard for capturing
	document.getElementById('fen').value = ChessBoard.objToFen(newPos);
};
// kick off the game
$(document).ready(init);
$('#startPositionBtn').on('click', init);
</script>

<!-- container for the board; id is arbitrary -->

<h2>Game Show</h2>
<table class="table">
	<tr>
		<td>White: {{ $white_player->username }}<br>Black: {{ $black_player->username }}</td>
		<td></td>
		<td></td>
	</tr>
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
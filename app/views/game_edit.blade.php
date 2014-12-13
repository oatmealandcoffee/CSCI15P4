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
	orientation: '{{ $orientation }}',
	onChange: onChange
};
var board = new ChessBoard('board', cfg);

}; // end init()

var onChange = function(oldPos, newPos) {
	// passed object needs to be converted to FEN by ChessBoard for capturing
	document.getElementById('fen').value = ChessBoard.objToFen(newPos);
};

var handleTurn = function() {
	if ( '{{ $submitter_id }}' === '{{ $game->turn_id }}' ) {

		document.getElementById("submitBtn").disabled = false;

	} else {

		document.getElementById("submitBtn").disabled = true;

	}
}

function buildStatelessFen ( aFen ) {

	/*
	In the LCS, FEN exists in two formats:
		* initial position only derived from the board
		* position + game state derived from the chess engine

	This appends a default game state for those positions that do not
	have one.
	*/

	// we need a value for the FEN else the engine will barf, so might as
	// well go with the standard opening position. The chances of this
	// happening are minimal and if happening is symptomatic of problems
	// elsewhere.
	if ( typeof aFen == 'undefined' || aFen == '' ) {
		return 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1';
	}

	// split the FEN
	var tokens = fen.split(/\s+/);
	// if the FEN is only the position, add the state
	if (tokens.length == 1) {
		return aFen + ' w KQkq - 0 1';
	}
	// fen has everything we need already
	return aFen;

}

// kick off the game
$(document).ready( function() {
	$(init);
	$(handleTurn);
});
$('#startPositionBtn').on('click', init);
</script>

<!-- container for the board; id is arbitrary -->

<h2>Game Show</h2>
{{ Form::open(array('url'=>'/game/'.$game->id, 'method'=>'PUT')) }}
{{ Form::hidden('fen', $game->fen, array('id' => 'fen')) }}
{{ Form::hidden('turn_id', $game->turn_id) }}
{{ Form::hidden('submitter_id', $submitter_id) }}
<table class="table">
	<tr>
		<td>{{ ( $game->turn_id == $game->white_id ? '*' : '' ) }}White: {{ $white_username }}<br>{{ ( $game->turn_id == $game->black_id ? '*' : '' ) }}Black: {{ $black_username }}</td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>
			<div id="board" style="width: 400px"></div>

		</td>
		<td></td>
		<td></td>
	</tr>
	<tr>
    	<td>
			{{ Form::button('Reset Position', array('id'=>'startPositionBtn', 'onClick' => '$(init);')) }}
		</td>
        <td>
			{{ Form::submit('Submit Move', array('id'=>'submitBtn')) }}
        </td>
		<td></td>
    </tr>
</table>
{{ Form::close() }}

@stop
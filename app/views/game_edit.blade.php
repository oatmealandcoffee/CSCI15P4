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

var handleTurn = function() {
	if ( '{{ $submitter_id }}' === '{{ $game->turn_id }}' ) {
		// this player's turn

		// enable the submit button
		document.getElementById("submitBtn").disabled = false;

		// turn off the pinging

	} else {
		// opponent's turn
		// disable the submit button
		document.getElementById("submitBtn").disabled = true;
		// turn on the pinging

	}
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
<table class="table">
	<tr>
		<td>White: {{ $white_username }}<br>Black: {{ $black_username }}</td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>
			<div id="board" style="width: 400px"></div>
			{{ Form::hidden('fen', $game->fen) }}
			{{ Form::hidden('turn_id', $game->turn_id) }}
			{{ Form::hidden('submitter_id', $submitter_id) }}
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
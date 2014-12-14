@extends('_master')

@section('title')
Edit Position
@stop

@section('head')

@stop

@section('body')

<script>
	var player_id = {{ Auth::id() }};
var init = function() {

//--- start example JS ---

var cfg = {
  draggable: true,
  dropOffBoard: 'trash',
  sparePieces: true,
  position: '{{$position->fen}}',
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

{{ Form::open(array('url'=>'/position/'.$position->id, 'method'=>'PUT')) }}
{{ Form::hidden('fen', $position->fen, array('id' => 'fen')) }}
<table class="table">
	<tr>
	<td>
		<b>Instructions</b>
	</td>
	<td>
    			<ul>
                	<li>Drag the pieces on the board to the desired position.</li>
                	<li>Moving any piece off the board deletes that piece from the position.</li>
                	<li>Pieces on the sides of the board are added when dragged onto the board.</li>
                </ul>

		@if ( Session::has('flash_message') )
			<div class="alert {{ Session::get('flash_type') }}">
				{{ Session::get('flash_message') }}
			</div>
		@endif

	</td>
	</tr>
	<tr>
		<td>
			<b>Name of Position</b>
		</td>
		<td>
			{{ Form::text('name', $position->name, array('class' => 'form-control')) }}
		</td>
	</tr>
	<tr>
         <td>

		</td>
		<td>

         	<div id="board" style="width: 400px"></div>
         </td>
	</tr>
	<tr>
		<td>

		</td>
         <td>
			 <p>{{ Form::submit('Update', array('class' => 'btn btn-primary')) }}</p>
			 <p>{{ Form::button('Reset', array('class' => 'btn btn-default', 'id'=>'startPositionBtn', 'onClick' => '$(init);')) }}<p></p>
         </td>
	</tr>
</table>
{{ Form::close() }}

@stop
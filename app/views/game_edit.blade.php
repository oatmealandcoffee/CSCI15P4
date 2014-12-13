@extends('_master')

@section('title')
	Game Show
@stop

@section('head')

@stop

@section('body')
	<script>

		engine = new Chess();

		var init = function() {

			// create the settings
			var cfg = {
				draggable: true,
				position: parseFen( '{{ $game->fen }}' ),
				orientation: '{{ $orientation }}',
				onChange: onChange,
				onDragStart: onDragStart,
				onDrop: onDrop,
				onSnapEnd: onSnapEnd
			};
			// init the board with the settings
			var board = new ChessBoard('board', cfg);
			// start the engine with the FEN
			engine.load( parseFen( {{ $game->fen }} ) );

		}; // end init()

		function parseFen ( aFen ) {

			/*
			 In the LCS, FEN exists in two states:
			 * initial position-only derived from the board
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

		/* BOARD EVENTS */

		// do not pick up pieces if the game is over
		// only pick up pieces for the side to move
		var onDragStart = function(source, piece, position, orientation) {
			if (engine.game_over() === true ||
					(engine.turn() === 'w' && piece.search(/^b/) !== -1) ||
					(engine.turn() === 'b' && piece.search(/^w/) !== -1)) {
				return false;
			}
		};

		var onDrop = function(source, target) {
			// see if the move is legal
			var move = engine.move({
				from: source,
				to: target,
				promotion: 'q' // NOTE: always promote to a queen for example simplicity
			});

			// illegal move
			if (move === null) return 'snapback';

			updateStatus();
		};

		// update the board position after the piece snap
		// for castling, en passant, pawn promotion
		var onSnapEnd = function() {
			board.position(engine.fen());
		};

		// this and onSnapEnd might be redundant
		var onChange = function(oldPos, newPos) {
			// passed object needs to be converted to FEN by ChessBoard for capturing
			document.getElementById('fen').value = engine.fen();
		};

		var updateStatus = function() {
			var status = '';

			var moveColor = 'White';
			if (engine.turn() === 'b') {
				moveColor = 'Black';
			}

			// checkmate?
			if (engine.in_checkmate() === true) {
				status = 'Game over, ' + moveColor + ' is in checkmate.';
			}

			// draw?
			else if (engine.in_draw() === true) {
				status = 'Game over, drawn position';
			}

			// game still on
			else {
				status = moveColor + ' to move';

				// check?
				if (engine.in_check() === true) {
					status += ', ' + moveColor + ' is in check';
				}
			}

			statusEl.html(status);
			fenEl.html(engine.fen());
			pgnEl.html(game.pgn());
		};

		var handleInterface = function() {

			statusEl = $('#status');
			fenEl = $('#fenstr');
			pgnEl = $('#pgn');

			if ( '{{ $submitter_id }}' === '{{ $game->turn_id }}' ) {
				document.getElementById("submitBtn").disabled = false;
			} else {
				document.getElementById("submitBtn").disabled = true;
			}
		};

		// kick off the game
		$(document).ready( function() {
			$(init);
			$(handleInterface);
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
			<td>
				<p>Status: <span id="status"></span></p>
				<p>FEN: <span id="fenstr"></span></p>
				<p>PGN: <span id="pgn"></span></p>
			</td>
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
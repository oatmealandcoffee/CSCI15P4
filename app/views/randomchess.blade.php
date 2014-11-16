@extends('_master')

@section('title')
Laravel Chess Server::Random Chess
@stop

@section('title_h1')
Random Chess Demo
@stop

@section('head')

@stop

@section('home_nav_active')
class="active"
@stop

@section('description')
A demo integration of chessboard.js and chess.js
@stop

@section('body')
<script>
var init = function() {

//--- start example JS ---

// establish a board
var board;
// establish an engine
var  game = new Chess();

// game loop
var makeRandomMove = function() {
	// capture the list of possible legal moves
  var possibleMoves = game.moves();

  // exit if the game is over
  if (game.game_over() === true ||
    game.in_draw() === true ||
    possibleMoves.length === 0) return;

	// select a random legal move
  var randomIndex = Math.floor(Math.random() * possibleMoves.length);
  // make the move
  game.move(possibleMoves[randomIndex]);
  // set the board position
  board.position(game.fen());

	// game loop; lather, rinse, repeat
  window.setTimeout(makeRandomMove, 50);
};

// instantiate the new board
board = new ChessBoard('board', 'start');

// kick off the game loop
window.setTimeout(makeRandomMove, 50);
//--- end example JS ---

}; // end init()
// kick off the game
$(document).ready(init);
</script>

<!-- container for the board; id is arbitrary -->
<div id="board" style="width: 400px"></div>

@stop
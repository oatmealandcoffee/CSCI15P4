@extends('_master')

@section('title')
Laravel Chess Server
@stop

@section('title_h1')
Laravel Chess Server
@stop

@section('description')
A simple server dedicated to the playing of chess.
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
board1 = new ChessBoard('board1', '1r3rk1/4qp1p/3pbbp1/1p1Bp3/1P2P3/2NP1P2/6PP/R2Q1RK1');
board2 = new ChessBoard('board2', '8/1R3Pk1/1p2p3/7r/1p3p2/5P2/P5PK/8');
board3 = new ChessBoard('board3', '5k2/R4p2/6p1/4P2p/5P2/1r4P1/5KP1/8');


}; // end init()
// kick off the game
$(document).ready(init);
</script>

<div class="container">

    <div class="row">
        <div class="col-md-4">
            <div id="board1" style="width: 200px"></div>
        </div>
        <div class="col-md-4">
            <div id="board2" style="width: 200px"></div>
        </div>
        <div class="col-md-4">
            <div id="board3" style="width: 200px"></div>
        </div>
    </div>


    <hr>



</div>


@stop
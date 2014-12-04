@extends('_master')

@section('title')
Laravel Chess Server::{{$position->name}}
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
    	<td></td>
    </tr>
    <tr>
    	<td>
    		<b>FEN:</b> <tt>{{$position->fen}}</tt>
    	</td>
    	<td></td>
    	<td></td>
    	<td></td>
    </tr>
    <tr>
        <td>
        	{{ Form::open(array('url'=>'/position', 'method' => 'GET')) }}
			{{ Form::submit('Play') }}
        	{{ Form::close() }}
        </td>
        <td>
            {{ Form::open(array('url'=>'/position/'.$position->id.'/edit', 'method' => 'GET')) }}
            {{ Form::submit('Edit') }}
            {{ Form::close() }}
        </td>
        <td>
			{{ Form::open(array('url'=>'/position/'.$position->id, 'method' => 'DELETE')) }}
			{{ Form::submit('Delete') }}
        	{{ Form::close() }}
       	</td>
       	<td></td>
    </tr>
</table>

@stop
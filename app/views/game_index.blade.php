@extends('_master')

@section('require')

@stop

@section('title')
All Games
@stop

@section('body')

<h2>Your Games</h2>

Insert New Game Button Here

<table class="table">
	<tr></tr>
	@foreach( $games as $game )

		<tr>
			<td>
				<div id="board{{$game->id}}" style="width: 200px">
					<script>
						var board;
                        var game = new Chess();
                        board = new ChessBoard('board{{$game->id}}', '{{$game->fen}}');
					</script>
				</div>
			</td>
		</tr>

	@endforeach

</table>

@stop
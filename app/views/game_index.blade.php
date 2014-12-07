@extends('_master')

@section('require')

@stop

@section('title')
All Games
@stop

@section('body')

<h2>Your Games</h2>

{{ Form::open(array('url'=>'/game/create', 'method'=>'GET')) }}
{{ Form::submit('New Game') }}
{{ Form::close() }}

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
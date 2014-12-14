@extends('_master')

@section('require')

@stop

@section('title')
All Games
@stop

@section('body')

<h2>Your Games</h2>



<table class="table">
	<tr>
		<td>
		{{ Form::open(array('url'=>'/game/create', 'method'=>'GET')) }}
		{{ Form::submit('New Game', array('class' => 'btn btn-primary')) }}
		{{ Form::close() }}
		</td>
		<td></td>
		<td></td>
	</tr>
	@foreach( $games as $game )

		<tr>
			<td>
				<div id="board{{$game->id}}" style="width: 200px">
					<script>
                        board = new ChessBoard('board{{$game->id}}', '{{$game->fen}}');
					</script>
				</div>
			</td>
			<td>
				{{ Form::open(array('url'=>'/game/'.$game->id.'/edit', 'method' => 'GET')) }}
                {{ Form::submit('Play', array('class' => 'btn btn-success')) }}
               	{{ Form::close() }}
			</td>
			<td>
				{{ Form::open(array('url'=>'/game/'.$game->id, 'method' => 'DELETE')) }}
				{{ Form::submit('Delete', array('class' => 'btn btn-default')) }}
				{{ Form::close() }}
			</td>
		</tr>

	@endforeach

</table>

@stop
@extends('_master')

@section('require')

@stop

@section('title')
Positions
@stop

@section('body')
<h2>Positions</h2>
<table class="table">
	<tr>
		<td>
			{{ Form::open(array('url'=>'/position/create', 'method' => 'GET')) }}
			{{ Form::submit('Add New Position', array('class' => 'btn btn-primary')) }}
			{{ Form::close() }}
		</td>
		<td></td>
	</tr>
	@foreach( $positions as $position )
		<tr>
			<td>
				{{ Form::open(array('url'=>'/position/'.$position->id, 'method' => 'GET')) }}
				{{ Form::submit($position->name, array('class' => 'btn btn-link')) }}
				{{ Form::close() }}
			</td>
			<td>
				{{ Form::open(array('url'=>'/position/'.$position->id, 'method' => 'GET')) }}
                {{ Form::submit('Show', array('class' => 'btn btn-default')) }}
                {{ Form::close() }}
			</td>
		</tr>
	@endforeach
</table>
@stop
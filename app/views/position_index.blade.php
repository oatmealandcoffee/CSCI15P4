@extends('_master')

@section('require')

@stop

@section('title')
All Positions
@stop

@section('body')

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
				<a href="/position/{{$position->id}}" title="{{$position->name}}">{{$position->name}}</a>
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
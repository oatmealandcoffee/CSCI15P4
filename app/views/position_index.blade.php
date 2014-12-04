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
            {{ Form::submit('Add New Position') }}
            {{ Form::close() }}
		</td>
	</tr>
	@foreach( $positions as $pos )
		<tr>
			<td>
				<a href="/position/{{$pos->id}}" title="{{$pos->name}}">{{$pos->name}}</a>
			</td>
			<td>
				{{ Form::open(array('url'=>'/position/'.$pos->id, 'method' => 'GET')) }}
                {{ Form::submit('Show') }}
                {{ Form::close() }}
			</td>
		</tr>
	@endforeach
</table>
@stop
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
		</tr>
	@endforeach
</table>
@stop
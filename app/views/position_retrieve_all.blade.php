@extends('_master')

@section('require')

@stop

@section('title')
Laravel Chess Server
@stop

@section('body')

<table class="table">
	@foreach( $positions as $pos )
		<tr>
			<td>
				<a href="/position/{{$pos->id}}" title="{{$pos->name}}">{{$pos->name}}</a>
			</td>
		</tr>
	@endforeach
</table>
@stop
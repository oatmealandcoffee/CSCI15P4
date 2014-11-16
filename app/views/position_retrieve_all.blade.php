@extends('_master')

@section('require')

@stop

@section('title')
Laravel Chess Server
@stop

@section('body')

@foreach( $positions as $pos )
	{{$pos->name;}}<br/>
@endforeach

@stop
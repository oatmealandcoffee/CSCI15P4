@extends('_master')

@section('require')

@stop

@section('title')
    Users
@stop

@section('body')

    <h2>Users</h2>

    <table class="table">
        @foreach( $users as $user )
            <tr>
                <td>
                    <b>{{ $user->username }}</b> ({{ $user->email }})
                </td>
                <td>
                    {{ Form::open(array('url'=>'/user/'.$user->id, 'method' => 'DELETE')) }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
    </table>

@stop
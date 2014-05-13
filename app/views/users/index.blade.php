@extends('layouts.master')
@section('content')

<h1>Users</h1>

@foreach($users as $user)
         <h3>{{ $user->first_name }} {{ $user->last_name }} {{ link_to("/users/{$user->username}", $user->username) }} </h3>
@endforeach
{{ $users->links() }}
@stop
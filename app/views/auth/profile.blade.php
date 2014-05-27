@extends('layouts.master')
@section('content')

<h1>Your Profile</h1>

<div class="row">
    <div class="col-md-6">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
            </tbody>
        </table>
    <hr>
    <a href="{{ URL::to('profile/edit') }}" class="btn btn-primary">Edit Profile</a>

    </div>

    <div class="col-md-6">

    </div>

</div>
@stop

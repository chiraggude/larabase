@extends('layouts.master')
@section('content')
<a href="{{ URL::to('profile/edit') }}" class="btn btn-primary pull-right"><i class="fa fa-edit"></i> Edit Profile</a>
<h1>Your Profile</h1>
<hr>
<div class="row">
    <div class="col-md-6">

        {{ HTML::table($user, ['id', 'username', 'first_name', 'last_name', 'email']) }}

        {{ HTML::br(2) }}

    </div>
</div>
@stop

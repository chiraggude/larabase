@extends('layouts.master')
@section('content')
<h1>Dashboard <small>Hi, {{ $user->first_name ?: $user->username }}</small></h1>
<hr>
<div class="row">

    <div class="col-md-6">
        <h3>Timeline (Recent Activity)</h3>

        {{ HTML::br(3) }}

        <h3>Favourites</h3>

    </div>

    <div class="col-md-6">
        <h3>Network Updates</h3>

        {{ HTML::br(3) }}

        <h3>Connections</h3>

    </div>

</div>
@stop

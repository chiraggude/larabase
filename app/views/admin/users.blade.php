@extends('layouts.master')
@section('header-js')
    {{ HTML::style('//cdn.datatables.net/plug-ins/be7019ee387/integration/bootstrap/3/dataTables.bootstrap.css') }}
    {{ HTML::script('//cdn.datatables.net/1.10.0/js/jquery.dataTables.min.js') }}
    {{ HTML::script('//cdn.datatables.net/tabletools/2.2.1/js/dataTables.tableTools.min.js') }}
    {{ HTML::script('//cdn.datatables.net/plug-ins/28e7751dbec/integration/bootstrap/3/dataTables.bootstrap.js') }}
@stop

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <p class="panel-title">Users</p>
    </div>
    <div class="panel-body">
        <table id="admin-users-datatable" width="100%" class="table table-striped table-hover table-bordered"></table>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        @include('admin.partials.assign-user-roles')
    </div>
    <div class="col-md-4">
        @include('admin.partials.ban-users')
    </div>
    <div class="col-md-4">
        @include('admin.partials.revoke-ban-users')
        @include('admin.partials.restore-users')
        <h3 class="text-muted">{{ $suspended_users }} users have been Suspended </h3>
    </div>
</div>

@stop

@section('footer-js')
<script>

    var dataset = [
    @foreach($users as $user)
    [ "{{ $user->username }}",
      "{{ $user->profile->first_name }}",
      "{{ $user->profile->last_name }}",
      "{{ $user->email }}",
      "@foreach($user->roles as $role) <span class='label label-default'>{{ $role->name }}</span> @endforeach",
      "{{ $user->throttle->last_activity->diffForHumans() }}",
      "<a href='{{ URL::to('users') }}/{{ $user->username }}' class='btn btn-xs btn-default'><i class='fa fa-user'></i></a>"
    ],
    @endforeach
    ];


    var columns = [
        { "title": "Username" },
        { "title": "First Name", "class": "text-center" },
        { "title": "Last Name", "class": "text-center" },
        { "title": "Email", "class": "text-center" },
        { "title": "Roles", "class": "text-center" },
        { "title": "Last Active", "class": "text-center" },
        { "title": "Action", "class": "text-center"}
    ];

</script>
@stop
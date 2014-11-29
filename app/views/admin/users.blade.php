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

@include('admin.restore-users')

@stop

@section('footer-js')
<script>

    var dataset = [
    @foreach($users as $user)
    [ "{{ $user->username }}",
      "{{ $user->first_name }}",
      "{{ $user->last_name }}",
      "{{ $user->email }}",
      "{{ $user->updated_at->diffForHumans() }}",
      "<a href='{{ URL::to('users') }}/{{ $user->username}}' class='btn btn-xs btn-default'><i class='fa fa-user'></i></a>"
    ],
    @endforeach
    ];

    var columns = [
        { "title": "Username" },
        { "title": "First Name", "class": "text-center" },
        { "title": "Last Name", "class": "text-center" },
        { "title": "Email", "class": "text-center" },
        { "title": "Last Active", "class": "text-center" },
        { "title": "Action", "class": "text-center"}
    ];

</script>
@stop
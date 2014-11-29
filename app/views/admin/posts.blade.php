@extends('layouts.master')
@section('header-js')
    {{ HTML::style('//cdn.datatables.net/plug-ins/be7019ee387/integration/bootstrap/3/dataTables.bootstrap.css') }}
    {{ HTML::script('//cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js') }}
    {{ HTML::script('//cdn.datatables.net/tabletools/2.2.1/js/dataTables.tableTools.min.js') }}
    {{ HTML::script('//cdn.datatables.net/plug-ins/28e7751dbec/integration/bootstrap/3/dataTables.bootstrap.js') }}
@stop

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <p class="panel-title">Posts</p>
    </div>
    <div class="panel-body">
        <table id="admin-posts-datatable" class="table table-striped table-hover table-bordered">
            <thead>
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Author</th>
                <th>Actions</th>
            </tr>
            </thead>
        </table>
    </div>
</div>

@stop

@section('footer-js')
<script>
     var posts = "{{ URL::to('posts') }}";
     var users = "{{ URL::to('users') }}";
     var admin_api_posts = "{{ URL::to('admin/api/posts') }}";
</script>
@stop
@extends('layouts.master')
@section('header-js')
    {{ HTML::script('//cdn.jsdelivr.net/highcharts/4.0.1/highcharts.js') }}
    {{ HTML::script('//cdn.jsdelivr.net/highcharts/4.0.1/modules/exporting.js') }}
@stop

@section('content')
<h1>Dashboard</h1>
<hr>
<div class="row" id="dashboard">

    <div class="col-md-6">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Sitewide Trends</h3>
            </div>
            <div class="panel-body">
                <div id="trends"></div>
                <div class="row">
                    <div class="col-md-6">
                        <h1><i class="fa fa-file-text"></i> <span id="posts">0</span> Posts</h1>
                    </div>
                    <div class="col-md-6">
                        <h1><i class="fa fa-users"></i> <span id="users">0</span> Users</h1>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="col-md-6">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"> Your Summary</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <h1><a href="{{ URL::to('users/'.$user->username.'/posts') }}"> <i class="fa fa-file-text"></i> <span id="user_posts">0</span> Posts</a></h1>
                    </div>
                    <div class="col-md-6">
                        <h1><i class="fa fa-envelope"></i> <span id="feedback">0</span> Messages</h1>
                    </div>
                </div>
            </div>
        </div>

        <h3>Notifications <span class="badge">3</span></h3>
        <div class="list-group">
            <a href="#" class="list-group-item">Porta ac consectetur ac <span class="label label-default pull-right">6 hours ago</span></a>
            <a href="#" class="list-group-item">Vestibulum at eros <span class="label label-default pull-right">2 days ago</span></a>
            <a href="#" class="list-group-item">Dapibus ac facilisis in <span class="label label-default pull-right">5 days ago</span></a>
        </div>

        <h3>Activity Timeline</h3>
        <ul class="list-group">
            <li class="list-group-item">Dapibus ac facilisis in <span class="label label-default pull-right">3 mins ago</span></li>
            <li class="list-group-item">Porta ac consectetur ac <span class="label label-default pull-right">1 hour ago</span></li>
            <li class="list-group-item">Vestibulum at eros <span class="label label-default pull-right">7 hour ago</span></li>

    </div>

</div>

@stop

@section('footer-js')
    {{ HTML::script('js/animateNumber.min.js') }}
    <script>
        var users = {{ json_encode($users) }};
        var posts = {{ json_encode($posts) }};
        var user_posts = {{ json_encode($user_posts) }};
        var feedback = {{ json_encode($feedback) }};
    </script>
@stop
@extends('layouts.master')
@section('header-js')
    {{ HTML::script('//cdn.jsdelivr.net/highcharts/4.0.3/highcharts.js') }}
    {{ HTML::script('//cdn.jsdelivr.net/highcharts/4.0.3/modules/exporting.js') }}
@stop

@section('content')
<h1>Dashboard</h1>
<hr>
<div class="row" id="admin-dashboard">

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Sitewide Trends</h3>
            </div>
            <div class="panel-body">
                <div id="trends"></div>
                <div class="row">
                    <div class="col-md-4 col-xs-4">
                        <h2><i class="fa fa-file-text"></i> <span id="posts" class="label label-info counter">0</span> Posts</h2>
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <h2><i class="fa fa-users"></i> <span id="users" class="label label-info counter">0</span> Users</h2>
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <h2><i class="fa fa-envelope"></i> <span id="feedback" class="label label-info counter">0</span> Msgs</h2>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

@stop

@section('footer-js')
    {{ HTML::script('js/animateNumber.min.js') }}
    <script>
        var users = {{ json_encode($users) }};
        var posts = {{ json_encode($posts) }};
        var feedback = {{ json_encode($feedback) }};
    </script>
@stop
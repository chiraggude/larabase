<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PROJECT X</title>

    {{ HTML::style('css/project-x.css') }}
    {{ HTML::style('css/flatty.min.css') }}
    {{ HTML::style('css/font-awesome.min.css') }}

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

@include("layouts/navigation")

<div class="container">
    <div class="row">
        <div class="container">
            @include("layouts/notifications")
            @yield('content')
        </div>
    </div>
</div>

@include("layouts/footer")

</body>

{{ HTML::script('js/jquery-1.11.0.min.js') }}
{{ HTML::script('js/project-x.js') }}
{{ HTML::script('js/bootstrap.min.js') }}

</html>

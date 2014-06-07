<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LaraBase</title>

    {{ HTML::style('css/larabase.css') }}
    {{ HTML::style('//cdn.jsdelivr.net/bootswatch/3.1.1.1/flatly/bootstrap.min.css') }}
    {{ HTML::style('//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css') }}

    {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js') }}

    @yield('header-js')

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

{{ HTML::script('//cdn.jsdelivr.net/bootstrap/3.1.1/js/bootstrap.min.js', ['async' => 'async']) }}
{{ HTML::script('js/analytics.js', ['async' => 'async']) }}

@yield('footer-js')

{{ HTML::script('js/larabase.js') }}

</body>
</html>

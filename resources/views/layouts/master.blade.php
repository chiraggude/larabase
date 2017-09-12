<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{!! asset('img/favicon.png') !!}">

    <title>LaraBase</title>

    {!! Html::style('//maxcdn.bootstrapcdn.com/bootswatch/3.3.0/flatly/bootstrap.min.css') !!}
    {!! Html::style('css/larabase.css') !!}
    {!! Html::style('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css') !!}
    {!! Html::style('css/magicsuggest.min.css') !!}

    {!! Html::script('//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js') !!}

    @yield('header-js')

</head>
<body>

@include('layouts/navigation')

@include('layouts/notifications')

@yield('ajax-notifications')

<div class="container top-gap">
    <div class="row">
        <div class="container">
            @yield('content')
        </div>
    </div>
</div>

@include('layouts/footer')

{!! Html::script('//cdn.jsdelivr.net/bootstrap/3.3.0/js/bootstrap.min.js', ['async' => 'async']) !!}

@yield('footer-js')

{!! Html::script('js/larabase.js') !!}
{!! Html::script('js/analytics.js', ['async' => 'async']) !!}

</body>
</html>

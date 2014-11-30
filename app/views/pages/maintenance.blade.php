<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="img/favicon.png">

    <title>LaraBase</title>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.0/flatly/bootstrap.min.css">

    <style>
        body {
            background: url('img/light_noise_diagonal.png') repeat 0 0;
        }
        #clock {
            margin: 30px 0px 50px 0px
        }
        .timer-box {
            text-align: center;
            border-radius: 50%;
            display: inline-block;
            margin-left: 10px;
            width: 120px;
            border: 4px solid #fff;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
            color: #b4bcc2
        }
        @media (max-width: 390px) {
            .timer-box {
                width: 85px;
            }
            .timer-box > h1 {
                font-size: 20px;
            }
            .timer-box > p {
                font-size: 10px;
            }
        }
    </style>

</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="text-muted">SCHEDULED DOWNTIME</h1>
            <h4 class="text-muted">Unfortunately the site is down for a bit of maintenance right now</h4>
            <hr>
            <h4 class="text-muted">We'll be back soon</h4>
            <div class="row">
                <div id="clock"></div>
            </div>
            <h4 class="text-muted">Get the latest updates on our social accounts</h4>
            <div class="btn-group">
                <a href="#" class="btn btn-default" role="button">Facebook</a>
                <a href="#" class="btn btn-default" role="button">Twitter</a>
                <a href="#" class="btn btn-default" role="button">Google Plus</a>
            </div>
        </div>
    </div>
</div>


<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script>
    var time = '{{ $time }}';
    $(document).ready(function () {
        $('#clock').countdown(time, function (event) {
            $(this).html(event.strftime(''
                + '<div class="timer-box"><h1> %H </h1><p> hours   </p></div>'
                + '<div class="timer-box"><h1> %M </h1><p> minutes </p></div>'
                + '<div class="timer-box"><h1> %S </h1><p> seconds </p></div>'
            ));
        });
    });
</script>

</body>
</html>

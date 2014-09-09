<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LaraBase</title>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/flatly/bootstrap.min.css">

    <style>
        body {background: url('img/light_noise_diagonal.png') repeat 0 0;}
        #clock {margin: 30px 0px 50px 0px}
        .timer-box {text-align: center; margin: 10px 30px; display: inline-block; width: 130px; height: 120px; border-radius: 50%; border: 4px solid #fff; box-shadow: 0px 5px 10px rgba(0,0,0,0.2) }
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
            <div id="clock"></div>
            <h4 class="text-muted">Let me know when the service is online</h4>
            <form class="form-inline" role="form">
                <div class="form-group">
                    <input type="email" class="form-control" id="InputEmail" placeholder="Your Email">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>

        </div>
    </div>
</div>


<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script>
    $('#clock').countdown('2014/09/10 12:24:56' , function(event) {
        $(this).html(event.strftime('<div class="timer-box"> <h1 class="text-muted"> %H </h1> <p class="text-muted"> hour    </p> </div>'
                + '<div class="timer-box"> <h1 class="text-muted"> %M </h1> <p class="text-muted"> minutes </p> </div>'
                + '<div class="timer-box"> <h1 class="text-muted"> %S </h1> <p class="text-muted"> seconds </p> </div>'
        ));
    });
</script>

</body>
</html>

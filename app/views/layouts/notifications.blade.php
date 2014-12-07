@if (Session::has('message'))
    <div class="alert alert-info alert-dismissable" id="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <div class="container">
            <strong>{{ Session::get('message') }}</strong>
        </div>
    </div>
@endif

@if (Session::has('info'))
    <div class="alert alert-info alert-dismissable" id="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <div class="container">
            <strong>{{ Session::get('info') }}</strong>
        </div>
    </div>
@endif

@if (Session::has('success'))
    <div class="alert alert-success alert-dismissable" id="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <div class="container">
            <strong>{{ Session::get('success') }}</strong>
        </div>
    </div>
@endif

@if (Session::has('errors'))
    <div class="alert alert-danger alert-dismissable" id="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <div class="container">
            {{ HTML::ul($errors->all()) }}
        </div>
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissable" id="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <div class="container">
            <strong>{{ Session::get('error') }}</strong>
        </div>
    </div>
@endif

@if (Session::has('warning'))
    <div class="alert alert-warning alert-dismissable" id="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <div class="container">
            <strong>{{ Session::get('warning') }}</strong>
        </div>
    </div>
@endif

@if (Session::has('activation_message'))
    <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <div class="container">
            <strong>{{ Session::get('activation_message') }}</strong>
            <strong><a href="{{ URL::to('resend-activation') }}" class="btn btn-warning btn-xs">Resend Activation Code</a></strong>
        </div>
    </div>
@endif
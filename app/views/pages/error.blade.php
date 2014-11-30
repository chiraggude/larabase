@extends('layouts.master')
@section('content')

    <div class="jumbotron" style="margin-top: 20px">
        <div class="row">
            <div class="col-md-6 text-center">
                <h1>Whoops! <small>{{ $code }} error</small></h1>
                <br>
                <h3 class="text-muted">Looks like something went wrong</h3>
                @if($code == '500')
                    <h3 class="text-muted">The resource you're looking for does not exist</h3>
                @else
                    <h3 class="text-muted">The page you're looking for does not exist</h3>
                @endif
            </div>
            <div class="col-md-6 text-center">
                <h1><i class="fa fa-frown-o fa-4x"></i></h1>
            </div>
        </div>
    </div>

@stop
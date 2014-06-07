@extends('layouts.master')
@section('content')

    <h1>Whoops! <small>{{ $code or 'some' }} error</small></h1>

    <h1 class="text-muted"><i class="fa fa-frown-o fa-5x"></i></h1>

    <h3 class="text-muted">Looks like something went wrong</h3>

@stop
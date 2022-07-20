@extends("layouts.app")

@section("title") Whoops! | @parent @stop

@section("content")

<style>
    html, body {
        background-color: #fff !important;
    }

    .img-container img {
        /*height: 33%;*/
        max-height: 500px;
    }
</style>

<div class="container p-y-lg">
    <h3 class="font-weight-300 text-center text-black">
        Whoops! Looks like something went missing in the matrix...<br>
        Our robots are looking into it!
    </h3>
    <h5 class="font-weight-300 text-center">
        <a href="{{ URL::to('/') }}" class="text-info">Take me back to civilization</a>
    </h5>
    <div class="p-a-lg center-block img-container">
     {{--   <img src="{{ asset('/images/404.svg') }}" class="img-responsive center-block" alt="" />--}}
    </div>
</div>

@stop

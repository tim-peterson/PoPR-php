@extends("layouts.app")

@section("title") Be right back | @parent @stop

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
        We are currently deploying some sweet code...<br>
        We'll be back shortly!
    </h3>
    <div class="p-a-lg center-block img-container">
     {{--   <img src="{{ asset('/images/404.svg') }}" class="img-responsive center-block" alt="" />--}}
    </div>
</div>

@stop

@extends('spark::layouts.app')

@section('content')
    <div class="container">
        <!-- Application Dashboard -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @if(!Auth::check())
                <h3 style="color:#000">The TR Prize are monthly awards for the best new research. </h3>

            	@include('pages._intro')
                @endif


                @include('pages._biorxiv')

                {{-- @include('pages._welcome') --}}

            </div>
        </div>
    </div>

@endsection

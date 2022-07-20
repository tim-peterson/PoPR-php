

@extends('spark::layouts.app')


@section('content')

	<div class="container">
	<div class="row">
	<div class="col-md-8 col-md-offset-2">

		@include('pages._subscribe')

	</div>
	</div>
	</div>

@endsection


@include('pages._subscribe_js')


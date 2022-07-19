@extends('layouts.app')


@section('content')


<form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">

<label>File (pdf only)</label>
<input type="file" name="name" placeholder="File">

@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

{{--
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Email:</strong>
<input type="email" name="email" class="form-control" placeholder="Email">
@error('email')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror


</div>
</div>
 --}}

<button type="submit" class="btn btn-primary ml-3">Submit</button>
</div>
</form>



@stop

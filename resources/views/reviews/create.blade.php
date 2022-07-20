@extends('layouts.app')


@section('content')

{{ $project->title }}
{{ $project->link }}


<form action="{{ route('reviews.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<input hidden name="project_id" value="{{ $project->id }}">


<div class="row">

<div class="col-md">

    <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" class="form-control" placeholder="Title">
        @error('title')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label>Description</label>
        <textarea type="text" name="description" class="form-control" placeholder="Description" rows="3"></textarea>
        @error('description')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
    </div>


    <div class="form-group">
        <button type="submit" class="btn">Submit</button>
    </div>
</div>
<div class="col-md"></div>
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

</div>
</form>



@stop

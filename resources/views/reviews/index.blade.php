@extends('layouts.app')


@section('content')


<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Laravel 9 CRUD Example Tutorial</h2>
</div>
<div class="pull-right mb-2">
<a class="btn btn-success" href="{{ route('projects.create') }}"> Create Company</a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>S.No</th>
<th>Company Name</th>
<th>Company Email</th>
<th>Company Address</th>
<th width="280px">Action</th>
</tr>
@foreach ($projects as $project)
<tr>
<td>{{ $project->id }}</td>
<td>{{ $project->name }}</td>
<td>{{ $project->email }}</td>
<td>{{ $project->address }}</td>
<td>
<form action="{{ route('projects.destroy',$project->id) }}" method="Post">
<a class="btn btn-primary" href="{{ route('projects.edit',$project->id) }}">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
{!! $projects->links() !!}


@stop

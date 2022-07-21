

@extends('layouts.app')
@section('content')


@if(strpos(Request::url(), 'search'))
    @include('pages._search')

    @if(count($items) == 0)
      <p>No results.</p>
    @endif
@endif


<div id="biorxiv_ordered_list" style="padding-top:1rem;">
  @foreach ($items as $key => $item)
    <div class="item">
      <h4 style="margin-bottom:5px">{{ $items->firstItem() + $key }}.
      	<a role="button" data-bs-toggle="collapse" href="#collapseExample-{{ $item->id }}" >{{ $item->title }}</a>
      </h4>
      <p>
      	<small title="Posted {{ $item->created_at->diffForHumans() }} "> {{ $item->created_at->format('j F Y') }} |
      		<a target="_blank" href="{{ $item->link }} " style="padding:15px 5px">

          link
        </a>|

	      	<a href="/projects/{{ $item->id }}/review">
	      		<span class="alert" style="padding:15px 5px">Write review</span>
	      	</a>

      	</small>

  		</p>
      <p id="collapseExample-{{ $item->id }}" class="collapse" >{{ $item->description }}</p>

    </div>
  @endforeach
</div>


  {{ $items->links() }}

  @if(strpos(Request::url(), 'search')==false)

      @include('pages._search')

  @endif

@stop








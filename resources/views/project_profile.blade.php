
@foreach($projects as $item)

<div class="item">
    <h4 style="margin-bottom:5px">{{ $items->firstItem() + $key }}.
        <a role="button" data-bs-toggle="collapse" data-bs-target href="#collapseExample-{{ $item->id }}" >{{ $item->title }}</a>
    </h4>
    <p>
        <small title="Posted {{ $item->created_at->diffForHumans() }} "> {{ $item->created_at->format('j F Y') }} |
            <a target="_blank" href="{{ $item->link }} " style="padding:15px 5px">
          {{--@if($item->preprint_source=='biorxiv')
          Biorxiv
          @else
          Arxiv
          @endif
          --}}
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




  @foreach ($items as $item)

 	<?php $rand = rand();?>
    <div class="item">
      <h4><a role="button" data-toggle="collapse" href="#collapseExample-{{ $rand }}" >{{ $item->get_title() }}</a></h4>
      <p id="collapseExample-{{ $rand }}" class="collapse" >{{ $item->get_description() }}</p>
      <p><small>Posted on {{ $item->get_date('j F Y | g:i a') }}</small></p>
      <p><a href="/settings#/reviews"><div class="alert alert-info"><p>Write review.</p></div></a></p>
    </div>
  @endforeach
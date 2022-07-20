
<p>Hi there,</p>

<p> We have the results for this month: </p>

<ul>

<?php $my_manuscripts = []; $top_3 = [];?>

    @foreach($manuscripts_under_review as $manuscript)

    	@if(count($top_3) < 4)
    		<li>{{ $manuscript->name }}  {{ $manuscript->total_score }}</li>

    		<?php $top_3[] = $manuscript;?>
    	@endif

    	@foreach($manuscript->users as $user)
    		@if($user->id==$recipient->id)
    			<? $my_manuscripts[] = $manuscript;?>
    		@endif

    	@endforeach


    	
    @endforeach

</ul>

<p>Congratulations to the winners!</p>

 @foreach($my_manuscripts as $m)

 	@foreach($top_3 as $top)

 		@if($top->id==$m->id)
 			<p>Your award will be sent shortly. Please respond to this email to indicate where to send your award.</p>

 			<?php break;?>

 		@endif

 	@endforeach

 @endforeach



<?php $my_manuscripts_count = count($my_manuscripts); ?>

<ul>
 @foreach($my_manuscripts as $m)

 	<li>Your manuscript, <a href="{{ $m->photo_url }}">{{ $m->name }}</a>, was
 	@if($m->total_reviews > 0 && $m->total_accepted/$m->total_reviews > 0.5)
 		accepted. Congratulations!! It is live on the TR <a href="{{ \URL::to('/') }}/home"> home page</a>.
 	@else
 		rejected. Feel free to make a revision and re-submit. If you do re-submit, please be considerate to make non-trivial changes in the manuscript to not burden the reviewers.  
 	@endif
 	</li>


 @endforeach
</ul>

<br>

<p><div> Best Regards,</div> 

<div> The TR Prize</div> </p>
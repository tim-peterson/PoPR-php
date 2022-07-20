<p>Hi there,</p>


<div>
    You have a new review for your manuscript, <a href="{{ $team->photo_url }}">{{ $team->name }}</a>.
</div>

	<p>Title: {{ $review->name }}</p>
	<p>Accept: 
		@if($review->accept) 
			<span class="text-success">Yes</span> 
		@else
			<span >No</span> 
		@endif
	</p>
	<p>Originality: {{ $review->originality}} </p>
	<p>Rigor: {{ $review->rigor}}</p>
	<p>Impact: {{ $review->impact}} </p>            	            	
	<p>Review: {{ $review->description}} </p>



<br>

<p><div> Best Regards,</div> 

<div> The TR Prize</div> </p>

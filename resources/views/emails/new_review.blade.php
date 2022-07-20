
<p>Hi there,</p>


<p> You have 

<?php $num_reviews = count($manuscript->team_users); ?>

@if($num_reviews > 1)
	{{ $num_reviews }} new reviews
@else
	a new review
@endif

 on your work: <b> {{ $manuscript->name }} </b> </p>

<p><b> Average score: </b> {{ round($manuscript->total_score/$num_reviews, 2) }} </p>

<ol>
@foreach($manuscript->team_users as $review)

<li>
	<ul>
    <li> Approach: {{$review->approach}}</li>
    <li> Significance: {{$review->significance}}</li>
    <li> Innovation: {{$review->innovation}}</li>
    <li> Environment: {{$review->environment}}</li>
    <li> Investigator: {{$review->investigator}}</li>
    <li> Overall: {{$review->overall}}</li>
   	<li> Comments: {{$review->comment}}</li>
   	</ul>
</li>

@endforeach
</ol>


<br>
<div>Best regards,</div>
<div>The TR Prize </div>


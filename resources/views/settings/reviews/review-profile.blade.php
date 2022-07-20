<review-profile :user="user" :review="review" inline-template>
    <div>
        <div v-if="user && review">

            <!-- Update Team Name -->

            @if($review->created_at->month == \Carbon\Carbon::now()->month)
            	@include('settings.reviews.update-review-name')
            @else
            
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


            @endif
        </div>
    </div>
</review-profile>

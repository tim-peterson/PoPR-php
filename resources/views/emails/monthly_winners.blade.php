
<p>Hi there,</p>

<p> Congratulations, you won a TR Prize for your manuscript posted to 

	@if($winner->preprint_source =='biorxix')
		Biorxiv:
	@else
		{{ ucfirst(str_replace("_", ".", $winner->preprint_source)) }}:
	@endif
 <em>{{ $winner->name }}</em>.</p>

<p> Your award is ${{ round($winner->prize_winners, 0) }}. You can do with this prize as you see fit.</p>

<p>To claim your TR Prize, contact us at <a href="mailto:support@trprize.org">support@trprize.org</a> </p>

{{-- 
<p>To claim your TR Prize, follow this link: <a href="{{ \URL::to('/winner/'.$winner->id.'/claim') }}"> {{ \URL::to('/winner/'.$winner->id.'/claim') }}</a>.</p>
--}}

<p>Again, congratulations!</p>


<br>

<p><div> Best regards,</div> 

<div> The TR Prize</div> </p>

<p>Hi there,</p>

<p> We found your keywords in the following manuscripts: </p>

<ul>

 


@foreach($recipient as $i => $tag)
	
	<?php $tags = "";?>
	@if($i!='details')
	
		@foreach($tag as $key => $value)
			@if($key!='details')

			<?php $tags .=$value['tag_name']. ", ";?>
			@endif
		@endforeach

		<li>Keywords: <b>{{ rtrim($tags, ', ') }}</b> in: <a href="{{ URL::to('/manuscript/'.$i) }}">{{ $recipient[$i]['details']['title'] }} </a></li>

	@endif



@endforeach


{{--

@foreach($recipient as $row)
	<li>Tag: <b>{{ $row['tag_name'] }}</b> in: <a href="{{ URL::to('/manuscripts/'.$row['manuscript_id'].'/review') }}">{{ $row['title'] }} </a></li>
@endforeach

  --}}

</ul>


<br>

<p><div> Best Regards,</div> 

<div> The TR Prize</div> </p>

<br>
<br>


<%asm_group_unsubscribe_url%>




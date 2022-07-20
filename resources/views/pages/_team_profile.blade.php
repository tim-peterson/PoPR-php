

<p><b>Title:</b> {{ $team->name }} 


</p>

<p title="Posted {{ $team->created_at->diffForHumans() }} "><b>Published Date:</b> {{ $team->created_at->format('j F Y') }}</p>

<p><b>Link:</b> <a target="_blank" href="{{ $team->photo_url }}">{{ $team->photo_url }}</a></p>            
<?php
$doi_arr = explode("__", $team->description_lay);

?>

@if(isset($doi_arr[1]) && !empty(trim($doi_arr[1])))
        <p><b>DOI:</b> {{ $doi_arr[1] }}</p>
@endif

@if(isset($doi_arr[3]) && !empty(trim($doi_arr[3])))
        <p><b>Authors:</b> {{ $doi_arr[3] }}</p>
@endif

<p><b>Abstract:</b> {{ $team->description }}</p>

@if(\Request::segment(1)=='manuscript')
<p>
	<a href="/{{ Spark::teamString() }}s/{{ $team->id }}/review">
		<b><u>Write review</u></b>
	</a>	
</p>
@endif


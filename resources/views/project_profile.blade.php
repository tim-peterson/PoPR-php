
@foreach($projects as $project)
<p><b>Title:</b> {{ $project->title }}


</p>

<p title="Posted {{ $project->created_at->diffForHumans() }} "><b>Published Date:</b> {{ $project->created_at->format('j F Y') }}</p>

<p><b>Link:</b> <a target="_blank" href="{{ $project->link }}">{{ $project->link }}</a></p>
{{--
<?php /*
$doi_arr = explode("__", $project->description_lay);
*/
?>

@if(isset($doi_arr[1]) && !empty(trim($doi_arr[1])))
        <p><b>DOI:</b> {{ $doi_arr[1] }}</p>
@endif

@if(isset($doi_arr[3]) && !empty(trim($doi_arr[3])))
        <p><b>Authors:</b> {{ $doi_arr[3] }}</p>
@endif

<p><b>Abstract:</b> {{ $project->description }}</p>
 --}}

<p>
	<a href="/projects/{{ $project->id }}/review">
		<b><u>Write review</u></b>
	</a>
</p>
@endforeach


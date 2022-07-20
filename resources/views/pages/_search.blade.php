<form class="form-inline" action="/search" method="get">
	<input hidden type="text" name="_token" value="{{ csrf_token() }}" >

	<div class="form-group">
	  <input class="form-control" type="text" name="search_query" required placeholder="Search..">
	</div>
	<div class="form-group">
	  <button class="btn btn-primary" type='submit' value='submit'>submit</button>
	</div>

	<div class="form-group m-l-sm">
	  <a class="m-x-lg" href="/algolia"  role="button"><small> Advanced</small></a>
	</div>

</form>



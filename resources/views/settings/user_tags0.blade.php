






@if(Session::has('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
    @php
    Session::forget('success');
    @endphp
</div>
@endif


<form action="{{ url('user-tags') }}" method="POST">
	{{ csrf_field() }}
	<div class="form-group">
		<label>Please enter keywords you'd like us to search for in newly submitted Biorxiv and Arxiv manuscripts such that you can review them. We will email you at {{ Auth::user()->email }} <a href="/settings#/profile">(update)</a> when manuscripts containing these keywords are posted. </label>
		<input type="text" name="tags" >
		@if ($errors->has('tags'))
            <span class="text-danger">{{ $errors->first('tags') }}</span>
        @endif
	</div>		


	<div class="form-group">
		<button class="btn btn-primary btn-submit">Submit</button>
	</div>
</form>





@section('scripts-footer')
	<link rel="stylesheet" href="/css/bootstrap-tagsinput.css" />
	<script src="/js/bootstrap-tagsinput.js"></script>

	<script>
		$(function(){

			$('input[name=tags]').tagsinput({
			  //itemValue: 'id',
			//  itemText: 'name',
				  trimValue: true,
			      itemValue: function(item) {
			          return item.id;
			      },
			      itemText: function(item) {
			          return item.name;
			      }		
			});

			@if(count(Auth::user()->tags) > 0)
			var user_tags = {!! json_encode(Auth::user()->tags) !!};
			for(var i = 0; i < user_tags.length; i++){
				$('input[name=tags]').tagsinput('add', user_tags[i]);
			}
			@endif;
			//$('input[name=tags]').tagsinput('add', { "value": 1 , "text": "Amsterdam"   , "continent": "Europe"    });
			//$('input[name=tags]').tagsinput('add', {!! json_encode(Auth::user()->tags) !!} );
		});
	</script>
@endsection
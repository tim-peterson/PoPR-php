

<div id="user_tags_form" class="m-b-lg">
	{{ csrf_field() }}
	<div class="form-group">
		<label>Please enter keywords you'd like us to search for in newly posted Biorxiv and Arxiv manuscripts. We will email you at <span style="color:black">{{ Auth::user()->email }}</span> <a href="/settings#/profile">(update)</a> when we find manuscripts containing these keywords such that you can more easily find ones you might want to review. Example keywords: mTOR, epigenetics, microbiome.</label>
		<input type="text" name="tags" class="tags-typeahead" >
		@if ($errors->has('tags'))
            <span class="text-danger">{{ $errors->first('tags') }}</span>
        @endif
	</div>		

	<div class="form-group">
		<button class="btn btn-primary btn-submit" type="button">Submit</button>
	</div>
</div>





@section('scripts-footer')
	<link rel="stylesheet" href="/css/bootstrap-tagsinput.css" />
	
	<script src="/js/typeahead.bundle.min.js"></script>
	<script src="/js/bootstrap-tagsinput.js"></script>
	<script src="/js/handlebars.min.js"></script>


	<script>
		$(function(){


				jQuery.fn.extend({
				    disable: function(state) {
				        return this.each(function() {
				            var $this = $(this);
				            if($this.is('input, button, textarea, select'))
				              this.disabled = state;
				            else
				              $this.toggleClass('disabled', state);
				        });
				    }
				});



			$("#user_tags_form button").click(function(e) {

				    //var url = "path/to/your/script.php"; // the script where you handle the form input.


				    $.ajax({
				           type: "POST",
				           beforeSubmit: function(){
				           		$("#user_tags_form button").disable(true);
				           },
				           url: "{{ url('user-tags') }}",
				           data: $("#user_tags_form").serialize(), // serializes the form's elements.
				           error: function(one, two, three){
				           		
				           		$("#user_tags_form button").disable(false).after('<span class="success-div" style="margin-left: 5px;">Something went wrong.</span>')

				           		$("#user_tags_form .success-div").fadeOut(4500);
				           },
				           success: function(data)
				           {
				           		$("#user_tags_form button").disable(false).after('<span class="success-div" style="margin-left: 5px;">Saved</span>');

				           		$("#user_tags_form .success-div").fadeOut(4500);			           		
				              // alert(data); // show response from the php script.
				           }
				         });

				    e.preventDefault(); // avoid to execute the actual submit of the form.
				});


			@if(count(Auth::user()->tags) > 0)
				var user_tags = {!! json_encode(Auth::user()->tags) !!};

			@else 
				var user_tags = {!! json_encode([]) !!};
			@endif;


/*				  var tags_typeahead = $('.tags-typeahead'); //input = composite

				  var tags_bloodhound = new Bloodhound({
				      datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
				      queryTokenizer: Bloodhound.tokenizers.whitespace,
				      remote: {
				          url: '/search/suggest-tags?q=%QUERY',
				          wildcard: '%QUERY'
				      }
				  });

				  tags_bloodhound.initialize();

			@if(count(Auth::user()->tags) > 0)
				var user_tags = {!! json_encode(Auth::user()->tags) !!};

			@else 
				var user_tags = {!! json_encode([]) !!};
			@endif;

				  tags_typeahead.tagsinput({
				      freeInput: false,
				      //maxTags: 1,
				      trimValue: true,
				      //tagClass: 'label label-primary',
				      itemValue: function(item) {
				          return item.id;
				      },
				      itemText: function(item) {
				          return item.name;
				      },
				      typeaheadjs: [
				        {
				          minLength: 2,
				          hint: false, //url(1) == 'j' ? false : true,
				          //source: tags,
				          highlight: true
				        },
				        {
				         name: 'tags',
				         displayKey: 'name',
				         source: tags_bloodhound.ttAdapter(),
				         limit: 10
				       }
				      ]
				  });

				for(var i = 0; i < user_tags.length; i++){
					tags_typeahead.tagsinput('add', user_tags[i]);
				}
*/



				 

	// Student Clubs
	var awards = new Bloodhound({
	  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
	  queryTokenizer: Bloodhound.tokenizers.whitespace,
	  remote: {
	    url: '/search/suggest-tags?q=%QUERY',
	    wildcard: '%QUERY',
	  }
	});

	//awards = tags_bloodhound;

	awards.initialize();

	var elt_awards = $('.tags-typeahead'); //$('.awards');

	//elt_awards = tags_typeahead;

	elt_awards.tagsinput({
	  //tagClass: 'label label-primary',
	  trimValue: true,
	  freeInput: true,
	  itemValue: function (item) {
	    return item.id;
	  },
	  itemText: function(item) {

	    return item.name;
	  },
	  typeaheadjs: [
	    {
	      //minLength: 0,
	      //hint: true,
	      //source: skills,
	      highlight: true
	    },
	    {
	     name: 'awards',
	     displayKey: 'name',
	     source: awards.ttAdapter(),
	     limit: 10,
	     templates: {
	       suggestion: Handlebars.compile(['<div>',
	                                         '<div>@{{name}}</div>',
	                                         '',
	                                     '</div>'].join('\n')),
	       empty: Handlebars.compile(['<div style="font-size: 14px; line-height: 12px; padding: 3px 10px;">',
	                                   'Press enter to add this keyword',
	                                   '</div>'].join('\n'))
	      }
	    }
	  ]

	});


	for(var i = 0; i < user_tags.length; i++){
		elt_awards.tagsinput('add', user_tags[i]);
	}

	elt_awards.on('beforeFreeInputItemAdd', function(event) {

		console.log('beforeFreeInputItemAdd');
		console.log(event);
	    $.newTagIds_forThisElement==undefined ? $.newTagIds_forThisElement = [1000] : "";
	    lastId = $.newTagIds_forThisElement.pop();
	    $.newTagIds_forThisElement.push(lastId);
	    $.newTagIds_forThisElement.push(lastId+1);
	    event.item = {'name': event.item, 'id': 'new-'+String(lastId+1)};
	    event.cancel = false;
	}).on('itemAdded', function (event) {

	  //$('.awards_holder').val(JSON.stringify(elt_awards.tagsinput('items')));
	}).on('itemRemoved', function (event) {
	  //$('.awards_holder').val(JSON.stringify(elt_awards.tagsinput('items')));
	});







		});
	</script>
@endsection
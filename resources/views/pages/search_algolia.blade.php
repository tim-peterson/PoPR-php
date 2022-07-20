

@extends('spark::layouts.app')

@section('content')

<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">

  <!-- had to comment out because laravel scout won't work with laravel 5.3 and PHP7.2 which is what is on Forge server-->
  <div class="form-group" style="padding:0.5rem;">
    <input class="form-control" type="text" id="algolia-searchBox">
       <span > by <img style="width:48px;" src="/img/algolia-logo-light.png"/></span>
   
  </div>
  <div id="categories"></div>

  <div id="algolia-teams"></div>

  <div id="pagination-container"></div>
  </div>

</div>
</div>
</div>
@endsection





@section('scripts-footer')
<script src="https://cdn.jsdelivr.net/npm/instantsearch.js@2/dist/instantsearch.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/instantsearch.js@2/dist/instantsearch.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/instantsearch.js@2/dist/instantsearch-theme-algolia.min.css" rel="stylesheet">

<script>

$(document).ready(function(){


  var algolia_search = instantsearch({
  appId: "{{ config('scout.algolia.id') }}",
  apiKey: "{{ env('ALGOLIA_SEARCH') }}",
  indexName: 'teams',
  searchFunction : function(helper) {

    if (helper.state.query === '') {
      return;
    }

    helper.search();
  }
});


algolia_search.addWidget({
  render: function(data) {
    

    var d = data.results.hits;
    var l = d.length;

    console.log(d);
    for(var i = 0; i < l; i++){
      var arr = d[i].created_at.split(' ');

      d[i].created_at = arr[0];

      if(d[i].photo_url.indexOf('biorxiv') > -1){
        d[i].preprint_source = 'Biorxiv';
      }
      else d[i].preprint_source = 'Arxiv';
    }


      return data;
  }
});

algolia_search.addWidget(instantsearch.widgets.hits({
  container: '#algolia-teams',
  templates: {
   empty: '<div class="text-center">No results found matching <strong>@{{query}}</strong>.</div>',

    //item: '@{{{_highlightResult.title.value}}}'
    item: '<div style="margin: 1.5rem 0rem;"><h4 style="padding: 0.5rem;margin-bottom:0"><a data-toggle="collapse" href="#team-@{{objectID}}"> @{{{_highlightResult.name.value}}}</a></h4><p><small style="padding: 0.5rem;">@{{ created_at }} | <a target="_blank" href="@{{{ photo_url}}}"><span class="alert" style="padding:1rem 0.5rem;">@{{ preprint_source }} link</span></a>|<a href="/manuscripts/@{{objectID}}/review"><span class="alert" style="padding:1rem 0.5rem">Write review</span></a></small></p> <p class="collapse" id="team-@{{objectID}}">@{{{_highlightResult.description.value}}}</p></div>'

  },
}));



algolia_search.addWidget(instantsearch.widgets.searchBox({
  container: document.querySelector('#algolia-searchBox'),
  placeholder: 'Search for manuscripts',
  //urlSync: true
}));



algolia_search.addWidget(
  instantsearch.widgets.pagination({
    container: '#pagination-container',
    maxPages: 20,
    // default is to scroll to 'body', here we disable this behavior
    scrollTo: false,
    showFirstLast: false,
  })
);


algolia_search.addWidget(
  instantsearch.widgets.menu({
    container: '#categories',
    attributeName: 'hierarchicalCategories.lvl0',
    limit: 10,
    templates: {
      header: 'Categories'
    }
  })
);


algolia_search.start();

});
</script>
@endsection
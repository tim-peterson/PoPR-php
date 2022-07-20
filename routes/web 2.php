<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@show');

Route::get('/about', 'WelcomeController@about');

Route::get('/home', 'HomeController@show');

Route::get('/biorxiv', 'HomeController@biorxiv');

Route::get('/donate', 'SubscriptionsController@show');

Route::post('/subscriptions', 'SubscriptionsController@store');


Route::get('/algolia', 'SearchController@algolia');

Route::get('/search', 'SearchController@store');

Route::get('/manuscript/{id}', 'TeamController@show');

Route::get('/awardees', 'WinnersController@show');

Route::get('article', 'ArticleController@index');
Route::post('article', 'ArticleController@store');


Route::get('user-tags', 'UserTagsController@index');

Route::post('user-tags', 'UserTagsController@store');





//http://itsolutionstuff.com/post/simple-tags-system-example-in-laravel-5example.html
/*Route::get('/', function () {
    return view('spark::welcome');
});*/





//Route::get('/settings/'.Spark::teamString().'/member', 'Settings\Teams\TeamMemberController@show');


Route::get('/activity', 'ActivityController@index');

Route::get('/foo', function(){

	/*$user = \Auth::user();

	return $user->reviews;

	return $user->roleOn($user->currentTeam);*/

	//$team = \App\Team::find(3);
	//return $team->manuscript_id;

	//return $team;
	 //dd($team->reviews);


        $manuscripts_under_review = \App\Team::where('created_at', '>', \Carbon\Carbon::now()->subMonth())->get();


        $manuscripts_under_review->load('reviews');

        $users = \App\User::all();

        foreach($manuscripts_under_review as $m){

            $m->total_score = 0;

            foreach($m->reviews as $review){

                $m->total_score = $m->total_score+$review->originality+$review->rigor+$review->impact;
            }

        }

        $manuscripts_under_review = $manuscripts_under_review->sortByDesc('total_score');
       

        foreach($manuscripts_under_review as $m){
        	print_r($m->name.'-'.$m->total_score);
        	echo '<br>';

        }
        //return $manuscripts_under_review;
	
});



Route::group(['middleware' => 'auth'], function () {

   // Route::get('/api/reviews/{id}', 'API\ReviewsController@show');


    Route::put('/settings-update/'.\Spark::teamString().'s/{team}/members/{team_member}', 'Settings\Teams\TeamMemberController@update');

    Route::get('/'.\Spark::teamString().'s/{team}/review', 'TeamController@reviewCurrentTeam');


    Route::resources([
        //'manuscripts' => 'ManuscriptsController',
      //  'reviews' => 'ReviewsController',
    ]);

    $teamString = \Spark::teamString();

    $pluralTeamString = str_plural(\Spark::teamString());


});





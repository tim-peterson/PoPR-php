<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register the API routes for your application as
| the routes are automatically authenticated using the API guard and
| loaded automatically by this application's RouteServiceProvider.
|
*/

Route::group([
    'middleware' => 'auth:api'
], function () {
    //

    //Route::get('/reviews', 'API\ReviewsController@all');
   // Route::post('/reviews', 'API\ReviewsController@store');

    //Route::post('/reviews/{review}', 'API\ReviewsController@update');

    //Route::delete('/reviews/{review}', 'API\ReviewsController@destroy');

   // Route::get('/activity', 'API\ActivityController@all');

    //Route::resource('sites', 'SitesController', ['except' => ['create', 'edit']]);

});



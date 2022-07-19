<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TwitterController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});
*/
use App\Http\Controllers\CompanyCRUDController;

Route::resource('/companies', CompanyCRUDController::class);


use App\Http\Controllers\ProjectController;

Route::resource('/', ProjectController::class);



use App\Http\Controllers\MainController;

Route::get('login', [MainController::class, 'index'])->name('login');

//Route::get('login', ['as' => 'login', 'uses' => 'MainController@index']);



Route::post('post-login', [MainController::class, 'postLogin']);
Route::get('registration', [MainController::class, 'registration']);
Route::post('post-registration', [MainController::class, 'postRegistration']);
Route::get('dashboard', [MainController::class,'dashboard']);
Route::get('logout', [MainController::class,'logout']);


Route::get('/login/twitter', [App\Http\Controllers\TwitterController::class, 'redirectToTwitter'])->name('login.twitter');
Route::get('/login/twitter/callback', [App\Http\Controllers\TwitterController::class, 'handleTwitterCallback']);
//Facebook



use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

Route::get('/auth/redirect', function () {
    return Socialite::driver('twitter')->redirect();
});

Route::get('/auth/callback', function () {
    $user = Socialite::driver('twitter')->user();


    $user = User::updateOrCreate([
       // 'github_id' => $githubUser->id,
    ], [
        'name' => $githubUser->name,
        'email' => $githubUser->email,
       // 'github_token' => $githubUser->token,
        //'github_refresh_token' => $githubUser->refreshToken,
    ]);

    Auth::login($user);

    return redirect('/dashboard');


    // $user->token
});



Route::get('auth/twitter', [TwitterController::class, 'loginwithTwitter']);
Route::get('auth/callback/twitter', [TwitterController::class, 'cbTwitter']);


//Route::get('url', 'controller@method')->middleware('auth:api');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


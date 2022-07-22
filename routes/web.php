<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TwitterController;
use Illuminate\Http\Request;

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


//use Mail;

Route::get('/test-email', function () {

    $data = array('name'=>"Virat Gandhi");
    Mail::send('emails.keywords_found-copy', $data, function($message) {
       $message->to('petersontimr@gmail.com', 'Tutorials Point')->subject
          ('Laravel HTML Testing Mail');
       $message->from('tim@proofofpeer.review',"Tim Peterson"); # 'Virat Gandhi'
    });
    echo "HTML Email Sent. Check your inbox.";
});



use App\Models\Project;
Route::get('/', function () {


    $items = Project::where('created_at', '>=', \Carbon\Carbon::now()->startOfMonth())->orderBy('created_at', 'desc')->paginate(30);

    //$data['projects'] = Project::orderBy('id','desc')->paginate(5);
    return view('pages._biorxiv', compact('items'));

    //return view('projects.index');
});




Route::get('/algolia', 'SearchController@algolia');

Route::get('/search', 'SearchController@store');

Route::get('/manuscript/{id}', 'TeamController@show');

Route::get('/awardees', 'WinnersController@show');

Route::get('article', 'ArticleController@index');
Route::post('article', 'ArticleController@store');


Route::get('user-tags', 'UserTagsController@index');

Route::post('user-tags', 'UserTagsController@store');


use Illuminate\Support\Facades\Auth;

Route::get('/test-stripe',function(Request $request){

        //$user = Auth::user();
        //return view('payments.update-payment-method', [ 'intent' => Auth::user()->createSetupIntent()]);

        return Auth::user()->checkout(['price_1LO4cxGcjw5X7MJYQSgP77r3' => 1], [
            'success_url' => $YOUR_DOMAIN . '/payment-success',
            'cancel_url' => $YOUR_DOMAIN . '/stripe-cancel',

            'success_url' => route('payment-success').'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('stripe-cancel'),

        ]);


 });


 Route::get('/payment-success', function (Request $request) {
    $checkoutSession = Auth::user()->stripe()->checkout->sessions->retrieve($request->get('session_id'));

    dd($checkoutSession);

    return view('payments.success', ['checkoutSession' => $checkoutSession]);
})->name('payment-success');


Route::post('/create-checkout-session',function(){


     require '../vendor/autoload.php';
     \Stripe\Stripe::setApiKey(env("STRIPE_SECRET"));

     header('Content-Type: application/json');

     $YOUR_DOMAIN = 'http://localhost:8000';

     $checkout_session = \Stripe\Checkout\Session::create([
       'line_items' => [[
         # TODO: replace this with the `price` of the product you want to sell
         'price' => "price_1LO4cxGcjw5X7MJYQSgP77r3", //$250
         'quantity' => 1,
       ]],
       'payment_method_types' => [
         'card',
       ],
       'mode' => 'payment',
       'success_url' => $YOUR_DOMAIN . '/stripe-success',
       'cancel_url' => $YOUR_DOMAIN . '/stripe-cancel',
     ]);

     header("HTTP/1.1 303 See Other");
     header("Location: " . $checkout_session->url);
 });

 Route::get('/stripe-success', function (Request $request) {

    dd($request);
})->name('stripe-stripe-success');




Route::get('/stripe-cancel', function (Request $request) {

    dd("cancel");
})->name('stripe-cancel');


use App\Http\Controllers\ReviewController;

Route::resource('/reviews', ReviewController::class);


Route::get('/about', function () {

    return view('pages.about');
});


Route::get('/donate', function () {

    return view('pages.donate');
});


use App\Http\Controllers\PaymentsController;

Route::post('/charge/{project_id}', [PaymentsController::class, 'charge']);

Route::get('/donate', [PaymentsController::class, 'show']);

Route::post('/subscriptions', [PaymentsController::class, 'donate']);



Route::get('stripe/webhook', [PaymentsController::class, 'stripeWebhook']);



use App\Http\Controllers\CompanyCRUDController;
Route::resource('/companies', CompanyCRUDController::class);


use App\Http\Controllers\ProjectController;
Route::resource('/projects', ProjectController::class);
Route::get('/projects/{project}/review', [ProjectController::class, 'reviewCurrentProject']);


Route::get('/review/{project}/new', [ReviewController::class, 'create']);
Route::get('/review/{project}/edit/{review}', [ReviewController::class, 'show']);

Route::post('/review/{project}/edit/', [ReviewController::class, 'store']);
Route::post('/reviews/{review}', [ReviewController::class, 'update']);






use App\Http\Controllers\MainController;
Route::get('login', [MainController::class, 'index'])->name('login');
Route::get('register', [MainController::class, 'registration'])->name('register');

Route::post('post-login', [MainController::class, 'postLogin']);
Route::get('registration', [MainController::class, 'registration']);
Route::post('post-registration', [MainController::class, 'postRegistration']);
Route::get('dashboard', [MainController::class,'dashboard']);
Route::get('logout', [MainController::class,'logout']);


Route::get('/me', [UserController::class, 'index']);

//Route::get('login', ['as' => 'login', 'uses' => 'MainController@index']);





Route::get('/login/twitter', [App\Http\Controllers\TwitterController::class, 'redirectToTwitter'])->name('login.twitter');
Route::get('/login/twitter/callback', [App\Http\Controllers\TwitterController::class, 'handleTwitterCallback']);
//Facebook


/*
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

/*
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

*/

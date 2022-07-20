<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class SubscriptionsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        //$this->middleware('subscribed');
    }

    public function show()
    {

        return view('subscribe');

    }

    public function store(Request $request)
    {

        if($request->bitcoin=="1"){


            $source = \Stripe\Source::create(array(
              "type" => "bitcoin",
              "amount" => $request->input('amount'),
              "currency" => "usd",
              "owner" => array(
                "email" => $request->input('email')
              )
            ));

            //TO-DO: need to implement a source.chargeable webhook in order to charge the source, must be done within 6hrs of creating the source. 
            // https://stripe.com/docs/sources/bitcoin
        }
        else{
            $this->validate($request, [
            'stripe_token' => 'required',
            'email' => 'required',
            'amount' => 'required',
            'one_time_charge' => 'required'
            ]);
        }


        $user = \App\User::where('email', $request->input('email'));

        $amount = $request->input('amount');
        //$amount =  1000;


        if($request->input('one_time_charge')=='0'){
            if($amount==100) $stripe_plan = "Bronze"; 
            else if($amount==1000) $stripe_plan = "Silver"; 
            else if($amount==10000) $stripe_plan = "Gold"; 
            else if($amount==100000) $stripe_plan = "Platinum";  
            else $stripe_plan = "Free";             
        }
        else{
            $stripe_plan = "Free"; 
        }

        $stripe_token = $request->input('stripe_token');

        if (!$user->exists()) {
           // user found
            $user = new \App\User;

            $human_password = str_random(8);
            $password = \Hash::make($human_password);
 
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = $password;
           // $user->remember_token => str_random(20)
            $user->save();

            //https://stackoverflow.com/questions/29173028/how-to-send-mail-after-laravel-5-default-registration

            /*$user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => \Hash::make($data['password']),
                //generates a random string that is 20 characters long
                'verification_code' => str_random(20)
            ]);*/

            //dd($stripe_plan);

            $user->newSubscription('default', $stripe_plan)->create($stripe_token);            
            //$user->newSubscription($stripe_plan, $stripe_plan)->create($stripe_token);

            //event(new \Laravel\Spark\Events\Subscription\UserSubscribed($user, $stripe_plan, $fromRegistration=false)); // performs same task as below

            $user->current_billing_plan = $stripe_plan;            
            $user->save();

            // \Auth::login($user);
            $user->human_password = $human_password;

            event(new \Laravel\Spark\Events\Auth\UserRegistered($user));

            /*if(\Auth::attempt(['email' => $user->email, 'password' => $human_password])){
        
            }*/
        }
        else {
            $user = $user->first();

            $user = \App\User::find($user->id);
            //$user->subscription($user->current_billing_plan)->swap($stripe_plan);

            if ($user->subscribed('default')) {
                $user->subscription('default')->swap($stripe_plan);
            }
            else{
              $user->newSubscription('default', $stripe_plan)->create($stripe_token);            
            }

            //event(new \Laravel\Spark\Events\Subscription\UserSubscribed($user, $stripe_plan, $fromRegistration=false));

            $user->current_billing_plan = $stripe_plan;            
            $user->save();

            // \Auth::login($user);
            //$user->subscription()->swap($stripe_plan); // NOTE: 12/25/17 this doesn't work, says can't swap on null

        } 


        if($stripe_plan=='Free') $user->charge($amount);

        //$user->stripe_id = $stripe_plan;

        
       /* $user->current_billing_plan = $stripe_plan;

        $user->card_last_four = $request->input('card')['last4'];
        $user->card_brand = $request->input('card')['brand'];*/

        //$user->save();
                        
        return 'no issues';
       // return redirect('/')->withSuccess('You are now subscribed.');
    }
}
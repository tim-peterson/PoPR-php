<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class PaymentsController extends Controller
{
    //
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function stripeWebhook(Request $request)
    {
        dd($request);

    }

    public function charge(Request $request, $project_id)
    {

        Stripe::setApiKey(env('STRIPE_SECRET'));

        if(is_null(Auth::user()->stripe_id) ){
            //dd($request->all());
            try {
                Stripe::setApiKey(env('STRIPE_SECRET'));

                $customer = Customer::create(array(
                    'email' => $request->stripeEmail,
                    'source' => $request->stripeToken
                ));

                $charge = Charge::create(array(
                    'customer' => $customer->id,
                    'amount' => 25000,
                    'currency' => 'usd'
                ));

                if($request->stripeEmail!=Auth::user()->email){

                }

                $user = Auth::user();

                $user->stripe_id = $customer->id;

                $user->pm_last_four = $charge->payment_method_details->card->last4;

                $user->pm_type = $charge->payment_method_details->card->brand;

                $user->save();


                $project = Project::find($project_id);

                $project->paid = 25000;
                $project->save();

                return 'Charge successful, you get the course!';
            } catch (\Exception $ex) {
                return $ex->getMessage();
            }

        }
        else{

            try {

                $charge = Charge::create(array(
                    'customer' => Auth::user()->stripe_id,
                    'amount' => 1999,
                    'currency' => 'usd'
                ));

                return 'Charge successful, you get the course!';
            } catch (\Exception $ex) {
                return $ex->getMessage();
            }

        }


    }


}

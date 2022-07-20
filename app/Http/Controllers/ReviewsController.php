<?php

namespace App\Http\Controllers;

//use Laravel\Spark\Team as SparkTeam;
//use App\Mail\ReviewRequested;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class ReviewsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('subscribed');
    }

    /**
     * Display the task list screen.
     *
     * @return Response
     */
    public function index()
    {
        return view('home');
    }


        /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create($project_id)
    {


    return view('reviews.create', $project_id);
    }


    /**
     * Ship the given order.
     *
     * @param  Request  $request
     * @param  int  $orderId
     * @return Response
     */
    public function ship(Request $request, $orderId)
    {
        $manuscript = SparkTeam::findOrFail($orderId);

        // Ship order...

        $message = (new ReviewRequested($order))
                        //->onConnection('sqs')
                        ->onQueue('emails');

        Mail::to($request->user())
            //->cc($moreUsers)
            //->bcc($evenMoreUsers)
            ->queue($message);


        //Mail::to($request->user())->queue(new OrderShipped($manuscript));
        //->send(new ReviewRequested($manuscript));
    }
}

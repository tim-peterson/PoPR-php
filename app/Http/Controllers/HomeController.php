<?php

namespace App\Http\Controllers;

//use Laravel\Spark\Team as SparkTeam;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        // $this->middleware('subscribed');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function show()
    {


    //$entries = \App\Fileentry::all();
    //$entries = SparkTeam::all();

    //$reviews_published = \App\User::has('reviews')->get();

    //http://simplepie.org/wiki/


    //$feed = \Feeds::make('http://connect.biorxiv.org/biorxiv_xml.php?subject=all');


    //$items = $feed->get_items();

    $items = \App\Team::where('created_at', '>=', \Carbon\Carbon::now()->startOfMonth())->orderBy('created_at', 'desc')->paginate(30);
    //dd($feed->get_items());
    //\Laravel\Spark\Team::where('created_at', '<', \Carbon\Carbon::now()->subMonth())->get();
   // dd($entries);
    //return view('fileentries.index', compact('entries'));

   // return view('home', compact('reviews_published', 'items'));
    return view('home', compact('items'));


    }
}

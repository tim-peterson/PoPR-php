<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class SearchController extends Controller
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


    public function algolia(Request $request)
    {


        
        return view('pages.search_algolia');

    }


    public function store(Request $request)
    {


       /*$results = \DB::raw('select * from teams where created_at >='. \Carbon\Carbon::now()->startOfMonth().' and (name like %' . $request->input('search_query') . '% or description like %' . $request->input('search_query') . '%) order by created_at desc');

       $items = \App\Team::hydrate($results);

       $items->paginate(30);*/


         $items = \App\Team::where('created_at', '>=', \Carbon\Carbon::now()->startOfMonth())
            ->where(function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->input('search_query') . '%')
                ->orWhere('description', 'like', '%' . $request->input('search_query') . '%');
               })
            ->orderBy('created_at', 'desc')
            ->paginate(30);


/*        $items = \App\Team::where('created_at', '>=', \Carbon\Carbon::now()->startOfMonth())->where('name', 'like', '%' . $request->input('search_query') . '%')->orWhere('description', 'like', '%' . $request->input('search_query') . '%')->orderBy('created_at', 'desc')->paginate(30);
*/
        $items->setPath('/search?_token='.$request->input('_token').'&search_query='.$request->input('search_query'));

        return view('home', compact('items'));

    }


}
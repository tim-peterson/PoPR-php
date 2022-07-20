<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Show the application splash screen.
     *
     * @return Response
     */
    public function show()
    {


        $items = \App\Team::where('created_at', '>=', \Carbon\Carbon::now()->startOfMonth())->orderBy('created_at', 'desc')->paginate(30);


        return view('welcome', compact('items'));
    }


    public function about()
    {

        
        return view('pages.about');
    }

}

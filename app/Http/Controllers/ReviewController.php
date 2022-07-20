<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Project;

class ReviewController extends Controller
{
    //

        /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
    $data['reviews'] = Review::get()->all();
    //return view('reviews.index', $data);
    return view('reviews.create', $data);
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create($project_id)
    {

    $project = Project::where('id', $project_id)->first();

    return view('reviews.create', compact('project'));
    }
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {

    $request->validate([
        'project_id' => 'required',
    'title' => 'required',
    'description' => 'required',
    //'address' => 'required'
    ]);


    $review = new Review;

    $review->user_id = \Auth::id();
    $review->project_id = $request->project_id;
    $review->title = $request->title;
    $review->description = $request->description;

   // $review->address = $request->address;
    $review->save();
    return redirect()->route('/review/'.$request->project_id.'/edit/'.$review->id)
    ->with('success','Review has been created successfully.');
    }
    /**
    * Display the specified resource.
    *
    * @param  \App\review  $review
    * @return \Illuminate\Http\Response
    */
    public function show(Project $project, Review $review)
    {

       // return "foo";

    //$project = Project::get($project)->first();
    //$review = Review::get($review)->first();
    //return view('reviews.index', $data);

    return view('reviews.show',compact('project', 'review'));
    }
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Review  $review
    * @return \Illuminate\Http\Response
    */
    public function edit(Review $review)
    {
    return view('reviews.edit',compact('review'));
    }
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\review  $review
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
    $request->validate([
    'name' => 'required',
    'email' => 'required',
    'address' => 'required',
    ]);
    $review = Review::find($id);
    $review->name = $request->name;
    $review->email = $request->email;
    $review->address = $request->address;
    $review->save();
    return redirect()->route('reviews.index')
    ->with('success','Review Has Been updated successfully');
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Review  $review
    * @return \Illuminate\Http\Response
    */
    public function destroy(Review $review)
    {
    $review->delete();
    return redirect()->route('reviews.index')
    ->with('success','Review has been deleted successfully');
    }

}

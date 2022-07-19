<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    //

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
    //$data['projects'] = Project::orderBy('id','desc')->paginate(5);
    //return view('projects.index', $data);
    return view('projects.create');
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
    return view('projects.create');
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
    'name' => 'required',
    'email' => 'required',
    //'address' => 'required'
    ]);
    $project = new Project;


    $uploadedFile = $request->file('name');
    $filename = time().$uploadedFile->getClientOriginalName();

    Storage::disk('s3')->putFileAs(
      'files/'.$filename,
      $uploadedFile,
      $filename
    );


    //Storage::disk('s3')->put('avatars/1', $request->name);


    $project->name = $filename;
    $project->email = $request->email;
    $project->s3_link = 'files/'.$filename;

   // $project->address = $request->address;
    $project->save();
    return redirect()->route('index')
    ->with('success','Project has been created successfully.');
    }
    /**
    * Display the specified resource.
    *
    * @param  \App\project  $project
    * @return \Illuminate\Http\Response
    */
    public function show(Project $project)
    {
    return view('projects.show',compact('project'));
    }
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Project  $project
    * @return \Illuminate\Http\Response
    */
    public function edit(Project $project)
    {
    return view('projects.edit',compact('project'));
    }
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\project  $project
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
    $request->validate([
    'name' => 'required',
    'email' => 'required',
    'address' => 'required',
    ]);
    $project = Project::find($id);
    $project->name = $request->name;
    $project->email = $request->email;
    $project->address = $request->address;
    $project->save();
    return redirect()->route('projects.index')
    ->with('success','Project Has Been updated successfully');
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Project  $project
    * @return \Illuminate\Http\Response
    */
    public function destroy(Project $project)
    {
    $project->delete();
    return redirect()->route('projects.index')
    ->with('success','Project has been deleted successfully');
    }

}

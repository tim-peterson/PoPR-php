<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Review;
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
        $projects = Project::where('created_at', '>=', \Carbon\Carbon::now()->startOfMonth())->orderBy('created_at', 'desc')->paginate(30);

    //$data['projects'] = Project::orderBy('id','desc')->paginate(5);
    return view('projects', compact('projects'));
    //return view('projects.create');
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
    'description' => 'required',
    'title' => 'required',
    'link' => 'required'
    ]);

    $project = new Project;

/*    $uploadedFile = $request->file('file');
    $filename = time().$uploadedFile->getClientOriginalName();

    Storage::disk('s3')->putFileAs(
      'files/'.$filename,
      $uploadedFile,
      $filename
    );

    $project->file = $filename;
    $project->s3_link = 'files/'.$filename;
*/
    $project->title = $request->title;
    $project->link = $request->link;
   // $project->file = $request->link;
   // $project->email = $request->link;
    $project->description = $request->description;
   // $project->email = $request->email;


   // $project->address = $request->address;
    $project->save();
    return redirect()->route('projects.index')
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
    'link' => 'required',
    'title' => 'required',
    'description' => 'required',
    ]);
    $project = Project::find($id);
    $project->link = $request->link;
    $project->title = $request->title;
    $project->description = $request->description;
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



    /**
     * Switch the current team the user is viewing.
     *
     * @param  Request  $request
     * @param  \Laravel\Spark\Team  $team
     * @return Response
     */
    public function reviewCurrentProject(Request $request, $project)
    {

         $user = \Auth::user();
            if(!$user){
                return redirect('/login');
            }

            $myProject = Project::where("id", $project)->where("user_id", $user->id)->first();

            if(is_null($myProject)){

                $myReview = Review::where("project_id", $project)->where("user_id", $user->id)->first();

                if(is_null($myReview)){
                    return redirect('/review/'.$project.'/new');
                }
                return redirect('/review/'.$project.'/edit');
            }
            else{
                return 'Cant review own project';

                return redirect('/');
            }


          if($request->user()->id ->onTeam($team)==false)
/*        if($request->user()->onTeam($team)==false){

            $team->users()->attach($request->user(), [
                'role' => 'reviewer',
                'comment' => '',
                'significance' => null,
                'innovation' => null,
                'investigator' => null,
                'approach' => null,
                'environment' => null,
                'overall' => null,
                'accept' => null,
                'created_at' => \Carbon\Carbon::now()
            ]);

            event(new \Laravel\Spark\Events\Teams\TeamMemberAdded($team, $request->user()));

            $team_user = $team->users();

            foreach($team_user as $user){
                if($user->id==$request->user()->id){
                    $request->user()->switchToTeam($team);
                    break;
                }
            }


        }
        else $request->user()->switchToTeam($team);
*/

        return redirect('/reviews/'.$project); //back();

        //return redirect('/settings/manuscripts/'.$team->id.'#/membership'); //back();


    }

}

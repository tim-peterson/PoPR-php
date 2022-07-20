<?php

namespace App\Http\Controllers;

//use Laravel\Spark\Team as SparkTeam;
use Illuminate\Http\Request;


class TeamController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('auth',['except' => 'show']);

        // $this->middleware('subscribed');
    }


    /**
     * Show the application splash screen.
     *
     * @return Response
     */
    public function show(Request $request, $id)
    {

        $team = \App\Team::where('id', $id)->firstOrFail();;

        //dd($team);

        return view('pages.team', compact('team'));
    }



    /**
     * Switch the current team the user is viewing.
     *
     * @param  Request  $request
     * @param  \Laravel\Spark\Team  $team
     * @return Response
     */
    public function reviewCurrentTeam(Request $request, $team)
    {

        if($request->user()->onTeam($team)==false){

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
        

        return redirect('/settings/manuscripts/'.$team->id.'#/membership'); //back();


    }



    /*Spark::swap('TeamController@switchCurrentTeam', function (Request $request, $team) {


    });*/
}

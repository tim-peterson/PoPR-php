<?php


namespace App\Http\Controllers\Settings\Teams;

use Illuminate\Http\Request;
use Laravel\Spark\Http\Controllers\Controller;
use Laravel\Spark\Events\Teams\TeamMemberRemoved;
use Laravel\Spark\Http\Requests\Settings\Teams\RemoveTeamMemberRequest;
use Laravel\Spark\Contracts\Interactions\Settings\Teams\UpdateTeamMember;



class TeamMemberController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Update the given team member.
     *
     * @param  Request  $request
     * @param  \Laravel\Spark\Team  $team
     * @param  mixed  $member
     * @return Response
     */
    public function update(Request $request, $team, $member)
    {
        //abort_unless($request->user()->ownsTeam($team), 404);

        $this->interaction($request, UpdateTeamMember::class, [
            $team, $member, $request->all()
        ]);
    }



    /**
     * Get the available team member roles.
     *
     * @return Response
     */
    /*public function show()
    {
        

        $member = \App\TeamUser::find(Auth:id());

        return response()->json($member);
    }*/
}

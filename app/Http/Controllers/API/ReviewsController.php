<?php

namespace App\Http\Controllers\API;

use App\Review;
use Illuminate\Http\Request;
use App\Events\ReviewCompleted;
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
        $this->middleware('auth:api');
        $this->middleware('subscribed');
    }

    /**
     * Get all of the reviews.
     *
     * @return Response
     */
    public function all(Request $request)
    {
        return $request->user()->reviews;
    }


    /**
     * Get all of the reviews.
     *
     * @return Response
     */
    public function show(Request $request, $id)
    {
       // dd('why');

        
        $review = \App\Review::where('id', $id)->first();

        //abort_unless($request->user()->reviews, 404);

        return view('settings.reviews.review-settings', compact('review'));

        //return 

        //return $request->user()->reviews;
    }


    /**
     * Create a new Reviews.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required|max:2000',
            'originality' => 'required|between:1,10|not_in:-- Choose --',
            'rigor' => 'required|between:1,10|not_in:-- Choose --',
            'impact' => 'required|between:1,10|not_in:-- Choose --',
            'accept' => 'required|boolean'
        ]);

        $sender = $user = $request->user();

        $review = $user->reviews()->create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => $user->id,
            'team_id' => $user->currentTeam->id,
            'originality' => $request->originality,
            'rigor' => $request->rigor,
            'impact' => $request->impact,
            'accept' => $request->accept,

        ]);

        event(new ReviewCompleted($user, $review, $user->currentTeam));


    }


    /**
     * Create a new Reviews.
     *
     * @return Response
     */
    public function update(Request $request, Review $review)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required|max:2000',
            'originality' => 'required|between:1,10',
            'rigor' => 'required|between:1,10',
            'impact' => 'required|between:1,10',
            'accept' => 'required|boolean'
        ]);

      
       // $user = $request->user();

        $review->update([
            'name' => $request->name,
            'description' => $request->description,
            //'user_id' => $user->id,
           // 'team_id' => $user->currentTeam->id,
            'originality' => $request->originality,
            'rigor' => $request->rigor,
            'impact' => $request->impact,
            'accept' => $request->accept,

        ]);
    }
    /**
     * Destroy the given review.
     *
     * @param  Request  $request
     * @param  Reviews  $review
     * @return Response
     */
    public function destroy(Request $request, Review $review)
    {
        abort_unless($request->user()->reviews->contains($review), 403);


        $review->delete();


    }
}

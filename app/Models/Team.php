<?php

namespace App;

use Laravel\Spark\Team as SparkTeam;

use Laravel\Scout\Searchable;

//use \Conner\Tagging\Taggable;


class Team extends SparkTeam
{
    //

    use Searchable;
    //use Taggable;

    protected $table = 'teams';

    protected $fillable = ['name', 'slug', 'description', 'description_lay', 'keywords', 'featured', 'published', 'review_requested', 'preprint_source', 'author_emails', 'prize_winners']; //

    /**
     * Get the team's reviews.
     *
     * @return Review
     */
    public function reviews()
    {

        return $this->hasMany(\App\Review::class)->orderBy('created_at', 'asc');

    }


    /**
     * Get all of the users that belong to the team.
     */
    public function users()
    {
        return $this->belongsToMany(
            \Spark::userModel(), 'team_users', 'team_id', 'user_id'
        )->withPivot(['role', 'comment', 'significance', 'innovation', 'environment', 'investigator', 'overall', 'approach']);
    }


    /**
     * Get all of the users that belong to the team.
     */
    public function team_users()
    {

        return $this->hasMany(\App\TeamUser::class);

        /*return $this->hasMany(
            \App\TeamUser, 'team_users', 'team_id', 'user_id'
        )->withPivot(['role', 'comment', 'significance', 'innovation', 'environment', 'investigator', 'overall', 'approach']);*/
    }


}

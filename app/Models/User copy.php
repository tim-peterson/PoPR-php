<?php

namespace App;

use Laravel\Spark\CanJoinTeams;
use Laravel\Spark\User as SparkUser;

//use \Conner\Tagging\Taggable;


class User extends SparkUser
{

   // use Taggable;

    use CanJoinTeams;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
    ];

    //public $table = "users";

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'authy_id',
        'country_code',
        'phone',
        'card_brand',
        'card_last_four',
        'card_country',
        'billing_address',
        'billing_address_line_2',
        'billing_city',
        'billing_zip',
        'billing_country',
        'extra_billing_information',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'trial_ends_at' => 'date',
        'uses_two_factor_auth' => 'boolean',
    ];


    /**
     * Get all of the user activity.
     */
    public function role()
    {
        return $this->roleOn($this->currentTeam);
        //return $this->hasOne(\Laravel\Spark::class)->orderBy('created_at', 'desc');
    }


    /**
     * Get all of the user's reviews.
     */
    public function reviews()
    {
        return $this->hasMany(\App\TeamUser::class)->orderBy('created_at', 'asc');
    }

    /**
     * Get all of the user activity.
     */
    public function activity()
    {
        return $this->hasMany(\App\Activity::class)->orderBy('created_at', 'desc');
    }

    /**
     * Get the user's tags.
     *
     * @return User
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'user_tag');
    }

    /**
     * Get the user's tags.
     *
     * @return User
     */
    public function team_tags()
    {
        return $this->belongsToMany('App\UserTeamTag', 'user_team_tag');
    }

    /**
     * Get a lists of tags ids associated with an user
     *
     * @return array
     */

    public function getTagListAttribute()
    {

        return $this->tags->lists('name', 'id');

    }



}

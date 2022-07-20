<?php

namespace App;

//use Laravel\Spark\CanJoinTeams;
//use Laravel\Spark\User as SparkUser;

use Illuminate\Database\Eloquent\Model;

class TeamUser extends Model
{

  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        /*'significance',
        'innovation',
        'investigator',
        'approach',
        'comment',
        'environment',
        'overall'*/
        //'email',
    ];

    protected $table = "team_users";

    //public $table = "users";

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];




}

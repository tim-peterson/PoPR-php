<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;
//use App\Model;
//use Carbon\Carbon;


class UserTag extends Model
{
    //use SoftDeletes;

    protected $table = 'user_tag';


    /*protected $fillable = [
      'email',
      'primary_email',
      'user_id',
      'confirmed',
      'confirmation_code'
    ];*/



    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }



}

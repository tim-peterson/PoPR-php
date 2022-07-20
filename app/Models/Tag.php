<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //



    /**
     * Get the user's skills.
     *
     * @return User
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'user_tag', 'user_id');
    }

   /* public static function insertIgnore($array){
        $a = new static();
        if($a->timestamps){
            $now = \Carbon\Carbon::now();
            $array['created_at'] = $now;
            $array['updated_at'] = $now;
        }
        \DB::insert('INSERT IGNORE INTO '.$a->table.' ('.implode(',',array_keys($array)).
            ') values (?'.str_repeat(',?',count($array) - 1).')',array_values($array));
    }*/

}

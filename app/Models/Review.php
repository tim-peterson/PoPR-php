<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'project_id', 'user_id', //'originality', 'rigor', 'impact', 'accept'
    ];

    protected $table = 'reviews';
    /**
     * Get the user that created the review.
     */
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }


    /**
     * Get the team that created the review.
     */
    public function project()
    {
        return $this->belongsTo(\App\Project::class, 'project_id');
    }


    /**
     * Get the team that created the review.
     */
    public static function findReviewers($keywords)
    {

        $keywords = trim($keywords);

        $keywords_arr = explode(',', $keywords);

        if(count($keywords_arr)==1){

           $keywords_arr = explode(' ', $keywords);
        }


         $results = [];

        foreach($keywords_arr as $keyword){

            $url = 'http://www.bing.com/search?q='.$keyword.'+university+faculty';

            $crawler = \Goutte::request('GET', $url);

              $urls = $crawler->filter('.b_algo > h2 > a')->links();
              //dd($urls);

              //; [['name' => 'Tim Peterson', 'email' => 'petersontimr@gmail.com']]

              foreach($urls as $url){

                    //dd($url->getUri());
                    $href = $url->getUri();

                    if(strpos($href, 'ncbi.nlm.nih.gov')===false){

                        \Goutte::request('GET', $href);
                          $url = $crawler->filter('body a')->first()->attr('mailto');
                          //dump($url);

                          $results[] = $url;
                    }

              }
        }



        return $results;
    }


}

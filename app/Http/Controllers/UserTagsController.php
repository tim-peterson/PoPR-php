<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Team;


class UserTagsController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $tags = \Auth::user()->tags();

        foreach($articles as $article){
            $article->title = $article->name;
            $article->body = $article->description;
        }

        return view('article',compact('articles'));
    }


    public function suggest_tags_obj(Request $request){

       $q = $request->input('q');

       if(is_numeric($q)) return '';


       $response = \DB::select('SELECT id, name
          FROM tags
          left join user_tag
          on tags.id=user_tag.tag_id
          WHERE name LIKE "%'.$q.'%"');

       return $response;

    }

    public function suggest_tags(Request $request){

       $q = $request->input('q');

       if(is_numeric($q)) return '';


       $response = \DB::select('SELECT name
          FROM tags
          left join user_tag
          on tags.id=user_tag.tag_id
          WHERE name LIKE "%'.$q.'%"');

       return $response;

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$this->validate($request, [
            //'tags' => 'required',
        ]);

       // dd($request->tags);

    	//$input = $request->all();
    	//$tags = explode(",", $request->tags);

        //dd(is_array($request->tags));

       // dd($request->tags);


        $user = \Auth::user();

        if (isset($request->tags)) {


            $tags = explode(',', $request->input('tags'));


            /*$tags_minus_s = [];
            foreach($tags as $tag){

                if (substr($tag, -1) == 's'){

                    $tags_minus_s[] = substr($tag, 0, -1);
                    
                }
                else $tags_minus_s[] = $tag;

            }*/

            //$tags = $request->input('tags');

            //dd($tags);
            //$existing_tags = \App\Tag::whereIn('name', $tags)->get('name')->to_array();


            $existing_tags_collection = \DB::table('tags')
              ->whereIn('name', $tags)
              ->pluck('name');

            $existing_tags = [];
            foreach($existing_tags_collection as $key => $value){
                $existing_tags[] = $value;
            }

            echo '$tags';
            print_r($tags);

            echo '$existing_tags';
            print_r($existing_tags);

            //dd($existing_tags);
            $new_tags = array_diff($tags, $existing_tags);

            echo 'new tags';
            print_r($new_tags);

            if(count($new_tags) > 0){
                $data = [];
                foreach($new_tags as $new_tag){
                    $data[] = ['name' => $new_tag];
                }
                \App\Tag::insert($data);                
            }

            $updated_tags_collection = \DB::table('tags')
              ->whereIn('name', $tags)
              ->pluck('id');

            //$updated_tags = \App\Tag::whereIn('name', $tags)->get('id')->to_array();

            $updated_tags = [];
            foreach($updated_tags_collection as $key => $value){
                $updated_tags[] = $value;
            }

            echo '$updated_tags';
            print_r($updated_tags);
            $user->tags()->sync($updated_tags);
        } else {
            $tags = [];
        }

        /*if (isset($request->tags)) {
            $tags = explode(',', $request->input('tags'));

            $user->tags()->sync($tags);
        } else {
            $tags = [];
        }*/


    	//$user = \Auth::user();
    	//$user->tag($tags);


        //return back()->with('success','Tags created successfully.');
    }
}
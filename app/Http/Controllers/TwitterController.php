<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Exception;
use Socialite;
use App\Models\User;



class TwitterController extends Controller
{


    //Google Login
    public function redirectToTwitter(){
    return Socialite::driver('twitter')->redirect();
    }

    //Google callback
    public function handleTwitterCallback(){

    $user = Socialite::driver('twitter')->stateless()->user();

      $this->_registerorLoginUser($user);
      return redirect()->route('home');
    }


    public function loginwithTwitter()
    {



        return Socialite::driver('twitter')->stateless()->redirect();
    }


    public function cbTwitter()
    {
        try {

            $user = Socialite::driver('twitter')->user();

            $userWhere = User::where('twitter_id', $user->id)->first();

            if($userWhere){

                Auth::login($userWhere);

                return redirect('/home');

            }else{
                $gitUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'twitter_id'=> $user->id,
                    'oauth_type'=> 'twitter',
                    'password' => encrypt('admin595959')
                ]);

                Auth::login($gitUser);

                return redirect('/home');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}

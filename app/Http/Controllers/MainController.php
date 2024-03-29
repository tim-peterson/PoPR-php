<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class MainController extends Controller
{

    public function index()
    {
        return view('login');
    }

    public function registration()
    {
        return view('registration');
    }

    public function postLogin(Request $request)
    {
        request()->validate([
        'email' => 'required',
        'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }
        return Redirect::to("login")->withSuccess('Oppes! You have entered invalid credentials');
    }

    public function postRegistration(Request $request)
    {
        request()->validate([
        //'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        ]);

        $data = $request->all();

        $check = $this->create($data);

        auth()->login($check);

        return Redirect::to("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }

    public function dashboard()
    {


      if(Auth::check()){

        $projects = Auth::user()->projects;
        $reviews = Auth::user()->reviews;


        return view('dashboard', compact('projects', 'reviews'));
      }
       return Redirect::to("login")->withSuccess('Opps! You do not have access');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['email'], //$data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }


}

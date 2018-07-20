<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;

use DB;
use  App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
  
    public function profile()
    {
        return view('profile');
    }
    public function control ()
    {
        if (auth::user()->roles == 3)
        {
            redirect('/');
        }
$users=DB::table('users')->get();

        return view('/control',compact('users'));
    }

    public function update(Request $request,User $user)
    {
      $user->update($request->all());
      
       return redirect('control'); 
    }
}

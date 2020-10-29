<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;


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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        if(auth::user()->user_type=='employer'){
            return redirect()->to('/company/dashboard');
        }
        if(auth::user()->user_type=='seeker'){
            return redirect()->to('/user/dashboard');
        }
        if(auth::user()->user_type=='admin'){
            return redirect()->to('/dashboard');
        }

        return view('home');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Company;
use Hash;

class EmployerRegisterController extends Controller
{


    public function employerRegister(Request $request){


        $this->validate($request,[ 
            'name'=>'required|string|max:255',
            'cname'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users', 
            'password'=>'required|string|min:6|confirmed',

        ]);

        $user = User::create([
            'name' => request('cname'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'user_type' => request('user_type')
        ]);
        Company::create([
            'user_id' => $user->id,
            'cname' => request('cname'),
            'email' => request('email'),
            'slug' => str_slug(request('cname')),
        ]);

        auth()->login($user);
        
        return redirect()->to('/home');
    }
}

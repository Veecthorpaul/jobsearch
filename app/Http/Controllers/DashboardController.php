<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Job;
use App\User;
use App\Category;
use App\Profile;

class DashboardController extends Controller
{
    public function index(){
      $candidates = User::where('user_type', 'seeker')->get();
      $employers = User::where('user_type', 'employer')->get();
      $categories = Category::all();
      $jobs = Job::all();

        return view('admin.index',compact('jobs', 'categories', 'employers','candidates'));
     }

     public function candidates(){
        $candidates = Profile::latest()->where('user_id', '!=', auth()->user()->id)->paginate(10);        
        return view('admin.candidates',compact('candidates'));
     }


     public function companies(){
        $companies = \DB::table('users')->where('user_type','employer')
        ->join('companies', 'companies.user_id', '=', 'users.id')
        ->select('users.name as name', 'users.email as email', 'companies.id as comid', 'companies.*')
        ->paginate(10);
        return view('admin.companies',compact('companies'));
     }

     public function jobs(){
        $jobs = Job::latest()->paginate(5);
        return view('admin.jobs',compact('jobs'));
    }


    public function categories(){
        $categories = Category::latest()->paginate(5);
        return view('admin.categories',compact('categories'));
    }

    public function changepassword(){
        return view('admin.changepassword');
    }

    public function adminchangepassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);
        $user = User::findOrFail(auth()->user()->id);
        if (password_verify($request->old_password, $user->password)) {
            $user->password = Hash::make($request->password);
            if ($user->save()) {
                return redirect()->back()->with('success', 'Password was changed successfully');
            }
        }else{
            return redirect()->back()->with('error', 'Password didn\'t match with the old password');
        }
    }


}

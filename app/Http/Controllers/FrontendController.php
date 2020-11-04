<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\User;
use App\Experience;
use App\Company;
use App\Category;
use App\Profile;
use DB;
use App\Job;
use Auth;

class FrontendController extends Controller
{

    public function index(){
        $jobs=Job::latest()->where('status', 1)->limit(6)->get();
        $users= Profile::limit(5)->where('user_id', '!=', '11')->get();
        $company = Company::latest()->limit(6)->get();
        $categories = Category::with('jobs')->get();
        return view('welcome', compact('jobs','company','categories','users'));
    }
    public function candidates(Request $request) {
        $keyword = $request->get('search');
        if($keyword){
            $candidates = Profile::where('name','LIKE','%'.$keyword.'%')
                        ->orWhere('title','LIKE','%'.$keyword.'%')
                        ->orWhere('education','LIKE','%'.$keyword.'%')
                        ->orWhere('country','LIKE','%'.$keyword.'%')
                        ->orWhere('state','LIKE','%'.$keyword.'%')
                        ->orWhere('user_id', '!=', '11')
                        ->paginate(5);
                        return view('frontend.candidates',compact('candidates'));
        } else{
            $candidates= Profile::where('user_id', '!=', '11')->paginate(5);
            return view('frontend.candidates',compact('candidates'));
        }
       
    }

    public function candidate($id){
        
        $user = User::findOrFail($id);
        $education = Experience::latest()->where('user_id', $id)->where('type', 'education')->get();
        $work = Experience::latest()->where('user_id', $id)->where('type', 'work')->get();
        return view('frontend.candidate',compact('user','education','work')); 
    }

    public function companies(Request $request)
    { 
   
        $keyword = $request->get('search');
        if($keyword){
            $companies = Company::where('cname','LIKE','%'.$keyword.'%')
                        ->orWhere('country','LIKE','%'.$keyword.'%')
                        ->orWhere('specialization','LIKE','%'.$keyword.'%')
                        ->orWhere('city','LIKE','%'.$keyword.'%')
                        ->orWhere('state','LIKE','%'.$keyword.'%')
                        ->paginate(5);
                        return view('frontend.companies',compact('companies'));
        }
        else{
            $companies = Company::paginate(5);
            return view('frontend.companies',compact('companies'));
        }
       
    }

    public function company($id ,Company $company){
        $jobs = Job::latest()->where('user_id',$id)->get();
        $applicants = Job::has('users')->where('user_id',$company->id)->paginate(2);
        return view('frontend.company',compact('company','applicants')); 
    }

    public function jobs(Request $request){
        $search = $request->get('search');
        $category = $request->get('category');
        if($search && $category){
            $jobs = Job::where('location','LIKE','%'.$search.'%')
                ->orWhere('level','LIKE','%'.$search.'%')
                ->orWhere('type','LIKE','%'.$search.'%')
                ->orWhere('title','LIKE','%'.$search.'%')
                ->orWhere('category_id','LIKE','%'.$category.'%')
                ->paginate(10);
                $alljobs = Job::all();
            return view('frontend.jobs',compact('jobs','alljobs'));   
        }

        $keyword = $request->get('search');
        $type = $request->get('type');
        $category = $request->get('category');
        $location = $request->get('location');
        if($keyword||$type||$category||$location){
            $jobs = Job::join('categories', 'categories.id','=', 'jobs.category_id')
                        ->where('jobs.title','LIKE','%'.$keyword.'%')
                        ->orWhere('jobs.level','LIKE','%'.$keyword.'%')
                        ->orWhere('jobs.type','LIKE','%'.$keyword.'%')
                        ->orWhere('categories.name','LIKE','%'.$keyword.'%')
                        ->orWhere('jobs.type',$type)
                        ->orWhere('jobs.category_id', '=', $category)
                        ->paginate(10);
                        $alljobs = Job::all();
                        return view('frontend.jobs',compact('jobs','alljobs'));   
        }else {
            $jobs = Job::latest()->paginate(10);
            $alljobs = Job::all();
            return view('frontend.jobs',compact('jobs','alljobs'));
        }
        
    }

    public function job($id,Job $job){
        $similar = Job::latest()->where('category_id', $job->category_id)->where('id', '!=', $job->id)->get();
        
        return view('frontend.job',compact('job','similar'));
    }
 
}

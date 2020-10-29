<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Company;
use App\Category;
use App\Http\Requests\JobPostRequest;
use Auth; 
use App\Profile;
use App\User;
use App\Post;
use App\Application;
use DB;

class JobController extends Controller
{   
    public function __construct(){
        $this->middleware(['employer'],['except'=>array('index','show','apply','allJobs','candidates','jobs',)]);
    }

    public function show($id,Job $job){
        return view('jobs.show',compact('job'));
    }

    public function company(){
        return view('company.index');
    }

    public function create(){
        return view('jobs.create');
    }

    public function store(JobPostRequest $request){
    
        $user_id = auth()->user()->id;
        $company = Company::where('user_id',$user_id)->first();
        $company_id = $company->id;
        Job::create([
            'user_id' => $user_id,
            'company_id' => $company_id,
            'title' => request('title'),
            'slug' => str_slug(request('title')),
            'description' => request('description'),
            'requirements' => request('requirements'),
            'gender' => request('gender'),
            'applicants' => request('applicants'),
            'location' => request('location'),
            'type' => request('type'),
            'status' => request('status'),
            'lastdate' => request('lastdate'),
            'experience' =>request('experience'),
            'salary' =>request('salary'),
            'level' =>request('level'),
            'industry' =>request('industry'),
            'category_id' =>request('category_id'),


        ]);
        return redirect()->back()->with('success','Job Posted Successfully!');
    }

    
    public function myjob(){
        $jobs = Job::where('user_id',auth()->user()->id)->get();
        return view('company.jobs',compact('jobs'));
    }

    public function edit($id){
        $job = Job::findOrFail($id);  
        return view('jobs.edit',compact('job'));
    }
    public function update(JobPostRequest $request,$id){
        $job = Job::findOrFail($id);
        $job->update($request->all());
        return redirect()->back()->with('message','Job Sucessfully Updated!');

    }

    public function editjob(Request $request)
    {
        $job = array(
            'title' => $request->title,
            'location' =>$request->location,
            'requirements' =>$request->requirements,
            'lastdate' =>$request->lastdate,
            'applicants' =>$request->applicants,
            'description' =>$request->description,
            'type' =>$request->type,
            'salary' =>$request->salary,
            'experience' =>$request->experience,
            'status' =>$request->status,
            'gender' =>$request->gender,
            'industry' =>$request->industry,
            'level' =>$request->level,
            'category_id' =>$request->category_id,
            
    );


    Job::findOrfail($request->job_id)->update($job);

    return redirect()->back()->with('success','Job Updated Successfully');
    }


    public function apply(Request $request,$id){
        $jobId = Job::find($id);
        $jobId->users()->attach(Auth::user()->id);

        $user_id = auth()->user()->id;
       Application::create([
            'job_id' =>$request->job_id,
            'user_id' => $user_id,
            'job_title' => $request->job_title,
            'job_location' => $request->job_location,
            'job_slug' => $request->job_slug,
            'job_level' => $request->job_level,
            'job_lastdate' => $request->job_lastdate,
        ]);
        return redirect()->back()->with('message','Application sent!');

    }

    public function applicant(){
        $applicants = Job::has('users')->where('user_id',auth()->user()->id)->paginate(2);
        return view('company.applicants',compact('applicants'));
    }

    public function allJobs(Request $request){

        $search = $request->get('search');
        $address1 = $request->get('address1');
        if($search && $address1 ){
            $jobs = Job::where('position','LIKE','%'.$search.'%')
                ->orWhere('type','LIKE','%'.$search.'%')
                ->orWhere('title','LIKE','%'.$search.'%')
                ->orWhere('address','LIKE','%'.$address1.'%')
                ->paginate(10);
            return view('jobs.alljobs',compact('jobs'));
            
        }

        $keyword = $request->get('position');
        $type = $request->get('type');
        $category = $request->get('category_id');
        $address = $request->get('address');

        if($keyword||$type||$category||$address){
            $jobs = Job::where('position','LIKE','%'.$keyword.'%')
                        ->orWhere('type',$type)
                        ->orWhere('category_id',$category)
                        ->orWhere('address',$address)
                        ->paginate(10);
                        return view('jobs.alljobs',compact('jobs')); 
        }else{
            $jobs = Job::latest()->paginate(10);
            return view('jobs.alljobs',compact('jobs'));
        }
    }

    

    public function delete($id) {
        $job = Job::find($id);
        $job->delete();
        return redirect()->back()->with('success','Job Deleted Successfully');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Shortlist;
use App\Job;
use DB;

class CompanyController extends Controller
{   
    public function __construct(){
        $this->middleware(['employer']);
    }

    //route model binding
   
    public function dashboard(){
        return view('company.dashboard');
    }
    public function store(){
        
        $user_id = auth()->user()->id;
        Company::where('user_id',$user_id)->update([
            'cname'=> request('cname'),
            'search'=> request('search'),
            'team'=> request('team'),
            'since'=> request('since'),
            'description'=> request('description'),
            'specialization'=> request('specialization'),
            
        ]);
        return redirect()->back()->with('success','Company Sucessfully Updated!');
    }

    public function socials(){
        
        $user_id = auth()->user()->id;
        Company::where('user_id',$user_id)->update([
            'facebook'=> request('facebook'),
            'twitter'=> request('twitter'),
            'linkedin'=> request('linkedin'),
            'instagram'=> request('instagram'),
            
        ]);
        return redirect()->back()->with('success','Company Socials Sucessfully Updated!');
    }

    public function contacts(){
        
        $user_id = auth()->user()->id;
        Company::where('user_id',$user_id)->update([
            'phone'=> request('phone'),
            'website'=> request('website'),
            'country'=> request('country'),
            'city'=> request('city'),
            'state'=> request('state'),
            
        ]);
        return redirect()->back()->with('success','Company Contacts Sucessfully Updated!');
    }

    public function coverphoto(Request $request){
        $user_id = auth()->user()->id;
        if($request->hasfile('cover_photo')){
            $file = $request->file('cover_photo');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/coverphoto/',$filename);
            Company::where('user_id',$user_id )->update([
                'cover_photo'=>$filename
            ]);
            return redirect()->back()->with('message','Company cover-photo Successfully Updated!');
        }
    }
    public function companyLogo(Request $request){
        $user_id = auth()->user()->id;
        if($request->hasfile('avatar')){
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/logo',$filename);
            Company::where('user_id',$user_id)->update([
                'avatar'=>$filename
            ]);
            return redirect()->back()->with('success','Company Logo Successfully updated');
        }
    }


    public function jobs(){
        $jobs = Job::where('user_id',auth()->user()->id)->get();
        $activejobs = Job::whereDate('lastdate','>',Date('Y-m-d'))->limit(10)->where('user_id',auth()->user()->id)->get();
        $applicants = Job::has('users')->where('user_id',auth()->user()->id)->get();
        return view('company.jobs',compact('jobs','activejobs','applicants'));
    }

    public function shortlisted(){
        $shortlisted = Shortlist::where('company_id',auth()->user()->id)
        ->join('users', 'users.id', '=', 'shortlists.candidate_id')
        ->join('profiles', 'profiles.user_id', '=', 'shortlists.candidate_id')
        ->select('users.name as name', 'users.email as email', 'users.id as userid', 'profiles.title as title', 'profiles.about as about','profiles.status as status','shortlists.*')
        ->paginate(2);

        return view('company.shortlisted',compact('shortlisted'));
    }
    public function postjob(){
        return view('company.postjob');
    }

    public function changepassword(){
        return view('company.changepassword');
    }

    public function shortlist(Request $request){
        Shortlist::create([
            'company_id' =>$request->company_id,
            'candidate_id' => $request->candidate_id,
        ]);
        
        return response()->json(['msgs' => 'Candidate Shortlisted Successfully.'], 200);

    }
}

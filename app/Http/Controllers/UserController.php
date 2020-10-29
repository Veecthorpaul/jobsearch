<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use App\Job;
use App\Experience;
use App\Job_user;
use App\Application;
use App\Shortlist;
use App\Follow;
use DB;
use Hash;

class UserController extends Controller
{   
    public function __construct(){
        $this->middleware(['seeker']);
    }

    public function index(){
        return view('candidates.profile');
    }

    public function store(Request $request){
        $this->validate($request,[      
            'phone'=>'required|min:10|numeric',
            'gender'=>'required',
            'about'=>'required',
            'education'=>'required',
            'title'=>'required',
            'status'=>'required',
            'state'=>'required'

        ]);

        $user_id = auth()->user()->id;
        Profile::where('user_id',$user_id)->update([
            'phone'=> request('phone'),
            'education'=> request('education'),
            'gender'=> request('gender'),
            'about'=> request('about'),
            'title'=> request('title'),
            'status'=> request('status'),
            'state'=> request('state'),
            'website'=> request('website'),
            'country'=> request('country')
        ]);
        return redirect()->back()->with('success','Profile Successfully Updated!');
    }

    public function socials(Request $request){
        $user_id = auth()->user()->id;
        Profile::where('user_id',$user_id)->update([
            'facebook'=> request('facebook'),
            'twitter'=> request('twitter'),
            'instagram'=> request('instagram'),
            'linkedin'=> request('linkedin')
        ]);
        return redirect()->back()->with('success','Records Sucessfully Updated!');
    }

    public function resume(Request $request){
        $this->validate($request,[
            'resume'=>'required|mimes:pdf,doc,docx|max:20000'
        ]);

        $user_id = auth()->user()->id;
        $resume = $request->file('resume')->store('public/files');
        Profile::where('user_id',$user_id)->update([ 
            'resume'=>$resume,
        ]);
        return redirect()->back()->with('success','Resume Sucessfully Updated!');
    }

    public function avatar(Request $request){
        $this->validate($request,[
            'avatar'=>'required|mimes:png,jpeg,jpg|max:20000'
        ]);
        $user_id = auth()->user()->id;
        if($request->hasfile('avatar')){
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/avatar/',$filename);
            Profile::where('user_id',$user_id)->update([
                'avatar'=>$filename,
            ]);
        return redirect()->back()->with('success','Profile Picture Sucessfully Updated!');

        }
    }

   
    public function experience(){
        $education = Experience::latest()->where('user_id',auth()->user()->id)->where('type','education')->get();
        $work = Experience::latest()->where('user_id',auth()->user()->id)->where('type','work')->get();
 
        return view('candidates.experience', compact('education','work'));
    }


    public function appliedjobs(){ 
        $applied = \DB::table('applications')->where('user_id',auth()->user()->id)->get();
      
        return view('candidates.appliedjobs',compact('applied'));
    }

    public function education(Request $request){
            $this->validate($request,[
                'name' => ['required'],
                'start' => ['required'],
                'end' => ['required'],
                'qualification' => ['required'],
                'type' => ['required'],
                
            ]);
            $experience = new Experience;
            $experience->user_id = auth()->user()->id;
            $experience->name = $request->name;
            $experience->organization = $request->organization;
            $experience->start = $request->start;
            $experience->end = $request->end;
            $experience->qualification = $request->qualification;
            $experience->description = $request->description;
            $experience->type = $request->type;
            $experience->save();
                return redirect()->back()->with('success', 'Experience Added Successfully.');  
        }

 


    public function editeducation(Request $request)
    {
        $education = array(
            'name' => $request->name,
            'organization' =>$request->organization,
            'qualification' =>$request->qualification,
            'start' =>$request->start,
            'end' =>$request->end,
            'description' =>$request->description,
            'type' =>$request->type,
            
    );


    Experience::findOrfail($request->edu_id)->update($education);

    return redirect()->back()->with('success','Education Updated Successfully');
    }

    
    public function editwork(Request $request)
    {
        $work = array(
            'name' => $request->name,
            'organization' =>$request->organization,
            'qualification' =>$request->qualification,
            'start' =>$request->start,
            'end' =>$request->end,
            'description' =>$request->description,
            'type' =>$request->type,
            
    );


    Experience::findOrfail($request->job_id)->update($work);

    return redirect()->back()->with('success','Work Experience Updated Successfully');
    }

    public function deleteWork($id)
    {
        $work = Experience::find($id);
        $work->delete();
        return redirect()->back()->with('success','Work Experience Deleted Successfully');
    }

    public function deleteEducation($id) {
        $education = Experience::find($id);
        $education->delete();
        return redirect()->back()->with('success','Education Deleted Successfully');
    }
    
    public function changepassword(){
        return view('candidates.changepassword');
    }

    public function userchangepassword(Request $request)
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


    public function shortlisting(){
        $shortlisting = Shortlist::where('candidate_id',auth()->user()->id)
        ->join('users', 'users.id', '=', 'shortlists.company_id')
        ->join('companies', 'companies.user_id', '=', 'shortlists.company_id')
        ->select('companies.cname as name', 'users.email as email', 'users.id as userid', 'companies.description as description', 'companies.slug as slug', 'companies.specialization as specialization','companies.website as website', 'companies.id as comid','shortlists.*')
        ->paginate(2);

        return view('candidates.shortlisting',compact('shortlisting'));
    }

}

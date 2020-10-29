@extends('layouts.candidates')
@section('content')
<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url({{asset('images/resource/mslider1.jpg')}}) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>{{auth()->user()->name}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="block no-padding">
        <div class="container">
             <div class="row no-gape">
                <aside class="col-lg-3 column border-right">
                    <div class="widget">
                        <div class="tree_widget-sec">
                            <ul>
                                <li><a href="{{route('user.profile')}}" title=""><i class="la la-file-text"></i>My Profile</a></li>
                                <li><a href="{{route('userexperience')}}" title=""><i class="la la-briefcase"></i>Experience</a></li>
                                <li><a href="{{route('userappliedjobs')}}" title=""><i class="la la-paper-plane"></i>Applied Jobs</a></li>
                                <li><a href="{{route('userchangepassword')}}" title=""><i class="la la-flash"></i>Change Password</a></li>
                               <li><a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i class="la la-unlink"></i>
                    Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                       @csrf
                    </form></li>
                            </ul>
                        </div>
                    </div>
                </aside>
                 <div class="col-lg-9 column">
                    
                     <div class="padding-left">
                        <div class="m-0 p-0"> @include('inc.messages')</div>
                         <div class="profile-title col-lg-12 row">
                             <h3>My Profile</h3>
                             <div class="upload-img-bar col-lg-6">
                                 <span class="round">
                                    @if(empty(Auth::user()->profile->avatar))
                                 <img src="{{asset('images\candidate.png')}}" alt="">
                                @else   
                                    <img src="{{asset('uploads/avatar')}}/{{Auth::user()->profile->avatar}}" alt="" style="height: 10%">
                                @endif
                                </span>
                                 <div class="upload-info">
                                    <form action="{{route('avatar')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" class="form-control" name="avatar">
                                        <br><button type="submit" class="btn btn-primary">Update</button>
                                            @if($errors->has('avatar'))
                                                    <div class="error" style="color: red;">{{$errors->first('avatar')}}</div>
                                            @endif
                                    </form>
                                    </div>
                             </div>
                             <div class="upload-img-bar col-lg-6">
                                <span class="upload">
                                    @if(!empty(Auth::user()->profile->resume))
                                    <p class="mt-4" style="text-align: center"><a href="{{Storage::url(
                                        Auth::user()->profile->resume)}}" 
                                        >View Resume</a></p>
                                @else   
                                    <p class="mt-3" style="text-align: center"><b>Please Upload Resume</b></p>
                                @endif
                               </span>
                                <div class="upload-info">
                                   <form action="{{route('resume')}}" method="post" enctype="multipart/form-data">
                                       @csrf
                                       <input type="file" class="form-control" name="resume">
                                       <br><button type="submit" class="btn btn-primary">Update</button>
                                           @if($errors->has('resume'))
                                                   <div class="error" style="color: red;">{{$errors->first('resume')}}</div>
                                           @endif
                                   </form>
                                   </div>
                            </div>
                         </div>
                         <div class="profile-form-edit">
                             <form action="{{route('profile.create')}}" method="post">
                                @csrf
                                 <div class="row">
                                     <div class="col-lg-6">
                                         <span class="pf-title">Job Title</span>
                                         <div class="pf-field">
                                             <input type="text" name="title" value="{{Auth::user()->profile->title}}">
                                         </div>
                                     </div>

                                     <div class="col-lg-6">
                                        <span class="pf-title">Website</span>
                                        <div class="pf-field">
                                            <input type="text" name="website" value="{{Auth::user()->profile->website}}">
                                        </div>
                                    </div>
                                     <div class="col-lg-6">
                                         <span class="pf-title">Job Status</span>
                                         <div class="pf-field">
                                             <select data-placeholder="Allow In Search" class="chosen" name="status" value="{{Auth::user()->profile->status}}">
                                                <option>Open to Work</option>
                                                <option>Working</option>
                                                <option>Not Specified</option>
                                            </select>
                                         </div>
                                     </div>
                                     
                                    
                                     <div class="col-lg-6">
                                        <span class="pf-title">State</span>
                                        <div class="pf-field">
                                            <input type="text" name="state" value="{{Auth::user()->profile->state}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="pf-title">Country</span>
                                        <div class="pf-field">
                                            <input type="text" name="country" value="{{Auth::user()->profile->country}}">
                                        </div>
                                    </div>
                                     <div class="col-lg-6">
                                         <span class="pf-title">Education Level</span>
                                         <div class="pf-field">
                                             <select data-placeholder="Please Select Specialism" class="chosen" name="education" value="{{Auth::user()->profile->education}}">
                                                <option>Undergraduate</option>
                                                <option>Diploma</option>
                                                <option>Bachelor</option>
                                                <option>Masters</option>
                                            </select>
                                         </div>
                                     </div>
                                     <div class="col-lg-6">
                                        <span class="pf-title">Gender</span>
                                        <div class="pf-field">
                                            <select data-placeholder="Please Select Gender" class="chosen" name="gender" value="{{Auth::user()->profile->gender}}">
                                               <option>Male</option>
                                               <option>Female</option>
                                               <option>Not Speficied</option>
                                           </select>
                                        </div>
                                    </div>
                                     <div class="col-lg-6">
                                         <span class="pf-title">Phone</span>					 						
                                         <div class="pf-field">
                                             <div class="pf-field">
                                                <input type="number" name="phone" value="{{Auth::user()->profile->phone}}">
                                             </div>
                                        </div>
                                     </div>
                                     <div class="col-lg-12">
                                         <span class="pf-title">About</span>
                                         <div class="pf-field">
                                             <textarea name="about">{{Auth::user()->profile->about}}</textarea>
                                         </div>
                                     </div>
                                     <div class="col-lg-12">
                                         <button type="submit">Update</button>
                                     </div>
                                 </div>
                             </form>
                         </div>
                         <div class="contact-edit">
                            <h3>Social Media Accounts</h3>
                            <form action="{{route('socials')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <span class="pf-title">Facebook</span>
                                        <div class="pf-field">
                                            <input type="text" value="{{Auth::user()->profile->facebook}}" name="facebook">
                                            <i class="fa fa-facebook"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="pf-title">Twitter</span>
                                        <div class="pf-field">
                                            <input type="text" value="{{Auth::user()->profile->twitter}}" name="twitter">
                                            <i class="fa fa-twitter"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="pf-title">Instagram</span>
                                        <div class="pf-field">
                                            <input type="text" value="{{Auth::user()->profile->instagram}}" name="instagram">
                                            <i class="la la-instagram"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="pf-title">Linkedin</span>
                                        <div class="pf-field">
                                            <input type="text" value="{{Auth::user()->profile->linkedin}}" name="linkedin">
                                            <i class="fa fa-linkedin"></i>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit">Update</button>
                                    </div>  
                                </div>
                            </form>
                        </div>
                     </div>
                </div>
             </div>
        </div>
    </div>
</section>
@endsection
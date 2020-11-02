@extends('layouts.companies')
@section('content')
<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url({{asset('images/resource/mslider1.jpg')}}) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>{{auth()->user()->company->cname}}</h3>
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
                                <li><a href="{{route('companydashboard')}}" title=""><i class="la la-file-text"></i>Company Profile</a></li>
                                <li><a href="{{route('companyjobs')}}" title=""><i class="la la-briefcase"></i>Manage Jobs</a></li>
                                <li><a href="{{route('applicant')}}" title=""><i class="la la-users"></i>Applicants</a></li>
                                <li><a href="{{route('companypostjob')}}" title=""><i class="la la-file-text"></i>Post a New Job</a></li>
                                <li><a href="{{route('companychangepassword')}}" title=""><i class="la la-lock"></i>Change Password</a></li>
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
                         <div class="profile-title">
                            <div class="mt-3"> @include('inc.messages')</div>
                             <h3>Post a New Job</h3>
                             
                         </div>
                         <div class="profile-form-edit">
                            <form action="{{route('job.store')}}" method="POST">
                                @csrf
                                 <div class="row">
                                     <div class="col-lg-6">
                                         <span class="pf-title">Job Title</span>
                                         <div class="pf-field">
                                             <input type="text" placeholder="e.g Designer" name="title" required>
                                         </div>
                                     </div>
                                     <div class="col-lg-6">
                                        <span class="pf-title">Category</span>
                                        <div class="pf-field">
                                            <select data-placeholder="Please Select Job Type" class="chosen" name="category_id">
                                                @foreach(App\Category::all() as $cat)
                                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                 
                                     <div class="col-lg-6">
                                         <span class="pf-title">Job Location</span>
                                         <div class="pf-field">
                                             <input type="text" placeholder="e.g Ontario, Canada" name="location" required>
                                         </div>
                                     </div>
                                     <div class="col-lg-6">
                                         <span class="pf-title">Job Industry</span>
                                         <div class="pf-field">
                                             <input type="text" placeholder="e.g Software" name="industry" required>
                                         </div>
                                     </div>
                                     <div class="col-lg-6">
                                         <span class="pf-title">Job Type</span>
                                         <div class="pf-field">
                                             <select data-placeholder="Please Select Job Type" class="chosen" name="type">
                                                <option value="full time">Full Time</option>
                                                <option value="part time">Part Time</option>
                                                <option value="intern">Internship</option>
                                                <option value="volunteer">Volunteer</option>
                                            </select>
                                         </div>
                                     </div>
                                     <div class="col-lg-6">
                                         <span class="pf-title">Offered Salary</span>
                                         <div class="pf-field">
                                            <input type="text" placeholder="e.g $100k" name="salary" required>
                                         </div>
                                     </div>
                                     <div class="col-lg-6">
                                         <span class="pf-title">Career Level</span>
                                         <div class="pf-field">
                                             <select data-placeholder="Please Select Career Level" class="chosen" name="level">
                                                <option>Junior</option>
                                                <option>Mid Level</option>
                                                <option>Senior</option>
                                                <option>Intern</option>
                                            </select>
                                         </div>
                                     </div>
                                     <div class="col-lg-6">
                                         <span class="pf-title">Years of Experience</span>
                                         <div class="pf-field">
                                             <select data-placeholder="Please Select Experience" class="chosen" name="experience">
                                                <option>0 - 2yrs</option>
                                                <option>2 - 5yrs</option>
                                                <option>5yrs above</option>
                                            </select>
                                         </div>
                                     </div>
                                     <div class="col-lg-6">
                                         <span class="pf-title">Gender</span>
                                         <div class="pf-field">
                                             <select data-placeholder="Please Select Gender" class="chosen" name="gender">
                                                <option>Male</option>
                                                <option>Female</option>
                                                <option>Not Specified</option>
                                            </select>
                                         </div>
                                     </div>
                                     <div class="col-lg-6">
                                        <span class="pf-title">Application Deadline Date</span>
                                        <div class="pf-field">
                                            <input type="date" placeholder="01.11.207" class="form-control datepicker" name="lastdate" required>
                                        </div>
                                    </div>
                                     <div class="col-lg-12">
                                        <span class="pf-title">Description</span>
                                        <div class="pf-field">
                                            <textarea name="description" id="description" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <span class="pf-title">Requirements</span>
                                        <div class="pf-field">
                                            <textarea name="requirements" id="requirements" required></textarea>
                                        </div>
                                    </div>
                                     <div class="col-lg-6">
                                         <span class="pf-title">Status</span>
                                         <div class="pf-field">
                                             <select data-placeholder="Please Select Status" class="chosen" name="status">
                                                 <option value="1">Live</option>
                                                <option value="2">Draft</option>
                                                
                                            </select>
                                         </div>
                                     </div>
                                    
                                     
                                     <div class="col-lg-6">
                                         <span class="pf-title">No. of Applicants</span>
                                         <div class="pf-field">
                                            <input type="number" placeholder="e.g 200" name="applicants" required>
                                         </div>
                                     </div>
                                     <div class="col-lg-12 mb-4">
                                        <button type="submit">Submit</button>
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

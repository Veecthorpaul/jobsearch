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
             <div class="manage-jobs-sec">
              <div class="mt-3"> @include('inc.messages')</div>
               <h3>Manage Jobs</h3>
               <div class="extra-job-info mb-4">
                @if(count($jobs) >= 2)
                 <span><i class="la la-clock-o"></i><strong>{{count($jobs)}}</strong> Jobs Posted</span>
                 @else
                 <span><i class="la la-clock-o"></i><strong>{{count($jobs)}}</strong> Job Posted</span>
                 @endif
                 @if(count($applicants) >= 2)
                 <span><i class="la la-file-text"></i><strong>{{count($applicants)}}</strong> Applicants</span>
                 @else
                 <span><i class="la la-file-text"></i><strong>{{count($applicants)}}</strong> Applicant</span>
                 @endif
                 @if(count($activejobs) < 2)
                 <span><i class="la la-users"></i><strong>{{count($activejobs)}}</strong> Active Job</span>
                 @else
                 <span><i class="la la-users"></i><strong>{{count($activejobs)}}</strong> Active Jobs</span>
                 @endif
               </div>
               @if(count($jobs) > 0)
               <table>
                 <thead>
                   <tr>
                     <td>Title</td>
                     <td>Applications</td>
                     <td>Created & Expired</td>
                     <td>Status</td>
                     <td>Action</td>
                   </tr>
                 </thead>
                  <tbody>
                    @foreach($jobs as $job)
                     
     
                   <tr>
                     <td>
                       <div class="table-list-title">
                         <h3><a href="#" title="">{{$job->title}}</a></h3>
                         <span><i class="la la-map-marker"></i>{{$job->location}}</span>
                       </div>
                     </td>
                     <td>
                       <span class="applied-field">3+ Applied</span>
                     </td> 
                     <td>
                       <span>{{date('d M Y',strtotime($job->created_at))}} - {{date('d M Y',strtotime($job->lastdate))}}</span> 
                     </td>
                     <td>
                      @if($job->lastdate > Date('Y-m-d'))
                      <span class="status active">Active</span>
                    @else   
                    <span class="status">Inactive</span>
                    @endif
                     </td>
                     <td>
                       <ul class="action_job">
                         <li><a href="{{route('jobs.show',[$job->id,$job->slug])}}" class="btn btn-success mr-3 p-1" style="color: white">View</a></li>
                         <li><a data-toggle="modal" data-target="#exampleModal" data-job_id="{{$job->id}}" 
                          data-experience="{{$job->experience}}" 
                          data-lastdate="{{$job->lastdate}}" 
                          data-status="{{$job->status}}" 
                          data-type="{{$job->type}}"
                           data-title="{{$job->title}}" 
                           data-description="{{$job->description}}"
                            data-requirements="{{$job->requirements}}"
                            data-salary="{{$job->salary}}" 
                          data-level="{{$job->level}}"
                           data-location="{{$job->location}}" 
                           data-applicants="{{$job->applicants}}"
                            data-gender="{{$job->gender}}"
                            data-industry="{{$job->industry}}"
                              class="btn btn-primary mr-3 p-1" style="color: white">
                          Edit</a></li>
                         <li><a href="#" title=""></a>
                          <form class="delete" action="{{ route('deletejob', $job->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input class="btn btn-danger p-1" type="submit" value="Delete">
                        </form>
                    </li></li>

                       </ul>
                     </td>
                   </tr>
                   @endforeach
                 </tbody>
                 </table>
               @else
<p style="text-align: center; color: #fb236a"><i>No Jobs Posted</i></p>
               @endif
             </div>
           </div>
        </div>
       </div>
    </div>
  </div>


                       {{-- Edit Job Modal --}}
                       <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                       aria-hidden="true">
                       <div class="modal-dialog" role="document">
                         <div class="modal-content">
                           <div class="modal-header text-center">
                             <h4 class="modal-title w-100 font-weight-bold">Edit Job</h4>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                           <div class="modal-body mx-3">
                             <form action="{{route('editjob','job_id')}}" method="POST">
                               @csrf
                               <input type="hidden" id="job_id" name="job_id">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <span class="pf-title">Job Title</span>
                                        <div class="pf-field">
                                            <input type="text" placeholder="e.g Designer" name="title" required id="title">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <span class="pf-title">Category</span>
                                      <div class="pf-field">
                                          <select data-placeholder="Please Select Job Type" class="chosen" name="category_id" id="category_id">
                                            @foreach(App\Category::all() as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                         </select>
                                      </div>
                                  </div>
                                    <div class="col-lg-6">
                                        <span class="pf-title">Job Location</span>
                                        <div class="pf-field">
                                            <input type="text" placeholder="e.g Ontario, Canada" name="location" required id="location">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="pf-title">Job Industry</span>
                                        <div class="pf-field">
                                            <input type="text" placeholder="e.g Software" name="industry" required id="industry">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="pf-title">Job Type</span>
                                        <div class="pf-field">
                                            <select data-placeholder="Please Select Job Type" class="chosen" name="type" id="type">
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
                                           <input type="text" placeholder="e.g $100k" name="salary" required id="salary">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="pf-title">Career Level</span>
                                        <div class="pf-field">
                                            <select data-placeholder="Please Select Career Level" class="chosen" name="level" id="level">
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
                                            <select data-placeholder="Please Select Experience" class="chosen" name="experience" id="experience">
                                               <option>0 - 2yrs</option>
                                               <option>2 - 5yrs</option>
                                               <option>5yrs above</option>
                                           </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="pf-title">Gender</span>
                                        <div class="pf-field">
                                            <select data-placeholder="Please Select Gender" class="chosen" name="gender" id="gender">
                                               <option>Male</option>
                                               <option>Female</option>
                                               <option>Not Specified</option>
                                           </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <span class="pf-title">Application Deadline Date</span>
                                       <div class="pf-field">
                                           <input type="date" placeholder="01.11.207" class="form-control datepicker" name="lastdate" required id="lastdate">
                                       </div>
                                   </div>
                                    <div class="col-lg-12">
                                       <span class="pf-title">Description</span>
                                       <div class="pf-field">
                                           <textarea name="description" id="description"></textarea>
                                       </div>
                                   </div>
                                   <div class="col-lg-12">
                                       <span class="pf-title">Requirements</span>
                                       <div class="pf-field">
                                           <textarea name="requirements" required id="requirements"></textarea>
                                       </div>
                                   </div>
                                    <div class="col-lg-6">
                                        <span class="pf-title">Status</span>
                                        <div class="pf-field">
                                            <select data-placeholder="Please Select Status" class="chosen" name="status" id="status">
                                               <option>Live</option>
                                               <option>Draft</option>
                                               
                                           </select>
                                        </div>
                                    </div>
                                   
                                    
                                    <div class="col-lg-6">
                                        <span class="pf-title">No. of Applicants</span>
                                        <div class="pf-field">
                                           <input type="number" placeholder="e.g 200" name="applicants" required id="applicants">
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
                         {{-- Edit Job Modal --}}

</section>

@endsection
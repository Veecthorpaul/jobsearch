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
    <div class="block remove-top">
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
                         <div class="manage-jobs-sec">
                            <div class="m-0 p-0"> @include('inc.messages')</div>
                             <div class="border-title"><h3>Education</h3><a data-toggle="modal" data-target="#modalEducation"><i class="la la-plus"></i> Add Education</a></div>
                           
                             @if(count($education) > 0)
                               
                             <div class="edu-history-sec">  
                                @foreach($education as $edu)
  
                                 <div class="edu-history">
                                     <i class="la la-graduation-cap"></i>
                                     <div class="edu-hisinfo">
                                         
                                         <h3>{{$edu->organization}}</h3>
                                         <i>{{$edu->start}} - {{$edu->end}}</i>
                                         <span>{{$edu->name}} <i>{{$edu->qualification}}</i></span>
                                         <p>{{$edu->description}}</p>
                                     </div>
                                     <ul class="action_job">
                                         <li><a data-toggle="modal" data-target="#exampleModal" data-edu_id="{{$edu->id}}" data-organization="{{$edu->organization}}" data-start="{{$edu->start}}" data-end="{{$edu->end}}" data-type="{{$edu->type}}" data-name="{{$edu->name}}" data-description="{{$edu->description}}" data-qualification="{{$edu->qualification}}" class="btn btn-primary mr-3 p-1" style="color: white">
                                    Edit</a></li>
                                         <li>
                                            <form class="delete" action="{{ route('deleteedu', $edu->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                <input class="btn btn-danger" type="submit" value="Delete">
                                            </form>
                                        </li>
                                     </ul>
                                 </div>
                                 @endforeach
                             </div>
                             @else
                             <div class="edu-history-sec">
                                 <div class="edu-history">
                                     <div class="edu-hisinfo">
                                        <p style="text-align: center; color: #fb236a"><i>No Education History</i> </p>
                                     </div>
                                 </div>
                             </div>
                             @endif
                             <div class="border-title"><h3>Work Experience</h3><a data-toggle="modal" data-target="#modalWork"><i class="la la-plus"></i> Add Work Experience</a></div>
                             @if(count($work) > 0) 
                             
                             <div class="edu-history-sec">
                                @foreach($work as $job)
                                
                                 <div class="edu-history style2">
                                     <i></i>
                                     <div class="edu-hisinfo">
                                         <h3>{{$job->name}}<span>{{$job->qualification}}</span></h3>
                                         <i>{{$job->start}} - {{$job->end}}</i>
                                         <p>{{$job->description}}</p>
                                     </div>
                                     <ul class="action_job">
                                         <li><a data-toggle="modal" data-target="#exampleModal1" data-job_id="{{$job->id}}" data-organization="{{$job->organization}}" data-start="{{$job->start}}" data-end="{{$job->end}}" data-type="{{$job->type}}" data-name="{{$job->name}}" data-description="{{$job->description}}" data-qualification="{{$job->qualification}}"  class="btn btn-primary mr-3 p-1" style="color: white">
                                           Edit</a></li>
                                            <li>
                                                <form class="delete" action="{{ route('deletework', $job->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                    <input class="btn btn-danger" type="submit" value="Delete">
                                                </form>
                                            </li> </ul>
                                 </div>
            
                                 @endforeach
                             </div>
                             @else
                             <div class="edu-history-sec">
                                 <div class="edu-history style2">
                                     <div class="edu-hisinfo">
                                         <p style="text-align: center; color: #fb236a"><i>No Work History</i></p>
                                     </div>
                                 </div>
                             </div>
                             @endif
                         </div>
                     </div>
                </div>
             </div>
        </div>
    </div>

    {{-- Add Education Modal --}}
    <div class="modal fade" id="modalEducation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Add Education</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        
        <form action="{{route('addexperience')}}" method="post">
            @csrf
            <input type="hidden" name="type" value="education">
             <div class="row">
                 <div class="col-lg-12">
                     <span class="pf-title">Institution Type</span>
                     <div class="pf-field">
                        <select data-placeholder="Please Select Institution Type" class="chosen" name="organization" class="m-0">
                            <option>University</option>
                            <option>College</option>
                            <option>Polytechnic</option>
                            <option>Technical School    </option>
                        </select>
                     </div>
                 </div>

                 <div class="col-lg-12">
                    <span class="pf-title">Name of Institution</span>
                    <div class="pf-field">
                        <input type="text" name="name" class="m-0">
                    </div>
                </div>

                 <div class="col-lg-12">
                     <span class="pf-title">Qualification</span>
                     <div class="pf-field">
                        <input type="text" name="qualification" class="m-0">
                     </div>
                 </div>

                 <div class="col-lg-12">
                    <span class="pf-title">Course</span>
                    <div class="pf-field">
                       <input type="text" name="description" class="m-0">
                    </div>
                </div>
                 
                
                 <div class="col-lg-6">
                    <span class="pf-title">Start Year</span>
                    <div class="pf-field">
                        <input type="number" name="start" class="m-0">
                    </div>
                </div>
                <div class="col-lg-6">
                    <span class="pf-title">End Year</span>
                    <div class="pf-field">
                        <input type="number" name="end">
                    </div>
                </div>
                 <div class="col-lg-12">
                    <button type="button" class="btn btn-danger ml-3" data-dismiss="modal">Close</button>
                     <button type="submit">Add</button>
                 </div>
             </div>
         </form>
      </div>
    
    </div>
  </div>
</div>
    {{-- Add Education Modal --}}

        {{-- Edit Education Modal --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Edit Education</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body mx-3">
              
              <form action="{{route('editeducation','edu_id')}}" method="post">
                  @csrf
                  <input type="hidden" name="type" value="education">
                  <input type="hidden" id="edu_id" name="edu_id">
                   <div class="row">
                       <div class="col-lg-12">
                           <span class="pf-title">Institution Type</span>
                           <div class="pf-field">
                              <select data-placeholder="Please Select Institution Type" class="chosen" name="organization" class="m-0" id="organization">
                                  <option>University</option>
                                  <option>College</option>
                                  <option>Polytechnic</option>
                                  <option>Technical School    </option>
                              </select>
                           </div>
                       </div>
      
                       <div class="col-lg-12">
                          <span class="pf-title">Name of Institution</span>
                          <div class="pf-field">
                              <input type="text" id="name" name="name"class="m-0">
                          </div>
                      </div>
      
                       <div class="col-lg-12">
                           <span class="pf-title">Qualification</span>
                           <div class="pf-field">
                              <input type="text" id="qualification" name="qualification" class="m-0">
                           </div>
                       </div>
      
                       <div class="col-lg-12">
                          <span class="pf-title">Course</span>
                          <div class="pf-field">
                             <input type="text" name="description" class="m-0" id="description">
                          </div>
                      </div>
                       
                      
                       <div class="col-lg-6">
                          <span class="pf-title">Start Year</span>
                          <div class="pf-field">
                              <input type="number" name="start" class="m-0" id="start">
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <span class="pf-title">End Year</span>
                          <div class="pf-field">
                              <input type="number" name="end" id="end">
                          </div>
                      </div>
                       <div class="col-lg-12">
                        <button type="button" class="btn btn-danger ml-3" data-dismiss="modal">Close</button>
                           <button type="submit">Update</button>
                           
                       </div>
                   </div>
               </form>
            </div>
          
          </div>
        </div>
      </div>
          {{-- Edit Education Modal --}}


   

    {{-- Add Work Modal --}}
    <div class="modal fade" id="modalWork" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Add Work Experience</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        
        <form action="{{route('addexperience')}}" method="post">
            @csrf
            <input type="hidden" name="type" value="work">
             <input type="hidden" name="organization" value="work">
             <div class="row">
                 <div class="col-lg-12">
                     <span class="pf-title">Company</span>
                     <div class="pf-field">
                        <input type="text" name="name" class="m-0">
                     </div>
                 </div>

                 <div class="col-lg-12">
                     <span class="pf-title">Job Role</span>
                     <div class="pf-field">
                        <input type="text" name="qualification" class="m-0">
                     </div>
                 </div>

                 <div class="col-lg-12">
                    <span class="pf-title">Job Duties</span>
                    <div class="pf-field">
                        <textarea name="description" style="min-height: 50px" class="m-0"></textarea>
                    </div>
                </div>
                 
                
                 <div class="col-lg-6">
                    <span class="pf-title">Start Year</span>
                    <div class="pf-field">
                        <input type="number" name="start" class="m-0">
                    </div>
                </div>
                <div class="col-lg-6">
                    <span class="pf-title">End Year</span>
                    <div class="pf-field">
                        <input type="number" name="end">
                    </div>
                </div>
                 <div class="col-lg-12">
                    <button type="button" class="btn btn-danger ml-3" data-dismiss="modal">Close</button>
                     <button type="submit">Add</button>
                 </div>
             </div>
         </form>
      </div>
    
    </div>
  </div>
</div>
    {{-- Add Work Modal --}}

      {{-- Edit Work Modal --}}
      <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Edit Work Experience</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body mx-3">
            
            <form action="{{route('editwork','job_id')}}" method="post">
                @csrf
                <input type="hidden" name="type" value="work">
                <input type="hidden" id="job_id" name="job_id">
                 <input type="hidden" name="organization" value="work">
                 <div class="row">
                     <div class="col-lg-12">
                         <span class="pf-title">Company</span>
                         <div class="pf-field">
                            <input type="text" name="name" class="m-0" id="name">
                         </div>
                     </div>
    
                     <div class="col-lg-12">
                         <span class="pf-title">Job Role</span>
                         <div class="pf-field">
                            <input type="text" name="qualification" class="m-0" id="qualification">
                         </div>
                     </div>
    
                     <div class="col-lg-12">
                        <span class="pf-title">Job Duties</span>
                        <div class="pf-field">
                            <textarea name="description" style="min-height: 50px" class="m-0" id="description"></textarea>
                        </div>
                    </div>
                     
                    
                     <div class="col-lg-6">
                        <span class="pf-title">Start Year</span>
                        <div class="pf-field">
                            <input type="number" name="start" class="m-0" id="start">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <span class="pf-title">End Year</span>
                        <div class="pf-field">
                            <input type="number" name="end" id="end">
                        </div>
                    </div>
                     <div class="col-lg-12">
                        <button type="button" class="btn btn-danger ml-3" data-dismiss="modal">Close</button>
                         <button type="submit">Update</button>
                     </div>
                 </div>
             </form>
          </div>
        
        </div>
      </div>
    </div>
        {{-- Edit Work Modal --}}

    
</section>


@endsection

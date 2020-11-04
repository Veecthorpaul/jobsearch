@extends('layouts.frontend')
@section('content')	
<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url({{asset('images/resource/mslider1.jpg')}}) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>{{$job->title}}</h3>
                        <div class="job-statistic">
                            <span style="text-transform: uppercase">{{$job->type}}</span>
                            <p><i class="la la-map-marker"></i> {{$job->location}}</p>
                            <p><i class="la la-calendar-o"></i>Posted {{$job->created_at->diffForHumans()}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="block">
        <div class="container">
            <div class="row">
                 <div class="col-lg-8 column">
                     <div class="job-single-sec">
                         <div class="job-single-head">
                         <div class="job-thumb"> 
                            @if(!empty($job->company->avatar))
                                <img src="{{asset('uploads/logo')}}/{{$job->company->avatar}}" alt="Image" style="width: 80%">
                            @else 
                            <img src="{{asset('images\resource\sj.png')}}" alt="">
                            @endif
                           
                             </div>
                             <div class="job-head-info">
                                 <h4>{{$job->company->cname}}</h4>
                                 <span>{{$job->company->state}}, {{$job->company->country}}</span>
                                 <p><i class="la la-globe"></i> {{$job->company->website}}</p>
                                 <p><i class="la la-phone"></i> {{$job->company->phone}}</p>
                                 <p><i class="la la-envelope-o"></i>  <a data-toggle="modal" data-target="#exampleModalLong"  data-backdrop="false"> Email This Job </a></p>
                             </div>
                         </div><!-- Job Head -->
                           <div class="job-details">
                             <h3>Job Description</h3>
                             <p>{!! nl2br(e($job->description)) !!}</p>
                            
                             <h3>Job Requirements</h3>
                         <p>{!! nl2br(e($job->requirements)) !!}</p>
                         </div>
                                               <div class="recent-jobs">
                             <h3>Related Jobs</h3>
                             <div class="job-list-modern">
                                @if(count($similar) > 0)
                                 <div class="job-listings-sec no-border">
                                     @foreach ($similar as $related)
                                     <div class="job-listing wtabs">
                                        <div class="job-title-sec">
                                            @if(!empty($related->company->avatar))
                                        <div class="c-logo"> 
                                       
                                            <div class="c-logo"><a href="{{route('jobs.show',[$related->id,$related->slug])}}">     <img src="{{asset('uploads/logo')}}/{{$related->company->avatar}}" alt="Image" style="width: 80%"></a>
                                         </div>
                                         @else
                                         <div class="c-logo"><a href="{{route('jobs.show',[$related->id,$related->slug])}}"> <img src="{{asset('images\resource\l1.png')}}" alt=""></a>
                                         </div>
                                         @endif
                                            <h3><a href="{{route('jobs.show',[$related->id,$related->slug])}}" title="">{{$related->title}}</a></h3>
                                            <span>{{$related->category->name}}</span>
                                            <div class="job-lctn"><i class="la la-map-marker"></i>{{$related->location}}</div>
                                        </div>
                                        <div class="job-style-bx">
                                            @if($related->type=='full time')
                                            <span class="job-is ft">Full Time</span>
                                            @elseif($related->type=='part time')
                                            <span class="job-is pt">Part Time</span>
                                            @elseif($related->type=='intern')
                                            <span class="job-is in">Internship</span>
                                            @elseif($related->type=='volunteer')
                                            <span class="job-is vt">Volunteer</span>
                                            @endif
                                    <i> <i>Posted: {{$related->created_at->diffForHumans()}}</i></i>
                                        </div>
                                    </div>
                                     @endforeach
                                </div>
                                @else
                                <div class="job-listings-sec no-border">
                                  
                                    <div class="job-listing wtabs">
                                        <p style="text-align: center; color: #fb236a"><i>No Related Jobs Found</i></p>
                                   </div>
                               </div>
                                @endif
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-4 column">
                    @if(Auth::check()&&Auth::user()->user_type=='seeker')
                          
                    <form action="{{route('apply',[$job->id])}}" method="POST">
                        <input type="hidden" name="job_id" value="{{$job->id}}">
                        <input type="hidden" name="job_title" value="{{$job->title}}">
                        <input type="hidden" name="job_slug" value="{{$job->slug}}">
                        <input type="hidden" name="job_level" value="{{$job->level}}">
                        <input type="hidden" name="job_location" value="{{$job->location}}">
                        <input type="hidden" name="job_lastdate" value="{{$job->lastdate}}">
                    @csrf
                     
                    @if(!$job->checkApplication())
                    <button type="submit" class="apply-thisjob" style="width:100%"><i class="la la-paper-plane"></i>Apply</button>
                    @else
                    </form>
                    <center class="apply-thisjob" style="width:100%"><span>You have applied for this job</span></center>
                    @endif
                    @endif
                     <div class="job-overview">
                         <h3>Job Overview</h3>
                         <ul>
                             <li><i class="la la-money"></i><h3>Offered Salary</h3><span>{{$job->salary}}</span></li>
                             <li><i class="la la-mars-double"></i><h3>Gender</h3><span>{{$job->gender}}</span></li>
                             <li><i class="la la-thumb-tack"></i><h3>Career Level</h3><span>{{$job->level}}</span></li>
                             <li><i class="la la-puzzle-piece"></i><h3>Industry</h3><span>{{$job->industry}}</span></li>
                             <li><i class="la la-shield"></i><h3>Experience</h3><span>{{$job->experience}}</span></li>
                             <li><i class="la la-calendar"></i><h3>Deadline</h3><span>{{date('d M Y',strtotime($job->lastdate))}}</span></li>
                             <li><i class="la la-file-text"></i><h3>Applicants Required</h3><span>{{$job->applicants}}</span></li>
                         </ul>
                     </div><!-- Job Overview -->
                 </div>
            </div>
        </div>
    </div>
</section>


@endsection
<!-- Send Job Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Send Job</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{route('mail')}}" method="post"> @csrf
        <input type="hidden" name="job_id" value="{{$job->id}}">
        <input type="hidden" name="job_slug" value="{{$job->slug}}">

        <div class="col-lg-12">
            <span class="pf-title mt-0">Sender's Name</span>
            <div class="pf-field">
                <input type="text" placeholder="e.g John Doe" name="sender" required id="sender">
            </div>
        </div>
        <div class="col-lg-12">
            <span class="pf-title mt-0">Recipient's Name</span>
            <div class="pf-field">
                <input type="text" placeholder="e.g marcus Rashford" name="recipient" required id="recipient">
            </div>
        </div>
     
        <div class="col-lg-12">
            <span class="pf-title mt-0">Recipient's Email</span>
            <div class="pf-field">
                <input type="email" placeholder="e.g johndoe@gmail.com" name="email" required id="email">
            </div>
        </div>
        <div class="col-lg-12">
            <span class="pf-title mt-0">Message</span>
            <div class="pf-field">
                <textarea name="message" id="message" cols="1" rows="1"></textarea>
            </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Send Mail</button>
        </div>
      </form>
      </div>
    </div>
  </div>

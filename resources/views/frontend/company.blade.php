@extends('layouts.frontend')
@section('content')	
<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url({{asset('images/resource/mslider1.jpg')}}) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>{{$company->cname}}</h3>
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
                 <div class="col-lg-12 column">
                     <div class="job-single-sec style3">
                         <div class="job-head-wide">
                             <div class="row">
                                 <div class="col-lg-9">
                                     <div class="job-single-head3 emplye">
                                     <div class="job-thumb"> 
                                        <img src="{{asset('images/company.png')}}" alt="">
                                        </div>
                                        
                                         <div class="job-single-info3">
                                             <h3>{{$company->cname}}</h3>
                                             <span><i class="la la-map-marker"></i>{{$company->state}}, {{$company->country}}</span>
                                             <ul class="tags-jobs">
                                             <li><i class="la la-file-text"></i> Applications: {{count($applicants)}}</li>
                                             <li><i class="la la-calendar-o"></i> Post Jobs: {{count($company->jobs)}}</li>
                                             </ul>
                                         </div>
                                     </div><!-- Job Head -->
                                 </div>
                                 <div class="col-lg-3">
                                     <div class="share-bar" style="text-align: center">
                                        @if(!empty($company->instagram))
                                         <a href="{{$company->instagram}}" title="" class="share-instagram"><i class="la la-instagram"></i></a>
                                         @endif
                                         @if(!empty($company->facebook))
                                         <a href="{{$company->facebook}}" title="" class="share-fb"><i class="fa fa-facebook"></i></a>
                                         @endif
                                         @if(!empty($company->twitter))
                                         <a href="{{$company->twitter}}" title="" class="share-twitter"><i class="fa fa-twitter"></i></a>
                                         @endif
                                         @if(!empty($company->linkedin))
                                         <a href="{{$company->linkedin}}" title="" class="share-linkedin"><i class="fa fa-linkedin"></i></a>
                                         @endif
                                     </div>
                                  
                                 </div>
                             </div>
                          </div>
                         <div class="job-wide-devider">
                             <div class="row">
                                 <div class="col-lg-8 column">		
                                     <div class="job-details">
                                         <h3>About {{$company->cname}}</h3>
                                         <p style="text-align: justify">{!! nl2br(e($company->description)) !!} </p>
                                       </div>
                                     <div class="recent-jobs">
                                         <h3>Jobs from {{$company->cname}}</h3>
                                         <div class="job-list-modern">   
                                             @if(count($company->jobs) > 0)
                                             <div class="job-listings-sec no-border">
                                                @foreach($company->jobs as $job)
                                                <div class="job-listing wtabs noimg">
                                                    <div class="job-title-sec">
                                                        <h3><a href="{{route('jobs.show',[$job->id,$job->slug])}}" title="">{{$job->title}}</a></h3>
                                                        <span>{{$job->category->name}}</span>
                                                        <div class="job-lctn"><i class="la la-map-marker"></i>{{$job->location}}</div>
                                                    </div>
                                                    <div class="job-style-bx">
                                                        @if($job->type=='full time')
                                    <span class="job-is ft">Full Time</span>
                                    @elseif($job->type=='part time')
                                    <span class="job-is pt">Part Time</span>
                                    @elseif($job->type=='intern')
                                    <span class="job-is in">Internship</span>
                                    @elseif($job->type=='volunteer')
                                    <span class="job-is vt">Volunteer</span>
                                    @endif
                                                        <i>{{$job->created_at->diffForHumans()}}</i>
                                                    </div>
                                                </div> 
                                            @endforeach
                                            </div>
                                            @else
                                            <div class="job-listing wtabs noimg">
                                          
                                                    <p style="text-align: center; color: #fb236a"><i>No Jobs Posted by {{$company->cname}}</i></p>
                                             
                                             </div>
                                            @endif
                                         </div>
                                     </div>
                                 </div>

                         
                                 <div class="col-lg-4 column">
                                     <div class="job-overview">
                                         <h3>Company Information</h3>
                                         <ul>
                                            <li><i class="la la-globe"></i><h3>Website </h3><span> <a href="{{$company->website}}">{{$company->website}}</a></span></li>
                                             <li><i class="la la-phone"></i><h3>Phone </h3><span>{{$company->phone}}</span></li>
                                             <li><i class="la la-bars"></i><h3>Categories</h3><span>{{$company->specialization}}</span></li>
                                             <li><i class="la la-clock-o"></i><h3>Since</h3><span>{{$company->since}}</span></li>
                                             <li><i class="la la-users"></i><h3>Team Size</h3><span>{{$company->team}}</span></li>

                                         </ul>
                                     </div><!-- Job Overview -->
                                     <div class="quick-form-job">
                                     <h3>Contact {{$company->cname}}</h3>
                                         <form id="contact_us" action="javascript:void(0)" method="POST">
                                            @csrf
                                            <input type="hidden" name="reciever" value="{{$company->email}}">
                                            <input type="hidden" name="recipient" value="{{$company->cname}}">
                                             <input type="text" placeholder="Enter your Name *" name="name" required>
                                             <input type="email" placeholder="Email Address*" name="email" required>
                                             <textarea placeholder=" Enter Message*" name="message" required></textarea>
                                             <button class="submit" type="submit" id="send_form">Send Email</button>
                                             <div id="msg_div">
                                                <p id="res_message" style="text-align: center; color: #fb236a "><i></i></p>
                                            </div>
                                         </form>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
            </div>
        </div>
    </div>
</section>

@endsection

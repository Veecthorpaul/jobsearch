@extends('layouts.frontend')
@section('content')	
<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url({{asset('images/resource/mslider1.jpg')}}) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                 
                                </div>
                                <div class="col-lg-6">
                            
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="overlape">
    <div class="block remove-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cand-single-user">
                        <div class="share-bar circle">
                            @if(!empty($user->profile->linkedin))
                             <a href="#" title="" class="share-linkedin"><i class="la la-linkedin"></i></a>
                             @endif
                             @if(!empty($user->profile->facebook))
                             <a href="#" title="" class="share-facebook"><i class="la la-facebook"></i></a>
                             @endif
                             @if(!empty($user->profile->twitter))
                             <a href="#" title="" class="share-twitter"><i class="la la-twitter"></i></a>
                             @endif
                             @if(!empty($user->profile->instagram))
                             <a href="#" title="" class="share-instagram"><i class="la la-instagram"></i></a>
                             @endif
                         </div>
                         <div class="can-detail-s">
                         <div class="cst">
                            @if(!empty($user->profile->avatar))
                             <img src="{{asset('uploads/avatar')}}/{{$user->profile->avatar}}" alt="" height="100%">
                             @else
                             <img src="{{asset('images/candidate.png')}}" alt="">
                             @endif
                            </div>
                             <h3>{{$user->name}}</h3>
                             <span><i>{{$user->profile->title}}</i></span>
                         <p>{{$user->email}}</p>
                             <p>Member Since, {{date('M Y',strtotime($user->created_at))}}</p>
                             <p><i class="la la-map-marker"></i>{{$user->profile->state}} / {{$user->profile->country}}</p>
                         </div>
                         <div class="download-cv">
                              <div class="m-3">
                                   @if(!empty($user->profile->resume))
                                <a href="{{Storage::url(
                                   $user->profile->resume)}}">View CV <i class="la la-eye"></i></a>
                                @endif
                            </div>   
                         </div>
                     </div>
                     <ul class="cand-extralink">
                         <li><a href="#about" title="">About</a></li>
                         <li><a href="#education" title="">Education</a></li>
                         <li><a href="#experience" title="">Work Experience</a></li>
                     </ul>
                     <div class="cand-details-sec">
                         <div class="row">
                             <div class="col-lg-8 column">
                                 <div class="cand-details" id="about">
                                 <h2>About {{$user->name}}</h2>
                                     <p>{{$user->profile->about}}</p>
                                     <div id="education"></div>
                                     @if(count($education) > 0)
                                     <div class="edu-history-sec mt-4">
                                         <h2>Education</h2>
                                         @foreach($education as $edu)
                                         <div class="edu-history">
                                             <i class="la la-graduation-cap"></i>
                                             <div class="edu-hisinfo">
                                                <h3>{{$edu->organization}}</h3>
                                                <i>{{$edu->start}} - {{$edu->end}}</i>
                                                <span>{{$edu->name}} <i>{{$edu->qualification}}</i></span>
                                                <p>{{$edu->description}}</p>
                                             </div>
                                         </div>
                                        @endforeach
                                     </div>
                                     @else
                                     <div class="edu-history-sec" id="education">
                                        <h2>Education</h2>
                                        <div class="edu-history">
                                            <div class="edu-hisinfo">
                                                <p style="text-align: center; color: #fb236a"><i>No Education History for {{$user->name}}</i></p>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(count($work) > 0)
                                     <div class="edu-history-sec mt-4" id="experience">
                                         <h2>Work Experience</h2>
                                         @foreach($work as $job)
                                         <div class="edu-history style2">
                                             <i></i>
                                             <div class="edu-hisinfo">
                                                 <h3>Web Designer <span>Inwave Studio</span></h3>
                                                 <i>2008 - 2012</i>
                                                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                                             </div>
                                         </div>
                                       @endforeach
                                     </div>
                                     @else
                                     <div class="edu-history-sec mt-4" id="experience">
                                        <h2>Work Experience</h2>
                                        <div class="edu-history style2">
                                            <div class="edu-hisinfo">
                                            <p style="text-align: center; color: #fb236a"><i>No Work History for {{$user->name}}</i></p>
                                            </div>
                                        </div>
                                    </div>
                                 @endif
                                 </div>
                             </div>
                             <div class="col-lg-4 column">
                                 <div class="job-overview">
                                     <h3>{{$user->name}} Overview</h3>
                                     <ul>
                                         <li><i class="la la-globe"></i><h3>Website</h3><span>{{$user->profile->website}}</span></li>
                                         <li><i class="la la-mars-double"></i><h3>Gender</h3><span>{{$user->profile->gender}}</span></li>
                                         <li><i class="la la-thumb-tack"></i><h3>Job Status</h3><span>{{$user->profile->status}}</span></li>
                                         <li><i class="la la-puzzle-piece"></i><h3>Education Level</h3><span>{{$user->profile->education}}</span></li>
                                         <li><i class="la la-phone"></i><h3>Phone</h3><span>{{$user->profile->phone}}</span></li>
                                     </ul>
                                 </div><!-- Job Overview -->
                                 <div class="quick-form-job">
                                 <h3>Contact {{$user->name}}</h3>
                                     <form id="contact_us" action="javascript:void(0)" method="POST">
                                        @csrf
                                        <input type="hidden" name="reciever" value="{{$user->email}}">
                                        <input type="hidden" name="recipient" value="{{$user->name}}">
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
</section>
@endsection
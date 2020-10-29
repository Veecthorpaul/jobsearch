@extends('layouts.candidates')
@section('content')
<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url({{asset('images/resource/mslider1.jpg)')}} repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
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
                         <div class="manage-jobs-sec">
                             <h3>Candidates Dashboard</h3>
                             <div class="cat-sec">
                                <div class="row no-gape">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="p-category">
                                            <a href="{{route('userappliedjobs')}}" title="">
                                                <i class="la la-briefcase"></i>
                                               <span>Applied Jobs</span>
                                               @if(count($applied) >= 2)
                                               <p>{{count($applied)}} Applications</p>
                                               @else
                                               <p>{{count($applied)}} Application</p>
                                               @endif
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="p-category">
                                            <a href="{{route('shortlisting')}}" title="">
                                                <i class="la la-check"></i>
                                                <span>Shortlisting Companies</span>
                                                @if(count($shortlisting) >= 2)
                                                <p>{{count($shortlisting)}} Companies</p>
                                                @else
                                                <p>{{count($shortlisting)}} Company</p>
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="p-category follow-companies-popup">
                                            <a href="#" title="">
                                                <i class="la la-user"></i>
                                                <span>Companies Followed</span>
                                                <p>56 Companies</p>
                                            </a>
                                        </div>
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

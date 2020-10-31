@extends('layouts.candidates')
@section('content')
<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url({{asset(images/resource/mslider1.jpg)}}) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
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
                             <h3>Change Password</h3>
                             <div class="change-password">
                             <form action="{{route('userchangepassword')}}" method="POST">
                                     @csrf
                                    <div class="mt-3"> @include('inc.messages')</div>
                                     <div class="row">
                                         <div class="col-lg-6">
                                             <span class="pf-title">Old Password</span>
                                             <div class="pf-field">
                                                 <input type="password" name="old_password">
                                             </div>
                                             <span class="pf-title">New Password</span>
                                             <div class="pf-field">
                                                 <input type="password" name="password">
                                             </div>
                                             <span class="pf-title">Confirm Password</span>
                                             <div class="pf-field">
                                                 <input type="password" name="password_confirmation">
                                             </div>
                                             <button type="submit">Update</button>
                                         </div>
                                         <div class="col-lg-6">
                                             <i class="la la-key big-icon"></i>
                                         </div>
                                     </div>
                                 </form>
                             </div>
                         </div>
                     </div>
                </div>
             </div>
        </div>
    </div>
</section>

@endsection

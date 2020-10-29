@extends('layouts.admin')
@section('content')
<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url(images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
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
                                <li><a href="{{route('dashboard')}}" title=""><i class="la la-home"></i>Dashboard</a></li>
                                <li><a href="{{route('admincandidates')}}" title=""><i class="la la-user"></i>Candidates</a></li>
                                <li><a href="{{route('admincompanies')}}" title=""><i class="la la-users"></i>Companies</a></li>
                                <li><a href="{{route('categories')}}" title=""><i class="la la-briefcase"></i>Categories</a></li>
                                <li><a href="{{route('adminjobs')}}" title=""><i class="la la-paper-plane"></i>Jobs</a></li>
                                <li><a href="{{route('changepassword')}}" title=""><i class="la la-flash"></i>Change Password</a></li>
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
                             <h3>Admin Dashboard</h3>
                             <div class="cat-sec">
                                <div class="row no-gape">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="p-category">
                                            <a href="{{route('userappliedjobs')}}" title="">
                                                <i class="la la-user"></i>
                                               <span>Candidates</span>
                                               @if(count($candidates) >= 2)
                                               <p>{{count($candidates)}} Candidates</p>
                                               @else
                                               <p>{{count($candidates)}} Candidate</p>
                                               @endif
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="p-category">
                                            <a href="{{route('shortlisting')}}" title="">
                                                <i class="la la-users"></i>
                                                <span>Companies</span>
                                                @if(count($employers) >= 2)
                                                <p>{{count($employers)}} Companies</p>
                                                @else
                                                <p>{{count($employers)}} Company</p>
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="p-category">
                                            <a href="{{route('userappliedjobs')}}" title="">
                                                <i class="la la-briefcase"></i>
                                               <span>Categories</span>
                                               @if(count($categories) >= 2)
                                               <p>{{count($categories)}} Categories</p>
                                               @else
                                               <p>{{count($categories)}} Candidate</p>
                                               @endif
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="p-category">
                                            <a href="{{route('shortlisting')}}" title="">
                                                <i class="la la-check"></i>
                                                <span>Jobs</span>
                                                @if(count($jobs) >= 2)
                                                <p>{{count($jobs)}} Jobs</p>
                                                @else
                                                <p>{{count($jobs)}} Job</p>
                                                @endif
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

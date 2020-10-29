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
                                <li><a href="{{route('user.profile')}}" title=""><i class="la la-home"></i>Dashboard</a></li>
                                <li><a href="{{route('userprofile')}}" title=""><i class="la la-file-text"></i>My Profile</a></li>
                                <li><a href="{{route('userexperience')}}" title=""><i class="la la-briefcase"></i>Experience</a></li>
                                <li><a href="{{route('userappliedjobs')}}" title=""><i class="la la-paper-plane"></i>Applied Jobs</a></li>
                                <li><a href="{{route('shortlisting')}}" title=""><i class="la la-plus"></i>Shortlistings</a></li>
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
                             <div class="border-title"><h3>Shortlisting Companies</h3></div>
                             @if(count($shortlisting) > 0)
                             <div class="edu-history-sec">
                                @foreach($shortlisting as $shortlist)
                                 <div class="edu-history">
                                     <div class="edu-hisinfo">
                                         <h3>{{$shortlist->name}}</h3>
                                         <i>{{$shortlist->email}}</i>
                                         <span>{{$shortlist->specialization}} <i>{{$shortlist->website}}</i></span>
                                         <p> {{ \Illuminate\Support\Str::limit($shortlist->description, 120, $end='...') }}</p>
                                     </div>
                                     <ul class="action_job">
                                         <li><span>View</span><a href="{{route('company.index',[$shortlist->comid,$shortlist->slug])}}"><i class="la la-eye"></i></a></li>
                                     </ul>
                                 </div>
                                 @endforeach
                                 <div class="pagination">
                                    {{$shortlisting->appends(Illuminate\Support\Facades\Input::except('page'))->links()}}
                                </div><!-- Pagination -->
                             </div>
                             @else
                             <div class="edu-history-sec mt-4">
                                 <div class="edu-history">
                                     <div class="edu-hisinfo">
                                         <p style="text-align: center; color: #fb236a"><i>You Have Not Been Shortlisted Yet</i></p>
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
</section>
@endsection
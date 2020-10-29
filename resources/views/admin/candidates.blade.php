@extends('layouts.admin')
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
                             <div class="border-title"><h3>Candidates</h3></div>
                             @if(count($candidates) > 0)
                             <div class="edu-history-sec">
                                @foreach($candidates as $user)
                                 <div class="edu-history">
                                     <div class="edu-hisinfo">
                                         <h3><a href="{{route('candidate.index',[$user->user_id])}}">{{$user->name}}</a></h3>
                                         <i>Job Title:  <span style="color: #fb236a">{{$user->title}}</span></i>
                                         <i>Email: <span style="color: #fb236a">{{$user->email}}</span></i>
                                         <span>Country: <span style="color: #fb236a">{{$user->country}}</span> <i>{{$user->status}}</i></span>
                                         <p> {{ \Illuminate\Support\Str::limit($user->about, 120, $end='...') }}</p>
                                     </div>
                                     <ul class="action_job">
                                         <li><span>View</span><a href="{{route('candidate.index',[$user->user_id])}}"><i class="la la-eye"></i></a></li>
                                     </ul>
                                 </div>
                                 @endforeach
                                 <div class="pagination">
                                    {{$candidates->appends(Illuminate\Support\Facades\Input::except('page'))->links()}}
                                </div><!-- Pagination -->
                             </div>
                             @else
                             <div class="edu-history-sec mt-4">
                                 <div class="edu-history">
                                     <div class="edu-hisinfo">
                                         <p style="text-align: center; color: #fb236a"><i>No Candidate Found</i></p>
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
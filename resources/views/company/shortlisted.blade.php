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
    <div class="block remove-top">
        <div class="container">
             <div class="row no-gape">
                 <aside class="col-lg-3 column border-right">
                     <div class="widget">
                         <div class="tree_widget-sec">
                             <ul>
                                <li><a href="{{route('companydashboard')}}" title=""><i class="la la-file-text"></i>Company Profile</a></li>
                                <li><a href="{{route('companyjobs')}}" title=""><i class="la la-briefcase"></i>Manage Jobs</a></li>
                                <li><a href="{{route('applicant')}}" title=""><i class="la la-users"></i>Applicants</a></li>
                                <li><a href="{{route('companyshortlisted')}}" title=""><i class="la la-paper-plane"></i>Shortlisted</a></li>
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
                             <div class="border-title"><h3>Shortlisted Candidates</h3></div>
                             @if(count($shortlisted) > 0)
                             <div class="edu-history-sec">
                                @foreach($shortlisted as $shortlist)
                                 <div class="edu-history">
                                     <div class="edu-hisinfo">
                                         <h3>{{$shortlist->name}}</h3>
                                         <i>{{$shortlist->email}}</i>
                                         <span>{{$shortlist->title}} <i>{{$shortlist->status}}</i></span>
                                         <p> {{ \Illuminate\Support\Str::limit($shortlist->about, 120, $end='...') }}</p>
                                     </div>
                                     <ul class="action_job">
                                         <li><span>View</span><a href="{{route('candidate.index',[$shortlist->userid])}}"><i class="la la-eye"></i></a></li>
                                     </ul>
                                 </div>
                                 @endforeach
                                 <div class="pagination">
                                    {{$shortlisted->appends(Illuminate\Support\Facades\Input::except('page'))->links()}}
                                </div><!-- Pagination -->
                             </div>
                             @else
                             <div class="edu-history-sec mt-4">
                                 <div class="edu-history">
                                     <div class="edu-hisinfo">
                                         <p style="text-align: center; color: #fb236a"><i>No Shortlisted Candidate Yet</i></p>
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
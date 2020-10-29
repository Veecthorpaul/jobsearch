@extends('layouts.companies')
@section('content')
<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url(images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
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
                             <div class="border-title"><h3>Applicants</h3></div> 
                             @if(count($applicants) > 0)
                             <div class="edu-history-sec">
                                @foreach($applicants as $applicant)
                                <h5>Job Title: <a href="{{route('jobs.show',[$applicant->id,$applicant->slug])}}"> {{$applicant->title}}</a></h5>
                                @foreach($applicant->users as $user)
                                 <div class="edu-history">
                                     <div class="edu-hisinfo">
                                         <h3>Applicant's Name: <a href="{{route('candidate.index',[$user->id])}}">{{$user->name}}</a></h3>
                                         <i>Email: {{$user->email}}</i>
                                         <i>Applied On: {{ date('F d, Y', strtotime($applicant->created_at)) }}</i>
                                         <i>Phone: {{$user->profile->phone}}</i>
                                     </div>
                                     <ul class="action_job">
                                        <li><a href="{{route('candidate.index',[$user->id])}}"><i class="la la-eye"></i> View Profile</a></li>
                                    </ul>
                                    
                                     
                                 </div>
                                 @endforeach
                                 @endforeach
                                 <div class="pagination">
                                    {{$applicants->appends(Illuminate\Support\Facades\Input::except('page'))->links()}}
                                </div><!-- Pagination -->
                             </div>
                             @else
                             <div class="edu-history-sec">
                                 <div class="edu-history">
                                     <div class="edu-hisinfo">
                                        <p style="text-align: center; color: #fb236a"><i>No Applicant Yet</i></p>
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
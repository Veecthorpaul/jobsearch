@extends('layouts.candidates')
@section('content')\
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
                             <h3>Applied Jobs</h3>
                             @if(count($applied) > 0)
                             
                             <table>
                                 <thead>
                                     <tr>
                                         <td>Job Title</td>
                                         <td>Level</td>
                                         <td>Applied Date</td>
                                         <td>Job Deadline</td>
                                         <td></td>
                                     </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($applied as $job)
                                     <tr>
                                         <td>
                                             <div class="table-list-title">
                                             <i>{{$job->job_title}}</i><br>
                                                 <span><i class="la la-map-marker"></i>{{$job->job_location}}</span>
                                             </div>
                                         </td>
                                         <td>
                                             <div class="table-list-title">
                                                 <h3><a href="#" title="">{{$job->job_level}}</a></h3>
                                             </div>
                                         </td>
                                         <td>
                                             <span>{{date('d M Y',strtotime($job->created_at))}}</span><br>
                                         </td>
                                         <td>
                                             <span>{{date('d M Y',strtotime($job->job_lastdate))}}</span>
                                         </td>
                                         <td>
                                             <ul class="action_job">
                                                 <li><span>View</span><a href="{{route('jobs.show',[$job->job_id,$job->job_slug])}}"><i class="la la-eye"></i></a></li>
                                             </ul>
                                         </td>
                                     </tr>
                                     @endforeach
                                 </tbody>
                             </table>
                            
                             @else
                             <div class="edu-history-sec mt-4">
                                <div class="edu-history">
                                    <div class="edu-hisinfo">
                                       <p style="text-align: center; color: #fb236a"><i>No Job Application Sent Yet</i></p>
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
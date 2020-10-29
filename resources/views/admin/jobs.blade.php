@extends('layouts.admin')
@section('content')\
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
                                <li><a href="{{route('jobs')}}" title=""><i class="la la-paper-plane"></i>Jobs</a></li>
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
                             <h3>Jobs</h3>
                             @if(count($jobs) > 0)
                             
                             <table>
                                 <thead>
                                     <tr>
                                         <td>Job Title</td>
                                         <td>Category</td>
                                         <td>Posted Date</td>
                                         <td>Job Deadline</td>
                                         <td>Status</td>
                                         <td></td>
                                     </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($jobs as $job)
                                     <tr>
                                         <td>
                                             <div class="table-list-title">
                                             <i>{{$job->title}}</i><br>
                                                 <span><i class="la la-map-marker"></i>{{$job->location}}</span>
                                             </div>
                                         </td>
                                         <td>
                                             <div class="table-list-title">
                                                 <h3><a href="#" title="">{{$job->category->name}}</a></h3>
                                             </div>
                                         </td>
                                         <td>
                                             <span>{{date('d M Y',strtotime($job->created_at))}}</span><br>
                                         </td>
                                         <td>
                                            <span>{{date('d M Y',strtotime($job->job_lastdate))}}</span>
                                        </td>
                                         <td>
                                             <span>{{$job->status}}</span>
                                         </td>
                                        
                                         <td>
                                             <ul class="action_job">
                                                 <li><span>View</span><a href="{{route('jobs.show',[$job->id,$job->slug])}}"><i class="la la-eye"></i></a></li>
                                             </ul>
                                         </td>
                                     </tr>
                                     @endforeach
                                 </tbody>
                             </table>
                             <div class="pagination">
                                {{$jobs->appends(Illuminate\Support\Facades\Input::except('page'))->links()}}
                            </div><!-- Pagination -->
                             @else
                             <div class="edu-history-sec mt-4">
                                <div class="edu-history">
                                    <div class="edu-hisinfo">
                                       <p style="text-align: center; color: #fb236a"><i>No Job Found</i></p>
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
@extends('layouts.frontend')
@section('content')	
<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url({{asset('images/resource/mslider1.jpg')}}) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>{{$categoryName->name}}</h3>
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
                 <div class="col-lg-12 column">
                     <div class="modrn-joblist">
                         
                         <div class="filterbar">
 
                         </div>
                     </div><!-- Modern Job LIst -->
                     <div class="job-list-modern">
                        @if(count($jobs) > 0)
                         <div class="job-listings-sec">
                             @foreach($jobs as $job)
                            <div class="job-listing wtabs">
                                <div class="job-title-sec">
                                    @if(!empty($job->company->avatar))
                                    <div class="c-logo">
                                        <img src="{{asset('uploads/logo')}}/{{$job->company->avatar}}" alt="Image" style="width: 80%">
                                    </div>
                                    @else 
                                <div class="c-logo"> <img src="{{asset('images\resource\l1.png')}}" alt=""> </div>
                                    @endif
                                   
                                    <h3><a href="{{route('jobs.show',[$job->id,$job->slug])}}" title="">{{$job->title}}</a></h3>
                                    <span>{{$job->category->name}}</span>
                                    <div class="job-lctn"><i class="la la-map-marker"></i>{{$job->location}}</div>
                                    <div class="job-lctn ml-4"><i class="la la-calendar"></i>Deadline: {{date('d M Y',strtotime($job->lastdate))}}</div>
                                    
                                </div>
                                <div class="job-style-bx">
                                      @if($job->type=='full time')
                                            <span class="job-is ft">Full Time</span>
                                            @elseif($job->type=='part time')
                                            <span class="job-is pt">Part Time</span>
                                            @elseif($job->type=='intern')
                                            <span class="job-is in">Internship</span>
                                            @elseif($job->type=='volunteer')
                                            <span class="job-is vt">Volunteer</span>
                                            @endif
                                    <i> <i>Posted: {{$job->created_at->diffForHumans()}}</i></i>
                                </div>
                            </div>
                        @endforeach
                        <div class="pagination mb-4">
                            {{$jobs->appends(Illuminate\Support\Facades\Input::except('page'))->links()}}
                        </div><!-- Pagination -->
                        </div>
                        @else
                      <div class="job-listing wtabs" style="margin-bottom:  7.3%">
                                <p style="text-align: center; color: #fb236a"><i>No Jobs Found</i></p>
                       </div>
                        @endif
                        
                     </div>
                 </div>
             </div>
        </div>
    </div>
</section>
@endsection

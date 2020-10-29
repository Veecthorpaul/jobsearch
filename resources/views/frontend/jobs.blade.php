@extends('layouts.frontend')
@section('content')	
<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url({{asset('images/resource/mslider1.jpg')}}) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>Jobs</h3>
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
                     <form action="{{route('jobs')}}">
                            <div class="search_widget_job">
                                <div class="field_w_search">
                                    <input type="text" placeholder="Search Keywords" name="search">
                                    <i class="la la-search"></i>
                                </div><!-- Search Widget -->
                                <div class="field_w_search">
                                    <input type="text" placeholder="All Locations" name="location">
                                    <i class="la la-map-marker"></i>
                                </div><!-- Search Widget -->
                                <div class="field_w_search">
                                   <select data-placeholder="e.g. Housing, Education" class="chosen-city" name="category">
                                       <option></option>
                                       @foreach(App\Category::all() as $cat)
                                       <option value="{{$cat->id}}">{{$cat->name}}</option>
                                   @endforeach
                                   </select>
                                   <i class="la la-briefcase"></i>
                               </div><!-- Search Widget -->
                               <div class="field_w_search">
                                   <select data-placeholder="e.g Full time, Part time" class="chosen-city" name="type">
                                       <option></option>
                                       <option value="full time">Full Time</option>
                                       <option value="part time">Part Time</option>
                                       <option value="intern">Internship</option>
                                       <option value="volunteer">Volunteer</option>
                                   </select>
                                   <i class="la la-link"></i>
                               </div><!-- Search Widget -->
                               <div>
                                <button type="submit" class="btn btn-primary" style="text-align: center">Submit</button>
                            </div>
                            </div>
                           

                         </form>
                     
                     </div>
                 </aside>
                 <div class="col-lg-9 column">
                     <div class="modrn-joblist">
                     </div><!-- Modern Job LIst -->
                     <div class="job-list-modern">
                        @if(count($jobs) > 0)
                         <div class="job-listings-sec">
                             @foreach($jobs as $job)
                            <div class="job-listing wtabs">
                                <div class="job-title-sec">
                                    <div class="c-logo"> <img src="{{asset('images\jobsearch.png')}}" alt=""> </div>
                                   
                                    <h3><a href="{{route('jobs.show',[$job->id,$job->slug])}}" title="">{{$job->title}}</a></h3>
                                    <span>{{$job->category->name}}</span>
                                    <div class="job-lctn"><i class="la la-map-marker"></i>{{$job->location}}</div>
                                    <div class="job-lctn ml-4"><i class="la la-calendar"></i>Deadline: {{date('d M Y',strtotime($job->lastdate))}}</div>
                                    
                                </div>
                                <div class="job-style-bx mb-3">
                                    @if($job->type=='full time')
                                    <span class="job-is ft">Full Time</span>
                                    @elseif($job->type=='part time')
                                    <span class="job-is pt">Part Time</span>
                                    @elseif($job->type=='intern')
                                    <span class="job-is in">Internship</span>
                                    @elseif($job->type=='volunteer')
                                    <span class="job-is vt">Volunteer</span>
                                    @endif <br>
                                </div>
                                <div class="job-style-bx">
                                    {{-- <i> <i class="mt-2">Posted: {{$job->created_at->diffForHumans()}}</i></i> --}}
                                </div>
                            </div>
                        @endforeach
                        <div class="pagination mb-4">
                            {{$jobs->appends(Illuminate\Support\Facades\Input::except('page'))->links()}}
                        </div><!-- Pagination -->
                        </div>
                        @else
                        <div class="job-listings-sec">
                           <div class="job-listing wtabs">
                                <p style="text-align: center; color: #fb236a"><i>No Jobs Found</i></p>
                           </div>
                       </div>
                        @endif
                        
                     </div>
                 </div>
             </div>
        </div>
    </div>
</section>
@endsection
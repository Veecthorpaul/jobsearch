@extends('layouts.frontend')
@section('content')

<section>
    <div class="block no-padding">
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-featured-sec">
                        <div class="new-slide-3">
                        <img src="{{asset('images\resource\vector-4.png')}}">
                        </div>
                        <div class="job-search-sec">
                            <div class="job-search">
                                <h3>The Easiest Way to Get Your New Job</h3>
                                <span>Find Jobs, Employment & Career Opportunities</span>
                            <form action="{{route('jobs')}}">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                            <div class="job-field">
                                                <input type="text" name="search" placeholder="Job title, Location, Type etc.">
                                                <i class="la la-keyboard-o"></i>
                                            </div>
                                        </div> 
                                        <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12">
                                            <div class="job-field">
                                                <select data-placeholder="IT, Housing, Education" class="chosen-city" name="category">
                                                    <option>Select Category</option>
                                                    @foreach(App\Category::all() as $cat)
                                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                @endforeach
                                                </select>
                                                <i class="la la-briefcase"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-md-2 col-sm-12 col-xs-12">
                                            <button type="submit"><i class="la la-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="scroll-to mt-2">
                            <a href="#scroll-here" title=""><i class="la la-arrow-down"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="scroll-here">
    <div class="block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading mt-4">
                        <h2>Popular Categories</h2>
                        @if(count($jobs) >= 2)
                        <span>{{count($jobs)}} Active Jobs</span>
                        @else
                        <span>{{count($jobs)}} Active Job</span>
                        @endif
                        
                    </div><!-- Heading -->
                    <div class="cat-sec">
                        <div class="row no-gape">
                            @foreach($categories->slice(0, 8) as $category)
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="p-category">
                                    <a href="{{route('category.index',[$category->id])}}" title="">
                                        @if($category->id == 1)
                                        <i class="la la-graduation-cap"></i>
                                        @elseif($category->id == 11)
                                        <i class="la la-bullhorn"></i>
                                        @elseif($category->id == 21)
                                        <i class="la la-line-chart "></i>
                                        @elseif($category->id == 31)
                                        <i class="la la-phone"></i>
                                        @elseif($category->id == 41)
                                        <i class="la la-cutlery"></i>
                                        @elseif($category->id == 51)
                                        <i class="la la-users"></i>
                                        @elseif($category->id == 61)
                                        <i class="la la-building"></i>
                                        @elseif($category->id == 71)
                                        <i class="la la-user-md"></i>
                                        @else
                                        <i class="la la-user"></i>
                                        @endif
                                        <span>{{$category->name}}</span>
                                        @if(count($category->jobs) >= 2)
                                        <p>({{count($category->jobs)}}) Jobs</p>
                                        @else
                                        <p>({{count($category->jobs)}}) Job</p>
                                        @endif
                                        </a>
                                </div>
                            </div>
                           @endforeach
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="block double-gap-top double-gap-bottom">
        <div data-velocity="-.1" style="background: url({{asset('images/resource/parallax1.jpg')}}) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible layer color"></div><!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="simple-text-block mt-4 mb-4">
                        <h3>Make a Difference with Your Online Resume!</h3>
                        <span>Your resume in minutes with JobSearch resume assistant is ready!</span>
                    <a href="{{route('register')}}" title="">Create an Account</a>
                    </div>
                </div>
            </div>
        </div>	
    </div>
</section>

<section>
    <div class="block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt-4">
                    <div class="heading">
                        <h2>Featured Jobs</h2>
                        <span>Leading Employers already using job and talent.</span>
                    </div><!-- Heading -->
                    <div class="job-listings-sec">
                        @foreach($jobs as $job)
                        <div class="job-listing">
                            <div class="job-title-sec">
                            <div class="c-logo"> <a href="{{route('jobs.show',[$job->id,$job->slug])}}"><img src="{{asset('images\jobsearch.png')}}" alt=""></a> </div>
                                <h3><a href="{{route('jobs.show',[$job->id,$job->slug])}}" title="">{{$job->title}}</a></h3>
                                <span>{{$job->category->name}}</span>
                            </div>
                            <span class="job-lctn"><i class="la la-map-marker"></i>{{$job->location}}</span>
                            @if($job->type=='full time')
                            <span class="job-is ft" style="text-transform: uppercase">{{$job->type}}</span>
                            @elseif($job->type=='part time')
                            <span class="job-is pt" style="text-transform: uppercase">{{$job->type}}</span>
                            @elseif($job->type=='intern')
                            <span class="job-is in" style="text-transform: uppercase">Internship</span>
                            @elseif($job->type=='volunteer')
                            <span class="job-is vt" style="text-transform: uppercase">{{$job->type}}</span>
                            @endif
                        </div><!-- Job -->
                        @endforeach                      
                    </div>
                </div>
                <div class="col-lg-12 mb-4">
                    <div class="browse-all-cat">
                    <a href="{{route('jobs')}}" title="">See More Jobs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="block gray">
        <div class="container mb-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading mt-3">
                        <h2>Top Company Registered</h2>
                        <span>Some of the companies we've helped recruit excellent applicants over the years.</span>
                    </div><!-- Heading -->
                     <div class="team-sec mb-4" >
                            <div class="carousel" data-flickity='{ "wrapAround": true, "autoPlay": true }'>
                                @foreach($company as $com)
                                    <div class="col-lg-2 carousel-cell">
                                        <div class="tea">
                                            @if(!empty($com->avatar))
                                            <div class="team-img">
                                            <a href="{{route('company.index',[$com->id,$com->slug])}}"><img src="{{asset('uploads/logo')}}/{{$com->avatar}}" alt="" style="border-radius: 0%; border: none; max-width: 80%"></a>
                                            </div>
                                            @else
                                            <div class="team-img">
                                           <a href="{{route('company.index',[$com->id,$com->slug])}}"><img src="{{asset('images/company.png')}}" alt="" style="border-radius: 0px; border: none; max-width: 80%"></a> </div>
                                            @endif
                                              <p> <a href="{{route('company.index',[$com->id,$com->slug])}}">{{$com->cname}}</a></p>
                                        </div><!-- Team -->
                                    </div>
                               
                              @endforeach
                            </div>
                        </div>
                </div>
            </div>
        </div>	
    </div>
</section>
<section>
    <div class="block">
        <div data-velocity="-.1" style="background: url(images/resource/parallax2.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible layer color light"></div><!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt-4 mb-4">
                    <div class="heading light">
                        <h2>Kind Words From Happy Candidates</h2>
                        <span>What other people thought about the service provided by JobSearch</span>
                    </div><!-- Heading -->
                    <div class="reviews-sec" id="reviews-carousel">
                        <div class="col-lg-6">
                            <div class="reviews">
                                <img src="images\resource\r1.jpg" alt="">
                                <h3>Augusta Silva <span>Web designer</span></h3>
                                <p>Without JobSearch i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service</p>
                            </div><!-- Reviews -->
                        </div>
                        <div class="col-lg-6">
                            <div class="reviews">
                                <img src="images\resource\r2.jpg" alt="">
                                <h3>Ali Tufan <span>Web designer</span></h3>
                                <p>Without JobSearch i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service</p>
                            </div><!-- Reviews -->
                        </div>
                        <div class="col-lg-6">
                            <div class="reviews">
                                <img src="images\resource\r1.jpg" alt="">
                                <h3>Augusta Silva <span>Web designer</span></h3>
                                <p>Without JobSearch i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service</p>
                            </div><!-- Reviews -->
                        </div>
                        <div class="col-lg-6">
                            <div class="reviews">
                                <img src="images\resource\r2.jpg" alt="">
                                <h3>Ali Tufan <span>Web designer</span></h3>
                                <p>Without JobSearch i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service</p>
                            </div><!-- Reviews -->
                        </div>
                    </div>
                </div>
            </div>
        </div>	
    </div>
</section>
<section>
    <div class="block gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt-4">
                    <div class="heading">
                        <h2>Featured Candidates</h2>
                        <span>Every single one of our jobs has some kind of flexibility option</span>
                    </div><!-- Heading -->
                    <div class="team-sec mb-4">
                        <div class="row" id="team-carousel">
                            @foreach($users as $user)
                            <div class="col-lg-3">
                                <div class="team">
                                    @if(!empty($user->profile->avatar))
                                    <div class="team-img">
                                    <a href="{{route('candidate.index',[$user->user_id])}}"><img src="{{asset('uploads/avatar')}}/{{$user->profile->avatar}}" alt="" style="max-width:50%"></a>
                                    </div>
                                    @else
                                    <div class="team-img">
                                   <a href="{{route('candidate.index',[$user->user_id])}}"> <img src="{{asset('images/candidate.png')}}" alt="" style="max-width:50%"></a>
                                    </div>
                                    @endif
                                    <div class="team-detail">
                                        <h3><a href="{{route('candidate.index',[$user->user_id])}}">{{$user->name}}</a></h3>
                                        <span>{{$user->title}}</span>
                                        <p> {{$user->country}}</p>
                                        <a href="{{route('candidate.index',[$user->user_id])}}">See Profile <i class="la la-long-arrow-right"></i></a>
                                    </div>
                                </div><!-- Team -->
                            </div>
                          @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

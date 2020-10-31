@extends('layouts.frontend')
@section('content')	
<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url(images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>Candidates</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="block no-padding">
        <div class="container">
             <div class="row no-gape" style="margin-bottom: 4.15%">
                 <aside class="col-lg-3 column border-right">
                     <div class="widget">
                         <div class="search_widget_job">
                            <form action="{{route('candidates')}}">
                                <div class="field_w_search">
                                       <input type="text" name="search" id="search" placeholder="Search Candidates">
                                       <i class="la la-search"></i>
                                </div><!-- Search Widget -->
                                <div class="" style="">
                                   <button type="submit" class="btn btn-primary" style="text-align: center">Submit</button>
                               </div>
                               </form>
                         </div>
                     </div>
                   
                 </aside>
                 <div class="col-lg-9 column">
                    @if(count($candidates) > 0)
                     <div class="emply-list-sec">
                        @foreach($candidates as $user)
                         <div class="emply-list">
                             <div class="emply-list-thumb">
                                 <a href="{{route('candidate.index',[$user->user_id])}}" title="">
                                    @if(!empty($user->avatar))
                                    <img src="{{asset('uploads/avatar')}}/{{$user->avatar}}" alt="">
                                     @else
                                 <img src="{{asset('images/candidate.png')}}" alt="">
                                     @endif
                                    </a>
                             </div> 
                             <div class="emply-list-info">
                           <div class="emply-pstn">{{$user->status}}</div>
                                 <h3><a href="{{route('candidate.index',[$user->user_id])}}" title="">{{$user->name}} </a></h3>
                                 <span>{{$user->title}}</span>
                                 <h6><i class="la la-map-marker"></i> {{$user->state}}, {{$user->country}}</h6>
                                 <p>{{ \Illuminate\Support\Str::limit($user->about, 200, $end='...') }}</p>
                             </div>
                             </div><!-- Companies List -->
                             @endforeach
                             
                         <div class="pagination">
                            {{$candidates->appends(Illuminate\Support\Facades\Input::except('page'))->links()}}
                        </div><!-- Pagination -->
                     </div>
                     @else
                     <div class="emply-list-sec mb-4">
                         <div class="emply-list">
                             <div class="emply-list-info">
                            
                                 <p style="text-align: center; color: #fb236a"><i>No Listed Candidates</i></p>
                             </div>
                             </div>
                     </div>
                     @endif
                </div>
             </div>
        </div>
    </div>
</section>
@endsection

@extends('layouts.frontend')
@section('content')	
<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url(images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>Companies</h3>
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
                            <form action="{{route('companies')}}">
                             <div class="field_w_search">
                                    <input type="text" name="search" id="search" placeholder="Search Companies">
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
                    @if(count($companies) > 0)
                     <div class="emply-list-sec">
                        @foreach($companies as $company)
                         <div class="emply-list">
                             <div class="emply-list-thumb">
                                 <a href="{{route('company.index',[$company->id,$company->slug])}}" title="">
                                    @if(!empty($company->avatar))
                                    <img src="{{asset('uploads/logo')}}/{{$company->avatar}}" alt="">
                                     @else
                                 <img src="{{asset('images/company.png')}}" alt="">
                                     @endif
                                    </a>
                             </div> 
                             <div class="emply-list-info">
                                @if(count($company->jobs) >= 2)
                                 <div class="emply-pstn">{{count($company->jobs)}} Posted Jobs</div>
                                 @else
                                 <div class="emply-pstn">{{count($company->jobs)}} Posted Job</div>
                                 @endif
                                 <h3><a href="{{route('company.index',[$company->id,$company->slug])}}" title="">{{$company->cname}}</a></h3>
                                 <span>{{$company->specialization}}</span>
                                 <h6><i class="la la-map-marker"></i> {{$company->state}}, {{$company->country}}</h6>
                                 <p>{{ \Illuminate\Support\Str::limit($company->description, 200, $end='...') }}</p>
                             </div>
                             </div><!-- Companies List -->
                             @endforeach
                             
                         <div class="pagination">
                            {{$companies->appends(Illuminate\Support\Facades\Input::except('page'))->links()}}
                        </div><!-- Pagination -->
                     </div>
                     @else
                     <div class="emply-list-sec">
                         <div class="emply-list">
                             <div class="emply-list-info">
                            
                                 <p style="text-align: center; color: #fb236a"><i>No Listed Company</i></p>
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

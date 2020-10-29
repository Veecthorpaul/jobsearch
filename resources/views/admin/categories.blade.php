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
                           <div class="m-0 p-0"> @include('inc.messages')</div>
                            <div class="border-title"><h3>Categories</h3><a data-toggle="modal" data-target="#modalEducation"><i class="la la-plus"></i> Add Category</a></div>
                          
                            @if(count($categories) > 0)
                              
                            <div class="edu-history-sec">  
                               @foreach($categories as $cat)
                                  <div class="edu-history">
                                    <div class="edu-hisinfo">
                                        
                                        <h3>{{$cat->name}}</h3>
                                        <span>Jobs: <i>{{count($cat->jobs)}}</i></span>
                                        <span>Created at: <i>{{date('d M Y',strtotime($cat->created_at))}}</i></span>
                                    </div>
                                    <ul class="action_job">
                                        <li><a data-toggle="modal" data-target="#exampleModal" data-cat_id="{{$cat->id}}" data-name="{{$cat->name}}" class="btn btn-primary mr-3 p-1" style="color: white">
                                   Edit</a></li>
                                        <li>
                                           <form class="delete" action="{{ route('deletecat', $cat->id) }}" method="POST">
                                               @csrf
                                               <input type="hidden" name="_method" value="DELETE">
                                               <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                               <input class="btn btn-danger" type="submit" value="Delete">
                                           </form>
                                       </li>
                                    </ul>
                                </div>
                                @endforeach
                            </div>

                            <div class="pagination">
                                {{$categories->appends(Illuminate\Support\Facades\Input::except('page'))->links()}}
                            </div><!-- Pagination -->
                            @else
                            <div class="edu-history-sec">
                                <div class="edu-history">
                                    <div class="edu-hisinfo">
                                       <p style="text-align: center; color: #fb236a"><i>No Categories Found</i> </p>
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


    {{-- Add Category Modal --}}
    <div class="modal fade" id="modalEducation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Add Category</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        
        <form action="{{route('createcat')}}" method="post">
            @csrf
             <div class="row">
                 <div class="col-lg-12 mb-4">
                    <span class="pf-title">Name</span>
                    <div class="pf-field">
                        <input type="text" name="name" class="m-0" placeholder="Enter Category Name">
                    </div>
                </div>
                 <div class="col-lg-12">
                    <button type="button" class="btn btn-danger ml-3" data-dismiss="modal">Close</button>
                     <button type="submit">Add</button>
                 </div>
             </div>
         </form>
      </div>
    
    </div>
  </div>
</div>
    {{-- Add Category Modal --}}

      {{-- Edit Category Modal --}}
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Edit Category</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body mx-3">
            
            <form action="{{route('editcat','cat_id')}}" method="post">
                @csrf
                <input type="hidden" id="cat_id" name="cat_id">
                 <div class="row">

                     <div class="col-lg-12">
                        <span class="pf-title">Category Name</span>
                        <div class="pf-field">
                            <input type="text" id="name" name="name"class="m-0">
                        </div>
                    </div>
                     <div class="col-lg-12 mt-4">
                      <button type="button" class="btn btn-danger ml-3" data-dismiss="modal">Close</button>
                         <button type="submit">Update</button>
                         
                     </div>
                 </div>
             </form>
          </div>
        
        </div>
      </div>
    </div>
        {{-- Edit Education Modal --}}

                @endsection
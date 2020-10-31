@extends('layouts.admin')
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
    <div class="block no-padding">
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
                         <div class="profile-title" id="mp">
                             <h3>My Profile</h3>
                             <div class="upload-img-bar">
                             <span>
                                @if(empty(Auth::user()->company->avatar))
                                <img src="{{asset('images\company.png')}}" alt="">
                               @else   
                                   <img src="{{asset('uploads/logo')}}/{{Auth::user()->company->avatar}}" alt="" >
                               @endif
                                </span>
                                 <div class="upload-info">
                                     <a data-toggle="modal" data-target="#modalAvatar">Browse</a>
                                     <span>Max file size is 1MB, Minimum dimension: 270x210 And Suitable files are .jpg & .png</span>
                                 </div>
                             </div>
                         </div>
                         <div class="profile-form-edit">
                             <form action="{{route('companycreate')}}" method="post">
                                @csrf
                                 <div class="row">
                                     <div class="col-lg-6">
                                         <span class="pf-title">Company Name</span>
                                         <div class="pf-field">
                                             <input type="text"  value="{{Auth::user()->company->cname}}" name="cname">
                                         </div>
                                     </div>
                                     <div class="col-lg-6">
                                         <span class="pf-title">Allow In Search</span>
                                         <div class="pf-field">
                                             <select data-placeholder="Please Select Specialism" class="chosen" value="{{Auth::user()->company->search}}" name="search">
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                         </div>
                                     </div>
                                     <div class="col-lg-12">
                                        <span class="pf-title">Specialization</span>
                                        <div class="pf-field">
                                            <input type="text"  value="{{Auth::user()->company->specialization}}" name="specialization">
                                        </div>
                                    </div>
                                     <div class="col-lg-6">
                                         <span class="pf-title">Since</span>
                                         <div class="pf-field">
                                             <input type="text" value="{{Auth::user()->company->since}}" name="since">
                                         </div>
                                     </div>
                                     <div class="col-lg-6">
                                         <span class="pf-title">Team Size</span>
                                         <div class="pf-field">
                                             <input type="text" value="{{Auth::user()->company->team}}" name="team">
                                         </div>
                                        </div>
                                     <div class="col-lg-12">
                                         <span class="pf-title">Description</span>
                                         <div class="pf-field">
                                             <textarea name="description">{{Auth::user()->company->description}}</textarea>
                                         </div>
                                     </div>
                                     <div class="col-lg-12">
                                         <button type="submit">Update</button>
                                     </div>
                                 </div>
                             </form>
                         </div>
                         <div class="contact-edit" id="sn">
                             <h3>Social Edit</h3>
                             <form action="{{route('companysocials')}}" method="post">
                                @csrf
                                 <div class="row">
                                     <div class="col-lg-6">
                                         <span class="pf-title">Facebook</span>
                                         <div class="pf-field">
                                             <input type="text" value="{{Auth::user()->company->facebook}}" name="facebook">
                                             <i class="fa fa-facebook"></i>
                                         </div>
                                     </div>
                                     <div class="col-lg-6">
                                         <span class="pf-title">Twitter</span>
                                         <div class="pf-field">
                                             <input type="text" value="{{Auth::user()->company->twitter}}" name="twitter">
                                             <i class="fa fa-twitter"></i>
                                         </div>
                                     </div>
                                     <div class="col-lg-6">
                                         <span class="pf-title">Instagram</span>
                                         <div class="pf-field">
                                             <input type="text" value="{{Auth::user()->company->instagram}}" name="instagram">
                                             <i class="la la-instagram"></i>
                                         </div>
                                     </div>
                                     <div class="col-lg-6">
                                         <span class="pf-title">Linkedin</span>
                                         <div class="pf-field">
                                             <input type="text" value="{{Auth::user()->company->linkedin}}" name="linkedin">
                                             <i class="fa fa-linkedin"></i>
                                         </div>
                                     </div>
                                     <div class="col-lg-12">
                                        <button type="submit">Update</button>
                                    </div>
                                 </div>
                             </form>
                         </div>
                         <div class="contact-edit" id="ci">
                             <h3>Contact</h3>
                             <form action="{{route('companycontacts')}}" method="post">
                                @csrf
                                 <div class="row">
                                     <div class="col-lg-6">
                                         <span class="pf-title">Phone Number</span>
                                         <div class="pf-field">
                                             <input type="number" placeholder="+90 538 963 58 96" value="{{Auth::user()->company->phone}}" name="phone">
                                         </div>
                                     </div>
                                     <div class="col-lg-6">
                                         <span class="pf-title">Website</span>
                                         <div class="pf-field">
                                             <input type="text" placeholder="www.jobhun.com" value="{{Auth::user()->company->website}}" name="website">
                                         </div>
                                     </div>
                                     <div class="col-lg-4">
                                         <span class="pf-title">Country</span>
                                         <div class="pf-field">
                                            <input type="text" placeholder="www.jobhun.com" value="{{Auth::user()->company->country}}" name="country">
                                         </div>
                                     </div>
                                     <div class="col-lg-4">
                                        <span class="pf-title">State</span>
                                        <div class="pf-field">
                                           <input type="text" placeholder="www.jobhun.com" value="{{Auth::user()->company->state}}" name="state">
                                        </div>
                                    </div>
                                     <div class="col-lg-4">
                                         <span class="pf-title">City</span>
                                         <div class="pf-field">
                                            <input type="text" placeholder="www.jobhun.com" value="{{Auth::user()->company->city}}" name="city">
                                         </div>
                                     </div>
                                     
                                     
                                     <div class="col-lg-12">
                                         <button type="submit">Update</button>
                                     </div>
                                 </div>
                             </form>
                         </div>
                     </div>
                </div>
             </div>
        </div>
    </div>

       {{-- Add Avatar Modal --}}
       <div class="modal fade" id="modalAvatar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
       aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header text-center">
             <h4 class="modal-title w-100 font-weight-bold">Upload Company Logo</h4>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body mx-3">
             
             <form action="{{route('company.logo')}}" method="post" enctype="multipart/form-data">
                 @csrf
                  <div class="row">     
                      <div class="col-lg-12 mb-4">
                         <div class="pf-field">
                             <input type="file" name="avatar" class="m-0">
                         </div>
                     </div>
                      <div class="col-lg-12">
                         <button type="button" class="btn btn-danger ml-3" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Upload</button>
                      </div>
                  </div>
              </form>
           </div>
         
         </div>
       </div>
     </div>
         {{-- Add Avatar Modal --}}
</section>
@endsection


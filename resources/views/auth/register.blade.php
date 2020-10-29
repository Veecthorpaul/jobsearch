@extends('layouts.app')

@section('content')
<div class="container">	
            <div class="account-popup">
                <h3>Sign Up</h3>
        
                <div class="modal-c-tabs">
        
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs md-tabs tabs-2 mb-4 mt-4" role="tablist" style="border:none">
                      <li class="nav-item mr-4">
                        <a class="active p-2" data-toggle="tab" href="#panel7" role="tab"><i class="la la-user mr-1"></i>
                          Candidate	</a>
                         
                      </li>
                      <li class="nav-item">
                        <a class="p-2" data-toggle="tab" href="#panel8" role="tab"><i class="la la-user-plus mr-1"></i>
                          Company</a>
                      </li>
                    </ul>
            
                    <!-- Tab panels -->
                    <div class="tab-content">
                      <!--Panel 7-->
                      <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
                        <p>Register as a Candidate</p>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <input type="hidden" name="user_type" value="seeker">
                            <div class="cfield">
                                <input type="text" id="name" name="name" placeholder="Full Name"  class="{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" required>
                            </div>
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                            <div class="cfield">
                                <input type="text" id="email" name="email" placeholder="Email Address"  class="{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required>
                            </div>	
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif				
                            <div class="cfield">
                                <input type="password" name="password" id="password" placeholder="Password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" required>
                            </div>
                            @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                            <div class="cfield">
                                <input type="password" id="password-confirm" name="password_confirmation" placeholder="Confirm Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required>
                            </div>		
                            <button type="submit" style="background: #141f72; padding: 3% 10%; color: white; border-radius: 8px">Register</button>
                        </form> 
            
                      </div>
                      <!--/.Panel 7-->
            
                      <!--Panel 8-->
                      <div class="tab-pane fade" id="panel8" role="tabpanel">
                        <p>Register as a Company</p>
                        <form method="POST" action="{{ route('empregister') }}">
                            @csrf
                            <input type="hidden" name="user_type" value="employer">
                            <div class="cfield">
                                <input type="text" id="name" name="name" placeholder="Full Name"  class="{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" required>
                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                            </div>
                            <div class="cfield">
                                <input type="text" id="cname" name="cname" placeholder="Company Name"  class="{{ $errors->has('cname') ? ' is-invalid' : '' }}" value="{{ old('cname') }}" required>
                            </div>
                            @if ($errors->has('cname'))
                            <span class="text-danger">{{ $errors->first('cname') }}</span>
                        @endif
                            <div class="cfield">
                                <input type="text" id="email" name="email" placeholder="Email Address"  class="{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required>
                            </div>		
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif			
                            <div class="cfield">
                                <input type="password" name="password" id="password" placeholder="Password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" required>
                            </div>
                            @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                            <div class="cfield">
                                <input type="password" id="password-confirm" name="password_confirmation" placeholder="Confirm Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required>
                            </div>		
                            <button type="submit" style="background: #141f72; padding: 3% 10%; color: white; border-radius: 8px">Register</button>
                        </form> 
                      </div>
                      <!--/.Panel 8-->
                    </div>
            
                  </div>	
    </div>
</div>
@endsection

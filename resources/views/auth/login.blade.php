@extends('layouts.app')

@section('content')
<div>
	<div class="account-popup" style="margin-bottom: 62px">
		<h3>Login</h3>
		@if(Session::has('message'))
		<div class="alert alert-success">
			{{Session::get('message')}}
		</div>
	@endif  
	<form method="POST" action="{{ route('login') }}">
		@csrf
			<div class="cfield">
				<input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email address">
				<i class="la la-user"></i>
            </div>
            @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
			<div class="cfield">
				<input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
				<i class="la la-key"></i>
            </div>
            @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
			<p class="remember-label">
				<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}><label for="cb1">Remember me</label>
				
			</p>
			@if (Route::has('password.request'))
			<a href="{{ route('password.request') }}">
				{{ __('Forgot Your Password?') }}
			</a>
		@endif
			<button type="submit">Login</button>
		</form>
	</div>
</div>
@endsection

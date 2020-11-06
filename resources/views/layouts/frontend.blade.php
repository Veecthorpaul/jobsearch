<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Job Search</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Joshua Paul">

	<!-- Styles -->
<link rel="stylesheet" type="text/css" href="{{asset('css\bootstrap-grid.css')}}">
<link rel="stylesheet" href="{{asset('css\icons.css')}}">
<link rel="stylesheet" href="{{asset('css\animate.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css\style.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css\responsive.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css\chosen.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css\colors\colors.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css\bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css\flick.css')}}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<style media="screen">
	.carousel-cell {
	  width: 100%;
	  }
  
	  /* cell number */
	  .carousel-cell:before {
		display: block;
	  }
	</style>
<body class="newbg">	

<div class="theme-layout" id="scrollup">
	
	<div class="responsive-header">
		<div class="responsive-menubar">
		<div class="res-logo"><a href="{{route('home')}}" title=""><img src="{{asset('images\resource\logo2.png')}}" alt=""></a></div>
			<div class="menu-resaction">
				<div class="res-openmenu">
				<img src="{{asset('images\icon.png')}}" alt=""> Menu
				</div>
				<div class="res-closemenu">
					<img src="{{asset('images\icon2.png')}}" alt=""> Close
				</div>
			</div>
		</div>
		<div class="responsive-opensec">
			<div class="responsivemenu">
				<ul>
						<li class="">
							<a href="{{route('home')}}" title="">Home</a>
						</li>
						<li class="">
						<a href="{{route('companies')}}" title="Companies">Companies</a>
							
						</li>
						<li class="">
						<a href="{{route('candidates')}}" title="Candidates">Candidates</a>
						</li>
					
						<li class="">
							<a href="{{route('jobs')}}" title="Jobs">Jobs</a>
						</li>
						@if (Auth::guest())
						<li class=""><a href="{{route('register')}}" title="SignUp"></i> Sign Up</a></li>
					<li class="signin-popup"><a href="{{route('login')}}"></i> Login</a></li>
					@elseif(auth::user()->user_type=='seeker')
					<li class="">
						<a href="{{route('user.profile')}}" title="Candidates" >Dashboard</a>
						</li>
						
						<li class="">
							<a href="{{ route('logout') }}" onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
		 Logout
	   </a>
	   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			   @csrf
		   </form>
		   
						</li>
						@elseif(auth::user()->user_type=='employer')
						<li class="">
							<a href="{{route('user.profile')}}" title="Candidates" >Dashboard</a>
							</li>
							<li class="">
								<a href="{{ route('logout') }}" onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">
			 Logout
		   </a>
		   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				   @csrf
			   </form>
			   
							</li>
							@elseif(auth::user()->user_type=='admin')
							<li class="">
								<a href="{{route('dashboard')}}" title="Candidates" >Dashboard</a>
								</li>
					
						<li class="">
							<a href="{{ route('logout') }}" onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
		 Logout
	   </a>
	   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			   @csrf
		   </form>
		   
						</li>
						@endif
					</ul>
			</div>
		</div>
	</div>

	<header class="stick-top forsticky new-header">
		<div class="menu-sec">
			<div class="container">
				<div class="logo">
				<a href="{{route('home')}}" title=""><img class="hidesticky" src="{{asset('images\resource\logo.png')}}" alt=""><img class="showsticky" src="{{asset('images\resource\logo.png')}}" alt=""></a>
				</div><!-- Logo -->
				<div class="btn-extars">
					<ul class="account-btns">
						@if (Auth::guest())
						<li class=""><a href="{{route('register')}}" title="SignUp"></i> Sign Up</a></li>
					<li><a href="{{route('login')}}"></i> Login</a></li>
					@elseif(auth::user()->user_type=='seeker')
					<li class="">
						<a href="{{route('user.profile')}}" title="Candidates" >Dashboard</a>
						</li>
						<li class="">
							<a href="{{ route('logout') }}" onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
		 Logout
	   </a>
	   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			   @csrf
		   </form>
						@elseif(auth::user()->user_type=='employer')
						<li class="">
							<a href="{{route('user.profile')}}" title="Candidates" >Dashboard</a>
							</li>
							<li class="">
								<a href="{{ route('logout') }}" onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">
			 Logout
		   </a>
		   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				   @csrf
			   </form>
							@elseif(auth::user()->user_type=='admin')
							<li class="">
								<a href="{{route('dashboard')}}" title="Candidates" >Dashboard</a>
								</li>
						<li class="">
							<a href="{{ route('logout') }}" onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
		 Logout
	   </a>
	   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			   @csrf
		   </form>
		   @endif
					</ul>
				</div><!-- Btn Extras -->
				<nav>
					<ul>
						<li class="">
							<a href="{{route('home')}}" title="">Home</a>
						</li>
						<li class="">
						<a href="{{route('companies')}}" title="Companies">Companies</a>
							
						</li>
						<li class="">
						<a href="{{route('candidates')}}" title="Candidates">Candidates</a>
						</li>
					
						<li class="">
							<a href="{{route('jobs')}}" title="Jobs">Jobs</a>
						</li>

					</ul>
				</nav><!-- Menus -->
			</div>
		</div>
	</header>
	@include('inc.messages')
	@yield('content')

	<footer>

		<div class="bottom-line">
			<span>Developed by <a href="https://github.com/veecthorpaul">Joshua Paul</a></span>
			<a href="#scrollup" class="scrollup" title=""><i class="la la-arrow-up"></i></a>
		</div>
	</footer>
</div>

<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="{{asset('js\jquery.min.js')}}" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>var $oldjQuery = $.noConflict(true);</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script src="{{asset('js\modernizr.js')}}" type="text/javascript"></script>
<script src="{{asset('js\script.js')}}" type="text/javascript"></script>
<script src="{{asset('js\bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js\wow.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js\slick.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js\parallax.js')}}" type="text/javascript"></script>
<script src="{{asset('js\select-chosen.js')}}" type="text/javascript"></script>
<script src="{{asset('js\flick.js')}}" type="text/javascript"></script>
<script>

    if ($("#contact_us").length > 0) {
 
     $("#contact_us").validate({
 
       
 
     rules: {
 
       name: {
 
         required: true,
 
       },

        message: {
 
             required: true,
 
         },
 
         email: {
 
                 required: true,   
                 email: true,
 
             },    
 
     },
 
     messages: {
  name: {
 
         required: "Please enter name",
 
       },
 
       message: {
 
         required: "Please enter message",
 
       },
 
       email: {
 
           required: "Please enter valid email",
 
           email: "Please enter valid email",
 
         },     
 
     },
 
     submitHandler: function(form) {
 
      $.ajaxSetup({
 
           headers: {
 
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
 
           }
 
       });
 
       $('#send_form').html('Sending..');
 
       $.ajax({
 
         url: "{{route("contact")}}",
 
         type: "POST",
 
         data: $('#contact_us').serialize(),
 
         success: function( response ) {
 
             $('#send_form').html('Submit');
 
             $('#res_message').show();
 
             $('#res_message').html(response.msg);
 
             $('#msg_div').removeClass('d-none');
 
 
             document.getElementById("contact_us").reset(); 
 
             setTimeout(function(){
 
             $('#res_message').hide();
 
             $('#msg_div').hide();
 
             },10000);
 
         }
 
       });
 
     }
 
   })
 
 }
 
 </script>
</body>
</html>

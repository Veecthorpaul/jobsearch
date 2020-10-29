
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Job Search</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
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
					
						<li class="">
							<a href="{{ route('logout') }}" onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
		 Logout
	   </a>
	   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			   @csrf
		   </form>
	</li>
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
				<div class="my-profiles-sec">
                    <span style="color: black">
                        {{Auth::user()->name}} <i class="la la-bars"></i></span>
				</div>
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
	@yield('content')

	<footer class="mt-4">

		<div class="bottom-line">
			<span>Developed by <a href="https://github.com/veecthorpaul">Joshua Paul</a></span>
			<a href="#scrollup" class="scrollup" title=""><i class="la la-arrow-up"></i></a>
		</div>
	</footer>
</div>
<div class="profile-sidebar">
	<span class="close-profile"><i class="la la-close"></i></span>
	<div class="can-detail-s">
		@if(empty(Auth::user()->profile->avatar))
		<div class="cst"><img src="{{asset('images\resource\es1.jpg')}}" alt=""></div>
	@else   
	<div class="cst"><img src="{{asset('uploads/avatar')}}/{{Auth::user()->profile->avatar}}" alt=""></div>
	@endif
		<h3>{{auth()->user()->name}}</h3>
		@if(Auth::user()->profile->title) 
		<span><i>{{Auth::user()->profile->title}}</i></span>
	@endif		
		<p>Member Since, {{date('M Y',strtotime(Auth::user()->created_at))}}</p>
		@if(Auth::user()->profile->state && Auth::user()->profile->country)
		<p><i class="la la-map-marker"></i>{{Auth::user()->profile->state}} /{{Auth::user()->profile->country}}</p>
	@endif	 
	</div>
	<div class="tree_widget-sec">
		<ul>
			<li><a href="{{route('user.profile')}}" title=""><i class="la la-file-text"></i>My Profile</a></li>
			<li><a href="{{route('userexperience')}}" title=""><i class="la la-briefcase"></i>Experience</a></li>
			<li><a href="{{route('userappliedjobs')}}" title=""><i class="la la-paper-plane"></i>Applied Jobs</a></li>
			<li><a href="{{route('userchangepassword')}}" title=""><i class="la la-flash"></i>Change Password</a></li>
            <li><a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i class="la la-unlink"></i>
Logout
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
   @csrf
</form></li>
		</ul>
	</div>
</div><!-- Profile Sidebar -->
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="{{asset('js\jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js\modernizr.js')}}" type="text/javascript"></script>
<script src="{{asset('js\script.js')}}" type="text/javascript"></script>
<script src="{{asset('js\bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js\wow.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js\slick.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js\parallax.js')}}" type="text/javascript"></script>
<script src="{{asset('js\select-chosen.js')}}" type="text/javascript"></script>
<script src="{{asset('js\jquery.scrollbar.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js\circle-progress.min.js')}}" type="text/javascript"></script>
<script>
    $('#exampleModal').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget)
    var organization = button.data('organization')
    var type = button.data('type')
    var end = button.data('end')
    var start = button.data('start')
    var name = button.data('name')
    var qualification = button.data('qualification')
    var description = button.data('description')
    var edu_id = button.data('edu_id')
    var modal = $(this)
    modal.find('.modal-title').text('Edit Education');
    modal.find('.modal-body #name').val(name);
    modal.find('.modal-body #organization').val(organization);
    modal.find('.modal-body #type').val(type);
    modal.find('.modal-body #end').val(end);
    modal.find('.modal-body #start').val(start);
    modal.find('.modal-body #qualification').val(qualification);
    modal.find('.modal-body #description').val(description);
    modal.find('.modal-body #edu_id').val(edu_id);
	});
	
	$('#exampleModal1').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget)
    var organization = button.data('organization')
    var type = button.data('type')
    var end = button.data('end')
    var start = button.data('start')
    var name = button.data('name')
    var qualification = button.data('qualification')
    var description = button.data('description')
    var job_id = button.data('job_id')
    var modal = $(this)
    modal.find('.modal-title').text('Edit Work Experience');
    modal.find('.modal-body #name').val(name);
    modal.find('.modal-body #organization').val(organization);
    modal.find('.modal-body #type').val(type);
    modal.find('.modal-body #end').val(end);
    modal.find('.modal-body #start').val(start);
    modal.find('.modal-body #qualification').val(qualification);
    modal.find('.modal-body #description').val(description);
    modal.find('.modal-body #job_id').val(job_id);
    });

	$(".delete").on("submit", function(){
        return confirm("Do you want to delete this record?");
    });
  
    </script>
</body>
</html>
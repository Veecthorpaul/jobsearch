<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" type="text/css" href="{{asset('css\style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css\bootstrap-grid.css')}}">
<link rel="stylesheet" href="{{asset('css\icons.css')}}">
<link rel="stylesheet" href="{{asset('css\animate.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css\style.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css\responsive.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css\chosen.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css\colors\colors.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css\bootstrap.css')}}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
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
                                <a href="{{route('register')}}" title="Sign Up">Sign Up</a>
                            </li>
                            <li class="">
                                <a href="{{route('login')}}" title="Log In">Log In</a>
                            </li>

                        </ul>
                </div>
            </div>
        </div>
        
        <header class="stick-top forsticky new-header">
            <div class="menu-sec">
                <div class="container">
                    <div class="logo">
                    <a href="{{route('home')}}" title=""><img class="hidesticky" src="{{asset('images\resource\logo.png')}}" alt=""><img class="showsticky" src="images\resource\logo.png" alt=""></a>
                    </div><!-- Logo -->
                    <div class="btn-extars">
                        <ul class="account-btns">
                            <li class="signup-popup"><a href="{{route('register')}}"></i> Sign Up</a></li>
                        <li class="signin-popup"><a href="{{route('login')}}"></i> Login</a></li>
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

        <main class="py-4">
            @yield('content')
        </main>
        <footer class="mt-4">

            <div class="bottom-line">
                <span>Developed by <a href="https://github.com/veecthorpaul">Joshua Paul</a></span>
                <a href="#scrollup" class="scrollup" title=""><i class="la la-arrow-up"></i></a>
            </div>
        </footer>
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="{{asset('js\jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js\modernizr.js')}}" type="text/javascript"></script>
<script src="{{asset('js\script.js')}}" type="text/javascript"></script>
<script src="{{asset('js\bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js\wow.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js\slick.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js\parallax.js')}}" type="text/javascript"></script>
<script src="{{asset('js\select-chosen.js')}}" type="text/javascript"></script>
</body>
</html>

<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
	
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>@hasSection('title')
        @yield('title')
        @else
        Home page
        @endif</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="{{url('frontend/css/linearicons.css')}}">
			<link rel="stylesheet" href="{{url('frontend/css/font-awesome.min.css')}}">
			<link rel="stylesheet" href="{{url('frontend/css/bootstrap.css')}}">
			<link rel="stylesheet" href="{{url('frontend/css/magnific-popup.css')}}">
			<link rel="stylesheet" href="{{url('frontend/css/animate.min.css')}}">
			<link rel="stylesheet" href="{{url('frontend/css/owl.carousel.css')}}">
			<link rel="stylesheet" href="{{url('frontend/css/main.css')}}">
		
			
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		</head>
		<body>
			<!-- start banner Area -->
			<section class="banner-area" id="home">
				<!-- Start Header Area -->
				<header class="default-header">
					<nav class="navbar navbar-expand-lg bg-light navbar-light">
						<div class="container">
							  <a class="navbar-brand" href="{{url('/')}}">
							  	<!-- <img src="{{url('frontend/img/lgoo.jpeg')}}" height="40px" alt=""> -->
								<h3><u>E-Coureer </u> </h3>
							  </a>
							
							   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							    <span class="text-white lnr lnr-menu"></span>
							  </button>

							  <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
							    <ul class="navbar-nav">
									<li class="nav-item"><a class="nav-link"  href="{{ url('/')}}">Home</a></li>
									<li class="nav-item"><a class="nav-link" href="{{ url('about')}}">About</a></li>									
									<li class="nav-item"><a class="nav-link" href="{{ url('service')}}">Service</a></li>
									<li class="nav-item"><a class="nav-link" href="{{ url('pricing')}}">Pricing</a></li>
									
									
									<li class="nav-item"><a class="nav-link" href="{{ url('contact')}}">Contact</a></li>
									<li class="nav-item"><a class="nav-link" href="{{ url('tracking')}}">Traking</a></li>
									
									<!-- Dropdown -->
									@guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
						<li class="nav-item">
                                    <a class="nav-link" href="{{ route('home') }}">{{ __('Profile') }}</a>
                                </li>
									
                            
                        @endguest
							@auth('admin')
								<li class="nav-item">
                                    <a class="nav-link" href="{{url('adminpanel')}}">{{ __('Admin') }}</a>
                                </li>
							@endauth
							@auth('rider')
								<li class="nav-item">
                                    <a class="nav-link" href="{{url('rhome')}}">{{ __('Rider') }}</a>
                                </li>
							@endauth
							@auth('manager')
								<li class="nav-item">
                                    <a class="nav-link" href="{{url('managerpanel')}}">{{ __('Manager') }}</a>
                                </li>
							@endauth
							    
							    </ul>
							  </div>						
						</div>
					</nav>
				</header>
				<!-- End Header Area -->				
			</section>

			
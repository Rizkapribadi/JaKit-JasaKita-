<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>JASA KITA</title>	
    <link rel="shortcut icon" type="image/x-icon" href="/assets/images/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset ('assets/css/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset ('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset ('assets/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset ('assets/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset ('assets/css/flexslider.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset ('assets/css/chosen.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset ('assets/css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset ('assets/css/color-01.css') }}">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" integrity="sha512-aEe/ZxePawj0+G2R+AaIxgrQuKT68I28qh+wgLrcAJOz3rxCP+TwrK5SPN+E5I+1IQjNtcfvb96HDagwrKRdBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/12.0.0/nouislider.min.css" integrity="sha512-kSH0IqtUh1LRE0tlO8dWN7rbmdy5cqApopY6ABJ4U99HeKulW6iKG5KgrVfofEXQOYtdQGFjj2N/DUBnj3CNmQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @livewireStyles
	
</head>
<body class="home-page home-01 ">

	<!-- mobile menu -->
    <div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
        </div>
        <div class="mercado-panels"></div>
    </div>

	<!--header-->
	<header id="header" class="header header-style-1">
		<div class="container-fluid">
			<div class="row">
				<div class="topbar-menu-area">
					<div class="container">
						<div class="topbar-menu left-menu">	
						</div>
						<div class="topbar-menu right-menu">
							<ul>
								@if(Route::has('login'))
									@auth
										@if(Auth::user()->utype === 'ADM')
											<li class="menu-item menu-item-has-children parent" >
												<a title="My Account" href="#">My Account ({{ Auth::user()->name }})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
												<ul class="submenu curency" >
													<li class="menu-item" >
														<a title="Dashboard" href="{{ route('admin.dashboard') }}">Dashboard</a>
													</li>
													
													<li class="menu-item" >
														<a title="Categories" href="{{ route('admin.categories') }}">Categories</a>
													</li>
													<li class="menu-item" >
														<a title="Subcategories" href="{{ route('admin.subcategories') }}">Subcategories</a>
													</li>
													<li class="menu-item" >
														<a title="Services" href="{{ route('admin.services') }}">Jasa</a>
													</li>
													<li class="menu-item" >
														<a title="Manage Home Categories" href="{{ route('admin.homecategories') }}">Manage Home Category</a>
													</li>
													<li class="menu-item" >
														<a title="Sale Setting" href="{{ route('admin.sale') }}">Sale Setting</a>
													</li>
													<li class="menu-item" >
														<a title="Advertisement" href="{{ route('admin.advertisement') }}">Advertisement</a>
													</li>
													<li class="menu-item" >
														<a title="My Profile" href="{{ route('admin.profile') }}">My Profile</a>
													</li>
													<li class="item-menu">
														<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
													</li>
													<form id ="logout-form" method="POST" action="{{ route('logout') }}"> 
														@csrf	
													</form>
												</ul>
											</li>
										@else
											<li class="menu-item menu-item-has-children parent" >
												<a title="My Account" href="#">My Account ({{ Auth::user()->name }})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
												<ul class="submenu curency" >
													<li class="menu-item" >
														<a title="Dashboard" href="{{ route('user.dashboard') }}">Dashboard</a>
													</li>
													
													<li class="menu-item" >
														<a title="My Orders" href="{{ route('user.orders') }}">My Orders</a>
													</li>
													<li class="menu-item" >
														<a title="Services" href="{{ route('user.services') }}">Jasa</a>
													</li>
													<li class="menu-item" >
														<a title="All Coupons" href="{{ route('user.coupons') }}">All Coupons</a>
													</li>
													<li class="menu-item" >
														<a title="My Profile" href="{{ route('user.profil') }}">My Profile</a>
													</li>
													<li class="item-menu">
														<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
													</li>
													<form id ="logout-form" method="POST" action="{{ route('logout') }}"> 
														@csrf
													</form>
												</ul>
											</li>	
										@endif
									@else
										<li class="menu-item" ><a title="Register or Login" href="{{route('login') }}">Login</a></li>
										<li class="menu-item" ><a title="Register or Login" href="{{route('register') }}">Register</a></li>
									@endif
								@endif
							</ul>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="mid-section main-info-area">
						<div class="wrap-logo-top left-section">
							<a href="/" class="link-to-home"><img src="{{ asset('assets/images/logo-top-1.png')}}" alt="mercado"></a>
						</div>
						@livewire('header-search-component')
						<div class="wrap-icon right-section">
							
							@livewire('order-count-component')

							@livewire('cart-count-component')
							<div class="wrap-icon-section show-up-after-1024">
								<a href="#" class="mobile-navigation">
									<span></span>
									<span></span>
									<span></span>
								</a>
							</div>
						</div>
						<div class="wrap-icon right-section">
							@livewire('favorite-count-component')
						</div>		
					</div>
				</div>
				<div class="nav-section header-sticky">
					<div class="header-nav-section">	
					</div>	
					@include('layouts.nav.nav')
				</div>
			</div>
		</div>
	</header>

{{$slot}}
	<script src="{{ asset('assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
	<script src="{{ asset('assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.flexslider.js') }}"></script>
	{{-- <script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script> --}}
	<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>

	<script src="{{ asset('assets/js/functions.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha512-GDey37RZAxFkpFeJorEUwNoIbkTwsyC736KNSYucu1WJWFK9qTdzYub8ATxktr6Dwke7nbFaioypzbDOQykoRg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/12.0.0/nouislider.min.js" integrity="sha512-6vo59lZMHB6GgEySnojEnfhnugP7LR4qm6akxptNOw/KW+i9o9MK4Gaia8f/eJATjAzCkgN3CWlIHWbVi2twpg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
	@livewireScripts

	@stack('scripts')

</body>
</html>
<!doctype html>
<html lang="zxx">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('vendor/rimu/assets/css/bootstrap.min.css')}}">
        <!-- Owl Theme Default CSS -->
        <link rel="stylesheet" href="{{asset('vendor/rimu/assets/css/owl.theme.default.min.css')}}">
        <!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="{{asset('vendor/rimu/assets/css/owl.carousel.min.css')}}">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="{{asset('vendor/rimu/assets/css/animate.css')}}">
        <!-- Flaticon CSS -->
		<link rel="stylesheet" href="{{asset('vendor/rimu/assets/css/flaticon.css')}}">
        <!-- Font Awesome CSS -->
		<link rel="stylesheet" href="{{asset('vendor/rimu/assets/css/font-awesome.min.css')}}">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="{{asset('vendor/rimu/assets/css/meanmenu.css')}}">
        <!-- Nice Select CSS -->
        <link rel="stylesheet" href="{{asset('vendor/rimu/assets/css/nice-select.css')}}">
        <!-- Imagelightbox CSS -->
		<link rel="stylesheet" href="{{asset('vendor/rimu/assets/css/imagelightbox.min.css')}}">
		<!-- Odometer CSS-->
		<link rel="stylesheet" href="{{asset('vendor/rimu/assets/css/odometer.css')}}">
        <!-- Style CSS -->
        <link rel="stylesheet" href="{{asset('vendor/rimu/assets/css/style.css')}}">
        <!-- Responsive CSS -->
		<link rel="stylesheet" href="{{asset('vendor/rimu/assets/css/responsive.css')}}">

		<!-- Favicon -->
        <link rel="icon" type="image/png" href="{{asset('vendor/rimu/assets/img/favicon.png')}}">
        <!-- TITLE -->
        <title>SABOR-udruzenje zena</title>
    </head>

    <body>
		<!-- Start Preloader Area -->
		<div class="preloader">
			<div class="lds-ripple">
				<div></div>
				<div></div>
			</div>
		</div>
        <!-- End Preloader Area -->
        <!-- Start Rimu Navbar Area -->
        <div class="rimu-nav-style fixed-top">
            <div class="navbar-area">
                <!-- Menu For Mobile Device -->
                <div class="mobile-nav">
                    <a href="{{route('front.home')}}" class="logo">
                        <img src="{{asset('img/logo.png')}}" width="40" alt="Sabor Logo">
                    </a>
                </div>

                <!-- Menu For Desktop Device -->
                <div class="main-nav">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <div class="container">


                            <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                                <ul class="navbar-nav mx-auto">
                                    <li class="nav-item">
                                        <a class="navbar-brand" href="{{route('front.home')}}">
                                            <img src="{{asset('img/logo.png')}}?v=3" width="100" alt="Sabor Logo">
                                        </a>
                                    </li>

                                </ul>
                                <div class="others-option">

                                    <div class="search-box-item">
                                        <i class="search-btn fa fa-search"></i>
                                        <i class="close-btn fa fa-close"></i>
                                        <div class="search-overlay search-popup">
                                            <div class='search-box'>
                                                <form class="search-form">
                                                    <input class="search-input" name="search" placeholder="Search" type="text">
                                                    <button class="search-button" type="submit">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="sidebar-menu" href="#" data-toggle="modal" data-target="#myModal2">
                                        <i class="fa fa-bars"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- End Rimu Navbar Area -->
        <!-- Start Sidebar Modal -->
<div class="sidebar-modal">
    <div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="fa fa-times"></i>
                        </span>
                    </button>
                    <h2 class="modal-title" id="myModalLabel2">
                        <a href="{{route('front.home')}}">
                            <img src="{{asset('img/logo.png')}}?v=3" width="70" alt="Sabor Logo">
                        </a>
                    </h2>
                </div>
                <div class="modal-body">
                    <div class="sidebar-modal-widget">
                        <h3 class="title">{{__('Additional Links')}}</h3>
                        <ul>
     @guest
                <li >
                    <a  href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @else
                <li>
                    <a href="{{route('front.profile')}}">
                        <i class="fa fa-user"></i>  {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                </li>
                <li>
                    <a  href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                                  <i class="fa fa-sign-out"></i>  {{ __('Logout') }}
                 </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
     @endguest
                        </ul>
                    </div>
                    <div class="sidebar-modal-widget">
                        <h3 class="title">{{__('Contact Info')}}</h3>
                        <ul class="contact-info">
                            <li>
                                <i class="fa fa-map-marker"></i>
                                {{__('Address')}}
                                <span>Kralja Petra I 136/39 , Kosovska Mitrovica</span>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i>
                                Email
                                <span>saborkm@gmail.com</span>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i>
                                {{__('Phone')}}
                                <span>+381 (0)65 80 63 087</span>
                            </li>
                        </ul>
                    </div>
                    <div class="sidebar-modal-widget">
                        <h3 class="title">{{__('Connect With Us')}}</h3>
                        <ul class="social-list">
                            <li>
                                <a href="https://www.facebook.com/Sabor-Udruzenje-zena-495566330624407/" target="_blank">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Sidebar Modal -->
   @yield('content')

		<!-- Start Footer Bottom Area -->
		<footer class="footer-bottom-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<div>
							<p>Copyright © <a href="https:\\logidevs.com" style="color: white;" target="_blank">LOGIDEVS</a>. All Rights Reserved</p>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- End Footer Bottom Area -->

		<!-- Start Go Top Area -->
		<div class="go-top">
			<i class="fa fa-angle-double-up"></i>
			<i class="fa fa-angle-double-up"></i>
		</div>
		<!-- End Go Top Area -->


        <!-- Jquery Slim JS -->
        <script src="{{asset('vendor/rimu/assets/js/jquery-3.2.1.slim.min.js')}}"></script>
        <!-- Popper JS -->
        <script src="{{asset('vendor/rimu/assets/js/popper.min.js')}}"></script>
        <!-- Bootstrap JS -->
        <script src="{{asset('vendor/rimu/assets/js/bootstrap.min.js')}}"></script>
        <!-- Meanmenu JS -->
		<script src="{{asset('vendor/rimu/assets/js/jquery.meanmenu.js')}}"></script>
        <!-- Wow JS -->
        <script src="{{asset('vendor/rimu/assets/js/wow.min.js')}}"></script>
        <!-- Owl Carousel JS -->
		<script src="{{asset('vendor/rimu/assets/js/owl.carousel.js')}}"></script>
        <!-- Mixitup JS -->
		<script src="{{asset('vendor/rimu/assets/js/jquery.mixitup.min.js')}}"></script>
        <!-- Nice Select JS -->
		<script src="{{asset('vendor/rimu/assets/js/jquery.nice-select.min.js')}}"></script>
        <!-- Imagelightbox JS -->
		<script src="{{asset('vendor/rimu/assets/js/imagelightbox.min.js')}}"></script>
		<!-- Appear JS -->
        <script src="{{asset('vendor/rimu/assets/js/jquery.appear.js')}}"></script>
		<!-- Odometer JS -->
        <script src="{{asset('vendor/rimu/assets/js/odometer.min.js')}}"></script>
		<!-- Rimu Map JS FILE -->
        <script src="{{asset('vendor/rimu/assets/js/rimu-map.js')}}"></script>
        <!-- Custom JS -->
        <script src="{{asset('vendor/rimu/assets/js/custom.js')}}"></script>

        @yield('script')
    </body>
</html>

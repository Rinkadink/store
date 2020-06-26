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
        <link rel="stylesheet" href="{{asset('vendor/rimu/assets/css/style.css').'?t='.time()}}">
        <!-- Responsive CSS -->
		<link rel="stylesheet" href="{{asset('vendor/rimu/assets/css/responsive.css')}}">
        @yield('style')
		<!-- Favicon -->
        <link rel="icon" type="image/png" href="{{asset('vendor/rimu/assets/img/favicon.png')}}">
        <!-- TITLE -->
        <title>SABOR - udruženje žena</title>
    </head>

    <body style="background:url('{{asset('img/bg.jpg')}}') no-repeat center center fixed;
  background-size: cover;">
		<!-- Start Preloader Area -->
		<div class="preloader">
			<div class="lds-ripple">
				<div></div>
				<div></div>
			</div>
		</div>
		<div class="container py-2">
			<div class="row">
				<div class="col-md-4">
					<div style="line-height:100px;">
						<a href="{{ route('language','sr') }}"><img src="{{asset('img/country/serbia.png')}}" width="30" style="padding-left:10px;" alt=""></a>
						<a href="{{ route('language','en') }}"><img src="{{asset('img/country/england.png')}}" width="30" style="padding-left:10px;" alt=""></a>
						<a href="{{ route('language','al') }}"><img src="{{asset('img/country/albania.png')}}" width="30" style="padding-left:10px;" alt=""></a>
					</div>
				</div>
				<div class="col-md-4 text-center">
					<a href="{{route('front.home')}}"><img src="{{asset('img/logo.png')}}" width="100" alt=""></a>
				</div>
				<div class="col-md-4 text-right">
					<div class="row">
						<div class="col-md-12 top-nav">
                            <a href="{{route('front.aboutUs')}}">O nama</a> |
                            <a href="{{route('front.contact')}}">Kontakt</a> |
                            @guest
							<a href="{{route('login')}}">Prijavi se</a>
							@else
							<a href="{{route('front.profile')}}">{{\Auth::user()->name}}</a> |
							                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
							@endguest
						</div>
					</div>

						<div class="col-md-12">
                            <form action="{{route('front.articles')}}" method="GET">
                            @csrf
                            <div class="input-group m-3" style="border-radius:0;background-color: white;">
                                <input type="text" name="search" value="{{request('search')}}" class="form-control" placeholder="Pretraži proizvode" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                  <button class="btn btn-outline-secondary" style="border-radius:0;background-color: transparent;
                                  background-image: linear-gradient(225deg,rgb(0, 200, 83) 0%, rgb(33, 150, 243) 100%);color:white;" type="submit"><i class="fa fa-search mx-2" aria-hidden="true"></i></button>
                                </div>
                              </div>
                            </form>

						</div>


				</div>
			</div>
		</div>
        <!-- End Preloader Area -->

				<!-- Menu For Desktop Device -->
				<div class="container">
					<nav class="navbar navbar-expand-lg navbar-light bg-light p-0" style="border:1px solid #eeeeee;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: transparent;
    background-image: linear-gradient(225deg,rgb(0, 200, 83) 0%, rgb(33, 150, 243) 100%);color:white;">
          {{__('KUPUJ PO KATEGORIJAMA')}} <i class="fa fa-caret-down" aria-hidden="true"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach($menu_categories as $menu_category)
          <a class="dropdown-item" href="{{route('front.articles',['category'=>$menu_category->id])}}">{{strtoupper($menu_category->name)}}</a>
           @endforeach
        </div>
      </li>
            <li class="nav-item">
        <a class="nav-link"  href="{{route('front.stores')}}"><i class="fa fa-shopping-basket text-danger" aria-hidden="true"></i>{{__('Prodavnice')}}</a>
      </li>

    </ul>
  </div>
</nav>
				</div>
		@yield('content')
        <!-- Start Footer Top Area -->
		<section class="footer-top-area pt-100 pb-70 mt-4">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-sm-6 col-md-6">
						<div class="text-center">
                            <a href="{{route('front.home')}}">
                                <img src="{{asset('img/logo.png')}}" width="100" alt="" class="img-fluid">
                            </a>

						<br>
						Uz podršku <span style="color:blue;font-weight: bold;">UNMIK-a</span>
						</div>

					</div>
					<div class="col-lg-6 col-sm-6 col-md-6">
						<div class="single-widget text-center">
							<p>Udruženje žena “SABOR” je nevladino, nepolitičko, neprofitno i dobrovoljno udruženje osnovano 2000 godine sa ciljem socijalnog i ekonomskog osnaživanja žena , sa posebnim osvrtom na razvoj ženskog preduzetništva.</p>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6 col-md-6 text-center">
						<div class="single-widget single-widget-4">
							<ul class="social-icon">
								<li>
									<a href="https://www.facebook.com/pages/category/Organization/Sabor-Udruzenje-zena-495566330624407/" target="_blank">
										<i class="fa fa-facebook" style="width:80px;height:80px;line-height:80px;font-size:40px;" ></i>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Footer Top Area -->

		<!-- Start Footer Bottom Area -->
		<footer class="footer-bottom-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div>
							<p>Copyright © LogiDEVS. All Rights Reserved</p>
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

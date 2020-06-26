@extends('layouts.front')

@section('content')


<section style="" class="bg-white">
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
  	@for($i=0;$i<7;$i++)
    <li data-target="#carouselExampleCaptions" data-slide-to="{{$i}}" @if($i==0) class="active" @endif></li>
	@endfor
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active" style="background:url('{{asset('img/1.jpg')}}') no-repeat center center;height:400px;background-size:cover;">
      <div class="carousel-caption d-none d-md-block" style="left:5%;text-align:center;padding:40px;height:360px;background-color: white;color:#fff;right:55%;border-radius:20px;background-color: rgba(0,0,0,0.6);">
        <h1 style="color:#fff;">Sweet program</h1>
        <p style="font-size:20px;">All kind of cakes and sweets on one place.All is sweeter with our products.</p>
      </div>
    </div>
    <div class="carousel-item" style="background:url('{{asset('img/8.jpg')}}') no-repeat center center;height:400px;background-size:cover;">
      <div class="carousel-caption d-none d-md-block" style="left:5%;text-align:center;padding:40px;height:360px;background-color: white;color:#fff;right:55%;border-radius:20px;background-color: rgba(0,0,0,0.6);">
        <h1 style="color:#fff;">Bread and pastry</h1>
        <p style="font-size:20px;">Buckwheat is-bread of health.Untill recently completely forgoten grain,buckwheat,was used to be unavoidable part of serbian traditional kitchen,it made a grand entry.</p>
      </div>
    </div>
        <div class="carousel-item" style="background:url('{{asset('img/9.jpg')}}') no-repeat center center;height:400px;background-size:cover;">
      <div class="carousel-caption d-none d-md-block" style="left:5%;text-align:center;padding:40px;height:360px;background-color: white;color:#fff;right:55%;border-radius:20px;background-color: rgba(0,0,0,0.6);">
        <h1 style="color:#fff;">Juices</h1>
        <p style="font-size:20px;">Make hot days easier with our product range of fruit juices,from strictly selected home-grown fruit from our gardens.</p>
      </div>
    </div>
            <div class="carousel-item" style="background:url('{{asset('img/10.jpg')}}') no-repeat center center;height:400px;background-size:cover;">
      <div class="carousel-caption d-none d-md-block" style="left:5%;text-align:center;padding:40px;height:360px;background-color: white;color:#fff;right:55%;border-radius:20px;background-color: rgba(0,0,0,0.6);">
        <h1 style="color:#fff;">Pickled salad</h1>
        <p style="font-size:20px;">Good mood and strong organism can be made with traditional multivitamin and multimineral supplements-pickled salad.Homemade salad with years of experience and lot of love. </p>
      </div>
    </div>
                <div class="carousel-item" style="background:url('{{asset('img/11.jpg')}}') no-repeat center center;height:400px;background-size:cover;">
      <div class="carousel-caption d-none d-md-block" style="left:5%;text-align:center;padding:40px;height:360px;background-color: white;color:#fff;right:55%;border-radius:20px;background-color: rgba(0,0,0,0.6);">
        <h1 style="color:#fff;">Fresh fruit and vegetable</h1>
        <p style="font-size:20px;">One apple a day makes natural way to strong and healty body,but not just apple.All products from our garden will do the same.</p>
      </div>
    </div>
      <div class="carousel-item" style="background:url('{{asset('img/12.jpg')}}') no-repeat center center;height:400px;background-size:cover;">
      <div class="carousel-caption d-none d-md-block" style="left:5%;text-align:center;padding:40px;height:360px;background-color: white;color:#fff;right:55%;border-radius:20px;background-color: rgba(0,0,0,0.6);">
        <h1 style="color:#fff;">Decorative program</h1>
        <p style="font-size:20px;">All kind of decoration,make your happiest moments most beautiful ones.</p>
         </div> </div>

        <div class="carousel-item" style="background:url('{{asset('img/7.jpg')}}') no-repeat center center;height:400px;background-size:cover;">
      <!--<div class="overlay" style="width:100%;height:100%;background-color: transparent;
    background-image: linear-gradient(180deg, #00C853 0%, #2196F3 100%);
    opacity: 0.75;"> </div>-->
      <div class="carousel-caption d-none d-md-block" style="left:5%;text-align:center;padding:40px;height:360px;background-color: white;color:#fff;right:55%;border-radius:20px;background-color: rgba(0,0,0,0.6);">
        <h1 style="color:#fff;">Honey-treasure of nature</h1>
        <p style="font-size:20px;"Honey has been shown to be indispensable in boosting immunity.The combination of nature and art makes our product the No. 1 product.</p>
      </div>
    </div>


  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon"  aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon"  aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

</section>

<section>
	<div class="container p-4">
		<div class="row">
			<div class="col-md-3">
				<a href="{{route('front.stores')}}" class="default-btn btn-block text-center" style="">Stores</a>
			</div>
			<div class="col-md-3">
				<a href="{{route('front.articles')}}" class="default-btn btn-block text-center" style="">Articles</a>
			</div>

			<div class="col-md-3">
				<a href="{{route('front.aboutUs')}}" class="default-btn btn-block text-center" style="">About us</a>
			</div>
			<div class="col-md-3">
				<a href="{{route('front.contact')}}" class="default-btn btn-block text-center" style="">Contact</a>
			</div>
		</div>
	</div>
</section>

		<!-- Start Why Choose Us Three Area -->
<section class="why-choose-us-three four bg-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12 col-md-6 p-0">
                        <div class="single-choose-three mr-2">
                            <i class="icon flaticon-customer-service"></i>
                            <h3>{{__('Easy shopping')}}</h3>
                            <p>{{__('Simple and easy shopping from your home.')}}</p>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6 p-0">
                        <div class="single-choose-three ml-2 ">
                            <i class="icon flaticon-phone-call"></i>
                            <h3>{{__('Contact the salesperson')}}</h3>
                            <p>{{__('Possibility to communicate with our sellers.')}}</p>
                        </div>
                    </div>
                    <div class="col-lg-12 p-0 col-md-6 offset-md-3 offset-lg-0">
                        <div class="single-choose-three">
                            <i class="icon flaticon-check-symbol"></i>
                            <h3>{{__('Quality at a good price')}}</h3>
                            <p>{{__('The best offer of home-made products. ')}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="choose-img-three four">
                    <img src="{{asset('img/circle.png')}}" alt="">
                    <div class="choose-content-wrap">
                        <div class="choose-content-four">
                            <h3><a href="{{route('front.articles')}}" style="color:rgb(0, 200, 83);">{{__('Our products')}}</a></h3>
                            <span>{{__('A wide range of domestic products.')}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12 col-md-6 p-0">
                        <div class="single-choose-three mr-2">
                            <i class="icon flaticon-juice"></i>
                            <h3>{{__('Allways fresh')}}</h3>
                            <p>{{__('Always fresh food products.')}}</p>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6 p-0">
                        <div class="single-choose-three ml-2">
                            <i class="icon flaticon-star-of-favorites-outline"></i>
                            <h3>{{__('Unique specimens')}}</h3>
                            <p>{{__('Unique handmade products.')}}</p>
                        </div>
                    </div>
                    <div class="col-lg-12col-md-6 offset-md-3 offset-lg-0 p-0">
                        <div class="single-choose-three">
                            <i class="icon flaticon-right"></i>
                            <h3>{{__('Always available')}}</h3>
                            <p>{{__('Always available and willing to cooperate.')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
		<!-- End Why Choose Us Three Area -->
		<!-- Start About Us Area -->
		<section class="about-us-area pb-100 pt-4">
			<div class="container">
				<h2 class="text-center">Article categories</h2>
				<hr>
				<div class="row">
				@foreach($categories as $category)
					<div class="col-md-2">
						<div class="category-front" style="position:relative;">
                            <a href="{{route('front.articles',['category'=>$category->id])}}">
							<img style="position:relative;height: 10vw;
                            object-fit: cover;" src="{{asset('uploads/categories/thumbnails/'.$category->id.'.jpg')}}" alt="" class="img-fluid"><br>
							<span style="position:absolute;bottom:0;width:100%;text-align:center;font-weight:bold;text-transform: uppercase;color:white;background-color: transparent;
                            background-image: linear-gradient(
                                225deg,
                                rgb(0, 200, 83) 0%,
                                rgb(33, 150, 243) 100%
                            );">{{$category->name}}</span>
                        </a>
						</div>
					</div>
				@endforeach

				</div>

			</div>
			<div class="shape shape-1">
				<img src="{{asset('vendor/rimu/assets/img/shape/3.png')}}" alt="Shape">
			</div>
			<div class="shape shape-2">
				<img src="{{asset('vendor/rimu/assets/img/shape/4.png')}}" alt="Shape">
			</div>
			<div class="shape shape-3">
				<img src="{{asset('vendor/rimu/assets/img/shape/5.png')}}" alt="Shape">
			</div>
			<div class="shape shape-4">
				<img src="{{asset('vendor/rimu/assets/img/shape/6.png')}}" alt="Shape">
			</div>
			<div class="shape shape-5">
				<img src="{{asset('vendor/rimu/assets/img/shape/7.png')}}" alt="Shape">
			</div>
		</section>
		<!-- End About US Area -->

		<!-- Start See all product Area -->
		<section class="see-product-area ptb-100">
			<div class="container">
				<div class="section-title">
					<h2>How to become salesperson on our website?</h2>
					<p>If you want to become a seller on our website and place your products, contact us directly via contact form.</p>
					<a class="default-btn" href="{{route('front.contact')}}">Contact form</a>
				</div>
			</div>
		</section>
		<!-- End See all product Area -->


		<!-- Start Partner Area -->
		<div class="partner-area ptb-100">
			<div class="container">
				<div class="partner-wrap owl-carousel owl-theme">
					@foreach($stores as $store)
					<div class="partner-item text-center">
						<a href="{{route('front.store', $store->id)}}">
							<img src="{{asset('uploads/stores/'.$store->id.'.png')}}" style="max-height:150px;" class="img-fluid" alt="">

						</a>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		<!-- End Partner Area -->

@endsection

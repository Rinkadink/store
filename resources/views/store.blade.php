@extends('layouts.front')

@section('content')
		<!-- Start Page Title Area -->
		<div class="page-title-area item-bg-2">
			<div class="container">
				<div class="page-title-content">
					<h2>{{$store->name}}</h2>
					<ul>
						<li>
							<a href="{{route('front.home')}}">
								{{__('Pocetna')}}
								<i class="fa fa-chevron-right"></i>
							</a>
						</li>
						<li>{{$store->name}}</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Page Title Area -->


		<!-- Start Blog Details Area -->
        <section class="blog-details-area pb-4">
			<div class="container">

				<div class="row">
										<div class="col-lg-4 col-md-12 ">
						<aside class="widget-area" id="secondary">

							<section class="widget widget_categories bg-white">
								<h3 class="widget-title">{{__('Informacije')}}</h3>
								<img src="{{asset('uploads/stores/'.$store->id.'.png')}}" alt="" class="img-fluid">
								<table class="table-sm">
									<tr>
										<th>{{__('Ime')}}</th>
										<td>
											{{$store->first_name}} {{$store->last_name}}
										</td>
									</tr>
									<tr>
										<th>{{__('Email')}}</th>
										<td>{{$store->email}}</td>
									</tr>
									<tr>
										<th>{{__('Telefon')}}</th>
										<td>{{$store->phone}}</td>
									</tr>
									<tr>
										<th>{{__('Adresa')}}</th>
										<td>{{$store->address}}</td>
									</tr>
									<tr>
										<th>{{__('Website')}}</th>
										<td>
											<a href="{{$store->website}}" target="_blank">{{$store->website}}</a>
										</td>
									</tr>
                                </table>
                                <hr>

                            </section>

                            <section class="widget widget_categories mt-4 bg-success text-white">
								<h3 class="widget-title ">{{__('Način kupovine')}}</h3>
								<p>Da biste kupili proizvod na našem sajtu potrebno je kontaktirati prodavca putem priloženih informacija ili putem forme na sledećem <a style="color:white;font-weight:bold;" href="{{route('front.contactStore', $store->id)}}">linku</a>.</p>

							</section>







						</aside>
					</div>
					<div class="col-lg-8 col-md-12">


						<div class="blog-details-desc bg-white h-100">
                            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    @for($i=0;$i<$carousels->count();$i++)
                                  <li data-target="#carouselExampleCaptions" data-slide-to="{{$i}}" @if($i==0) class="active" @endif></li>
                                  @endfor
                                </ol>
                                <div class="carousel-inner">
                                  @foreach($carousels as $carousel)
                                  <div class="carousel-item @if($loop->first) active @endif" style="background:url('{{asset('uploads/store_carousels/'.$carousel->id.'.jpg')}}') no-repeat center center;height:450px;background-size:cover;">
                                      @if($carousel->title!=NULL)
                                    <div class="carousel-caption d-none d-md-block" style="left:5%;text-align:center;padding:40px;height:350px;background-color: white;color:#fff;right:45%;border-radius:20px;background-color: rgba(0,0,0,0.6); bottom:10%;">
                                      <h1 style="color:#fff; font-size:25px;">{{$carousel->title}}</h1>
                                      <p style="font-size:16px;">{{$carousel->content}}</p>
                                    </div>
                                    @endif
                                  </div>
                                  @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                  <span class="carousel-control-prev-icon"  aria-hidden="true"></span>
                                  <span class="sr-only">{{__('Predhodna')}}</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                  <span class="carousel-control-next-icon"  aria-hidden="true"></span>
                                  <span class="sr-only">{{__('Sledeca')}}</span>
                                </a>
                              </div>
							<div class="article-content">

								<h3>{{$store->name}}</h3>
								<hr>
								<div class="text-justify">
									{!!$store->description!!}
                                </div>
                                <div>
                                    @if($store->files->count()>0)
									<table class="table table-striped">
										<tr>
											<th>{{_('Naziv fajla')}}</th>
											<th>{{__('Veličina fajla')}}</th>
										</tr>
										@foreach($store->files as $file)
										<tr>
											<td><a href="{{asset('uploads/store_files/'.$file->id.'.'.$file->ext)}}">{{$file->filename}}.{{$file->ext}}</a></td>
											<td>{{$file->size()}}</td>
										</tr>
										@endforeach
									</table>
									@endif
                                </div>

							</div>

							<div class="article-footer">
								<div class="article-tags">
								</div>

								<div class="article-share p-4">
									<ul class="social">
										<li><a href="{{$store->facebook_link}}" target="_blank"><i class="fa fa-facebook-f"></i></a></li>
										<li><a href="{{$store->instagram_link}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>


				</div>
			</div>
		</section>
		<!-- End Blog Details Area -->

				<!-- Start Shop Area -->
		<section class="shop-area pb-70">
			<div class="container">
				<div class="section-title"><hr>
					<h2>{{__('Nasi proizvodi')}}</h2>
				</div>
				<div class="row">
					@foreach($articles as $article)
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="single-product-box">
							<div class="product-image">
								<img src="{{asset('uploads/articles/thumbnails/'.$article->featured_image.'.jpg?t='.time())}}" alt="image">
								<div class="btn-box">
									<a href="{{route('front.contactStore', $store->id)}}">
										<i class="flaticon-shopping-cart"></i>
									</a>
									<a href="{{route('front.article', $article->id)}}" class="link-btn">
										<i class="flaticon-magnifying-glass"></i>
									</a>
								</div>
							</div>
							<div class="product-content">
								<h3>
									{{$article->name}}
                                </h3>
                                <ul>
                                    <li>
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-star"></i>
                                    </li>
                                </ul>
                                @if(!is_null($article->price))
                                <span>{{$article->price}}&euro;</span>
                                @endif
							</div>
						</div>
					</div>
					@endforeach
					{{$articles->links()}}
				</div>
			</div>
		</section>
        <!-- End Shop Area -->


        <!-- Start Shop Area -->
		<section class="shop-area pb-70">
			<div class="container">
				<div class="section-title"><hr>
					<h2>{{__('Galerija')}}</h2>
				</div>
				<div class="row">
                    @forelse($articleImages as $image)
                    <div class="col-md-3 mb-4">
                        <a href="{{asset('uploads/articles/'.$image->id.'.jpg')}}" data-lightbox="gallery" class=" gallery-image">
                        <img src="{{asset('uploads/articles/thumbnails/'.$image->id.'.jpg')}}"  alt="" class="img-fluid img-thumbnail">
                    </a>
                    </div>
                    @empty
                    no images
                   @endforelse
                   {{$articleImages->links()}}
				</div>
			</div>
		</section>
		<!-- End Shop Area -->
@endsection

@section('style')
<link rel="stylesheet" href="{{ asset('vendor/lightbox/css/lightbox.min.css') }}">
@endsection

@section('script')
<script src="{{ asset('vendor/lightbox/js/lightbox.min.js') }}"></script>
@endsection

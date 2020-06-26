@extends('layouts.front')

@section('content')

<!-- Start Page Title Area -->
<div class="page-title-area item-bg-5">
    <div class="container">
        <div class="page-title-content">
            <h2>{{$article->name}}</h2>
            <ul>
                <li>
                    <a href="{{route('front.home')}}">
                       {{__(' Pocetna ')}}
                        <i class="fa fa-chevron-right"></i>
                    </a>
                </li>
                <li>{{$article->name}}</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->
<!-- Start Product Details Area -->
<section class="product-details-area product-left-sidebar pb-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 con-md-12">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="product-details-image mt-0 mb-0" style="background-image:url({{asset('uploads/articles/'.$article->featured_image.'_570x500.jpg')}})">
                            <img src="" alt="image">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="product-details-desc mt">
                            <h3>{{$article->name}}</h3>

                            <div class="price">
                                @if(!is_null($article->price))
                                <span class="new-price">{{$article->price}}&euro;</span>
                                @endif
                        @if(!is_null($article->unit))
                            {{__('per')}} {{$article->unit}}
                        @endif
                            </div>

                            <div class="product-review">
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>

                            </div>

                          {!!$article->description!!}

                            <div class="buy-checkbox-btn">

                                <div class="item">
                                    <a href="{{route('front.store',$article->author->store->id)}}" class="default-btn">{{__('Prodavnica')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="section-title">
                    <h2>{{__('Galerija')}}</h2>
                </div>
               <div class="row">
                   @forelse($article->images as $image)
                    <div class="col-md-3 mb-4">
                        <a href="{{asset('uploads/articles/'.$image->id.'.jpg')}}" data-lightbox="gallery" class="gallery-image">
                        <img src="{{asset('uploads/articles/thumbnails/'.$image->id.'.jpg')}}"  alt="" class="img-fluid img-thumbnail">
                    </a>
                    </div>
                    @empty
                    no images
                   @endforelse
               </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <aside class="widget-area widgetss-area" id="secondary">
                    <section class="widget mb-4">
                        <h3 class="widget-title">{{__('Informacije o prodavnici')}}</h3>
                        <img src="{{asset('uploads/stores/'.$article->author->store->id.'.png')}}" alt="" class="img-fluid">
                        <table class="table table-sm table-stripped">
                            <tr>
                                <th>{{__('Ime')}}</th>
                                <td><a href="{{route('front.store',$article->author->store->id)}}">{{$article->author->store->name}}</a></td>
                            </tr>
                            <tr>
                                <th>{{__('Telefon')}}</th>
                                <td>{{$article->author->store->phone}}</td>
                            </tr>
                            <tr>
                                <th>{{__('Email')}}</th>
                                <td>{{$article->author->store->email}}</td>
                            </tr>
                        </table>
                    </section>
                    <section class="widget widget-peru-posts-thumb mt-0">
                        <h3 class="widget-title">{{__('Poslednji')}}</h3>
                        @foreach($latest_articles as $latest_article)
                        <article class="item">
                            <a href="{{route('front.article',$latest_article->id)}}" class="thumb">
                               <img src="{{asset('uploads/articles/thumbnails/'.$latest_article->featured_image.'.jpg')}}" alt="" class="img-fluid">
                            </a>
                            <div class="info">
                                <span class="text-muted">{{$latest_article->category->name}}</span>
                                <h4 class="title usmall">
                                    <a href="{{route('front.article',$latest_article->id)}}">{{$latest_article->name}}</a>
                                </h4>
                            </div>

                            <div class="clear"></div>
                        </article>
                        @endforeach
                    </section>
                </aside>
            </div>
        </div>
    </div>
</section>
<!-- End Product Details Area -->
@endsection

@section('style')
<link rel="stylesheet" href="{{ asset('vendor/lightbox/css/lightbox.min.css') }}">
@endsection

@section('script')
<script src="{{ asset('vendor/lightbox/js/lightbox.min.js') }}"></script>
@endsection

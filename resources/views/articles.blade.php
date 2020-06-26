@extends('layouts.front')

@section('content')
<!-- Start Page Title Area -->
<div class="page-title-area item-bg-1">
    <div class="container">
        <div class="page-title-content">
            <h2>{{__('Articles')}}</h2>
            <ul>
                <li>
                    <a href="{{route('front.home')}}">
                        {{__('Pocetna')}}
                        <i class="fa fa-chevron-right"></i>
                    </a>
                </li>
                <li>{{__('Proizvodi')}}</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Our Product Area -->
<section class="our-product-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    @forelse($articles as $article)
                    <div class="col-lg-4 col-md-6 col-sm-6 d-flex">
                        <div class="single-product-box ml-0 mr-0">
                            <div class="product-image">
                                <img src="{{asset('uploads/articles/thumbnails/'.$article->featured_image.'.jpg?t='.time())}}" alt="image">
                                <div class="btn-box">
                                    <a href="{{route('front.article',$article->id)}}" class="link-btn">
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
                    @empty
                    <div class="col-md-12 text-center">{{__('Nema rezultata')}}</div>
                    @endforelse
                    {{$articles->links()}}
                </div>
            </div>
            <div class="col-md-4">
                <aside class="widget-area" id="secondary">
                    <div class="widget widget_search mt-0">
                        <form class="search-form" method="GET" action="{{route('front.articles')}}">
                            @csrf
                            <label>
                                <span class="screen-reader-text">Search for:</span>
                                <input type="search" name="search" class="search-field" value="{{request('search')}}" placeholder="Search...">
                            </label>
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <section class="widget widget_categories">
                        <h3 class="widget-title">{{__('Kategorije')}}</h3>

                        <ul>
                            @foreach($categories as $category)
                            <li>
                                <a href="{{route('front.articles',['category'=>$category->id])}}">{{ $category->name }}<span>({{ $category->articles_count }})</span></a>
                            </li>
                            @endforeach
                        </ul>

                    </section>

                </aside>
            </div>
        </div>
    </div>
</section>

<!-- End Our Product Area -->
@endsection

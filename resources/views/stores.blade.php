@extends('layouts.front')

@section('content')

<!-- Start Page Title Area -->
<div class="page-title-area item-bg-5">
    <div class="container">
        <div class="page-title-content">
            <h2>{{__('Lista prodavnica')}}</h2>
            <ul>
                <li>
                    <a href="index.html">
                       {{__('Pocetna')}}
                        <i class="fa fa-chevron-right"></i>
                    </a>
                </li>
                <li>{{__('Lista prodavnica')}}</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->
<!-- Start Blog Area -->
<section class="blog-area">
    <div class="container">
        <div class="row">
            @foreach($stores as $store)
            <div class="col-lg-4 col-md-6">
                <div class="single-blog-post ml-0 mr-0">
                    <div class="post-image text-center">
                        <a href="{{route('front.store',$store->id)}}">
                            <img src="{{asset('uploads/stores/'.$store->id.'.png')}}" alt="image" style="height:270px;">
                        </a>
                    </div>
                    <div class="post-content">
                        <h3>
                            <a href="{{route('front.store',$store->id)}}">{{$store->name}}</a>
                        </h3>
                        <div class="text-justify" style="height:100px;">
                        {!!Str::limit(strip_tags($store->description), 200)!!}
                        </div>
                        <a class="read-more" href="{{route('front.store',$store->id)}}">
                            {{__('Procitaj vise')}}
                            <i class="flaticon-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="shape shape-1">
        <img src="assets/img/shape/8.png" alt="">
    </div>
    <div class="shape shape-2">
        <img src="assets/img/shape/9.png" alt="">
    </div>
</section>
<!-- End Blog Area -->


@endsection

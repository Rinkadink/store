@extends('layouts.front')

@section('content')
<!-- Start Page Title Area -->
<div class="page-title-area item-bg-2">
    <div class="container">
        <div class="page-title-content">
            <h2>{{__('Prodavnica')}}: {{$store->name}}</h2>
            <ul>
                <li>
                    <a href="{{route('front.home')}}">
                        {{__('Pocetna')}}
                        <i class="fa fa-chevron-right"></i>
                    </a>
                </li>
                <li>{{__('Profil')}}</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Blog Details Area -->
<section class="blog-details-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="blog-details-desc">
                    <div class="comments-area m-0">
                        <h3 class="comments-title">{{__('Profilne informacije')}}</h3>
                        <table class="table table-bordered">
                          <tr>
                              <td style="width:50%;" colspan="2" rowspan="5">
                                  <img class="img-fluid" src="{{asset('uploads/stores/'.$store->id.'.png')}}" alt="">
                              </td>
                              <th>{{__('Ime')}}</th>
                              <td>{{$store->name}}</td>
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
                            <td>{{$store->website}}</td>
                        </tr>
                        <tr>
                            <th colspan="4">{{__('Opis')}}</th>
                        </tr>
                        <tr>
                            <th colspan="4">{!! $store->description !!}
                                <div class="article-footer">
                                    <div class="article-tags">
                                    </div>

                                    <div class="article-share">
                                        <ul class="social">
                                            <li><a href="{{$store->facebook_link}}" target="_blank"><i class="fa fa-facebook-f"></i></a></li>
                                            <li><a href="{{$store->instagram_link}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                            </th>
                        </tr>

                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
             @include('_profile_right')
            </div>
        </div>
    </div>
</section>
<!-- End Blog Details Area -->
@endsection

@extends('layouts.front')

@section('content')
<!-- Start Page Title Area -->
<div class="page-title-area item-bg-2">
    <div class="container">
        <div class="page-title-content">
            <h2>{{__('Kontakt forma')}}</h2>
            <ul>
                <li>
                    <a href="{{route('front.home')}}">
                        {{__('Pocetna')}}
                        <i class="fa fa-chevron-right"></i>
                    </a>
                </li>
                <li>{{__('Kontakt')}}</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->
<!-- Start Contact Area -->
<section class="faq-contact-area pb-100 mt-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="request-quote-wrap contact-pages mb-0">
                    <div class="contact-form">
                        <div class="section-title">
                            <h2>{{__('Kontaktirajte nas')}}</h2>
                        </div>
                        <form id="contactForm">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="name" id="first-name" class="form-control" placeholder="{{__('Ime')}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="name" id="last-mane" class="form-control" placeholder="{{__('Prezime')}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="number" id="number" class="form-control" placeholder="{{__('Telefon')}}">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" id="message" rows="6" placeholder="{{__('Napisite nesto')}}"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="default-btn">
                                        {{__('Posalji poruku')}}
                                        <i class="flaticon-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Contact Area -->
@endsection

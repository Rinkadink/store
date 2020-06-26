@extends('layouts.front')

@section('content')
<!-- Start Page Title Area -->
<div class="page-title-area item-bg-1">
    <div class="container">
        <div class="page-title-content">
            <h2>{{__('About Us')}}</h2>
            <ul>
                <li>
                    <a href="index.html">
                        {{__('Home')}}
                        <i class="fa fa-chevron-right"></i>
                    </a>
                </li>
                <li>{{__('About Us')}}</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start About Us Area -->
<section class="about-us-area ptb-100">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-img-1 about-img-2 wow bounceInDown" data-wow-delay=".1s">
                    <img src="{{asset('img/aboutUs/zene.jpg')}}" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content">
                    <span>{{__('About Us')}}</span>
                    <h2>Ideja nastanka internet prodavnice</h2>
                    <p>Internet prodavnica je nastala tokom projekta “Podrška medjuetničkoj poslovnoj saradnji” ,koji je finansirao UNMIK, a realizovalo Udruženje žena “SABOR”. Nastala je za vreme pandemije COVID-19 kao bi se podržala preduzeća u promociji i prodaji njihovih proizvoda i usluga.</p>
                    <p>Nadamo se da će internet prodavnica nastaviti da radi i nakon završetka projekta i pandemije i da će se u ovaj proces uključiti dodatno i ostala mala preduzeća. </p>
                    <ul>
                        <li>
                            <i class="flaticon-check-mark"></i>
                            Podrska privredi
                        </li>
                        <li>
                            <i class="flaticon-check-mark"></i>
                            Osavremenjivanje poslovanja
                        </li>
                        <li>
                            <i class="flaticon-check-mark"></i>
                            Online poslovanje
                        </li>
                        <li>
                            <i class="flaticon-check-mark"></i>
                           Brza isporuka
                        </li>
                    </ul>
                    <a class="default-btn default-btn-2" href="#">
                        Learn More
                    </a>
                </div>
            </div>
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

<!-- Start Counter Area -->
<section class="counter-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-counter">
                    <i class="fa fa-hand-peace-o"></i>
                    <h2>
                        <span class="odometer" data-count="20">00</span>+
                    </h2>
                    <p>Years Experience</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-counter">
                    <i class="fa fa-user-plus"></i>
                    <h2>
                        <span class="odometer" data-count="100">00</span>+
                    </h2>
                    <p>Expart Member</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-counter">
                    <i class="flaticon-plant"></i>
                    <h2>
                        <span class="odometer" data-count="90">00</span>+
                    </h2>
                    <p>Our Product</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-counter">
                    <i class="flaticon-plant"></i>
                    <h2>
                        <span class="odometer" data-count="270">00</span>+
                    </h2>
                    <p>World Wide Branch</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Counter Area -->
<!-- Start service Details Area -->
<section class="service-details-area ptb-100">
    <div class="container">
        <div class="row h-100 align-items-center">
            <div class="col-lg-8 col-md-12">
                <div class="service-details-img">
                    <img src="{{asset('img/aboutUs/zene1.jpg')}}" alt="image">
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="service-details-info">
                    <ul>
                        <li><Span>Naziv:</Span>Udruzenje zena Sabor KM</li>
                        <li><Span>Osnovano:</Span> 2000</li>
                        <li><Span>Email</Span> saborkm@gmail.com</li>
                        <li><Span>Website:</Span> <a href="http://www.saborkm.com" target="_blank">www.saborkm.com</a></li>
                        <li>
                            <Span>Drustvene mreze:</Span>

                            <ul>
                                <li><a href="https://www.facebook.com/pg/Sabor-Udruzenje-zena-495566330624407"><i class="fa fa-facebook"></i></a></li><a name="udruzenje"></a>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="service-details-desc text-justify">
                    <h3>Udruženje žena „SABOR“</h3>
                    <p class="mb-30">Udruzenje je nastalo 2000. godine u severnoj Mitrovici na Kosovu. Osnovala ga je grupa od pet žena sa ciljem da pruže pomoć raseljenim i izbeglim licima, samohranim majkama, nezaposlenim i socijalno ugroženim ženama kroz obuku o tradicionalnim zanatima. Prvi projekat je realizovan vec 2001. godine uz podršku KWI (Kosovo Women Initiative). Prvi treninzi i kursevi za obuku u oblasti malih i srednjih preduzeća i ekonomskog razvoja na severu Kosova su organizovani upravo u „SABOR-u“ a sve je to rađeno u cilju pružanja psihosocijalne podrške ženama i njihovog osposobljavanja za početak samostalnog posla. </p>

                    <div class="row align-items-center service-s-p">
                        <div class="col-lg-8">
                            <div class="service-list">
                                <h3>Ciljna grupa:</h3>
                                <p>Mlade nezaposljene žene,žene iz ruralnih sredina,raseljena lica,samohrane majke,žene sa socijalnim statusom,žene preduzetnice.</p>
                                <ul>
                                    <li>
                                        <i class="flaticon-right-1"></i>
                                        	Poboljšanje i veće učestvovanje žena u procesima ekonomskog odlučivanja;
                                    </li>
                                    <li>
                                        <i class="flaticon-right-1"></i>
                                        	Unapredjenje položaja žena i njihove uloge u ekonomskom razvoju;
                                    </li>
                                    <li>
                                        <i class="flaticon-right-1"></i>
                                        	Doprinos procesu zapošljavanja i samozapošljavanja žena;
                                    </li>
                                    <li>
                                        <i class="flaticon-right-1"></i>
                                        	Pružanje edukacije ženama u oblasti osnivanja i vođenja privatnog biznisa;
                                    </li>
                                    <li>
                                        <i class="flaticon-right-1"></i>
                                        	Promovisanje rada žena preduzetnica i povećanje njihove vidljivosti;
                                    </li>
                                    <li>
                                        <i class="flaticon-right-1"></i>
                                        	Očuvanje nematerijalne kulturne baštine;
                                    </li>
                                    <li>
                                        <i class="flaticon-right-1"></i>
                                        	Osposobljavanje i organizovanje žena za tržišnu proizvodnju;
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="service-d-img">
                                <img src="{{asset('img/aboutUs/zene2.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>

                    <p class="services-d-p">Udruženje žena “SABOR” je nevladino, nepolitičko, neprofitno i dobrovoljno udruženje osnovano 2000 godine sa ciljem socijalnog i ekonomskog osnaživanja žena , sa posebnim osvrtom na razvoj ženskog preduzetništva. </p>
                    <p class="services-d-p">
                    <strong>Vizija</strong>  – Poboljšanje i razvoj socijalne i ekonomske sigurnosti,  kvaliteta života gradjana i lokalne zajednice uopšte.</p>
                    <p class="services-d-p">
                    <strong>Misija</strong> – Ekonomsko i socijalno osnaživanje žena i njene porodice,sa posebnim akcentom na razvoj ženskog preduzetništva i podsticanja ženskog liderstva u svim oblastima stvaralaštva.
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="services-details-img">
                    <img src="{{asset('img/aboutUs/zene3.jpg')}}" alt="">
            </div>
</div>
            <div class="col-lg-4 col-md-6">
                <div class="services-details-img">
                    <img src="{{asset('img/aboutUs/zene4.jpg')}}" alt="">
                </div>
            </div>
            <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                <div class="services-details-img">
                    <img src="{{asset('img/aboutUs/zene5.jpg')}}" alt="">
                </div>
            </div>
            <div class="col-12 text-justify">
                <p>Vremenom se „SABOR“ specijalizovao za kulturne i etno vrednosti i njihovo očuvanje uz pomoć velike snage i volje velikog broja svojih članica, ali pre svega, zahvaljujući Milanki Ordić, svom prvom menadžeru, i njenoj upornosti, entuzijazmu i zalaganju da pomogne zajednici i marginalizovanoj grupi žena.</p>
               <p> Od 2004. godine situacija i vreme nameću da se „SABOR“ bavi i drugim programima van svoje misije, pa organizuje narodnu kuhinju uz pomoć italijanske organizacije CAV. Volonterski sa svojim članicama počinje sa spremanjem toplih obroka jednom dnevno za 80 najugroženijih lica u severnom delu Mitrovice. Od 2011.g. se zbog gašenja mnogih kolektivnih centara prešlo na mesečnu distribuciju hrane, odeće i lekova u tri neformalna naselja opštine severne Mitrovice za ukupno 65 lica.</p>
                <p>Danas je „SABOR“ prepoznatiljiv po svojoj izradi narodnih nošnji i ostalih odevnih predmeta u etno stilu, gde je nekad bilo više, nekad manje zaposlenih, a u čije programe su uključivane i osobe sa invaliditetom. „SABOR“ i njene članice su dobitnice sedam nagrada i zahvalnica za učešće na više od 30 međunarodnih i lokalnih sajmova, festivala i ostalih manifestacija na Kosovu i šire u regionu.</p>
                <p>Lokalna zajednica prepoznaje kapacitet i vrednosti ovog udruženja, pa „SABOR-a“ od 2008. godine ima svoj izložbeni i prodajni prostor, koji svakodnevno posećuju ljudi koji dolaze da kupe predmete napravljene po tradicionalnim tehnikama ručne izrade sa etno motivima. Pre svega, etno radionica predstavlja mesto razmene iskustva i interakcije različitih ljudi i dobre energije.</p>

                <p>Ukupno, od osnivanja „SABOR“ je imao  preko 7.000 korisnika pretežno žena, putem različitih programa i aktivnosti. Zbog vidljivosti i prepoznatiljivosti svog rada, „SABOR“ je uspeo da svoje proizvode plasira kako na nacionalnom tako i na stranom tržištu. Očekivanja su da će i dalje nastaviti ovim putem jer članice raspolažu sa dovoljno veština, a izgrađena je i strategija sa planom da se proširi tržište, poveća broj korisnika, osmisle i izrade novi proizvodi.</p>
              <p>  Zahvaljujuci novim znanjima i iskustvima, članice „SABOR-a“ su uspele da odgovore izazovima društva u tranziciji i doprinesu psihičkom i ekonomskom osnaživanju žena i njihovih porodica, ali će i dalje nastojati da utiču na poboljšanje društvenog okvira za razvoj preduzetništva sa posebnim akcentom na unapređenju položaja žena i njihovoj ulozi u ekonomskom razvoju, kao i edukaciji žena i mladih za tržišnu proizvodnju rukotvorina.
</p>
            </div>
        </div>
    </div>
</section>
<!-- End service Details Area -->

@endsection

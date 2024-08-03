@extends('front_end.layouts.app')
@section('content')
@include('front_end.includes.index.slider')
<!-- course-list-section-end -->
<section class="about-taan my-lg-5">
    <div class="container">
        <div class="section__title text-center text-lg-start">
            <h3>
                Our Introduction
                </h1>
        </div>
        <div class="row g-4 align-items-center">

            <div class="col-lg-6 pe-lg-4">

                <h5 class="mb-lg-4">TAAN members specialise in offering you an unrivalled collection of financially
                    protected,
                    quality adventure holidays to every corner of the Nepal.</h5>
                <p>
                    Trekking Agencies' Association of Nepal (TAAN) is an umbrella association of trekking agencies in
                    the
                    country.
                </p>
                <br>
                <p>
                    It was established in 1979 by a handful of trekking agency operators who felt it was time to devise
                    sound business principles as well as regulate the sector which was growing by leaps and bounds with
                    every
                    passing year.
                    {{-- They also felt the need of a strong lobby group that could suggest to the government on
              several issues to promote the Nepali tourism industry and develop tourism as a revenue generating industry. --}}
                </p>


                <!--
                <br><p>
                  Initially, TAAN had limited its membership only to Nepalese trekking agencies. It later opened associate membership to foreign organizations to broaden the scope of the association.
                </p>
                <br>
                <p>
                  TAAN members (around 1,729 General Members, 7 Associate Members and 155 General Members of TAAN Regional Association Pokhara) meet annually to endorse policy guidelines which govern the executive body. The executive committee work as per the TAAN Statute and guidelines of the Annual General Body meeting. The association frequently communicates with different government agencies and other stakeholders to simplify working procedures and resolve problems related to the trekking sector. The executive committee, which is elected every two years, has eight office-bearers, nine executive committee members, four nominated executive members, one immediate past president and one representative from TAAN Regional Association Pokhara.
                </p> -->


                <a class="read-more" href="#">Read More</a>
            </div>
            <div class="col-lg-6">
                <div class="about-team--img">
                    <!-- <img src="{{ asset('') }}images/about/about_image_2.png" alt="img"> -->
                    <a class="video__wrapper" href="https://www.youtube.com/watch?v=BchpIcqJy8w" data-fancybox="gallery">
                        <img src="{{ asset('user/images/Treks-In-The-World-cover_18th-Nov.webp') }}" />
                        <div class="video__play-icon">
                            <span>
                                <i class="fa-regular fa-circle-play"></i>
                            </span>

                        </div>
                    </a>
                </div>

            </div>
        </div>


    </div>

</section>
@include('front_end.includes.index.what-we-do')
@include('front_end.includes.index.achivement')


<!-- message from president start -->
<section class="message my-lg-5 my-3">
    <div class="container">
        <div class="president d-lg-flex flex-column flex-lg-row justify-content-center">
            <div class="president-message">
                <h3>Message from President</h3>
                <h5>Nilhari Bastola (President)</h5>
                <p>I have been elected as President of Trekking Agencies’ Association of Nepal (TAAN) and I am very
                    pleased to
                    be appointed to this position and would like to congratulate entire executive committee for being
                    elected
                    for the tenure of 2 years. We look forward to the year ahead and we hope that, with the support of
                    Executive
                    Committee, Member Agencies and staff, we can strengthen and promote the tourism industry.</p>
                <a class="btn" href="">Read More</a>
                {{-- <button>Read More</button> --}}

            </div>
            <div class="president-image d-flex justify-content-center p-2">
                <img src="{{ asset('user/images/nil-hari-bastola.jpg') }}" alt="President Image">
            </div>
        </div>
    </div>
</section>
<!-- message from president end-->





<section class="section-trail mb-lg-5">
    <div class="container">
        <div class="section__title text-center ">
            <h3>
                Trail & Travel
                </h1>
                <p>The complete Nepal travel guide </p>
        </div>
        <div class="section-trail__details">
            <div class="row g-4 ">
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <a href="">
                        <div class="section-trail__details__list">
                            <div class="section-trail__details__list__box">
                                <div class="logo-img">
                                    <img src="{{ asset('user/images/trail/Climbers-side-Nepali-Mount-Everest.webp') }}" alt="" class="img">
                                    {{-- <div class="bagde-flag-wrap">
                                      <a href="#" class="bagde-flag"> Top Trail </a>
                                  </div> --}}
                                </div>

                                <div class="text">

                                    <small><i class="fa-solid fa-location-dot"></i> Solukhumbu Nepal -10
                                    </small>
                                    <a href="">
                                        <h5>Everest Base Camp Trek - 13 Things to Know for Your Trip</h5>
                                    </a>
                                    <small><i class="fa-regular fa-calendar-days"></i> Duration - <b>10 Days</b>
                                    </small>
                                    <small><i class="fa-solid fa-plane-up"></i> Transport - <b> Private vehicle / By
                                            Air
                                        </b>
                                    </small>



                                </div>

                            </div>

                        </div> <!-- list section-trail -->
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <a href="#">
                        <div class="section-trail__details__list">
                            <div class="section-trail__details__list__box">
                                <div class="logo-img">
                                    <img src="https://media.everestbasecamptravel.com/uploads/package/namche-helicopter-flight.webp" alt="" class="img">
                                    {{-- <div class="bagde-flag-wrap">
                                      <a href="#" class="bagde-flag"> Top Trail </a>
                                  </div> --}}
                                </div>

                                <div class="text">

                                    <small><i class="fa-solid fa-location-dot"></i> Kathmandu, Chitwan, Pokhara
                                    </small>
                                    <h5>Everest Base Camp Trek - 13 Things to Know for Your Trip</h5>
                                    <small><i class="fa-regular fa-calendar-days"></i> Duration - <b>10 Days</b>
                                    </small>
                                    <small><i class="fa-solid fa-plane-up"></i> Transport - <b> Private vehicle / By
                                            Air
                                        </b>
                                    </small>

                                </div>

                            </div>

                        </div> <!-- list section-trail -->
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <a href="#">
                        <div class="section-trail__details__list">
                            <div class="section-trail__details__list__box">
                                <div class="logo-img">
                                    <img src="https://media.everestbasecamptravel.com/uploads/package/namche-helicopter-flight.webp" alt="" class="img">
                                    {{-- <div class="bagde-flag-wrap">
                                      <a href="#" class="bagde-flag"> Top Trail </a>
                                  </div> --}}
                                </div>

                                <div class="text">

                                    <small><i class="fa-solid fa-location-dot"></i> Kathmandu, Nepal </small>
                                    <h5>Everest Base Camp Trek - 13 Things to Know for Your Trip</h5>
                                    <small><i class="fa-regular fa-calendar-days"></i> Duration - <b>10 Days</b>
                                    </small>
                                    <small><i class="fa-solid fa-plane-up"></i> Transport - <b> Private vehicle / By
                                            Air
                                        </b>
                                    </small>

                                </div>

                            </div>

                        </div> <!-- list section-trail -->
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <a href="#">
                        <div class="section-trail__details__list">
                            <div class="section-trail__details__list__box">
                                <div class="logo-img">
                                    <img src="https://media.everestbasecamptravel.com/uploads/package/namche-helicopter-flight.webp" alt="" class="img">

                                </div>

                                <div class="text">

                                    <small><i class="fa-solid fa-location-dot"></i> Kathmandu, Nepal </small>
                                    <h5>Everest Base Camp Trek - 13 Things to Know for Your Trip</h5>
                                    <small><i class="fa-regular fa-calendar-days"></i> Duration - <b>10 Days</b>
                                    </small>
                                    <small><i class="fa-solid fa-plane-up"></i> Transport - <b> Private vehicle / By
                                            Air </b>
                                    </small>

                                </div>

                            </div>

                        </div> <!-- list section-trail -->
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <a href="#">
                        <div class="section-trail__details__list">
                            <div class="section-trail__details__list__box">
                                <div class="logo-img">
                                    <img src="https://media.everestbasecamptravel.com/uploads/package/namche-helicopter-flight.webp" alt="" class="img">

                                </div>

                                <div class="text">

                                    <small><i class="fa-solid fa-location-dot"></i> Kathmandu, Nepal </small>
                                    <h5>Everest Base Camp Trek - 13 Things to Know for Your Trip</h5>
                                    <small><i class="fa-regular fa-calendar-days"></i> Duration - <b>10 Days</b>
                                    </small>
                                    <small><i class="fa-solid fa-plane-up"></i> Transport - <b> Private vehicle / By
                                            Air </b>
                                    </small>

                                </div>

                            </div>

                        </div> <!-- list section-trail -->
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <a href="#">
                        <div class="section-trail__details__list">
                            <div class="section-trail__details__list__box">
                                <div class="logo-img">
                                    <img src="https://media.everestbasecamptravel.com/uploads/package/namche-helicopter-flight.webp" alt="" class="img">

                                </div>

                                <div class="text">

                                    <small><i class="fa-solid fa-location-dot"></i> Kathmandu, Nepal </small>
                                    <h5>Everest Base Camp Trek - 13 Things to Know for Your Trip</h5>
                                    <small><i class="fa-regular fa-calendar-days"></i> Duration - <b>10 Days</b>
                                    </small>
                                    <small><i class="fa-solid fa-plane-up"></i> Transport - <b> Private vehicle / By
                                            Air </b>
                                    </small>

                                </div>

                            </div>

                        </div> <!-- list section-trail -->
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <a href="#">
                        <div class="section-trail__details__list">
                            <div class="section-trail__details__list__box">
                                <div class="logo-img">
                                    <img src="https://media.everestbasecamptravel.com/uploads/package/namche-helicopter-flight.webp" alt="" class="img">

                                </div>

                                <div class="text">

                                    <small><i class="fa-solid fa-location-dot"></i> Kathmandu, Nepal </small>
                                    <h5>Everest Base Camp Trek - 13 Things to Know for Your Trip</h5>
                                    <small><i class="fa-regular fa-calendar-days"></i> Duration - <b>10 Days</b>
                                    </small>
                                    <small><i class="fa-solid fa-plane-up"></i> Transport - <b> Private vehicle / By
                                            Air </b>
                                    </small>

                                </div>

                            </div>

                        </div> <!-- list section-trail -->
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <a href="#">
                        <div class="section-trail__details__list">
                            <div class="section-trail__details__list__box">
                                <div class="logo-img">
                                    <img src="https://media.everestbasecamptravel.com/uploads/package/namche-helicopter-flight.webp" alt="" class="img">

                                </div>

                                <div class="text">

                                    <small><i class="fa-solid fa-location-dot"></i> Kathmandu, Nepal </small>
                                    <h5>Everest Base Camp Trek - 13 Things to Know for Your Trip</h5>
                                    <small><i class="fa-regular fa-calendar-days"></i> Duration - <b>10 Days</b>
                                    </small>
                                    <small><i class="fa-solid fa-plane-up"></i> Transport - <b> Private vehicle / By
                                            Air </b>
                                    </small>

                                </div>

                            </div>

                        </div> <!-- list section-trail -->
                    </a>
                </div>
            </div>
        </div>
    </div>
</section><!-- up section-trail trail -->
<!-- list Top Destination for vacations start -->
@include('front_end.includes.index.destination')
<!-- taan support start -->
<section class="taan-support my-lg-5 my-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="trip-advisor">
                    <a href="https://www.tripadvisor.com/Attraction_Review-g293890-d6031354-Reviews-Nepal_Trek_Adventure_and_Expedition-Kathmandu_Kathmandu_Valley_Bagmati_Zone_Centr.html"><img src="https://media.nepaltrekadventures.com/themes/images/ta-widget.png" width="100%" alt="img">
                    </a>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="support d-lg-flex flex-column flex-lg-row justify-content-center h-100">
                    <div class="support-message">
                        <h4>Get Started by Speaking with our Support counsellors</h4>
                        <p>Our Taan Support are working from home, ready to help you stay open for business with answers
                            and
                            advice
                            24/7/365. Send your queries about trekking, Help or complain your trekking services.</p>
                        <button>Contact Us</button>
                    </div>
                    <div class="support-image d-flex justify-content-center p-2">
                        <img src="{{ asset('user/images/support-cover.png') }}" alt="Support Contact Image">
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>
<!-- taan support end-->
<section class="section-trail mb-3">
    <div class="container">
        <div class="section__title text-center ">
            <h3>
                Upcoming Trails
                </h1>

        </div>

        <div class="section-trail__details">
            <div class="row g-4 ">
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <a href="">
                        <div class="section-trail__details__list">
                            <div class="section-trail__details__list__box">
                                <div class="logo-img">
                                    <img src="{{ asset('user/images/trail/Climbers-side-Nepali-Mount-Everest.webp') }}" alt="" class="img">
                                    <div class="bagde-flag-wrap">
                                        <a href="#" class="bagde-flag"> Upcoming </a>
                                    </div>
                                </div>

                                <div class="text">

                                    <small><i class="fa-solid fa-location-dot"></i> Solukhumbu Nepal -10
                                    </small>
                                    <a href="">
                                        <h5>Everest Base Camp Trek - 13 Things to Know for Your Trip</h5>
                                    </a>
                                    <small><i class="fa-regular fa-calendar-days"></i> Duration - <b>10 Days</b>
                                    </small>
                                    <small><i class="fa-solid fa-plane-up"></i> Transport - <b> Private vehicle / By
                                            Air </b>
                                    </small>



                                </div>

                            </div>

                        </div> <!-- list section-trail -->
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <a href="">
                        <div class="section-trail__details__list">
                            <div class="section-trail__details__list__box">
                                <div class="logo-img">
                                    <img src="{{ asset('user/images/trail/Climbers-side-Nepali-Mount-Everest.webp') }}" alt="" class="img">
                                    <div class="bagde-flag-wrap">
                                        <a href="#" class="bagde-flag"> Upcoming </a>
                                    </div>
                                </div>

                                <div class="text">

                                    <small><i class="fa-solid fa-location-dot"></i> Solukhumbu Nepal -10
                                    </small>
                                    <a href="">
                                        <h5>Everest Base Camp Trek - 13 Things to Know for Your Trip</h5>
                                    </a>
                                    <small><i class="fa-regular fa-calendar-days"></i> Duration - <b>10 Days</b>
                                    </small>
                                    <small><i class="fa-solid fa-plane-up"></i> Transport - <b> Private vehicle / By
                                            Air </b>
                                    </small>



                                </div>

                            </div>

                        </div> <!-- list section-trail -->
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <a href="">
                        <div class="section-trail__details__list">
                            <div class="section-trail__details__list__box">
                                <div class="logo-img">
                                    <img src="{{ asset('user/images/trail/Climbers-side-Nepali-Mount-Everest.webp') }}" alt="" class="img">
                                    <div class="bagde-flag-wrap">
                                        <a href="#" class="bagde-flag"> Upcoming </a>
                                    </div>
                                </div>

                                <div class="text">

                                    <small><i class="fa-solid fa-location-dot"></i> Solukhumbu Nepal -10
                                    </small>
                                    <a href="">
                                        <h5>Everest Base Camp Trek - 13 Things to Know for Your Trip</h5>
                                    </a>
                                    <small><i class="fa-regular fa-calendar-days"></i> Duration - <b>10 Days</b>
                                    </small>
                                    <small><i class="fa-solid fa-plane-up"></i> Transport - <b> Private vehicle / By
                                            Air </b>
                                    </small>



                                </div>

                            </div>

                        </div> <!-- list section-trail -->
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <a href="">
                        <div class="section-trail__details__list">
                            <div class="section-trail__details__list__box">
                                <div class="logo-img">
                                    <img src="{{ asset('user/images/trail/Climbers-side-Nepali-Mount-Everest.webp') }}" alt="" class="img">
                                    <div class="bagde-flag-wrap">
                                        <a href="#" class="bagde-flag"> Upcoming </a>
                                    </div>
                                </div>

                                <div class="text">

                                    <small><i class="fa-solid fa-location-dot"></i> Solukhumbu Nepal -10
                                    </small>
                                    <a href="">
                                        <h5>Everest Base Camp Trek - 13 Things to Know for Your Trip</h5>
                                    </a>
                                    <small><i class="fa-regular fa-calendar-days"></i> Duration - <b>10 Days</b>
                                    </small>
                                    <small><i class="fa-solid fa-plane-up"></i> Transport - <b> Private vehicle / By
                                            Air </b>
                                    </small>



                                </div>

                            </div>

                        </div> <!-- list section-trail -->
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <a href="">
                        <div class="section-trail__details__list">
                            <div class="section-trail__details__list__box">
                                <div class="logo-img">
                                    <img src="{{ asset('user/images/trail/Climbers-side-Nepali-Mount-Everest.webp') }}" alt="" class="img">
                                    <div class="bagde-flag-wrap">
                                        <a href="#" class="bagde-flag"> Upcoming </a>
                                    </div>
                                </div>

                                <div class="text">

                                    <small><i class="fa-solid fa-location-dot"></i> Solukhumbu Nepal -10
                                    </small>
                                    <a href="">
                                        <h5>Everest Base Camp Trek - 13 Things to Know for Your Trip</h5>
                                    </a>
                                    <small><i class="fa-regular fa-calendar-days"></i> Duration - <b>10 Days</b>
                                    </small>
                                    <small><i class="fa-solid fa-plane-up"></i> Transport - <b> Private vehicle / By
                                            Air </b>
                                    </small>



                                </div>

                            </div>

                        </div> <!-- list section-trail -->
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <a href="">
                        <div class="section-trail__details__list">
                            <div class="section-trail__details__list__box">
                                <div class="logo-img">
                                    <img src="{{ asset('user/images/trail/Climbers-side-Nepali-Mount-Everest.webp') }}" alt="" class="img">
                                    <div class="bagde-flag-wrap">
                                        <a href="#" class="bagde-flag"> Upcoming </a>
                                    </div>
                                </div>

                                <div class="text">

                                    <small><i class="fa-solid fa-location-dot"></i> Solukhumbu Nepal -10
                                    </small>
                                    <a href="">
                                        <h5>Everest Base Camp Trek - 13 Things to Know for Your Trip</h5>
                                    </a>
                                    <small><i class="fa-regular fa-calendar-days"></i> Duration - <b>10 Days</b>
                                    </small>
                                    <small><i class="fa-solid fa-plane-up"></i> Transport - <b> Private vehicle / By
                                            Air </b>
                                    </small>



                                </div>

                            </div>

                        </div> <!-- list section-trail -->
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <a href="">
                        <div class="section-trail__details__list">
                            <div class="section-trail__details__list__box">
                                <div class="logo-img">
                                    <img src="{{ asset('user/images/trail/Climbers-side-Nepali-Mount-Everest.webp') }}" alt="" class="img">
                                    <div class="bagde-flag-wrap">
                                        <a href="#" class="bagde-flag"> Upcoming </a>
                                    </div>
                                </div>

                                <div class="text">

                                    <small><i class="fa-solid fa-location-dot"></i> Solukhumbu Nepal -10
                                    </small>
                                    <a href="">
                                        <h5>Everest Base Camp Trek - 13 Things to Know for Your Trip</h5>
                                    </a>
                                    <small><i class="fa-regular fa-calendar-days"></i> Duration - <b>10 Days</b>
                                    </small>
                                    <small><i class="fa-solid fa-plane-up"></i> Transport - <b> Private vehicle / By
                                            Air </b>
                                    </small>



                                </div>

                            </div>

                        </div> <!-- list section-trail -->
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <a href="">
                        <div class="section-trail__details__list">
                            <div class="section-trail__details__list__box">
                                <div class="logo-img">
                                    <img src="{{ asset('user/images/trail/Climbers-side-Nepali-Mount-Everest.webp') }}" alt="" class="img">
                                    <div class="bagde-flag-wrap">
                                        <a href="#" class="bagde-flag"> Upcoming </a>
                                    </div>
                                </div>

                                <div class="text">

                                    <small><i class="fa-solid fa-location-dot"></i> Solukhumbu Nepal -10
                                    </small>
                                    <a href="">
                                        <h5>Everest Base Camp Trek - 13 Things to Know for Your Trip</h5>
                                    </a>
                                    <small><i class="fa-regular fa-calendar-days"></i> Duration - <b>10 Days</b>
                                    </small>
                                    <small><i class="fa-solid fa-plane-up"></i> Transport - <b> Private vehicle / By
                                            Air </b>
                                    </small>



                                </div>

                            </div>

                        </div> <!-- list section-trail -->
                    </a>
                </div>


            </div>
        </div>
</section>


<!-- accrediation end -->

<section class="faq mt-lg-5 mt-3 pt-4">
    <div class="container">
        <div class="row g-5 justify-content-center">
            <div class="col-lg-3 text-left">
                <h2 class="mb-4">FAQs</h2>
                <p>An FAQ page is an important part of any business website. Learn the best strategies for creating FAQ
                    pages
                    that convert site visitors into paying customers.</p>
            </div>
            <div class="col-lg-8">
                <div class="accordion" id="accordionExample">
                    <div class="faq__item">

                        <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <h5>Why Nepal is Travel Destination?</h5>
                        </a>

                        <div id="collapseOne" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>
                                    This is the first item's accordion body. It is shown by default, until the collapse
                                    plugin adds the
                                    appropriate classes that we use to style each element. These classes control the
                                    overall appearance,
                                    as well as the showing and hiding via CSS transitions. You can modify any of this
                                    with custom CSS or
                                    overriding our default variables. It's also worth noting that just about any HTML
                                    can go within the
                                    <code>.accordion-body</code>, though the transition does limit overflow.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="faq__item">

                        <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">

                            <h5>
                                Why Travel To Nepal?
                            </h5>
                        </a>

                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>
                                    Nepal is a landlocked country with a population of about 30 million. It is
                                    sandwiched between the
                                    two most populous countries on earth - China and India. The central part of the
                                    Himalayas lies in
                                    Nepal, which includes eight of the ten tallest mountains.

                                </p>
                                <p>
                                    The Himalayas are the youngest fold mountains, and as a result, Nepal encompasses
                                    several folds in
                                    the form of tall mountains. Hence, it is not surprising that the country with the
                                    highest peak (Mt.
                                    Everest) is also home to the deepest gorge in the world, Kaligandaki Gorge.

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="faq__item">

                        <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <h5>Why Nepal is Travel Destination?</h5>
                        </a>

                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the third item's accordion body.</strong> It is hidden by default, until
                                the collapse
                                plugin adds the appropriate classes that we use to style each element. These classes
                                control the
                                overall appearance, as well as the showing and hiding via CSS transitions. You can
                                modify any of this
                                with custom CSS or overriding our default variables. It's also worth noting that just
                                about any HTML
                                can go within the <code>.accordion-body</code>, though the transition does limit
                                overflow.
                            </div>
                        </div>
                    </div>
                    <div class="faq__item">

                        <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">

                            <h5>
                                Why Travel To Nepal?
                            </h5>
                        </a>

                        <div id="collapsefour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>
                                    Nepal is a landlocked country with a population of about 30 million. It is
                                    sandwiched between the
                                    two most populous countries on earth - China and India. The central part of the
                                    Himalayas lies in
                                    Nepal, which includes eight of the ten tallest mountains.

                                </p>
                                <p>
                                    The Himalayas are the youngest fold mountains, and as a result, Nepal encompasses
                                    several folds in
                                    the form of tall mountains. Hence, it is not surprising that the country with the
                                    highest peak (Mt.
                                    Everest) is also home to the deepest gorge in the world, Kaligandaki Gorge.

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="faq__item">

                        <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                            <h5>Why Nepal is Travel Destination?</h5>
                        </a>

                        <div id="collapsefive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the third item's accordion body.</strong> It is hidden by default, until
                                the collapse
                                plugin adds the appropriate classes that we use to style each element. These classes
                                control the
                                overall appearance, as well as the showing and hiding via CSS transitions. You can
                                modify any of this
                                with custom CSS or overriding our default variables. It's also worth noting that just
                                about any HTML
                                can go within the <code>.accordion-body</code>, though the transition does limit
                                overflow.
                            </div>
                        </div>
                    </div>
                    <div class="faq__item">
                        <a class="faq-read-more" href="#">View More <i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<section class="video mt-lg-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3">
                <a class="video__wrapper" href="https://www.youtube.com/watch?v=BchpIcqJy8w" data-fancybox="gallery">
                    <img src="{{ asset('user/images/pokhara.webp') }}" alt="img" />
                    <div class="video__play-icon">
                        <span>
                            <i class="fa-regular fa-circle-play"></i>
                        </span>

                    </div>
                </a>
            </div>
            <div class="col-lg-3">
                <a class="video__wrapper" href="https://www.youtube.com/watch?v=9_WJOZiixww" data-fancybox="gallery">
                    <img src="{{ asset('user/images/about/2.jpg') }}" alt="img" />
                    <div class="video__play-icon">
                        <span>
                            <i class="fa-regular fa-circle-play"></i>
                        </span>

                    </div>
                </a>
            </div>
            <div class="col-lg-3">
                <a class="video__wrapper" href="https://www.youtube.com/watch?v=wTQ9wNbaN8I" data-fancybox="gallery">
                    <img src="{{ asset('user/images/trail/3.webp') }}" alt="img" />
                    <div class="video__play-icon">
                        <span>
                            <i class="fa-regular fa-circle-play"></i>
                        </span>

                    </div>
                </a>
            </div>
            <div class="col-lg-3">
                <a class="video__wrapper" href="https://www.youtube.com/watch?v=1LUyjmm3w9I" data-fancybox="gallery">
                    <img src="{{ asset('user/images/trail/america-gded4fdb31_640-300x169.jpg') }}" alt="img" />
                    <div class="video__play-icon">
                        <span>
                            <i class="fa-regular fa-circle-play"></i>
                        </span>

                    </div>
                </a>
            </div>
            <div class="col-lg-3">
                <a class="video__wrapper" href="https://www.youtube.com/watch?v=1LUyjmm3w9I" data-fancybox="gallery">
                    <img src="{{ asset('user/images/trail/annapurna-circuit-trekking.jpg') }}" alt="img" />
                    <div class="video__play-icon">
                        <span>
                            <i class="fa-regular fa-circle-play"></i>
                        </span>

                    </div>
                </a>
            </div>
            <div class="col-lg-3">
                <a class="video__wrapper" href="https://www.youtube.com/watch?v=1LUyjmm3w9I" data-fancybox="gallery">
                    <img src="{{ asset('user/images/trail/everest-base-camp-trek-with-helicopter-return.webp') }}" alt="img" />
                    <div class="video__play-icon">
                        <span>
                            <i class="fa-regular fa-circle-play"></i>
                        </span>

                    </div>
                </a>
            </div>
            <div class="col-lg-3">
                <a class="video__wrapper" href="https://www.youtube.com/watch?v=1LUyjmm3w9I" data-fancybox="gallery">
                    <img src="{{ asset('user/images/trail/3.webp') }}" alt="img" />
                    <div class="video__play-icon">
                        <span>
                            <i class="fa-regular fa-circle-play"></i>
                        </span>

                    </div>
                </a>
            </div>
            <div class="col-lg-3">
                <a class="video__wrapper" href="#">
                    <img src="{{ asset('user/images/trail/view-all.jpg') }}" alt="img" />
                    <div class="video__play-icon">
                        <span>
                            <i class="fa-regular fa-circle-play"></i>
                        </span>

                    </div>

                </a>
            </div>
        </div>
    </div>
</section>
@endsection
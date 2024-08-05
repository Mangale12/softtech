@extends('front_end.user_dashboard')
@section('content')
@php
    $legal_documents = json_decode($member->legal_documents, true);
    $company = json_decode($member->company, true);
    $social = json_decode($member->social, true);
@endphp
    <div class="inner-banner ">
        <!-- <img src="images/trail/title-bg.jpg" alt="img"> -->
        <img src="{{ asset('user/images/home-banner.png') }}" alt="img">
        <div class="inner-banner__navbar member-page d-flex align-items-center">
            <div class="container position-relative">
                <div class="bg-breadcrumd w-75 pe-lg-5">
                    <h1 class="text-white mb-3">{{ !empty($company['company_name']) ? $company['company_name'] : '' }}</h1>
                    <!-- <nav aria-label="breadcrumb">
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item "><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item "><a class="text-white" href="#">Trail</a></li>
                            <li class="breadcrumb-item text-white" aria-current="page">Everest Base Camp Trek with Helicopter Return
                            </li>
                        </ol>
                    </nav> -->
                </div>
                <div class="quick-view d-flex align-items-center">
                    <div class="quick-detail me-3">
                        <a href="#photo-gallery"><i class="fa-regular fa-image"></i> Gallery <br> <span>20 Photos</span></a>
                    </div>
                    <div class="quick-detail ">
                        <a href="#related-selection"><i class="fa-brands fa-hive"></i> Our Selections <br> <span>20
                            Selections</span></a>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <section class="main-content mt-lg-5">
        <div class="container">
            <div class="row g-5">

                <div class="col-lg-8">
                    <div class="main-content__details">
                        <div class="trail-details member-details-main">
                            <i>DREAM, PLAN, AND DISCOVER WITH US</i>
                            <h2 class="my-3 mb-4">About Us</h2>

                            <div class=" page_content">
                                <blockquote>
                                    Nepal Trek Adventure and Expedition is a Kathmandu-based international adventure
                                    travel company specializing in high-altitude trekking, helicopter tours, adventure
                                    activities, and expeditions.

                                </blockquote>
                                <p>
                                    Nepal Trek Adventure and Expedition is one of the leading trekking companies of
                                    Nepal. It is a government-registered travel agency that is recognized by the
                                    Trekking Agencies Association of Nepal. It is a client-oriented organization that
                                    was established in 2006 with the sole objective of “Satisfied Customer Our Assets”.
                                    The organization has been providing a wide range of trek and tour services to
                                    thousands of tourists since then. The reviews of our customers speak aloud about us
                                    keeping NTA different from the crowd of trekking agencies.
                                </p>
                                <p>
                                    NTA has a set of a well experienced, self-motivated, and dedicated teams who work
                                    around a clock to make your holiday package memorable, cherishable, and safe. The
                                    organization has more than 20 certified trekking guides and around 10 tour guides.
                                    NTA provides local trekking guides / Sherpa to the customers so that they
                                    (customers) are well informed about the social, geographical, historical, and
                                    economic conditions of the trekking routes or areas. The organization under
                                    Corporate Social Responsibility (CSR) has stepped up with the concept of the local
                                    guide. Most of the guides are English speaking. But, to meet your convenience and
                                    short out language problems, NTA also provides guides who can speak and communicate
                                    with you in your native language.
                                </p>
                                <p>
                                    Our special trek itineraries of Mount Everest Base Camp trekking, Annapurna
                                    Sanctuary trekking, Manaslu Circuit Trekking, and Langtang trekking are always being
                                    memorable to our customers. Furthermore, the forest of the country also gives you an
                                    opportunity for bird watching and jungle safari. Furthermore, NTA offers trekking
                                    throughout Nepal, tours covering the historical, geographical, and cultural part of
                                    the country, and peak climbing ranging from easy to difficult. We assist with your
                                    VISA processing for Tibet and operate tours in Tibet, Mt. Kailash tour, trekking in
                                    Tibet, and climbing Everest from part of China.
                                </p>


                                <img class="my-3" src="{{ asset('user/images/trail/everest-base-camp-trek-with-helicopter-return.webp') }}"
                                    alt="img">


                                <h2 class="my-4" id="photo-gallery">
                                    Legal Documents
                                </h2>

                                <div class="photo-video">
                                    <div class="row g-4">
                                        <div class="col-lg-4">
                                            @if(!empty($legal_documents['pan']['image']))

                                            <a data-fancybox="gallery" data-src="{{ asset($legal_documents['pan']['image']) }}">
                                                <img src="{{ asset($legal_documents['pan']['image']) }}" width="100%" height="250" alt="img" />
                                                    <figcaption>Fig: Pan</figcaption>
                                            </a>
                                            @endif

                                        </div>
                                        <div class="col-lg-4">
                                            @if(!empty($legal_documents['company']['register_file']))
                                            <a data-fancybox="gallery"
                                            data-src="{{ asset($legal_documents['company']['register_file']) }}">
                                            <img src="{{ asset($legal_documents['company']['register_file']) }}" width="100%" height="250" alt="img" />
                                                <figcaption>Fig: Compan Registration</figcaption>
                                        </a>
                                        @endif

                                        </div>
                                        <div class="col-lg-4">
                                            @if(!empty($legal_documents['tax_clearance']))
                                            <a data-fancybox="gallery"
                                                data-src="{{ asset($legal_documents['tax_clearance']) }}">
                                                <img src="{{ asset($legal_documents['tax_clearance']) }}" width="100%" height="250" alt="img" />
                                                    <figcaption>Fig: Tax clearance</figcaption>
                                            </a>
                                            @endif
                                            {{-- <h6> Legal Documents Title</h6> --}}
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="main-content__sidebar  sidebar sidebar-right ">
                        <!-- <h3>Travel Trails</h3> -->
                        <div class="sidebar__package sidebar-profile mb-4 ">
                            <div class="member-profile">
                                <div class="member-heading">
                                    <div class="company-log d-flex justify-content-end">
                                        @if(!empty($company['company_logo']))
                                        <img src="{{asset($company['company_logo'])}}" alt="logo" height="100" width="300">
                                        @endif
                                    </div>
                                </div>

                                <div class="company-detail d-flex align-items-center ">
                                    <div class="member-sketch">
                                        @if(!empty($member->user))
                                        @if(!empty($member->user->avatar != null))
                                        <img src="{{asset($member->user->avatar)}}" alt="sketch">
                                        @endif
                                        @endif
                                    </div>
                                    <div class="profile-details">
                                        @if(!empty($member->user))
                                        <h4>{{ $member->user->name }}</h4>
                                        @endif
                                        <p>{{ $member->member_post }}</p>

                                    </div>
                                </div>
                                <div class="contact-details text-center mt-3 px-4 pb-4">
                                    @if(!empty($member->user))
                                    @if(!empty($member->user))
                                        <span>
                                            <a href="mailto:{{ $member->user->email }}">{{ $member->user->email }}</a>
                                        </span>
                                    @endif
                                    @endif
                                    <div class="phone-number">
                                        @if(!empty($member->user))
                                        <a href="tel:{{ $member->user->mobile }}">{{ $member->user->mobile }}</a>
                                        @endif
                                    </div>
                                    <a href="https://wa.me/9779851017030" target="_blank"
                                        class="btn btn-contact text-white w-100 mt-3"> <i
                                            class="fa-brands fa-whatsapp"></i> Contact Us <i
                                            class="fa-solid fa-arrow-right-long"></i></a>

                                    <div class="more-infor  p-4 mt-3">
                                        <span class="d-block">Founded year: {{ !empty($company['company_founded_year']) ? $company['company_founded_year'] : '' }}</span>
                                        <br>
                                        <a class="d-block website-visit" href="{{ !empty($company['company_website']) ? $company['company_website'] : '' }}"> <span><i class="fa-solid fa-globe"></i></span> Visit Website <i class="fa-solid fa-arrow-right-long"></i></a>
                                        <p>Make an Enquiry</p>

                                    </div>
                                    <div class="social-media d-flex justify-content-center">
                                        <a target="_blank" href="{{ !empty($social['facebook']) ? $social['facebook'] : '#' }}"><i class="fa-brands fa-facebook-f"></i></a>
                                        <a target="_blank" href="{{ !empty($social['linked_id']) ? $social['linked_id'] : '#' }}"><i class="fa-brands fa-linkedin-in"></i></a>
                                        <a target="_blank" href="{{ !empty($social['youtube']) ? $social['youtube'] : '#' }}"><i class="fa-brands fa-youtube"></i></a>
                                        <a target="_blank" href="{{ !empty($social['instagram']) ? $social['instagram'] : '#' }}"><i class="fa-brands fa-instagram"></i></a>
                                    </div>
                                </div>


                            </div>

                        </div>



                    </div>
                </div>

                <div class="trail-packages" id="related-selection">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="section__title text-start w-100">
                                <h3>
                                    Our Selections
                                    </h1>
                                    <hr>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="trail-packages__card">

                                <a class="tour_image" href="">
                                    <img src="{{asset('user/images/trail/1.webp')}} " alt="img">

                                    <div class="tour-band ">
                                        NEW</div>
                                </a>

                                <div class="portfolio_info_wrapper">
                                    <a class="tour_link" href="">
                                        <h4>Everest Base Camp Helicopter Tour</h4>
                                    </a>
                                    <div class="tour_excerpt">
                                        <span> <i class="fa-solid fa-location-dot"></i> Solukhumbu Nepal</span>
                                    </div>
                                    <div
                                        class="tour_attribute_wrapper d-flex justify-content-between align-items-center mt-3">
                                        <div class="tour_attribute_share">
                                            <a id="single_tour_share_button" href="javascript:;"
                                                class="button ghost themeborder" style="width:auto;"><i
                                                    class="fa-solid fa-share-nodes"></i> Share this tour</a>
                                        </div>

                                        <div class="tour_attribute_link">
                                            <a href=""> View More <i
                                                    class="fa-solid fa-arrow-right-long"></i> </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="trail-packages__card">

                                <a class="tour_image" href="">
                                    <img src="{{asset('user/images/trail/1.webp')}} " alt="img">

                                    <div class="tour-band ">
                                        NEW</div>
                                </a>

                                <div class="portfolio_info_wrapper">
                                    <a class="tour_link" href="">
                                        <h4>Everest Base Camp Helicopter Tour</h4>
                                    </a>
                                    <div class="tour_excerpt">
                                        <span> <i class="fa-solid fa-location-dot"></i> Solukhumbu Nepal</span>
                                    </div>
                                    <div
                                        class="tour_attribute_wrapper d-flex justify-content-between align-items-center mt-3">
                                        <div class="tour_attribute_share">
                                            <a id="single_tour_share_button" href="javascript:;"
                                                class="button ghost themeborder" style="width:auto;"><i
                                                    class="fa-solid fa-share-nodes"></i> Share this tour</a>
                                        </div>

                                        <div class="tour_attribute_link">
                                            <a href=""> View More <i
                                                    class="fa-solid fa-arrow-right-long"></i> </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="trail-packages__card">

                                <a class="tour_image" href="#">
                                    <img src="{{asset('user/images/trail/1.webp')}} " alt="img">

                                    <div class="tour-band ">
                                        NEW</div>
                                </a>

                                <div class="portfolio_info_wrapper">
                                    <a class="tour_link" href="#">
                                        <h4>Everest Base Camp Helicopter Tour</h4>
                                    </a>
                                    <div class="tour_excerpt">
                                        <span> <i class="fa-solid fa-location-dot"></i> Solukhumbu , Nepal</span>
                                    </div>
                                    <div
                                        class="tour_attribute_wrapper d-flex justify-content-between align-items-center mt-3">
                                        <div class="tour_attribute_share">
                                            <a id="single_tour_share_button" href="javascript:;"
                                                class="button ghost themeborder" style="width:auto;"><i
                                                    class="fa-solid fa-share-nodes"></i> Share this tour</a>
                                        </div>

                                        <div class="tour_attribute_link">
                                            <a href="#">View More <i class="fa-solid fa-arrow-right-long"></i> </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="trail-packages__card">

                                <a class="tour_image" href="">
                                    <img src="{{asset('user/images/trail/1.webp')}} " alt="img">

                                    <div class="tour-band ">
                                        NEW</div>
                                </a>

                                <div class="portfolio_info_wrapper">
                                    <a class="tour_link" href="">
                                        <h4>Everest Base Camp Helicopter Tour</h4>
                                    </a>
                                    <div class="tour_excerpt">
                                        <span> <i class="fa-solid fa-location-dot"></i> Solukhumbu Nepal</span>
                                    </div>
                                    <div
                                        class="tour_attribute_wrapper d-flex justify-content-between align-items-center mt-3">
                                        <div class="tour_attribute_share">
                                            <a id="single_tour_share_button" href="javascript:;"
                                                class="button ghost themeborder" style="width:auto;"><i
                                                    class="fa-solid fa-share-nodes"></i> Share this tour</a>
                                        </div>

                                        <div class="tour_attribute_link">
                                            <a href=""> View More <i
                                                    class="fa-solid fa-arrow-right-long"></i> </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="trail-packages__card">

                                <a class="tour_image" href="">
                                    <img src="{{asset('user/images/trail/1.webp')}} " alt="img">

                                    <div class="tour-band ">
                                        NEW</div>
                                </a>

                                <div class="portfolio_info_wrapper">
                                    <a class="tour_link" href="">
                                        <h4>Everest Base Camp Helicopter Tour</h4>
                                    </a>
                                    <div class="tour_excerpt">
                                        <span> <i class="fa-solid fa-location-dot"></i> Solukhumbu Nepal</span>
                                    </div>
                                    <div
                                        class="tour_attribute_wrapper d-flex justify-content-between align-items-center mt-3">
                                        <div class="tour_attribute_share">
                                            <a id="single_tour_share_button" href="javascript:;"
                                                class="button ghost themeborder" style="width:auto;"><i
                                                    class="fa-solid fa-share-nodes"></i> Share this tour</a>
                                        </div>

                                        <div class="tour_attribute_link">
                                            <a href=""> View More <i
                                                    class="fa-solid fa-arrow-right-long"></i> </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="trail-packages__card">

                                <a class="tour_image" href="">
                                    <img src="{{asset('user/images/trail/1.webp')}} " alt="img">

                                    <div class="tour-band ">
                                        NEW</div>
                                </a>

                                <div class="portfolio_info_wrapper">
                                    <a class="tour_link" href="">
                                        <h4>Everest Base Camp Helicopter Tour</h4>
                                    </a>
                                    <div class="tour_excerpt">
                                        <span> <i class="fa-solid fa-location-dot"></i> Solukhumbu Nepal</span>
                                    </div>
                                    <div
                                        class="tour_attribute_wrapper d-flex justify-content-between align-items-center mt-3">
                                        <div class="tour_attribute_share">
                                            <a id="single_tour_share_button" href="javascript:;"
                                                class="button ghost themeborder" style="width:auto;"><i
                                                    class="fa-solid fa-share-nodes"></i> Share this tour</a>
                                        </div>

                                        <div class="tour_attribute_link">
                                            <a href=""> View More <i
                                                    class="fa-solid fa-arrow-right-long"></i> </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="trail-packages__card">

                                <a class="tour_image" href="">
                                    <img src="{{asset('user/images/trail/1.webp')}} " alt="img">

                                    <div class="tour-band ">
                                        NEW</div>
                                </a>

                                <div class="portfolio_info_wrapper">
                                    <a class="tour_link" href="">
                                        <h4>Everest Base Camp Helicopter Tour</h4>
                                    </a>
                                    <div class="tour_excerpt">
                                        <span> <i class="fa-solid fa-location-dot"></i> Solukhumbu Nepal</span>
                                    </div>
                                    <div
                                        class="tour_attribute_wrapper d-flex justify-content-between align-items-center mt-3">
                                        <div class="tour_attribute_share">
                                            <a id="single_tour_share_button" href="javascript:;"
                                                class="button ghost themeborder" style="width:auto;"><i
                                                    class="fa-solid fa-share-nodes"></i> Share this tour</a>
                                        </div>

                                        <div class="tour_attribute_link">
                                            <a href=""> View More <i
                                                    class="fa-solid fa-arrow-right-long"></i> </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="trail-packages__card">

                                <a class="tour_image" href="">
                                    <img src="{{asset('user/images/trail/1.webp')}} " alt="img">

                                    <div class="tour-band ">
                                        NEW</div>
                                </a>

                                <div class="portfolio_info_wrapper">
                                    <a class="tour_link" href="">
                                        <h4>Everest Base Camp Helicopter Tour</h4>
                                    </a>
                                    <div class="tour_excerpt">
                                        <span> <i class="fa-solid fa-location-dot"></i> Solukhumbu Nepal</span>
                                    </div>
                                    <div
                                        class="tour_attribute_wrapper d-flex justify-content-between align-items-center mt-3">
                                        <div class="tour_attribute_share">
                                            <a id="single_tour_share_button" href="javascript:;"
                                                class="button ghost themeborder" style="width:auto;"><i
                                                    class="fa-solid fa-share-nodes"></i> Share this tour</a>
                                        </div>

                                        <div class="tour_attribute_link">
                                            <a href=""> View More <i
                                                    class="fa-solid fa-arrow-right-long"></i> </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

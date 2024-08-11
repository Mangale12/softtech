@extends('front_end.layouts.app')
@section('content')
<div class="inner-banner ">
    <!-- <img src="images/trail/title-bg.jpg" alt="img"> -->
    @if(isset($data['row']->thumbs))
    <img src="{{ $data['row']->thumbs}}" alt="img">
    @endif
    <div class="inner-banner__navbar d-flex align-items-center">
        <div class="container position-relative">
            <div class="bg-breadcrumd w-75">
                @if(isset($data['row']->title))
                <h1 class="text-white mb-3">{{ $data['row']->title }}</h1>
                @endif
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb ">
                        <li class="breadcrumb-item "><a class="text-white" href="{{ route('site.index')}}">Home</a></li>
                        <li class="breadcrumb-item "><a class="text-white" href="#">Trail</a></li>
                        @if(isset($data['row']->title))
                        <li class="breadcrumb-item text-white" aria-current="page">
                            {{ $data['row']->title }}
                        </li>
                        @endif
                    </ol>
                </nav>
            </div>
            <div class="quick-view d-flex align-items-center">
                <div class="quick-detail me-3">
                    <a href="#photo-gallery"><i class="fa-regular fa-image"></i> Gallery <br> <span>20 Photos</span></a>
                </div>
                <div class="quick-detail me-3">
                    <a href="#upcomming"><i class="fa-regular fa-image"></i> Upcomming <br> <span>5 Trail</span></a>
                </div>
                <div class="quick-detail ">
                    <a href="#related-packages"><i class="fa-brands fa-hive"></i> Total <br> <span>20
                            Trails</span></a>
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
                    <div class="trail-details">

                        <div class="owl-carousel owl-theme owl-gallery ">
                            <div class="trail-items">
                                <img class="mb-3" src="{{asset('user/images/trail/everest-base-camp-trek-with-helicopter-return.webp')}} " alt="img">
                            </div>
                            <div class="trail-items">
                                <img class="mb-3" src="{{asset('user/images/trail/everest-base-camp-trek-with-helicopter-return.webp')}} " alt="img">
                            </div>
                            <div class="trail-items">
                                <img class="mb-3" src="{{asset('user/images/trail/everest-base-camp-trek-with-helicopter-return.webp')}} " alt="img">
                            </div>

                        </div>
                        <div class="page_content">
                            <p>
                                @if(isset($data['row']->description))
                            <p>{!! $data['row']->description !!}</p>
                            @endif
                            </p>
                            <h2>
                                Route Map
                            </h2>
                            <div class="map mt-3">
                                @if(isset($data['row']->route_map))
                                <a data-fancybox data-src="{{ $data['row']->route_map }}" data-caption="Hello world">
                                    <img src="{{ $data['row']->route_map }}" width="100%" alt="map" />
                                </a>
                                @else
                                <p>Route map not available</p>
                                @endif
                            </div>
                            <h2 class="my-4" id="photo-gallery">
                                Photos & Vidos
                            </h2>
                            <p></p>
                            <div class="photo-video">
                                <div class="row g-2">
                                    <div class="col-lg-12">
                                        <h2 class="my-4">
                                            Photos
                                        </h2>
                                    </div>
                                    @php
                                    $videos = json_decode($data['row']->videos, true);
                                    @endphp
                                    @if(isset($videos) && count($videos) > 0)
                                    @foreach($videos as $video)
                                    <div class="col-lg-4">
                                        <a data-fancybox="gallery" data-src="{{asset('user/images/trail/Mount_Everest_as_seen_from_Drukair2_PLW_edit.jpg')}}" data-caption="Optional caption,&lt;br /&gt;that can contain &lt;em&gt;HTML&lt;/em&gt; code">
                                            <img src="{{asset('user/images/trail/Mount_Everest_as_seen_from_Drukair2_PLW_edit.jpg')}}" width="100%" height="150" alt="img" />
                                        </a>
                                    </div>
                                    @endforeach
                                    @else
                                    <p>
                                        No photos available.
                                    </p>
                                    @endif

                                    <div class="col-lg-12">
                                        <h2 class="my-4" id="photo-gallery">
                                            Vidos
                                        </h2>
                                    </div>
                                    @php
                                    $videos = json_decode($data['row']->videos, true);
                                    @endphp
                                    @if(isset($videos) && count($videos) > 0)
                                    @foreach($videos as $video)
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <a data-fancybox href="{{ !empty($video['link']) ? $video['link'] : '' }}">
                                                <img class="card-img-top img-fluid" src="{{ !empty($video['link']) ? $video['link'] : '' }}" alt="img" />
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <p>
                                        No videos available.
                                    </p>
                                    @endif
                                </div>

                            </div>
                            <br>
                            <h2 class="my-3">FAQs</h2>
                            <div class="faqs">




                                <div class="accordion" id="accordionExample">
                                    <div class="itinery__item">

                                        <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#q1" aria-expanded="false" aria-controls="q1">

                                            <h5>
                                                <span>Q1.</span> Arrival and Orientation?
                                            </h5>
                                        </a>

                                        <div id="q1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>
                                                    Upon arrival, you’ll be greeted by your guide and
                                                    transferred to your hotel. After settling in, you’ll attend
                                                    an orientation meeting to go over the itinerary and meet
                                                    your fellow travelers.

                                                </p>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="itinery__item">

                                        <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#q-2" aria-expanded="false" aria-controls="q-2">

                                            <h5>
                                                <span>Q2.</span> Arrival and Orientation?
                                            </h5>
                                        </a>

                                        <div id="q-2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>
                                                    Upon arrival, you’ll be greeted by your guide and
                                                    transferred to your hotel. After settling in, you’ll attend
                                                    an orientation meeting to go over the itinerary and meet
                                                    your fellow travelers.

                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="itinery__item">

                                        <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#q3" aria-expanded="false" aria-controls="q3">

                                            <h5>
                                                <span>Q3.</span> Arrival and Orientation
                                            </h5>
                                        </a>

                                        <div id="q3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>
                                                    Upon arrival, you’ll be greeted by your guide and
                                                    transferred to your hotel. After settling in, you’ll attend
                                                    an orientation meeting to go over the itinerary and meet
                                                    your fellow travelers.

                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="itinery__item">

                                        <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#q4" aria-expanded="false" aria-controls="q4">

                                            <h5>
                                                <span>Q5</span> Arrival and Orientation?
                                            </h5>
                                        </a>

                                        <div id="q4" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>
                                                    Upon arrival, you’ll be greeted by your guide and
                                                    transferred to your hotel. After settling in, you’ll attend
                                                    an orientation meeting to go over the itinerary and meet
                                                    your fellow travelers.

                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="itinery__item">

                                        <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#q5" aria-expanded="false" aria-controls="q5">

                                            <h5>
                                                <span>Q 5</span> Arrival and Orientation?
                                            </h5>
                                        </a>

                                        <div id="q5" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>
                                                    Upon arrival, you’ll be greeted by your guide and
                                                    transferred to your hotel. After settling in, you’ll attend
                                                    an orientation meeting to go over the itinerary and meet
                                                    your fellow travelers.

                                                </p>

                                            </div>
                                        </div>
                                    </div>

                                </div>




                            </div>
                            <h2 class="my-3">More info</h2>
                            <div class="more-info">
                                <p>Start and end in San Jose! With the Active tour Essential Costa Rica - Package
                                    with
                                    Manuel Antonio National Park, you have a 10 days tour package taking you through
                                    San
                                    Jose, Costa Rica and 4 other destinations in Costa Rica. Essential Costa Rica -
                                    Package with Manuel Antonio National Park includes accommodation in a hotel as
                                    well
                                    as an expert guide, meals, transport and more.</p>
                                <p>Start and end in San Jose! With the Active tour Essential Costa Rica - Package
                                    with
                                    Manuel Antonio National Park, you have a 10 days tour package taking you through
                                    San
                                    Jose, Costa Rica and 4 other destinations in Costa Rica. Essential Costa Rica -
                                    Package with Manuel Antonio National Park includes accommodation in a hotel as
                                    well
                                    as an expert guide, meals, transport and more.</p>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="main-content__sidebar">
                    <div class=" sidebar sidebar-border trail-details-sidebar mb-4  ">
                        <h3> Trip Facts</h3>
                        <div class="row g-2 p-3 trip-facts">
                            <div class="col-sm-6">
                                <div class="item border  text-center p-4 ">
                                    <div class="icon"><i class="fa-solid fa-map-location-dot"></i></div>
                                    <div class="text">
                                        <h6 class="info-title">Destination</h6>
                                        <h5 class="info">Nepal</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="item border  text-center p-4">
                                    <div class="icon">
                                        <i class="fa-regular fa-calendar-days"></i>
                                    </div>
                                    <div class="text">
                                        <h6 class="info-title">Durations</h6>
                                        <h5 class="info">16 days</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="item border  text-center p-4">
                                    <div class="icon">
                                        <i class="fa-solid fa-mountain-city"></i>
                                    </div>
                                    <div class="text">
                                        <h6 class="info-title">Trip Difficulty</h6>
                                        <h5 class="info">Moderate </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="item border  text-center p-4">
                                    <div class="icon">
                                        <i class="fa-solid fa-passport"></i>
                                    </div>
                                    <div class="text">
                                        <h6 class="info-title">Activities</h6>
                                        <h5 class="info">Trekking</h5>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-sm-6">
                                    <div class="item border  text-center p-4">
                                        <div class="icon"><i class="fa-solid fa-hotel"></i></div>
                                        <div class="text">
                                            <h6 class="info-title">Accommodation</h6>
                                            <h5 class="info">Hotel/Lodges</h5>
                                        </div>
                                    </div>
                                </div> --}}
                            <div class="col-sm-6">
                                <div class="item border  text-center p-4">
                                    <div class="icon"><i class="fa-solid fa-volcano"></i></div>
                                    <div class="text">
                                        <h6 class="info-title">Max.altitude</h6>
                                        <h5 class="info">5545m.</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="item border  text-center p-4">
                                    <div class="icon">
                                        <i class="fa-solid fa-person-hiking"></i>
                                    </div>
                                    <div class="text">
                                        <h6 class="info-title">Group Size</h6>
                                        <h5 class="info">Min. 1 Pax</h5>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-sm-6">
                                    <div class="item border  text-center p-3">
                                        <div class="icon"><i class="fa-regular fa-clock"></i></div>
                                        <div class="text">
                                            <h6 class="info-title">Best Time</h6>
                                            <h5 class="info">March - May &amp; Sept - Dec</h5>
                                        </div>
                                    </div>
                                </div> --}}
                        </div>



                    </div>
                    <div class=" sidebar sidebar-border trail-details-sidebar mb-4  ">


                        <h3>Other Trail </h3>
                        <div class="sidebar__package p-4">

                            <ul class="posts blog withthumb ">
                                <li class="mb-3">
                                    <div class="post_circle_thumb">
                                        <a href="#"><img class="alignleft frame post_thumb" src="{{asset('user/images/trail/Mount_Everest_as_seen_from_Drukair2_PLW_edit.jpg')}} " alt="img"></a>
                                    </div><a href="#">Everest Base Camp Trek - 13 Things to Know for Your Trip</a>
                                    <div class="post_attribute">December 10, 2016</div>
                                </li>

                                <li class="mb-3">
                                    <div class="post_circle_thumb ">
                                        <a href="#"><img class="alignleft frame post_thumb" src="{{asset('user/images/trail/america-gded4fdb31_640-300x169.jpg')}} " alt="img"></a>
                                    </div><a href="#">Everest Base Camp Trek - 13 Things to Know for Your Trip</a>
                                    <div class="post_attribute">December 10, 2016</div>
                                </li>
                                <li class="mb-3">
                                    <div class="post_circle_thumb ">
                                        <a href="#"><img class="alignleft frame post_thumb" src="{{asset('user/images/trail/1.webp')}} " alt="img"></a>
                                    </div><a href="#">Everest Base Camp Trek - 13 Things to Know for Your Trip</a>
                                    <div class="post_attribute">December 10, 2016</div>
                                </li>

                                <li class="mb-3">
                                    <div class="post_circle_thumb ">
                                        <a href="#"><img class="alignleft frame post_thumb" src="{{asset('user/images/trail/3.jpg')}} " alt="img"></a>
                                    </div><a href="#">Everest Base Camp Trek - 13 Things to Know for Your Trip</a>
                                    <div class="post_attribute">December 10, 2016</div>
                                </li>

                                <li>
                                    <div class="post_circle_thumb ">
                                        <a href="#"><img class="alignleft frame post_thumb" src="{{asset('user/images/trail/Mount_Everest_as_seen_from_Drukair2_PLW_edit.jpg')}} " alt="img"></a>
                                    </div><a href="#">Everest Base Camp Trek - 13 Things to Know for Your Trip</a>
                                    <div class="post_attribute">December 10, 2016</div>
                                </li>
                            </ul>

                        </div>

                    </div>
                </div>

            </div>
            <div class="trail-packages" id="related-packages">
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="section__title text-start w-100">
                            <h3>
                                Everest Related Trail
                                </h1>
                        </div>
                    </div>
                    <div class="col-lg-4">
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
                                    <span> <i class="fa-solid fa-location-dot"></i> City Tours, Urban</span>
                                </div>
                                <div class="tour_attribute_wrapper d-flex justify-content-between align-items-center mt-3">
                                    <div class="tour_attribute_share">
                                        <a id="single_tour_share_button" href="javascript:;" class="button ghost themeborder" style="width:auto;"><i class="fa-solid fa-share-nodes"></i> Share this tour</a>
                                    </div>

                                    <div class="tour_attribute_link">
                                        <a href=""> View More <i class="fa-solid fa-arrow-right-long"></i> </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="trail-packages__card">

                            <a class="tour_image" href="#">
                                <img src="{{asset('user/images/trail/2.webp')}} " alt="img">

                                <div class="tour-band ">
                                    NEW</div>
                            </a>

                            <div class="portfolio_info_wrapper">
                                <a class="tour_link" href="#">
                                    <h4>Everest Base Camp Helicopter Tour</h4>
                                </a>
                                <div class="tour_excerpt">
                                    <span> <i class="fa-solid fa-location-dot"></i> City Tours, Urban</span>
                                </div>
                                <div class="tour_attribute_wrapper d-flex justify-content-between align-items-center mt-3">
                                    <div class="tour_attribute_share">
                                        <a id="single_tour_share_button" href="javascript:;" class="button ghost themeborder" style="width:auto;"><i class="fa-solid fa-share-nodes"></i> Share this tour</a>
                                    </div>

                                    <div class="tour_attribute_link">
                                        <a href=""> View More <i class="fa-solid fa-arrow-right-long"></i> </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="trail-packages__card">

                            <a class="tour_image" href="#">
                                <img src="{{asset('user/images/trail/3.webp')}} " alt="img">

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
                                <div class="tour_attribute_wrapper d-flex justify-content-between align-items-center mt-3">
                                    <div class="tour_attribute_share">
                                        <a id="single_tour_share_button" href="javascript:;" class="button ghost themeborder" style="width:auto;"><i class="fa-solid fa-share-nodes"></i> Share this tour</a>
                                    </div>

                                    <div class="tour_attribute_link">
                                        <a href="#">View More <i class="fa-solid fa-arrow-right-long"></i> </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="trail-packages" id="upcomming">
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="section__title text-start w-100">
                            <h3>
                                Upcomming Trail
                                </h1>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="trail-packages__card">

                            <a class="tour_image" href="#">
                                <img src="{{asset('user/images/trail/1.webp')}} " alt="img">

                                <div class="tour-band upcomming ">
                                    Upcomming</div>
                            </a>

                            <div class="portfolio_info_wrapper">
                                <a class="tour_link" href="#">
                                    <h4>Everest Base Camp Helicopter Tour</h4>
                                </a>
                                <div class="tour_excerpt">
                                    <span> <i class="fa-solid fa-location-dot"></i> City Tours, Urban</span>
                                </div>
                                <div class="tour_attribute_wrapper d-flex justify-content-between align-items-center mt-3">
                                    <div class="tour_attribute_share">
                                        <a id="single_tour_share_button" href="javascript:;" class="button ghost themeborder" style="width:auto;"><i class="fa-solid fa-share-nodes"></i> Share this tour</a>
                                    </div>

                                    <div class="tour_attribute_link">
                                        <a href=""> View More <i class="fa-solid fa-arrow-right-long"></i> </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="trail-packages__card">

                            <a class="tour_image" href="#">
                                <img src="{{asset('user/images/trail/2.webp')}} " alt="img">

                                <div class="tour-band upcomming ">
                                    Upcomming</div>
                            </a>

                            <div class="portfolio_info_wrapper">
                                <a class="tour_link" href="#">
                                    <h4>Everest Base Camp Helicopter Tour</h4>
                                </a>
                                <div class="tour_excerpt">
                                    <span> <i class="fa-solid fa-location-dot"></i> City Tours, Urban</span>
                                </div>
                                <div class="tour_attribute_wrapper d-flex justify-content-between align-items-center mt-3">
                                    <div class="tour_attribute_share">
                                        <a id="single_tour_share_button" href="javascript:;" class="button ghost themeborder" style="width:auto;"><i class="fa-solid fa-share-nodes"></i> Share this tour</a>
                                    </div>

                                    <div class="tour_attribute_link">
                                        <a href=""> View More <i class="fa-solid fa-arrow-right-long"></i> </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="trail-packages__card">

                            <a class="tour_image" href="#">
                                <img src="{{asset('user/images/trail/3.webp')}} " alt="img">

                                <div class="tour-band upcomming ">
                                    Upcomming</div>
                            </a>

                            <div class="portfolio_info_wrapper">
                                <a class="tour_link" href="#">
                                    <h4>Everest Base Camp Helicopter Tour</h4>
                                </a>
                                <div class="tour_excerpt">
                                    <span> <i class="fa-solid fa-location-dot"></i> Solukhumbu , Nepal</span>
                                </div>
                                <div class="tour_attribute_wrapper d-flex justify-content-between align-items-center mt-3">
                                    <div class="tour_attribute_share">
                                        <a id="single_tour_share_button" href="javascript:;" class="button ghost themeborder" style="width:auto;"><i class="fa-solid fa-share-nodes"></i> Share this tour</a>
                                    </div>

                                    <div class="tour_attribute_link">
                                        <a href="#">View More <i class="fa-solid fa-arrow-right-long"></i> </a>
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
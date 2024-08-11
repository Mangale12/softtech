@extends('user.user_dashboard')
@section('content')
<div class="trail-profile py-lg-5 pb-lg-5">
    <div class="container">
        <div class="row ">
            <div class="col-lg-7 col-md-10 col-12 mx-auto">
                <h1 class="text-center text-white py-lg-4 py-3">Looking For Trail?</h1>
                {{-- <div class="trail-profile--meta-search text-center">
                    <span data-value="Search Trails"> <i class="fa-solid fa-magnifying-glass"></i> All
                        Trail</span>
                    <span data-value="Upsection-trail Trails"> <i class="fa-solid fa-magnifying-glass"></i>
                        Up Coming Trail</span>
                    <span data-value="New Trails"> <i class="fa-solid fa-magnifying-glass"></i> New Trail</span>
                    <span data-value="Existing Trails"> <i class="fa-solid fa-magnifying-glass"></i> Existing
                        Trail</span>
                </div> --}}
                <div class="search-trail">
                    <form id="searchForm" action="#">
                        <div class="d-flex align-items-center justify-content-between search-trail__search">
                            <div class="search-trail__search--input d-flex align-items-center flex-fill">
                                <b><i class="fa-solid fa-magnifying-glass"></i></b>
                                <input id="searchInput" class="search-trail__search--input-type" type="text"
                                    placeholder="Search Trail">
                            </div>
                            <button id="searchButton" class="btn-search" type="submit">
                                <i class="fa-solid fa-magnifying-glass"></i> Search
                            </button>
                        </div>
                    </form>
                    <ul id="dropdownMenu" class="dropdown-menu search-container"></ul>
                </div>
            </div>

        </div>
    </div>
</div>
<section class="section-trail mb-3">
    <div class="container">
        <div class="section__title text-center py-lg-3 text-lg-start">
            <h3 class="text-center d-block">
                Top Destination
                </h1>
        </div>
        <div class="section-trail__details">
            <div class="row g-4 ">
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <a href="{{ route('user.trail.details') }}">
                        <div class="section-trail__details__list">
                            <div class="section-trail__details__list__box">
                                <div class="logo-img">
                                    <img src="{{ asset('user/images/trail/Climbers-side-Nepali-Mount-Everest.webp') }}"
                                        alt="" class="img">
                                    {{-- <div class="bagde-flag-wrap">
                                        <a href="#" class="bagde-flag"> Top Trail </a>
                                    </div> --}}
                                </div>

                                <div class="text">

                                    <small><i class="fa-solid fa-location-dot"></i> Solukhumbu Nepal -10
                                    </small>
                                    <a href="{{ route('user.trail.details') }}">
                                        <h5>Everest Base Camp Trek - 13 Things to Know for Your Trip</h5>
                                    </a>
                                    <small><i class="fa-regular fa-calendar-days"></i> Duration - <b>10 Days</b>
                                    </small>
                                    <small><i class="fa-solid fa-plane-up"></i> Transport - <b> Private vehicle / By Air
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
                                    <img src="https://media.everestbasecamptravel.com/uploads/package/namche-helicopter-flight.webp"
                                        alt="" class="img">
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
                                    <small><i class="fa-solid fa-plane-up"></i> Transport - <b> Private vehicle / By Air
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
                                    <img src="https://media.everestbasecamptravel.com/uploads/package/namche-helicopter-flight.webp"
                                        alt="" class="img">
                                    {{-- <div class="bagde-flag-wrap">
                                        <a href="#" class="bagde-flag"> Top Trail </a>
                                    </div> --}}
                                </div>

                                <div class="text">

                                    <small><i class="fa-solid fa-location-dot"></i> Kathmandu, Nepal </small>
                                    <h5>Everest Base Camp Trek - 13 Things to Know for Your Trip</h5>
                                    <small><i class="fa-regular fa-calendar-days"></i> Duration - <b>10 Days</b>
                                    </small>
                                    <small><i class="fa-solid fa-plane-up"></i> Transport - <b> Private vehicle / By Air
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
                                    <img src="https://media.everestbasecamptravel.com/uploads/package/namche-helicopter-flight.webp"
                                        alt="" class="img">

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
                                    <img src="https://media.everestbasecamptravel.com/uploads/package/namche-helicopter-flight.webp"
                                        alt="" class="img">

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
                                    <img src="https://media.everestbasecamptravel.com/uploads/package/namche-helicopter-flight.webp"
                                        alt="" class="img">

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
                                    <img src="https://media.everestbasecamptravel.com/uploads/package/namche-helicopter-flight.webp"
                                        alt="" class="img">

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
                                    <img src="https://media.everestbasecamptravel.com/uploads/package/namche-helicopter-flight.webp"
                                        alt="" class="img">

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
</section>
 
   
@endsection

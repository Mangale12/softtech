@extends('user.user_dashboard')
@section('content')
    <div class="trail-profile  pb-lg-5">
        <div class="container">
            <div class="row ">
                <div class="col-lg-7 col-md-10 col-12 mx-auto">
                    <h1 class="text-center text-white py-lg-5 py-3">Looking For New Trail?</h1>
                    <div class="trail-profile--meta-search text-center">
                        <span data-value="Search Trails"> <i class="fa-solid fa-magnifying-glass"></i> All
                            Trail</span>
                        <span data-value="Upsection-trail Trails"> <i class="fa-solid fa-magnifying-glass"></i>
                            Up Coming Trail</span>
                        <span data-value="New Trails"> <i class="fa-solid fa-magnifying-glass"></i> New Trail</span>
                        <span data-value="Existing Trails"> <i class="fa-solid fa-magnifying-glass"></i> Existing
                            Trail</span>
                    </div>
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
    {{-- <section class="about-trail py-lg-5">

        <div class="container">
          
            <div class="row">
                <div class="col-lg-12">
                    <h1>What is Trail?</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    
                    <p>
                        Sustainability has always been at the heart of everything we do. We want everyone to trek in a way where
                        they not only leave no trace, but they leave mountains better than they found them. This is the mission
                        of our Green Trails initiative.
    
                     
                    </p>
                    <p>
                        The most visible impact of the Green Trails initiative has been the removal of over 100 tonnes of litter
                        from trekking trails. Everyday, even as you read this, our team, including our trekkers, are cleaning up
                        trails with the help of our iconic Eco bags. While picking up litter is easy, they further do the most
                        difficult work — they segregate the waste for the right way of disposal.
    
            
                    </p>
                    <p>
                        But Green Trails goes much beyond cleaning up of trails. Indiahikes works with sustainability at its
                        core, whether it is in how we source our equipment, what we cook, how we buy provisions, or how we
                        manage human waste at high altitudes. The Golden 6 Practices below will give you a clearer picture of
                        the far-reaching impact of Green Trails.
                    </p>
                </div>
                <div class="col-lg-6">
                    <iframe width="100%" height="350px" src="https://www.youtube.com/embed/cz-X7Ss_Vuw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
 
        </div>
    </section> --}}
    <section class="about-taan my-lg-5">
        <div class="container">
            <div class="section__title text-center text-lg-start">
                <h3>
                    What is Trail ?
                    </h1>
                   <hr>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 pe-lg-4">
                    <p>
                        A trail, in its most fundamental sense, is a path or route created for walking, hiking, biking, or
                        horseback riding. Trails can be found in a variety of environments, ranging from urban parks to
                        remote wilderness areas. They provide a means for people to explore and appreciate the natural
                        world, promoting physical activity and offering a respite from the hustle and bustle of everyday
                        life. The term "trail" originates from the Old French word "trailer," meaning "to tow" or "to drag."
                        Historically, trails were created by the repeated passage of people or animals, resulting in a
                        visible path through vegetation or terrain. Today, trails are often intentionally designed and
                        maintained to provide safe and accessible routes for recreational and educational purposes. Types of
                        Trails Hiking Trails: Designed for walking and hiking, these trails vary in length and difficulty,
                        from short nature walks to long-distance backpacking routes.
                    </p>

                </div>
                <div class="col-lg-6">
                    <div class="taan-trail-video">
                        <!-- <img src="{{ asset('') }}images/about/about_image_2.png" alt="img"> -->
                        <a class="video__wrapper" href="https://www.youtube.com/watch?v=BchpIcqJy8w"
                            data-fancybox="gallery">
                            <img src="https://i3.ytimg.com/vi/cz-X7Ss_Vuw/maxresdefault.jpg" />
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
    <section class="section-trail mb-3">
        <div class="container">
            <div class="section__title text-center text-lg-start">
                <h3>
                    Top Trails
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
                                        <div class="bagde-flag-wrap">
                                            <a href="#" class="bagde-flag"> Top Trail </a>
                                        </div>
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
                                        <div class="bagde-flag-wrap">
                                            <a href="#" class="bagde-flag"> Top Trail </a>
                                        </div>
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
                                        <div class="bagde-flag-wrap">
                                            <a href="#" class="bagde-flag"> Top Trail </a>
                                        </div>
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

                </div>

            </div>
        </div>
    </section>
    <section class="section-trail mt-lg-5 my-3">
        <div class="container">
            <div class="section__title text-center text-lg-start">
                <h3>
                    Place To Go
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
                                        <div class="bagde-flag-wrap">
                                            <a href="#" class="bagde-flag"> Popular </a>
                                        </div>
                                    </div>

                                    <div class="text">

                                        <small><i class="fa-solid fa-location-dot"></i> Solukhumbu Nepal -10
                                        </small>
                                        <a href="{{ route('user.trail.details') }}">
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
                        <a href="#">
                            <div class="section-trail__details__list">
                                <div class="section-trail__details__list__box">
                                    <div class="logo-img">
                                        <img src="https://media.everestbasecamptravel.com/uploads/package/namche-helicopter-flight.webp"
                                            alt="" class="img">
                                        <div class="bagde-flag-wrap">
                                            <a href="#" class="bagde-flag"> Popular </a>
                                        </div>
                                    </div>

                                    <div class="text">

                                        <small><i class="fa-solid fa-location-dot"></i> Kathmandu, Chitwan, Pokhara
                                        </small>
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
                                        <div class="bagde-flag-wrap">
                                            <a href="#" class="bagde-flag"> Popular </a>
                                        </div>
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
    <div class="container">
        <div class="row">

            <div class="col-lg-12 my-lg-4 pt-3 mt-3">
                <div class="trail-card ">
                    <img src="{{ asset('user/images/home-banner.png') }}" alt="banner">
                    <div class="trail-card__details d-flex justify-content-center align-items-center">
                        <div class="trail-card__content text-center">
                            <h1 class="text-white title">Start planning your next trail adventure</h1>
                            <p class="text-white subtitle ">TAAN helps adventure-seekers plan and book travel to
                                some of the most popular mountain destinations around the Nepal</p>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <section class="section-trail mb-3">
        <div class="container">
            <div class="section__title text-center text-lg-start">
                <h3>
                    Upcoming Trails
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
                                        <div class="bagde-flag-wrap">
                                            <a href="#" class="bagde-flag"> Upcoming </a>
                                        </div>
                                    </div>

                                    <div class="text">

                                        <small><i class="fa-solid fa-location-dot"></i> Solukhumbu Nepal -10
                                        </small>
                                        <a href="{{ route('user.trail.details') }}">
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
                        <a href="#">
                            <div class="section-trail__details__list">
                                <div class="section-trail__details__list__box">
                                    <div class="logo-img">
                                        <img src="https://media.everestbasecamptravel.com/uploads/package/namche-helicopter-flight.webp"
                                            alt="" class="img">
                                        <div class="bagde-flag-wrap">
                                            <a href="#" class="bagde-flag"> Upcoming </a>
                                        </div>
                                    </div>

                                    <div class="text">

                                        <small><i class="fa-solid fa-location-dot"></i> Kathmandu, Chitwan, Pokhara
                                        </small>
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
                                        <div class="bagde-flag-wrap">
                                            <a href="#" class="bagde-flag"> Upcoming </a>
                                        </div>
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
    <section class="section-trail mb-3">
        <div class="container">
            <div class="section__title text-center text-lg-start">
                <h3>
                    Family Friendly Trails
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
                                            <a href="#" class="bagde-flag"> Upcoming </a>
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
                                        {{-- <div class="bagde-flag-wrap">
                                            <a href="#" class="bagde-flag"> Upcoming </a>
                                        </div> --}}
                                    </div>

                                    <div class="text">

                                        <small><i class="fa-solid fa-location-dot"></i> Kathmandu, Chitwan, Pokhara
                                        </small>
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
                                        {{-- <div class="bagde-flag-wrap">
                                            <a href="#" class="bagde-flag"> Upcoming </a>
                                        </div> --}}
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
    <section class="section-trail mb-3">
        <div class="container">
            <div class="section__title text-center text-lg-start">
                <h3>
                    Cultural Trails
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
                                            <a href="#" class="bagde-flag"> Upcoming </a>
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
                                        {{-- <div class="bagde-flag-wrap">
                                            <a href="#" class="bagde-flag"> Upcoming </a>
                                        </div> --}}
                                    </div>

                                    <div class="text">

                                        <small><i class="fa-solid fa-location-dot"></i> Kathmandu, Chitwan, Pokhara
                                        </small>
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
                                        {{-- <div class="bagde-flag-wrap">
                                            <a href="#" class="bagde-flag"> Upcoming </a>
                                        </div> --}}
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
    <section class="trail-list-overal  py-lg-5 ">
        <div class="container">
            <div class="section__title text-center text-lg-start mb-lg-4">
                <h3>
                    Trail by Category
                    </h1>
                 
            </div>
            <div class="row g-2">
                <div class="col-lg-2">
                    <div class="trail-list-overal__details">

                        <h5 class="mb-lg-4">Trail by Season</h5>

                        <ul>
                            <li><a href="#">Spring
                                </a></li>
                            <li><a href="#">Summer
                                </a></li>
                            <li><a href="#">Monsoon
                                </a></li>
                            <li><a href="#">Autumn
                                </a></li>
                            <li><a href="#">Winter
                                </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="trail-list-overal__details">

                        <h5 class="mb-lg-4">Trail by Month</h5>

                        <ul class="d-flex ">
                            <div class="w-50">
                                <li><a href="#">January
                                </a></li>
                            <li><a href="#">February
                                </a></li>
                            <li><a href="#">March
                                </a></li>
                            <li><a href="#">April
                                </a></li>
                            <li><a href="#">May
                                </a></li>
                            </div>
                            <div class="w-50">
   
                                <li><a href="#">Jun
                                </a></li>
                            <li><a href="#">July
                                </a></li>
                            <li><a href="#">Oct
                                </a></li>
                                <li><a href="#">Nov
                                </a></li>
                                <li><a href="#">Dec
                                </a></li>
                            </div>
                       

                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="trail-list-overal__details">

                        <h5 class="mb-lg-4">Trail by Duration</h5>

                        <ul>
                            <li><a href="#">1 Day
                                </a></li>
                            <li><a href="#">2 Day
                                </a></li>
                            <li><a href="#">3 Day
                                </a></li>
                            <li><a href="#">4 Day
                                </a></li>
                            <li><a href="#">5 Day
                                </a></li>
                            <li><a href="#">6 Day
                                </a></li>
                            <li><a href="#">7+ Day
                                </a></li>
                           

                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="trail-list-overal__details">

                        <h5 class="mb-lg-4">Trail by Difficulty</h5>

                        <ul>
                         
                            <li><a href="#">Easy
                               
                                </a></li>
                            <li><a href="#"> Easy - Moderate
                                
                                </a></li>
                            <li><a href="#">Moderate
                                
                                </a></li>
                            <li><a href="#">Moderate - Difficult
                               
                                </a></li>
                            <li><a href="#"> Difficult
                                </a></li>
                           

                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="trail-list-overal__details">

                        <h5 class="mb-lg-4">Trail by Cultural</h5>

                        <ul>
                         
                            <li><a href="#">Easy
                               
                                </a></li>
                            <li><a href="#"> Easy - Moderate
                                
                                </a></li>
                            <li><a href="#">Moderate
                                
                                </a></li>
                            <li><a href="#">Moderate - Difficult
                               
                                </a></li>
                            <li><a href="#"> Difficult
                                </a></li>
                           

                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="trail-list-overal__details">

                        <h5 class="mb-lg-4">Trail by Experience</h5>

                        <ul>
                         
                            <li><a href="#">Family Trail
                               
                                </a></li>
                            <li><a href="#"> Stargazing Trail
                                
                                </a></li>
                            <li><a href="#">Senior Trail
                                
                                </a></li>
                            <li><a href="#">Adventure Therapy
                               
                                </a></li>
                            <li><a href="#"> Summer Camps
                                </a></li>
                           

                        </ul>
                    </div>
                </div>
            </div>

            


        </div>
    </section>

    {{-- <section class="section-trail mb-3">
        <div class="container">

            <div class="section-trail__details">
                <div class="row g-4 ">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <a href="{{route('user.trail.details')}}">
                            <div class="section-trail__details__list">
                                <div class="section-trail__details__list__box">
                                    <div class="logo-img">
                                        <img src="{{ asset('user/images/trail/things-to-do-in-kathmandu-300x200.jpg') }}"
                                            alt="" class="img">
                                        <div class="tag up-coming  px-4">
                                            <img src="{{ asset('user/images/trail/soon.svg') }}" alt="coming soon">
                                        </div>
                                        <!-- <div class="bagde-flag-wrap">
                                                <a href="#" class="bagde-flag"> NEw </a>
                                              </div> -->
                                        <div class="trail-packages">

                                        </div>
                                    </div>

                                    <div class="text">

                                        <small><i class="fa-solid fa-location-dot"></i> Kathmandu, Chitwan, Pokhara
                                        </small>
                                        <h5 class="mb-lg-4">Things To Do In Kathmandu – 11 Must See And Do Activities In Nepal’s
                                            Capital </h5>

                                    </div>

                                </div>

                            </div> <!-- list section-trail -->
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <a href="{{route('user.trail.details')}}">
                            <div class="section-trail__details__list">
                                <div class="section-trail__details__list__box">
                                    <div class="logo-img">
                                        <img src="{{ asset('user/images/trail/Climbers-side-Nepali-Mount-Everest.webp') }} "
                                            alt="" class="img">
                                        <div class="bagde-flag-wrap">
                                            <a href="#" class="bagde-flag"> NEW </a>
                                        </div>
                                    </div>

                                    <div class="text">

                                        <small><i class="fa-solid fa-location-dot"></i> Solukhumbu Nepal -10
                                        </small>
                                        <a href="{{route('user.trail.details')}}">
                                            <h5>Everest Base Camp Trek - 13 Things to Know for Your Trip</h5>
                                        </a>

                                    </div>

                                </div>

                            </div> <!-- list section-trail -->
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <a href="{{route('user.trail.details')}}">
                            <div class="section-trail__details__list">
                                <div class="section-trail__details__list__box">
                                    <div class="logo-img">
                                        <img src="{{ asset('user/images/trail/Climbers-side-Nepali-Mount-Everest.webp') }}"
                                            alt="" class="img">
                                        <div class="bagde-flag-wrap">
                                            <a href="#" class="bagde-flag"> NEW </a>
                                        </div>
                                    </div>

                                    <div class="text">

                                        <small><i class="fa-solid fa-location-dot"></i> Solukhumbu Nepal -10
                                        </small>
                                        <a href="{{route('user.trail.details')}}">
                                            <h5>Everest Base Camp Trek - 13 Things to Know for Your Trip</h5>
                                        </a>



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
                                        <div class="bagde-flag-wrap">
                                            <a href="#" class="bagde-flag"> NEW </a>
                                        </div>
                                    </div>

                                    <div class="text">

                                        <small><i class="fa-solid fa-location-dot"></i> Kathmandu, Chitwan, Pokhara
                                        </small>
                                        <h5>Everest Base Camp Trek - 13 Things to Know for Your Trip</h5>


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
                                        <div class="bagde-flag-wrap">
                                            <a href="#" class="bagde-flag"> NEW </a>
                                        </div>
                                    </div>

                                    <div class="text">

                                        <small><i class="fa-solid fa-location-dot"></i> Kathmandu, Nepal </small>
                                        <h5>Everest Base Camp Trek - 13 Things to Know for Your Trip</h5>


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


                                    </div>

                                </div>

                            </div> <!-- list section-trail -->
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- up section-trail trail --> --}}
@endsection

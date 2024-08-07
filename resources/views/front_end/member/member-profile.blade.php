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
                            {{-- <i>DREAM, PLAN, AND DISCOVER WITH US</i>
                            <h2 class="my-3 mb-4">About Us</h2> --}}

                            <div class=" page_content">
                                {!! $member->about_us !!}

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

                        @if($posts->count() > 0)
                            @foreach ($posts as $key => $post)
                            <div class="col-lg-3">
                                <div class="trail-packages__card">

                                    <a class="tour_image" href="">
                                        @if($post->thumbs != null && file_exists($post->thumbs))
                                        <img src="{{asset($post->thumbs)}} " alt="img">
                                        @endif
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
                            @endforeach
                        @else
                        <div class="col-lg-12">
                            <div class="text-center">
                                <h3>No related posts found.</h3>
                            </div>
                        </div>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <footer class="footer footer-members  mt-lg-5 mt-3">
        <div class="container">
            <div class="row g-lg-5 g-3 ">
                <div class="col-lg-4 col-md-4 col-12 pr-md-5 mb-4 mb-md-0">
                    @if(isset($all_view['common']))
                    <h3> {{ $all_view['common']->footer_first_title }}</h3>
                    @endif
                    <img src="{{ asset('user/images/trail/logo.svg') }}" height="50" alt="logo">
                    <p class="mb-4 mt-4">Nepal Trak Adventure & Expedition Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit. Laboriosam itaque
                        unde
                        facere repellendus, odio et iste voluptatum aspernatur ratione mollitia tempora eligendi
                        maxime
                        est, blanditiis accusamus. Incidunt, aut, quis!</p>
                    <ul class="list-unstyled quick-info  mb-4">
                        <li><a href="#" class="d-flex align-items-center"><span class="me-3 "><i
                                        class="fa-solid fa-phone"></i></span> +1
                                291 3912 329</a></li>
                        <li><a href="#" class="d-flex align-items-center"><span class="me-3"><i
                                        class="fa-solid fa-envelope"></i></span>
                                info@gmail.com</a></li>
                    </ul>
                    <form action="#" class="subscribe">
                        <input type="text" class="form-control" placeholder="Enter your e-mail">
                        <input type="submit" class="btn btn-submit" value="Send">
                    </form>
                </div>
                <div class="col-lg-5 col-md-4 col-12 mb-4 mb-md-0">
                    <h3>Our Selections</h3>

                    <ul class="list-unstyled trails-list">
                        <li class="trail-package">

                            <div class="trails-list--title d-flex">
                                <span class="me-2"><i class="fa-solid fa-right-long"></i> </span>
                                <a href="#"> Everest Base Camp Helicopter Tour</a>
                            </div>

                        </li>
                        <li class="trail-package">

                            <div class="trails-list--title d-flex">
                                <span class="me-2"><i class="fa-solid fa-right-long"></i> </span>
                                <a href="#"> Annapurna Base Camp Trek - 7 Days</a>
                            </div>

                        </li>
                        <li class="trail-package">

                            <div class="trails-list--title d-flex">
                                <span class="me-2"><i class="fa-solid fa-right-long"></i> </span>
                                <a href="#"> Everest Base Camp Trek - 14 Days</a>
                            </div>

                        </li>
                        <li class="trail-package">

                            <div class="trails-list--title d-flex">
                                <span class="me-2"><i class="fa-solid fa-right-long"></i> </span>
                                <a href="#"> Everest Base Camp Trek - 13 Things to Know for Your Trip</a>
                            </div>

                        </li>
                        <li class="trail-package">

                            <div class="trails-list--title d-flex">
                                <span class="me-2"><i class="fa-solid fa-right-long"></i> </span>
                                <a href="#"> Annapurna Base Camp Trek - 7 Days</a>
                            </div>

                        </li>
                        <li class="trail-package">

                            <div class="trails-list--title d-flex">
                                <span class="me-2"><i class="fa-solid fa-right-long"></i> </span>
                                <a href="#"> Everest Base Camp Trek - 14 Days</a>
                            </div>

                        </li>
                        <li class="trail-package">

                            <div class="trails-list--title d-flex">
                                <span class="me-2"><i class="fa-solid fa-right-long"></i> </span>
                                <a href="#"> Everest Base Camp Trek - 13 Things to Know for Your Trip</a>
                            </div>

                        </li>
                        <li class="trail-package">

                            <div class="trails-list--title d-flex">
                                <span class="me-2"><i class="fa-solid fa-right-long"></i> </span>
                                <a href="#"> Annapurna Base Camp Trek - 7 Days</a>
                            </div>

                        </li>
                        <li class="trail-package">

                            <div class="trails-list--title d-flex">
                                <span class="me-2"><i class="fa-solid fa-right-long"></i> </span>
                                <a href="#"> Everest Base Camp Trek - 14 Days</a>
                            </div>

                        </li>
                        <li class="trail-package">

                            <div class="trails-list--title d-flex">
                                <span class="me-2"><i class="fa-solid fa-right-long"></i> </span>
                                <a href="#"> Everest Base Camp Trek - 13 Things to Know for Your Trip</a>
                            </div>

                        </li>

                    </ul>
                </div>
                <div class="col-lg-3 col-md-4 col-12 mb-4 mb-md-0">
                    <h3>Photo Gallery</h3>
                    <div class="row g-3 gallery">
                        <div class="col-6">
                            <a data-fancybox="gallery"
                                data-src="{{ asset('user/images/trail/Mount_Everest_as_seen_from_Drukair2_PLW_edit.jpg') }}"
                                data-caption="Optional caption,&lt;br /&gt;that can contain &lt;em&gt;HTML&lt;/em&gt; code">
                                <img src="{{ asset('user/images/trail/Mount_Everest_as_seen_from_Drukair2_PLW_edit.jpg') }}"
                                    width="100%" height="130" alt="img" />
                            </a>

                        </div>
                        <div class="col-6">


                            <a data-fancybox="gallery"
                                data-src="{{ asset('user/images/trail/annapurna-circuit-trekking.jpg') }}"
                                data-caption="Optional caption,&lt;br /&gt;that can contain &lt;em&gt;HTML&lt;/em&gt; code">
                                <img src="{{ asset('user/images/trail/annapurna-circuit-trekking.jpg') }}"
                                    width="100%" height="130" alt="img" />
                            </a>
                        </div>
                        <div class="col-6">
                            <a data-fancybox="gallery"
                                data-src="{{ asset('user/images/trail/annapurna-circuit-trekking.jpg') }}"
                                data-caption="Optional caption,&lt;br /&gt;that can contain &lt;em&gt;HTML&lt;/em&gt; code">
                                <img src="{{ asset('user/images/trail/annapurna-circuit-trekking.jpg') }}"
                                    width="100%" height="130" alt="img" />
                            </a>


                        </div>
                        <div class="col-6">
                            <a data-fancybox="gallery"
                                data-src="{{ asset('user/images/trail/annapurna-circuit-trekking.jpg') }}"
                                data-caption="Optional caption,&lt;br /&gt;that can contain &lt;em&gt;HTML&lt;/em&gt; code">
                                <img src="{{ asset('user/images/trail/annapurna-circuit-trekking.jpg') }}"
                                    width="100%" height="130" alt="img" />
                            </a>


                        </div>
                        <div class="col-6">
                            <a data-fancybox="gallery"
                                data-src="{{ asset('user/images/trail/annapurna-circuit-trekking.jpg') }}"
                                data-caption="Optional caption,&lt;br /&gt;that can contain &lt;em&gt;HTML&lt;/em&gt; code">
                                <img src="{{ asset('user/images/trail/annapurna-circuit-trekking.jpg') }}"
                                    width="100%" height="130" alt="img" />
                            </a>


                        </div>
                        <div class="col-6">
                            <a data-fancybox="gallery"
                                data-src="{{ asset('user/images/trail/annapurna-circuit-trekking.jpg') }}"
                                data-caption="Optional caption,&lt;br /&gt;that can contain &lt;em&gt;HTML&lt;/em&gt; code">
                                <img src="{{ asset('user/images/trail/annapurna-circuit-trekking.jpg') }}"
                                    width="100%" height="130" alt="img" />
                            </a>


                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="py-5 footer-menu-wrap d-flex flex-wrap justify-content-between align-items-center">
                        <ul class="list-unstyled d-flex">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Trail</a></li>
                            <li><a href="#">Members</a></li>
                             <li><a href="#">Login</a></li>
                        <li><a href="#">Become a member</a></li>
                        </ul>
                        <div class="site-logo-wrap ml-auto">
                            <a href="#" class="site-logo text-white">
                                SoftTech
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </footer> --}}
@endsection

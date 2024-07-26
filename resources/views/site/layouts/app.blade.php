<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>KnowledgeHut</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="56x56" href="{{ asset('assets/site/images/knowledgeHut/logo/logo.png')}}">
    <!-- bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/bootstrap.min.css')}}" type="text/css" media="all" />
    <!-- carousel CSS -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/owl.carousel.min.css')}}" type="text/css" media="all" />
    <!-- responsive CSS -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/responsive.css')}}" type="text/css" media="all" />
    <!-- nivo-slider CSS -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/nivo-slider.css')}}" type="text/css" media="all" />
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/animate.css')}}" type="text/css" media="all" />
    <!-- animated-text CSS -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/animated-text.css')}}" type="text/css" media="all" />
    <!-- font-awesome CSS -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/site/fonts/font-awesome/css/font-awesome.min.css')}}">
    <!-- font-flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/flaticon.css')}}" type="text/css" media="all" />
    <!-- theme-default CSS -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/theme-default.css')}}" type="text/css" media="all" />
    <!-- meanmenu CSS -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/meanmenu.min.css')}}" type="text/css" media="all" />
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/style.css')}}" type="text/css" media="all" />
    <!-- transitions CSS -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/owl.transitions.css')}}" type="text/css" media="all" />
    <!-- venobox CSS -->
    <link rel="stylesheet" href="{{ asset('assets/site/venobox/venobox.css')}}" type="text/css" media="all" />
    <!-- widget CSS -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/widget.css')}}" type="text/css" media="all" />
    <!-- modernizr js -->
    <script type="text/javascript" src="{{ asset('assets/site/js/vendor/modernizr-3.5.0.min.js')}}"></script>

</head>

<body>
    <!-- Loder Start-->
    <div class="loader-wrapper">
        <div class="loader"></div>
        <div class="loder-section left-section"></div>
        <div class="loder-section right-section"></div>
    </div>
    <!-- Loder End -->
    <!--==================================================-->
    <!----- Start Techno Main Menu Area ----->
    <!--==================================================-->
    @include('site.includes.header')

    <!--==================================================-->
    <!----- End Techno Main Menu Area ----->
    <!--==================================================-->
    <!--==================================================-->
    <!----- End Techno Banner Area ----->
    <!--==================================================-->
    @if(!empty($data['banner']))
    <div class="banner_area  d-flex align-items-center">
        <!-- banner3 -->
        <video autoplay muted loop id="myVideo">
            <source src="{{asset( $data['banner']->image )}}" type="video/mp4">
        </video>
        <div class="container home-banner">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="single_banner">
                        <div class="single_banner_content">
                            <div class="banner_text_content white">
                                <h5 class="mb-3 wow fadeInUp" data-wow-delay="0.5s">{{$data['banner']->title}}</h5>
                                <h1 class="wow fadeInUp" data-wow-delay="0.4s">{{ $data['banner']->description}}</h1>
                                <!-- <h1 class="wow fadeInUp" data-wow-delay="0.4s">Products Creators</h1> -->
                            </div>
                            <div class="slider_button pt-25 d-flex">
                                <div class="button color_two">
                                    <a class="wow fadeInUp" data-wow-delay="0.5s" href="{{ $data['banner']->url }}">In-Demand Courses
                                        <!-- <i class="fa fa-long-arrow-right"></i> -->
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!--==================================================-->
    <!----- Start Techno Banner Area ----->
    <!--==================================================-->


    <!--==================================================-->
    <!----- Start Techno About Area ----->
    <!--==================================================-->
    <div class="about_area pt-80 pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-6">
                    <div class="single_about_thumb wow fadeInLeft" data-wow-delay="0.3s">
                        <div class="single_about_thumb_inner">
                            <img src="assets/images/new/ab3.png" alt="" />
                        </div>
                        <div class="shape_thumb">
                            <div class="about_shape_thumb_affiliate1 bounce-animate">
                                <img src="assets/images/shape/3.png" alt="" />
                            </div>
                            <div class="about_shape_thumb_affiliate2 rotateme">
                                <img src="assets/images/shape/rt2.png" alt="" />
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-6">
                    <div class="section_title text_left mb-40">
                        <div class="section_sub_title uppercase mb-3 wow fadeInRight" data-wow-delay="0.3s">
                            <!-- <h6>DreamIT About</h6> -->
                        </div>
                        <div class="section_main_title wow fadeInRight" data-wow-delay="0.3s">
                            <h1>Develop the <span>skills</span> to move fast and stay ahead.</h1>
                            <!-- <h1>Best Data <span>Solutions.</span></h1> -->
                        </div>
                        <div class="em_bar">
                            <div class="em_bar_bg"></div>
                        </div>
                        <div class="section_content_text pt-4 wow fadeInRight" data-wow-delay="0.3s">
                            <p>We are leading training provider, helping professionals across industries and sectors
                                develop new expertise and bridge their skill gap for recognition and growth in the
                                global corporate world.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="about_icon_box wow fadeInUp" data-wow-delay="0.5s">
                                <div class="about_icon_box_inner mb-20">
                                    <span><i class="fa fa-check-square-o"></i> Enhance Career Excellence</span>
                                </div>
                                <div class="about_icon_box_inner mb-20">
                                    <span><i class="fa fa-check-square-o"></i> Perform as Think-Tank</span>
                                </div>
                                <div class="about_icon_box_inner mb-20">
                                    <span><i class="fa fa-check-square-o"></i>Establish Governance</span>
                                </div>
                                <div class="about_icon_box_inner mb-20">
                                    <span><i class="fa fa-check-square-o"></i> Focus on Future Skills</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about_icon_box wow fadeInUp" data-wow-delay="0.5s">
                                <div class="about_icon_box_inner mb-20">
                                    <span><i class="fa fa-check-square-o"></i> Reliable & Cost Effective</span>
                                </div>
                                <div class="about_icon_box_inner mb-20">
                                    <span><i class="fa fa-check-square-o"></i> Dedicated Developers</span>
                                </div>
                                <div class="about_icon_box_inner mb-20">
                                    <span><i class="fa fa-check-square-o"></i> Psychological scoring</span>
                                </div>
                                <div class="about_icon_box_inner mb-20">
                                    <span><i class="fa fa-check-square-o"></i> 24/7 Fully Support</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--==================================================-->
    <!----- End Techno About Area ----->
    <!--==================================================-->

    <!--==================================================-->
    <!----- Start Techno Counter Area ----->
    <!--==================================================-->
    <div class="counter_area bg_color2 pt-90 pb-70" style="background-image:url(assets/images/knowledgeHut/bg-1.jpg); background-repeat:no-repeat;background-size:cover;background-position:center center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="counter_style_four d-flex wow flipInY" data-wow-delay="0ms" data-wow-duration="2500ms">
                        <div class="counter_style_four_icon mr-4">
                            <div class="icon mt-30">
                                <i class="flaticon-developer"></i>
                            </div>
                        </div>
                        <div class="counter_style_four_text">
                            <h1><span class="counter">245</span><span>M</span> </h1>
                            <h5>Happy Students</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="counter_style_four d-flex wow flipInY" data-wow-delay="0ms" data-wow-duration="2500ms">
                        <div class="counter_style_four_icon mr-4">
                            <div class="icon mt-30">
                                <i class="flaticon-intelligent"></i>
                            </div>
                        </div>
                        <div class="counter_style_four_text">
                            <h1><span class="counter">185</span><span>K</span> </h1>
                            <h5>Win Award</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="counter_style_four d-flex wow flipInY" data-wow-delay="0ms" data-wow-duration="2500ms">
                        <div class="counter_style_four_icon mr-4">
                            <div class="icon mt-30">
                                <i class="flaticon-content"></i>
                            </div>
                        </div>
                        <div class="counter_style_four_text">
                            <h1><span class="counter">389</span><span>M</span> </h1>
                            <h5>Project Done</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="counter_style_four d-flex wow flipInY" data-wow-delay="0ms" data-wow-duration="2500ms">
                        <div class="counter_style_four_icon mr-4">
                            <div class="icon mt-30">
                                <i class="flaticon-analysis"></i>
                            </div>
                        </div>
                        <div class="counter_style_four_text">
                            <h1><span class="counter">1358</span><span>+</span> </h1>
                            <h5>Project Research</h5>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--==================================================-->
    <!----- End Techno Counter Area ----->
    <!--==================================================-->

    <!--==================================================-->
    <!----- Start Techno Service Area ----->
    <!--==================================================-->
    <div class="service_area pt-80 pb-70">
        <div class="container">
            <div class="row">
                <!-- Start Section Tile -->
                <div class="col-lg-12">
                    <div class="section_title text-center mb-50 wow fadeInDown" data-wow-delay="0.5s">
                        <!-- <div class="section_sub_title uppercase mb-3">
							<h6>Our Services</h6>
						</div> -->
                        <div class="section_main_title">
                            <h1>Discover our in-demand courses</h1>
                            <!-- <h1>For Your Best Service</h1> -->
                        </div>
                        <div class="em_bar">
                            <div class="em_bar_bg"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @if($data['demand-course'])
                @foreach($data['demand-course'] as $row)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="service_style_eleven  wow flipInY" data-wow-delay="0ms" data-wow-duration="2500ms">
                        <div class="card service-card">
                            <img src="{{ asset($row->image)}}" class="card-img-top" alt="...">

                            <div class="single_service_style_eleven nagative_margin">
                                <div class="service_style_eleven_icon">
                                    <div class="icon">
                                        <i class="flaticon-data"></i>
                                    </div>
                                </div>
                                <div class="service_style_eleven_title pb-4">
                                    <h4>{{ $row->title }}</h4>
                                </div>
                                <div class="service_style_eleven_text pt-2">
                                    <p>{{ $row->description }}</p>
                                </div>
                                <div class="servic_style_eleven_button">
                                    <!-- <a href="#">Read More</a> -->
                                    <div><i class="fa fa-calendar-o" aria-hidden="true"></i>&nbsp;&nbsp;Duration:&nbsp;<span>{{ $row->duration }}</span>
                                    </div>
                                    <div><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;&nbsp;Course
                                        Start:&nbsp;{{ date('F d, Y', strtotime($row->start_date)) }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif

            </div>
        </div>
    </div>
    <!--==================================================-->
    <!----- End Techno Service Area ----->
    <!--==================================================-->
    <!-- international associates start  -->
    <div class="brand_area our-associate pt-35 pb-80 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="partner_main_title">
                        <h3>Our International <span>Association</span></h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley</p>
                    </div>
                    <div class="row">
                        <!--testimonial owl curousel -->
                        <div class="asso_list owl-carousel curosel-style">
                            <!-- Single Brand -->
                            @if($data['international_association'])
                            @foreach($data['international_association'] as $row)
                            <div class="col-lg-12">
                                <div class="single_brand">
                                    <div class="single_brand_thumb">
                                        <img src="{{asset($row->image)}}" alt="" />
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- international associates end  -->
    <!--==================================================-->
    <!----- Start Techno Software Area ----->
    <!--==================================================-->
    <div class="software_area pt-50 pb-80">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-7">
                    <div class="section_title text_left mb-40 wow fadeInLeft" data-wow-delay="0.3s">
                        <!-- <div class="section_sub_title uppercase mb-3">
							<h6>Software Company</h6>
						</div> -->
                        <div class="section_main_title">
                            <h1>Transition to your dream career with <span>Bootcamps</span></h1>

                        </div>
                        <div class="em_bar">
                            <div class="em_bar_bg"></div>
                        </div>
                        <div class="section_content_text pt-4">
                            <p>We are privileged to work with hundred future thinking awesom business including many of
                                the world’s top Leading Demanded Courses</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="single_software_box">
                                <div class="single_software_box_content">
                                    <img src="assets/images/shape/vr-platform.png" alt="vs">
                                    <h5>Platform to boost your tech career</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="single_software_box">
                                <div class="single_software_box_content">
                                    <img src="assets/images/shape/digital-platform.png" alt="vs">
                                    <h5>Work-ready development Experience</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="single_software_box">
                                <div class="single_software_box_content">
                                    <img src="assets/images/shape/reading-glasses.png" alt="vs">
                                    <h5>Immersive Learning Experience</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider_button pt-25 d-flex">
                        <div class="button color_two">
                            <a class="wow fadeInUp" data-wow-delay="0.5s" href="#">BECOME A SKILLED DEVELOPER <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5">
                    <div class="software_thumb wow fadeInRight" data-wow-delay="0.3s">
                        <div class="software_thumb_inner">
                            <img src="assets/images/shape/ab1.png" alt="" />
                        </div>
                        <div class="software_shape_thumb">
                            <div class="software_shape_thumb_inner1 bounce-animate">
                                <img src="assets/images/shape/men1.png" alt="" />
                            </div>
                            <div class="software_shape_thumb_inner2 bounce-animate5">
                                <img src="assets/images/shape/men2.png" alt="" />
                            </div>
                            <div class="software_shape_thumb_inner3 rotateme">
                                <img src="assets/images/shape/rt1.png" alt="" />
                            </div>
                            <div class="software_shape_thumb_inner4 rotateme">
                                <img src="assets/images/shape/rt2.png" alt="" />
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==================================================-->
    <!----- End Techno Software Area ----->
    <!--==================================================-->
    <!-- our trusted by started  -->
    <div class="about_area trusted-area pt-70 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-4 wow fadeInLeft" data-wow-delay="0.4s">
                    <div class="section_title text_left mb-40 mt-3 wow fadeInRight" data-wow-delay="0.4s">
                        <div class="section_main_title">
                            <h3>Well <span>trusted by</span></h3>
                        </div>
                        <div class="em_bar">
                            <div class="em_bar_bg"></div>
                        </div>
                        <div class="section_content_text pt-4">
                            <p>We are thrilled to work with hundred future thinking awesom business including many of
                                the world’s top hardware and Software Innovative team</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-8">
                    <div class="singel_about_left mb-30 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="row">
                            <div class="brand_list2 owl-carousel">
                                @if($data['trusted-partner'] )
                                @foreach($data['trusted-partner'] as $row)
                                <div class="col-lg-3">
                                    <div class="trusted-by">
                                        <img src="{{ asset($row->image) }}" alt="">
                                    </div>
                                </div>
                                @endforeach
                                @endif
                              
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- our trusted by ended -->
    <!----- Start Techno Testimonial Area ----->
    <!--==================================================-->
    <div id="testimonial-section" class="testimonial-bg bg_color2 pt-80 pb-70">
        <div id="container-general" class="ready anim-section-features anim-section-desc anim-section-quote">
            <section id="section-quote">
                <div class="col-lg-12">
                    <div class="section_title text_center mt-3">
                        <div class="section_sub_title uppercase mb-3">
                            <h6>Alumni</h6>
                        </div>
                        <div class="section_main_title">
                            <h1>Our Happy <span>Students Says</span></h1>
                        </div>
                        <div class="em_bar">
                            <div class="em_bar_bg"></div>
                        </div>
                    </div>
                </div>
                <!--Left Bubble Images-->
                <div class="container-pe-quote left">
                    <div class="pp-quote li-quote-1" data-textquote="quote-text-1">
                        <div class="img animated bounce"></div>
                    </div>
                    <div class="pp-quote li-quote-2" data-textquote="quote-text-2">
                        <div class="img animated bounce"></div>
                    </div>
                    <div class="pp-quote li-quote-3" data-textquote="quote-text-3">
                        <div class="img animated bounce"></div>
                    </div>
                    <div class="pp-quote li-quote-4 active" data-textquote="quote-text-4">
                        <div class="img animated bounce"></div>
                    </div>
                    <div class="pp-quote li-quote-5" data-textquote="quote-text-5">
                        <div class="img animated bounce"></div>
                    </div>
                    <div class="pp-quote li-quote-6" data-textquote="quote-text-6">
                        <div class="img animated bounce"></div>
                    </div>
                </div>
                <!--Left Bubble Images-->
                <!--Center Testimonials-->
                <div class="container-quote carousel-on">
                    <!--Testimonial 1-->
                    <div class="quote quote-text-3 hide-bottom" data-ppquote="li-quote-3">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="container-info">
                                    <div class="pp"></div>
                                    <!-- image of testi	 -->
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <p>The instructors were extremely knowledgeable and passionate about the subject matter, and
                                    their enthusiasm was contagious. The curriculum was well-structured and covered all the
                                    essential aspects of the course in great detail.</p>
                                <div class="container-info name-tag">
                                    <div class="name">Kuber Oli</div>
                                    <div class="job">Software Developer</div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--Testimonial 2-->
                    <div class="quote quote-text-4 show" data-ppquote="li-quote-4">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="container-info">
                                    <div class="pp"></div>
                                    <!-- image of testi	 -->
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <p>The instructors were extremely knowledgeable and passionate about the subject matter, and
                                    their enthusiasm was contagious. The curriculum was well-structured and covered all the
                                    essential aspects of the course in great detail.</p>
                                <div class="container-info name-tag">
                                    <!-- <div class="pp"></div> -->
                                    <div class="name">Sanuka Basnet</div>
                                    <div class="job">Data Engineer</div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--Testimonial 3-->
                    <div class="quote hide-bottom quote-text-5" data-ppquote="li-quote-5">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="container-info">
                                    <div class="pp"></div>
                                    <!-- image of testi	 -->
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <p>The instructors were extremely knowledgeable and passionate about the subject matter, and
                                    their enthusiasm was contagious. The curriculum was well-structured and covered all the
                                    essential aspects of the course in great detail.</p>
                                <div class="container-info name-tag">
                                    <!-- <div class="pp"></div> -->
                                    <div class="name">Sanskar Oli</div>
                                    <div class="job">DBA</div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--Testimonial 4-->
                    <div class="quote hide-bottom quote-text-6" data-ppquote="li-quote-6">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="container-info">
                                    <div class="pp"></div>
                                    <!-- image of testi	 -->
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <p>The instructors were extremely knowledgeable and passionate about the subject matter, and
                                    their enthusiasm was contagious. The curriculum was well-structured and covered all the
                                    essential aspects of the course in great detail.</p>
                                <div class="container-info name-tag">
                                    <!-- <div class="pp"></div> -->
                                    <div class="name">Puran Chaudhary</div>
                                    <div class="job">Network Engineer</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Testimonial 5-->
                    <div class="quote hide-bottom quote-text-7" data-ppquote="li-quote-7">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="container-info">
                                    <div class="pp"></div>
                                    <!-- image of testi	 -->
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <p>The instructors were extremely knowledgeable and passionate about the subject matter, and
                                    their enthusiasm was contagious. The curriculum was well-structured and covered all the
                                    essential aspects of the course in great detail.</p>
                                <div class="container-info name-tag">
                                    <!-- <div class="pp"></div> -->
                                    <div class="name">Manoj Chhimal</div>
                                    <div class="job">Python/Django Developer</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Testimonial 6-->
                    <div class="quote hide-bottom quote-text-8" data-ppquote="li-quote-8">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="container-info">
                                    <div class="pp"></div>
                                    <!-- image of testi	 -->
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <p>The instructors were extremely knowledgeable and passionate about the subject matter, and
                                    their enthusiasm was contagious. The curriculum was well-structured and covered all the
                                    essential aspects of the course in great detail.</p>
                                <div class="container-info name-tag">
                                    <!-- <div class="pp"></div> -->
                                    <div class="name">Chandra Raut</div>
                                    <div class="job">Web Development</div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--Testimonial 7-->
                    <div class="quote hide-bottom quote-text-9" data-ppquote="li-quote-9">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="container-info">
                                    <div class="pp"></div>
                                    <!-- image of testi	 -->
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <p>The instructors were extremely knowledgeable and passionate about the subject matter, and
                                    their enthusiasm was contagious. The curriculum was well-structured and covered all the
                                    essential aspects of the course in great detail.</p>
                                <div class="container-info name-tag">
                                    <!-- <div class="pp"></div> -->
                                    <div class="name">Milan Tamang</div>
                                    <div class="job">Data Analytics</div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--Testimonial 8-->
                    <div class="quote hide-bottom quote-text-10" data-ppquote="li-quote-10">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="container-info">
                                    <div class="pp"></div>
                                    <!-- image of testi	 -->
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <p>The instructors were extremely knowledgeable and passionate about the subject matter, and
                                    their enthusiasm was contagious. The curriculum was well-structured and covered all the
                                    essential aspects of the course in great detail.</p>
                                <div class="container-info name-tag">
                                    <!-- <div class="pp"></div> -->
                                    <div class="name">Chakra Bom</div>
                                    <div class="job">Mobile App Developer</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Testimonial 9-->
                    <div class="quote hide-bottom quote-text-11" data-ppquote="li-quote-11">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="container-info">
                                    <div class="pp"></div>
                                    <!-- image of testi	 -->
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <p>The instructors were extremely knowledgeable and passionate about the subject matter, and
                                    their enthusiasm was contagious. The curriculum was well-structured and covered all the
                                    essential aspects of the course in great detail.</p>
                                <div class="container-info name-tag">
                                    <!-- <div class="pp"></div> -->
                                    <div class="name">Khem Man Pathak</div>
                                    <div class="job">Software Developer</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Testimonial 10-->
                    <div class="quote hide-bottom quote-text-13" data-ppquote="li-quote-13">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="container-info">
                                    <div class="pp"></div>
                                    <!-- image of testi	 -->
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <p>The instructors were extremely knowledgeable and passionate about the subject matter, and
                                    their enthusiasm was contagious. The curriculum was well-structured and covered all the
                                    essential aspects of the course in great detail.</p>
                                <div class="container-info name-tag">
                                    <!-- <div class="pp"></div> -->
                                    <div class="name">Deepak Rana</div>
                                    <div class="job">Nodejs Developer</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Testimonial 11-->
                    <div class="quote quote-text-1 hide-bottom" data-ppquote="li-quote-1">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="container-info">
                                    <div class="pp"></div>
                                    <!-- image of testi	 -->
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <p>The instructors were extremely knowledgeable and passionate about the subject matter, and
                                    their enthusiasm was contagious. The curriculum was well-structured and covered all the
                                    essential aspects of the course in great detail.</p>
                                <div class="container-info name-tag">
                                    <!-- <div class="pp"></div> -->
                                    <div class="name">Monika Singh</div>
                                    <div class="job">Python Developer</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Testimonial 12-->
                    <div class="quote quote-text-2 hide-bottom" data-ppquote="li-quote-2">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="container-info">
                                    <div class="pp"></div>
                                    <!-- image of testi	 -->
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <p>The instructors were extremely knowledgeable and passionate about the subject matter, and
                                    their enthusiasm was contagious. The curriculum was well-structured and covered all the
                                    essential aspects of the course in great detail.</p>
                                <div class="container-info name-tag">
                                    <!-- <div class="pp"></div> -->
                                    <div class="name">Mahadev Rana</div>
                                    <div class="job">Java Developer</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Right Bubble Images-->
                <div class="container-pe-quote right">
                    <div class="pp-quote li-quote-7" data-textquote="quote-text-7">
                        <div class="img animated bounce"></div>
                    </div>
                    <div class="pp-quote li-quote-8" data-textquote="quote-text-8">
                        <div class="img animated bounce"></div>
                    </div>
                    <div class="pp-quote li-quote-9" data-textquote="quote-text-9">
                        <div class="img animated bounce"></div>
                    </div>
                    <div class="pp-quote li-quote-10" data-textquote="quote-text-10">
                        <div class="img animated bounce"></div>
                    </div>
                    <div class="pp-quote li-quote-11" data-textquote="quote-text-11">
                        <div class="img animated bounce"></div>
                    </div>
                    <div class="pp-quote li-quote-13" data-textquote="quote-text-13">
                        <div class="img animated bounce"></div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!--==================================================-->
    <!----- End Techno Testimonial Area ----->
    <!--==================================================-->
    <!--==================================================-->
    <!----- Start Techno Brand Area ----->
    <!--==================================================-->

    <div class="brand_area pt-35 pb-80 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="partner_main_title">
                        <h3>Our Placement <span>Partners</span></h3>
                    </div>
                    <div class="row">
                        <!--testimonial owl curousel -->
                        <div class="brand_list owl-carousel curosel-style">
                            <!-- Single Brand -->
                            @if($data['placement-partner'] )
                            @foreach($data['placement-partner']  as $row)
                            <div class="col-lg-12">
                                <div class="single_brand">
                                    <div class="single_brand_thumb">
                                        <img src="{{ asset($row->image) }}" alt="" />
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                       

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==================================================-->
    <!----- End Techno Brand Area ----->
    <!--==================================================-->
    <!--==================================================-->
    <!----- Start Techno Footer Middle Area ----->
    <!--==================================================-->
    @include('site.includes.footer')

    <!--==================================================-->
    <!----- End Techno Footer Middle Area ----->
    <!--==================================================-->

    <!-- jquery js -->
    <script type="text/javascript" src="{{ asset('assets/site/js/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- bootstrap js -->
    <script type="text/javascript" src="{{ asset('assets/site/js/bootstrap.min.js')}}"></script>
    <!-- carousel js -->
    <script type="text/javascript" src="{{ asset('assets/site/js/owl.carousel.min.js')}}"></script>
    <!-- counterup js -->
    <script type="text/javascript" src="{{ asset('assets/site/js/jquery.counterup.min.js')}}"></script>
    <!-- waypoints js -->
    <script type="text/javascript" src="{{ asset('assets/site/js/waypoints.min.js')}}"></script>
    <!-- wow js -->
    <script type="text/javascript" src="{{ asset('assets/site/js/wow.js')}}"></script>
    <!-- imagesloaded js -->
    <script type="text/javascript" src="{{ asset('assets/site/js/imagesloaded.pkgd.min.js')}}"></script>
    <!-- venobox js -->
    <script type="text/javascript" src="{{ asset('assets/site/venobox/venobox.js')}}"></script>
    <!-- ajax mail js -->
    <script type="text/javascript" src="assets/ajax-mail.html"></script>
    <!--  testimonial js -->
    <script type="text/javascript" src="{{ asset('assets/site/js/testimonial.js')}}"></script>
    <!--  animated-text js -->
    <script type="text/javascript" src="{{ asset('assets/site/js/animated-text.js')}}"></script>
    <!-- venobox min js -->
    <script type="text/javascript" src="{{ asset('assets/site/venobox/venobox.min.js')}}"></script>
    <!-- isotope js -->
    <script type="text/javascript" src="{{ asset('assets/site/js/isotope.pkgd.min.js')}}"></script>
    <!-- jquery nivo slider pack js -->
    <script type="text/javascript" src="{{ asset('assets/site/js/jquery.nivo.slider.pack.js')}}"></script>
    <!-- jquery meanmenu js -->
    <script type="text/javascript" src="{{ asset('assets/site/js/jquery.meanmenu.js')}}"></script>
    <!-- jquery scrollup js -->
    <script type="text/javascript" src="{{ asset('assets/site/js/jquery.scrollUp.js')}}"></script>
    <!-- theme js -->
    <script type="text/javascript" src="{{ asset('assets/site/js/theme.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/site/js/custom-owl.js')}}"></script>
    <!-- jquery js -->
    <script type="text/javascript" src="{{ asset('assets/site/js/custom.js')}}"></script>
</body>

</html>
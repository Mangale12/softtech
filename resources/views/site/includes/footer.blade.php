<div class="footer_middle_area bg_color2 style_three pt-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="widget widgets-company-info wow fadeInUp" data-wow-delay="0.3s">
                    @if(isset($all_view['setting']->logo))
                    <div class="footer-bottom-logo pb-40">
                        <img src="{{ asset($all_view['setting']->logo) }}" alt="" />
                    </div>
                    @endif
                    <div class="company-info-desc">
                        <p>{!!$all_view['common']->footer_first_description !!}</p>
                    </div>
                    <div class="follow-company-info pt-3">
                        <div class="follow-company-text mr-3">
                            <a href="#">
                                <p>Follow Us</p>
                            </a>
                        </div>
                        <div class="follow-company-icon">
                            <a href="{{ $all_view['setting']->social_profile_fb }}"><i class="fa fa-facebook"></i></a>
                            <a href="{{$all_view['setting']->social_profile_twitter }}"><i class="fa fa-twitter"></i></a>
                            <a href="{{$all_view['setting']->social_profile_insta }}"><i class="fa fa-linkedin"></i></a>
                            <a href="{{$all_view['setting']->social_profile_youtube }}"><i class="fa fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="widget widget-nav-menu wow fadeInUp" data-wow-delay="0.3s">
                    @if(isset($all_view['common']->footer_second_title))
                    <h4 class="widget-title pb-4">{!!$all_view['common']->footer_second_title !!}</h4>
                    @endif
                    <div class="menu-quick-link-container ml-4">
                        <ul id="menu-quick-link" class="menu">
                            @if(isset($all_view['common']->footer_second_description))
                            <li><a href="#"> {!!$all_view['common']->footer_second_description !!}</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="widget widgets-company-info wow fadeInUp" data-wow-delay="0.3s">
                @if(isset($all_view['common']->footer_second_title))
                    <h3 class="widget-title pb-4">{!!$all_view['common']->footer_third_title !!}</h3>
                @endif
                    <div class="company-info-desc">
                        <p>{!!$all_view['common']->footer_third_description !!}
                        </p>
                    </div>
                    <div class="footer-social-info">
                        <p><i class="fa fa-map-marker fa-2x" aria-hidden="true"></i>&nbsp; {{ $all_view['setting']->site_first_address }}</p>
                    </div>
                    <div class="footer-social-info">
                        <p><i class="fa fa-phone fa-2x" aria-hidden="true"></i> &nbsp;{{ $all_view['setting']->site_phone }}</p>
                    </div>
                    <div class="footer-social-info">
                        <p><i class="fa fa-envelope fa-2x" aria-hidden="true"></i>&nbsp; {{ $all_view['setting']->site_email }}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row  pt-3 pb-1 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-lg-6 col-md-6">
                    <div class="footer-bottom-content">
                        <div class="footer-bottom-content-copy">
                            <p>{{ date('Y') }}  {{ $all_view['setting']->site_name }}.All Rights Reserved. </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="footer-bottom-right">
                        <div class="footer-bottom-right-text">
                            <a class="absod" href="#">Privacy Policy </a>
                            <a href="#"> Terms & Conditions</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
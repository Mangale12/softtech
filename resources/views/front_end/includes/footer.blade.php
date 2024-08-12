{{-- @if ($footerType == 'member') --}}
    {{--  --}}
{{-- @else --}}
<footer class="footer  mt-lg-5 mt-3">
    <div class="container">
        <div class="row g-lg-5 g-3 ">
            <div class="col-lg-4 col-md-4 col-12 pr-md-5 mb-4 mb-md-0">
                @if(isset($all_view['common']->footer_first_title))
                <h3>{{ $all_view['common']->footer_first_title }}</h3>
                @endif
                <p class="mb-4">

                @if(isset($all_view['common']->footer_first_description))
                {!! $all_view['common']->footer_first_description !!}
                @endif
                </p>
                <ul class="list-unstyled quick-info mb-4">
                    <li><a href="#" class="d-flex align-items-center"><span class="me-3 "><i
                                    class="fa-solid fa-phone"></i></span>{{ !empty($all_view['setting']->site_phone) ? $all_view['setting']->site_phone : '' }}</a></li>
                    <li><a href="#" class="d-flex align-items-center"><span class="me-3"><i class="fa-solid fa-envelope"></i></span>{{ !empty($all_view['setting']->site_email) ? $all_view['setting']->site_email : '' }}</a></li>
                </ul>
                <form action="{{ route('site.subscribe') }}" class="subscribe">
                    <input type="email" class="form-control" name="email" placeholder="Enter your e-mail">
                    <input type="submit" class="btn btn-submit" value="Send">
                </form>
            </div>
            <div class="col-lg-5 col-md-4 col-12 mb-4 mb-md-0">
                @if(isset($all_view['common']->footer_second_title))
                <h3>{{ $all_view['common']->footer_second_title }}</h3>
                @endif
                <p class="mb-4">

                @if(isset($all_view['common']->footer_second_description))
                {!! $all_view['common']->footer_second_description !!}
                @endif
                </p>

            </div>
            <div class="col-lg-3 col-md-4 col-12 mb-4 mb-md-0">
                <h3>Photo Gallery</h3>
                <div class="row g-3 ">
                    @if(isset($all_view['gallery']))
                    @foreach($all_view['gallery'] as $key=>$gallery)
                    @if(isset($gallery->image) )
                    <div class="col-6">
                        <a data-fancybox="gallery"
                            data-src="{{ asset($gallery->image) }}"
                            data-caption="Optional caption,&lt;br /&gt;that can contain &lt;em&gt;HTML&lt;/em&gt; code">
                            <img src="{{ asset($gallery->image) }}"
                                width="100%" height="130" alt="{{ $gallery->image }}" />
                        </a>
                    </div>
                    @endif
                    @endforeach
                    @endif

                </div>
            </div>
            <div class="col-12">
                <div class="py-5 footer-menu-wrap d-flex flex-wrap justify-content-between align-items-center">
                    <ul class="list-unstyled flex-wrap d-flex">
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

</footer>
{{-- @endif --}}




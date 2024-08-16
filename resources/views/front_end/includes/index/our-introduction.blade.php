@if(isset($data['feature_page'][0]))
<section class="about-taan my-lg-5">
    <div class="container">
        <div class="section__title text-center text-lg-start">
            {{-- @dd($data['feature_page'][0]) --}}

            @if(isset($data['feature_page'][0]))
            <h3>{{ $data['feature_page'][0]->title }}</h3>
            @endif
        </div>
        <div class="row g-4 align-items-center">

            <div class="col-lg-6 pe-lg-4">
                {!! isset($data['feature_page'][0]) ? mb_strimwidth($data['feature_page'][0]->description, 0, 1100, "...") : '' !!}
                <br>
                <a class="read-more" href="{{ isset($data['feature_page'][0]->post_unique_id) ? url('page/' . $data['feature_page'][0]->post_unique_id) : '#' }}">Read More</a>
            </div>
            <div class="col-lg-6">
                <div class="about-team--img">
                    @if(isset($data['feature_page'][0]) && $data['feature_page'][0]->thumbs)
                    {{-- @dd($data['feature_page'][0]->url ) --}}
                    <a class="video__wrapper" href="{{ $data['feature_page'][0]->url }}" data-fancybox="gallery">
                        <img src="{{ asset($data['feature_page'][0]->thumbs) }}" />
                        <div class="video__play-icon">
                            <span>
                                <i class="fa-regular fa-circle-play"></i>
                            </span>

                        </div>

                    </a>
                    @else
                    <p>Image Not Found's !</p>
                    @endif
                </div>

            </div>
        </div>

    </div>

</section>
@endif

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
                    @if(isset($data['feature_page'][3]))
                    <div class="support-message">
                        <h4>{{ $data['feature_page'][3]->title }}</h4>
                        <p>{!! $data['feature_page'][3]->description !!}<p>
                            @if (Route::has('site.post.show'))
                            <a class="btn" href="{{ route('site.post.show', ['id'=> $data['feature_page'][3]->post_unique_id]) }}"> <button>Contact Us</button></a>
                            @endif

                    </div>
                    @endif
                    <div class="support-image d-flex justify-content-center p-2">
                        @if(isset($data['feature_page'][3]) && $data['feature_page'][3]->thumbs && file_exists(public_path($data['feature_page'][3]->thumbs)))
                        <img src="{{ asset($data['feature_page'][3]->thumbs) }}" alt="Support Contact Image">
                        @endif
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>

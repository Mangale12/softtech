@if(isset($data['upcoming-trail']) && $data['upcoming-trail']->count() > 0)
<section class="section-trail mb-3">
    <div class="container">
        <div class="section__title text-center ">
            <h3>
                Upcoming Trails
                </h1>

        </div>

        <div class="section-trail__details">
            <div class="row g-4 ">
                @if(isset($data['upcoming-trail']) && $data['upcoming-trail']->count() > 0)
                @foreach($data['upcoming-trail'] as $row)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <a href="{{ route('site.post.show', ['id'=> $row->post_unique_id]) }}">
                        <div class="section-trail__details__list">
                            <div class="section-trail__details__list__box">
                                <div class="logo-img">
                                    @if(isset($row->thumbs) && !empty($row->thumbs))
                                    <img src="{{ asset($row->thumbs) }}" alt="" class="img">
                                    @else
                                    <p>Image Not Found's !</p>
                                    @endif
                                    <div class="bagde-flag-wrap">
                                        <a href="#" class="bagde-flag"> Upcoming </a>
                                    </div>
                                </div>
                                <div class="text">
                                    <small><i class="fa-solid fa-location-dot"></i> {{ $row->destination }}</small>
                                    </small>
                                    <a href="{{ route('site.post.show', ['id'=> $row->post_unique_id]) }}">
                                        <h5>{{ $row->title }}</h5>
                                    </a>
                                    <small><i class="fa-regular fa-calendar-days"></i> Duration - <b>{{$row->durations }}</b>
                                    </small>
                                    <small><i class="fa-solid fa-plane-up"></i> Transport - <b> @if(isset($row->TransportCategory)) {{ $row->TransportCategory->title }} @endif</b>
                                        Air </b>
                                    </small>



                                </div>

                            </div>

                        </div> <!-- list section-trail -->
                    </a>
                </div>
                @endforeach
                @else
                <div class="col-lg-12">
                    <div class="alert alert-warning" role="alert">
                        No Upcoming Trails Found!
                    </div>
                    @endif

                </div>
            </div>
</section>
@endif

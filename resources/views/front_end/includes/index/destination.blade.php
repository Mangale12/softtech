<section class="destination py-lg-5 py-3 mb-3">
    <div class="container">
        <div class="section__title text-center">
            <h3 class="text-white">
                Top Visited Destination
                </h1>
        </div>
        <div class="destination__details">
            <div class="owl-carousel owl-theme owl-destination ">

                @if(isset($data['destination']) && $data['destination']->count() > 0)
                @foreach($data['destination'] as $row)
                <a href="{{ route('site.destination', ['id' => $row->id]) }}">
                    <div class="destination__details__list">
                        <div class="destination__details__list__box">
                            <div class="logo-img">
                                <img class="owl-lazy" data-src="{{ asset($row->image)}}" data-src-retina="{{ asset($row->image)}}" alt="img">
                            </div>

                            <div class="text">
                                <div>
                                    <h5>{{ $row->title }} </h5>

                                </div>

                            </div>
                        </div>

                    </div>
                </a>
                @endforeach
                @else
                <p>
                    No data found!
                </p>
                @endif

            </div>
        </div>
    </div>
</section>
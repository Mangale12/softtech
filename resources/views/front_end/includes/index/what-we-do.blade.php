<section class="feature mb-lg-5 mb-3">
    <div class="container">
        <div class="section__title   w-100">
            <h3>
                What We Do?
                </h1>
                <p>TAAN members specialise in offering you an unrivalled collection of financially protected, quality
                    adventure <br> holidays to every corner of the Nepal.</p>
        </div>
        <div class="row g-4">
            @if(isset($data['services']) && $data['services']->count() > 0)
            @foreach($data['services'] as $row)
            <div class="col-lg-3">
                <div class="feature__content text-center  px-lg-3 py-lg-4 p-3">
                    <i class="{{$row->icon}}"></i>

                    <h5 class="my-3">{{$row->title}}</h5>
                    <p>{{$row->description}}</p>
                </div>
            </div>
            @endforeach
            @else
            <p>Service Not Found's !</p>
            @endif
          
        </div>
    </div>
</section>
@extends('user.user_dashboard')
@section('content')
    <section class="faq mt-lg-5 mt-3 ">
        <div class="container">
            <div class="row g-5 justify-content-center">

                <div class="col-lg-8">
                    <div class=" mb-lg-5 text-center">
                        <h2 class="mb-4">FAQs</h2>
                        <p>An FAQ page is an important part of any business website. Learn the best strategies for creating
                            FAQ
                            pages
                            that convert site visitors into paying customers.Some of the best treks of our country, are
                            accessible for hardly 3-4 months a year, in August and September. These are our treks in
                            Himachal Pradesh and J&K. Time your trek in Aug for maximum flowers, Sept for terrific colours!
                        </p>
                    </div>
                    <div class="accordion" id="accordionExample">
                        <div class="faq__item">

                            <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <h5>Why Nepal is Travel Destination?</h5>
                            </a>

                            <div id="collapseOne" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>
                                        This is the first item's accordion body. It is shown by default, until the collapse
                                        plugin adds the
                                        appropriate classes that we use to style each element. These classes control the
                                        overall appearance,
                                        as well as the showing and hiding via CSS transitions. You can modify any of this
                                        with custom CSS or
                                        overriding our default variables. It's also worth noting that just about any HTML
                                        can go within the
                                        <code>.accordion-body</code>, though the transition does limit overflow.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="faq__item">

                            <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">

                                <h5>
                                    Why Travel To Nepal?
                                </h5>
                            </a>

                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>
                                        Nepal is a landlocked country with a population of about 30 million. It is
                                        sandwiched between the
                                        two most populous countries on earth - China and India. The central part of the
                                        Himalayas lies in
                                        Nepal, which includes eight of the ten tallest mountains.

                                    </p>
                                    <p>
                                        The Himalayas are the youngest fold mountains, and as a result, Nepal encompasses
                                        several folds in
                                        the form of tall mountains. Hence, it is not surprising that the country with the
                                        highest peak (Mt.
                                        Everest) is also home to the deepest gorge in the world, Kaligandaki Gorge.

                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="faq__item">

                            <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <h5>Why Nepal is Travel Destination?</h5>
                            </a>

                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the third item's accordion body.</strong> It is hidden by default, until
                                    the collapse
                                    plugin adds the appropriate classes that we use to style each element. These classes
                                    control the
                                    overall appearance, as well as the showing and hiding via CSS transitions. You can
                                    modify any of this
                                    with custom CSS or overriding our default variables. It's also worth noting that just
                                    about any HTML
                                    can go within the <code>.accordion-body</code>, though the transition does limit
                                    overflow.
                                </div>
                            </div>
                        </div>
                        <div class="faq__item">

                            <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">

                                <h5>
                                    Why Travel To Nepal?
                                </h5>
                            </a>

                            <div id="collapsefour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>
                                        Nepal is a landlocked country with a population of about 30 million. It is
                                        sandwiched between the
                                        two most populous countries on earth - China and India. The central part of the
                                        Himalayas lies in
                                        Nepal, which includes eight of the ten tallest mountains.

                                    </p>
                                    <p>
                                        The Himalayas are the youngest fold mountains, and as a result, Nepal encompasses
                                        several folds in
                                        the form of tall mountains. Hence, it is not surprising that the country with the
                                        highest peak (Mt.
                                        Everest) is also home to the deepest gorge in the world, Kaligandaki Gorge.

                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="faq__item">

                            <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                                <h5>Why Nepal is Travel Destination?</h5>
                            </a>

                            <div id="collapsefive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the third item's accordion body.</strong> It is hidden by default, until
                                    the collapse
                                    plugin adds the appropriate classes that we use to style each element. These classes
                                    control the
                                    overall appearance, as well as the showing and hiding via CSS transitions. You can
                                    modify any of this
                                    with custom CSS or overriding our default variables. It's also worth noting that just
                                    about any HTML
                                    can go within the <code>.accordion-body</code>, though the transition does limit
                                    overflow.
                                </div>
                            </div>
                        </div>
                        {{-- <div class="faq__item">
                            <a class="faq-read-more" href="#">View More <i
                                    class="fa-solid fa-arrow-right-long"></i></a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

{{-- @if ($footerType == 'member') --}}
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
                            {{-- <li><a href="#">Login</a></li>
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



<a href="#" class="scrollToTop scroll-btn show"><i class="fa-solid fa-arrow-up"></i></a>

<!-- footer end-->
<script src="{{ asset('user/js/jquery-3.6.0.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="{{ asset('user/js/owl.carousel.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
<script>
    function prettyLog(message) {
        console.log(message);
    }

    var typed = new Typed("#typed", {
        stringsElement: '#typed-strings',
        typeSpeed: 50,
        backSpeed: 25,
        backDelay: 500,
        startDelay: 1000,
        loop: true,
        onBegin: function(self) {
            prettyLog('onBegin ' + self)
        },
        onComplete: function(self) {
            prettyLog('onComplete ' + self)
        },
        preStringTyped: function(pos, self) {
            prettyLog('preStringTyped ' + pos + ' ' + self);
        },
        onStringTyped: function(pos, self) {
            prettyLog('onStringTyped ' + pos + ' ' + self)
        },
        onLastStringBackspaced: function(self) {
            prettyLog('onLastStringBackspaced ' + self)
        },
        onTypingPaused: function(pos, self) {
            prettyLog('onTypingPaused ' + pos + ' ' + self)
        },
        onTypingResumed: function(pos, self) {
            prettyLog('onTypingResumed ' + pos + ' ' + self)
        },
        onReset: function(self) {
            prettyLog('onReset ' + self)
        },
        onStop: function(pos, self) {
            prettyLog('onStop ' + pos + ' ' + self)
        },
        onStart: function(pos, self) {
            prettyLog('onStart ' + pos + ' ' + self)
        },
        onDestroy: function(self) {
            prettyLog('onDestroy ' + self)
        }
    });
</script>
<script></script>
<script>
    Fancybox.bind("[data-fancybox]", {

    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var scrollToTopButton = document.querySelector('.scrollToTop');

        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 100) {
                scrollToTopButton.classList.add('show');
            } else {
                scrollToTopButton.classList.remove('show');
            }
        });

        scrollToTopButton.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const slides = document.querySelectorAll(".slider__image");
        let currentIndex = 0;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.remove("active");
                if (i === index) {
                    slide.classList.add("active");
                }
            });
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % slides.length;
            showSlide(currentIndex);
        }

        // Initial display
        showSlide(currentIndex);

        // Change slide every 4 seconds
        setInterval(nextSlide, 4000);
    });
</script>
<script>
    $('.owl-achivement').owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        responsiveClass: true,
        nav: false,
        lazyLoad: true,
        items: 6,
        margin: 20,
        dots: true,
        navText: ['<span class="fas fa-chevron-left fa-1x"></span>',
            '<span class="fas fa-chevron-right fa-1x"></span>'
        ],
        responsive: {
            0: {
                items: 1,
                nav: false,
            },
            450: {
                items: 1,
                nav: false,

            },
            575: {
                items: 2,
                nav: false,


            },
            767: {
                items: 3
            },
            991: {
                items: 4
            },
            1199: {
                items: 5
            },
            1399: {
                items: 6,
                dots: true,
                nav: false,
            },
            1439: {
                items: 6,
                dots: true,
                nav: false,
            }
        }
    });
    // $('.owl-members').owlCarousel({
    //   loop: true,
    //   autoplay: true,
    //   autoplayTimeout: 3000,
    //   autoplayHoverPause: true,
    //   responsiveClass: true,
    //   nav: true,
    //   items: 4,
    //   margin: 20,
    //   dots: false,
    //   navText: ['<span class="fas fa-chevron-left fa-1x"></span>',
    //     '<span class="fas fa-chevron-right fa-1x"></span>'
    //   ],
    //   responsive: {
    //     0: {
    //       items: 1,
    //       nav: false,
    //       dots: true,

    //     },
    //     450: {
    //       items: 1,
    //       nav: false,
    //       dots: true,

    //     },
    //     575: {
    //       items: 1,
    //       nav: false,
    //       dots: true,

    //     },
    //     767: {
    //       items: 2
    //     },
    //     991: {
    //       items: 3
    //     },
    //     1199: {
    //       items: 4
    //     },
    //     1399: {
    //       items: 4,

    //     },
    //     1439: {
    //       items: 4,

    //     }
    //   }
    // });
    $('.owl-destination').owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        responsiveClass: true,
        nav: true,
        lazyLoad: true,
        items: 3,
        margin: 20,
        dots: false,
        navText: ['<span class="fas fa-chevron-left fa-1x"></span>',
            '<span class="fas fa-chevron-right fa-1x"></span>'
        ],
        responsive: {
            0: {
                items: 1,
                nav: false,
                dots: true,
            },
            450: {
                items: 1,
                nav: false,
                dots: true,

            },
            575: {
                items: 1,
                nav: false,
                dots: true,

            },
            767: {
                items: 2,
            },
            991: {
                items: 4,
            },
            1199: {
                items: 4,
            },
            1399: {
                items: 4,

            },
            1439: {
                items: 4,

            }
        }
    });


    // $('.owl-partners').owlCarousel({
    //   items: 4,
    //   loop: true,
    //   margin: 10,
    //   autoplay: true,
    //   autoplayTimeout: 1000,
    //   autoplayHoverPause: true,

    //   responsiveClass: true,
    //   nav: false,
    //   items: 5,
    //   margin: 20,
    //   dots: false,
    //   navText: ['<span class="fas fa-chevron-left fa-1x"></span>',
    //     '<span class="fas fa-chevron-right fa-1x"></span>'
    //   ],
    //   responsive: {
    //     0: {
    //       items: 1,
    //       nav: false,
    //       dots: true,
    //     },
    //     450: {
    //       items: 1,
    //       nav: false,
    //       dots: true,

    //     },
    //     575: {
    //       items: 1,
    //       nav: false,
    //       dots: true,

    //     },
    //     767: {
    //       items: 2,
    //       nav: false,
    //       dots: false,
    //     },
    //     991: {
    //       items: 3,
    //       nav: false,
    //       dots: false,
    //     },
    //     1199: {
    //       items: 4,
    //       nav: false,
    //       dots: false,
    //     },
    //     1399: {
    //       items: 5,
    //       nav: false,
    //       dots: false,

    //     },
    //     1439: {
    //       items: 5,
    //       nav: false,
    //       dots: false,

    //     }
    //   }
    // });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const dropdownMenu = document.getElementById('dropdownMenu');

        const members = [{
                title: 'Member One',
                img: 'https://via.placeholder.com/40'
            },
            {
                title: 'Member Two',
                img: 'https://via.placeholder.com/40'
            },
            {
                title: 'Member Three',
                img: 'https://via.placeholder.com/40'
            },
            // Add more members as needed
        ];

        searchInput.addEventListener('input', function() {
            const query = searchInput.value.toLowerCase();
            dropdownMenu.innerHTML = '';

            if (query) {
                const filteredMembers = members.filter(member => member.title.toLowerCase().includes(
                    query));

                filteredMembers.forEach(member => {
                    const li = document.createElement('li');
                    const img = document.createElement('img');
                    img.src = member.img;
                    const span = document.createElement('span');
                    span.textContent = member.title;

                    li.appendChild(img);
                    li.appendChild(span);
                    dropdownMenu.appendChild(li);

                    li.addEventListener('click', function() {
                        searchInput.value = member.title;
                        dropdownMenu.style.display = 'none';
                    });
                });

                dropdownMenu.style.display = 'block';
            } else {
                dropdownMenu.style.display = 'none';
            }
        });

        document.addEventListener('click', function(event) {
            if (!event.target.closest('.search-trail')) {
                dropdownMenu.style.display = 'none';
            }
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
      const filterSpans = document.querySelectorAll('.filter-member span');
      const memberList = document.querySelector('.member-list');
      const memberCards = document.querySelectorAll('.member-list .col-4');

      filterSpans.forEach(span => {
        span.addEventListener('click', () => {
          const filterValue = span.getAttribute('data-value')[0].toUpperCase(); // Get the first letter of the filter value and convert to uppercase
          let hasVisibleMembers = false;

          memberCards.forEach(card => {
            const memberName = card.getAttribute('data-member-name').toUpperCase(); // Convert member name to uppercase
            if (memberName.startsWith(filterValue)) {
              card.style.display = 'block';
              hasVisibleMembers = true;
            } else {
              card.style.display = 'none';
            }
          });

          if (hasVisibleMembers) {
            memberList.style.display = 'block';
          } else {
            memberList.style.display = 'none';
          }
        });
      });
    });
  </script>

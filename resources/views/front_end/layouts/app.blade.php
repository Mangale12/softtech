<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="TAAN members specialise in offering you an unrivalled collection of financially protected, quality adventure holidays to every corner of the Nepal.">
    <link rel="shortcut icon" href="{{asset('assets/site/images/logo-head.png')}}" type="image/x-icon">
    <title>Taan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <link rel="stylesheet" href="{{asset('assets/site/css/owl.carousel.min.css')}} ">
    <link rel="stylesheet" href="{{asset('assets/site/scss/style.css')}}">
</head>

<body>
    <!-- header start -->
    @include('front_end.includes.header')
    <!-- header end -->
    <!-- navbar start -->
    @include('front_end.includes.navbar')
    <!-- navbar end  -->
    @yield('content')
    @include('front_end.includes.footer')
    <a href="#" class="scrollToTop scroll-btn show"><i class="fa-solid fa-arrow-up"></i></a>
    <!-- footer end-->
    <script src="{{ asset('assets/site/js/jquery-3.6.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
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
</body>

</html>
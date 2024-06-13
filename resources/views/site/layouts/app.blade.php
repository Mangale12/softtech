<!doctype html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- tags -->
    <meta name="keywords" content="@yield('tags')">
    <!-- seo -->
    <meta name="description" content="@yield('seo')">
    <!-- social -->


    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;400;600;700;900&amp;display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{asset('assets/site/images/softech logo/softech-foundation-logo.png')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/site/css/card.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/style_top.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/theme_style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/themeup_style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/theme_responsive_style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/site/plugin/swiper/swiper-bundle.min.css')}}">

    <style type="text/css">
        div#toc_container ul li {
            font-size: 100%
        }

        html,

        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;

            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 30rem;
            max-height: 30rem;
        }
    </style>
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=62b30129282de100195677eb&product=inline-share-buttons' async='async'></script>

    @yield('css')
</head>

<body data-rsssl=1 class="home blog wp-custom-logo hfeed">
    <div id="page" class="site">
        @include('site.includes.header')
        @yield('content')

        @include('site.includes.footer')
    </div>   
    <script src="{{ asset('assets/site/plugin/swiper/swiper-bundle.min.js')}}"></script>

    <script src="{{ asset('assets/site/js/carousal.js')}}"></script>
    <script src="{{ asset('assets/site/js/carousal.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    @yield('js')
</body>

</html>
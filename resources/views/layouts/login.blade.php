<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title> @yield('title') | SCMS</title>
    <!-- GLOBAL MAINLY STYLES-->
    <!--external css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="{{ asset('assets/cms/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/cms/css/bootstrap-reset.css')}}" rel="stylesheet">
    <!-- THEME STYLES-->
    <link href="{{ asset('assets/cms/css/main.css')}}" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="{{ asset('assets/cms/css/pages/auth-light.css')}}" rel="stylesheet" />
    <!-- dm_custolm css -->
    <link href="{{ asset('assets/cms/css/dm.css')}}" rel="stylesheet" />
    <style>
        body {
            background: none repeat scroll 0 0 #073D5F;
            color: #000000;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 100%;
            padding: 0;
        }
    </style>
    <link href="{{ asset('assets/cms/assets/toastr-master/toastr.css') }}" rel="stylesheet" type="text/css" />
    @yield('css')
</head>
<body class="bg-silver-300">
    @yield('content')
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <!-- <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div> -->
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script> <!-- PAGE LEVEL PLUGINS -->
    <!-- CORE SCRIPTS-->
    <!--toastr-->
    <script src="{{ asset('assets/cms/dm_js/app.js') }}"></script>
    <script src="{{ asset('assets/cms/assets/toastr-master/toastr.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @yield('js')
    @include('admin.section.flash-message')
</body>
</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="{{ asset('assets/cms/img/logo.png')}}">
    <title>@yield('title',env('APP_NAME'))</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/cms/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/cms/css/bootstrap-reset.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('assets/cms/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <!--right slidebar-->
    <link href="{{ asset('assets/cms/css/slidebars.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/cms/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/cms/css/style-responsive.css')}}" rel="stylesheet" />
    <!--toastr-->
    <link href="{{ asset('assets/cms/assets/toastr-master/toastr.css') }}" rel="stylesheet" type="text/css" />
    @yield('css')
    <style>
        .help-block {
            color: red;
        }
        <style>
    .dataTables_length{
        width: 20%;
        margin-bottom: -4rem;
    }
    /* Example CSS for DataTables pagination */
    .dataTables_wrapper .dataTables_paginate {
        margin-top: 10px;
        margin-bottom: 10px;
        text-align: center;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding: 5px 10px;
        margin: 0 2px;
        cursor: pointer;
        border: 1px solid #ccc;
        background-color: #f5f5f5;
        color: #333;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background-color: #ccc;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
        cursor: default;
        color: #777;
        background-color: #fff;
        border-color: #ccc;
    }

</style>
    </style>
</head>

<body>
    <section id="container" class="">
        <!--header start-->
        @include('admin.section.header')
        <!--header end-->
        <!--sidebar start-->
        @include('admin.section.sidebar')
        <!--sidebar end-->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper site-min-height">
                <!-- page start-->
                @yield('content')
                <!-- page end-->
            </section>
        </section>
        <!--main content end-->
        <!--footer start-->
        @include('admin.section.footer')
        <!--footer end-->
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('assets/cms/js/jquery.js')}}"></script>
    <script src="{{ asset('assets/cms/js/bootstrap.bundle.min.js')}}"></script>
    <script class="include" type="text/javascript" src="{{ asset('assets/cms/js/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{ asset('assets/cms/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{ asset('assets/cms/js/slidebars.min.js')}}"></script>
    <script src="{{ asset('assets/cms/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/cms/js/respond.min.js')}}"></script>
    <!--common script for all pages-->
    <script src="{{ asset('assets/cms/js/common-scripts.js')}}"></script>

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
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}

    @yield('js')
    @include('admin.section.flash-message')
</body>
</html>

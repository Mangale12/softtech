<!DOCTYPE html>
<html lang="en">

@include('front_end.body.head')

<body>
  <!-- header start -->
  @include('front_end.body.header')
  <!-- header end -->
  <!-- navbar start -->
  @include('front_end.body.navbar')
  <!-- navbar end  -->
    @yield('content')
  @include('front_end.body.footer')
@yield('scripts')
</body>

</html>

@extends('front_end.layouts.app')
@section('styles')
<link href="{{ asset('assets/cms/plugin/toastr-master/toastr.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@include('front_end.includes.index.slider')
<!-- course-list-section-end -->
@include('front_end.includes.index.our-introduction')

@include('front_end.includes.index.what-we-do')
@include('front_end.includes.index.achivement')
<!-- message from president start -->
@include('front_end.includes.index.message-from-president')
<!-- message from president end-->
@include('front_end.includes.index.latest-trails')
<!-- up section-trail trail -->
<!-- list Top Destination for vacations start -->
@include('front_end.includes.index.destination')
<!-- taan support start -->
@include('front_end.includes.index.support-counsellors')


<!-- taan support end-->
@include('front_end.includes.index.upcoming-trails')
<!-- accrediation end -->
@include('front_end.includes.index.faq')
@include('front_end.includes.index.video')
@endsection
@section('scripts')
<script src="{{ asset('assets/cms/plugin/toastr-master/toastr.js') }}"></script>
<script>
    @if(Session::get('alert-success'))
     toastr.success("Thank you for subscribe ! ");
     @endif
</script>
@endsection

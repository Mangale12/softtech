@extends('layouts.admin')
@section('title', 'कृषक बिबरण')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<link href="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/css/nepali.datepicker.v3.7.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">
            <h3>खेत बारी रिपोर्ट</h3>
        </div>
    </div>
</div>
<div style="justify-content: center">
    <form class="form-inline" action="{{ route($_base_route.'.search')}}" method="GET">
        @csrf
        <input class="form-control mr-sm-2" type="search" name="full_name" placeholder="नाम" aria-label="Search">
        <input class="form-control mr-sm-2" type="search" id="email" name="email" placeholder="इमेल" aria-label="Search">
        <button class="btn btn-sm btn-info my-2 my-sm-0" type="submit">रिपोट खोज्नुस्</button>&nbsp;
        <!-- <a class="btn btn-primary btn-sm pull-right"  href="{{ route($_base_route.'.index')}}">सफा गर्नुहोस्</a> -->
    </form><br>
</div>
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <section class="card">
            <header class="card-header">
                खेत बिबरण
                <span class="tools pull-right d-flex">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="card-body">
                <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="dynamic-table">
                        <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>आर्थिक वर्ष</th>
                                <th>किसान </th>
                                <th>बाली प्रकार</th>
                                <th>महिना देखि</th>
                                <th>सम्म</th>
                                <th>मिति देखि</th>
                                <th>सम्म</th>
                                <th class="hidden-phone">स्थिति</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($data['rows']) != 0)
                            @foreach( $data['rows'] as $key=> $row)
                            <tr class="gradeX">
                                <td>{{ getUnicodeNumber($key+1) }}.</td>
                                <td>@if(isset($row->fiscalYear)) {{ $row->fiscalYear->fiscal_np }} @endif</td>
                                <td>@if(isset($row->generalProfile)) {{ $row->generalProfile->full_name }} @endif</td>
                                <td>@if(isset($row->agricultureCat)) {{ $row->agricultureCat->title }} @endif</td>
                                <td>@if(isset($row->startMonth)) {{ $row->startMonth->month_np }} @endif</td>
                                <td>@if(isset($row->endMonth)) {{ $row->endMonth->month_np }} @endif</td>
                                <td>{{ getUnicodeNumber($row->start_date)}}</td>
                                <td>{{ getUnicodeNumber($row->end_date) }}</td>
                                <td>
                                    @if(Route::has($_base_route.'.show'))
                                    <a href="{{ URL::route($_base_route.'.show_farm', ['id' => $row->id]) }}">
                                        <button type="button" data-original-title="Reports" onclick="report(this)" data-toggle="tooltip" class="btn btn-info btn-sm" style="cursor:pointer;">&nbsp;रिपोर्ट</button></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <p>माफ गर्नुहोला ! डाटा फेलापरेन !</p>
                            @endif
                    </table>
                </div>
                <div class="row">
                    @include('admin.section.load-time')
                    {{ $data['rows']->links('vendor.pagination.custom') }}
                </div>
            </div>
        </section>
    </div>

</div>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/js/nepali.datepicker.v3.7.min.js')}}" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        /***************************NepaliDate picker *********************/
        $("#dob").nepaliDatePicker({
            ndpYear: true,
            ndpMonth: true,
            ndpYearCount: 1000,
            // unicodeDate: true,
        })
    });
</script>
@endsection
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
            <h3>कृषक बिबरण</h3>
        </div>
    </div>
</div>
<div style="justify-content: center">
    <form class="form-inline" action="{{ route($_base_route.'.search')}}" method="GET">
        @csrf
        <input class="form-control mr-sm-2" type="search" name="full_name" placeholder="नाम" aria-label="Search">
        <input class="form-control mr-sm-2" type="search" name="mobile" placeholder="मोबाइल" aria-label="Search">
        <input class="form-control mr-sm-2" type="search" id="dob" readonly name="dob" placeholder="जन्म मिति" aria-label="Search">
        <input class="form-control mr-sm-2" type="search" id="email" name="email" placeholder="इमेल" aria-label="Search">
        <button class="btn btn-sm btn-info my-2 my-sm-0" type="submit">रिपोट खोज्नुस्</button>&nbsp;
        <!-- <a class="btn btn-primary btn-sm pull-right"  href="{{ route($_base_route.'.index')}}">सफा गर्नुहोस्</a> -->
    </form><br>

</div>
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <section class="card">
            
            <header class="card-header">
                कृषक बिबरण
                <span class="tools pull-right d-flex">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>

                </span>
                <a href="" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm pull-right">Export सूची</a>
            </header>
            <div class="card-body">
                <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="dynamic-table">
                        <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>नाम</th>
                                <th>ई-मेल</th>
                                <th>मोबाइल</th>
                                <th>पेशा</th>
                                <th>ब्लड ग्रुप</th>
                                <th>लिंग</th>
                                <th>जन्म मिति</th>
                                <th>फोटा</th>
                                <th class="hidden-phone">रिपोट</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($data['rows'])
                            @foreach( $data['rows'] as $key=> $row)
                            <tr class="gradeX">
                                <td>{{ getUnicodeNumber($key+1) }}.</td>
                                <td>{{$row->full_name}}</td>
                                <td> {{ $row->email}}</td>
                                <td> {{ $row->mobile}}</td>
                                <td> {{ $row->occupation}}</td>
                                <td> {{ $row->blood_group}}</td>
                                <td> {{ $row->gender}}</td>
                                <td>{{ $row->dob}}</td>
                                <td>
                                @if($row->image)
                                    <img src="{{ asset($row->image) }}" class="img img-responsive" height="50px" width="50px" >
                                    @else
                                    फोटा भेटिएन !
                                    @endif
                                </td>

                                <td>
                                    @include('admin.section.buttons.button-report')
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <p>माफ गर्नुहोला ! डाटा फेलापरेन !</p>
                            @endif
                    </table>
                </div>
                <div class="row">
                    @include('admin.section.load-time-report')
                    @if(isset($data['rows']))
                    {{ $data['rows']->links('vendor.pagination.custom') }}
                    @endif
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
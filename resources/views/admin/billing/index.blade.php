@extends('layouts.admin')
@section('title', 'बिलिंग बिबरण')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<link href="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/css/nepali.datepicker.v3.7.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">
            <a href="{{route( $_base_route.'.create' )}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm "><i class="fa fa-plus fa-sm text-white-50"></i> नयाँ बनाउनुहोस्</a>&nbsp;
        </div>
    </div>
</div>
<div style="justify-content: center">
    <form class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="नाम" aria-label="Search">
        <input class="form-control mr-sm-2" type="search" placeholder="मोबाइल" aria-label="Search">
        <input class="form-control mr-sm-2" type="search" readonly id="date" placeholder="मिति" aria-label="Search">
        <button class="btn btn-sm btn-info my-2 my-sm-0" type="submit">खोजनुस</button>
    </form><br>
</div>
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <section class="card">
            <header class="card-header">
                बिलिंग बिबरण
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
                                <th class="col-md-1">बिल नं.</th>
                                <th class="col-md-2">पुरा नाम</th>
                                <th class="col-md-1">मिति</th>
                                <th class="col-md-1">ठेगाना</th>
                                <th class="col-md-1">फोन</th>
                                <th class="col-md-2">टिप्पणी</th>
                                <th class="col-md-1">प्रमाणित व्यक्ति</th>
                                <th class="col-md-1">भुक्तानी स्थिति</th>
                                <th class="col-md-2">सम्पादन</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($data['rows']) != 0)
                            @foreach( $data['rows'] as $key=> $row)
                            <tr class="gradeX">
                                <td>{{ getUnicodeNumber($row->bill_no ) }} </td>
                                <td>{{$row->full_name}}</td>
                                <td>{{$row->date}}</td>
                                <td>{{ $row->address }}</td>
                                <td>{{ $row->phone }}</td>
                                <td>{{ $row->remarks }}</td>
                                <td>@if(isset($row->AddebBy)) {{ $row->AddebBy->role  }} @endif</td>
                                <td>
                                    @if($row->complete_status == 1)
                                    <span class="badge badge-success">Paid</span>
                                    @else
                                    <span class="badge badge-success">Unpaid</span>
                                    @endif
                                </td>
                                <td>
                                    @include('admin.section.buttons.button-edit')
                                    @include('admin.section.buttons.button-delete')
                                    <a href="{{route( $_base_route.'.view', $row->id )}}" class="btn btn-success btn-sm delete-confirm"><i class="fa fa-print"></i></a>
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
        $("#date").nepaliDatePicker({
            ndpYear: true,
            ndpMonth: true,
            ndpYearCount: 1000,
            // unicodeDate: true,
        });
    });
</script>
@endsection

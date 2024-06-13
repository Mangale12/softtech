@extends('layouts.user')
@section('css')
<link href="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/css/nepali.datepicker.v3.7.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">
            <h3>खेत बारी बिबरण</h3>
        </div>
    </div>
</div>
<div style="justify-content: center">
    <form class="form-inline" action="{{ route($_base_route.'.search')}}" method="GET">
        @csrf
        <select name="fiscal_year" id="fiscal_year" class="form-control select-two col-md-2">
            <option value="">आर्थिक वर्ष</option>
            @if($data['fiscal_year'])
            @foreach($data['fiscal_year'] as $row)
            <option value="{{ $row->id }}">{{ $row->fiscal_np }}</option>
            @endforeach
            @endif
        </select>&nbsp;&nbsp;
        <select name="land_id" id="land_id" class="form-control select-two col-md-2">
            <option value="">जग्गा</option>
        </select>&nbsp;&nbsp;
        <select name="baali" id="baali" class="form-control select-two col-md-2">
            <option value="">बालि</option>
            @if($data['baali'])
            @foreach($data['baali'] as $row)
            <option value="{{ $row->id }}">{{ $row->title }}</option>
            @endforeach
            @endif
        </select>&nbsp;&nbsp;
        <button class="btn btn-sm btn-info my-2 my-sm-0" type="submit">रिपोट खोज्नुस्</button>&nbsp;
        <!-- <a class="btn btn-primary btn-sm pull-right"  href="{{ route($_base_route.'.index')}}">सफा गर्नुहोस्</a> -->
    </form><br>
</div>
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <section class="card">

            <header class="card-header" style="font-weight: bold;">
                कृषक बिबरण
                <span class="tools pull-right d-flex">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm pull-right">Export सूची</a>
            </header>
            <div class="card-body">
                <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="dynamic-table">
                        <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>आर्थिक वर्ष</th>
                                <th>जग्गा </th>
                                <th>बालि</th>
                                <th>महिना देखि</th>
                                <th>सम्म</th>
                                <th>मिति देखि</th>
                                <th>सम्म</th>
                                <th>रिपोट</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($data['rows'])
                            @foreach( $data['rows'] as $row)
                            <tr class="gradeX">
                                <td>{{ getUnicodeNumber(($data['rows']->currentPage() - 1) * $data['rows']->perPage() + $loop->index + 1)  }}.</td>
                                <td>@if(isset($row->fiscalYear)) {{ $row->fiscalYear->fiscal_np }} @endif</td>
                                <td>@if(isset($row->getLand)) {{ $row->getLand->totalbigaha }} @endif</td>
                                <td>@if(isset($row->baaliName)) {{ $row->baaliName->title }} @endif</td>
                                <td>@if(isset($row->startMonth)) {{ $row->startMonth->month_np }} @endif</td>
                                <td>@if(isset($row->endMonth)) {{ $row->endMonth->month_np }} @endif</td>
                                <td>{{ getUnicodeNumber($row->start_date)}}</td>
                                <td>{{ getUnicodeNumber($row->end_date) }}</td>
                                <td>
                                    @if(Route::has($_base_route.'.show'))
                                    <a href="{{ URL::route($_base_route.'.show', ['id' => $row->id]) }}">
                                        <button type="button" data-original-title="Reports" onclick="report(this)" data-toggle="tooltip" class="btn btn-info btn-sm" style="cursor:pointer;">&nbsp;रिपोर्ट</button></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <p>डाटा छैन !</p>
                            @endif
                    </table>
                </div>
                <div class="row">

                </div>
            </div>
        </section>
    </div>

</div>
@endsection
@section('js')
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
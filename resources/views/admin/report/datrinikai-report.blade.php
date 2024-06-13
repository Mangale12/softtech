@extends('layouts.admin')
@section('title', 'दात्रिनिकाय बिबरण')
@section('css')
<link href="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/css/nepali.datepicker.v3.7.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">
            <h3>दात्रिनिकाय बिबरण</h3>
        </div>
    </div>
</div>
<div style="justify-content: center">
    <form class="form-inline" action="{{ route($_base_route.'.datrinikai_search')}}" method="GET">
        @csrf
        <input class="form-control mr-sm-2" type="search" placeholder="नाम" name="name" aria-label="नाम">
        <input class="form-control mr-sm-2" type="search" placeholder="मोबाइल" name="phone" aria-label="मोबाइल">
        <input class="form-control mr-sm-2" type="search" placeholder="ठेगाना" name="address" aria-label="ठेगाना">
        <button class="btn btn-sm btn-info my-2 my-sm-0" type="submit">खोजनुस</button>&nbsp;
        <a class="btn btn-primary btn-sm pull-right" href="{{ route($_base_route.'.datrinikai_index')}}">सफा गर्नुहोस्</a>
    </form><br>

</div>
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <section class="card">
            <header class="card-header">
                दात्रिनिकाय बिबरण
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
                                <th>ठेगाना</th>
                                <th>फोन</th>
                                <th>रकम (रु.)</th>
                                <th>सहयोग</th>
                                <th>सहयोग बस्तु	</th>
                                <th>संख्या</th>
                                <th class="hidden-phone">रिपोट</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($data['rows'])
                            @foreach( $data['rows'] as $key=> $row)
                            <tr class="gradeX">
                                <td>{{ getUnicodeNumber($key+1) }}.</td>
                                <td>{{$row->name}}</td>
                                <td> {{ $row->address}}</td>
                                <td> {{ $row->phone}}</td>
                                <td>{{ $row->amounts}}</td>
                                <td>{{ $row->help}}</td>
                                <td>{{ $row->product}}</td>
                                <td>{{ $row->quantity}}</td>
                                <td>
                                    @include('admin.section.buttons.button-datrinikai-report')
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
<script src="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/js/nepali.datepicker.v3.7.min.js')}}" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        /***************************NepaliDate picker *********************/
        $(".nep_date").nepaliDatePicker({
            ndpYear: true,
            ndpMonth: true,
            ndpYearCount: 1000,
            // unicodeDate: true,
        })
        /***************************summernote *********************/

        $('.summernote').summernote({
            height: 150, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: true // set focus to editable area after initializing summernote
        });
    });
</script>
@endsection
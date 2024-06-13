@extends('layouts.admin')
@section('title', 'किसान प्रोफाइल सूची')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<link href="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/css/nepali.datepicker.v3.7.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">
            <a href="" onclick="refreshPage()" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fa fa-refresh"></i> रिफ्रेश गर्नुहोस्</a>
        </div>
        <a href="{{ route($_base_route.'.deleted_item')}}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fa fa-trash-o fa-sm text-white-50"></i> रिसाइकलबिन</a>
    </div>
</div>
<div style="justify-content: center">
    <form class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="नाम" aria-label="Search">
        <input class="form-control mr-sm-2" type="search" placeholder="मोबाइल" aria-label="Search">
        <input class="form-control mr-sm-2" type="search" id="dob" placeholder="जन्म मिति" aria-label="Search">
        <input class="form-control mr-sm-2" type="search" id="email" name="email" placeholder="इमेल" aria-label="Search">
        <button class="btn btn-sm btn-info my-2 my-sm-0" type="submit">खोजनुस</button>
    </form><br>
</div>

<div class="row">
    <div class="col-sm-12">
        <section class="card">
            <header class="card-header">
                किसान प्रोफाइल सूची
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
                                <th>ID</th>
                                <th>नाम</th>
                                <th>ई-मेल</th>
                                <th>मोबाइल</th>
                                <th>पेशा</th>
                                <th>जन्म मिति</th>
                                <th>फोटा</th>
                                <th class="hidden-phone">स्थिति</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($data['rows']) != 0)
                            @foreach( $data['rows'] as $key=> $row)
                            <tr class="gradeX">
                                <td>{{ getUnicodeNumber($key+1) }}.</td>
                                <td>{{$row->unique_id}}</td>
                                <td>{{$row->full_name}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->mobile}}</td>
                                <td>{{$row->occupation}}</td>
                                <td>{{$row->dob}}</td>
                                <td>
                                    @if($row->image)
                                    <img src="{{ asset($row->image) }}" class="img img-responsive" height="50px" width="50px" alt="{{$row->title}}" title="{{$row->title}}">
                                    @else
                                    फोटा भेटिएन !
                                    @endif
                                </td>
                                <td class="col-md-1">
                                    @include('admin.section.buttons.button-general-edit')
                                    <!-- @include('admin.section.buttons.button-delete') -->
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
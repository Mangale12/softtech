@extends('layouts.admin')
@section('title', 'बिउ बिजन रिपोर्ट')
@section('css')
@endsection
@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">
            <h3>बिउ बिजन रिपोर्ट</h3>
        </div>
        <div class="text-center invoice-btn">
            <a href="{{route( 'admin.report.biubijan_search')}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fa fa-long-arrow-left"></i> पछाडी फर्किनुहोस्</a>&nbsp;
            <a class="btn btn-info text-light btn-sm" onclick="javascript:window.print();"><i class="fa fa-print"></i> प्रिन्ट </a>
        </div>
    </div>
</div>
<!-- invoice start-->
<section>
    <div class="card card-primary">
        <!--<div class="card-heading navyblue"> INVOICE</div>-->
        <div class="card-body">
            <div class="row invoice-list">
                <h5>बिउ बिजन बिबरण</h5>
                <div class="col-md-12 text-center corporate-id">
                    <p>किसान सूचीकरण तथा अनुदान व्यवस्थापन प्रणाली</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">बिउ नाम</h4>
                    <p>{{ $data['row']->title }}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">अनुदान पाएको</h4>
                    <p>@if ($data['row']->anudaan) छ @else छैन @endif</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">अनुदान</h4>
                    <p>{{ $data['row']->anudaan }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- invoice end-->

@endsection
@section('js')

@endsection
@extends('layouts.admin')
@section('title', 'दात्रिनिकाय बिबरण रिपोर्ट')
@section('css')
@endsection
@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">
            <h3>दात्रिनिकाय बिबरण रिपोर्ट</h3>
        </div>
        <div class="text-center invoice-btn">
            <a href="{{route( 'admin.report.datrinikai_search')}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fa fa-long-arrow-left"></i> पछाडी फर्किनुहोस्</a>&nbsp;
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
                <h5>दात्रिनिकाय बिबरण</h5>
                <div class="col-md-12 text-center corporate-id">
                    <p>किसान सूचीकरण तथा अनुदान व्यवस्थापन प्रणाली</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">नाम</h4>
                    <p>{{ $data['row']->name }}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">ठेगाना</h4>
                    <p>{{ $data['row']->address }}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">फोन</h4>
                    <p>{{ $data['row']->phone }}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">रकम (रु.)</h4>
                    <p>{{ $data['row']->amounts }}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">सहयोग</h4>
                    <p>{{ $data['row']->help }}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">सहयोग बस्तु</h4>
                    <p>{{ $data['row']->product }}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">संख्या</h4>
                    <p>{{ $data['row']->quantity }}</p>
                </div>
              
            </div>
        </div>
    </div>
</section>
<!-- invoice end-->

@endsection
@section('js')

@endsection
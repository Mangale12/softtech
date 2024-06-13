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
            <a href="{{route( 'admin.report.beema_search')}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fa fa-long-arrow-left"></i> पछाडी फर्किनुहोस्</a>&nbsp;
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
                    <h4 style="font-weight: bold;">बिमा नाम</h4>
                    <p>{{ $data['row']->title }}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">अनुदान प्रतिशत</h4>
                    <p>{{ $data['row']->anudaan }}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">बिमा अबधि</h4>
                    <p>{{ $data['row']->duration }}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">बिमा शुल्क</h4>
                    <p>{{ $data['row']->total_cost }}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">छेत्रफल</h4>
                    <p>{{ $data['row']->area }}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">देखि मिति</h4>
                    <p>{{ $data['row']->start_date	 }}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">सम्म मिति</h4>
                    <p>{{ $data['row']->end_date }}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">संख्या</h4>
                    <p>{{ $data['row']->area }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- invoice end-->

@endsection
@section('js')

@endsection
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
            <a href="{{route( 'admin.report.sangrachana_search')}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fa fa-long-arrow-left"></i> पछाडी फर्किनुहोस्</a>&nbsp;
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
                    <h4 style="font-weight: bold;">संरचना प्रकार</h4>
                    <p>{{ $data['row']->types }}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">तल्ल</h4>
                    <p>{{ $data['row']->bottom }}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">लम्बाई</h4>
                    <p>{{ $data['row']->length }}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">चौडाई</h4>
                    <p>{{ $data['row']->width }}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">क्षेत्रफल्</h4>
                    <p>{{ $data['row']->area }}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">बनेको मिति</h4>
                    <p>{{ $data['row']->made_date }}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">संरचना बनोट किसिम(बनोट र छाना खुलाउने)</h4>
                    <p>{{ $data['row']->type_of_makeup	 }}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">संरचना को प्रयोग (ब्यार औ र स र घ)</h4>
                    <p>{{ $data['row']->use_of }}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">प्रयोगकर्ता (स्वयम् र भाडा)</h4>
                    <p>{{ $data['row']->user }}</p>
                </div>
                <div class="col-lg-9 col-sm-9">
                    <h4 style="font-weight: bold;">कैफियत (घर नं आदि खुलाउने)</h4>
                    <p>{{ $data['row']->remarks }}</p>
                </div>


            </div>
        </div>
    </div>
</section>
<!-- invoice end-->

@endsection
@section('js')

@endsection
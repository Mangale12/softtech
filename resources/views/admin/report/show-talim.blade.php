@extends('layouts.admin')
@section('title', 'तालिम बिबरण रिपोर्ट')
@section('css')
@endsection
@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">
            <h3>तालिम बिबरण रिपोर्ट</h3>
        </div>
        <div class="text-center invoice-btn">
            <a href="{{route( 'admin.report.talim_search')}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fa fa-long-arrow-left"></i> पछाडी फर्किनुहोस्</a>&nbsp;
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
                <h5>तालिम बिबरण</h5>
                <div class="col-md-12 text-center corporate-id">
                    <p>किसान सूचीकरण तथा अनुदान व्यवस्थापन प्रणाली</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">तालिम शीर्षक</h4>
                    <p>{{ $data['row']->title }}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">तालिम अबधि</h4>
                    <p>{{ $data['row']->duration }}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">तालिम शुल्क</h4>
                    <p>{{ $data['row']->total_cost }}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">देखि मिति</h4>
                    <p>{{ $data['row']->start_date }}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">सम्म मिति</h4>
                    <p>{{ $data['row']->end_date }}</p>
                </div>
                <div class="col-lg-9 col-sm-9">
                    <h4 style="font-weight: bold;">विषय</h4>
                    <p style="text-align: justify;">{!! $data['row']->description !!}</p>
                </div>
                <hr><br><br>
                <div class="col-lg-12 col-sm-12">
                    <h4 style="font-weight: bold;">प्रशिक्षक विवरण</h4>
                    <p></p>
                </div>
                <?php $featuredArray = json_decode($data['row']->trainer); ?>
                <div class="col-lg-2 col-sm-2">
                    <h4>प्रशिक्षकको नाम</h4>
                </div>
                <div class="col-lg-2 col-sm-2">
                    <h4>पद</h4>
                </div>
                <div class="col-lg-2 col-sm-2">
                    <h4>विषय</h4>
                </div>
                <div class="col-lg-2 col-sm-2">
                    <h4>संपर्क नम्बर</h4>
                </div>
                <div class="col-lg-2 col-sm-2">
                    <h4>इमेल</h4>
                </div>
                <div class="col-lg-2 col-sm-2">
                    <h4>संस्थाको नाम</h4>
                </div>
                @if($featuredArray)
                @foreach($featuredArray as $key=> $resource)
                <div class="col-lg-2 col-sm-2">
                    <p>{{ $resource[0] }}</p>
                </div>
                <div class="col-lg-2 col-sm-2">
                    <p>{{ $resource[1] }}</p>
                </div>
                <div class="col-lg-2 col-sm-2">
                    <p>{{ $resource[2] }}</p>
                </div>
                <div class="col-lg-2 col-sm-2">
                    <p>{{ $resource[3] }}</p>
                </div>
                <div class="col-lg-2 col-sm-2">
                    <p>{{ $resource[4] }}</p>
                </div>
                <div class="col-lg-2 col-sm-2">
                    <p>{{ $resource[5] }}</p>
                </div>
                @endforeach
                @else
                <p> डाटा फेलापरेन !</p>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- invoice end-->

@endsection
@section('js')

@endsection
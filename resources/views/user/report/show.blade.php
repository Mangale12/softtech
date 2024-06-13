@extends('layouts.user')
@section('title', 'खेतबारी बिबरण रिपोर्ट')
@section('css')
<style>
    p {
        font-size: 15px;
    }
</style>
@endsection
@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">
            <h3>खेतबारी बिबरण रिपोर्ट</h3>
        </div>
        <div class="text-center invoice-btn">
            <a href="{{route( 'admin.report.search')}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fa fa-long-arrow-left"></i> पछाडी फर्किनुहोस्</a>&nbsp;
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
                <h5>खेत बिबरण</h5>
                <div class="col-md-12 text-center corporate-id">
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">आर्थिक वर्ष</h4>
                    <p>@if(isset($data['rows']->fiscalYear)) {{ $data['rows']->fiscalYear->fiscal_np }} @endif</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">किसान आइडी नं.</h4>
                    <p>@if(isset($data['rows'])) {{ $data['rows']->unique_id }} @endif</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">जग्गा </h4>
                    <p>@if(isset($data['rows']->getLand)) {{ $data['rows']->getLand->totalbigaha }} @endif</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">बाली प्रकार</h4>
                    <p>@if(isset($data['rows']->baaliCategory)) {{ $data['rows']->baaliCategory->title }} @endif</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">बाली </h4>
                    <p>@if(isset($data['rows']->baaliName)) {{ $data['rows']->baaliName->title }} @endif</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">महिना देखि</h4>
                    <p>@if(isset($data['rows']->startMonth)) {{ $data['rows']->startMonth->month_np }} @endif</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">सम्म</h4>
                    <p>@if(isset($data['rows']->endMonth)) {{ $data['rows']->endMonth->month_np }} @endif</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">मिति देखि</h4>
                    <p>{{ getUnicodeNumber($data['rows']->start_date)}}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">सम्म</h4>
                    <p>{{ getUnicodeNumber($data['rows']->end_date) }}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">Adder By</h4>
                    <p>{{ Auth::id() ==  $data['rows']->added_by  ? 'स्वयम आफै' : $data['rows']->getAddedBy->role  }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-primary">
        <!--<div class="card-heading navyblue"> INVOICE</div>-->
        <div class="card-body">
            <div class="row invoice-list">
                <h5>बिउ बिजन</h5>
                <div class="col-md-12 text-center corporate-id">
                </div>

                <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>सुची</th>
                                <th>मूल्य</th>
                                <th>संख्या</th>
                                <th>कुल रकम</th>
                                <th>टिप्पणीहरू</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $featuredArray = json_decode($data['rows']->biubijan_detail); ?>
                            @if($featuredArray)
                            @foreach($featuredArray as $key=> $resource)
                            <tr>
                                <th scope="row">{{ getUnicodeNumber($key+1) }}.</th>
                                <td>{{ $resource[0] }}</td>
                                <td>{{ $resource[1] }}</td>
                                <td>{{ $resource[2] }}</td>
                                <td>रु. {{ $resource[3] }}</td>
                                <td>{{ $resource[4] }}</td>
                            </tr>
                            @endforeach
                            <tr>

                                <td colspan="5" style="font-weight: bold;text-align:right;">जम्मा रकम</td>
                                <td style="font-weight: bold;">रु. @if(isset($data['rows']->total_biubijan_amount)) {{ $data['rows']->total_biubijan_amount }} @endif</td>

                            </tr>
                            @else
                            <p>माफ गर्नुहोला ! डाटा फेलापरेन !</p>
                            @endif
                        </tbody>
                    </table>
                </div>

                <h5>औजारहरू</h5>
                <div class="col-md-12 text-center corporate-id">
                </div>

                <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>सुची</th>
                                <th>मूल्य</th>
                                <th>संख्या</th>
                                <th>कुल रकम</th>
                                <th>टिप्पणीहरू</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $featuredArray = json_decode($data['rows']->mesinary_detail); ?>
                            @if($featuredArray)
                            @foreach($featuredArray as $key=> $resource)
                            <tr>
                                <th scope="row">{{ getUnicodeNumber($key+1) }}.</th>
                                <td>{{ $resource[0] }}</td>
                                <td>{{ $resource[1] }}</td>
                                <td>{{ $resource[2] }}</td>
                                <td>रु. {{ $resource[3] }}</td>
                                <td>{{ $resource[4] }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="5" style="font-weight: bold;text-align:right;">जम्मा रकम</td>
                                <td style="font-weight: bold;">रु. @if(isset($data['rows']->total_mesinary_amount)) {{ $data['rows']->total_mesinary_amount }} @endif</td>
                            </tr>
                            @else
                            <p>माफ गर्नुहोला ! डाटा फेलापरेन !</p>
                            @endif
                        </tbody>
                    </table>
                </div>

                <h5>मल </h5>
                <div class="col-md-12 text-center corporate-id">
                </div>

                <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>सुची</th>
                                <th>मूल्य</th>
                                <th>संख्या</th>
                                <th>कुल रकम</th>
                                <th>टिप्पणीहरू</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $featuredArray = json_decode($data['rows']->mal_bibran_detail); ?>
                            @if($featuredArray)
                            @foreach($featuredArray as $key=> $resource)
                            <tr>
                                <th scope="row">{{ getUnicodeNumber($key+1) }}.</th>
                                <td>{{ $resource[0] }}</td>
                                <td>{{ $resource[1] }}</td>
                                <td>{{ $resource[2] }}</td>
                                <td>रु. {{ $resource[3] }}</td>
                                <td>{{ $resource[4] }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="5" style="font-weight: bold;text-align:right;">जम्मा रकम</td>
                                <td style="font-weight: bold;">रु. @if(isset($data['rows']->total_mal_bibran_amount)) {{ $data['rows']->total_mal_bibran_amount }} @endif</td>
                            </tr>
                            @else
                            <p>माफ गर्नुहोला ! डाटा फेलापरेन !</p>
                            @endif
                        </tbody>
                    </table>
                </div>

                <h5>कामदार </h5>
                <div class="col-md-12 text-center corporate-id">
                </div>
                <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>सुची</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $worker = json_decode($data['rows']->worker_detail); ?>
                            
                            @if($worker)
                            @foreach($worker as $key=> $resource)
                            <tr>
                                <td scope="row">{{ getUnicodeNumber($key+1) }}.</td>
                                <td>{{ $resource }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="1" style="font-weight: bold;text-align:right;">जम्मा कामदार रकम</td>
                                <td style="font-weight: bold;">रु. @if(isset($data['rows']->total_mal_bibran_amount)) {{ $data['rows']->total_mal_bibran_amount }} @endif</td>
                            </tr>
                            @else
                            <p>माफ गर्नुहोला ! डाटा फेलापरेन !</p>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="card card-primary">
        <!--<div class="card-heading navyblue"> INVOICE</div>-->
        <div class="card-body">
            <div class="row invoice-list">
                <h5> कार्यतालिका बिबरण </h5>
                <div class="col-md-12 text-center corporate-id">
                </div>
                <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>कार्यतालिका</th>
                                <th>देखि</th>
                                <th>सम्म</th>
                                <th>भएको/नभएको</th>
                                <th>जनशक्ति</th>
                                <th>टिप्पणी</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($data['karyatalika'])
                            @foreach($data['karyatalika'] as $key=> $row)
                            <tr>
                                <th scope="row">{{ getUnicodeNumber($key+1) }}.</th>
                                <td>{{ $row->title }}</td>
                                <td>{{ getUnicodeNumber($row->start_date) }}</td>
                                <td>{{ getUnicodeNumber($row->end_date) }}</td>
                                <td> @if( $row->complete_status == 1) छ @else छैन @endif</td>
                                <td>{{ $row->working_team }}</td>
                                <td>{{ $row->remarks }}</td>
                            </tr>
                            @endforeach
                            @else
                            <p>डाटा फेलापरेन !</p>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-primary">
        <!--<div class="card-heading navyblue"> INVOICE</div>-->
        <div class="card-body">
            <div class="row invoice-list">
                <h5> अन्य खर्च बिबरण बिबरण </h5>
                <div class="col-md-12 text-center corporate-id">
                </div>
                <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>प्रयोजन</th>
                                <th>मिति</th>
                                <th>रकम</th>
                                <th>टिप्पणी</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($data['expenses'])
                            @foreach($data['expenses'] as $key=> $row)
                            <tr>
                                <th scope="row">{{ getUnicodeNumber($key+1) }}.</th>
                                <td>{{ $row->purpose }}</td>
                                <td>{{ getUnicodeNumber($row->date) }}</td>
                                <td>{{ getUnicodeNumber($row->amount) }}</td>
                                <td>{{ $row->remarks }}</td>
                            </tr>
                            @endforeach
                            @else
                            <p>डाटा फेलापरेन !</p>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- invoice end-->

@endsection
@section('js')

@endsection
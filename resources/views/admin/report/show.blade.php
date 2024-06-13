@extends('layouts.admin')
@section('title', 'कृषक बिबरण रिपोर्ट')
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
            <h3>कृषक बिबरण रिपोर्ट</h3>
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
                <h5>किसान प्रोफाइल</h5>
                <div class="col-md-12 text-center corporate-id">
                    <p>किसान सूचीकरण तथा अनुदान व्यवस्थापन प्रणाली</p>
                    <img src="{{ $data['general']->image }}" class="img img-reaponsive" height="120px" width="120px" alt="">
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">पुरा नाम</h4>
                    <p>{{ $data['general']->full_name }}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">इमेल</h4>
                    <p>{{ $data['general']->email }}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">मोबाइल नं</h4>
                    <p>{{ $data['general']->mobile }}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">पेशा</h4>
                    <p>{{ $data['general']->occupation }}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">ब्लड ग्रुप</h4>
                    <p>{{ $data['general']->blood_group }}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">लिंग</h4>
                    <p>{{ $data['general']->gender }}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">वैवाहिक स्थिति</h4>
                    <p>{{ $data['general']->marital_status }}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">जन्म मिति</h4>
                    <p>{{ $data['general']->dob }}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">प्रदेश </h4>
                    <p>{{ $data['general']->permanent_state }}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">जिल्ला</h4>
                    <p>{{ $data['general']->permanent_district }}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 tyle="font-weight: bold;">स्थानीय तह</h4>
                    <p>{{ $data['general']->permanent_palika }}</p>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <h4 style="font-weight: bold;">वडा न.</h4>
                    <p>{{ $data['general']->permanent_ward }}</p>
                </div>
            </div>

        </div>
    </div>
    <div class="card card-primary">
        <!--<div class="card-heading navyblue"> INVOICE</div>-->
        <div class="card-body">
            <div class="row invoice-list">
                <h5>खेत बारी बिबरण</h5>
                <div class="col-md-12 text-center corporate-id">
                    
                </div>
                <div class="col-lg-2 col-sm-3">
                    <h4 style="font-weight: bold;">आर्थिक वर्ष</h4>
                    <p>@if(isset($data['farm']->fiscalYear)) {{ $data['farm']->fiscalYear->fiscal_np }} @endif २०८०</p>
                </div>
                <div class="col-lg-2 col-sm-3">
                    <h4 style="font-weight: bold;">ऋतु प्रकार</h4>
                    <p>बसन्त ऋतु</p>
                </div>
                <div class="col-lg-2 col-sm-3">
                    <h4 style="font-weight: bold;">महिना देखि</h4>
                    <p>बैशाख
                    </p>
                </div>
                <div class="col-lg-2 col-sm-3">
                    <h4 style="font-weight: bold;">सम्म</h4>
                    <p> जेष्ठ</p>
                </div>
                <div class="col-lg-2 col-sm-3">
                    <h4 style="font-weight: bold;">मिति देखि</h4>
                    <p>@if(isset($data['farm']->start_date)) {{ getUnicodeNumber($data['farm']->start_date)}} @endif</p>
                </div>
                <div class="col-lg-2 col-sm-3">
                    <h4 style="font-weight: bold;">सम्म</h4>
                    <p>@if(isset($data['farm']->end_date)) {{ getUnicodeNumber($data['farm']->end_date)}} @endif</p>
                </div>
                <h5>बिउ बिजन</h5>
                <div class="col-md-12 text-center corporate-id">
                    
                </div>
                <div class="col-lg-2 col-sm-3">
                    <h4 style="font-weight: bold;">सुची</h4>
                    <p>गहु</p>
                </div>
                <div class="col-lg-2 col-sm-3">
                    <h4 style="font-weight: bold;">मूल्य</h4>
                    <p>५००</p>
                </div>
                <div class="col-lg-2 col-sm-3">
                    <h4 style="font-weight: bold;">संख्या</h4>
                    <p>५</p>
                </div>
                <div class="col-lg-2 col-sm-3">
                    <h4 style="font-weight: bold;">कुल रकम</h4>
                    <p>२५००</p>
                </div>
                <div class="col-lg-4 col-sm-4">
                    <h4 style="font-weight: bold;">टिप्पणीहरू</h4>
                    <p>नेपालको सुदूरपश्चिम प्रदेशको  कञ्चनपुर जिल्लामा पर्ने यो नगर पालिका नेपाल सरकारको मिति २०७१।०८।१६ गतेको निर्णयानुशार देशभरी गठन भएका ६१ नगरपालिकाहरु मध्ये एक नगरपालिका हो ।</p>
                </div>
                <h5>औजारहरू</h5>
                <div class="col-md-12 text-center corporate-id">
                    
                </div>
                <div class="col-lg-2 col-sm-2">
                    <h4 style="font-weight: bold;">सुची</h4>
                    <p>हलो</p>
                </div>
                <div class="col-lg-2 col-sm-2">
                    <h4 style="font-weight: bold;">मूल्य</h4>
                    <p>५००</p>
                </div>
                <div class="col-lg-2 col-sm-2">
                    <h4 style="font-weight: bold;">संख्या</h4>
                    <p>३</p>
                </div>
                <div class="col-lg-2 col-sm-2">
                    <h4 style="font-weight: bold;">कुल रकम</h4>
                    <p>१५००</p>
                </div>
                <div class="col-lg-4 col-sm-3">
                    <h4 style="font-weight: bold;">टिप्पणीहरू</h4>
                    <p>नेपालको सुदूरपश्चिम प्रदेशको  कञ्चनपुर जिल्लामा पर्ने यो नगर पालिका नेपाल सरकारको मिति २०७१।०८।१६ गतेको निर्णयानुशार देशभरी गठन भएका ६१</p>
                </div>
                <h5>मल बिबरण</h5>
                <div class="col-md-12 text-center corporate-id">
                    
                </div>
                <div class="col-lg-2 col-sm-3">
                    <h4 style="font-weight: bold;">सुची</h4>
                    <p>रातो मल</p>
                </div>
                <div class="col-lg-2 col-sm-2">
                    <h4 style="font-weight: bold;">मूल्य</h4>
                    <p>५००</p>
                </div>
                <div class="col-lg-2 col-sm-3">
                    <h4 style="font-weight: bold;">संख्या</h4>
                    <p>२</p>
                </div>
                <div class="col-lg-2 col-sm-3">
                    <h4 style="font-weight: bold;">कुल रकम</h4>
                    <p>१०००</p>
                </div>
                <div class="col-lg-4 col-sm-3">
                    <h4 style="font-weight: bold;">टिप्पणीहरू</h4>
                    <p>देशभर रासायनिक मलको अभाव भइरहेको बेला घरमै नक्कली मल (पोटास) बनाएर बजार बिक्री वितरण गर्दै आएका कनकाई नगरपालिका– ३ स्थित सुरुङ्गाको तिलक पौड्यालको घरमा प्रहरीले सोमबार छापा मारेको हो।</p>
                </div>
               
            </div>

        </div>
    </div>
    <div class="card card-primary">
        <!--<div class="card-heading navyblue"> INVOICE</div>-->
        <div class="card-body">
            <div class="row invoice-list">
                <h5>कामदार बिबरण</h5>
                <div class="col-md-12 text-center corporate-id">
                </div>

                <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>पुरा नाम</th>
                                <th>मोबाइल नं </th>
                                <th>लिंग</th>
                                <th>कामदार प्रकार</th>
                                <th>समय</th>
                                <th>कामदार तलब प्रकार </th>
                                <th>तलब</th>
                            </tr>
                        </thead>
                        <tbody>
                            

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
                <h5>पारिवारिक बिबरण</h5>
                <div class="col-md-12 text-center corporate-id">
                </div>
                <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>पुरा नाम</th>
                                <th>इमेल</th>
                                <th>मोबाइल नं</th>
                                <th>पेशा</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $featuredArray = json_decode($data['family']->family_detail); ?>
                            @if($featuredArray)
                            @foreach($featuredArray as $key=> $resource)
                            <tr>
                                <th scope="row">{{ getUnicodeNumber($key+1) }}.</th>
                                <td>{{ $resource[0] }}</td>
                                <td>{{ $resource[1] }}</td>
                                <td>{{ $resource[2] }}</td>
                                <td>{{ $resource[3] }}</td>
                            </tr>
                            @endforeach
                            @else
                            <p>माफ गर्नुहोला ! डाटा फेलापरेन !</p>
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
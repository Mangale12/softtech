@extends('layouts.admin')
@section('title', 'बिलिंग बिबरण')
@section('css')
@endsection
@section('content')
<section>
    <div class=" invoice-btn">
        <a href="{{ route($_base_route.'.downloadPDF', $data['rows']->id )}}" class="btn btn-danger    text-light btn-sm pull-right" target="_Pdf"><i class="fa fa-file" aria-hidden="true"></i> Export to PDF </a>
        <a href="{{ route($_base_route.'.index')}}" class="btn btn-danger btn-sm  text-light"><i class="fa fa-long-arrow-left"></i> पछाडी फर्किनुहोस् </a>
        <a class="btn btn-info text-light btn-sm pull-right" onclick="javascript:Print('contentToPrint')"><i class="fa fa-print"></i> प्रिन्ट </a>
    </div><br>

    <div class="card card-primary">
        <div class="card-body">
            <div class="container" id="contentToPrint">
                <h2 class="text-center" style="font-weight: bold;">नमुना एकिकृत सहकारी खेति बीउ उत्पादन समुह</h2>
                <div class="row">
                    <div class="col-md-4 col-4"></div>
                    <div class="col-md-4 col-4 text-center"><b>
                            <h4>गौरादह-५, झापा</h4>
                        </b></div>
                    <div class="col-md-4 col-4 row">
                        <div class="col-md-6 col-6">
                            <p class="text-right">फोन नं.</p>
                        </div>
                        <div class="col-md-6 col-6">
                            <p>९८४२६२०४४२</p>
                            <p>९८४२६६८८११</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-6">
                    </div>
                    <div class="col-md-6 col-6">
                        <p><span><b>मिति</b></span>: {{ datenep(now()->toDateTimeString(), true) }}</p>
                    </div>
                    <div class="col-md-12 col-12">
                        <p>विक्रेताको करदाता नं. ................................. </p>
                        <p>क्रेताको नाम : {{ $data['rows']->full_name }} </p>
                        <p>ठेगाना : {{ $data['rows']->address}}</p>
                    </div>
                    <div class="col-md-8 col-8">
                        <p>क्रेताको करदाता नं. ....................................</p>
                    </div>
                    <div class="col-md-4 col-4">
                        <p>विल नं. {{$data['rows']->bill_no}}</p>
                    </div>
                </div>
                <table class="table table-bordered">
                    <tr>
                        <th class="text-center col-md-1">क्र.सं.</th>
                        <th class="text-center">विवरण</th>
                        <th class="text-center col-md-1">परिमाण</th>
                        <th class="text-center col-md-2">दर</th>
                        <th class="text-center col-md-2">रकम</th>
                    </tr>
                    @if(count($data['detail']) != 0)
                    @php $total_amount = 0; @endphp
                    @foreach($data['detail'] as $key => $row)
                    @php $total_amount += $row->total; @endphp
                    <tr>
                        <td>{{ getUnicodeNumber($key+1 )}}.</td>
                        <td>@if(isset($row->getProductName)) {{ $row->getProductName->title }} @endif</td>
                        <td>{{getUnicodeNumber($row->quantity)}} </td>
                        <td>{{getUnicodeNumber($row->price)}}</td>
                        <td> {{getUnicodeNumber($row->total) }}</td>
                    </tr>
                    @endforeach
                    @endif
                    <tr>
                        <td style="border-top:0!important;border-bottom:0!important;"></td>
                        <td style="border-top:0!important;border-bottom:0!important;"></td>
                        <td>जम्मा</td>
                        <td></td>
                        <td>रु. &nbsp;{{ getUnicodeNumber($total_amount) }}</td>
                    </tr>
                    <tr style="border-top:0!important;border-bottom:0!important;">
                        <td style="border-top:0!important;border-bottom:0!important;"></td>
                        <td style="border-top:0!important;border-bottom:0!important;"></td>
                        <td>पेश्की</td>
                        <td></td>
                        <td>{{ getUnicodeNumber(0) }}</td>
                    </tr>
                    <tr style="border-top:0!important;border-bottom:0!important;">
                        <td></td>
                        <td></td>
                        <td>बाँकी</td>
                        <td></td>
                        <td>{{ getUnicodeNumber(0) }}</td>
                    </tr>
                    <tr>
                        <td colspan="5">अक्षरेपी रु.</td>
                    </tr>
                </table>
                <div class="row">
                    <div class="col-md-4">
                        <p>....................</p>
                        <p>क्रेताको सही</p>
                    </div>
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4 text-right">
                        <p>....................</p>
                        <p>विक्रेताको सही</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
@section('js')
<script>
    function Print(divele) {
        debugger;
        var elementHTML = document.getElementById(divele).innerHTML;
        var oldPage = document.body.innerHTML;
        document.body.innerHTML =
            "<html><head><title></title></head><body>" +
            elementHTML + "</body></html>";
        window.print();
        document.body.innerHTML = oldPage;
    }
</script>

@endsection
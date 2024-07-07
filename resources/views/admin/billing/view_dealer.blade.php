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
    {{-- @dd($data['rows']->transaction) --}}
    <div class="card card-primary">
        <div class="card-body">
            <div class="container" id="contentToPrint">
                <h2 class="text-center" style="font-weight: bold;">{{ $data['settings']->site_name }}</h2>
                <div class="row">
                    <div class="col-md-4 col-4"></div>
                    <div class="col-md-4 col-4 text-center"><b>
                            <h4>{{ $data['settings']->site_first_address }}</h4>
                        </b></div>
                    <div class="col-md-4 col-4 row">
                        <div class="col-md-6 col-6">
                            <p class="text-right">फोन नं.</p>
                            <p class="text-right">मोबाइल नं.</p>
                        </div>

                        <div class="col-md-6 col-6">
                            <p>{{ $data['settings']->site_phone }}</p>
                            <p>{{ $data['settings']->site_mobile }}</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-6">
                    </div>
                    <div class="col-md-6 col-6">
                        <p><span><b>मिति</b></span>: {{ datenep(now()->toDateTimeString(), true) }}</p>
                    </div>
                    <div class="col-md-12 col-12">
                        {{-- <p>विक्रेताको करदाता नं. ................................. </p> --}}
                        <p>आपूर्तिकर्ता नाम: {{ $data['rows']->transaction_id != null && $data['rows']->transaction->supplier_id != null ? $data['rows']->transaction->supplier->name : '' }}</p>
                        <p>आपूर्तिकर्ता ठेगाना: {{ $data['rows']->transaction_id != null && $data['rows']->transaction->supplier_id != null ? $data['rows']->transaction->supplier->address : '' }}</p>

                    </div>
                    {{-- <div class="col-md-8 col-8">
                        <p>क्रेताको करदाता नं. ....................................</p>
                    </div> --}}
                    <div class="col-md-4 col-4">
                        <p>विल नं. {{$data['rows']->bill_no}}</p>
                    </div>
                </div>
                <table class="table table-bordered">
                    <tr>
                        <th class="text-center col-md-1">क्र.सं.</th>
                        <th class="text-center">सामानको नाम</th>
                        <th class="text-center col-md-1">ईकाई</th>
                        <th class="text-center col-md-2">ईकाई मूल्य</th>
                        <th class="text-center col-md-2">मात्रा</th>
                        <th class="text-center col-md-2">जम्मा रकम</th>
                    </tr>
                    @if(!empty($data['rows']->transaction->rawMaterials) && count($data['rows']->transaction->rawMaterials) != 0 )
                    @foreach($data['rows']->transaction->rawMaterials as $key => $row)
                    <tr>
                        <td>{{ getUnicodeNumber($key+1 )}}.</td>
                        <td>@if(isset($row->getRawMaterialName)) {{ $row->getRawMaterialName->name }} @endif</td>
                        <td>{{getUnicodeNumber($row->unit->name)}} </td>
                        <td>{{getUnicodeNumber($row->unit_price)}}</td>
                        <td> {{getUnicodeNumber($row->stock_quantity) }}</td>
                        <td> {{getUnicodeNumber($row->total_cost) }}</td>
                    </tr>
                    @endforeach
                    @endif
                    <tr>
                        <td colspan="5" align="right">उप कुल रकम</td>
                        <td>रु. &nbsp;{{ getUnicodeNumber($data['rows']->total_amount) }}</td>
                    </tr>
                    <tr>
                        <td colspan="5" align="right">छुट रकम</td>
                        <td>रु. &nbsp;{{ getUnicodeNumber($data['rows']->discount) }}</td>
                    </tr>
                    <tr>
                        <td colspan="5" align="right">छुट रकम</td>
                        <td>रु. &nbsp;{{ getUnicodeNumber($data['rows']->taxable_amount) }}</td>
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

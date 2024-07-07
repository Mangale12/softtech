@extends('layouts.admin')
@section('title', 'बिलिंग बिबरण')
@section('css')
@endsection
@section('content')
<section>
    <div class=" invoice-btn">
        <a href="" class="btn btn-danger    text-light btn-sm pull-right" target="_Pdf"><i class="fa fa-file" aria-hidden="true"></i> Export to PDF </a>
        <a href="" class="btn btn-danger btn-sm  text-light"><i class="fa fa-long-arrow-left"></i> पछाडी फर्किनुहोस् </a>
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
                        <p>क्रेताको नाम :  </p>
                        <p>ठेगाना : </p>
                    </div>
                    <div class="col-md-8 col-8">
                        <p>क्रेताको करदाता नं. ....................................</p>
                    </div>
                    <div class="col-md-4 col-4">
                        <p>विल नं.</p>
                    </div>
                </div>
                <table class="table table-bordered" id="item-table">
                    <thead>
                        <tr>
                            <th>क्र.स</th>
                            <th>कच्चा पदार्थ</th>
                            <th>एकाई</th>
                            <th>मात्रा</th>
                            <th>एकाई मूल्य</th>
                            <th> जम्मा मूल्य </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($data['row']->rawMaterials != null)
                        @foreach( $data['row']->rawMaterials as $key=> $row)
                        <tr class="gradeX">
                            <td>{{ getUnicodeNumber($key+1) }}.</td>
                            <td>{{$row->getRawMaterialName->name}}</td>
                            <td>{{$row->unit->name}}</td>
                            <td>{{$row->stock_quantity}}</td>
                            <td>{{$row->unit_price}}</td>
                            <td>{{$row->total_cost}}</td>

                        </tr>

                        @endforeach
                        <tr>
                            <td colspan="5" align="right" class="font-weight-bold">उपकुल रकम</td>
                            <td class="font-weight-bold">{{ $data['row']->rawMaterials->sum('total_cost') }}</td>
                        </tr>
                        @else
                        <p>माफ गर्नुहोला ! डाटा फेलापरेन !</p>
                        @endif
                </table>
                <div class="row">
                    <div class="offset-7 col-3 text-right">
                        <p>उपकुल रकम   :<b class="ml-1">{{ $data['row']->rawMaterials->sum('total_cost') }}</b></p>
                    </div>
                </div>
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

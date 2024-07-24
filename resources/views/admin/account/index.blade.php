@extends('layouts.admin')
@section('title', 'सप्लायर्स')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<!--dynamic table-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://kit.fontawesome.com/728d898815.js" crossorigin="anonymous"></script>

@endsection
@section('content')
@php
// Extract the udhyog name from the current URL
    preg_match('/admin\/udhyog\/([^\/]*)/', request()->path(), $matches);
    $udhyogName = $matches[1] ?? '';
@endphp
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <section class="card">
            <header class="card-header">
                {{-- {{ dd($data['row']) }} --}}
                <b class="font-weight-bold">{{ $data['row']->transaction_date }}</b> मा <b class="font-weight-bold">{{ $data['row']->supplier != null ? $data['row']->supplier->name : ($data['row']->dealer != null ? $data['row']->dealer->name : '') }}</b>बाट ल्याइएको कच्चा पदार्थको विवरण
                <span class="tools pull-right d-flex">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="card-body">
                <div class="adv-table">
                    <table class="table table-bordered" id="item-table">
                        <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>कच्चा पदार्थ</th>
                                <th>मात्रा</th>
                                <th>एकाई</th>
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
                                <td>{{$row->stock_quantity}}</td>
                                <td>{{$row->unit->name}}</td>
                                <td>{{$row->unit_price}}</td>
                                <td>{{$row->total_cost}}</td>

                            </tr>

                            @endforeach
                            <tr>
                                <td colspan="5" align="right" class="font-weight-bold">कुल रकम</td>
                                <td class="font-weight-bold">{{ $data['row']->rawMaterials->sum('total_cost') }}</td>
                            </tr>
                            {{-- <tr>
                                <form action="{{ route('admin.inventory.raw_materials.add_raw_material') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="batch_id" value="{{ $productionBatch['id'] }}">
                                    <td style="width:15rem">
                                        <select name="raw_material_id" id="raw-material-id" class="form-control">
                                            <option value=>छान्नुहोस्</option>
                                            @if(count($data['raw_materials']) != 0)
                                            @foreach($data['raw_materials'] as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </td>

                                    <td style="width:20rem">
                                        <input type="number" class="form-control rounded amount worked-day" name="quantity" id="quantity" placeholder="">
                                    </td>
                                    <td style="width:20rem">
                                        <select name="unit_id" id="unit-id" class="form-control">
                                            <option value=>छान्नुहोस्</option>
                                            @if(count($data['units']) != 0)
                                            @foreach($data['units'] as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </td>
                                    <td style="width:20rem">
                                        <input type="text" class="form-control rounded tamount " name="unit_price" id="mal_bibran_4" placeholder=" कुल रकम">
                                    </td>
                                    <td style="width:20rem">
                                        <input type="text" class="form-control rounded" name="total_cost" id="mal_bibran_4" readonly placeholder=" कुल रकम">
                                    </td>
                                    <td>
                                        <button type="submit"><img src="{{ asset('sumit.png') }}" alt="" style="width: 60px; height:20px"></button>
                                    </td>
                                </form>
                            </tr> --}}
                            @else
                            <p>माफ गर्नुहोला ! डाटा फेलापरेन !</p>
                            @endif
                    </table>
                </div>
            </div>
        </section>
    </div>

</div>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

@endsection

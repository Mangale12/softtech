@extends('layouts.admin')
@section('title', 'सप्लाइर्स')
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
                <b class="font-weight-bold">{{ $data['row']->transaction_date }}</b> मा <b class="font-weight-bold">{{ $data['row']->dealer != null ? $data['row']->dealer->name : '' }}</b>लाई बिग्री गरेको उत्पादनको विवरण
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
                                <th>ब्याच नं</th>
                                <th>उत्पादन</th>
                                <th>मात्रा</th>
                                <th>एकाई</th>
                                <th>एकाई मूल्य</th>
                                <th> जम्मा मूल्य </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($data['row']->sales_order != null)
                            @foreach( $data['row']->sales_order as $key=> $row)
                            <tr class="gradeX">
                                <td>{{ getUnicodeNumber($key+1) }}.</td>
                                <td>{{$row->production_batch_id != null ? $row->productionBatch->batch_no : ($row->seed_batch_id != null ? $row->seedBatch : '')}}</td>
                                <td>{{$row->product->name}}</td>
                                <td>{{$row->quantity}}</td>
                                <td>{{$row->unit->name}}</td>
                                <td>{{$row->unit_price}}</td>
                                <td>{{$row->total_cost}}</td>

                            </tr>
                            @endforeach
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

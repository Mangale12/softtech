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
{{-- {{ $data['row']->rawMaterials }} --}}
{{-- {{ dd($_base_route) }} --}}
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <section class="card">
            <header class="card-header">
                बिक्री आदेश विवरण
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
                                <th>पुरा नाम</th>
                                <th>आपूर्ति मिति</th>
                                <th>कुल भुक्तानी</th>
                                <th>बाँकी भुक्तानी</th>
                                <th>तिरीएको रकम</th>
                                <th class="hidden-phone">स्थिति</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($data['rows'] != null)
                            @foreach( $data['rows'] as $key=> $row)
                            <tr class="gradeX">
                                <td>{{ getUnicodeNumber($key+1) }}.</td>
                                <td>{{$data['dealer']->name}}</td>
                                <td>{{$row->transaction_date}}</td>
                                <td>{{$row->total_amount}}</td>
                                <td>{{$row->remaining_amount}}</td>
                                <td>{{ $row->paid_amount }}</td>

                                <td>
                                    <a href="{{ route('admin.transactions.view_payment',$row->transaction_key != null ? $row->transaction_key : $row->id) }}"><img src="{{ asset('images.png') }}" alt="" width="30"></a>
                                    @include('admin.section.buttons.button-view')
                                    <a class="btn btn-primary btn-sm" href="{{ URL::route('admin.transactions.sales_order_detail', ['transaction_key' => $row->transaction_key != null ? $row->transaction_key : $row->id]) }}" style="cursor:pointer;"><i class="fa fa-eye"></i></i></a>
                                    <a href="{{ route('admin.inventory.dealers.bill', $row->transaction_key) }}"><img src="{{ asset('billing.png') }}" alt="" width="25"></a>

                                    @include('admin.section.buttons.button-delete')
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <p>माफ गर्नुहोला ! डाटा फेलापरेन !</p>
                            @endif
                    </table>
                </div>

                {{-- <div class="row">
                    @include('admin.section.load-time')
                    {{ $data['rows']->links('vendor.pagination.custom') }}
                </div> --}}
            </div>
        </section>
    </div>

</div>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

@endsection

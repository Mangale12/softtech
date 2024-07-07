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
                सप्लाइर्स सुची
                <span class="tools pull-right d-flex">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="card-body">
                <div class="adv-table">
                    @if(count($data['row']) != 0)
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

                            @foreach( $data['row'] as $key=> $row)
                            <tr class="gradeX">
                                <td>{{ getUnicodeNumber($key+1) }}.</td>
                                <td>{{$data['supplier']->name}}</td>
                                <td>{{$row->transaction_date}}</td>
                                <td>{{$row->total_amount}}</td>
                                <td>{{$row->remaining_amount}}</td>
                                <td>{{ $row->paid_amount }}</td>

                                <td>
                                    {{-- @include('admin.section.buttons.button-edit') --}}
                                    {{-- <a href="{{ route('admin.transactions.view_payment',$row->transaction_key != null ? $row->transaction_key : $row->id) }}"><img src="{{ asset('images.png') }}" alt="" width="30"></a> --}}
                                    <a href="{{ route('admin.udhyog.'.$udhyogName.'.inventory.supplier_payment.index',$row->transaction_key != null ? $row->transaction_key : $row->id) }}"><img src="{{ asset('images.png') }}" alt="" width="30"></a>
                                    <a class="btn btn-primary btn-sm" href="{{ URL::route($_base_route.'.view_details', ['transaction_key' => $row->transaction_key != null ? $row->transaction_key : $row->id]) }}" style="cursor:pointer;"><i class="fa fa-eye"></i></i></a>
                                    <a href="{{ route('admin.inventory.suppliers.bill', $row->transaction_key) }}"><img src="{{ asset('billing.png') }}" alt="" width="25"></a>
                                    @include('admin.section.buttons.button-delete')


                                </td>
                            </tr>
                            @endforeach

                    </table>
                    @else
                    <p>माफ गर्नुहोला ! डाटा फेलापरेन !</p>
                    @endif
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

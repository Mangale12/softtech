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
{{-- {{ $data['row']->rawMaterials }} --}}
{{-- {{ dd($_base_route) }} --}}
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <section class="card">
            <header class="card-header">
                सप्लायर्स सुची
                <span class="tools pull-right d-flex">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>

            </header>

            <div class="card-body">
            <a href="{{ route('admin.payment.create',$data['transaction']->transaction_key) }}{{ !empty($data['udhyog']) ? ($data['udhyog'] != null ? '?udhyog='.$data['udhyog']['name'] : '') : '' }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right"><i class="fa fa-plus fa-sm text-white-50"></i> नयाँ बनाउनुहोस्</a>&nbsp;

                <div class="adv-table">

                    <table class="table table-bordered" id="item-table">

                        <thead>
                            <tr>
                                <th>क्र.स</th>
                                {{-- <th>पुरा नाम</th> --}}
                                {{-- <th>आपूर्ति मिति</th> --}}
                                {{-- <th>कुल भुक्तानी</th> --}}
                                {{-- <th>बाँकी भुक्तानी</th> --}}
                                <th>तिरीएको रकम</th>
                                <th>भुक्तानी मिति</th>
                                <th>भुक्तानी विधि</th>
                                <th>चेक साट्ने मिति</th>
                                <th class="hidden-phone">स्थिति</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($data['rows'] != null)
                            @foreach( $data['rows'] as $key=> $row)
                            <tr class="gradeX">
                                <td>{{ getUnicodeNumber($key+1) }}.</td>
                                <td>{{$row->amount}}</td>
                                <td>{{$row->payment_date}}</td>
                                <td>{{$row->payment_method}}</td>
                                <td>{{$row->check_clearance_date}}</td>
                                <td>
                                    @include('admin.section.buttons.button-edit')
                                    {{-- <a href="{{ route('admin.transactions.view_payment',$row->id) }}"><img src="{{ asset('images.png') }}" alt="" width="30"></a> --}}
                                    {{-- <a class="btn btn-primary btn-sm" href="{{ URL::route('admin.inventory.suppluer.view', ['id' => $row->id]) }}" style="cursor:pointer;"><i class="fa fa-eye"></i></i></a> --}}
                                    @include('admin.section.buttons.button-view')
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

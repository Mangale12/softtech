@extends('layouts.admin')
@section('title', 'उत्पादन')
@section('css')

<style>
    .dot {
      height: 25px;
      width: 25px;
      background-color: red;
      border-radius: 50%;
      display: inline-block;
    }
    </style>
@endsection
@php
// Extract the udhyog name from the current URL
    preg_match('/admin\/udhyog\/([^\/]*)/', request()->path(), $matches);
    $udhyogName = $matches[1] ?? '';
@endphp
@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">
            <a href="{{ route('admin.udhyog.'.$udhyogName.'.inventory.products.index') }}?udhyog={{ request()->udhyog }}" class="d-none d-sm-inline-block btn btn-sm shadow-sm {{ ($_panel == 'Inventory Product') ? 'btn-warning' : 'btn-primary' }}"><i class="fa fa-gear fa-sm text-white-50"></i> उत्पादन</a>&nbsp;
            <a href="{{route('admin.udhyog.'.$udhyogName.'.inventory.raw_materials.inventory')}}?udhyog={{ request()->udhyog }}" class="d-none d-sm-inline-block btn btn-sm shadow-sm btn-primary"><i class="fa fa-gear"></i> कच्चा पद्दार्थ</a>&nbsp;
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <section class="card">
            <header class="card-header">
                उत्पादन सुची
                <span class="tools pull-right d-flex">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
                <br>

            </header>

            <div class="card-body">
                {{-- <a href="{{route( 'admin.udhyog.'.$udhyogName.'.inventory.products.create' )}}?udhyog={{ request()->udhyog }}" class=" pull-right d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus fa-sm text-white-50"></i> नयाँ बनाउनुहोस्</a>&nbsp; --}}
                <div class="adv-table">
                    <table class="table table-bordered" id="item-table">
                        <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>नाम</th>
                                <th>स्टक मात्रा</th>
                                <th>ब्याच नं</th>
                                <th>एकाइ</th>
                                <th>एकाइ मूल्य</th>
                                <th>म्याद सकिने मिति</th>

                                <th class="hidden-phone">स्थिति</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($data['rows']) != 0)
                            @foreach( $data['rows'] as $key=> $row)
                            <tr class="gradeX">
                                <td>{{ getUnicodeNumber($key+1) }}.</td>
                                <td>{{$row->productionBatch->inventoryProduct->name}}</td>
                                <td>{{getUnicodeNumber($row->quantity_produced)}}</td>
                                <td>{{getUnicodeNumber($row->productionBatch->batch_no)}}</td>
                                <td>{{ $row->productionBatch->inventoryProduct->unit->name }}</td>
                                <td>{{ $row->productionBatch->inventoryProduct->price }}</td>
                                <td>{{$row->productionBatch->expiry_date}}</td>
                                <td><span class="dot"></span></td>
                                {{-- <td>
                                    @include('admin.section.buttons.button-edit')
                                    @include('admin.section.buttons.button-delete')

                                </td> --}}
                            </tr>
                            @endforeach
                            @else
                            <p>माफ गर्नुहोला ! डाटा फेलापरेन !</p>
                            @endif
                    </table>
                </div>
                <div class="row">
                    @include('admin.section.load-time')
                    {{ $data['rows']->links('vendor.pagination.custom') }}
                </div>
            </div>
        </section>
    </div>

</div>
@endsection
@section('js')
@endsection

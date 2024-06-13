@extends('layouts.admin')
@section('title', 'क्षति अभिलेख')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endsection
@section('content')
@php
// Extract the udhyog name from the current URL
    preg_match('/admin\/udhyog\/([^\/]*)/', request()->path(), $matches);
    $udhyogName = $matches[1] ?? '';
@endphp
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">
            <a href="{{ route('admin.udhyog.'.$udhyogName.'.inventory.products.low_stock') }}?udhyog={{ request()->udhyog }}" class="d-none d-sm-inline-block btn btn-sm shadow-sm {{ ($_panel == 'Low Stock Product') ? 'btn-warning' : 'btn-primary' }}"><i class="fa fa-gear fa-sm text-white-50"></i> उत्पादन </a>&nbsp;
            <a href="{{route('admin.udhyog.'.$udhyogName.'.inventory.raw_materials.low_stock')}}?udhyog={{ request()->udhyog }}" class="d-none d-sm-inline-block btn btn-sm shadow-sm {{ ($_panel == 'Low Stock Raw Material') ? 'btn-warning' : 'btn-primary' }}"><i class="fa fa-gear"></i> कच्चा पदार्थ </a>&nbsp;
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-8 col-sm-12">
        <section class="card">
            <header class="card-header">
                कम स्टक
                <span class="tools pull-right d-flex">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="card-body">
                <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="dynamic-table">
                        <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>नाम</th>
                                <th>संख्या</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($data['rows']) != 0)
                            @foreach( $data['rows'] as $key=> $row)
                            <tr class="gradeX">
                                <td>{{ getUnicodeNumber($key+1) }}.</td>
                                <td>{{request()->is('admin/inventory/products/low-stock') ? $row->name : $row->rawMaterial->name}}</td>
                                <td>{{$row->stock_quantity}}</td>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
@endsection

@extends('layouts.admin')
@section('title', 'कामदार प्रकार')
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
            <a href="{{ route('admin.udhyog.hybridbiu.inventory.seed_batch.inventory') }}" class="d-none d-sm-inline-block btn btn-sm shadow-sm {{ (request()->is('admin/udhyog/hybridbiu/inventory/seed-batch/inventory')) ? 'btn-warning' : 'btn-primary' }}"><i class="fa fa-gear fa-sm text-white-50"></i>उत्पादन बिउ</a>&nbsp;
            <a href="{{route('admin.udhyog.hybridbiu.inventory.khadhyanna.inventory')}}" class="d-none d-sm-inline-block btn btn-sm shadow-sm btn-primary"><i class="fa fa-gear"></i>खाद्यान्न</a>&nbsp;
            <a href="{{ route('admin.udhyog.hybridbiu.inventory.seeds.inventory') }}" class="d-none d-sm-inline-block btn btn-sm shadow-sm {{ (request()->is('admin/udhyog/hybridbiu/inventory/seeds/inventory')) ? 'btn-warning' : 'btn-primary' }}"><i class="fa fa-gear fa-sm text-white-50"></i>बिउ</a>&nbsp;

        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-8 col-sm-12">
        <section class="card">
            <header class="card-header">
                बिउ
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
                                <th>बिउ</th>
                                <th>बिउको प्रकार </th>
                                <th>एकाई </th>
                                <th> जम्मा संख्या </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($data['rows']) != 0)
                            @foreach( $data['rows'] as $key=> $row)
                            <tr class="gradeX">
                                <td>{{ getUnicodeNumber($key+1) }}.</td>
                                {{-- {{ dd($row->seed) }} --}}
                                <td>{{$row->seed_id != null ? $row->seed->seed_name : null}}</td>
                                <td>{{$row->seed_id != null ? $row->seed->seedType->name : null}}</td>
                                <td>{{$row->unit_id != null ? $row->unit->name : null}}</td>

                                <td>{{ getUnicodeNumber($row['stock_quantity']) }} </td>
                            </tr>
                            @endforeach
                            @else
                            <h6>डाटा छैन !</h6>
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

@extends('layouts.admin')
@section('title', 'कामदार पद')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endsection
@section('content')
@php
    if(request()->is('admin/udhyog/achar/workers*')){
        $worker_type_route = $_base_route.'.workerstype';
        $worker_position_route = $_base_route.'.workersposition';
        $worker_list_route = $_base_route.'.workerslist';
        $_base_route = 'admin.worker-position';
        // dd($url);
    }else if(request()->is('admin/udhyog/aluchips/workers*')){
        // dd($_base_route);
        $worker_type_route = $_base_route.'.workerstype';
        $worker_position_route = $_base_route.'.workersposition';
        $worker_list_route = $_base_route.'.workerslist';
        $_base_route = 'admin.worker-position';
        // dd($url);
    }else if(request()->is('admin/udhyog/dudh/workers*')){
        // dd($_base_route);
        $worker_type_route = $_base_route.'.workerstype';
        $worker_position_route = $_base_route.'.workersposition';
        $worker_list_route = $_base_route.'.workerslist';
        $_base_route = 'admin.worker-position';
        // dd($url);
    }else if(request()->is('admin/udhyog/papad/workers*')){
        // dd($_base_route);
        $worker_type_route = $_base_route.'.workerstype';
        $worker_position_route = $_base_route.'.workersposition';
        $worker_list_route = $_base_route.'.workerslist';
        $_base_route = 'admin.worker-position';
        // dd($url);
    }else if(request()->is('admin/udhyog/hybridbiu/workers*')){
        // dd($_base_route);
        $worker_type_route = $_base_route.'.workerstype';
        $worker_position_route = $_base_route.'.workersposition';
        $worker_list_route = $_base_route.'.workerslist';
        $_base_route = 'admin.worker-position';
        // dd($url);
    }else {
        $worker_type_route = 'admin.worker-types';
        $worker_position_route = 'admin.worker-position';
        $worker_list_route = 'admin.worker-list';
    }
@endphp
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">

            <a href="{{ route($worker_type_route.'.index') }}" class="d-none d-sm-inline-block btn btn-sm shadow-sm {{ ($_panel == 'Worker Types' || $_panel == 'Udhyog Achar Workers Type') ? 'btn-warning' : 'btn-primary' }}"><i class="fa fa-gear fa-sm text-white-50"></i> कामदार प्रकार</a>&nbsp;
            <a href="{{route($worker_position_route.'.index')}}" class="d-none d-sm-inline-block btn btn-sm shadow-sm {{ ($_panel == 'Worker Position' || $_panel == 'Udhyog Achar Workers Position' || $_panel == 'Udhyog Aluchips Workers Position' || $_panel == 'Udhyog Dudh Workers Position' || $_panel == 'Udhyog Papad Workers Position' || $_panel == 'Udhyog Hybrid Biu Workers Position') ? 'btn-warning' : 'btn-primary' }}"><i class="fa fa-gear"></i> कामदार पद </a>&nbsp;
            <a href="{{route( $worker_list_route.'.index' )}}" class="d-none d-sm-inline-block btn btn-sm shadow-sm {{ ($_panel == 'Worker List') ? 'btn-warning' : 'btn-primary' }}"><i class="fa fa-gear"></i> कामदार सूची </a>&nbsp;
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <section class="card">
            <header class="card-header">
                कामदार पद
                <span class="tools pull-right d-flex">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
                <a href="{{route( $worker_position_route.'.create' )}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm pull-right"><i class="fa fa-plus fa-sm text-white-50"></i>&nbsp;नयाँ बनाउनुहोस्</a>&nbsp;
            </header>
            <div class="card-body">
                <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="dynamic-table">
                        <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>कामदार प्रकार</th>
                                <th>पद</th>
                                <th>तलब</th>
                                <th>भत्ता</th>
                                <th class="hidden-phone">स्थिति</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($data['rows']) != 0)
                            @foreach( $data['rows'] as $key=> $row)
                            <tr class="gradeX">
                                <td>{{ getUnicodeNumber($key+1) }}.</td>
                                <td>@if(isset($row->WorkerTypes)) {{ $row->WorkerTypes->types  }} @endif</td>
                                <td>{{$row->position}}</td>
                                <td>{{$row->salary}}</td>
                                <td>{{$row->bhatta}}</td>
                                <td>
                                    @include('admin.section.buttons.button-edit')
                                    @include('admin.section.buttons.button-delete')
                                </td>
                            </tr>@if(isset($row->ParentCategory)) {{ $row->ParentCategory->title  }} @endif
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

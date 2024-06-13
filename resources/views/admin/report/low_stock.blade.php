@extends('layouts.admin')
@section('title', 'क्षति अभिलेख')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endsection
@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">

            <a href="{{ route($_base_route.'.index') }}" class="d-none d-sm-inline-block btn btn-sm shadow-sm {{ ($_panel == 'Damage Product') ? 'btn-warning' : 'btn-primary' }}"><i class="fa fa-gear fa-sm text-white-50"></i> उत्पादनको क्षति </a>&nbsp;
            <a href="{{route($_base_route.'.index')}}?damage_item=raw material" class="d-none d-sm-inline-block btn btn-sm shadow-sm {{ ($_panel == 'Damage Raw Material') ? 'btn-warning' : 'btn-primary' }}"><i class="fa fa-gear"></i> कच्चा पदार्थको क्षति </a>&nbsp;
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-8 col-sm-12">
        <section class="card">
            <header class="card-header">
                क्षति अभिलेख
                <span class="tools pull-right d-flex">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
                <a href="{{route( $_base_route.'.create' ) }}{{ $data['damage_item'] == 'raw material' ? '?damage_item=raw material' : ''}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm pull-right"><i class="fa fa-plus fa-sm text-white-50"></i>&nbsp;नयाँ बनाउनुहोस्</a>&nbsp;
            </header>
            <div class="card-body">
                <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="dynamic-table">
                        <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>नाम</th>
                                <th>क्षतिको कारण</th>
                                <th>क्षतिको संख्या</th>
                                <th>क्षतिको मिति</th>
                                <th>रिपोर्ट</th>
                                <th class="hidden-phone">स्थिति</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($data['rows']) != 0)
                            @foreach( $data['rows'] as $key=> $row)
                            <tr class="gradeX">
                                <td>{{ getUnicodeNumber($key+1) }}.</td>
                                <td>{{ $data['damage_item'] == 'raw material' ? $row->getRawMaterial->name : $row->getProduct->name }}</td>
                                <td>{{ $row->damageType->type }}</td>
                                <td>{{$row->quantity_damaged}}</td>
                                <td>{{$row->damage_date}}</td>
                                <td>{{!empty($row->reported_by) ? $row->getUser()->name:null}}</td>
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

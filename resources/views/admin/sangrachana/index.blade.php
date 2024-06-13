@extends('layouts.admin')
@section('title', 'भौतिक संरचना')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endsection
@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">
            @can('create Physical structure')
            <a href="{{route( $_base_route.'.create' )}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus fa-sm text-white-50"></i> नयाँ बनाउनुहोस्</a>&nbsp;
            @endcan
            <a href="" onclick="refreshPage()" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fa fa-refresh"></i> रिफ्रेश गर्नुहोस्</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <section class="card">
            <header class="card-header">
            भौतिक संरचना सुची
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
                                <th>संरचना प्रकार</th>
                                <th>तल्ल</th>
                                <th>लम्बाई</th>
                                <th>चौडाई</th>
                                <th>क्षेत्रफल्</th>
                                <th>बनेको मिति</th>
                                <th>प्रयोगकर्ता </th>
                                <th class="hidden-phone">स्थिति</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($data['rows']) != 0)
                            @foreach( $data['rows'] as $key=> $row)
                            <tr class="gradeX">
                                <td>{{ getUnicodeNumber($key+1) }}.</td>
                                <td>{{$row->types}}</td>
                                <td>{{$row->bottom}}</td>
                                <td>{{$row->length}}</td>
                                <td>{{$row->width}}</td>
                                <td>{{$row->area}}</td>
                                <td>{{$row->made_date}}</td>
                                <th>{{$row->user}}</th>
                                <td>
                                    @can('edit Physical structure')
                                    @include('admin.section.buttons.button-edit')
                                    @endcan
                                    @can('delete Physical structure')
                                    @include('admin.section.buttons.button-delete')
                                    @endcan

                                </td>
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

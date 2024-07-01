@extends('layouts.admin')
@section('title', 'भूमिकाहरू')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endsection
@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        {{-- <div class="row">
            <a href="{{route( 'admin.roles.index')}}" class="d-none d-sm-inline-block btn btn-sm shadow-sm {{ ($_panel == 'Worker Types') ? 'btn-warning' : 'btn-primary' }}"><i class="fa fa-gear fa-sm text-white-50"></i> कामदार प्रकार</a>&nbsp;
            <a href="{{route( 'admin.worker-position.index')}}" class="d-none d-sm-inline-block btn btn-sm shadow-sm {{ ($_panel == 'Worker Position') ? 'btn-warning' : 'btn-primary' }}"><i class="fa fa-gear"></i> कामदार पद </a>&nbsp;
            <a href="{{route( 'admin.worker-list.index')}}" class="d-none d-sm-inline-block btn btn-sm shadow-sm {{ ($_panel == 'Worker List') ? 'btn-warning' : 'btn-primary' }}"><i class="fa fa-gear"></i> कामदार सूची </a>&nbsp;
        </div> --}}
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <section class="card">
            <header class="card-header">
                भूमिकाहरू
                <span class="tools pull-right d-flex">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
                <a href="{{route( $_base_route.'.create' )}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm pull-right"><i class="fa fa-plus fa-sm text-white-50"></i>&nbsp;नयाँ बनाउनुहोस्</a>&nbsp;
            </header>
            <div class="card-body">
                <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="dynamic-table">
                        <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>भूमिका</th>
                                <th class="hidden-phone">स्थिति</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($data['rows']) != 0)
                            @foreach( $data['rows'] as $key=> $row)
                            <tr class="gradeX">
                                <td>{{ getUnicodeNumber($key+1) }}.</td>
                                <td>{{$row->name}}</td>
                                <td>
                                    @include('admin.section.buttons.button-edit')
                                    @include('admin.section.buttons.button-delete')
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <h6>डाटा छैन !</h6>
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

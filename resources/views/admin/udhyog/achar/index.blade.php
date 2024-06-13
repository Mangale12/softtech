@extends('layouts.admin')
@section('title', 'उद्योग बिबरण')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<link href="{{ asset('assets/cms/assets/advanced-datatable/media/css/demo_page.css')}}" rel="stylesheet" />
<link href="{{ asset('assets/cms/assets/advanced-datatable/media/css/demo_table.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('assets/cms/assets/data-tables/DT_bootstrap.css')}}" />@endsection
@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">
            <a href="{{route( $_base_route.'.create' )}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus fa-sm text-white-50"></i> नयाँ बनाउनुहोस्</a>&nbsp;
            {{-- <a href="{{route( 'admin.product.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fa fa-gear"></i> उत्पादन</a> --}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-8 col-sm-12">
        <section class="card">
            <header class="card-header">
                उद्योग बिबरण सुची
                <span class="tools pull-right d-flex">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="card-body">
                <div class="adv-table">
                    <table class="table table-bordered" id="example-table">
                        <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>जमिन किसिम</th>
                                <th>गोदाम किसिम</th>
                                <th>औजार/उपकरण किसिम</th>
                                <th>सिचाई किसिम</th>
                                <th>इन्धन किसिम</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['rows'] as $row)
                            <tr class="gradeX">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row->name}}</td>

                                <td>
                                    @include('admin.section.buttons.button-edit')
                                    @include('admin.section.buttons.button-delete')
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
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
<!--dynamic table initialization -->
<script type="text/javascript" language="javascript" src="{{ asset('assets/cms/assets/advanced-datatable/media/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/cms/assets/data-tables/DT_bootstrap.js')}}"></script>
<script src="{{ asset('assets/cms/js/dynamic_table_init.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

@endsection

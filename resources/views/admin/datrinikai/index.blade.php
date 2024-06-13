@extends('layouts.admin')
@section('title', ' दात्रिनिकाय सहयोग')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<link href="{{ asset('assets/cms/assets/data-tables/DT_bootstrap.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection
@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">
            <a href="{{route( $_base_route.'.create' )}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus fa-sm text-white-50"></i> नयाँ बनाउनुहोस्</a>&nbsp;
        </div>
    </div>
</div>
<div style="justify-content: center">

</div>
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <section class="card">
            <header class="card-header">
                दात्रिनिकाय सहयोग सुची
                <span class="tools pull-right d-flex">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="card-body">
                <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="example-table">
                        <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>नाम</th>
                                <th>ठेगाना</th>
                                <th>फोन</th>
                                <th>रकम (रु.)</th>
                                <th>सहयोग</th>
                                <th>सहयोग बस्तु</th>
                                <th>संख्या</th>
                                <th class="hidden-phone">स्थिति</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($data['rows']->count() > 0)
                            @foreach($data['rows'] as $row)
                            <tr class="gradeX">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->address}}</td>
                                <td>{{$row->phone}}</td>
                                <td>{{$row->amount}}</td>
                                <td>{{$row->support}}</td>
                                <td>{{$row->support_item}}</td>
                                <td>{{$row->quantity}}</td>
                                <td>
                                    @include('admin.section.buttons.button-edit')
                                    @include('admin.section.buttons.button-delete')
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="9" class="text-center">कुनै डाटा भेटिएन</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

            </div>
        </section>
    </div>

</div>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="{{ asset('assets/cms/assets/data-tables/DT_bootstrap.js')}}"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

@endsection
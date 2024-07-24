@extends('layouts.admin')
@section('title', ' अनुदान')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endsection
@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">
            @can('cerate anudan')
            <a href="{{route( $_base_route.'.create' )}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus fa-sm text-white-50"></i> नयाँ बनाउनुहोस्</a>&nbsp;
            @endcan
            <a href="" onclick="refreshPage()" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fa fa-refresh"></i> रिफ्रेश गर्नुहोस्</a>
        </div>
        <a href="" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fa fa-trash-o fa-sm text-white-50"></i> रिसाइकलबिन</a>
    </div>
</div>
<div style="justify-content: center">
    <form class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="प्रकार" aria-label="Search">
        <input class="form-control mr-sm-2" type="search" placeholder="शीर्षक" aria-label="Search">
        <input class="form-control mr-sm-2" type="search" placeholder="रकम (रु.)" aria-label="Search">
        <input class="form-control mr-sm-2" type="search" placeholder="बिबरण" aria-label="Search">
        <input class="form-control mr-sm-2" type="search" placeholder="पटक" aria-label="Search">

        <button class="btn btn-sm btn-info my-2 my-sm-0" type="submit">खोजनुस</button>
    </form><br>
</div>
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <section class="card">
            <header class="card-header">
            अनुदान सुची
                <span class="tools pull-right d-flex">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
                <a href="{{ route('admin.anudaan.create') }}" class="float-right btn btn-primary">नयाँ अनुदान थप्नुहोस्</a>
            </header>
            <div class="card-body">
                <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="dynamic-table">
                        <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>प्रकार</th>
                                <th>शीर्षक</th>
                                <th>रकम (रु.)</th>
                                <th>बिबरण</th>
                                <th>पटक</th>
                                <th>दात्रिनिकाय सहयोग</th>
                                <th class="hidden-phone">स्थिति</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($data['rows']) != 0)
                            @foreach( $data['rows'] as $key=> $row)
                            <tr class="gradeX">
                                <td>{{ getUnicodeNumber($key+1) }}.</td>
                                <td>@if(isset($row->AnudaanCategory)) {{ $row->AnudaanCategory->title  }} @endif</td>
                                <td>{{ $row->title}}</td>
                                <td>{{ $row->amount}}</td>
                                <td>{{ $row->bibran}}</td>
                                <td>{{ $row->times}}</td>
                                <td>{{ $row->daatrinikay_sahayog}}</td>
                                <td>
                                    @include('admin.section.buttons.button-edit')
                                    @include('admin.section.buttons.button-delete')
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

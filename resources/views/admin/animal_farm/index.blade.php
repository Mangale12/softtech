@extends('layouts.admin')
@section('title', 'किसान खेतबारी बिबरण')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
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
    <form class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="नाम" aria-label="Search">
        <input class="form-control mr-sm-2" type="search" placeholder="मोबाइल" aria-label="Search">
        <input class="form-control mr-sm-2" type="search" id="dob" placeholder="जन्म मिति" aria-label="Search">
        <input class="form-control mr-sm-2" type="search" id="email" name="email" placeholder="इमेल" aria-label="Search">
        <button class="btn btn-sm btn-info my-2 my-sm-0" type="submit">खोजनुस</button>
    </form><br>
</div>
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <section class="card">
            <header class="card-header">
                किसान खेतबारी बिबरण
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
                                <th>ID </th>
                                <th>आर्थिक वर्ष</th>
                                <th>ब्लक</th>
                                <th>बाली हरु</th>
                                <th>जग्गा </th>
                                <th>महिना देखि</th>
                                <th>सम्म</th>
                                <th>मिति देखि</th>
                                <th>सम्म</th>
                                <th class="hidden-phone">स्थिति</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($data['rows']) != 0)
                            @foreach( $data['rows'] as $key=> $row)
                            <tr class="gradeX">
                                <td>{{ getUnicodeNumber($key+1) }}. </td>
                               
                                <td>
                                    <a href="{{ URL::route($_base_route.'.view', ['id' => $row->id]) }}">
                                        <button class="btn btn-primary btn-sm m-r-5" data-toggle="tooltip" data-original-title="Edit" style="cursor: pointer;"><i class="fa fa-bars font-14"></i> बिबरण</button></a>
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
<script src="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/js/nepali.datepicker.v3.7.min.js')}}" type="text/javascript"></script>

@endsection
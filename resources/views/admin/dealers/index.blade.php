@extends('layouts.admin')
@section('title', 'डिलर')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<!--dynamic table-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

@endsection
@php
// Extract the udhyog name from the current URL
    preg_match('/admin\/udhyog\/([^\/]*)/', request()->path(), $matches);
    $udhyogName = $matches[1] ?? '';
@endphp
@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">
            <a href="{{route( $_base_route.'.create' )}}?udhyog={{ request()->udhyog }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus fa-sm text-white-50"></i> नयाँ बनाउनुहोस्</a>&nbsp;
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <section class="card">
            <header class="card-header">
                डिलर सुची
                <span class="tools pull-right d-flex">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="card-body">
                <div class="adv-table">
                    <table class="table table-bordered" id="item-table">
                        <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>डिलर नाम</th>
                                <th>इमेल</th>
                                <th>फोन</th>
                                <th>ठेगाना</th>
                                <th class="hidden-phone">स्थिति</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($data['rows']) != 0)
                            @foreach( $data['rows'] as $key=> $row)
                            <tr class="gradeX">
                                <td>{{ getUnicodeNumber($key+1) }}.</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->phone}}</td>
                                <td>{{$row->address}}</td>

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

<!--dynamic table-->
<!-- Additional scripts as needed -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.2/css/buttons.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.1.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.1.2/js/buttons.html5.min.js"></script>

<script>
    $(document).ready(function() {
        var table = $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            searching: false,
            paging: false, // Disable pagination

            ajax: "{{ route('admin.fiscal.getData') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'fiscal_np',
                    name: 'fiscal_np'
                },
                {
                    data: 'fiscal_en',
                    name: 'fiscal_en'
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return '<a href="{{ url("/admin/fiscal/edit") }}/' + row.id + '" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> </a> <button id="delete" data-id="' + row.id + '" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete" data-url="{{ url("/admin/fiscal/destroy") }}/' + row.id + '" style="cursor:pointer;"><i class="fa fa-trash-o "></i></button>';
                    },

                    orderable: false,
                    searchable: false

                },

            ],


        });

    });
</script> -->

@endsection

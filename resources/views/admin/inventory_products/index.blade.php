@extends('layouts.admin')
@section('title', 'उत्पादन')
@section('css')
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
            {{-- <a href="{{ route('admin.udhyog.'.$udhyogName.'.inventory.products.index') }}?udhyog={{ request()->udhyog }}" class="d-none d-sm-inline-block btn btn-sm shadow-sm {{ ($_panel == 'Inventory Product') ? 'btn-warning' : 'btn-primary' }}"><i class="fa fa-gear fa-sm text-white-50"></i> उत्पादन</a>&nbsp; --}}
            {{-- <a href="{{route('admin.udhyog.'.$udhyogName.'.inventory.raw_materials.inventory')}}?udhyog={{ request()->udhyog }}" class="d-none d-sm-inline-block btn btn-sm shadow-sm btn-primary"><i class="fa fa-gear"></i> कच्चा पद्दार्थ</a>&nbsp; --}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <section class="card">
            <header class="card-header">
                उत्पादन सुची
                <span class="tools pull-right d-flex">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
                <br>

            </header>

            <div class="card-body">
                <a href="{{route( 'admin.udhyog.'.$udhyogName.'.inventory.products.create' )}}?udhyog={{ request()->udhyog }}" class=" pull-right d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus fa-sm text-white-50"></i> नयाँ बनाउनुहोस्</a>&nbsp;
                <div class="adv-table">
                    <table class="table table-bordered" id="products-table">
                        <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>नाम</th>
                                <th>स्टक मात्रा</th>
                                {{-- <th>एकाइ मूल्य</th>
                                <th>एकाइ</th> --}}
                                <th class="hidden-phone">स्थिति</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Table rows will be dynamically loaded by DataTables -->
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script>
    var jq = $.noConflict();

    // Function to convert numbers to Nepali script (simplified example)
    function toNepaliNumber(num) {
        var nepaliNumbers = ['०', '१', '२', '३', '४', '५', '६', '७', '८', '९'];
        return num.toString().split('').map(digit => nepaliNumbers[digit] || digit).join('');
    }

    jq(document).ready(function() {
        var table = jq('#products-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('admin.inventory.products.datatables') }}",
                data: function(d) {
                    d.udhyog = '{{ request()->udhyog }}'; // Pass udhyogName parameter to server
                }
            },
            columns: [
                {
                    data: null,
                    render: function (data, type, row, meta) {
                        return toNepaliNumber(meta.row + 1); // Convert row count to Nepali numerals
                    },
                    orderable: false,
                    searchable: false,
                    width: "5%" // Adjust width as needed
                },
                { data: 'name', name: 'name', searchable: true },
                { data: 'stock_quantity', name: 'stock_quantity', searchable: true },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ],
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Nepali.json"
            },
            initComplete: function () {
                // Check if pagination is greater than one
                if (this.api().page.info().pages > 1) {
                    console.log('gretar than one');
                    jq('.dataTables_paginate').show(); // Show pagination controls
                } else {
                    console.log('less than one');
                    jq('.dataTables_paginate').hide(); // Hide pagination controls
                }
            }
        });

        // Debugging: Log DataTable search input to the console
        table.on('search.dt', function() {
            var searchValue = table.search();
            console.log('Searching for:', searchValue);
        });
    });
</script>
@endsection

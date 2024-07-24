@extends('layouts.admin')
@section('title', 'कच्चा पथार्थ सुची')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

@endsection
@section('content')
@php
// Extract the udhyog name from the current URL
    preg_match('/admin\/udhyog\/([^\/]*)/', request()->path(), $matches);
    $udhyogName = $matches[1] ?? '';
@endphp
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">
            <a href="{{ route('admin.udhyog.'.$udhyogName.'.inventory.products.index') }}?udhyog={{ request()->udhyog }}" class="d-none d-sm-inline-block btn btn-sm shadow-sm {{ ($_panel == 'Inventory Product') ? 'btn-warning' : 'btn-primary' }}"><i class="fa fa-gear fa-sm text-white-50"></i> उत्पादन</a>&nbsp;
            <a href="{{route('admin.udhyog.'.$udhyogName.'.inventory.raw_materials.inventory')}}?udhyog={{ request()->udhyog }}" class="d-none d-sm-inline-block btn btn-sm shadow-sm btn-primary"><i class="fa fa-gear"></i> कच्चा पद्दार्थ</a>&nbsp;

        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-8 col-sm-12">
        <section class="card">
            <header class="card-header">
                कच्चा पथार्थ सुची
                <span class="tools pull-right d-flex">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="card-body">
                <div class="adv-table">
                    <table class="table table-bordered" id="raw-material-inventory-table">
                        <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>कच्चा पद्दार्थ</th>
                                <th> जम्मा संख्या </th>
                                <th> एकाई </th>
                            </tr>
                        </thead>

                        <tbody>

                        </tbody>
                    </table>
                </div>

            </div>
        </section>
    </div>
</div>
@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    var jq = $.noConflict();

    // Function to convert numbers to Nepali script (simplified example)
    function toNepaliNumber(num) {
        var nepaliNumbers = ['०', '१', '२', '३', '४', '५', '६', '७', '८', '९'];
        return num.toString().split('').map(digit => nepaliNumbers[digit] || digit).join('');
    }

    jq(document).ready(function() {
        var table = jq('#raw-material-inventory-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('admin.inventory.raw_materials.datatables') }}",
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
                { data: 'name', name: 'total_amount', searchable: true },
                { data: 'stock_quantity', name: 'order_date', searchable: true },
                { data: 'unit.name', name: 'unit.name', searchable: true },

            ],
            pageLength: 10,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Nepali.json"
            },
            initComplete: function () {
                // Check if pagination is greater than one
                if (this.api().page.info().pages > 1) {
                    jq('.dataTables_paginate').show(); // Show pagination controls
                } else {
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

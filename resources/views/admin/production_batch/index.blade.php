@extends('layouts.admin')
@section('title', 'उत्पादन ब्याच')
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
                उत्पादन ब्याच
                <span class="tools pull-right d-flex">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="card-body">
                <div class="adv-table">
                    <table class="table table-bordered" id="production-batch">
                        <thead>
                            <tr>
                                 <th>क्र.स</th>
                                <th>ब्याच नं. </th>
                                <th>उत्पादन नाम</th>
                                <th>उत्पादन मिति</th>
                                <th>उत्पादन मात्रा</th>
                                <th>स्टक मात्रा</th>
                                {{-- <th>कच्चा पदार्थ प्रयोग</th> --}}
                                <th>म्याद सकिने मिति</th>
                                <th class="hidden-phone">स्थिति</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($data['rows']) != 0)
                            @foreach( $data['rows'] as $key=> $row)
                            {{-- <tr class="gradeX">
                                <td>{{ getUnicodeNumber($key+1) }}.</td>
                                <td>{{$row->batch_no}}</td>
                                <td>{{$row->inventory_product_id ? $row->inventoryProduct->name : ""}}</td>
                                <td>{{getUnicodeNumber($row->production_date)}}</td>
                                <td>{{ getUnicodeNumber($row->quantity_produced) }}</td>
                                <td>{{getUnicodeNumber($row->rawMaterialsUsed($row->id))}}</td>
                                <td>{{getUnicodeNumber($row->expiry_date)}}</td>
                                <td>
                                    @include('admin.section.buttons.button-edit')
                                    @include('admin.section.buttons.button-production-batch-report')
                                    @include('admin.section.buttons.button-delete')
                                </td>
                            </tr> --}}
                            @endforeach
                            @else
                            <p>माफ गर्नुहोला ! डाटा फेलापरेन !</p>
                            @endif
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
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    var jq = $.noConflict();

    // Function to convert numbers to Nepali script (simplified example)
    function toNepaliNumber(num) {
        var nepaliNumbers = ['०', '१', '२', '३', '४', '५', '६', '७', '८', '९'];
        return num.toString().split('').map(digit => nepaliNumbers[digit] || digit).join('');
    }

    jq(document).ready(function() {
        var table = jq('#production-batch').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('admin.inventory.production_batch.datatables') }}",
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

                { data: 'batch_no', name: 'batch_no', searchable: true },
                { data: 'inventory_product.name', name: 'inventory_product.name', searchable: true },
                { data: 'production_date', name: 'production_date', searchable: true },
                { data: 'quantity_produced', name: 'quantity_produced', searchable: true },
                { data: 'stock_quantity', name: 'stock_quantity', searchable: true },
                // { data: 'raw_materials_used', name: 'raw_materials_used', orderable: false, searchable: false },
                { data: 'expiry_date', name: 'expiry_date', searchable: false },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ],
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Nepali.json"
            },
            // initComplete: function () {
            //     // Check if pagination is greater than one
            //     if (this.api().page.info().pages > 1) {
            //         jq('#supplier-table_paginate').show(); // Show pagination controls
            //     } else {
            //         jq('#supplier-table_paginate').hide(); // Hide pagination controls
            //     }
            // }
        });

        // Debugging: Log DataTable search input to the console
        table.on('search.dt', function() {
            var searchValue = table.search();
            console.log('Searching for:', searchValue);
        });
    });
</script>
@endsection

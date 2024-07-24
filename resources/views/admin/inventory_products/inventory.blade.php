@extends('layouts.admin')
@section('title', 'उत्पादन')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

@section('css')

<style>
    .dot-expiring {
      height: 25px;
      width: 25px;
      background-color: rgb(255, 217, 0);
      border-radius: 50%;
      display: inline-block;
    }
    .dot-expired {
      height: 25px;
      width: 25px;
      background-color: red;
      border-radius: 50%;
      display: inline-block;
    }
    .dot-normal{
        height: 25px;
        width: 25px;
        background-color: rgb(61, 139, 5);
        border-radius: 50%;
        display: inline-block;
    }
</style>
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
            <a href="{{ route('admin.udhyog.'.$udhyogName.'.inventory.products.index') }}?udhyog={{ request()->udhyog }}" class="d-none d-sm-inline-block btn btn-sm shadow-sm {{ ($_panel == 'Inventory Product') ? 'btn-warning' : 'btn-primary' }}"><i class="fa fa-gear fa-sm text-white-50"></i> उत्पादन</a>&nbsp;
            <a href="{{route('admin.udhyog.'.$udhyogName.'.inventory.raw_materials.inventory')}}?udhyog={{ request()->udhyog }}" class="d-none d-sm-inline-block btn btn-sm shadow-sm btn-primary"><i class="fa fa-gear"></i> कच्चा पद्दार्थ</a>&nbsp;
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
                {{-- <a href="{{route( 'admin.udhyog.'.$udhyogName.'.inventory.products.create' )}}?udhyog={{ request()->udhyog }}" class=" pull-right d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus fa-sm text-white-50"></i> नयाँ बनाउनुहोस्</a>&nbsp; --}}
                <div class="adv-table">
                    <table class="table table-bordered" id="inventory-table">
                        <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>नाम</th>
                                <th>स्टक मात्रा</th>
                                <th>ब्याच नं</th>
                                <th>एकाइ</th>
                                <th>एकाइ मूल्य</th>
                                <th>उत्पादन मिति </th>
                                <th>म्याद सकिने मिति</th>
                                <th>समाप्त हुन बाँकी दिन</th>

                                <th class="hidden-phone">स्थिति</th>
                            </tr>
                        </thead>
                        {{-- <tbody>
                            @if(count($data['rows']) != 0)
                            @foreach( $data['rows'] as $key=> $row)
                            <tr class="gradeX">
                                <td>{{ getUnicodeNumber($key+1) }}.</td>
                                <td>{{$row->productionBatch->inventoryProduct->name}}</td>
                                <td>{{getUnicodeNumber($row->quantity_produced)}}</td>
                                <td>{{getUnicodeNumber($row->productionBatch->batch_no)}}</td>
                                <td>{{ $row->productionBatch->inventoryProduct->unit->name }}</td>
                                <td>{{ $row->productionBatch->inventoryProduct->price }}</td>
                                <td>{{$row->productionBatch->production_date}}</td>
                                <td>{{$row->productionBatch->expiry_date}}</td>
                                <td id="days-to-expired-{{ $row->productionBatch->batch_no }}"></td>
                                <td>
                                    <span class="dot" id="dot-color-{{ $row->productionBatch->batch_no }}">
                                </span></td>

                            @endforeach
                            @else
                            <p>माफ गर्नुहोला ! डाटा फेलापरेन !</p>
                            @endif
                        </tbody> --}}
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
        var table = jq('#inventory-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('admin.inventory.products.inventoryDataTable') }}",
                data: function(d) {
                    d.udhyog = '{{ request()->udhyog }}'; // Pass udhyogName parameter to server
                }
            },
            // columns: [
            //     {
            //         data: null,
            //         render: function (data, type, row, meta) {
            //             return toNepaliNumber(meta.row + 1); // Convert row count to Nepali numerals
            //         },
            //         orderable: false,
            //         searchable: false,
            //         width: "5%" // Adjust width as needed
            //     },
            //     { data: 'inventory_product.name', name: 'inventory_product.name', searchable: true },
            //     { data: 'stock_quantity', name: 'stock_quantity', searchable: true },
            //     { data: 'batch_no', name: 'batch_no', searchable: true },
            //     { data: 'unit.name', name: 'unit.name', searchable: true },
            //     { data: 'unit_price', name: 'unit_price', searchable: true },
            //     { data: 'production_date', name: 'production_date', searchable: true },
            //     { data: 'expiry_date', name: 'expiry_date', searchable: true },
            //     {
            //         data: null,
            //         createdCell: function (td, cellData, rowData, row, col) {
            //             $(td).attr('id', 'days-to-expired-' + rowData.productionBatch.batch_no);
            //         }
            //     },
            //     {
            //         data: null,
            //         createdCell: function (td, cellData, rowData, row, col) {
            //             $(td).html('<span class="dot" id="dot-color-' + rowData.productionBatch.batch_no + '"></span>');
            //         }
            //     }
            // ],
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
                    {
                        data: 'inventory_product.name',
                        name: 'inventory_product.name',
                        searchable: true
                    },
                    {
                        data: 'stock_quantity',
                        name: 'stock_quantity',
                        searchable: true
                    },
                    {
                        data: 'batch_no',
                        name: 'batch_no',
                        searchable: true
                    },
                    {
                        data: 'unit.name',
                        name: 'unit.name',
                        searchable: true
                    },
                    {
                        data: 'unit_price',
                        name: 'unit_price',
                        searchable: true
                    },
                    {
                        data: 'production_date',
                        name: 'production_date',
                        searchable: true
                    },
                    {
                        data: 'expiry_date',
                        name: 'expiry_date',
                        searchable: true
                    },
                    {
                        data: 'days_to_expiry',
                        name: 'days_to_expiry',
                        searchable: true,
                        // createdCell: function (td, cellData, rowData, row, col) {
                        //     $(td).attr('id', 'days-to-expired-' + rowData.batch_no);
                        // }
                    },
                    {
                        data: null,
                        createdCell: function (td, cellData, rowData, row, col) {
                            if (rowData.days_to_expiry < 5 ) {
                                $(td).html('<span class="dot-expired" id=""></span>');
                            }else if(rowData.days_to_expiry >= 5 && rowData.days_to_expiry <= 30 ) {
                                $(td).html('<span class="dot-expiring" id=""></span>');
                            }else if(rowData.days_to_expiry > 30){
                                $(td).html('<span class="dot-normal" id=""></span>');
                            }

                        }
                    }
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
        fetchExpiryAlertData();

        function updateDotColor(batch_number, daysUntilExpiry) {
            var dotElement = $('#dot-color-' + batch_number);


            // console.log( $('#days-to-expired-'+batch_number).html(daysUntilExpiry));
            // dotElement.removeClass('dot-normal dot-expiring dot-expired');

            if (daysUntilExpiry < 0) {
                console.log(daysUntilExpiry)
                dotElement.removeClass('dot');
                dotElement.addClass('dot-expired');
            } else if (daysUntilExpiry <= 20) {
                dotElement.removeClass('dot');
                dotElement.addClass('dot-expiring');
            } else {
                dotElement.addClass('dot-normal');
            }
        }

        // Ajax request to fetch expiry alert data
        function fetchExpiryAlertData() {
            $.ajax({
                url: "{{ route('admin.inventory.products.alert_product') }}?udhyog=achar",
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    if (response.status === 'success') {

                        var expiringProducts = response.data;

                        $.each(expiringProducts, function(index, product) {
                            $('#days-to-expired-' + product.batch_number).text(product.days_until_expiry);
                            // updateDotColor(product.batch_number, product.days_until_expiry);
                        });
                    } else {
                        console.error('Failed to fetch expiry alert data');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Ajax request error:', error);
                }
            });
        }
        setInterval(fetchExpiryAlertData, 5 * 60 * 1000); // 5 minutes
    });
</script>

@endsection

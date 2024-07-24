@extends('layouts.admin')
@section('title', 'बिक्री आदेश')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<!--dynamic table-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
@endsection
@section('content')
@php
// Extract the udhyog name from the current URL
    preg_match('/admin\/udhyog\/([^\/]*)/', request()->path(), $matches);
    $udhyogName = $matches[1] ?? '';
@endphp
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <section class="card">
            <header class="card-header">
                बिक्री आदेश
                <span class="tools pull-right d-flex">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
                <br>

            </header>

            <div class="card-body">
                <a href="{{route( $_base_route.'.create' )}}?udhyog={{ request()->udhyog }}" class=" pull-right d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus fa-sm text-white-50"></i> नयाँ बनाउनुहोस्</a>&nbsp;
                <div class="adv-table">
                    <table class="table table-bordered" id="sales-order-table">
                        <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>डिलर/व्यक्तिको नाम</th>
                                <th>कुल रकम</th>
                                <th>अर्डर मिति</th>
                                <th class="hidden-phone">स्थिति</th>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/js/nepali.datepicker.v3.7.min.js')}}" type="text/javascript"></script>
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
        var table = jq('#sales-order-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('admin.inventory.sales_orders.datatables') }}",
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
                { data: 'dealer.name', name: 'dealer.name', searchable: true },
                { data: 'total_amount', name: 'total_amount', searchable: true },
                { data: 'order_date', name: 'order_date', searchable: true },

                { data: 'action', name: 'action', orderable: false, searchable: false }
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

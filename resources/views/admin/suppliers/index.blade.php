@extends('layouts.admin')
@section('title', 'सप्लाइर्स')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
@endsection

@section('content')
<style>
    .dataTables_length{
        width: 20%;
        margin-bottom: -4rem;
    }
    /* Example CSS for DataTables pagination */
    .dataTables_wrapper .dataTables_paginate {
        margin-top: 10px;
        margin-bottom: 10px;
        text-align: center;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding: 5px 10px;
        margin: 0 2px;
        cursor: pointer;
        border: 1px solid #ccc;
        background-color: #f5f5f5;
        color: #333;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background-color: #ccc;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
        cursor: default;
        color: #777;
        background-color: #fff;
        border-color: #ccc;
    }

</style>
@php
// Extract the udhyog name from the current URL
preg_match('/admin\/udhyog\/([^\/]*)/', request()->path(), $matches);
$udhyogName = $matches[1] ?? '';
$udhyogName = '';
// dd($data['udhyog']);
@endphp
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">
            <a href="{{ route($_base_route.'.create') }}{{ !empty($data['udhyog']) ? ($data['udhyog'] != null ? '?udhyog='.$data['udhyog']['name'] : '') : '' }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fa fa-plus fa-sm text-white-50"></i> नयाँ बनाउनुहोस्
            </a>&nbsp;
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <section class="card">
            <header class="card-header">
                सप्लाइर्स सुची
                <span class="tools pull-right d-flex">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="card-body">
                <div class="adv-table">
                    <table class="table table-bordered" id="supplier-table">
                        <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>पुरा नाम</th>
                                <th>इमेल</th>
                                <th>फोन</th>
                                <th>ठेगाना</th>
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
        var table = jq('#supplier-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('admin.inventory.suppliers.datatables') }}",
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
                { data: 'email', name: 'email', searchable: true },
                { data: 'phone', name: 'phone', searchable: true },
                { data: 'address', name: 'address', searchable: true },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ],
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Nepali.json"
            },
            initComplete: function () {
                // Check if pagination is greater than one
                if (this.api().page.info().pages > 1) {
                    jq('#supplier-table_paginate').show(); // Show pagination controls
                } else {
                    jq('#supplier-table_paginate').hide(); // Hide pagination controls
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

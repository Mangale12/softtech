@extends('layouts.admin')
@section('title', 'चेतावनी उत्पादन')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<!--dynamic table-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

@endsection
@section('content')
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
</style>
{{-- <div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">
            <a href="{{route( $_base_route.'.create' )}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus fa-sm text-white-50"></i> नयाँ बनाउनुहोस्</a>&nbsp;
        </div>
    </div>
</div> --}}
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <section class="card">
            <header class="card-header">
                चेतावनी उत्पादन
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
                                <th>ब्याच नं. </th>
                                <th>उत्पादन नाम</th>
                                <th>उत्पादन मात्रा</th>
                                <th>स्टक मात्रा</th>
                                <th>उत्पादन मिति</th>
                                <th>म्याद सकिने मिति</th>
                                <th>म्याद सकिन बाँकी दिन</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($data['rows']) != 0)
                            @foreach( $data['rows'] as $key=> $row)
                            {{-- @dd($row) --}}
                            <tr class="gradeX">
                                <td>{{ getUnicodeNumber($key+1) }}.</td>
                                <td>{{ getUnicodeNumber($row['batch_number']) }}</td>
                                <td>{{ $row['product_name'] }}</td>
                                <td>{{ getUnicodeNumber($row['quantity_produced']) }}</td>
                                <td>{{ getUnicodeNumber($row['stock_quantity']) }}</td>
                                <td>{{getUnicodeNumber($row['production_date'])}}</td>
                                <td>{{getUnicodeNumber($row['expiration_date'])}}</td>
                                <td>{{ getUnicodeNumber($row['daysToExpire']) }}</td>

                                {{-- <td>
                                    <span class="dot" id="dot-color-{{ $key }}">
                                </span></td> --}}
                            </tr>
                            @endforeach
                            @else
                            <p>माफ गर्नुहोला ! डाटा फेलापरेन !</p>
                            @endif
                    </table>
                </div>
                <div class="row">
                    {{-- @include('admin.section.load-time') --}}
                    {{-- {{ $data['rows']->links('vendor.pagination.custom') }} --}}
                </div>
            </div>
        </section>
    </div>

</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        // Function to update dot color based on expiry alert
        function updateDotColor(key, daysUntilExpiry) {
            var dotElement = $('#dot-color-' + key);
            dotElement.removeClass('dot-normal dot-expiring dot-expired');

            if (daysUntilExpiry < 15) {
                dotElement.removeClass('dot');
                dotElement.addClass('dot-expired');
            } else if (daysUntilExpiry <= 30) {
                dotElement.removeClass('dot');
                dotElement.addClass('dot-expiring');
            } else {
                dotElement.addClass('dot-normal');
            }
        }

        // Ajax request to fetch expiry alert data
        function fetchExpiryAlertData() {
            $.ajax({
                url: "{{ route('admin.inventory.production_batch.alert_product') }}?udhyog=achar",
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        var expiringProducts = response.data;

                        $.each(expiringProducts, function(index, product) {
                            updateDotColor(index, product.days_until_expiry);
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

        // Call fetchExpiryAlertData initially
        fetchExpiryAlertData();

        // Refresh expiry alert data every 5 minutes (adjust as needed)
        setInterval(fetchExpiryAlertData, 5 * 60 * 1000); // 5 minutes
    });
</script>

@endsection

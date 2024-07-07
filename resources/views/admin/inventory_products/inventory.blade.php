@extends('layouts.admin')
@section('title', 'उत्पादन')
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
                    <table class="table table-bordered" id="item-table">
                        <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>नाम</th>
                                <th>स्टक मात्रा</th>
                                <th>ब्याच नं</th>
                                <th>एकाइ</th>
                                <th>एकाइ मूल्य</th>
                                <th>म्याद सकिने मिति</th>

                                <th class="hidden-phone">स्थिति</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($data['rows']) != 0)
                            @foreach( $data['rows'] as $key=> $row)
                            <tr class="gradeX">
                                <td>{{ getUnicodeNumber($key+1) }}.</td>
                                <td>{{$row->productionBatch->inventoryProduct->name}}</td>
                                <td>{{getUnicodeNumber($row->quantity_produced)}}</td>
                                <td>{{getUnicodeNumber($row->productionBatch->batch_no)}}</td>
                                <td>{{ $row->productionBatch->inventoryProduct->unit->name }}</td>
                                <td>{{ $row->productionBatch->inventoryProduct->price }}</td>
                                <td>{{$row->productionBatch->expiry_date}}</td>
                                <td>
                                    <span class="dot" id="dot-color-{{ $row->productionBatch->batch_no }}">
                                </span></td>
                                {{-- <td>
                                    @include('admin.section.buttons.button-edit')
                                    @include('admin.section.buttons.button-delete')

                                </td> --}}
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
<script>
    $(document).ready(function() {
        // Function to update dot color based on expiry alert
        function updateDotColor(batch_number, daysUntilExpiry) {
            var dotElement = $('#dot-color-' + batch_number);
            dotElement.removeClass('dot-normal dot-expiring dot-expired');

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
                            updateDotColor(product.batch_number, product.days_until_expiry);
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

@extends('layouts.admin')
@section('title', 'बिल')
@section('css')
<link href="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/css/nepali.datepicker.v3.7.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <h6><a href="#"><i class="fa fa-home"></i> होम /</a></h6>
                </li>&nbsp;
                <h6><a href="#">नयाँ बिल</a> </h6>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header" style="font-weight: bold;">
                नयाँ बिल
            </header>
            {{-- @dd($_base_route) --}}
            <form action="{{ route('admin.billing.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $data['row']->id }}" name="transaction_id">
                <div class="card-body">
                    <div class="row" style="font-weight: bold;">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="bill_no">बिल नं.</label> <br>
                                <input class="form-control rounded " type="text" id="bill_no" value=" {{ getUnicodeNumber($data['bill_no']) }}" name="bill_no" placeholder="बिल नं." readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="date">मिति</label> <br>
                                <input class="form-control rounded " type="text" id="date" value="{{$data['row']->transaction_date}}" name="date" placeholder="मिति" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="full_name">पुरा नाम</label> <br>
                                <input class="form-control rounded" type="text" id="full_name" value="{{ $data['row']->dealer->name }}" name="full_name" placeholder="पुरा नाम">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="address">ठेगाना</label> <br>
                                <input class="form-control rounded" type="text" id="address" value="{{ $data['row']->dealer->address }}" name="address" placeholder="ठेगाना">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="phone">फोन</label> <br>
                                <input class="form-control rounded" type="text" id="phone" value="{{ $data['row']->dealer->phone }}" name="phone" placeholder="फोन">
                            </div>
                        </div>
                        {{-- <div class="col-md-3">
                            <div class="form-group">
                                <label for="complete_status">भुक्तानी स्थिति</label> <br>
                                <select name="complete_status" id="complete_status" class="form-control select-two">
                                    <option value="">छान्नुहोस्</option>
                                    <option value="0">बाकि</option>
                                    <option value="1">भुक्तानी गरिएको</option>
                                </select>
                            </div>
                        </div> --}}
                        {{-- <div class="col-md-3">
                            <div class="form-group">
                                <label for="complete_status">क्रेताको करदाता नं. </label> <br>
                                <input class="form-control rounded" type="text" id="remarks" value="" name="remarks" placeholder=" करदाता नं.">
                             </div>
                        </div> --}}
                        {{-- <div class="col-md-3">
                            <div class="form-group">
                                <label for="remarks">टिप्पणी</label> <br>
                                <input class="form-control rounded" type="text" id="remarks" value="" name="remarks" placeholder="टिप्पणी">
                            </div>
                        </div> --}}
                    </div>
                </div>
                <table class="table table-bordered" id="item-table">
                    <thead>
                        <tr>
                            <th>क्र.स</th>
                            <th>उत्पादन</th>
                            <th>ब्याच नं</th>
                            <th>एकाई</th>
                            <th>मात्रा</th>
                            <th>एकाई मूल्य</th>
                            <th> जम्मा मूल्य </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($data['row']->sales_order != null)
                        @foreach( $data['row']->sales_order as $key=> $row)
                        <tr class="gradeX">
                            <td>{{ getUnicodeNumber($key+1) }}.</td>
                            <td>{{$row->product->name}}</td>
                            <td>{{$row->production_batch_id != null ? $row->productionBatch->batch_no : ''}}</td>
                            <td>{{$row->unit->name}}</td>
                            <td>{{$row->quantity}}</td>
                            <td>{{$row->unit_price}}</td>
                            <td>{{$row->total_cost}}</td>

                        </tr>

                        @endforeach
                        <tr>
                            <td colspan="6" align="right" class="font-weight-bold">उप कुल रकम</td>
                            <td class="font-weight-bold sub-total">{{ $data['row']->sales_order->sum('total_cost') }}</td>
                        </tr>
                        <tr>
                            <td colspan="6" align="right" class="font-weight-bold">छुट रकम</td>
                            <td class="font-weight-bold" style="width: 10rem"><input class="form-control discount-amount" type="text" value="0" name="discount"  ></td>
                        </tr>
                        <tr>
                            <td colspan="6" align="right" class="font-weight-bold">कर योग्य रकम</td>
                            <td class="font-weight-bold" style="width: 15rem"><input class="form-control taxable-amount" type="text" value="0" name="taxable_amount" ></td>
                        </tr>
                        <tr>
                            <td colspan="6" align="right" class="font-weight-bold">कूल जम्मा रकम</td>
                            <td class="font-weight-bold" style="width: 15rem"><input class="form-control total-amount" type="text" value="0" name="total_amount" readonly></td>
                        </tr>

                        @else
                        <p>माफ गर्नुहोला ! डाटा फेलापरेन !</p>
                        @endif
                </table>
                <!-- Begin Progress Bar Buttons-->
                <div class="form-group pull-right">
                    <a href="{{ route($_base_route.'.index')}}" class="btn btn-danger btn-sm "><i class="fa fa-undo"></i> पछाडि फर्कनुहोस्</a>
                    <button class="btn btn-success btn-sm " type="submit" style="cursor: pointer;"><i class="fa fa-save"></i> सुरक्षित गर्नुहोस् </button>
                </div>
                <!-- End Progress Bar Buttons-->
            </form>
        </section>
    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/js/nepali.datepicker.v3.7.min.js')}}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script>
    $(document).ready(function() {
        /***************************NepaliDate picker *********************/
        $("#date").nepaliDatePicker({
            ndpYear: true,
            ndpMonth: true,
            ndpYearCount: 1000,
            // unicodeDate: true,
        });
        //get baali_cat
        $('#udhyog_id').change(function() {
            var udhyog_id = this.value;
            // alert(idapplicant);
            $("#product_id").html('');
            var url = "{{route('getProduct')}}";
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    udhyog_id: udhyog_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result) {
                    //debugger;
                    // console.log(result.product);
                    $('#product_id').html('<option value="">-- छान्नुहोस् --</option>');
                    $.each(result.product, function(key, value) {
                        $('#product_id').append('<option value="' + value.id + '">' + value.title + '</option>');
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).on('click', '.js-sw-row-add', function() {
        $('.mynewsofttable').append();
        var data = $('.mynewsofttable').find('tr.soft-multyfield:last').clone();
        data.find('input').val('');
        $('.mynewsofttable').append(data);
    });
    $(document).on('click', '.js-sw-row-delete', function() {
        if ($('.soft-multyfield').length > 1)
            $('.mynewsofttable').find('tr.soft-multyfield:last').remove();
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const subTotal = parseFloat(document.querySelector('.sub-total').textContent) || 0;
        const discountInput = document.querySelector('.discount-amount');
        const taxableInput = document.querySelector('.taxable-amount');
        const totalInput = document.querySelector('.total-amount');

        function calculateTotal() {
            const discount = parseFloat(discountInput.value) || 0;
            const taxableAmount = parseFloat(taxableInput.value) || 0;
            const total = subTotal - discount + taxableAmount;
            totalInput.value = total.toFixed(2);
        }

        discountInput.addEventListener('input', calculateTotal);
        taxableInput.addEventListener('input', calculateTotal);

        calculateTotal(); // Initial calculation
    });
    </script>
@include('admin.section.toast_message')
@endsection

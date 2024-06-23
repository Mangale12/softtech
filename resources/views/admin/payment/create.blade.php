@extends('layouts.admin')
@section('title', 'लेखा शीर्षक')
@section('content')
@php
// Extract the udhyog name from the current URL
    preg_match('/admin\/udhyog\/([^\/]*)/', request()->path(), $matches);
    $udhyogName = $matches[1] ?? '';
    if($udhyogName == 'aluchips'){
        $udhyogName = "alu chips";
    }elseif ($udhyogName == "hybridbiu") {
        $udhyogName = "hybrid biu";
    }
@endphp
<link href="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/css/nepali.datepicker.v3.7.min.css')}}" rel="stylesheet" />

<div class="row">
    <div class="col-lg-8">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">लेखा शीर्षक</a></li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        {{-- {{ dd($_base_route) }} --}}
        <form action="{{ route($_base_route.'.store')}}" method="POST" enctype="multipart/form-data">
            <section class="card">
                <header class="card-header">
                    लेखा शीर्षक
                </header>
                <div class="card-body">
                    @csrf
                    <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">
                    <div class="row">
                        <table class="table table-bordered" id="dynamicTable">
                            <tr>
                                <th>नाम</th>
                                <th>आपूर्ति मिति</th>
                                {{-- <th>लेनदेन प्रकार </th> --}}
                                <th>कुल रकम </th>
                                <th>तिरीएको रकम </th>
                                <th>बाँकी रकम</th>
                                {{-- <th>लेनदेन मिति</th> --}}

                            </tr>
                            {{-- {{ dd($transaction->supplier) }} --}}

                            <tr>
                                @if($transaction->supplier != null)
                                <td style="width:20rem">
                                    <input type="text" value="{{ $transaction->supplier->name }}" class="form-control" readonly />
                                </td>
                                @elseif ($transaction->dealer != null)
                                <td style="width:20rem">
                                    <input type="text" value="{{ $transaction->dealer->name }}" class="form-control" readonly />
                                </td>
                                @endif


                                <td style="width:20rem">
                                    <input type="email" value="{{ $transaction->transaction_date }}" class="form-control" readonly/>
                                </td>

                                <td style="width:20rem">
                                    <input type="text" value="{{ $transaction->total_amount }}" class="form-control" readonly/>

                                </td>
                                <td style="width:20rem">
                                    <input type="text" value="{{ $transaction->paid_amount }}" class="form-control" readonly />
                                </td>
                                <td style="width:20rem">
                                    <input type="text" value="{{ $transaction->remaining_amount }}" class="form-control" readonly />
                                </td>
                            </tr>


                        </table >
                        <br>
                        <table class="table table-bordered">
                            <tr>
                                <th>रकम <span class="text-danger">*</span></th>
                                <th>भुक्तानी विधि <span class="text-danger">*</span></th>
                                <th>भुक्तानी मिति <span class="text-danger">*</span></th>
                                <th>चेक साड्ने मिति <span class="text-danger"> (चेक हो भने) </span></th>
                            </tr>
                            <tr>
                                <td style="width:20rem">
                                    <input type="text" value="{{ old('amount') }}" name="amount" placeholder="रु." class="form-control" />
                                    @if($errors->has('amount'))
                                    <p id="amount-error" class="help-block" for="worker_id"><span>{{ $errors->first('amount') }}</span></p>
                                @endif
                                </td>
                                <td style="width:20rem">
                                    <select name="payment_method" id="payment-method" class="form-control">
                                        <option selected disabled>भुक्तानी विधि छान्नुहोस</option>
                                        <option value="cash" {{ old('payment_method') == 'cash' ? 'checked' : '' }}>नगद</option>
                                        <option value="check" {{ old('payment_method') == 'check' ? 'checked' : '' }}>चेक</option>
                                    </select>

                                    @if($errors->has('payment_method'))
                                    <p id="payment-method-error" class="help-block" for="payment-method"><span>{{ $errors->first('payment_method') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:20rem">
                                    <input type="text" id="payment-date" value="{{ old('payment_date') }}" name="payment_date" placeholder="2081/03/06" class="form-control" readonly/>
                                    @if($errors->has('payment_date'))
                                    <p id="payment-method-error" class="help-block" for="payment-method"><span>{{ $errors->first('payment_date') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:20rem">
                                    <input type="text" id="date" value="{{ old('check_clearance_date') }}" name="check_clearance_date" placeholder="2081/03/06" class="form-control" readonly/>
                                </td>

                            </tr>
                        </table>
                    </div>
                </div>
            </section>
            <!-- Begin Progress Bar Buttons-->
            <div class="form-group pull-right">
                <a href="{{ route($_base_route.'.index')}}" class="btn btn-danger btn-sm "><i class="fa fa-undo"></i> पछाडि फर्कनुहोस्</a>
                <button class="btn btn-success btn-sm " type="submit" style="cursor: pointer;"><i class="fa fa-save"></i> सुरक्षित गर्नुहोस् </button>
            </div>
            <!-- End Progress Bar Buttons-->
        </form>
    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/js/nepali.datepicker.v3.7.min.js')}}" type="text/javascript"></script>
<script>
    $(document).ready(function () {
    $('#date').nepaliDatePicker({
        dateFormat: 'YYYY/MM/DD',
        closeOnDateSelect: true
    });
    $('#payment-date').nepaliDatePicker({
        dateFormat: 'YYYY/MM/DD',
        closeOnDateSelect: true
    });

});
</script>
@endsection

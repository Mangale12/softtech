@extends('layouts.admin')
@section('title', 'सप्लायर्स')
@section('css')
<link href="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/css/nepali.datepicker.v3.7.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<!--dynamic table-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://kit.fontawesome.com/728d898815.js" crossorigin="anonymous"></script>
@endsection
@section('content')
@php
// Extract the udhyog name from the current URL
    $_base_route = 'admin.payment';
    preg_match('/admin\/udhyog\/([^\/]*)/', request()->path(), $matches);
    $udhyogName = $matches[1] ?? '';
@endphp
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <section class="card">
            <header class="card-header">
                सप्लायर्स सुची
                <span class="tools pull-right d-flex">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
                <div class="row">
                    <table class="table table-bordered" id="dynamicTable">
                        <tr>
                            <th>नाम</th>
                            <th>आपूर्ति/बिक्री मिति</th>
                            <th>कुल रकम</th>
                            <th>तिरीएको रकम</th>
                            <th>बाँकी रकम</th>
                        </tr>
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
                    </table>
                </div>

            </header>

            <div class="card-body">
            {{-- <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right new-payment"><i class="fa fa-plus fa-sm text-white-50"></i> नयाँ बनाउनुहोस्</button>&nbsp; --}}
            {{-- <a href="{{ route('admin.udhyog.'.$udhyogName.'.inventory.supplier_payment.create',$data['transaction']->transaction_key) }}{{ !empty($data['udhyog']) ? ($data['udhyog'] != null ? '?udhyog='.$data['udhyog']['name'] : '') : '' }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right"><i class="fa fa-plus fa-sm text-white-50"></i> नयाँ बनाउनुहोस्</a>&nbsp; --}}

                <div class="adv-table">

                    <table class="table table-bordered" id="item-table">

                        <thead>

                            <tr>
                                <th>क्र.स</th>
                                {{-- <th>पुरा नाम</th> --}}
                                {{-- <th>आपूर्ति मिति</th> --}}
                                {{-- <th>कुल भुक्तानी</th> --}}
                                {{-- <th>बाँकी भुक्तानी</th> --}}
                                <th>तिरीएको रकम</th>
                                <th>भुक्तानी मिति</th>
                                <th>भुक्तानी विधि</th>
                                <th>चेक साट्ने मिति <span class="text-danger">(चेक हो भने)</span></th>
                                <th class="hidden-phone">कार्य</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($data['rows'] != null)
                            @foreach( $data['rows'] as $key=> $row)
                            <tr class="gradeX">
                                <td>{{ getUnicodeNumber($key+1) }}.</td>
                                <td>{{$row->amount}}</td>
                                <td>{{$row->payment_date}}</td>
                                <td>{{$row->payment_method == 'cash' ? 'नगद' : 'चेक'}}</td>
                                <td>{{$row->check_clearance_date}}</td>
                                <td>@include('admin.section.buttons.button-delete')</td>
                            </tr>
                            @endforeach
                            <tr>
                                <form action="{{ route('admin.payment.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">
                                    <td></td>
                                    <td style="width:20rem">
                                        <input type="text" value="{{ old('amount') }}" name="amount" placeholder="रु." class="form-control" />
                                        @if($errors->has('amount'))
                                            <p id="amount-error" class="help-block" for="worker_id"><span>{{ $errors->first('amount') }}</span></p>
                                        @endif
                                    </td>
                                    <td style="width:20rem">
                                        <input type="text" id="payment-date" value="{{ old('payment_date') }}" name="payment_date" placeholder="YYYY/MM/DD eg.2081/04/23" class="form-control"/>
                                        @if($errors->has('payment_date'))
                                            <p id="payment-method-error" class="help-block" for="payment-method"><span>{{ $errors->first('payment_date') }}</span></p>
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
                                        <input type="text" id="date" value="{{ old('check_clearance_date') }}" name="check_clearance_date" placeholder="YYYY/MM/DD eg.2081/04/23" class="form-control" />
                                    </td>
                                    <td>
                                        <button type="submit"><img src="{{ asset('sumit.png') }}" alt="" style="width: 60px; height:20px"></button>
                                    </td>
                                </form>
                            </tr>
                            @else
                            <p>माफ गर्नुहोला ! डाटा फेलापरेन !</p>
                            @endif
                        </tbody>

                    </table>
                    <div class="row">
                        {{-- {{ dd($data['transaction']) }} --}}
                        <div class="col-6">
                            <a href="{{ route('admin.billing.create') }}" class="btn btn-primary">बिल उत्पन्न गर्नुहोस्</a>
                        </div>
                        <div class="col-6">
                            <pre>
                                <b class="float-right mr-5 pr-5">जम्मा रकम   : {{ $data['transaction']->total_amount }}</b>
                                <b class="float-right mr-5 pr-5">तिरेको रकम   : {{ $data['transaction']->paid_amount }}</b>
                                <b class="float-right mr-5 pr-5">रकम तिर्न बाँकी : {{ $data['transaction']->remaining_amount }}</b>
                            </pre>
                        </div>



                    </div>
                </div>

                {{-- <div class="row">
                    @include('admin.section.load-time')
                    {{ $data['rows']->links('vendor.pagination.custom') }}
                </div> --}}
            </div>
        </section>
    </div>

</div>
@endsection
@section('js')
<script src="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/js/nepali.datepicker.v3.7.min.js')}}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<script>
    $(document).ready(function(){
        $('#date').nepaliDatePicker({
            dateFormat: 'YYYY/MM/DD',
            closeOnDateSelect: true,
        });
        $('#payment-date').nepaliDatePicker({
            dateFormat: 'YYYY/MM/DD',
            closeOnDateSelect: true,
        });
    });
</script>


@endsection

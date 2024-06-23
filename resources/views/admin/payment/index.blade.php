@extends('layouts.admin')
@section('title', 'सप्लाइर्स')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<!--dynamic table-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://kit.fontawesome.com/728d898815.js" crossorigin="anonymous"></script>
<link href="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/css/nepali.datepicker.v3.7.min.css')}}" rel="stylesheet" />

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
                सप्लाइर्स सुची
                <span class="tools pull-right d-flex">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>

            </header>

            <div class="card-body">
            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right new-payment"><i class="fa fa-plus fa-sm text-white-50"></i> नयाँ बनाउनुहोस्</button>&nbsp;
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
                                <th>चेक साड्ने मिति</th>
                                <th class="hidden-phone">स्थिति</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($data['rows'] != null)
                            @foreach( $data['rows'] as $key=> $row)
                            <tr class="gradeX">
                                <td>{{ getUnicodeNumber($key+1) }}.</td>
                                <td>{{$row->amount}}</td>
                                <td>{{$row->payment_date}}</td>
                                <td>{{$row->payment_method}}</td>
                                <td>{{$row->check_clearance_date}}</td>
                                <td>
                                    @include('admin.section.buttons.button-edit')
                                    {{-- <a href="{{ route('admin.transactions.view_payment',$row->id) }}"><img src="{{ asset('images.png') }}" alt="" width="30"></a> --}}
                                    {{-- <a class="btn btn-primary btn-sm" href="{{ URL::route('admin.inventory.suppluer.view', ['id' => $row->id]) }}" style="cursor:pointer;"><i class="fa fa-eye"></i></i></a> --}}
                                    {{-- <a class="btn btn-primary btn-sm" href="{{ URL::route($_base_route.'.view', ['id' => $row->id]) }}" style="cursor:pointer;"><i class="fa fa-eye"></i></i></a> --}}
                                    @include('admin.section.buttons.button-delete')


                                </td>
                            </tr>
                            @endforeach
                            @else
                            <p>माफ गर्नुहोला ! डाटा फेलापरेन !</p>
                            @endif
                        </tbody>

                    </table>
                    <div>
                        {{-- {{ dd($data['transaction']) }} --}}
                        <pre>
                            <b class="float-right mr-5 pr-5">जम्मा रकम   : {{ $data['transaction']->total_amount }}</b>
                            <b class="float-right mr-5 pr-5">तिरेको रकम   : {{ $data['transaction']->paid_amount }}</b>
                            <b class="float-right mr-5 pr-5">रकम तिर्न बाँकी : {{ $data['transaction']->remaining_amount }}</b>
                        </pre>


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
{{-- payment form model --}}
<style>
    /* Custom CSS for full-width modal */
    .modal-dialog {
        max-width: 80%;
        margin-left: 18%;
    }
    .modal-content {
        height: 70vh;
        border-radius: 0;
    }
</style>
<div class="modal fade" id="payment-model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{ route($_base_route.'.store')}}" method="POST" enctype="multipart/form-data">
                            <section class="card">
                                <header class="card-header">लेखा शीर्षक</header>
                                <div class="card-body">
                                    @csrf
                                    <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">
                                    <div class="row">
                                        <table class="table table-bordered" id="dynamicTable">
                                            <tr>
                                                <th>नाम</th>
                                                <th>आपूर्ति मिति</th>
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
                                                    <input type="text" id="payment-date" value="{{ old('payment_date') }}" name="payment_date" placeholder="YYYY/MM/DD eg.2081/04/23" class="form-control"/>
                                                    @if($errors->has('payment_date'))
                                                        <p id="payment-method-error" class="help-block" for="payment-method"><span>{{ $errors->first('payment_date') }}</span></p>
                                                    @endif
                                                </td>
                                                <td style="width:20rem">
                                                    <input type="text" id="date" value="{{ old('check_clearance_date') }}" name="check_clearance_date" placeholder="YYYY/MM/DD eg.2081/04/23" class="form-control" />
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </section>
                            <div class="form-group pull-right">
                                {{-- <a href="{{ route($_base_route.'.index')}}" class="btn btn-danger btn-sm "><i class="fa fa-undo"></i> पछाडि फर्कनुहोस्</a> --}}
                                <button class="btn btn-success btn-sm " type="submit" style="cursor: pointer;"><i class="fa fa-save"></i> सुरक्षित गर्नुहोस् </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
        </div>
    </div>
</div>
{{-- end payment form model --}}
@endsection
@section('js')
<script src="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/js/nepali.datepicker.v3.7.min.js')}}" type="text/javascript"></script>
<script>
    $(document).ready(function(){
        $('.new-payment').click(function(){
            $("#payment-model").modal('show');
        });
        $('#date').nepaliDatePicker({
            dateFormat: 'YYYY/MM/DD',
            closeOnDateSelect: true,
        });

        $('#payment-model').on('shown.bs.modal', function () {

            $('#payment-date').nepaliDatePicker({
                dateFormat: 'YYYY/MM/DD',
                closeOnDateSelect: true,
            });
        });
    });
</script>


@endsection

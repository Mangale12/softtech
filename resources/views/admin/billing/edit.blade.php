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
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row" style="font-weight: bold;">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="bill_no">बिल नं.</label> <br>
                                <input class="form-control rounded " type="text" id="bill_no" value="" name="bill_no" placeholder="बिल नं." readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="date">मिति</label> <br>
                                <input class="form-control rounded " type="text" id="date" value="{{ old('date') }}" name="date" placeholder="मिति" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="full_name">पुरा नाम</label> <br>
                                <input class="form-control rounded" type="text" id="full_name" value="" name="full_name" placeholder="पुरा नाम">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="address">ठेगाना</label> <br>
                                <input class="form-control rounded" type="text" id="address" value="" name="address" placeholder="ठेगाना">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="phone">फोन</label> <br>
                                <input class="form-control rounded" type="text" id="phone" value="" name="phone" placeholder="फोन">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="complete_status">भुक्तानी स्थिति</label> <br>
                                <select name="complete_status" id="complete_status" class="form-control select-two">
                                    <option value="">छान्नुहोस्</option>
                                    <option value="0">बाकि</option>
                                    <option value="1">भुक्तानी गरिएको</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="remarks">टिप्पणी</label> <br>
                                <input class="form-control rounded" type="text" id="remarks" value="" name="remarks" placeholder="टिप्पणी">
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover table-bordered mynewsofttable">
                    <thead>
                        <tr>
                            <th>उद्योग छान्नुहोस् </th>
                            <th>उत्पादन छान्नुहोस् </th>
                            <th>यूनिट छान्नुहोस्</th>
                            <th>मूल्य</th>
                            <th>संख्या</th>
                            <th>सम्पादन</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="soft-multyfield ">
                            <td class="col-md-2 form-group ">
                                <select name="udhyog_id[]" id="udhyog_id" class="form-control select-two">
                                    <option value="">छान्नुहोस्</option>
                                    @if(isset($data['udhyog']) && $data['udhyog']->count() > 0)
                                    @foreach($data['udhyog'] as $key=> $row)
                                    <option value="{{ $row->id}}">{{$row->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                <p class="help-block"></p>
                            </td>
                            <td class="col-md-2 form-group  has-error ">
                                <select name="product_id[]" id="product_id" class="form-control select-two">
                                    <option value="">छान्नुहोस्</option>
                                </select>
                                <p class="help-block"></p>
                            </td>
                            <td class="col-md-2 form-group ">
                                <select name="unit_id[]" id="unit_id" class="form-control select-two">
                                    <option value=>छान्नुहोस्</option>
                                    @if(count($data['unit']) != 0)
                                    @foreach($data['unit'] as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                <p class="help-block"></p>
                            </td>
                            <td class="col-md-2 form-group ">
                                <input type="text" class="form-control rounded" name="price[]" id="price" placeholder="मूल्य" value="0">
                                <p class="help-block"></p>
                            </td>
                            <td class="col-md-2 form-group ">
                                <input type="text" class="form-control rounded" name="quantity[]" id="quantity" placeholder="संख्या" value="0">
                                <p class="help-block"></p>
                            </td>

                            <td class="col-md-1">
                                <a class="js-sw-row-add btn btn-info btn-sm">
                                    <i class="fa fa-plus" title="add"></i>
                                </a>
                                <a class="js-sw-row-delete btn btn-danger btn-sm">
                                    <i class="fa fa-minus" title="remove"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
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
@endsection
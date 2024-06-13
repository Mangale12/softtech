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
                <h6><a href="#">{{ !empty($data['path']) ? $data['path'] : 'नयाँ भौचर'}}</a> </h6>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header" style="font-weight: bold;">
                नयाँ भौचर
            </header>
            <form action="{{ route($_base_route.'.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row" style="font-weight: bold;">
                        <input type="hidden" name="udhyog" value="{{ !empty($data['udhyog']) ? $data['udhyog']['id'] : null }}">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="bhoucher_no">भौचर नं.</label> <br>
                                <input class="form-control rounded " type="text" id="bhoucher_no" value="{{ $data['bhoucher_no']}}" name="bhoucher_no" placeholder="भौचर नं." readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="date">मिति</label> <br>
                                <input class="form-control rounded " type="text" id="date" value="{{getStandardNumber( $data['nep_date_unicode'])}}" name="date" placeholder="मिति" readonly>
                                @if($errors->has('date'))
                                <p id="date-error" class="help-block" for="date"><span>{{ $errors->first('date') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="date">भौचर प्रकार *</label> <br>
                                <select name="voucher_type" id="voucher_type" class="form-control select-two">
                                    <option value="">छान्नुहोस्</option>
                                    @if(isset($data['voucher_type']) )
                                    @foreach($data['voucher_type'] as $key=> $row)
                                    {{-- <option value="{{ $row->id}}">{{$row->title}}</option> --}}
                                    <option value="{{ $row->id }}" {{ old('voucher_type') == $row->id ? 'selected' : '' }}>{{$row->title}}</option>

                                    @endforeach
                                    @endif
                                </select>
                                @if($errors->has('voucher_type'))
                                <p id="voucher_type-error" class="help-block" for="voucher_type"><span>{{ $errors->first('voucher_type') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="bhoucher_name">भौचर नाम *</label> <br>
                                <input class="form-control rounded " type="text" id="bhoucher_name" value="{{ old('bhoucher_name')}}" name="bhoucher_name" placeholder="भौचर नाम" >
                                @if($errors->has('bhoucher_name'))
                                <p id="voucher_type-error" class="help-block" for="bhoucher_name"><span>{{ $errors->first('bhoucher_name') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="date">लेखा शीर्षक *</label> <br>
                                <select name="lekha_shirshak" id="lekha_shirshak" class="form-control select-two">
                                    <option value="">छान्नुहोस्</option>
                                    @if(isset($data['lekha_shirshak']) )
                                    @foreach($data['lekha_shirshak'] as $key=> $row)
                                    {{-- <option value="{{ $row->id}}">{{$row->title}}</option> --}}
                                    <option value="{{ $row->id }}" {{ old('lekha_shirshak') == $row->id ? 'selected' : '' }}>{{$row->title}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @if($errors->has('lekha_shirshak'))
                                <p id="voucher_type-error" class="help-block" for="lekha_shirshak"><span>{{ $errors->first('lekha_shirshak') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="fiscal">आर्थिक वर्ष *</label>
                                <select name="fiscal" id="fiscal" class="form-control select-two">
                                    <option selected disabled>छान्नुहोस्</option>
                                    @if(isset($data['fiscal']) )
                                    @foreach($data['fiscal'] as $key=> $row)
                                    <option value="{{ $row->id}}" {{ old('fiscal') == $row->id ? 'selected' : '' }}>{{$row->fiscal_np}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @if($errors->has('fiscal'))
                                <p id="udhyog_id-error" class="help-block" for="udhyog_id"><span>{{ $errors->first('fiscal') }}</span></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Dr./Cr.</th>
                            <!-- <th>उपखाता</th> -->
                            <th>शीर्षक</th>
                            <th>डेबिट</th>
                            <th>क्रेडिट</th>
                            <th><a href="#" class="btn btn-info adRow"><i class="fa fa-plus"></i></a></th>
                        </tr>
                    </thead>
                    <tbody id="transactionbody">
                        @if(old('acctype'))
                        @foreach(old('acctype') as $index => $value)
                        <tr class="new1">
                            <td>
                                <select class="form-control acctype" name="acctype[]" onchange="DisableDrCr(this)">
                                    <option disabled>--Select--</option>
                                    <option value="1" {{ old('acctype.'.$index) == '1' ? 'selected' : '' }}>Dr</option>
                                    <option value="2" {{ old('acctype.'.$index) == '2' ? 'selected' : '' }}>Cr</option>
                                </select>
                            </td>
                            <td><input type="text" name="dr[]" id="" value="{{ old('dr.'.$index) }}" class="form-control dramt" onchange="TotalDrCr()"></td>
                            <td><input type="text" name="cr[]" id="" value="{{ old('cr.'.$index) }}"  class="form-control cramt" onchange="TotalDrCr()"></td>
                            <td><button type="button" class="btn btn-danger btn-delete" onclick="DeleteRow(this)"><i class="fa fa-trash-o"></i></button></td>
                        </tr>
                        @endforeach
                        @else
                        <tr class="new1">
                            <td>
                                <select class="form-control acctype" name="acctype[]" onchange="DisableDrCr(this)">
                                    <option value="">--Select--</option>
                                    <option value="1" >Dr</option>
                                    <option value="2" >Cr</option>
                                </select>
                            </td>
                            <td><input type="text" name="title[]" id=""  class="form-control" required></td>
                            <td><input type="text" name="dr[]" id=""  class="form-control dramt" onchange="TotalDrCr()"></td>
                            <td><input type="text" name="cr[]" id=""  class="form-control cramt" onchange="TotalDrCr()"></td>
                            <td><button type="button" class="btn btn-danger btn-delete" onclick="DeleteRow(this)"><i class="fa fa-trash-o"></i></button></td>
                        </tr>
                        @endif
                    </tbody>
                    <tfoot>
                        <!-- total debit total credit -->
                        <tr>
                            <td colspan="2">Total </td>
                            <td>
                                <input type="text" readonly name="total_debit" value="{{ old('total_debit') }}" id="total_debit" class="form-control totalDr ">
                                @if($errors->has('total_debit'))
                                <p id="udhyog_id-error" class="help-block" for="udhyog_id"><span>{{ $errors->first('total_debit') }}</span></p>
                                @endif
                            </td>
                            <td>
                                <input type="text" readonly name="total_credit" value="{{ old('total_credit') }}" id="total_credit" class="form-control totalCr ">
                                @if($errors->has('total_credit'))
                                <p id="udhyog_id-error" class="help-block" for="total_credit"><span>{{ $errors->first('total_credit') }}</span></p>
                                @endif
                            </td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="remarks">टिप्पणीहरू</label> <br>
                        <textarea name="remarks" placeholder="टिप्पणीहरू.." class="form form-control" id="remarks" cols="30" rows="3"></textarea>
                    </div>
                </div>
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.select-two').select2();
        $('#date').nepaliDatePicker({
            dateFormat: 'DD/MM/YYYY',
            closeOnDateSelect: true
        });
        var i = 0;
        $(".adRow").on("click", function() {
            var newRow = $("<tr class='new1'>");
            var cols = "";
            cols += '<td><select class="form-control acctype" name="acctype[]" onchange="DisableDrCr(this)"><option value="">--select--</option><option value="1">Dr</option><option value="2">Cr</option></select></td>';
            cols += '<td><input type="text" class="form-control" name="title[]" required></td>';
            cols += '<td><input type="text" class="form-control dramt" name="dr[]" value="" onchange="TotalDrCr()"></td>';
            cols += '<td><input type="text" class="form-control cramt" name="cr[]" value="" onchange="TotalDrCr()"/></td>';
            cols += '<td><a href="#" class="btn btn-danger remove" onclick="DeleteRow(this)"><i class="fa fa-trash-o "></i></a></td>';
            newRow.append(cols);
            // alert(cols);
            $("table.table-bordered").append(newRow);
            i++;
        });
        $("table.table-bordered").on("click", ".remove", function(event) {
            $(this).closest("tr").remove();
            i--;
        });
    });

    $(document).ready(function() {
        $('.field1').on('input', function() {
            debugger;
            //    var closest = debit[i].closest('#new1');
            var row = $(this).closest('#new1');
            if ($(this).val() !== '') {
                $(row).find('.field2').prop('disabled', true);
            } else {
                $(row).find('.field2').prop('disabled', false);
            }
        });

        $('.field2').on('input', function() {
            var row = $(this).closest('#new1');
            if ($(this).val() !== '') {
                $(row).find('.field1').prop('disabled', true);
            } else {
                $(row).find('.field1').prop('disabled', false);
            }
        });

    });
</script>
<script>
    $(document).ready(function() {
        $('.acctype').each(function() {
            var value = $(this).val(); // Get the value of the current element
            console.log("acctype val: " + value);

            var row = $(this).closest('.new1');

            // Check the value and call the appropriate function
            if (value == 1) {
                // Disable 'cramt' and set its value to 0
                $(row).find('.cramt').prop('readonly', true).val(0);
            } else if (value == 2) {
                // Disable 'dramt' and set its value to 0
                $(row).find('.dramt').prop('readonly', true).val(0);
            }
        });
    });
    $(document).on('click', 'form button[type=submit]', function(e) {


        var totaldr = 0,
            totalcr = 0;

        $('td .dramt').each(function() {
            var singledr = parseFloat($(this).val(), 10);
            if (isNaN(singledr)) {
                singledr = 0;
            }
            totaldr += singledr;
        });

        $('td .cramt').each(function() {
            var singlecr = parseFloat($(this).val(), 10);
            if (isNaN(singlecr)) {
                singlecr = 0;
            }
            totalcr += singlecr;
        });
        if (totaldr != totalcr) {
            alert("Debit and Credit Amount Are Not Equal !!");
            e.preventDefault();
        }
    });

    function TotalDrCr() {
        var totaldr = 0,
            totalcr = 0;

        $('td .dramt').each(function() {
            var singledr = parseFloat($(this).val(), 10);
            if (isNaN(singledr)) {
                singledr = 0;
            }
            totaldr += singledr;
        });
        $('.totalDr').val(totaldr);

        $('td .cramt').each(function() {
            var singlecr = NaN ? 0 : parseFloat($(this).val(), 10);
            if (isNaN(singlecr)) {
                singlecr = 0;
            }
            totalcr += singlecr;
        });
        $('.totalCr').val(totalcr);
    }

    function DisableDrCr(e) {
        debugger;
        var row = $(e).closest('.new1');
        var value = $(row).find('.acctype').val();
        if (value==1) {
            //dr
            $(row).find('.cramt').prop('readonly', true).val(0);
        } else if (value==2) {
            //cr
            $(row).find('.dramt').prop('readonly', true).val(0);
        }

        TotalDrCr();
    }
    function DeleteRow(e) {
        debugger;
        var row = $(e).closest('.new1');
        var confirmValue = confirm("Are you sure to delete ?");
        if (confirmValue) {
            $(row).remove();
            TotalDrCr();
        }
    }
</script>
@endsection

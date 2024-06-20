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
                                <input class="form-control rounded" type="text" id="bhoucher_no" value="{{ $data['bhoucher_no'] }}" name="bhoucher_no" placeholder="भौचर नं." readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="date">मिति</label> <br>
                                <input class="form-control rounded" type="text" id="date" value="{{ getStandardNumber($data['nep_date_unicode']) }}" name="date" placeholder="मिति" readonly>
                                @if($errors->has('date'))
                                <p id="date-error" class="help-block" for="date"><span>{{ $errors->first('date') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="date">भौचर प्रकार</label> <br>
                                <select name="voucher_type" id="voucher_type" class="form-control select-two">
                                    <option value="">छान्नुहोस्</option>
                                    @if(isset($data['voucher_type']))
                                    @foreach($data['voucher_type'] as $key => $row)
                                    <option value="{{ $row->id }}" {{ old('voucher_type') == $row->id ? 'selected' : '' }}>{{ $row->title }}</option>
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
                                <label for="bhoucher_name">भौचर Name</label> <br>
                                <input class="form-control rounded" type="text" id="bhoucher_name" value="{{ old('bhoucher_name') }}" name="bhoucher_name" placeholder="भौचर name">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="date">लेखा शीर्षक</label> <br>
                                <select name="lekha_shirshak" id="lekha_shirshak" class="form-control select-two">
                                    <option value="">छान्नुहोस्</option>
                                    @if(isset($data['lekha_shirshak']))
                                    @foreach($data['lekha_shirshak'] as $key => $row)
                                    <option value="{{ $row->id }}" {{ old('lekha_shirshak') == $row->id ? 'selected' : '' }}>{{ $row->title }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @if($errors->has('lekha_shirshak'))
                                <p id="lekha_shirshak-error" class="help-block" for="lekha_shirshak"><span>{{ $errors->first('lekha_shirshak') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="fiscal">आर्थिक वर्ष</label>
                                <select name="fiscal" id="fiscal" class="form-control select-two">
                                    <option value="">छान्नुहोस्</option>
                                    @if(isset($data['fiscal']))
                                    @foreach($data['fiscal'] as $key => $row)
                                    <option value="{{ $row->id }}" {{ old('fiscal') == $row->id ? 'selected' : '' }}>{{ $row->fiscal_np }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @if($errors->has('fiscal'))
                                <p id="fiscal-error" class="help-block" for="fiscal"><span>{{ $errors->first('fiscal') }}</span></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Dr./Cr.</th>
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
                                    <option value="">--Select--</option>
                                    <option value="1" {{ old('acctype.'.$index) == '1' ? 'selected' : '' }}>Dr</option>
                                    <option value="2" {{ old('acctype.'.$index) == '2' ? 'selected' : '' }}>Cr</option>
                                </select>
                            </td>
                            <!-- <td><input type="text" name="title[]" class="form-control" value="{{ old('title.'.$index) }}"></td> -->
                            <td>
                                <select name="title[]" class="form-control" id="title">
                                    <option selected disabled>फाइनान्सको शीर्षक छान्नुहोस् </option>
                                    @foreach($data['titles'] as $key=>$title)
                                        <option value="{{ $title->id }}">{{ $title->name }}</option>
                                    @endforeach
                                </select>
                                <input type="text" name="title[]" class="form-control" value="{{ old('title.'.$index) }}">
                            </td>
                            <td><input type="text" name="dr[]" class="form-control dramt" value="{{ old('dr.'.$index) }}" onchange="TotalDrCr()"></td>
                            <td><input type="text" name="cr[]" class="form-control cramt" value="{{ old('cr.'.$index) }}" onchange="TotalDrCr()"></td>
                            <td><button type="button" class="btn btn-danger btn-delete" onclick="DeleteRow(this)"><i class="fa fa-trash-o"></i></button></td>
                        </tr>
                        @endforeach
                        @else
                        <tr class="new1">
                            <td>
                                <select class="form-control acctype" name="acctype[]" onchange="DisableDrCr(this)">
                                    <option value="">--Select--</option>
                                    <option value="1">Dr</option>
                                    <option value="2">Cr</option>
                                </select>
                            </td>
                            <td><input type="text" name="dr[]" class="form-control dramt" onchange="TotalDrCr()"></td>
                            <td><input type="text" name="cr[]" class="form-control cramt" onchange="TotalDrCr()"></td>
                            <td><button type="button" class="btn btn-danger btn-delete" onclick="DeleteRow(this)"><i class="fa fa-trash-o"></i></button></td>
                        </tr>
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>Total </td>
                            <td><input type="text" readonly name="total_debit" id="total_debit" class="form-control totalDr" value="{{ old('total_debit') }}"></td>
                            <td><input type="text" readonly name="total_credit" id="total_credit" class="form-control totalCr" value="{{ old('total_credit') }}"></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="form-group">
                    <label for="remarks">टिप्पणीहरू</label> <br>
                    <textarea name="remarks" placeholder="टिप्पणीहरू.." class="form form-control" id="remarks" cols="30" rows="3">{{ old('remarks') }}</textarea>
                </div>
                <!-- Begin Progress Bar Buttons-->
                <div class="form-group pull-right">
                    <a href="{{ route($_base_route.'.index') }}" class="btn btn-danger btn-sm"><i class="fa fa-undo"></i> पछाडि फर्कनुहोस्</a>
                    <button class="btn btn-success btn-sm" type="submit" style="cursor: pointer;"><i class="fa fa-save"></i> सुरक्षित गर्नुहोस् </button>
                </div>
                <!-- End Progress Bar Buttons-->
            </form>
        </section>
    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/js/nepali.datepicker.v3.7.min.js') }}" type="text/javascript"></script>
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

        $(".adRow").on("click", function() {
            var newRow = $("<tr class='new1'>");
            var cols = "";
            cols += '<td><select class="form-control acctype" name="acctype[]" onchange="DisableDrCr(this)"><option value="">--select--</option><option value="1">Dr</option><option value="2">Cr</option></select></td>';
            cols += '<td><input type="text" class="form-control dramt" name="title[]"></td>';
            cols += '<td><input type="text" class="form-control dramt" name="dr[]" onchange="TotalDrCr()"></td>';
            cols += '<td><input type="text" class="form-control cramt" name="cr[]" onchange="TotalDrCr()"/></td>';
            cols += '<td><button type="button" class="btn btn-danger btn-delete" onclick="DeleteRow(this)"><i class="fa fa-trash-o "></i></button></td>';
            newRow.append(cols);
            $("table.table-bordered").append(newRow);
        });

        $(document).on("click", ".btn-delete", function(event) {
            $(this).closest("tr").remove();
            TotalDrCr();
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
                var singlecr = parseFloat($(this).val(), 10);
                if (isNaN(singlecr)) {
                    singlecr = 0;
                }
                totalcr += singlecr;
            });
            $('.totalCr').val(totalcr);
        }

        function DisableDrCr(e) {
            var row = $(e).closest('tr');
            var value = $(e).val();
            if (value == 1) {
                //dr
                $(row).find('.cramt').prop('disabled', true).val(0);
                $(row).find('.dramt').prop('disabled', false);
            } else if (value == 2) {
                //cr
                $(row).find('.dramt').prop('disabled', true).val(0);
                $(row).find('.cramt').prop('disabled', false);
            } else {
                $(row).find('.dramt').prop('disabled', false);
                $(row).find('.cramt').prop('disabled', false);
            }

            TotalDrCr();
        }

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

        // Ensure existing rows have the correct enable/disable state
        $('#transactionbody tr').each(function() {
            DisableDrCr($(this).find('.acctype'));
        });
    });
</script>
@endsection

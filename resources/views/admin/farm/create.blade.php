@extends('layouts.admin')
@section('title', 'खेत बिबरण')
@section('css')
<!--Form Wizard-->
<link href="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/css/nepali.datepicker.v3.7.min.css')}}" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                <h6><a href="#">खेत बिबरण</a></h6>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route($_base_route.'.store')}}" method="POST" enctype="multipart/form-data">
            <section class="card">
                <header class="card-header">
                    <legend>खेत बिबरण</legend>
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row" style="font-weight: bold;">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="title">आर्थिक वर्ष</label> <br>
                                <select name="fiscal_year" id="fiscal_year" class="form-control select-two">
                                    <option value=>छान्नुहोस्</option>
                                    @if(count($data['fiscal']) != 0)
                                    @foreach($data['fiscal'] as $row)
                                    <option value="{{ $row->id }}">{{ $row->fiscal_np }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @if($errors->has('fiscal_year'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('fiscal_year') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <!-- <div class="col-md-2">
                            <div class="form-group">
                                <label for="title">प्रयोगकर्ता छान्नुस</label> <br>
                                <select name="full_name" id="applicant" class="form-control select-two">
                                    <option value=>छान्नुहोस्</option>
                                    @if(count($data['user']) != 0)
                                    @foreach($data['user'] as $row)
                                    <option value="{{ $row->unique_id }}">{{ $row->name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @if($errors->has('fiscal_np'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('fiscal_np') }}</span></p>
                                @endif
                            </div>
                        </div> -->
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="block_id">ब्लक छान्नुस</label> <br>
                                <select name="block_id" id="block_id" class="form-control select-two">
                                    <option value=>छान्नुहोस्</option>
                                    @if(count($data['block']) != 0)
                                    @foreach($data['block'] as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @if($errors->has('block_id'))
                                <p id="name-error" class="help-block" for="block_id"><span>{{ $errors->first('block_id') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="baali_cat">बाली प्रकार</label> <br>
                                <select name="baali_cat" id="baali_cat" class="form-control select-two">
                                    <option value=>छान्नुहोस्</option>
                                    @if(count($data['agri-category']) != 0)
                                    @foreach($data['agri-category'] as $row)
                                    <option value="{{ $row->id }}">{{ $row->title }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @if($errors->has('ritu_id'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('ritu_id') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="baali">बाली किसिम</label> <br>
                                <select name="baali" id="baali" class="form-control">
                                    <option value=>छान्नुहोस्</option>
                                </select>
                                @if($errors->has('ritu_id'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('ritu_id') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="title">महिना देखि</label> <br>
                                <select name="start_month_id" id="start_month_id" class="form-control select-two">
                                    <option value=>छान्नुहोस्</option>
                                    @if(count($data['month']) != 0)
                                    @foreach($data['month'] as $row)
                                    <option value="{{ $row->id }}">{{ $row->month_np }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @if($errors->has('start_month_id'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('start_month_id') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="title">सम्म</label> <br>
                                <select name="end_month_id" id="end_month_id" class="form-control select-two">
                                    <option value=>छान्नुहोस्</option>
                                    @if(count($data['month']) != 0)
                                    @foreach($data['month'] as $row)
                                    <option value="{{ $row->id }}">{{ $row->month_np }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @if($errors->has('end_month_id'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('end_month_id') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="title">मिति देखि</label> <br>
                                <div class="input-group date dpMonths">
                                    <input type="text" readonly class="form-control nep_date" value="{{ old('start_date') }}" name="start_date" id="start_date" placeholder="मिति देखि" aria-label="Right Icon" aria-describedby="dp-mdo">
                                    <div class="input-group-append">
                                        <button id="dp-mdo" class="btn btn-primary" type="button"><i class="fa fa-calendar f14"></i></button>
                                    </div>
                                </div>
                                @if($errors->has('ritu_id'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('ritu_id') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="title">सम्म</label> <br>
                                <div class="input-group date dpMonths">
                                    <input type="text" readonly class="form-control nep_date" value="{{ old('end_date') }}" name="end_date" id="nep_date_1" placeholder="सम्म" aria-label="Right Icon" aria-describedby="dp-mdo">
                                    <div class="input-group-append">
                                        <button id="dp-mdo" class="btn btn-primary" type="button"><i class="fa fa-calendar f14"></i></button>
                                    </div>
                                </div>
                                @if($errors->has('ritu_id'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('ritu_id') }}</span></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="card">
                <header class="card-header">
                    <legend>बिउ बिजन</legend>
                </header>
                <div class="card-body">
                    <table class="table table-bordered mynewprodtable" id="dynamicTable">
                        <thead>
                            <tr>
                                <th>सुची</th>
                                <th class="numeric">यूनिट</th>
                                <th class="numeric">मूल्य</th>
                                <th class="numeric">संख्या</th>
                                <th class="numeric">कुल रकम</th>
                                <th class="numeric">टिप्पणीहरू</th>
                                <th class="numeric">सम्पादन</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="newtrans prod-multyfield">
                                <td style="width:15rem">
                                    <select name="biubijan_1[]" id="biubijan_1" class="form-control select-two">
                                        <option value=>छान्नुहोस्</option>
                                        @if(count($data['biubijan']) != 0)
                                        @foreach($data['biubijan'] as $row)
                                        <option value="{{ $row->title }}">{{ $row->title }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </td>
                                <td style="width:20rem">
                                    <select name="unit_5[]" id="unit_5" class="form-control select-two">
                                        <option value=>छान्नुहोस्</option>
                                        @if(count($data['unit']) != 0)
                                        @foreach($data['unit'] as $row)
                                        <option value="{{ $row->name }}">{{ $row->name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </td>
                                <td style="width:20rem"><input type="text" class="form-control rounded amount" name="biubijan_2[]" id="biubijan_2" placeholder="मूल्य" value="" onchange="sum(this)"></td>
                                <td style="width:20rem"><input type="text" class="form-control rounded expenditure" name="biubijan_3[]" id="biubijan_3" placeholder="संख्या" value="" onchange="sum(this)"></td>
                                <td style="width:20rem"><input type="text" class="form-control rounded tamount" name="biubijan_4[]" id="biubijan_4" readonly placeholder=" कुल रकम" value=""></td>
                                <td style="width:30rem"><input type="text" name="biubijan_5[]" id="biubijan_5" value="" placeholder="टिप्पणी" class="form-control" /></td>
                                <td style="width:13em"><button type="button" name="add" id="add" class="btn btn-sm btn-info js-pr-row-add"> नयाँ</button>
                                    <button type="button" class="btn btn-danger btn-sm remove-tr js-pr-row-delete">डिलिट</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <section class="card">
                <header class="card-header">
                    <legend>औजारहरू</legend>
                </header>
                <div class="card-body">
                    <table class="table table-bordered aujaartable" id="dynamicTable">
                        <thead>
                            <tr>
                                <th>सुची</th>
                                <th class="numeric">यूनिट</th>
                                <th class="numeric">मूल्य</th>
                                <th class="numeric">संख्या</th>
                                <th class="numeric">कुल रकम</th>
                                <th class="numeric">टिप्पणीहरू</th>
                                <th class="numeric">सम्पादन</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr class="newtrans prod-multyfield">
                                <td style="width:15rem">
                                    <select name="mesinary_1[]" id="mesinary_1" class="form-control select-two">
                                        <option value=>छान्नुहोस्</option>
                                        @if(count($data['mesinary']) != 0)
                                        @foreach($data['mesinary'] as $row)
                                        <option value="{{ $row->tools }}">{{ $row->tools }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </td>
                                <td style="width:20rem">
                                    <select name="unit_5[]" id="unit_5" class="form-control select-two">
                                        <option value=>छान्नुहोस्</option>
                                        @if(count($data['unit']) != 0)
                                        @foreach($data['unit'] as $row)
                                        <option value="{{ $row->name }}">{{ $row->name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </td>
                                <td style="width:20rem"><input type="text" class="form-control rounded amount" name="mesinary_2[]" id="mesinary_2" placeholder="मूल्य" value="" onchange="sum(this)"></td>
                                <td style="width:20rem"><input type="text" class="form-control rounded expenditure" name="mesinary_3[]" id="mesinary_3" placeholder="संख्या" value="" onchange="sum(this)"></td>
                                <td style="width:20rem"><input type="text" class="form-control rounded tamount" name="mesinary_4[]" id="mesinary_4" readonly placeholder=" कुल रकम" value=""></td>
                                <td style="width:30rem"><input type="text" name="mesinary_5[]" value="" id="mesinary_5" placeholder="टिप्पणी" class="form-control" /></td>
                                <td style="width:13em"><button type="button" name="add" id="add" class="btn btn-sm btn-info js-pr1-row-add"> नयाँ</button>
                                    <button type="button" class="btn btn-danger btn-sm remove-tr js-pr1-row-delete">डिलिट</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <section class="card">
                <header class="card-header">
                    <legend>मल बिबरण</legend>
                </header>
                <div class="card-body">
                    <table class="table table-bordered malbibrantable" id="dynamicTable">
                        <thead>
                            <tr>
                                <th>सुची</th>
                                <th class="numeric">यूनिट</th>
                                <th class="numeric">मूल्य</th>
                                <th class="numeric">संख्या</th>
                                <th class="numeric">कुल रकम</th>
                                <th class="numeric">टिप्पणीहरू</th>
                                <th class="numeric">सम्पादन</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr class="newtrans prod-multyfield">
                                <td style="width:15rem">
                                    <select name="mal_bibran_1[]" id="mal_bibran_1" class="form-control select-two">
                                        <option value=>छान्नुहोस्</option>
                                        @if(count($data['mal']) != 0)
                                        @foreach($data['mal'] as $row)
                                        <option value="{{ $row->title }}">{{ $row->title }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </td>
                                <td style="width:20rem">
                                    <select name="unit_5[]" id="unit_5" class="form-control select-two">
                                        <option value=>छान्नुहोस्</option>
                                        @if(count($data['unit']) != 0)
                                        @foreach($data['unit'] as $row)
                                        <option value="{{ $row->name }}">{{ $row->name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </td>
                                <td style="width:20rem"><input type="number" class="form-control rounded amount" name="mal_bibran_2[]" id="mal_bibran_2" placeholder="मूल्य" value="" onchange="sum(this)"></td>
                                <td style="width:20rem"><input type="number" class="form-control rounded expenditure" name="mal_bibran_3[]" id="mal_bibran_3" placeholder="संख्या" value="" onchange="sum(this)"></td>
                                <td style="width:20rem"><input type="number" class="form-control rounded tamount" name="mal_bibran_4[]" id="mal_bibran_4" readonly placeholder=" कुल रकम" value=""></td>
                                <td style="width:30rem"><input type="text" name="mal_bibran_5[]" id="mal_bibran_5" value="" placeholder="टिप्पणी" class="form-control" /></td>
                                <td style="width:13em"><button type="button" name="add" id="add" class="btn btn-sm btn-info js-pr2-row-add"> नयाँ</button>
                                    <button type="button" class="btn btn-danger btn-sm remove-tr js-pr2-row-delete">डिलिट</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <section class="card">
                <fieldset class="border p-1 col-12" style="margin-top: 10px; margin-bottom: 10px;">
                    <legend>कामदार बिबरण</legend>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="title">किसान छान्नुस</label> <br>
                                <select name="worker_list[]" id="worker_list" class="form-control worker_list" multiple="multiple">
                                    <option value=>छान्नुहोस्</option>
                                    @if(isset($data['worker']))
                                    @foreach($data['worker'] as $row)
                                    <option value="{{ $row->id }}">{{ $row->full_name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <!-- <div class="col-md-3">
                            <label for="title"></label> <br>
                            <div class="form-group">
                                <input class="button btn-sm btn btn-success btn_save" id="GoodsButton" type="button" value="कर्मचारी छान्नुस">
                            </div>
                        </div> -->
                    </div>
                    <!-- <div class="form-group row" style="font-size: 17px; font-weight: bold; text-align: center;">
                        <div class="col-sm-2 control-label"><small>चयन गर्नुहोस्</small></div>
                        <div class="col-sm-2 control-label"><small>कामदारको नाम</small></div>
                        <div class="col-sm-2 control-label"><small>पद</small></div>
                        <div class="col-sm-2 control-label"><small>मोबाइल नं</small></div>
                        <div class="col-sm-2 control-label"><small>समय</small></div>
                        <div class="col-sm-2 control-label"><small>तलब</small></div>
                    </div>
                    <div id="GoodsList">
                    </div> -->
                </fieldset>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        //select2
        $('.worker_list').select2();

        //get Land
        $('#applicant').change(function() {
            var idapplicant = this.value;
            $("#land").html('');
            var url = "{{route('getLand')}}";
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    unique_id: idapplicant,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result) {
                    //debugger;
                    console.log(result);
                    $('#land').html('<option value="">-- छान्नुहोस् --</option>');
                    $.each(result.land, function(key, value) {
                        if (value.totalbigaha != null || value.totalkattha != null || value.totaldhur != null) {
                            $("#land").append('<option value="' + value.id + '">' + value.totalbigaha + ` बिगाह` + ' ' + value.totalkattha + ` कट्ठा` + ' ' + value.totaldhur + ` धुर` + '</option>');
                        } else {
                            $("#land").append('<option value="' + value.id + '">' + value.totalropani + ` रोपनी` + ' ' + value.totalaana + ` आना` + ' ' + value.totalpaisa + ` पैसा` + value.totaldam + ` दाम` + '</option>');
                        }
                    });
                }
            });
        });
        //get baali_category
        $('#baali_cat').change(function() {
            var idbaali_cat = this.value;
            $("#baali").html('');
            var url = "{{route('getBaali')}}";
            $.ajax({
                url: url,
                type: "GET",
                data: {
                    baali_cat: idbaali_cat,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result) {
                    //debugger;
                    console.log(result);
                    $('#baali').html('<option value="">-- छान्नुहोस् --</option>');
                    $.each(result.baali, function(key, value) {
                        $("#baali").append('<option value="' + value.id + '">' + value.title + '</option>');
                    });
                }
            });
        });
        /***************************NepaliDate picker *********************/
        $(".nep_date").nepaliDatePicker({
            ndpYear: true,
            ndpMonth: true,
            ndpYearCount: 1000,
            // unicodeDate: true,
        })
        $("#nep_date").nepaliDatePicker({
            ndpYear: true,
            ndpMonth: true,
            ndpYearCount: 1000,
            // unicodeDate: true,
        })
        // $('#GoodsButton').click(function() {
        //     // debugger;
        //     var applicant_id = $('#applicant_id').val();
        //     var applicant_name = $('#applicant_id :selected').text();

        //     // console.log(dname);
        //     $.ajax({
        //         type: 'POST',
        //         dataType: 'json',
        //         url: "{{ route($_base_route.'.applicantid')}}",
        //         data: {
        //             applicant_id: applicant_id,
        //             applicant_name: applicant_name,
        //         },
        //         success: function(data) {
        //             //  debugger;
        //             if (data) {
        //                 console.log(data);
        //                 debugger
        //                 var html_option = '';
        //                 $.each(data.data, function(key, val) {
        //                     html_option += '<div class="form-group row" style="font-size: 17px; font-weight: bold; text-align: center;">';
        //                     html_option += `<div class="col-sm-2 control-label"> <input type="checkbox" style="scale: 1.5;" id="vehicle1" name="worker_id[]" value="${val.full_name}"></div>`;
        //                     html_option += `<div class="col-sm-2 control-label"><small>${val.full_name}</small></div>`;
        //                     html_option += `<div class="col-sm-2 control-label"><small>${val.worker_types}</small></div>`;
        //                     html_option += `<div class="col-sm-2 control-label"><small>${val.mobile}</small></div>`;
        //                     html_option += `<div class="col-sm-2 control-label"><small>${val.time}</small></div>`;
        //                     html_option += `<div class="col-sm-2 control-label"><small>${val.occupation}</small></div>`;
        //                     html_option += '</div>';
        //                 });
        //                 $('#GoodsList').html(html_option);
        //             } else {
        //                 alert('No data found');
        //             }
        //         }
        //     });
        // });
    });

    //total amount
    function sum(e) {
        debugger;
        var qties = document.getElementsByClassName('amount');
        for (var i = 0; i < qties.length; i++) {
            var closest = qties[i].closest('.newtrans');
            var qty = qties[i].value;
            var amount = closest.getElementsByClassName('amount')[0].value || 0;
            var exp = closest.getElementsByClassName('expenditure')[0].value || 0;
            var total = parseFloat(amount) * parseFloat(exp);
            closest.getElementsByClassName('tamount')[0].value = total;
        }
    }
</script>

<!-- खेत बिबरण -->
<script>
    $(document).on('click', '.js-pr-row-add', function() {
        $('.mynewprodtable').append($('.mynewprodtable').find('tr.prod-multyfield:last').clone());
    });
    $(document).on('click', '.js-pr-row-delete', function() {
        if ($('.prod-multyfield').length > 1)
            $('.mynewprodtable').find('tr.prod-multyfield:last').remove();
    });
</script>
<!-- बिउ बिजन -->
<script>
    $(document).on('click', '.js-pr1-row-add', function() {
        $('.aujaartable').append($('.aujaartable').find('tr.prod-multyfield:last').clone());
    });
    $(document).on('click', '.js-pr1-row-delete', function() {
        if ($('.prod-multyfield').length > 1)
            $('.aujaartable').find('tr.prod-multyfield:last').remove();
    });
</script>
<!-- औजारहरू -->
<script>
    $(document).on('click', '.js-pr2-row-add', function() {
        $('.malbibrantable').append($('.malbibrantable').find('tr.prod-multyfield:last').clone());
    });
    $(document).on('click', '.js-pr2-row-delete', function() {
        if ($('.prod-multyfield').length > 1)
            $('.malbibrantable').find('tr.prod-multyfield:last').remove();
    });
</script>
<!-- बाली लगाएपछि गर्नुपर्ने कार्यतालिका -->
<script>
    $(document).on('click', '.js-pr2-row-add', function() {
        $('.shedule').append($('.shedule').find('tr.prod-multyfield:last').clone());
    });
    $(document).on('click', '.js-pr2-row-delete', function() {
        if ($('.prod-multyfield').length > 1)
            $('.shedule').find('tr.prod-multyfield:last').remove();
    });
</script>
@endsection
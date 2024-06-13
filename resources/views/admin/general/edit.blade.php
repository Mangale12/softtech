@extends('layouts.admin')
@section('title', 'नयाँ किसान प्रोफाइल')
@section('css')
<!--Form Wizard-->
<link href="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/css/nepali.datepicker.v3.7.min.css')}}" rel="stylesheet" />
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
                <h6><a href="#">नयाँ किसान प्रोफाइल </a></h6>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <!--progress bar start-->
        @include('admin.general.edit-stepper')
        <br>
        <form action="{{ route($_base_route.'.update',  $data['single']->unique_id )}}" method="POST" enctype="multipart/form-data">
            <section class="card">
                <div class="card-body">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="full_name">पुरा नाम</label> <br>
                                <input class="form-control rounded" type="text" id="full_name" value="@if(isset($data['single']->full_name)) {{ $data['single']->full_name }} @else {{ old('full_name') }}  @endif" name="full_name" readonly placeholder="पुरा नाम">
                                @if($errors->has('full_name'))
                                <p id="name-error" class="help-block" for="full_name"><span>{{ $errors->first('full_name') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="email">इमेल</label>
                                <input class="form-control rounded" type="email" value="@if(isset($data['single']->email)) {{ $data['single']->email }} @else {{ old('email') }}  @endif" id="email" name="email" readonly placeholder="example@gmail.com">
                                @if($errors->has('email'))
                                <p id="name-error" class="help-block " for="email"><span>{{ $errors->first('email') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="mobile">मोबाइल नं</label>
                                <input class="form-control rounded" type="text" value="@if(isset($data['single']->email)) {{ $data['single']->email }} @else {{ old('email') }}  @endif" id="mobile" readonly name="mobile" placeholder="9742867915">
                                @if($errors->has('mobile'))
                                <p id="name-error" class="help-block " for="mobile"><span>{{ $errors->first('mobile') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="occupation">पेशा</label>
                                <input class="form-control rounded" type="text" value="@if(isset($data['single']->occupation)) {{ $data['single']->occupation }} @else {{ old('occupation') }}  @endif" id="occupation" name="occupation" placeholder="पेशा">
                                @if($errors->has('occupation'))
                                <p id="name-error" class="help-block " for="occupation"><span>{{ $errors->first('occupation') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="blood_group">ब्लड ग्रुप</label>
                                <select name="blood_group" id="blood_group" class="form-control">
                                    <option value=>छान्नुहोस्</option>
                                    <option value="A+" @if($data['single']->blood_group == 'A+') selected @endif>A+</option>
                                    <option value="A-" @if($data['single']->blood_group == 'A-') selected @endif>A-</option>
                                    <option value="B+" @if($data['single']->blood_group == 'B+') selected @endif>B+</option>
                                    <option value="B-" @if($data['single']->blood_group == 'B-') selected @endif>B-</option>
                                    <option value="O+" @if($data['single']->blood_group == 'O+') selected @endif>O+</option>
                                    <option value="O-" @if($data['single']->blood_group == 'O-') selected @endif>O-</option>
                                    <option value="AB+" @if($data['single']->blood_group == 'AB+') selected @endif>AB+</option>
                                    <option value="AB-" @if($data['single']->blood_group == 'AB-') selected @endif>AB-</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="gender">लिंग</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value=>छान्नुहोस्</option>
                                    <option value="पुरुष" @if (old('gender')=='पुरुष' ) selected="selected" @endif @if($data['single']->gender == 'पुरुष') selected @endif>पुरुष</option>
                                    <option value="महिला" @if (old('gender')=='महिला' ) selected="selected" @endif @if($data['single']->gender == 'महिला') selected @endif>महिला</option>
                                    <option value="अन्य" @if (old('gender')=='अन्य' ) selected="selected" @endif @if($data['single']->gender == 'अन्य') selected @endif>अन्य</option>
                                </select>
                                @if($errors->has('gender'))
                                <p id="name-error" class="help-block " for="gender"><span>{{ $errors->first('gender') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>वैवाहिक स्थिति</label>
                                <select name="marital_status" id="gender" class="form-control">
                                    <option value=>छान्नुहोस्</option>
                                    <option value="बिबाहित" @if (old('marital_status')=='बिबाहित' ) selected="selected" @endif @if($data['single']->marital_status == 'बिबाहित') selected @endif>बिबाहित</option>
                                    <option value="अबिबाहित" @if (old('marital_status')=='अबिबाहित' ) selected="selected" @endif @if($data['single']->marital_status == 'अबिबाहित') selected @endif>अबिबाहित</option>
                                    <option value="डिभोर्स" @if (old('marital_status')=='डिभोर्स' ) selected="selected" @endif @if($data['single']->marital_status == 'डिभोर्स') selected @endif>डिभोर्स </option>
                                </select>
                                @if($errors->has('marital_status'))
                                <p id="name-error" class="help-block " for="marital_status"><span>{{ $errors->first('marital_status') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="dob">जन्म मिति</label>
                                <div class="input-group date dpMonths">
                                    <input type="text" readonly class="form-control" value="@if(isset($data['single']->dob)) {{ $data['single']->dob }} @endif" name="dob" id="dob" placeholder="जन्म मिति" aria-label="Right Icon" aria-describedby="dp-mdo">
                                    <div class="input-group-append">
                                        <button id="dp-mdo" class="btn btn-primary" type="button"><i class="fa fa-calendar f14"></i></button>
                                    </div>
                                </div>
                                @if($errors->has('dob'))
                                <p id="name-error" class="help-block " for="dob"><span>{{ $errors->first('dob') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="permanent_province">स्थायी प्रदेश</label> <br>
                                <select name="permanent_state" id="province_id" class="form-control select-two a">
                                    <option value=>छान्नुहोस्</option>
                                    @if(count($data['province']) != 0)
                                    @foreach($data['province'] as $row)
                                    <option value="{{ $row->id }}" {{ $row->id }}" {{ $row->id == 3 ? 'selected' : '' }}>{{ $row->province_np }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="applicant_permanent_district" class="col-form-label text-md-end">जिल्ला</label>
                                <select name="permanent_district" id="district_id" class="form-control select-two a">
                                    <option value=>छान्नुहोस्</option>
                                    @foreach($data['district'] as $row)
                                    <option value="{{ $row->id }}" {{ $row->id }}" {{ $row->id == 28 ? 'selected' : '' }}>{{ $row->district_np }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="applicant_permanent_palika" class="col-form-label text-md-end">स्थानीय तह</label>
                                <select name="permanent_palika" id="palika_id" class="form-control select-two a">
                                    <option value="0">छान्नुहोस्</option>
                                    @foreach($data['palika'] as $row)
                                    <option value="{{ $row->id }}" {{ $row->id == 309 ? 'selected' : '' }}>{{ $row->palika_np }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Progress Bar Buttons-->
            <!-- Begin Progress Bar Buttons-->
            <div class="form-group pull-right">
                <a href="{{ route($_base_route.'.index')}}" class="btn btn-danger btn-sm "><i class="fa fa-undo"></i> पछाडि फर्कनुहोस्</a>
                <button class="btn btn-success btn-sm " type="submit" style="cursor: pointer;"><i class="fa fa-save"></i> सुरक्षित गर्नुहोस्
                </button>
            </div>
            <!-- End Progress Bar Buttons-->
        </form>
    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/js/nepali.datepicker.v3.7.min.js')}}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var jq = $.noConflict();
    jq(document).ready(function() {
        /*************************NepaliDate picker *********************/
        jq("#dob").nepaliDatePicker({
            ndpYear: true,
            ndpMonth: true,
            ndpYearCount: 1000,
            disableAfter: GetNepaliCurrentDate(),
            // disableBefore:
            // unicodeDate: true,
        });

        function GetNepaliCurrentDate() {
            var selectedDate = NepaliFunctions.GetCurrentBsDate();
            var month = (selectedDate.month.toString().length == 2) ? selectedDate.month : '0' + selectedDate.month;
            var day = (selectedDate.day.toString().length == 2) ? selectedDate.day : '0' + selectedDate.day;
            var date = selectedDate.year + '-' + month + '-' + day;
            return date;
        }
    });

    // function GetNepaliCurrentDateEnglish() {
    //     var today = new Date();
    //     var dd = today.getDate();
    //     var mm = today.getMonth() + 1; //January is 0 so need to add 1 to make it 1!
    //     var yyyy = today.getFullYear();
    //     if (dd < 10) {
    //         dd = '0' + dd
    //     }
    //     if (mm < 10) {
    //         mm = mm
    //     }
    //     var today = yyyy + '-' + mm + '-' + dd;
    //     console.log(today);
    //     return today;
    // }
</script>
<script>
    //Get  Permanent District
    $('#province_id').change(function() {
        var idProvince = this.value;
        $("#district").html('');
        var url = "{{route('getDistrict')}}";
        $.ajax({
            url: url,
            type: "POST",
            data: {
                province_id: idProvince,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(result) {
                //debugger;
                // console.log(result);
                $('#district_id').html('<option value="">-- छान्नुहोस् --</option>');
                $.each(result.district, function(key, value) {
                    $("#district_id").append('<option value="' + value.id + '">' + value.district_np + '</option>');
                });
                $('#palika').html('<option value="">-- Select Palika --</option>');
            }
        });
    });
    //Get permanent Palika
    $('#district_id').change(function() {
        var idDistrict = this.value;
        $("#palika_id").html('');
        var url = "{{route('getPalika')}}";
        $.ajax({
            url: url,
            type: "POST",
            data: {
                district_id: idDistrict,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(result) {
                // console.log(result);
                $('#palika_id').html('<option value="">--छान्नुहोस् --</option>');
                $.each(result.palika, function(key, value) {
                    $("#palika_id").append('<option value="' + value.id + '">' + value.palika_np + '</option>');
                });
            }
        });
    });
    //Get  temp District
    $('#province_id_temp').change(function() {
        var idProvince = this.value;
        $("#district_id_temp").html('');
        var url = "{{route('getDistrict')}}";
        $.ajax({
            url: url,
            type: "POST",
            data: {
                province_id: idProvince,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(result) {
                //debugger;
                console.log(result);
                $('#district_id_temp').html('<option value="">-- छान्नुहोस् --</option>');
                $.each(result.district, function(key, value) {
                    $("#district_id_temp").append('<option value="' + value.id + '">' + value.district_np + '</option>');
                });
                $('#palika').html('<option value="">-- Select Palika --</option>');
            }
        });
    });
    //Get Temp Palika
    $('#district_id_temp').change(function() {
        var idDistrict = this.value;
        $("#palika_id_temp").html('');
        var url = "{{route('getPalika')}}";
        $.ajax({
            url: url,
            type: "POST",
            data: {
                district_id: idDistrict,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(result) {
                // console.log(result);
                $('#palika_id_temp').html('<option value="">--छान्नुहोस् --</option>');
                $.each(result.palika, function(key, value) {
                    $("#palika_id_temp").append('<option value="' + value.id + '">' + value.palika_np + '</option>');
                });
            }
        });
    });
</script>
@endsection
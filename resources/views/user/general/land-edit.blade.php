@extends('layouts.user')
@section('title', 'जग्गा बिबरण')
@section('css')
<!--Form Wizard-->
<link href="{{ asset('assets/cms/assets/select2/css/select2.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">जग्गा बिबरण</a></li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <!--progress bar start-->
        @include('admin.general.stepper')
        <div style="margin-left:1000px; padding-bottom: 5px;">
            <button type="button" class="js-sw-row-add btn btn-info btn-sm btn-file">
                <i class="fa fa-plus" title="add"> नयाँ थप्नुस</i>
            </button>
        </div>
        <form action="{{ route($_base_route.'.land-update',  $data['single']->unique_id )}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <section class="card clone-file">
                <div class="card-body control-group ">
                    <div class="row ">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="kita_no">कित्ता नं</label> <br>
                                <input class="form-control rounded" type="text" id="kita_no" value="@if(isset($data['single']->kita_no)) {{ $data['single']->kita_no }} @else {{ old('kita_no') }}  @endif" name="kita_no" placeholder="">
                                @if($errors->has('kita_no'))
                                <p id="name-error" class="help-block" for="kita_no"><span>{{ $errors->first('kita_no') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="temporary_province">अस्थायी प्रदेश</label> <br>
                                <select name="temporary_province" id="province_id_temp" class="form-control">
                                    <option value=>छान्नुहोस्</option>
                                    @foreach($data['province'] as $row)
                                    <option value="{{ $row->id }}">{{ $row->province_np }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('temporary_province'))
                                <p id="name-error" class="help-block" for="temporary_province"><span>{{ $errors->first('temporary_province') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="applicant_permanent_district" class="col-form-label text-md-end">जिल्ला</label>
                                <label for="temporary_district">जिल्ला</label> <br>
                                <select name="temporary_district" id="district_id_temp" class="form-control">
                                    <option value=>छान्नुहोस्</option>
                                    @foreach($data['district'] as $row)
                                    <option value="{{ $row->id }}">{{ $row->district_np }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('temporary_district'))
                                <p id="name-error" class="help-block" for="temporary_district"><span>{{ $errors->first('temporary_district') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="temporary_municipality">पालिका</label> <br>
                                <select name="temporary_municipality" id="palika_id_temp" class="form-control">
                                    <option value=>छान्नुहोस्</option>
                                    @foreach($data['palika'] as $row)
                                    <option value="{{ $row->id }}">{{ $row->palika_np }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('temporary_municipality'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('temporary_municipality') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="applicant_permanent_ward" class="col-form-label text-md-end">वडा न.</label>
                                <input class="form-control rounded" type="text" id="applicant_permanent_ward" value="@if(isset($data['single']->applicant_permanent_ward)) {{ $data['single']->applicant_permanent_ward }} @else {{ old('applicant_permanent_ward') }}  @endif" name="applicant_permanent_ward" placeholder="">
                                @if($errors->has('applicant_permanent_ward'))
                                <p id="name-error" class="help-block" for="kita_no"><span>{{ $errors->first('applicant_permanent_ward') }}</span></p>
                                @endif

                            </div>
                        </div>
                        <div class="col-md-3">
                            <p>जग्गाको जम्मा क्षेत्रफल : जग्गा मापन एकाइ [बिगाह-कट्ठा-धुर] </p>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="ekai_id">मापन एकाइ</label>
                                <select name="ekai_id" id="ekai_id" class="form-control select-two">
                                    <option value="">--मापन एकाइ छान्नुहोस्--</option>
                                    <option value="1">रोपनी-आना-पैसा-दाम</option>
                                    <option value="2">बिगाह-कट्ठा-धुर</option>
                                </select>
                                @if($errors->has('ekai_id'))
                                <p id="name-error" class="help-block " for="ekai_id"><span>{{ $errors->first('ekai_id') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-12 Bigha" style="display:none;">
                            <div class="position-relative form-group">
                                <div class="table-responsive">
                                    <table class="mb-0 table table-hover">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>बिगाह</th>
                                                <th>कट्ठा</th>
                                                <th>धुर</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>कुल क्षेत्रफल</td>
                                                <td><input class="form-control" min="0" type="number" id="totalbigaha" name="totalbigaha" value=""></td>
                                                <td><input class="form-control" min="0" max="" type="number" id="totalkattha" name="totalkattha" value=""></td>
                                                <td><input class="form-control" min="0" max="" type="number" id="totaldhur" name="totaldhur" value=""></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-12 Ropani" style="display:none;">
                            <div class="position-relative form-group">
                                <div class="table-responsive">
                                    <table class="mb-0 table table-hover">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>रोपनी</th>
                                                <th>आना</th>
                                                <th>पैसा</th>
                                                <th>दाम</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>कुल क्षेत्रफल</td>
                                                <td><input class="form-control" type="number" id="totalropani" name="totalropani" value=""></td>
                                                <td><input class="form-control" min="0" max="" type="number" id="totalaana" name="totalaana" value=""></td>
                                                <td><input class="form-control" min="0" max="" type="number" id="totalpaisa" name="totalpaisa" value=""></td>
                                                <td><input class="form-control" min="0" max="" type="number" id="totaldam" name="totaldam" value=""></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group pull-right">
                        <button type="button" class="btn btn-danger btn-sm btn-remove"><i class="fa fa-trash-o "></i> Remove </button>
                    </div>
                </div>
            </section>

            <section class="card file-block">

            </section>
            <!-- End Progress Bar Buttons-->
            <!-- Begin Progress Bar Buttons-->
            <div class="form-group pull-right">
                <a href="{{ route($_base_route.'.family-edit', ['unique_id' => $data['unique_id']])}}" class="btn btn-danger btn-sm "><i class="fa fa-undo"></i> पछाडि फर्कनुहोस्</a>
                <button class="btn btn-success btn-sm " type="submit" style="cursor: pointer;"><i class="fa fa-save"></i> सुरक्षित गर्नुहोस् </button>
            </div>
            <!-- End Progress Bar Buttons-->
        </form>
    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('assets/cms/assets/select2/js/select2.min.js')}}"></script>
<script>
    $(document).ready(function() {
        //ekai change 
        $("#ekai_id").change(function() {
            var ekai_id = $(this).val();
            if (ekai_id == 1) {
                $(".Ropani").show();
                $(".Bigha").hide();
                $("#totalbigaha").val("");
                $("#totalkattha").val("");
                $("#totaldhur").val("");
            } else if (ekai_id == 2) {
                $(".Bigha").show();
                $(".Ropani").hide();
                $("#totalropani").val("");
                $("#totalaana").val("");
                $("#totalpaisa").val("");
                $("#totaldam").val("");
            } else {
                $(".Bigha").hide();
                $(".Ropani").hide();
                $("#totalropani").val("");
                $("#totalaana").val("");
                $("#totalpaisa").val("");
                $("#totaldam").val("");
                $("#totalbigaha").val("");
                $("#totalkattha").val("");
                $("#totaldhur").val("");
            }
        });
        //select 2
        $(".select-two").select2({
            // allowClear: true
        });

        //Land Detail
        $(".btn-file").click(function() {
            var html = $(".clone-file").html();
            $(".file-block").prepend(html);
        });

        $("body").on("click", ".btn-remove", function() {
            $(this).parents(".control-group").remove();
        });
    });
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
@extends('layouts.admin')
@section('title', 'जग्गा बिबरण')
@section('css')
<!--Form Wizard-->
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
                <h6><a href="#">जग्गा बिबरण </a></h6>
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
        <form action="{{ route($_base_route.'.land-update',  $data['single']->unique_id )}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <input id="unique_id" name="unique_id" type="hidden" value="{{ $data['single']->unique_id }}">
            <input id="land_id" name="land_id" type="hidden" value="{{ $data['single']->id }}">

            <section class="card clone-file">
                <div class="card-body control-group ">
                    <div class="row ">
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="kita_no">कित्ता नं</label> <br>
                                <input class="form-control rounded" type="text" id="kita_no" value="@if(isset($data['single']->kita_no)) {{ $data['single']->kita_no }}@endif" name="kita_no" placeholder="0">
                                @if($errors->has('kita_no'))
                                <p id="name-error" class="help-block" for="kita_no"><span>{{ $errors->first('kita_no') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="temporary_province">प्रदेश</label> <br>
                                <select name="temporary_province" id="province_id" class="form-control">
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
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="applicant_permanent_district">जिल्ला</label>
                                <select name="temporary_district" id="district_id" class="form-control">
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
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="temporary_municipality">पालिका</label> <br>
                                <select name="temporary_municipality" id="palika_id" class="form-control">
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
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="ward_id">वडा न.</label>
                                <input class="form-control rounded" type="text" id="ward_id" value="@if(isset($data['single']->ward_id)) {{ $data['single']->ward_id }} @endif" name="ward_id" placeholder="0">
                                @if($errors->has('ward_id'))
                                <p id="name-error" class="help-block" for="kita_no"><span>{{ $errors->first('ward_id') }}</span></p>
                                @endif

                            </div>
                        </div>
                        <div class="col-md-2">
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
                        <div class="col-md-2">
                            <div class="form-group pull-right">
                                <button type="button" id="store_land" class="btn btn-success btn-sm btn-remove"><i class="fa fa-plus "></i> थप्नुहोस </button>
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
                                                <td><input class="form-control" min="0" type="number" id="totalropani" name="totalropani" value=""></td>
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
                </div>
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
<div class="row">
    <div class="col-sm-12">
        <section class="card">
            <header class="card-header no-border">
                जग्गा बिबरण
            </header>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>कित्ता नं</th>
                        <th>प्रदेश</th>
                        <th>जिल्ला</th>
                        <th>पालिका</th>
                        <th>वडा न.</th>
                        <th>मापन एकाइ</th>
                        <th>बिगाह</th>
                        <th>कट्ठा</th>
                        <th>धुर</th>
                        <th>रोपनी</th>
                        <th>आना</th>
                        <th>पैसा</th>
                        <th>दाम</th>
                        <th>सम्पादन</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($data['land_list']) && $data['land_list']->count() > 0)
                    @foreach($data['land_list'] as $key =>$row)
                    <tr>
                        <td>{{getUnicodeNumber($row->kita_no) }}</td>
                        <td> @if(isset($row->getProvince)) {{ $row->getProvince->province_np  }} @endif</td>
                        <td>@if(isset($row->getDistrict)) {{ $row->getDistrict->district_np  }} @endif</td>
                        <td>@if(isset($row->getPalika)) {{ $row->getPalika->palika_np  }} @endif</td>
                        <td>{{ getUnicodeNumber($row->permanent_ward )}}</td>
                        <td>{{ ($row->ekai_id == 1 ) ? 'रोपनी-आना-पैसा-दाम' : 'बिगाह-कट्ठा-धुर'}}</td>
                        <td>{{ ($row->totalbigaha) ? getUnicodeNumber($row->totalbigaha) : '-'}}</td>
                        <td>{{ ($row->totalkattha) ? getUnicodeNumber($row->totalkattha) : '-'}}</td>
                        <td>{{ ($row->totaldhur) ? getUnicodeNumber($row->totaldhur) : '-'}}</td>
                        <td>{{ ($row->totalropani) ? getUnicodeNumber($row->totalropani) : '-'}}</td>
                        <td>{{ ($row->totalaana) ? getUnicodeNumber($row->totalaana) : '-'}}</td>
                        <td>{{ ($row->totalpaisa) ? getUnicodeNumber($row->totalpaisa) : '-'}}</td>
                        <td>{{ ($row->totaldam) ? getUnicodeNumber($row->totaldam) : '-'}}</td>
                        <td>
                            @if(Route::has($_base_route.'.destroyLand'))
                            <button id="delete" data-id="{{ $row->id }}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete" data-url="{{ URL::route($_base_route.'.destroyLand', ['id' => $row->id]) }}" style="cursor:pointer;"><i class="fa fa-trash-o "></i></button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="13" class="text-center">कुनै डाटा उपलब्ध छैन</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </section>
    </div>
</div>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
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
        //store land // Store Land Details
        $(document).on('click', '#store_land', function(e) {
            var land_id = $('#land_id').val();
            var unique_id = $('#unique_id').val();
            var kita_no = $('#kita_no').val();
            var province_id = $('#province_id').val();
            var district_id = $('#district_id').val();
            var palika_id = $('#palika_id').val();
            var ward_id = $('#ward_id').val();
            var ekai_id = $('#ekai_id').val();
            var totalbigaha = $('#totalbigaha').val();
            var totalkattha = $('#totalkattha').val();
            var totaldhur = $('#totaldhur').val();
            var totalropani = $('#totalropani').val();
            var totalaana = $('#totalaana').val();
            var totalpaisa = $('#totalpaisa').val();
            var totaldam = $('#totaldam').val();
            var url = "{{route('admin.general.storeLand')}}";
            $.ajax({
                url: url,
                type: "POST",
                dataType: 'json',
                data: {
                    land_id: land_id,
                    unique_id: unique_id,
                    kita_no: kita_no,
                    province_id: province_id,
                    district_id: district_id,
                    palika_id: palika_id,
                    ward_id: ward_id,
                    ekai_id: ekai_id,
                    totalbigaha: totalbigaha,
                    totalkattha: totalkattha,
                    totaldhur: totaldhur,
                    totalropani: totalropani,
                    totalaana: totalaana,
                    totalpaisa: totalpaisa,
                    totaldam: totaldam,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result) {
                    console.log(result);
                    if (result.status == 'success') {
                        toastr.success(result.message);
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                    } else {
                        toastr.error(result.message);
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                    }
                }
            });
        })
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
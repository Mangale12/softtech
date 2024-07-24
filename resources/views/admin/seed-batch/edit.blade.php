@extends('layouts.admin')
@section('title', 'हाइब्रिड बीउ')

@section('content')
<link href="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/css/nepali.datepicker.v3.7.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<div class="row">
    <div class="col-lg-8">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">हाइब्रिड बीउ</a></li>
                <li class="breadcrumb-item"><a href="#">हाइब्रिड बीउ</a></li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-12">
        {{-- {{ dd($_base_route) }} --}}
        <form action="{{ route($_base_route.'.update', $data['row']->id)}}" method="POST" enctype="multipart/form-data">
            <section class="card">
                <header class="card-header">
                    हाइब्रिड बीउ उत्पादन ब्याच
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <table class="table table-bordered" id="dynamicTable">
                            <tr>
                                <th>उत्पादन ब्याच नं .</th>
                                <th>बीउको नाम <span class="text-danger">*</span></th>
                                <th>उत्पादन मिति <span class="text-danger">*</span></th>
                                <th> म्याद समाप्ति <span class="text-danger">*</span></th>
                                <th>उत्पादन भएको मात्रा <span class="text-danger">*</span></th>
                                {{-- <th> चेतावनी दिन</th> --}}
                            </tr>
                            <tr>
                                <td style="width:10rem">
                                    <input type="text" name="batch_no" value="{{ $data['row']->batch_no }}" class="form-control"/>
                                    @if($errors->has('batch_no'))
                                    <p id="seed-id-error" class="help-block" for="seed-id-error"><span>{{ $errors->first('batch_no') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:20rem">
                                    <select name="seed_id" id="" class="form-control">
                                        <option selected disabled >बीउको नाम छान्नुहोस्</option>
                                        @foreach ($data['seeds'] as $seed)
                                            <option value="{{ $seed['id'] }}" {{ old('seed_id',$data['row']->seed_id) == $seed['id'] ? 'selected' : '' }}>{{ $seed['seed_name'] }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('seed_id'))
                                    <p id="seed-id-error" class="help-block" for="seed-id-error"><span>{{ $errors->first('seed_id') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:20rem">
                                    <input class="form-control rounded " type="text" id="date" value="{{getStandardNumber( $data['row']->manufacturing_date)}}" name="manufacturing_date" placeholder="बीज मिति" readonly>
                                    @if($errors->has('manufacturing_date'))
                                    <p id="manufacturing_date-error" class="help-block" for="manufacturing_date"><span>{{ $errors->first('manufacturing_date') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:20rem">
                                    <input class="form-control rounded " type="text" id="expiry-date" value="{{getStandardNumber($data['row']->expiry_date)}}" name="expiry_date" placeholder="मिति" readonly>
                                    @if($errors->has('expiry_date'))
                                    <p id="expiry_date-error" class="help-block" for="expiry_date"><span>{{ $errors->first('expiry_date') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:20rem">
                                    <input type="number" value="{{ old('quantity_produced', $data['row']->quantity_produced) }}" name="quantity_produced" placeholder="उत्पादन भएको मात्रा" class="form-control" />
                                    @if($errors->has('quantity_produced'))
                                    <p id="quantity_produced-error" class="help-block" for="quantity_produced"><span>{{ $errors->first('quantity_produced') }}</span></p>
                                    @endif
                                </td>
                            </tr>
                        </table>

                        <table class="table table-bordered" id="dynamicTable">
                            <tr>
                                <th>सिजन <span class="text-danger">*</span></th>
                                {{-- <th>सिजन छान्नुहोस् <span class="text-danger">*</span></th> --}}
                                <th>एकाइ <span class="text-danger">*</span></th>
                                <th>एकाइ मूल्य <span class="text-danger">*</span></th>
                                <th> भूमि क्षेत्र <span class="text-danger">*</span></th>
                                {{-- <th> चेतावनी दिन</th> --}}
                            </tr>
                            <tr>
                                <td style="width:20rem">
                                    <select name="season_id" id="" class="form-control">
                                        <option selected disabled >सिजन छान्नुहोस्</option>
                                        @foreach ($data['seasons'] as $season)
                                            <option value="{{ $season['id'] }}" {{ old('season_id', $data['row']->season_id) == $season['id'] ? 'selected' : '' }}>{{ $season['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('season_id'))
                                    <p id="season-id-error" class="help-block" for="season-id-error"><span>{{ $errors->first('season_id') }}</span></p>
                                    @endif
                                </td>

                                <td style="width:20rem">
                                    <select name="unit_id" id="" class="form-control">
                                        <option selected disabled >एकाइ छान्नुहोस्</option>
                                        @foreach ($data['units'] as $unit)
                                            <option value="{{ $unit['id'] }}" {{ old('unit_id', $data['row']->unit_id) == $unit['id'] ? 'selected' : '' }}>{{ $unit['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('unit_id'))
                                    <p id="unit-id-error" class="help-block" for="unit-id-error"><span>{{ $errors->first('unit_id') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:20rem">
                                    <input type="text" value="{{ old('unit_price', $data['row']->unit_price) }}" name="unit_price" placeholder="Rs" class="form-control" />
                                    @if($errors->has('unit_price'))
                                    <p id="unit_price-error" class="help-block" for="unit_price"><span>{{ $errors->first('unit_price') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:20rem">
                                    <textarea class="form-control rounded" name="land_area" id="land-area">{{ $data['row']->land_area }}</textarea>
                                    @if($errors->has('land_area'))
                                    <p id="land_area-error" class="help-block" for="land_area"><span>{{ $errors->first('land_area') }}</span></p>
                                    @endif
                                </td>
                                {{-- <td style="width:20rem">
                                    <input type="number" value="{{ old('warning_days') }}" name="warning_days" placeholder="चेतावनी दिन" class="form-control" />
                                </td> --}}

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
        $('#expiry-date').nepaliDatePicker({
            dateFormat: 'DD/MM/YYYY',
            closeOnDateSelect: true
        });
        var i = 0;
        $(".adRow").on("click", function() {
            console.log("test");
            var newRow = $("<tr class='new1'>");
            var cols = "";
            cols += '<td><select class="form-control acctype" name="seed_ids[]" required><option selected disabled>कच्चा पद्दार्थ छान्नुहोस्</option>@foreach ($data["seeds"] as $index=>$value)<option value="{{ $value["id"] }}">{{ $value["seed_name"] }}</option>@endforeach</select></td>';
            cols += '<td><input required type="text" class="form-control raw-material-quantity" name="quantity[]"></td>';
            cols += '<td><a href="#" class="btn btn-danger remove" onclick="DeleteRow(this)"><i class="fa fa-trash-o "></i></a></td>';
            newRow.append(cols);
            // alert(cols);
            $(".add-raw-materials").append(newRow);
            i++;
        });
        $(".add-raw-materials").on("click", ".remove", function(event) {
            $(this).closest("tr").remove();
            i--;
        });
    });
    function DeleteRow(e) {
            // debugger;
            var row = $(e).closest('.new1');
            var confirmValue = confirm("Are you sure to delete ?");
            if (confirmValue) {
                $(row).remove();
            }
        }

</script>


@endsection

@extends('layouts.admin')
@section('title', 'हाइब्रिड बीउ')

@section('content')
<link href="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/css/nepali.datepicker.v3.7.min.css')}}" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
        <form action="{{ route($_base_route.'.store')}}" method="POST" enctype="multipart/form-data">
            <section class="card">
                <header class="card-header">
                    हाइब्रिड बीउ उत्पादन ब्याच
                </header>
                <div class="card-body">
                    @csrf
                    <input type="hidden" name="udhyog" value="{{ request()->udhyog }}">
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
                                    <input type="text" name="batch_no" value="" class="form-control"/>
                                    @if($errors->has('batch_no'))
                                    <p id="seed-id-error" class="help-block" for="seed-id-error"><span>{{ $errors->first('batch_no') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:20rem">
                                    <select name="seed_id" id="" class="form-control">
                                        <option selected disabled >बीउको नाम छान्नुहोस्</option>
                                        @foreach ($data['product_seeds'] as $seed)
                                            <option value="{{ $seed['id'] }}" {{ old('seed_id') == $seed['id'] ? 'selected' : '' }}>{{ $seed['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('seed_id'))
                                    <p id="seed-id-error" class="help-block" for="seed-id-error"><span>{{ $errors->first('seed_id') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:20rem">
                                    <input class="form-control rounded " type="text" id="date" value="{{getStandardNumber( $data['nep_date_unicode'])}}" name="manufacturing_date" placeholder="बीज मिति" readonly>
                                    @if($errors->has('manufacturing_date'))
                                    <p id="manufacturing_date-error" class="help-block" for="manufacturing_date"><span>{{ $errors->first('manufacturing_date') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:20rem">
                                    <input class="form-control rounded " type="text" id="expiry-date" value="{{getStandardNumber( $data['nep_date_unicode'])}}" name="expiry_date" placeholder="मिति" readonly>
                                    @if($errors->has('expiry_date'))
                                    <p id="expiry_date-error" class="help-block" for="expiry_date"><span>{{ $errors->first('expiry_date') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:20rem">
                                    <input type="number" value="{{ old('quantity_produced') }}" name="quantity_produced" placeholder="उत्पादन भएको मात्रा" class="form-control" />
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
                                <th>एकाइ मूल्य<span class="text-danger">*</span></th>
                                <th> भूमि क्षेत्र <span class="text-danger">*</span></th>
                                {{-- <th> चेतावनी दिन</th> --}}
                            </tr>
                            <tr>
                                <td style="width:20rem">
                                    <select name="season_id" id="" class="form-control">
                                        <option selected disabled >सिजन छान्नुहोस्</option>
                                        @foreach ($data['seasons'] as $season)
                                            <option value="{{ $season['id'] }}" {{ old('season_id') == $season['id'] }}>{{ $season['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('season_id'))
                                    <p id="season-id-error" class="help-block" for="season-id-error"><span>{{ $errors->first('season_id') }}</span></p>
                                    @endif
                                </td>

                                <td style="width:20rem">
                                    <select name="batch_unit_id" id="" class="form-control">
                                        <option selected disabled >एकाइ छान्नुहोस्</option>
                                        @foreach ($data['units'] as $unit)
                                            <option value="{{ $unit['id'] }}" {{ old('batch_unit_id') == $unit['id'] ? 'selected' : '' }}>{{ $unit['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('batch_unit_id'))
                                    <p id="unit-id-error" class="help-block" for="unit-id-error"><span>{{ $errors->first('unit_id') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:20rem">
                                    <input class="form-control rounded " type="text" id="unit-price-date"  name="batch_unit_price">
                                    @if($errors->has('batch_unit_price'))
                                    <p id="unit-price-error" class="help-block" for="expiry_date"><span>{{ $errors->first('batch_unit_price') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:30rem">
                                    <textarea class="form-control rounded" name="land_area" id="land-area"></textarea>
                                    @if($errors->has('land_area'))
                                    <p id="land_area-error" class="help-block" for="land_area"><span>{{ $errors->first('land_area') }}</span></p>
                                    @endif
                                </td>
                            </tr>
                        </table>

                        {{-- <table class="table table-bordered add-raw-materials">
                            <thead>
                                <tr>
                                    <th>बिउ (<span class="text-danger">सबै क्षेत्रहरु आवश्यक छ</span>)</th>
                                    <th>बिउको प्रकार (<span class="text-danger">सबै क्षेत्रहरु आवश्यक छ</span>)</th>
                                    <th>एकाई (<span class="text-danger">सबै क्षेत्रहरु आवश्यक छ</span>)</th>
                                    <th>एकाई मूल्य (<span class="text-danger">सबै क्षेत्रहरु आवश्यक छ</span>)</th>
                                    <th>मात्रा (<span class="text-danger">सबै क्षेत्रहरु आवश्यक छ</span>)</th>
                                    <th>जम्मा मूल्य (<span class="text-danger">सबै क्षेत्रहरु आवश्यक छ</span>)</th>
                                    <th><a href="#" class="btn btn-info adRow"><i class="fa fa-plus"></i></a></th>
                                </tr>
                            </thead>
                            <tbody id="transactionbody">
                                @if(old('seed_ids'))
                                    @foreach(old('seed_ids') as $oldIndex => $oldValue)
                                        <tr class="new1">
                                            <td>
                                                <select class="form-control acctype raw-material" name="seed_ids[]">
                                                    <option selected disabled>बीउको नाम छान्नुहोस्</option>
                                                    @foreach ($data['seeds'] as $index => $value)
                                                        <option value="{{ $value->id }}" {{ old('seed_id.'.$oldIndex) == $value->id ? 'selected' : '' }}>
                                                            {{ $value['seed_name'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control acctype raw-material" name="seed_type[]">
                                                    <option selected disabled>बीउको प्रकार छान्नुहोस्</option>
                                                    @foreach ($data['seed_type'] as $index => $value)
                                                        <option value="{{ $value->id }}" {{ old('seed_type.'.$oldIndex) == $value->id ? 'selected' : '' }}>
                                                            {{ $value['name'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control acctype raw-material" name="unit_id[]">
                                                    <option selected disabled>एकाई छान्नुहोस्</option>
                                                    @foreach ($data['units'] as $index => $value)
                                                        <option value="{{ $value->id }}" {{ old('unit_id.'.$oldIndex) == $value->id ? 'selected' : '' }}>
                                                            {{ $value['name'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name="unit_price[]" class="form-control raw-material-quantity" value="{{ old('quantity.'.$oldIndex) }}">
                                            </td>
                                            <td>
                                                <input type="text" name="quantity[]" class="form-control raw-material-quantity" value="{{ old('quantity.'.$oldIndex) }}">
                                            </td>
                                            <td>
                                                <input type="text" name="total_cost[]" class="form-control raw-material-quantity" value="{{ old('quantity.'.$oldIndex) }}">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-delete" onclick="DeleteRow(this)">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                <tr class="new1">
                                    <td>
                                        <select class="form-control acctype" name="seed_ids[]">
                                            <option selected disabled>बीउको नाम छान्नुहोस्</option>
                                            @foreach ($data['seeds'] as $index => $value)
                                                <option value="{{ $value->id }}" >
                                                    {{ $value['seed_name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control acctype" name="seed_type[]">
                                            <option selected disabled>बीउको प्रकार छान्नुहोस्</option>
                                            @foreach ($data['seed_type'] as $index => $value)
                                                <option value="{{ $value->id }}" >
                                                    {{ $value['name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control acctype" name="unit_id[]">
                                            <option selected disabled>एकाई छान्नुहोस्</option>
                                            @foreach ($data['units'] as $index => $value)
                                                <option value="{{ $value->id }}">
                                                    {{ $value['name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" name="unit_price[]" class="form-control unit-price">
                                    </td>
                                    <td>
                                        <input type="text" name="quantity[]" class="form-control seed-quantity" >
                                    </td>
                                    <td>
                                        <input type="text" name="total_cost[]" class="form-control total-cost" >
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-delete" onclick="DeleteRow(this)">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endif
                            </tbody>

                        </table> --}}

                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-12">
                        {{-- <section class="card">
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
                                                <select name="mesinary_1[]" id="mesinary_1" class="form-control">
                                                    <option value=>छान्नुहोस्</option>
                                                    @if(count($data['mesinary']) != 0)
                                                    @foreach($data['mesinary'] as $row)
                                                    <option value="{{ $row->tools }}">{{ $row->tools }}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </td>
                                            <td style="width:20rem">
                                                <select name="unit_5[]" id="unit_5" class="form-control">
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
                                                <select name="mal_bibran_1[]" id="mal_bibran_1" class="form-control">
                                                    <option value=>छान्नुहोस्</option>
                                                    @if(count($data['mal']) != 0)
                                                    @foreach($data['mal'] as $row)
                                                    <option value="{{ $row->title }}">{{ $row->title }}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </td>
                                            <td style="width:20rem">
                                                <select name="unit_5[]" id="unit_5" class="form-control">
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

                                </div>

                            </fieldset>
                        </section> --}}
                        <!-- Begin Progress Bar Buttons-->
                        <div class="form-group pull-right">
                            <a href="{{ route($_base_route.'.index')}}" class="btn btn-danger btn-sm "><i class="fa fa-undo"></i> पछाडि फर्कनुहोस्</a>
                            <button class="btn btn-success btn-sm " type="submit" style="cursor: pointer;"><i class="fa fa-save"></i> सुरक्षित गर्नुहोस् </button>
                        </div>
                        <!-- End Progress Bar Buttons-->

                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/js/nepali.datepicker.v3.7.min.js')}}" type="text/javascript"></script>
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
            cols += `
                        <td>
                            <select class="form-control acctype raw-material" name="seed_ids[]">
                                <option selected disabled>बीउको नाम छान्नुहोस्</option>
                                @foreach ($data['seeds'] as $index => $value)
                                    <option value="{{ $value->id }}" >
                                        {{ $value['seed_name'] }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="form-control acctype raw-material" name="seed_type[]">
                                <option selected disabled>बीउको प्रकार छान्नुहोस्</option>
                                @foreach ($data['seed_type'] as $index => $value)
                                    <option value="{{ $value->id }}" >
                                        {{ $value['name'] }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="form-control acctype raw-material" name="unit_id[]">
                                <option selected disabled>एकाई छान्नुहोस्</option>
                                @foreach ($data['units'] as $index => $value)
                                    <option value="{{ $value->id }}">
                                        {{ $value['name'] }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="text" name="unit_price[]" class="form-control unit-price">
                        </td>
                        <td>
                            <input type="text" name="quantity[]" class="form-control seed-quantity" >
                        </td>
                        <td>
                            <input type="text" name="total_cost[]" class="form-control total-cost" >
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger btn-delete" onclick="DeleteBiu(this)">
                                <i class="fa fa-trash-o"></i>
                            </button>
                        </td>`;
            newRow.append(cols);
            // alert(cols);
            $(".add-raw-materials").append(newRow);
            i++;
        });
        $(".add-raw-materials").on("click", ".remove", function(event) {
            $(this).closest("tr").remove();
            i--;
        });

        // Function to check stock quantity
        function checkStockQuantity(element, quantity) {
            var id = $(element).closest('tr').find('select[name="raw_material[]"]').val();
            $.ajax({
                url: '{{ route("admin.inventory.production_batch.stock_quantity") }}',
                type: 'GET',
                data: {
                    id: id
                },
                success: function(response) {
                    if (response.data.stock_quantity < quantity) {
                        alert('Stock quantity is less than the entered quantity.');
                        $(element).val(1);
                    } else {
                        $("#stock-quantity").text(response.data.stock_quantity);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }

        // Event listener for quantity change
        $(document).on('change', '.raw-material-quantity', function() {
            var quantity = $(this).val();
            checkStockQuantity(this, quantity);
        });
    });
    function DeleteBiu(e) {
        // debugger;
        var row = $(e).closest('.new1');
        var confirmValue = confirm("Are you sure to delete ?");
        if (confirmValue) {
            $(row).remove();
        }
    }

    function DeleteRow(button) {
        // Existing logic to delete the row (if needed)

        // Get the quantity input element
        const quantityInput = button.parentElement.parentElement.querySelector('.raw-material-quantity');
        const enteredQuantity = parseInt(quantityInput.value);

        // Get the raw material ID from the select element
        const rawMaterialSelect = button.parentElement.parentElement.querySelector('.acctype.raw-material');
        const rawMaterialId = parseInt(rawMaterialSelect.value);

        // Find the corresponding raw material object (replace with your actual logic)
        const rawMaterial = rawMaterials.find(material => material.id === rawMaterialId);

        if (enteredQuantity > rawMaterial.stock_quantity) {
            alert('Insufficient Stock! Entered quantity exceeds available stock for ' + rawMaterial.name);
            quantityInput.value = ''; // Clear the quantity input (optional)
            return false; // Prevent further processing (e.g., row deletion)
        }

    // If quantity is valid, continue with row deletion or other actions
    }
</script>

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

<!-- औजारहरू -->
<script>
    $(document).on('click', '.js-pr1-row-add', function() {
        $('.aujaartable').append($('.aujaartable').find('tr.prod-multyfield:last').clone());
    });
    $(document).on('click', '.js-pr1-row-delete', function() {
        if ($('.prod-multyfield').length > 1)
            $('.aujaartable').find('tr.prod-multyfield:last').remove();
    });
</script>


<script>
    $(document).ready(function() {
        var i = 0;
        $(".add-raw-materials").on("input", ".seed-quantity, .unit-price", function() {
        updateTotalCost();
    });

    function updateTotalCost() {
        var totalCostByName = {};

        $(".add-raw-materials tr").each(function() {
            var $row = $(this);
            var seedName = $row.find("select[name='seed_ids[]'] option:selected").text().trim();
            var unitPrice = parseFloat($row.find(".unit-price").val()) || 0;
            var quantity = parseFloat($row.find(".seed-quantity").val()) || 0;

            var totalCost = quantity * unitPrice;

            if (!totalCostByName[seedName]) {
                totalCostByName[seedName] = 0;
            }

            totalCostByName[seedName] += totalCost;
            $row.find(".total-cost").val(totalCost.toFixed(2));
        });

        // You can use the totalCostByName object to do further processing if needed
        console.log(totalCostByName);
    }

    });
</script>
@endsection

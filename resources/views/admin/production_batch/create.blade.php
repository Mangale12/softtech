@extends('layouts.admin')
@section('title', 'सप्लाइर्स')

@section('content')
<link href="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/css/nepali.datepicker.v3.7.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<div class="row">
    <div class="col-lg-8">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">सप्लाइर्स</a></li>
                <li class="breadcrumb-item"><a href="#">उत्पादन</a></li>
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
                    उत्पादन ब्याच
                </header>
                <div class="card-body">
                    @csrf
                    <input type="hidden" name="udhyog" value="{{ request()->udhyog }}">
                    <div class="row">
                        <table class="table table-bordered" id="dynamicTable">
                            <tr>
                                <th>उत्पादन ब्याच नं .</th>
                                <th>उत्पादनको नाम <span class="text-danger">*</span></th>
                                <th>उत्पादन मिति <span class="text-danger">*</span></th>
                                <th> म्याद समाप्ति <span class="text-danger">*</span></th>
                                <th>उत्पादन भएको मात्रा <span class="text-danger">*</span></th>
                                <th>एकाइ <span class="text-danger">*</span></th>
                                <th>प्रति एकाइ मूल्य <span class="text-danger">*</span></th>
                                {{-- <th> चेतावनी दिन</th> --}}
                            </tr>
                            <tr>
                                <td style="width:20rem">
                                    <input type="text" name="batch_no" placeholder="#234ABd" class="form-control"/>
                                    @if($errors->has('batch_no'))
                                    <p id="batch_no-error" class="help-block" for="batch_no"><span>{{ $errors->first('batch_no') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:20rem">
                                    <select name="product_id" id="" class="form-control">
                                        <option selected disabled >उत्पादनको नाम छान्नुहोस्</option>
                                        @foreach ($data['products'] as $product)
                                            <option value="{{ $product['id'] }}">{{ $product['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('product_id'))
                                    <p id="product_id-error" class="help-block" for="product_id"><span>{{ $errors->first('product_id') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:20rem">
                                    <input class="form-control rounded " type="text" id="date" value="{{getStandardNumber( $data['nep_date_unicode'])}}" name="production_date" placeholder="मिति" readonly>
                                    @if($errors->has('production_date'))
                                    <p id="production_date-error" class="help-block" for="production_date"><span>{{ $errors->first('production_date') }}</span></p>
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

                                <td style="width:20rem">
                                    <select class="form-control" name="batch_unit">
                                        <option selected disabled>एकाइ छान्नुहोस्</option>
                                        @foreach ($data['units'] as $index => $value)
                                            <option value="{{ $value->id }}" {{ old('batch_unit') == $value->id ? 'selected' : '' }}>
                                                {{ $value['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td style="width:20rem">
                                    <input type="text" value="{{ old('unit_price') }}" name="unit_price" placeholder="रु." class="form-control" />
                                </td>

                            </tr>

                            <tr>
                                <th colspan="4">कच्चा पदार्थहरु <span class="text-danger">*</span></th>
                            </tr>
                        </table>

                        <table class="table table-bordered add-raw-materials">
                            <thead>
                                <tr>
                                    <th>कच्चा पदार्थ</th>
                                    <th>आपूर्तिकर्ता</th>
                                    <th>एकाइ</th>
                                    <th>एकाइ लागत</th>
                                    <th>मात्रा</th>
                                    <th>कुल खर्च</th>
                                    {{-- <th>Credit</th> --}}
                                    <th><a href="#" class="btn btn-info adRow"><i class="fa fa-plus"></i></a></th>
                                </tr>
                            </thead>
                            <tbody id="transactionbody">
                                @if(old('raw_material'))
                                    @foreach(old('raw_material') as $oldIndex => $oldValue)
                                        <tr class="new1">
                                            <td>
                                                <select class="form-control acctype raw-material" name="raw_material[]">
                                                    <option selected disabled>कच्चा पद्दार्थ छान्नुहोस्</option>
                                                    @foreach ($data['raw_materials'] as $index => $value)
                                                        <option value="{{ $value->id }}" {{ old('raw_material.'.$oldIndex) == $value->id ? 'selected' : '' }}>
                                                            {{ $value['name'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control acctype raw-material" name="supplier_id[]">
                                                    <option selected disabled>आपूर्तिकर्ता छान्नुहोस्</option>
                                                    @foreach ($data['suppliers'] as $index => $value)
                                                        <option value="{{ $value->id }}" {{ old('supplier_id.'.$oldIndex) == $value->id ? 'selected' : '' }}>
                                                            {{ $value['name'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control acctype raw-material" name="unit_id[]">
                                                    <option selected disabled>unit छान्नुहोस्</option>
                                                    @foreach ($data['units'] as $index => $value)
                                                        <option value="{{ $value->id }}" {{ old('unit_id.'.$oldIndex) == $value->id ? 'selected' : '' }}>
                                                            {{ $value['name'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input id="unit_cost" type="text" name="unit_cost[]" class="form-control raw-material-quantity" value="{{ old('unit_cost.'.$oldIndex) }}">
                                            </td>
                                            <td>
                                                <input id="total_cost" type="text" name="total_cost[]" class="form-control raw-material-quantity" value="{{ old('total_cost.'.$oldIndex) }}">
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
                                            <select class="form-control acctype raw-material" name="raw_material[]" required>
                                                <option selected disabled>कच्चा पद्दार्थ छान्नुहोस्</option>
                                                @foreach ($data['raw_materials'] as $index => $value)
                                                    <option value="{{ $value->id }}">{{ $value['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </td>

                                        <td>
                                            <select class="form-control acctype supplier" name="supplier_id[]">
                                                <option selected disabled>supplier छान्नुहोस्</option>
                                                @foreach ($data['suppliers'] as $index => $value)
                                                    <option value="{{ $value->id }}" >
                                                        {{ $value['name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control acctype unit-id" name="unit_id[]">
                                                <option selected disabled>unit छान्नुहोस्</option>
                                                @foreach ($data['units'] as $index => $value)
                                                    <option value="{{ $value->id }}">
                                                        {{ $value['name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" name="unit_cost[]" class="form-control uit-cost" >
                                        </td>
                                        <td>
                                            <input type="text" name="quantity[]" class="form-control quantity" required>
                                        </td>
                                        <td>
                                            <input id="total_cost" type="text" name="total_cost[]" class="form-control total-cost" readonly>
                                        </td>
                                        <td>

                                            <button type="button" class="btn btn-danger btn-delete" onclick="DeleteRow(this)">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>

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
            dateFormat: 'YYYY/MM/DD',
            closeOnDateSelect: true
        });
        $('#expiry-date').nepaliDatePicker({
            dateFormat: 'YYYY/MM/DD',
            closeOnDateSelect: true
        });
        var i = 0;
        $(".adRow").on("click", function() {
            console.log("test");
            var newRow = $("<tr class='new1'>");
            var cols = "";
            cols += '<td><select class="form-control acctype" name="raw_material[]" required><option selected disabled>कच्चा पद्दार्थ छान्नुहोस्</option>@foreach ($data["raw_materials"] as $index=>$value)<option value="{{ $value["id"] }}">{{ $value["name"] }}</option>@endforeach</select></td>';
            cols += '<td><select class="form-control acctype raw-material" name="supplier_id[]"><option selected disabled>supplier छान्नुहोस्</option>@foreach ($data["suppliers"] as $index => $value)<option value="{{ $value->id }}" >{{ $value["name"] }}</option>@endforeach</select></td>';
            cols += '<td><select class="form-control acctype raw-material" name="unit_id[]"><option selected disabled>units छान्नुहोस्</option>@foreach ($data["units"] as $index => $value)<option value="{{ $value->id }}" >{{ $value["name"] }}</option>@endforeach</select></td>';
            cols += '<td><input id="unit_cost" type="text" name="unit_cost[]" class="form-control unit-cost" ></td>';
            cols += '<td><input required type="text" class="form-control quantity" name="quantity[]"></td>';
            cols += '<td><input id="total_cost" type="text" name="total_cost[]" class="form-control total-cost" readonly></td>';
            cols += '<td><a href="#" class="btn btn-danger remove" onclick="DeleteRow(this)"><i class="fa fa-trash-o "></i></a></td>';
            newRow.append(cols);
            // alert(cols);
            $(".add-raw-materials").append(newRow);
            i++;
        });

        $(".add-worker").on("click", function() {
            console.log("test");
            var newRow = $("<tr class='add-worker-row'>");
            var cols = "";
            cols += `
                        <td>
                            <select id="worker-list-id" class="form-control acctype raw-material" name="worker_list_id[]" required>
                                <option selected disabled>कच्चा पद्दार्थ छान्नुहोस्</option>
                                @foreach ($data['worker_list'] as $index => $value)
                                    <option value="{{ $value->id }}">{{ $value['full_name'] }}</option>
                                @endforeach
                            </select>
                        </td>

                        <td>
                            <input id="hours-worked" type="number" name="hours_worked[]" class="form-control raw-material-quantity" >
                        </td>
                        <td>
                            <input id="days-worked" type="number" name="days_worked[]" class="form-control raw-material-quantity" >
                        </td>
                        <td>

                            <button type="button" class="btn btn-danger btn-delete" onclick="deleteWorkerRow(this)">
                                <i class="fa fa-trash-o"></i>
                            </button>
                        </td>
                    `;

                newRow.append(cols);
            // alert(cols);
            $(".add-worker-list").append(newRow);
            i++;
        });

        $(".add-raw-materials").on("click", ".remove", function(event) {
            $(this).closest("tr").remove();
            i--;
        });

        $(".add-worker-list").on("click", ".btn-delete", function(event) {
        $(this).closest("tr").remove();
        i--;
    });
    function deleteWorkerRow(button) {
    $(button).closest("tr").remove();
}

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
    function DeleteRow(e) {
            // debugger;
            var row = $(e).closest('.new1');
            var worker_row = $(e).closest('.add-worker-row');
            var confirmValue = confirm("Are you sure to delete ?");
            if (confirmValue) {
                $(row).remove();
                $(worker_row).remove();
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

    function calculateTotalCost(row) {
        var unitCost = parseFloat(row.find('input[name="unit_cost[]"]').val()) || 0;
        var quantity = parseFloat(row.find('input[name="quantity[]"]').val()) || 0;
        var totalCost = unitCost * quantity;
        row.find('input[name="total_cost[]"]').val(totalCost.toFixed(2));
    }

    $('tbody').on('input', 'input[name="unit_cost[]"], input[name="quantity[]"]', function() {
        var row = $(this).closest('tr');
        calculateTotalCost(row);
    });
</script>


@endsection

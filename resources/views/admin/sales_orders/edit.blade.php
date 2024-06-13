@extends('layouts.admin')
@section('title', 'बिक्री आदेश')
@section('content')
<link href="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/css/nepali.datepicker.v3.7.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<div class="row">
    <div class="col-lg-8">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">इन्भेन्टरी</a></li>
                <li class="breadcrumb-item"><a href="#">बिक्री आदेश</a></li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-12">
        {{-- {{ dd($_base_route) }} --}}
        <form action="{{ route($_base_route.'.update', $data['row']['id'])}}" method="POST" enctype="multipart/form-data">
            <section class="card">
                <header class="card-header">
                    बिक्री आदेश
                </header>
                <div class="card-body">
                    @csrf
                    <input type="hidden" name="udhyog" value="{{ $data['row']['udhyog_id'] }}">
                    <div class="row">
                        <table class="table table-bordered" id="dynamicTable">
                            <tr>
                                {{-- <th> उत्पादनको नाम <span class="text-danger">*</span> </th> --}}
                                <th> डिलरको नाम <span class="text-danger">*</span> </th>
                                <th>जम्मा मात्रा <span class="text-danger">*</span></th>
                                <th>अर्डर मिति <span class="text-danger">*</span></th>
                                <th>भुक्तानी स्थिति </th>
                                <th>अर्डर स्थिति </th>
                            </tr>
                            <tr>
                                <td style="width:20rem">
                                    <select name="dealer_id" id="" class="form-control">
                                        <option selected disabled >डिलरको नाम छान्नुहोस्</option>
                                        @foreach ($data['dealers'] as $row)
                                            <option value="{{ $row['id'] }}" {{ $data['row']['dealer_id'] == $row['id'] ? 'selected' : '' }}>{{ $row['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('dealer_id'))
                                    <p id="dealer_id-error" class="help-block" for="dealer_id"><span>{{ $errors->first('dealer_id') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:20rem">
                                    <input type="number" value="{{ old('total_amount', $data['row']['total_amount']) }}" name="total_amount" placeholder="कुल अर्डर" class="form-control" />
                                    @if($errors->has('total_amount'))
                                    <p id="total_amount-error" class="help-block" for="name"><span>{{ $errors->first('total_amount') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:20rem">
                                    <input class="form-control rounded " type="text" id="date" value="{{getStandardNumber( $data['nep_date_unicode'])}}" name="order_date" placeholder="मिति" readonly>
                                    {{-- <input type="text" value="{{ old('order_date') }}" name="order_date" placeholder="नाम" class="form-control" /> --}}
                                    @if($errors->has('order_date'))
                                    <p id="order_date-error" class="help-block" for="order_date"><span>{{ $errors->first('order_date') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:20rem">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" {{ $data['row']['order_status'] == 1 ? 'checked' : '' }} id="payment-status" name="payment_status">
                                    </div>
                                </td>
                                <td style="width:20rem">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" {{ $data['row']['payment_status'] == 1 ? 'checked' : '' }} id="order-status" name="order-status">
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <table class="table table-bordered add-raw-materials">
                            <thead>
                                <tr>
                                    <th>उत्पादनहरु</th>
                                    <!-- <th>उपखाता</th> -->
                                    <th>मात्रा</th>
                                    {{-- <th>Credit</th> --}}
                                    <th><a href="#" class="btn btn-info adRow"><i class="fa fa-plus"></i></a></th>
                                </tr>
                            </thead>
                            <tbody id="transactionbody">
                                @if(old('products'))
                                    @foreach(old('products') as $oldIndex => $oldValue)
                                        <tr class="new1">
                                            <td>
                                                {{-- <select class="form-control acctype raw-material" name="raw_material[]">
                                                    <option selected disabled>कच्चा पद्दार्थ छान्नुहोस्</option>
                                                    @foreach ($data['raw_materials'] as $index => $value)
                                                        <option value="{{ $value->id }}" {{ old('raw_material.'.$oldIndex) == $value->id ? 'selected' : '' }}>
                                                            {{ $value['name'] }}
                                                        </option>
                                                    @endforeach
                                                </select> --}}
                                                <select name="items[0][product_id]" id="" class="form-control">
                                                    <option selected disabled >उत्पादनको नाम छान्नुहोस्</option>
                                                    @foreach ($data['products'] as $row)
                                                        <option value="{{ $row['id'] }}">{{ $row['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name="items[0][quantity]" class="form-control raw-material-quantity" value="{{ old('quantity.'.$oldIndex) }}">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-delete" onclick="DeleteRow(this)">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                @foreach ($data['row']->items as $key=>$outerRow)
                                    <tr class="new1">
                                        <td>
                                            <select name="items[{{ $key }}][product_id]" id="" class="form-control">
                                                <option selected disabled >उत्पादनको नाम छान्नुहोस्</option>
                                                @foreach ($data['products'] as $row)
                                                    <option value="{{ $row['id'] }}" {{ $outerRow['inventory_product_id'] == $row->id ? 'selected' : '' }}>{{ $row['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" name="items[{{ $key }}][quantity]" class="form-control raw-material-quantity" value="{{ $outerRow['quantity'] }}" required>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-delete remove" onclick="DeleteRow(this)">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
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
            dateFormat: 'DD/MM/YYYY',
            closeOnDateSelect: true
        });
        var i = 0;
        console.log("test")
        $(".adRow").on("click", function() {
            ++i;
            console.log("test");
            var newRow = $("<tr class='new1'>");
            var cols = "";
            cols += '<td><select class="form-control acctype" name="items['+i+'][product_id]" required><option selected disabled>उत्पादनको नाम छान्नुहोस्</option>@foreach ($data["products"] as $index=>$value)<option value="{{ $value["id"] }}">{{ $value["name"] }}</option>@endforeach</select></td>';
            cols += '<td><input required type="text" class="form-control raw-material-quantity" name="items['+i+'][quantity]"></td>';
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


@endsection

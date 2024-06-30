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
        <form action="{{ route($_base_route.'.store')}}" method="POST" enctype="multipart/form-data">
            <section class="card">
                <header class="card-header">
                    बिक्री आदेश
                </header>
                <div class="card-body">
                    @csrf
                    <input type="hidden" value="{{ request()->udhyog }}" name="udhyog">
                    <div class="row">
                        <table class="table table-bordered" id="dynamicTable">
                            <tr>
                                <th>अर्डर प्रकार <span class="text-danger">*</span> </th>
                                <th> डिलरको/व्यक्तिको नाम <span class="text-danger">*</span> </th>
                                {{-- <th>जम्मा मात्रा <span class="text-danger">*</span></th> --}}
                                <th>अर्डर मिति <span class="text-danger">*</span></th>
                                {{-- <th>भुक्तानी स्थिति </th>
                                <th>अर्डर स्थिति </th> --}}
                            </tr>
                            <tr>
                                <td style="width:20rem">
                                    <select name="dealer_id" id="" class="form-control order-type">
                                        <option selected disabled >डिलर/व्यक्ति छान्नुहोस्</option>
                                        <option value="1">डिलर</option>
                                        <option value="2">व्यक्तिगत</option>
                                    </select>
                                    @if($errors->has('dealer_id'))
                                    <p id="dealer_id-error" class="help-block" for="dealer_id"><span>{{ $errors->first('dealer_id') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:20rem">
                                    <select name="dealer_id" id="dealer_id" class="form-control">
                                        <option selected disabled >डिलरको नाम  छान्नुहोस्</option>
                                        @foreach ($data['dealers'] as $row)
                                            <option value="{{ $row['id'] }}">{{ $row['name'] }}</option>
                                        @endforeach
                                    </select>

                                    @if($errors->has('dealer_id'))
                                    <p id="dealer_id-error" class="help-block" for="dealer_id"><span>{{ $errors->first('dealer_id') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:20rem">
                                    <input class="form-control rounded " type="text" id="date" value="{{getStandardNumber( $data['nep_date_unicode'])}}" name="order_date" placeholder="मिति" readonly>
                                    {{-- <input type="text" value="{{ old('order_date') }}" name="order_date" placeholder="नाम" class="form-control" /> --}}
                                    @if($errors->has('order_date'))
                                    <p id="order_date-error" class="help-block" for="order_date"><span>{{ $errors->first('order_date') }}</span></p>
                                    @endif
                                </td>
                            </tr>
                        </table>

                        <table class="table table-bordered add-raw-materials">
                            <thead>
                                <tr>
                                    <th>ब्याच नं</th>
                                    <th>उत्पादन नाम</th>
                                    <th>एकाइ</th>
                                    <th>एकाइ मूल्य </th>
                                    <th>मात्रा</th>
                                    <th>उप कुल</th>
                                    <th><a href="#" class="btn btn-info adRow"><i class="fa fa-plus"></i></a></th>
                                </tr>
                            </thead>
                            <tbody id="transactionbody">
                                @if(old('products'))
                                    @foreach(old('products') as $oldIndex => $oldValue)
                                        <tr class="new1">
                                            <td>
                                                <select name="items[0][product_id]" id="" class="form-control">
                                                    <option selected disabled >उत्पादनको नाम छान्नुहोस्</option>
                                                    @foreach ($data['products'] as $row)
                                                        <option value="{{ $row['id'] }}">{{ $row['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name="items[0][batch_no]" class="form-control raw-material-quantity" value="{{ old('batch_no.'.$oldIndex) }}">
                                            </td>

                                            <td>
                                                <input type="text" name="items[0][quantity]" class="form-control raw-material-quantity" value="{{ old('quantity.'.$oldIndex) }}">
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
                                    <tr class="new1">

                                        <td>
                                            <input type="text" name="items[0][batch_no]" class="form-control production-batch" >
                                        </td>
                                        <td>
                                            <select name="items[0][product_id]" id="" class="form-control">
                                                <option selected disabled >उत्पादनको नाम छान्नुहोस्</option>
                                                @foreach ($data['products'] as $row)
                                                    <option value="{{ $row['id'] }}">{{ $row['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select name="items[0][unit_id]" id="" class="form-control">
                                                <option selected disabled >उत्पादनको नाम छान्नुहोस्</option>
                                                @foreach ($data['units'] as $row)
                                                    <option value="{{ $row['id'] }}">{{ $row['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" name="items[0][unit_price]" class="form-control raw-material-quantity" >
                                        </td>
                                        <td>
                                            <input type="text" name="items[0][quantity]" class="form-control raw-material-quantity check-stock-quantity" >
                                        </td>
                                        <td>
                                            <input type="text" name="items[0][sub_total]" class="form-control raw-material-quantity" readonly>
                                        </td>


                                        <td>
                                            <button type="button" class="btn btn-danger btn-delete" onclick="DeleteRow(this)">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5"> जम्मा मूल्य (रु) </th>
                                    <th><input class="form-control total_cost" type="text" name="total_amount" readonly></th>
                                </tr>
                            </tfoot>
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
    var route = '{{ route("admin.inventory.damage_records.check_production_batch") }}'
        var check_stock_quantity = '{{ route("admin.inventory.production_batch.check_stock_quantity") }}'
        @if (request()->is('admin/udhyog/hybridbiu/inventory/sales_orders*'))
        route = '{{ route("admin.udhyog.hybridbiu.inventory.seed_batch.check_production_batch") }}';
        check_stock_quantity = '{{ route("admin.inventory.seed_batch.check_stock_quantity") }}'
        @endif
    $(document).ready(function() {

        $('.select-two').select2();
        $('#date').nepaliDatePicker({
            dateFormat: 'YYYY/MM/DD',
            closeOnDateSelect: true
        });
        var i = 0;
        console.log("test")
        $(".adRow").on("click", function() {
            ++i;
            console.log("test");
            var newRow = $("<tr class='new1'>");
            var cols = "";
            cols += '<td><input required type="text" class="form-control production-batch" name="items['+i+'][batch_no]"></td>';
            cols += '<td><select class="form-control acctype" name="items['+i+'][product_id]" required><option selected disabled>उत्पादनको नाम छान्नुहोस्</option>@foreach ($data["products"] as $index=>$value)<option value="{{ $value["id"] }}">{{ $value["name"] }}</option>@endforeach</select></td>';
            cols += '<td><select class="form-control acctype" name="items['+i+'][unit_id]" required><option selected disabled>उत्पादनको नाम छान्नुहोस्</option>@foreach ($data["units"] as $index=>$value)<option value="{{ $value["id"] }}">{{ $value["name"] }}</option>@endforeach</select></td>';
            cols += '<td><input type="text" class="form-control raw-material-quantity" name="items['+i+'][unit_price]"></td>';
            cols += '<td><input type="text" class="form-control raw-material-quantity check-stock-quantity" name="items['+i+'][quantity]"></td>';
            cols += '<td><input type="text" class="form-control raw-material-quantity" name="items['+i+'][sub_total]" readonly></td>';
            cols += '<td><a href="#" class="btn btn-danger remove" onclick="DeleteRow(this)"><i class="fa fa-trash-o "></i></a></td>';
            newRow.append(cols);
            // alert(cols);
            $(".add-raw-materials").append(newRow);
            i++;
            calculateTotal();
        });
        $(".add-raw-materials").on("click", ".remove", function(event) {
            $(this).closest("tr").remove();
            i--;
            calculateTotal();
        });

        // Function to check stock quantity
        function checkStockQuantity(element, quantity) {
            var id = $(element).closest('tr').find('input[name*="[batch_no]"]').val();
            $.ajax({
                url: check_stock_quantity,
                type: 'GET',
                data: {
                    id: id
                },

                success: function(response) {
                    console.log(response.batchQuantity);
                    if (response.batchQuantity.quantity_produced < quantity) {
                        alert('Stock quantity is less than the entered quantity.');
                        $(element).val(1);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }

        // Event listener for quantity change
        $(document).on('change keyup', '.check-stock-quantity', function() {
            console.log($(this).val());
            var quantity = $(this).val();
            checkStockQuantity(this, quantity);
            calculateSubtotal($(this).closest('tr'));
        });

        $(document).on('change keyup', '.raw-material-quantity', function() {
        calculateSubtotal($(this).closest('tr'));
        });

        function calculateSubtotal(row) {
            var quantity = parseFloat(row.find('input[name*="[quantity]"]').val()) || 0;
            var unitPrice = parseFloat(row.find('input[name*="[unit_price]"]').val()) || 0;
            var subtotal = quantity * unitPrice;
            row.find('input[name*="[sub_total]"]').val(subtotal.toFixed(2));
            calculateTotal();
        }
        function calculateTotal() {
        let total = 0;
        $(".add-raw-materials tr").each(function() {
            let subTotal = parseFloat($(this).find('input[name*="[sub_total]"]').val()) || 0;
            total += subTotal;
        });
        $(".total_cost").val(total.toFixed(2));
        // $("tfoot th:last").text(total.toFixed(2));
    }
    calculateTotal(); // Initial total calculation
    });
    function DeleteRow(e) {
            // debugger;
            var row = $(e).closest('.new1');
            var confirmValue = confirm("Are you sure to delete ?");
            if (confirmValue) {
                $(row).remove();
                calculateTotal();
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

$(document).on('change', '.production-batch', function() {
    console.log($(this).val());
    var productionBatchInput = $(this);
    var productionBatch = productionBatchInput.val();
    $.ajax({
        url: route, // Replace with the actual URL to check the existence of production batch
        type: 'GET',
        data: { production_batch: productionBatch },
        success: function(response) {
            if (!response.bool === true) {
                alert('उत्पादन ब्याच अवस्थित छैन!');
                productionBatchInput.val('');
            }else{
                console.log(response.batch);
                let productId = response.batch.id;
                console.log(productId);
                // Update the dropdown to select the product ID
                // $('#production-date').val(response.production_batch.production_date)
                // console.log(productId);
                // $('select[name="items[0][product_id]"]').val(productId);
                let row = productionBatchInput.closest('tr');
                row.find('select[name*="[product_id]"]').val(productId);
            }
        }
    });
});



$(document).on('change', '.order-type', function() {
    console.log($(this).val());
    var order_type = $(this).val();
    $.ajax({
        url: '{{ route("admin.inventory.sales_orders.get_order_type") }}', // Replace with the actual URL to check the existence of production batch
        type: 'GET',
        data: { order_type: order_type },
        success: function(response) {
            $('#dealer_id').find('option').not(':first').remove();

            // Add new options based on response
            $.each(response, function(key, value) {
                $('#dealer_id').append('<option value="' + value.id + '">' + value.name + '</option>');
            });
        }
    });
});


</script>


@endsection

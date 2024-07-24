@extends('layouts.admin')
@section('title', 'उत्पादन ब्याच रिपोर्ट')
@section('content')
<link href="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/css/nepali.datepicker.v3.7.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<div class="row">
    <div class="col-lg-8">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">सप्लायर्स</a></li>
                <li class="breadcrumb-item"><a href="#">उत्पादन</a></li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row container-fluid">
    <div class="col-lg-12">
        {{-- {{ dd($_base_route) }} --}}
            <section class="card">
                <header class="card-header">
                    उत्पादन ब्याच रिपोर्ट
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <table class="table table-bordered" id="dynamicTable">
                            <tr>
                                <th>उत्पादन ब्याच नं .</th>
                                <th>उत्पादनको नाम</th>
                                <th>उत्पादन मिति</th>
                                <th> म्याद समाप्ति </th>
                                <th>उत्पादन भएको मात्रा</th>
                                <th>एकाइ</th>
                                <th>प्रति एकाइ मूल्य</th>
                                <th>अनुमानित मूल्य</th>

                            </tr>
                            <tr>
                                <td style="width:10rem">
                                    {{ $productionBatch['batch_no'] }}
                                </td>
                                <td >
                                    {{ $productionBatch->inventoryProduct->name }}
                                </td>
                                <td >
                                {{getStandardNumber( $data['nep_date_unicode'])}}
                                </td>
                                <td >
                                    {{getStandardNumber( $data['nep_date_unicode'])}}
                                    </td>
                                <td >
                                    {{ $productionBatch['quantity_produced'] }}
                                </td>
                                <td >
                                    {{ $productionBatch->unit_id != null ? $productionBatch->unit->name : '' }}
                                </td>
                                <td >
                                    {{ $productionBatch['unit_price'] }}
                                </td>
                                <td >
                                    {{ $productionBatch->inventoryProduct->price * $productionBatch['quantity_produced'] }}
                                </td>

                            </tr>

                            {{-- <tr>
                                <th colspan="4">कच्चा पदार्थहरु</th>
                            </tr> --}}
                        </table>
                        <table class="table table-bordered raw-material">
                            <h4>कच्चा पदार्थको विवरण  </h4>
                            <hr>
                            <thead>
                                <tr>
                                    <th>कच्चा पदार्थ</th>
                                    <th>आपूर्तिकर्ता</th>
                                    <th>एकाइ</th>
                                    <th>एकाइ मूल्य</th>
                                    <th>मात्रा</th>
                                    <th>जम्मा मूल्य </th>
                                    <th>कार्य</th>
                                </tr>
                            </thead>
                            <tbody id="transactionbody">

                                @foreach ($batch->rawMaterials as $item)
                                {{-- {{ dd($item->supplier) }} --}}
                                <tr class="new1">
                                    <td >
                                         {{  $item->rawMaterial->name }}
                                    </td>
                                    <td >
                                         {{ $item->supplier->name }}
                                    </td>
                                    <td >
                                         {{ $item->unit->name }}
                                    </td>
                                    <td >
                                         {{ $item->unit_cost }}
                                    </td>
                                    <td >
                                         {{ $item->quantity }}
                                    </td>
                                    <td >
                                         {{ $item->total_cost }}
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-delete delete-batch" data-id="{{ $item->id }}" data-url="{{ route('admin.inventory.production_batch.delete_raw_material', $item->id) }}">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                <tr class="new1">
                                    <form action="{{ route('admin.inventory.production_batch.add_raw_material') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="batch_id" value="{{ $productionBatch['id'] }}">
                                        <td>
                                            <select class="form-control acctype raw-material" name="raw_material_id" required>
                                                <option selected disabled>कच्चा पद्दार्थ छान्नुहोस्</option>
                                                @foreach ($data['raw_materials'] as $index => $value)
                                                    <option value="{{ $value->id }}">{{ $value['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </td>

                                        <td>
                                            <select class="form-control acctype supplier" name="supplier_id">
                                                <option selected disabled>आपूर्तिकर्ता छान्नुहोस्</option>
                                                @foreach ($data['suppliers'] as $index => $value)
                                                    <option value="{{ $value->id }}" >
                                                        {{ $value['name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control acctype unit-id" name="unit_id">
                                                <option selected disabled>unit छान्नुहोस्</option>
                                                @foreach ($data['units'] as $index => $value)
                                                    <option value="{{ $value->id }}">
                                                        {{ $value['name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" name="unit_cost" class="form-control unit-price" >
                                        </td>
                                        <td>
                                            <input type="text" name="quantity" class="form-control quantity" required>
                                        </td>
                                        <td>
                                            <input id="total_cost" type="text" name="total_cost" class="form-control total-cost" readonly>
                                        </td>
                                        <td>
                                            <button type="submit"><img src="{{ asset('sumit.png') }}" alt="" style="width: 60px; height:20px"></button>
                                        </td>

                                    </form>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5">जम्मा मूल्य</th>
                                    <th colspan="1">{{ $batch->rawMaterials->sum('total_cost') }}</th>
                                </tr>

                            </tfoot>
                        </table>
                        <br><br>

                        <table class="table table-bordered worker-bibaran">
                            <h4>कामदारको विवरण</h4>
                            <hr>
                            <thead>
                                <tr>
                                    <th>नाम </th>
                                    <th>काम गरेको दिन</th>
                                    <th>काम गरेको घण्टा</th>
                                    <th>ज्याला प्रति घण्टा</th>
                                    <th>जम्मा मूल्य</th>
                                    <th>कैफियत</th>
                                    <th>कार्य</th>
                                </tr>
                            </thead>
                            <tbody id="transactionbody" >
                                @foreach ($batch['worker_list'] as $item)
                                {{-- {{ dd($item->supplier) }} --}}
                                <tr class="new1 worker-details">
                                    <td>
                                         {{  $item->workerDetails->full_name }}
                                    </td>

                                    <td>
                                         {{ $item->days_worked }}
                                    </td>
                                    <td>
                                         {{ $item->hours_worked }}
                                    </td>
                                    <td >
                                         {{ $item->wages_per_hour }}
                                    </td>
                                    <td>
                                        {{ $item->total_wages }}

                                    </td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-delete delete-batch" data-id="{{ $item->id }}" data-url="{{ route('admin.inventory.production_batch.delete_worker', $item->id) }}">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <form action="{{ route('admin.inventory.production_batch.add_worker') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="batch_id" value="{{ $productionBatch['id'] }}">
                                        <td style="width:15rem">
                                            <select name="worker_id" id="mal_bibran_1" class="form-control">
                                                <option value=>छान्नुहोस्</option>
                                                @if(count($data['worker']) != 0)
                                                {{-- {{ dd($data['worker']) }} --}}
                                                @foreach($data['worker'] as $row)
                                                <option value="{{ $row->id }}">{{ $row->full_name }}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </td>

                                        <td style="width:20rem">
                                            <input type="number" class="form-control rounded amount worked-day" name="worked_day" id="mal_bibran_2" placeholder="मूल्य">
                                        </td>
                                        <td style="width:20rem">
                                            <input type="number" class="form-control rounded expenditure worked-hour" name="worked_hour" id="mal_bibran_3" placeholder="संख्या" >
                                        </td>
                                        <td style="width:20rem">
                                            <input type="text" class="form-control rounded tamount wages-per-hour" name="wages_per_hour" id="mal_bibran_4" placeholder=" कुल रकम">
                                        </td>
                                        <td style="width:20rem">
                                            <input type="text" class="form-control rounded tamount total-wages" name="total_wages" id="mal_bibran_4" readonly placeholder=" कुल रकम">
                                        </td>
                                        <td style="width:30rem">
                                            <input type="text" name="details" id="mal_bibran_5" value="" placeholder="टिप्पणी" class="form-control" />
                                        </td>
                                        <td>
                                            <button type="submit"><img src="{{ asset('sumit.png') }}" alt="" style="width: 60px; height:20px"></button>
                                        </td>
                                    </form>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="worker-total-row">
                                    <th colspan="5">जम्मा मूल्य</th>
                                    <th colspan="1">{{ $batch->worker_list->sum('total_wages') }}</th>
                                </tr>

                            </tfoot>
                        </table>
                        <br><br>
                        <table class="table table-bordered other-material">
                            <h4>अन्य वस्तुहरुको विवरण  </h4>
                            <hr>
                            <thead>
                                <tr>
                                    <th>नाम</th>
                                    <th>आपूर्तिकर्ता</th>
                                    <th>एकाइ</th>
                                    <th>एकाइ मूल्य</th>
                                    <th>मात्रा</th>
                                    <th>जम्मा मूल्य </th>
                                    <th>कार्य</th>
                                </tr>
                            </thead>
                            <tbody id="transactionbody">
                                @if($batch->otherMaterial)


                                @foreach ($batch->otherMaterial as $item)
                                {{-- {{ dd($item->supplier) }} --}}
                                <tr class="new1">
                                    <td >
                                         {{  $item->name }}
                                    </td>
                                    <td >
                                         {{ $item->supplier->name }}
                                    </td>
                                    <td >
                                         {{ $item->unit->name }}
                                    </td>
                                    <td >
                                         {{ $item->unit_price }}
                                    </td>
                                    <td >
                                         {{ $item->quantity }}
                                    </td>
                                    <td >
                                         {{ $item->total_cost }}
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-delete delete-batch" data-id="{{ $item->id }}" data-url="{{ route('admin.inventory.production_batch.delete_other_material', $item->id) }}">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                                <tr class="new1">
                                    <form action="{{ route('admin.inventory.production_batch.add_other_material') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="batch_id" value="{{ $productionBatch['id'] }}">
                                        {{-- <td>
                                            <select class="form-control acctype raw-material" name="raw_material_id" required>
                                                <option selected disabled>कच्चा पद्दार्थ छान्नुहोस्</option>
                                                @foreach ($data['raw_materials'] as $index => $value)
                                                    <option value="{{ $value->id }}">{{ $value['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </td> --}}
                                        <td>
                                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                        </td>

                                        <td>
                                            <select class="form-control acctype supplier" name="supplier_id">
                                                <option selected disabled>supplier छान्नुहोस्</option>
                                                @foreach ($data['suppliers'] as $index => $value)
                                                    <option value="{{ $value->id }}" >
                                                        {{ $value['name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control acctype unit-id" name="unit_id">
                                                <option selected disabled>unit छान्नुहोस्</option>
                                                @foreach ($data['units'] as $index => $value)
                                                    <option value="{{ $value->id }}">
                                                        {{ $value['name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" name="unit_price" class="form-control unit-price" >
                                        </td>
                                        <td>
                                            <input type="text" name="quantity" class="form-control quantity" required>
                                        </td>
                                        <td>
                                            <input id="total_cost" type="text" name="total_cost" class="form-control total-cost" readonly>
                                        </td>
                                        <td>
                                            <button type="submit"><img src="{{ asset('sumit.png') }}" alt="" style="width: 60px; height:20px"></button>
                                        </td>

                                    </form>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5">जम्मा मूल्य</th>
                                    <th colspan="1">{{ $batch->otherMaterial->sum('total_cost') }}</th>
                                </tr>

                            </tfoot>
                        </table>
                        {{-- @if(count($batch->damages)>0) --}}
                        <table class="table table-bordered" id="dynamicTable">
                            <h4>क्षतीको विवरण विवरण  </h4>
                            <hr>
                            <thead>
                                <tr>
                                    <th>क्षतिको कारण</th>
                                    <th>क्षति संख्या</th>
                                    <th>क्षतिको मिति</th>
                                    <th>कार्य</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($batch->damages as $item)
                                <tr>
                                    <td>{{ $item->damageType->type }}</td>
                                    <td >{{ $item->quantity_damaged }}</td>
                                    <td>{{ $item->damage_date }}</td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-delete delete-batch" data-id="{{ $item->id }}" data-url="{{ route('admin.inventory.production_batch.delete_damage_record', $item->id) }}">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                            {{-- <form action="{{ route('admin.inventory.production_batch.add_damage_record') }}">
                                <tr>
                                    <td>
                                        <select class="form-control acctype unit-id" name="unit_id">
                                            <option selected disabled>unit छान्नुहोस्</option>
                                            @foreach ($data['units'] as $index => $value)
                                                <option value="{{ $value->id }}">
                                                    {{ $value['name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" name="unit_price" class="form-control unit-price" >
                                    </td>
                                    <td>
                                        <input type="text" name="quantity" class="form-control quantity" required>
                                    </td>
                                </tr>
                            </form> --}}
                            <tfoot>
                                <tr>
                                    <td align="right" class="font-weight-bold">जम्मा</td>
                                    <td class="font-weight-bold">{{ $batch->damages->sum('total_damage') }}</td>
                                </tr>
                            </tfoot>

                        </table>
                        {{-- @endif --}}

                        <br><br>

                    </div>
                </div>
            </section>
            @php
                $total_cost = $batch->rawMaterials->sum('total_cost') + $batch->worker_list->sum('total_wages') + $batch->otherMaterial->sum('total_cost');
                $total_earn = $batch->sellItem->sum('total_cost');
                $damage_unit_price = $batch->unit_price != null ? $batch->unit_price : $batch->inventoryProduct->price;
                $damage_cost = $batch->damages->sum('total_damage') * $damage_unit_price;
                $profit_loss = $total_earn - ($total_cost + $damage_cost);

            @endphp
            <div class="card mt-4 p-5">
                <div class="card-heading">
                    <head class="mt-5">
                        <h6 class="mt-5">यस रिपोर्टमा {{ $productionBatch->inventoryProduct->name }}को ब्याच नम्बर {{ $productionBatch->batch_no }} को नाफा र घाटाको विवरण प्रस्तुत गरिएको छ।</h6>
                    </head>
                </div>
                <div class="card-body row">
                    <div class="col-4">
                        <h6>उत्पादन लागत</h6>
                        <hr>
                        <p>उत्पादनमा लागेको कुल खर्चहरू:</p>
                        <ol>
                            <li>कच्चा पदार्थ लागत: रु. {{ $batch->rawMaterials->sum('total_cost') }}</li>
                            <li>श्रम लागत: रु. {{ $batch->worker_list->sum('total_wages') }}</li>
                            <li>अन्य खर्चहरू: रु. {{ $batch->otherMaterial->sum('total_cost') }}</li>

                        </ol>
                        <p>कुल उत्पादन लागत: रु. {{ $batch->rawMaterials->sum('total_cost') + $batch->worker_list->sum('total_wages') + $batch->otherMaterial->sum('total_cost') }}</p>
                    </div>

                    <div class="col-4">
                        <h6>क्षति</h6>
                        <hr>
                        <p>कुल क्षति विवरण :</p>
                        <ol>
                            <li>कुल क्षति: {{ $batch->damages->sum('total_damage') }}</li>
                            <li>एकाइ: {{ $batch->unit_id != null ? $batch->name : ($batch->inventoryProduct->unit_id != null ? $batch->inventoryProduct->unit->name : '') }}</li>
                            <li>प्रति एकाइ मूल्य: रु. {{ $batch->unit_price != null ? $batch->unit_price : $batch->inventoryProduct->price }}</li>

                        </ol>
                        <p>कुल क्षति मूल्य : रु. {{ $batch->damages->sum('total_damage') * $damage_unit_price }}</p>
                    </div>
                    <div class="col-4">
                        <h6>बिक्री आय</h6>
                        <hr>
                        <p>उत्पादनको बिक्रीबाट प्राप्त आय:</p>
                        <ol>
                            <li>बिक्री मूल्य प्रति युनिट: {{ $batch->rawMaterials->sum('total_cost') }}</li>
                            <li>कुल बिक्री युनिट: {{ $batch->sellItem->sum('quantity') }}</li>
                            <li>कुल बिक्री आय: रु. {{ $batch->sellItem->sum('total_cost') }}</li>

                        </ol>
                        <p>कुल बिक्री आय: रु. {{ $batch->sellItem->sum('total_cost') }}</p>
                    </div>
                </div>
                <div class="card-footer">

                    <header>
                        <h4>नाफा/घाटा</h4>
                        <p>कुल नाफा/घाटा: [{{ $profit_loss > 0 ? 'नाफा' : 'घाटा' }}] रु. {{ abs($profit_loss) }}</p>
                    </header>
                </div>
            </div>
            <!-- End Progress Bar Buttons-->
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


<script>
    $(document).ready(function() {
        calculateSubtotals();

        // Function to calculate subtotals
        function calculateSubtotals() {
            $('.worker-details').each(function() {
                var daysWorkedText = $(this).find('.days-work').text().trim();
                var hoursWorkedText = $(this).find('.hours-work').text().trim();
                var workerSalaryText = $(this).find('.worker-salary').text().trim();

                // Convert to numbers or default to 1 if empty
                var daysWorked = daysWorkedText ? parseFloat(daysWorkedText) : 0;
                var hoursWorked = hoursWorkedText ? parseFloat(hoursWorkedText) : 0;
                var workerSalary = workerSalaryText ? parseFloat(workerSalaryText) : 0; // Adjust as per your data

                // Perform calculation based on your business logic
                var subtotal = (daysWorked * workerSalary) + (hoursWorked * workerSalary);

                // Update the subtotal column in the current row
                $(this).find('.worker-sub-total').text(subtotal.toFixed(2));
            });

            // Calculate and update total cost for workers
            var totalWorkerCost = 0;
            $('.worker-sub-total').each(function() {
                var subtotalText = $(this).text().trim();
                var subtotal = subtotalText ? parseFloat(subtotalText) : 0;
                totalWorkerCost += subtotal;
            });

            // Update the total cost in the worker-total cell
            $('.worker-total').text(totalWorkerCost.toFixed(2));
        }
    });
</script>


<script>
    $(document).ready(function() {
        function calculateTotalCost($row) {
            var quantity = parseFloat($row.find('.quantity').val()) || 0;
            var unitPrice = parseFloat($row.find('.unit-price').val()) || 0;
            var totalCost = quantity * unitPrice;
            $row.find('.total-cost').val(totalCost.toFixed(2));
        }

        function calculateTotalWages($row) {
            var worked_hour = parseFloat($row.find('.worked-hour').val()) || 0;
            var worked_day = parseFloat($row.find('.worked-day').val()) || 0;
            var wages_per_hour = parseFloat($row.find('.wages-per-hour').val()) || 0;
            var tatal_wages = worked_hour * wages_per_hour + worked_day*8*wages_per_hour;
            $row.find('.total-wages').val(tatal_wages.toFixed(2));
        }

    // Event listener for quantity and unit price inputs
        $('.raw-material').on('input', '.quantity, .unit-price', function() {
            console.log('dldld  ')
            var $row = $(this).closest('tr');
            calculateTotalCost($row);
        });
        $('.other-material').on('input', '.quantity, .unit-price', function() {
            console.log('dldld  ')
            var $row = $(this).closest('tr');
            calculateTotalCost($row);
        });


        $('.mal-bibaran').on('input', '.seed-quantity, .unit-price', function() {
            console.log('dldld  ')
            var $row = $(this).closest('tr');
            calculateTotalCost($row);
        });
        $('.machinery-bibaran').on('input', '.seed-quantity, .unit-price', function() {
            console.log('dldld  ')
            var $row = $(this).closest('tr');
            calculateTotalCost($row);
        });

        $('.worker-bibaran').on('input', '.worked-day, .worked-hour, .wages-per-hour', function() {
            console.log('worded-day')
            var $row = $(this).closest('tr');
            calculateTotalWages($row);
        });

        $('.delete-batch').on('click', function(){
            var id = $(this).data('id');
            var url = $(this).data('url');
            $.confirm({
                title: 'तपाईं मेटाउन चाहनुहुन्छ ?',
                autoClose: 'cancelAtion|6000',
                buttons: {
                    deleteUser: {
                        text: 'Delete',
                        btnClass: 'btn-green',
                        action: function () {
                            $.ajax ({
                                url: url,
                                type: 'DELETE',
                                dataType: "JSON",
                                beforeSend: function (xhr) {
                                    var token = $('meta[name="csrf-token"]').attr('content');
                                        if (token) {
                                            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                                        }
                                    },
                                data: {
                                    "id": id,
                                },
                                success: function(response){
                                    console.log(response);
                                    if(response.bool == false){
                                        $.alert('त्रुटि: कृपया पुनः प्रयास गर्नुहोस्।');
                                    }else{
                                        location.reload(true);
                                    }
                                },
                                error: function(xhr) {
                                    console.log(xhr.responseText);
                                }
                            });
                        }
                    },
                    cancelAction: function () {
                        $.alert('action is canceled');
                    }
                }
            });
        })
    });
</script>
@endsection

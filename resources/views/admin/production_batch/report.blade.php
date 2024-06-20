@extends('layouts.admin')
@section('title', 'सप्लाइर्स')
{{-- {{ dd($report[0]->total_quantity_used) }} --}}
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
<div class="row container-fluid">
    <div class="col-lg-12">
        {{-- {{ dd($_base_route) }} --}}
            <section class="card">
                <header class="card-header">
                    उत्पादन ब्याच
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
                                <th>अनुमानित मूल्य</th>

                            </tr>
                            <tr>
                                <td style="width:10rem">
                                    {{ $productionBatch['id'] }}
                                </td>
                                <td style="width:20rem">
                                    {{ $productionBatch->inventoryProduct->name }}
                                </td>
                                <td style="width:20rem">
                                {{getStandardNumber( $data['nep_date_unicode'])}}
                                </td>
                                <td style="width:20rem">
                                    {{getStandardNumber( $data['nep_date_unicode'])}}
                                    </td>
                                <td style="width:20rem">
                                    {{ $productionBatch['quantity_produced'] }}
                                </td>
                                <td style="width:20rem">
                                    {{ $productionBatch->inventoryProduct->price * $productionBatch['quantity_produced'] }}
                                </td>

                            </tr>

                            {{-- <tr>
                                <th colspan="4">कच्चा पदार्थहरु</th>
                            </tr> --}}
                        </table>
                        <table class="table table-bordered add-raw-materials">
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
                                </tr>
                            </thead>
                            <tbody id="transactionbody">

                                @foreach ($batch->rawMaterials as $item)
                                {{-- {{ dd($item->supplier) }} --}}
                                <tr class="new1">
                                    <td style="width:20rem">
                                         {{  $item->rawMaterial->name }}
                                    </td>
                                    <td style="width:20rem">
                                         {{ $item->supplier->name }}
                                    </td>
                                    <td style="width:20rem">
                                         {{ $item->unit->name }}
                                    </td>
                                    <td style="width:20rem">
                                         {{ $item->unit_cost }}
                                    </td>
                                    <td style="width:20rem">
                                         {{ $item->quantity }}
                                    </td>
                                    <td style="width:20rem">
                                         {{ $item->total_cost }}
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5">जम्मा मूल्य</th>
                                    <th colspan="1">{{ $batch->rawMaterials->sum('total_cost') }}</th>
                                </tr>

                            </tfoot>
                        </table>
                        <br><br>

                        <table class="table table-bordered add-raw-materials">
                            <h4>कामदारको विवरण</h4>
                            <hr>
                            <thead>
                                <tr>
                                    <th>कामदारको नाम</th>
                                    <th>कामदारको पोस्ट</th>
                                    <th>काम गरेको दिन</th>
                                    <th>काम गरेको घण्टा</th>
                                    <th>तलब प्रति दिन/घण्टा</th>
                                    <th>जम्मा मूल्य </th>
                                </tr>
                            </thead>
                            <tbody id="transactionbody">

                                @foreach ($batch['worker_list'] as $item)
                                {{-- {{ dd($item->supplier) }} --}}
                                <tr class="new1 worker-details">
                                    <td style="width:20rem" class="full-name">
                                         {{  $item->workerDetails->full_name }}
                                    </td>
                                    <td style="width:20rem" class="position">
                                         {{ $item->workerDetails->WorkerPosition->position }}
                                    </td>
                                    <td style="width:20rem" class="days-work">
                                         {{ $item->days_worked }}
                                    </td>
                                    <td style="width:20rem" class="hours-work">
                                         {{ $item->hours_worked }}
                                    </td>
                                    <td style="width:20rem" class="worker-salary">
                                         {{ $item->workerDetails->salary }}
                                    </td>
                                    <td style="width:20rem" class="worker-sub-total">

                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr class="worker-total-row">
                                    <th colspan="5">जम्मा मूल्य</th>
                                    <th colspan="1" class="worker-total">{{ $batch->rawMaterials->sum('total_cost') }}</th>
                                </tr>

                            </tfoot>
                        </table>
                        <br><br>

                        @if(count($batch->damages)>0)
                        <table class="table table-bordered" id="dynamicTable">
                            <h4>क्षतीको विवरण विवरण  </h4>
                            <hr>
                            <tr>
                                <th>क्षतिको कारण</th>
                                <th>क्षति संख्या</th>
                                <th>क्षतिको मिति</th>
                            </tr>
                            @foreach ($batch->damages as $item)
                            <tr>
                                <td>{{ $item->damageType->type }}</td>
                                <td >{{ $item->quantity_damaged }}</td>
                                <td>{{ $item->damage_date }}</td>
                            </tr>
                            @endforeach

                            <tr>
                                <th>जम्मा</th>
                                <th>{{ $batch->damages->sum('total_damage') }}</th>
                            </tr>
                            <tr>
                                <th colspan="4">कच्चा पदार्थहरु</th>
                            </tr>
                        </table>
                        @endif

                        <br><br>
                    </div>
                </div>
            </section>
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
{{-- <script>
    $(document).ready(function() {
        calculateSubtotals();

        // Function to calculate subtotals
        function calculateSubtotals() {
            $('.new1').each(function() {
                var daysWorkedText = $(this).find('.days-work').text().trim();
                var hoursWorkedText = $(this).find('.hours-work').text().trim();
                var workerSalaryText = $(this).find('.worker-salary').text().trim();

                // Convert to numbers or default to 1 if empty
                var daysWorked = daysWorkedText ? parseFloat(daysWorkedText) : 1;
                var hoursWorked = hoursWorkedText ? parseFloat(hoursWorkedText) : 1;
                var workerSalary = workerSalaryText ? parseFloat(workerSalaryText) : 0; // Adjust as per your data

                // Perform calculation based on your business logic
                var subtotal = (daysWorked * workerSalary) + (hoursWorked * workerSalary);

                // Update the subtotal column in the current row
                $(this).find('.worker-sub-total').text(subtotal.toFixed(2));
            });
        }
    });
</script> --}}

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

@endsection

@extends('layouts.admin')
@section('title', 'सप्लायर्स')
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
                <li class="breadcrumb-item"><a href="#">सप्लायर्स</a></li>
                <li class="breadcrumb-item"><a href="#">उत्पादन</a></li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-10">
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

                            </tr>
                            <tr>
                                <td style="width:10rem">
                                    <input type="text" value="{{ $productionBatch['id'] }}" class="form-control" readonly/>
                                </td>
                                <td style="width:20rem">
                                    <input type="text" value="{{ $productionBatch->inventoryProduct->name }}" class="form-control" readonly/>
                                </td>
                                <td style="width:20rem">
                                <input class="form-control rounded " type="text" id="date" value="{{getStandardNumber( $data['nep_date_unicode'])}}" readonly>
                                </td>
                                <td style="width:20rem">
                                    <input class="form-control rounded " type="text" id="date" value="{{getStandardNumber( $data['nep_date_unicode'])}}" readonly>
                                    </td>
                                <td style="width:20rem">
                                    <input type="text" value="{{ $productionBatch['quantity_produced'] }}" class="form-control" readonly />
                                </td>

                            </tr>

                            {{-- <tr>
                                <th colspan="4">कच्चा पदार्थहरु</th>
                            </tr> --}}
                        </table>
                        <table class="table table-bordered" id="dynamicTable">
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

                        <table class="table table-bordered add-raw-materials">
                            <thead>
                                <tr>
                                    <th>कच्चा पदार्थ</th>
                                    <th>मात्रा</th>
                                </tr>
                            </thead>
                            <tbody id="transactionbody">

                                @foreach ($report as $item)
                                <tr class="new1">
                                    <td style="width:20rem">
                                        <input type="text" value="{{ $item->raw_material_name }}" class="form-control" />
                                    </td>
                                    <td style="width:20rem">
                                        <input type="text" value="{{ $item->total_quantity_used }}" class="form-control" />
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>

                        </table>

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


@endsection

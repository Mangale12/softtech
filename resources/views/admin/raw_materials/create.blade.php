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
                <li class="breadcrumb-item"><a href="#">कच्चा पद्दार्थ</a></li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route($_base_route.'.store')}}" method="POST" enctype="multipart/form-data">
            <section class="card">
                <header class="card-header">
                    कच्चा पद्दार्थ
                </header>
                <div class="card-body">
                    @csrf
                    <input type="hidden" name="udhyog" value="{{ request()->udhyog }}">
                    <input type="hidden" name="supplier_id" value="{{ request()->supplier }}">
                    <div class="form-group">
                        <label for="order_date">आपूर्ति मिति</label>
                        <input type="text" id="date" value="{{getStandardNumber( $data['nep_date_unicode'])}}" name="expire_date" placeholder="YYYY/MM/DD" class="form-control round" readonly/>
                    </div>
                    <div class="row">
                        <table class="table table-bordered" id="dynamicTable">
                            <thead>
                                <tr>
                                    <th>नाम <span class="text-danger">*</span></th>
                                    <th>एकाइ <span class="text-danger">*</span></th>
                                    <th>एकाइ मूल्य <span class="text-danger">*</span></th>
                                    <th>संख्या <span class="text-danger">*</span></th>
                                    <th>कुल खर्च</th>
                                    <th>हटाउनुहोस्</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="width:20rem">
                                        <select name="raw_material_id[]" class="form-control">
                                            <option selected disabled>कच्चा पद्दार्थ छान्नुहोस्</option>
                                            @foreach ($data['raw_material_name'] as $raw_material)
                                            <option value="{{ $raw_material['id'] }}">{{ $raw_material['name'] }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('raw_material_id'))
                                        <p id="name-error" class="help-block" for="worker_id"><span>{{ $errors->first('raw_material_id') }}</span></p>
                                        @endif
                                    </td>

                                    <td style="width:20rem">
                                        <select name="unit_id[]" class="form-control">
                                            <option selected disabled>एकाइ छान्नुहोस्</option>
                                            @foreach ($data['units'] as $unit)
                                            <option value="{{ $unit['id'] }}">{{ $unit['name'] }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('unit_id'))
                                        <p id="unit_id-error" class="help-block" for="unit_id"><span>{{ $errors->first('unit_id') }}</span></p>
                                        @endif
                                    </td>

                                    <td style="width:20rem">
                                        <input type="text" name="unit_price[]" class="form-control unit-price" placeholder="एकाइ मूल्य" />
                                        @if($errors->has('unit_price'))
                                        <p id="unit_price-error" class="help-block" for="unit_price"><span>{{ $errors->first('unit_price') }}</span></p>
                                        @endif
                                    </td>

                                    <td style="width:20rem">
                                        <input type="number" name="stock_quantity[]" class="form-control stock-quantity" placeholder="स्टक मात्रा" />
                                        @if($errors->has('stock_quantity'))
                                        <p id="stock_quantity-error" class="help-block" for="stock_quantity"><span>{{ $errors->first('stock_quantity') }}</span></p>
                                        @endif
                                    </td>

                                    <td style="width:20rem">
                                        <input type="number" name="total_cost[]" class="form-control total-cost" placeholder="कुल लागत" readonly />
                                        @if($errors->has('total_cost'))
                                        <p id="total_cost-error" class="help-block" for="total_cost"><span>{{ $errors->first('total_cost') }}</span></p>
                                        @endif
                                    </td>

                                    <td style="width:10rem">
                                        <button type="button" name="add" id="add" class="btn btn-sm btn-info">नयाँ थप्नुस</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" align="right">कुल लागत</td>
                                    <td colspan="2" align="left"><b id="total">0.00</b></td>
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
    $(document).ready(function () {
        $('#date').nepaliDatePicker({
            dateFormat: 'YYYY/MM/DD',
            closeOnDateSelect: true
        });
        // Function to calculate total cost for a row
        function calculateTotalCost(row) {
            const unitPrice = parseFloat($(row).find('.unit-price').val()) || 0;
            const stockQuantity = parseFloat($(row).find('.stock-quantity').val()) || 0;
            const totalCost = unitPrice * stockQuantity;
            $(row).find('.total-cost').val(totalCost.toFixed(2));
            return totalCost;
        }
        function calculateRemaining() {
            const total = parseFloat($('#total').text()) || 0;
            const amountPaid = parseFloat($('#amount-paid').val()) || 0;
            const remaining = total - amountPaid;
            $('#remaining').val(remaining.toFixed(2));
        }
        // Function to calculate total cost for all rows
        function calculateGrandTotal() {
            let grandTotal = 0;
            $('#dynamicTable tbody tr').each(function () {
                grandTotal += calculateTotalCost(this);
            });
            $('#total').text(grandTotal.toFixed(2));
        }

        // Initial calculation when document is ready
        calculateGrandTotal();

        // Add row
        $('#add').click(function () {
            const newRowHtml = `
                <tr>
                    <td style="width:20rem">
                        <select name="raw_material_id[]" class="form-control">
                            <option selected disabled>कच्चा पद्दार्थ छान्नुहोस्</option>
                            @foreach ($data['raw_material_name'] as $raw_material)
                            <option value="{{ $raw_material['id'] }}">{{ $raw_material['name'] }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('raw_material_id'))
                        <p id="name-error" class="help-block" for="worker_id"><span>{{ $errors->first('raw_material_id') }}</span></p>
                        @endif
                    </td>

                    <td style="width:20rem">
                        <select name="unit_id[]" class="form-control">
                            <option selected disabled>एकाइ छान्नुहोस्</option>
                            @foreach ($data['units'] as $unit)
                            <option value="{{ $unit['id'] }}">{{ $unit['name'] }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('unit_id'))
                        <p id="unit_id-error" class="help-block" for="unit_id"><span>{{ $errors->first('unit_id') }}</span></p>
                        @endif
                    </td>

                    <td style="width:20rem">
                        <input type="text" name="unit_price[]" class="form-control unit-price" placeholder="एकाइ मूल्य" />
                        @if($errors->has('unit_price'))
                        <p id="unit_price-error" class="help-block" for="unit_price"><span>{{ $errors->first('unit_price') }}</span></p>
                        @endif
                    </td>

                    <td style="width:20rem">
                        <input type="number" name="stock_quantity[]" class="form-control stock-quantity" placeholder="स्टक मात्रा" />
                        @if($errors->has('stock_quantity'))
                        <p id="stock_quantity-error" class="help-block" for="stock_quantity"><span>{{ $errors->first('stock_quantity') }}</span></p>
                        @endif
                    </td>

                    <td style="width:20rem">
                        <input type="number" name="total_cost[]" class="form-control total-cost" placeholder="कुल लागत" readonly />
                        @if($errors->has('total_cost'))
                        <p id="total_cost-error" class="help-block" for="total_cost"><span>{{ $errors->first('total_cost') }}</span></p>
                        @endif
                    </td>

                    <td style="width:10rem">
                        <button type="button" name="remove" class="btn btn-sm btn-danger remove-row">हटाउनुहोस्</button>
                    </td>
                </tr>
            `;
            $('#dynamicTable tbody').append(newRowHtml);
        });

        // Remove row
        $(document).on('click', '.remove-row', function () {
            $(this).closest('tr').remove();
            calculateGrandTotal();
        });

        // Calculate total cost when unit price or stock quantity changes
        $(document).on('change keyup', '.unit-price, .stock-quantity', function () {
            const row = $(this).closest('tr');
            calculateTotalCost(row);
            calculateGrandTotal();
        });
        $(document).on('change keyup', '#amount-paid', function () {
            calculateRemaining();
        });
    });
</script>
@endsection

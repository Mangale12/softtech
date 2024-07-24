@extends('layouts.admin')
@section('title', 'क्षति अभिलेख')
@section('content')
<link href="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/css/nepali.datepicker.v3.7.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<style>
    select[readonly]{
    background: #eee;
    cursor:no-drop;
}

select[readonly] option{
    display:none;
}
</style>
<div class="row">
    <div class="col-lg-8">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">क्षति अभिलेख</a></li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        {{-- {{ dd($_base_route) }} --}}
        <form action="{{ route($_base_route.'.update', $data['row']->id)}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="item_type" value="{{ $data['damage_item'] == 'product' ? 'product' : 'raw material'}}" >
            <section class="card">
                <header class="card-header">
                    क्षति अभिलेख
                </header>
                <div class="card-body">
                    @csrf
                    <input type="hidden" name="udhyog" value="{{ request()->udhyog }}">
                    <div class="row">
                        <table class="table table-bordered" id="dynamicTable">
                            <tr>
                                @if($data['damage_item'] == 'product')
                                <th>उत्पादन ब्याच नं. <span class="text-danger">*</span></th>
                                @endif
                                <th>{{ $data['damage_item'] == 'product' ? 'उत्पादन नाम' : 'कच्चा पद्दार्थ नाम' }} </th>

                                <th>क्षतिको प्रकार <span class="text-danger">*</span></th>
                                <th>क्षतिको संख्या <span class="text-danger">*</span></th>
                                @if($data['damage_item'] == 'product')
                                <th>रिपोर्ट गर्ने व्यक्ति  </th>
                                @elseif ($data['damage_item'] == 'raw material')
                                <th>आयात मिति </th>
                                @endif

                                <th>क्षतिको मिति <span class="text-danger">*</span></th>
                                {{-- <th>कार्य</th> --}}
                            </tr>
                            <tr>
                                @if($data['damage_item'] == 'product')
                                <td style="width:20rem">
                                    <input class="form-control production-batch" type="text" value="{{ old('production_batch',  $data['row']->production_batch_id != null ? $data['row']->production_batch_id : '') }}" name="production_batch" placeholder="उत्पादन ब्याच">
                                    @error('addmore.0.production_batch')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    {{-- <input type="text" value="{{ old('damage_date') }}" name="addmore[0][damage_date]" placeholder="क्षतिको मिति" class="form-control" /> --}}
                                </td>
                                @endif
                                <td style="width:30rem">
                                    <select name="product_id" class="form-control">
                                        <option selected disabled>{{ $data['damage_item'] == 'product' ? 'उत्पादन' : 'कच्चा पद्दार्थ' }} छान्नुहोस्</option>
                                        @foreach($data['rows'] as $row)
                                        <option value="{{$row->id}}" {{ $data['row']->damagable_id == $row->id ? 'selected' : '' }}> {{ $row->name }}</option>
                                        @endforeach
                                    </select>

                                </td>
                                <td style="width:30rem">
                                    <select name="damage_type_id" class="form-control">
                                        <option selected disabled>क्षतिको प्रकार छान्नुहोस्</option>
                                        @foreach($data['damage_types'] as $row)
                                        <option value="{{$row->id}}" {{ $data['row']->damage_type_id == $row->id ? 'selected' : '' }}>{{$row->type}}</option>
                                        @endforeach
                                    </select>
                                    @error('addmore.0.damage_type_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td style="width:20rem">
                                    <input type="nubmer" value="{{ old('quantity_damaged', $data['row']->quantity_damaged) }}" name="quantity_damaged" placeholder="क्षतिको संख्या" class="form-control" />
                                    @error('addmore.0.quantity_damaged')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </td>

                                <td style="width:20rem">
                                    <input class="form-control" name="reported_by" type="text" id="reported-by" value="{{ $data['row']->reported_by }}" placeholder="रिपोर्ट गर्ने व्यक्ति">
                                    {{-- <input type="text" value="{{ old('damage_date') }}" name="addmore[0][damage_date]" placeholder="क्षतिको मिति" class="form-control" /> --}}
                                </td>
                                <td style="width:20rem">
                                    <input class="form-control rounded " type="text" id="date" value="{{$data['row']->damage_date}}" name="damage_date" placeholder="क्षतिको मिति" readonly>
                                    @error('addmore.0.damage_date')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    {{-- <input type="text" value="{{ old('damage_date') }}" name="addmore[0][damage_date]" placeholder="क्षतिको मिति" class="form-control" /> --}}
                                </td>
                                {{-- <td style="width:10rem" colspan="1"><button type="button" name="add" id="add" class="btn btn-sm btn-info"> नयाँ थप्नुस</button></td> --}}
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
<script type="text/javascript">
    var i = 0;
    $("#add").click(function() {
        ++i;
        $("#dynamicTable").append('<tr> @if($data["damage_item"] == "product")<td><input class="form-control production-batch" type="number" name="addmore[' + i + '][production_batch]" placeholder="उत्पादन ब्याच"></td>@endif<td><select name="addmore[' + i + '][product_id]" class="form-control"><option value="">उत्पादन नाम छान्नुहोस्</option>@foreach($data['rows'] as $row)<option value="{{$row->id}}">{{$row->name}}</option>@endforeach</select></td><td><select name="addmore[' + i + '][damage_type_id]" class="form-control"><option value="">क्षतिको प्रकार छान्नुहोस्</option>@foreach($data['damage_types'] as $row)<option value="{{$row->id}}">{{$row->type}}</option>@endforeach</select></td><td><input type="number" value="{{ old('quantity_damaged') }}" name="addmore[' + i + '][quantity_damaged]" placeholder="क्षतिको संख्या" class="form-control" /></td><td><input class="form-control rounded " type="text" id="date" value="{{getStandardNumber( $data['nep_date_unicode'])}}" name="addmore[' + i + '][damage_date]" placeholder="क्षतिको मिति" readonly><td><button type="button" class="btn btn-danger btn-sm remove-tr">हटाउनुहोस्</button></td></tr>');
    });
    $(document).on('click', '.remove-tr', function() {
        $(this).parents('tr').remove();
    });

    function makeSelectReadonly(selector) {
        $(document).on('mousedown', selector, function(e) {
            e.preventDefault();
        });
    }

    makeSelectReadonly('.readonly-select');



</script>
<script>
    $(document).ready(function() {
        $('.select-two').select2();
        $('#date').nepaliDatePicker({
            dateFormat: 'DD/MM/YYYY',
            closeOnDateSelect: true
        });
        $(document).on('change', '.production-batch', function() {
            console.log($(this).val());
            var productionBatchInput = $(this);
            var productionBatch = productionBatchInput.val();
            $.ajax({
                url: '{{ route($_base_route.".check_production_batch") }}', // Replace with the actual URL to check the existence of production batch
                type: 'GET',
                data: { production_batch: productionBatch, batch_type:'product' },
                success: function(response) {
                    if (!response.bool === true) {
                        alert('उत्पादन ब्याच अवस्थित छैन!');
                        productionBatchInput.val('');
                    }else{
                        // console.log(response.data);
                        let productId = response.batch.id;
                        // Update the dropdown to select the product ID
                        console.log(productId);
                        $('select[name="addmore[0][product_id]"]').val(productId);
                    }
                }
            });
        });
    });
</script>
@endsection

@extends('layouts.admin')
@section('title', 'सप्लायर्स')
@section('content')
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
    <div class="col-lg-12 col-12">
        {{-- {{ dd($_base_route) }} --}}
        <form action="{{ route($_base_route.'.update', $data['row']->id)}}" method="POST" enctype="multipart/form-data">
            <section class="card">
                <header class="card-header">
                    उत्पादन
                </header>
                <div class="card-body">
                    @csrf
                    {{-- <input type="hidden" name="udhyog" value="{{ request()->udhyog }}"> --}}
                    <div class="row">
                        <table class="table table-bordered" id="dynamicTable">
                            <tr>
                                <th>उत्पादनको नाम <span class="text-danger">*</span> </th>
                                <th>ब्याच नं</th>
                                <th>एकाइ <span class="text-danger">*</span></th>
                                <th>मात्रा<span class="text-danger">*</span></th>
                            </tr>
                            <tr>
                                <td style="width:20rem">
                                    <input type="hidden" name="seed_id" value="{{ $data['row']->inventoryProduct->id }}">
                                    <input type="text" value="{{ $data['row']->inventoryProduct->name }}" class="form-control production-batch" readonly/>
                                </td>
                                <td style="width:20rem">
                                    <input type="text" value="{{ $data['row']->seedBatch->batch_no }}" name="batch_no" placeholder="#dfr" class="form-control production-batch" readonly/>
                                </td>
                                <td style="width:20rem">
                                    <select name="unit_id" id="" class="form-control">
                                        <option selected disabled >एकाइ छान्नुहोस्</option>
                                        @foreach ($data['units'] as $unit)
                                            <option value="{{ $unit['id'] }}" {{ $data['row']->unit_id == $unit['id'] ? 'selected' : '' }}>{{ $unit['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('unit'))
                                    <p id="name-error" class="help-block" for="unit"><span>{{ $errors->first('unit') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:20rem">
                                    <input type="number" value="{{ old('quantity', $data['row']->quantity) }}" name="quantity" placeholder="स्टक मात्रा" class="form-control" />
                                </td>
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
<script>
    $(document).on('change', '.production-batch', function() {
    console.log($(this).val());
    var productionBatchInput = $(this);
    var batch_type = $('#batch-type').val()
    console.log("batch tpye : "+batch_type);
    var productionBatch = productionBatchInput.val();
    $.ajax({
        url: '{{ route("admin.inventory.damage_records.check_production_batch") }}', // Replace with the actual URL to check the existence of production batch
        type: 'GET',
        data: {
            production_batch: productionBatch,
            batch_type : batch_type,
        },
        success: function(response) {
            if (!response.bool === true) {
                alert('उत्पादन ब्याच अवस्थित छैन!');
                productionBatchInput.val('');
            }else{
                console.log(response.batch);
                let productId = response.batch.id;
                let row = productionBatchInput.closest('tr');
                row.find('select[name="seed_id"]').val(productId);
            }
        }
    });
});
</script>
@endsection

@extends('layouts.admin')
@section('title', 'उत्पादन ब्याच')

@section('content')
<link href="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/css/nepali.datepicker.v3.7.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<div class="row">
    <div class="col-lg-8">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
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
                                    <input type="text" name="batch_no" value="{{ $data['row']->batch_no }}" placeholder="#234ABd" class="form-control"/>
                                    @if($errors->has('batch_no'))
                                    <p id="batch_no-error" class="help-block" for="batch_no"><span>{{ $errors->first('batch_no') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:20rem">
                                    <select name="product_id" id="" class="form-control">
                                        <option selected disabled >उत्पादनको नाम छान्नुहोस्</option>
                                        @foreach ($data['products'] as $product)
                                            <option value="{{ $product['id'] }}" {{ $data['row']->inventory_product_id != null ? ($data['row']->inventoryProduct->id == $product['id'] ? 'selected' : '' ) : '' }}>{{ $product['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('product_id'))
                                    <p id="product_id-error" class="help-block" for="product_id"><span>{{ $errors->first('product_id') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:20rem">
                                    <input class="form-control rounded " type="text" id="date" value="{{$data['row']->production_date}}" name="production_date" placeholder="मिति" readonly>
                                    @if($errors->has('production_date'))
                                    <p id="production_date-error" class="help-block" for="production_date"><span>{{ $errors->first('production_date') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:20rem">
                                    <input class="form-control rounded " type="text" id="expiry-date" value="{{$data['row']->expiry_date}}" name="expiry_date" placeholder="मिति" readonly>
                                    @if($errors->has('expiry_date'))
                                    <p id="expiry_date-error" class="help-block" for="expiry_date"><span>{{ $errors->first('expiry_date') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:20rem">
                                    <input type="number" value="{{ old('quantity_produced', $data['row']->quantity_produced) }}" name="quantity_produced" placeholder="उत्पादन भएको मात्रा" class="form-control" />
                                    @if($errors->has('quantity_produced'))
                                    <p id="quantity_produced-error" class="help-block" for="quantity_produced"><span>{{ $errors->first('quantity_produced') }}</span></p>
                                    @endif
                                </td>

                                <td style="width:20rem">
                                    <select class="form-control" name="batch_unit">
                                        <option selected disabled>एकाइ छान्नुहोस्</option>
                                        @foreach ($data['units'] as $index => $value)
                                            <option value="{{ $value->id }}" {{ $data['row']->unit_id == $value->id ? 'selected' : '' }}>
                                                {{ $value['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td style="width:20rem">
                                    <input type="text" value="{{ old('unit_price', $data['row']->unit_price) }}" name="unit_price" placeholder="रु." class="form-control" />
                                </td>

                            </tr>

                            <tr>
                                <th colspan="4">कच्चा पदार्थहरु <span class="text-danger">*</span></th>
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
    });
</script>


@endsection

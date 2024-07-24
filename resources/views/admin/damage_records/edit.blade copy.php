@extends('layouts.admin')
@section('title', 'क्षति अभिलेख')
@section('content')
<link href="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/css/nepali.datepicker.v3.7.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
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
    <div class="col-lg-10">
        {{-- {{ dd($_base_route) }} --}}
        <form action="{{ route($_base_route.'.update', $data['row']['id'])}}" method="POST" enctype="multipart/form-data">
            <section class="card">
                <header class="card-header">
                    क्षति अभिलेख
                </header>
                <div class="card-body">
                    @csrf
                    <input type="hidden" value="{{ $data['row']['udhyog_id'] }}" name="udhyog">
                    <div class="row">
                        <table class="table table-bordered" id="dynamicTable">
                            <tr>
                                <th>{{ $data['damage_item'] == 'product' ? 'उत्पादन नाम' : 'कच्चा पद्दार्थ नाम' }} </th>
                                <th>क्षतिको प्रकार</th>
                                <th>क्षतिको संख्या</th>
                                <th>क्षतिको मिति</th>
                                {{-- <th>कार्य</th> --}}
                            </tr>
                            <tr>
                                <td style="width:30rem">
                                    <select name="product_id" class="form-control">
                                        <option selected disabled>{{ $data['damage_item'] == 'product' ? 'उत्पादन' : 'कच्चा पद्दार्थ' }} छान्नुहोस्</option>
                                        @foreach($data['rows'] as $row)
                                        <option value="{{$row->id}}" {{ $data['row']['damagable_id'] == $row->id ? 'selected' : '' }}>{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td style="width:30rem">
                                    <select name="damage_type_id" class="form-control">
                                        <option selected disabled>क्षतिको प्रकार छान्नुहोस्</option>
                                        @foreach($data['damage_types'] as $row)
                                        <option value="{{$row->id}}" {{ $data['row']['damage_type_id'] == $row->id ? 'selected' : '' }}>{{$row->type}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td style="width:20rem"><input type="nubmer" value="{{ old('quantity_damaged', $data['row']['quantity_damaged']) }}" name="quantity_damaged" placeholder="क्षतिको संख्या" class="form-control" /></td>
                                @if($errors->has('quantity_damaged'))
                                <p id="name-error" class="help-block" for="worker_id"><span>{{ $errors->first('quantity_damaged') }}</span></p>
                                @endif
                                <td style="width:20rem">
                                    <input class="form-control rounded " type="text" id="date" value="{{getStandardNumber( $data['nep_date_unicode'])}}" name="damage_date" placeholder="क्षतिको मिति" readonly>
                                    {{-- <input type="text" value="{{ old('damage_date') }}" name="[damage_date]" placeholder="क्षतिको मिति" class="form-control" /> --}}
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
        $("#dynamicTable").append('<tr><td><select name="addmore[' + i + '][product_id]" class="form-control"><option value="">उत्पादन नाम छान्नुहोस्</option>@foreach($data['rows'] as $row)<option value="{{$row->id}}">{{$row->name}}</option>@endforeach</select></td><td><select name="addmore[' + i + '][damage_type_id]" class="form-control"><option value="">क्षतिको प्रकार छान्नुहोस्</option>@foreach($data['damage_types'] as $row)<option value="{{$row->id}}">{{$row->type}}</option>@endforeach</select></td><td><input type="number" value="{{ old('quantity_damaged') }}" name="addmore[' + i + '][quantity_damaged]" placeholder="क्षतिको संख्या" class="form-control" /></td><td><input class="form-control rounded " type="text" id="date" value="{{getStandardNumber( $data['nep_date_unicode'])}}" name="addmore[' + i + '][damage_date]" placeholder="क्षतिको मिति" readonly><td><button type="button" class="btn btn-danger btn-sm remove-tr">हटाउनुहोस्</button></td></tr>');
    });
    $(document).on('click', '.remove-tr', function() {
        $(this).parents('tr').remove();
    });

    $(document).ready(function() {
        $('.select-two').select2();
        $('#date').nepaliDatePicker({
            dateFormat: 'DD/MM/YYYY',
            closeOnDateSelect: true
        });
    });
</script>
@endsection

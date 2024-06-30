@extends('layouts.admin')
@section('title', 'सप्लाइर्स')
@section('content')
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
    <div class="col-lg-10">
        {{-- {{ dd($_base_route) }} --}}
        <form action="{{ route($_base_route.'.update', $data['row']->id )}}" method="POST" enctype="multipart/form-data">
            <section class="card">
                <header class="card-header">
                    कच्चा पद्दार्थ
                </header>
                <div class="card-body">
                    @csrf
                    <input type="hidden" value="{{ $data['row']['udhyog_id'] }}" name="udhyog">
                    <div class="row">
                        <table class="table table-bordered" id="dynamicTable">
                            <tr>
                                <th> नाम </th>
                                <th>सप्लाइर्स</th>
                                <th>स्टक मात्रा</th>
                                <th>एकाइ</th>
                            </tr>
                            <tr>
                                <td style="width:20rem">
                                    <select name="raw_material_id" id="" class="form-control">
                                        <option selected disabled >कच्चा पद्दार्थ छान्नुहोस्</option>
                                        @foreach ($data['raw_material_name'] as $raw_material)
                                        <option value="{{ $raw_material['id'] }}" {{ $raw_material['id'] == $data['row']['raw_material_id'] ? 'selected' : '' }}>{{ $raw_material['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('raw_material_id'))
                                    <p id="name-error" class="help-block" for="raw_material_id"><span>{{ $errors->first('raw_material_id') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:20rem">
                                    <select name="supplier_id" id="" class="form-control">
                                        <option selected disabled >सप्लाइर्स छान्नुहोस्</option>
                                        @foreach ($data['suppliers'] as $supplier)
                                        <option value="{{ $supplier['id'] }}" {{ $data['row']['supplier_id'] == $supplier->id ? 'selected' : ''}}>{{ $supplier['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('supplier'))
                                    <p id="name-error" class="help-block" for="worker_id"><span>{{ $errors->first('supplier') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:20rem"><input type="number" value="{{ old('stock_quantity', $data['row']['stock_quantity']) }}" name="stock_quantity" placeholder="स्टक मात्रा" class="form-control" /></td>
                                <td style="width:20rem">
                                    <select name="unit_id" id="" class="form-control">
                                        <option selected disabled >एकाइ छान्नुहोस्</option>
                                        @foreach ($data['units'] as $unit)
                                            <option value="{{ $unit['id'] }}" {{ $data['row']['unit_id'] == $unit->id ? 'selected' : '' }}>{{ $unit['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('unit'))
                                    <p id="name-error" class="help-block" for="worker_id"><span>{{ $errors->first('unit') }}</span></p>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th>एकाइ मूल्य</th>
                                <th> म्याद सकिने मिति </th>
                                <th>विवरण</th>
                            </tr>
                            <tr>
                                <td style="width:20rem">
                                    <input type="text" value="{{ old('unit_price', $data['row']['unit_price']) }}" name="unit_price" placeholder="एकाइ मूल्य" class="form-control" />
                                </td>
                                <td style="width:20rem">
                                    <input type="date" value="{{ old('expire_date', $data['row']['expiry_date']) }}" name="expire_date" placeholder="म्याद सकिने मिति" class="form-control" />
                                </td>

                                <td style="width:20rem" colspan="2">
                                    <textarea class="form-control" id="description" name="description">{{ $data['row']['description'] }}</textarea>
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

@endsection

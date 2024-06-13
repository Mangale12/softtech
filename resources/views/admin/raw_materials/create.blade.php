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
        <form action="{{ route($_base_route.'.store')}}" method="POST" enctype="multipart/form-data">
            <section class="card">
                <header class="card-header">
                    कच्चा पद्दार्थ
                </header>
                <div class="card-body">
                    @csrf
                    <input type="hidden" name="udhyog" value="{{ request()->udhyog }}">
                    <div class="row">
                        <table class="table table-bordered" id="dynamicTable">
                            <tr>
                                <th> नाम <span class="text-danger">*</span> </th>
                                <th>सप्लाइर्स</th>
                                <th>कुल संख्या <span class="text-danger">*</span></th>
                                <th>एकाइ <span class="text-danger">*</span></th>
                            </tr>
                            <tr>
                                <td style="width:20rem">
                                    <select name="raw_material_id" id="" class="form-control">
                                        <option selected disabled >कच्चा पद्दार्थ छान्नुहोस्</option>
                                        @foreach ($data['raw_material_name'] as $raw_material)
                                        <option value="{{ $raw_material['id'] }}">{{ $raw_material['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('raw_material_id'))
                                    <p id="name-error" class="help-block" for="worker_id"><span>{{ $errors->first('raw_material_id') }}</span></p>
                                    @endif
                                </td>

                                <td style="width:20rem">
                                    <select name="supplier_id" id="" class="form-control">
                                        <option selected disabled >सप्लाइर्स छान्नुहोस्</option>
                                        @foreach ($data['suppliers'] as $supplier)
                                        <option value="{{ $supplier['id'] }}">{{ $supplier['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('supplier'))
                                    <p id="name-error" class="help-block" for="worker_id"><span>{{ $errors->first('supplier') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:20rem">
                                    <input type="number" value="{{ old('stock_quantity') }}" name="stock_quantity" placeholder="स्टक मात्रा" class="form-control" />
                                    @if($errors->has('stock_quantity'))
                                    <p id="stock_quantity-error" class="help-block" for="stock_quantity"><span>{{ $errors->first('stock_quantity') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:20rem">
                                    <select name="unit_id" id="" class="form-control">
                                        <option selected disabled >एकाइ छान्नुहोस्</option>
                                        @foreach ($data['units'] as $unit)
                                            <option value="{{ $unit['id'] }}">{{ $unit['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('unit_id'))
                                    <p id="unit_id-error" class="help-block" for="unit_id"><span>{{ $errors->first('unit_id') }}</span></p>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th>एकाइ मूल्य <span class="text-danger">*</span></th>
                                <th> म्याद सकिने मिति </th>
                                <th>विवरण</th>
                            </tr>
                            <tr>
                                <td style="width:20rem">
                                    <input type="text" value="{{ old('unit_price') }}" name="unit_price" placeholder="एकाइ मूल्य" class="form-control" />
                                    @if($errors->has('unit_price'))
                                    <p id="unit_price-error" class="help-block" for="unit_price"><span>{{ $errors->first('unit_price') }}</span></p>
                                    @endif
                                </td>

                                <td style="width:20rem">
                                    <input type="text" value="{{ old('expire_date') }}" name="expire_date" placeholder="म्याद सकिने मिति" class="form-control" />
                                </td>

                                <td style="width:20rem" colspan="2">
                                    <textarea class="form-control" id="description" name="description"></textarea>
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

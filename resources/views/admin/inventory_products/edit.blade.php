@extends('layouts.admin')
@section('title', 'उत्पादन')
@section('content')
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
<div class="row">
    <div class="col-lg-12 col-12">
        {{-- {{ dd($_base_route) }} --}}
        <form action="{{ route($_base_route.'.update', $data['row']['id'])}}" method="POST" enctype="multipart/form-data">
            <section class="card">
                <header class="card-header">
                    उत्पादन
                </header>
                <div class="card-body">
                    @csrf
                    <input type="hidden" name="udhyog" value="{{ $data['row']['udhyog_id'] }}">
                    <div class="row">
                        <table class="table table-bordered" id="dynamicTable">
                            <tr>
                                <th> नाम <span class="text-danger">*</span></th>
                                {{-- <th>उत्पादनको फोटो</th> --}}
                                <th>स्टक मात्रा <span class="text-danger">*</span></th>
                                <th>एकाइ <span class="text-danger">*</span></th>
                                <th>चेतावनी दिन <span class="text-danger">*</span></th>
                                <th>एकाइ मूल्य</th>
                                <th> म्याद सकिने मिति </th>
                            </tr>
                            <tr>
                                <td style="width:20rem">
                                    <input type="text" value="{{ old('name',$data['row']['name']) }}" name="name" placeholder="उत्पादनको फोटो" class="form-control" />
                                </td>
                                <td style="width:20rem"><input type="number" value="{{ old('stock_quantity',$data['row']['stock_quantity']) }}" name="stock_quantity" placeholder="स्टक मात्रा" class="form-control" /></td>
                                <td style="width:20rem">
                                    <select name="unit_id" id="" class="form-control">
                                        <option selected disabled >एकाइ छान्नुहोस्</option>
                                        @foreach ($data['units'] as $unit)
                                            <option value="{{ $unit['id'] }}" {{ $data['row']['unit_id'] == $unit->id ? 'selected' :'' }}>{{ $unit['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('unit'))
                                    <p id="name-error" class="help-block" for="worker_id"><span>{{ $errors->first('unit') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:20rem">
                                    <input type="nubmer" value="{{ old('alert_days', $data['row']['alert_days']) }}" name="alert_days" placeholder="चेतावनी दिन" class="form-control" />
                                </td>
                                <td style="width:20rem">
                                    <input type="text" value="{{ old('unit_price', $data['row']['price']) }}" name="unit_price" placeholder="एकाइ मूल्य" class="form-control" />
                                </td>
                                <td style="width:20rem">
                                    <input type="date" value="{{ old('expire_date', $data['row']['expiry_date']) }}" name="expire_date" placeholder="म्याद सकिने मिति" class="form-control" />
                                </td>
                            </tr>

                            {{-- <tr>
                                <th>एकाइ मूल्य</th>
                                <th> म्याद सकिने मिति </th>

                            </tr>
                            <tr>
                                <td style="width:20rem">
                                    <input type="text" value="{{ old('unit_price', $data['row']['price']) }}" name="unit_price" placeholder="एकाइ मूल्य" class="form-control" />
                                </td>
                                <td style="width:20rem">
                                    <input type="date" value="{{ old('expire_date', $data['row']['expiry_date']) }}" name="expire_date" placeholder="म्याद सकिने मिति" class="form-control" />
                                </td>
                            </tr> --}}
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

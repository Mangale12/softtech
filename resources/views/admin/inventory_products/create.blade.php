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
        <form action="{{ route($_base_route.'.store')}}" method="POST" enctype="multipart/form-data">
            <section class="card">
                <header class="card-header">
                    उत्पादन
                </header>
                <div class="card-body">
                    @csrf
                    <input type="hidden" name="udhyog" value="{{ request()->udhyog }}">
                    <div class="row">
                        <table class="table table-bordered" id="dynamicTable">
                            <tr>
                                <th> नाम <span class="text-danger">*</span> </th>
                                {{-- <th>श्रेणी</th> --}}
                                {{-- <th>उत्पादनको फोटो</th> --}}
                                {{-- <th>स्टक मात्रा</th> --}}
                                <th>चेतावनी दिन <span class="text-danger">*</span></th>
                                @if(request()->udhyog == 'Hybrid Biu')
                                <th>जात <span class="text-danger">*</span></th>
                                @endif
                                {{-- <th>एकाइ मूल्य <span class="text-danger">*</span></th> --}}
                                {{-- <th> म्याद सकिने मिति </th> --}}
                            </tr>
                            <tr>
                                <td style="width:20rem">
                                    <input type="text" value="{{ old('name') }}" name="name" placeholder="उत्पादन" class="form-control" />
                                    @if($errors->has('name'))
                                    <p id="fiscal-error" class="help-block" for="name"><span>{{ $errors->first('name') }}</span></p>
                                    @endif
                                </td>

                                {{-- <td style="width:20rem"><input type="number" value="{{ old('stock_quantity') }}" name="stock_quantity" placeholder="स्टक मात्रा" class="form-control" /></td> --}}

                                <td style="width:20rem">
                                    <input type="nubmer" value="{{ old('alert_days') }}" name="alert_days" placeholder="चेतावनी दिन" class="form-control" />
                                </td>
                                @if(request()->udhyog == 'Hybrid Biu')

                               <td style="width:20rem">
                                    <select name="seed_jaat_id" id="" class="form-control">
                                        <option selected disabled >जात छान्नुहोस्</option>
                                        @foreach ($data['jaat'] as $jaat)
                                            <option value="{{ $jaat['id'] }}">{{ $jaat['jaat'] }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('seed_jaat_id'))
                                    <p id="name-error" class="help-block" for="seed_jaat_id"><span>{{ $errors->first('seed_jaat_id') }}</span></p>
                                    @endif
                                </td>
                                @endif
                                 {{--
                                <td style="width:20rem">
                                    <input type="text" value="{{ old('unit_price') }}" name="unit_price" placeholder="एकाइ मूल्य" class="form-control" />
                                    @if($errors->has('unit_price'))
                                    <p id="unit_price" class="help-block" for="unit_price"><span>{{ $errors->first('fiscal') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:20rem">
                                    <input type="date" value="{{ old('expire_date') }}" name="expire_date" placeholder="म्याद सकिने मिति" class="form-control" />
                                </td> --}}
                            </tr>

                            {{-- <tr>
                                <th>एकाइ <span class="text-danger">*</span></th>
                                <th>एकाइ मूल्य <span class="text-danger">*</span></th>
                                <th> म्याद सकिने मिति </th>

                            </tr>
                            <tr>
                                <td style="width:20rem">
                                    <select name="unit_id" id="" class="form-control">
                                        <option selected disabled >एकाइ छान्नुहोस्</option>
                                        @foreach ($data['units'] as $unit)
                                            <option value="{{ $unit['id'] }}">{{ $unit['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('unit'))
                                    <p id="name-error" class="help-block" for="unit"><span>{{ $errors->first('unit') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:20rem">
                                    <input type="text" value="{{ old('unit_price') }}" name="unit_price" placeholder="एकाइ मूल्य" class="form-control" />
                                    @if($errors->has('unit_price'))
                                    <p id="unit_price" class="help-block" for="unit_price"><span>{{ $errors->first('fiscal') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:20rem">
                                    <input type="date" value="{{ old('expire_date') }}" name="expire_date" placeholder="म्याद सकिने मिति" class="form-control" />
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

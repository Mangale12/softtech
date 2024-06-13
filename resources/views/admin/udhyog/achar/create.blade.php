@extends('layouts.admin')
@section('title', 'कामदार पद')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">कामदार पद</a></li>
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
                    कामदार पद
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <table class="table table-bordered" id="dynamicTable">
                            <tr>
                                <th>सिचाई</th>
                                <th>जमिन</th>
                                <th>गोदाम</th>
                                <th>औचार/उपकरण </th>
                                <th>इन्धन</th>
                            </tr>
                            <tr>
                                <td style="width:30rem">
                                    <select name="irrigation_category" class="form-control">
                                        <option value="">सिचाई प्रकार छान्नुहोस्</option>
                                        @foreach($data['irrigation'] as $row)
                                        <option value="{{$row->id}}">{{ $row->title }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td style="width:30rem">
                                    <select name="land_category" class="form-control">
                                        <option value="">जमिन प्रकार छान्नुहोस्</option>
                                        @foreach($data['land'] as $row)
                                        <option value="{{$row->id}}">{{ $row->title }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td style="width:30rem">
                                    <select name="store_category" class="form-control">
                                        <option value="">गोदाम प्रकार छान्नुहोस्</option>
                                        @foreach($data['store'] as $row)
                                        <option value="{{$row->id}}">{{ $row->title }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td style="width:30rem">
                                    <select name="equipment_category" class="form-control">
                                        <option value="">औचार/उपकरण प्रकार छान्नुहोस्</option>
                                        @foreach($data['irrigation'] as $row)
                                        <option value="{{$row->id}}">{{ $row->title }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td style="width:30rem">
                                    <select name="fuel_category" class="form-control">
                                        <option value="">इन्धन प्रकार छान्नुहोस्</option>
                                        @foreach($data['irrigation'] as $row)
                                        <option value="{{$row->id}}">{{ $row->title }}</option>
                                        @endforeach
                                    </select>
                                </td>

                                {{-- <td style="width:20rem"><input type="text" value="{{ old('position') }}" name="addmore[0][position]" placeholder="पद" class="form-control" /></td>
                                @if($errors->has('worker_id'))
                                <p id="name-error" class="help-block" for="worker_id"><span>{{ $errors->first('worker_id') }}</span></p>
                                @endif --}}
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
{{-- <script type="text/javascript">
    var i = 0;
    $("#add").click(function() {
        ++i;
        $("#dynamicTable").append('<tr><td><select name="addmore[' + i + '][worker_id]" class="form-control"><option value="">कामदार प्रकार छान्नुहोस्</option>@foreach($data['rows'] as $row)<option value="{{$row->id}}">{{$row->types}}</option>@endforeach</select></td><td><input type="text" value="{{ old('salary') }}" name="addmore[' + i + '][salary]" placeholder="पद" class="form-control" /></td><td><input type="text" value="{{ old('salary') }}" name="addmore[' + i + '][salary]" placeholder="तलब" class="form-control" /></td><td><input type="text" name="addmore[' + i + '][bhatta]" value="{{ old('bhatta') }}" placeholder="भत्ता" class="form-control" /></td><td><button type="button" class="btn btn-danger btn-sm remove-tr">हटाउनुहोस्</button></td></tr>');
    });
    $(document).on('click', '.remove-tr', function() {
        $(this).parents('tr').remove();
    });
</script> --}}
@endsection

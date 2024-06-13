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
        {{-- {{ dd($_base_route) }} --}}
        <form action="{{ route($_base_route.'.store')}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="udhyog_id" value="{{ !empty($udhyog) ? $udhyog->id : null}}" >
            <section class="card">
                <header class="card-header">
                   {{ !empty($udhyog) ? $udhyog->name : '' }} कामदार पद
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <table class="table table-bordered" id="dynamicTable">
                            <tr>
                                <th>कामदार प्रकार</th>
                                <th>पद</th>
                                <th>तलब</th>
                                <th>भत्ता</th>
                                <th>कार्य</th>
                            </tr>
                            <tr>
                                <td style="width:30rem">
                                    <select name="addmore[0][worker_id]" class="form-control">
                                        <option value="">कामदार प्रकार छान्नुहोस्</option>
                                        @foreach($data['rows'] as $row)
                                        <option value="{{$row->id}}">{{$row->types}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td style="width:20rem">
                                    <input type="text" value="{{ old('position') }}" name="addmore[0][position]" placeholder="पद" class="form-control" />
                                </td>
                                @if($errors->has('worker_id'))
                                <p id="name-error" class="help-block" for="worker_id"><span>{{ $errors->first('worker_id') }}</span></p>
                                @endif
                                <td style="width:20rem">
                                    <input type="text" value="{{ old('salary') }}" name="addmore[0][salary]" placeholder="तलब" class="form-control" />
                                </td>
                                <td style="width:20rem">
                                    <input type="text" name="addmore[0][bhatta]" value="{{ old('bhatta') }}" placeholder="भत्ता" class="form-control" />
                                </td>
                                <td style="width:10rem" colspan="1"><button type="button" name="add" id="add" class="btn btn-sm btn-info"> नयाँ थप्नुस</button></td>
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
<script type="text/javascript">
    var i = 0;
    $("#add").click(function() {
        ++i;
        $("#dynamicTable").append('<tr><td><select name="addmore[' + i + '][worker_id]" class="form-control"><option value="">कामदार प्रकार छान्नुहोस्</option>@foreach($data['rows'] as $row)<option value="{{$row->id}}">{{$row->types}}</option>@endforeach</select></td><td><input type="text" value="{{ old('salary') }}" name="addmore[' + i + '][salary]" placeholder="पद" class="form-control" /></td><td><input type="text" value="{{ old('salary') }}" name="addmore[' + i + '][salary]" placeholder="तलब" class="form-control" /></td><td><input type="text" name="addmore[' + i + '][bhatta]" value="{{ old('bhatta') }}" placeholder="भत्ता" class="form-control" /></td><td><button type="button" class="btn btn-danger btn-sm remove-tr">हटाउनुहोस्</button></td></tr>');
    });
    $(document).on('click', '.remove-tr', function() {
        $(this).parents('tr').remove();
    });
</script>
@endsection

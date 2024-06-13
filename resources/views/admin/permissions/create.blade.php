@extends('layouts.admin')
@section('title', 'अनुमति')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">नयाँ अनुमति</a></li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <form action="{{ route($_base_route.'.store')}}" method="POST" enctype="multipart/form-data">
            <section class="card">
                <header class="card-header">
                    नयाँ अनुमति
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="title">अनुमति</label> <br>
                                <input class="form-control rounded" type="text" id="title" value="{{ old('name') }}" name="name" placeholder="अनुमति">
                                @if($errors->has('name'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('name') }}</span></p>
                                @endif
                            </div>
                        </div>

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

{{-- @extends('layouts.admin')
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
                                <th>अनुमति</th>
                                <th>अनुमति</th>
                            </tr>
                            <tr>
                                <td style="width:"><input type="text" value="{{ old('salary') }}" name="addmore[0][salary]" placeholder="तलब" class="form-control" /></td>
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
        $("#dynamicTable").append('<tr><td><input type="text" value="{{ old('salary') }}" name="addmore[' + i + '][salary]" placeholder="तलब" class="form-control" /></td><td><button type="button" class="btn btn-danger btn-sm remove-tr">हटाउनुहोस्</button></td></tr>');
    });
    $(document).on('click', '.remove-tr', function() {
        $(this).parents('tr').remove();
    });
</script>
@endsection --}}

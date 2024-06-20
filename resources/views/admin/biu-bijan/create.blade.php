@extends('layouts.admin')
@section('title', 'बिउ बिजन बिबरण')
@section('css')
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">बिउ बिजन बिबरण </a></li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route($_base_route.'.store')}}" method="POST" enctype="multipart/form-data">
            <section class="card">
                <header class="card-header">
                बिउ बिजन बिबरण
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="title">बिउ नाम</label> <br>
                                <input class="form-control rounded" type="text" id="title" value="{{ old('seed_name') }}" name="seed_name" placeholder="बिउ नाम">
                                @if($errors->has('seed_name'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('seed_name') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="title"> बिउको प्रकार </label> <br>
                                <select name="seed_type_id" id="seed-type" class="form-control rounded">
                                    <option selected disabled>बिउको प्रकार छान्नुहोस् </option>
                                    @foreach ($data['seed_type'] as $seedType)
                                    <option value="{{ $seedType->id }}" {{ old('seed_type_id') == $seedType->id ? 'selected' : '' }}>{{ $seedType->name }}</option>
                                    @endforeach

                                </select>
                                @if($errors->has('seed_type_id'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('seed_type_id') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="title"> एकाइ </label> <br>
                                <select name="unit" id="unit-type" class="form-control rounded">
                                    <option selected disabled>एकाइ छान्नुहोस् </option>
                                    @foreach ($data['units'] as $unit)
                                    <option value="{{ $unit->id }}" {{ old('unit') == $unit->id ? 'selected' : '' }}>{{ $unit->name }}</option>
                                    @endforeach

                                </select>
                                @if($errors->has('unit'))
                                <p id="unit-error" class="help-block" for="unit"><span>{{ $errors->first('unit') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="title"> बिउको मूल्य </label> <br>
                                <input class="form-control rounded" type="text" id="cost" value="{{ old('cost') }}" name="cost" placeholder="बिउको मूल्य">
                                @if($errors->has('cost'))
                                <p id="cost-error" class="help-block" for="cost"><span>{{ $errors->first('cost') }}</span></p>
                                @endif
                            </div>
                        </div>


                        <div class="col-9">
                            <div class="form-group">
                                <label for="status">विवरण</label>
                                <div class="form-group">
                                    <textarea name="description" placeholder="विवरण" id="description" class="form-control rounded"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="status">स्थिति</label>
                                <div class="form-group">
                                    <label class="ui-checkbox">
                                        <input type="hidden" name="status" value=0 ><span class="input-span"></span>
                                        <input type="checkbox" name="status" value=1 checked><span class="input-span"></span>
                                    </label>
                                </div>
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
@section('js')
<!-- <script>
    $(function() {
        $("#optional").click(function() {
            if ($(this).is(":checked")) {
                $(".test").show();
            } else {
                $(".test").hide();
                $("#anudaan").val("");
            }
        });
    });
</script> -->
@endsection

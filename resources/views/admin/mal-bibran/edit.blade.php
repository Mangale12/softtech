@extends('layouts.admin')
@section('title', 'तालिम')
@section('css')
<!--Form Wizard-->
@endsection
@section('content')
<div class="row">
    <div class="col-lg-8">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">तालिम</a></li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <form action="{{ route($_base_route.'.update', $data['rows']->id )}}" method="POST" enctype="multipart/form-data">
        <section class="card">
                <header class="card-header">
                    मल बिबरण
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="title">मल नाम</label> <br>
                                <input class="form-control rounded" type="text" id="title" value="@if(isset($data['rows']->title)) {{ $data['rows']->title }} @else {{ old('title') }} @endif" name="title" placeholder="मल नाम">
                                @if($errors->has('title'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('title') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <!-- <div class="col-md-3">
                            <div class="form-group">
                                <label for="status">अनुदान पाएको छ भने </label>
                                <div class="form-group">
                                    <label class="ui-checkbox">
                                    <input type="checkbox" name="optional" id="optional" class="checked" @if(isset($data['rows']->anudaan)) ? checked : @endif >
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 test" style="display: none;">
                            <div class="form-group">
                                <label for="anudaan">अनुदान</label> <br>
                                <input class="form-control rounded" type="text" id="anudaan" value="@if(isset($data['rows']->title)) {{ $data['rows']->title }} @else {{ old('title') }} @endif" name="anudaan" placeholder="अनुदान">
                                @if($errors->has('anudaan'))
                                <p id="name-error" class="help-block" for="anudaan"><span>{{ $errors->first('anudaan') }}</span></p>
                                @endif
                            </div>
                        </div> -->
                        @include('admin.section.status-edit')
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
<script>
     //nabalak
     $(function() {
        $("#optional").click(function() {
            if ($(this).is(":checked")) {
                $(".test").show();
            } else {
                $(".test").hide();
            }
        });
    });
</script>
@endsection
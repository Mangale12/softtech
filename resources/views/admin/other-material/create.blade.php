@extends('layouts.admin')
@section('title', 'अन्य सामग्री')
@section('css')
<!--Form Wizard-->
<link href="{{ asset('assets/cms/assets/summernote/summernote-bs4.css')}}" rel="stylesheet">
<link href="{{ asset('assets/cms/assets/select2/css/select2.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">अन्य सामग्री</a></li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
{{-- {{ dd($_base_route) }} --}}
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route($_base_route.'.store')}}" method="POST" enctype="multipart/form-data">
            <section class="card">
                <header class="card-header">
                    अन्य सामग्री
                </header>
                <div class="card-body">
                    @csrf
                    <div class="form-group row">
                        <label for="title" class="col-sm-2">अन्य सामग्री नाम :</label>
                        <div class="col-sm-10">
                            <input class="form-control rounded form-control-sm" id="title" value="{{ old('name') }}" placeholder="अन्य सामग्री नाम" name="name" type="text">
                            @if($errors->has('name'))
                            <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('name') }}</span></p>
                            @endif
                        </div>
                    </div>

                    {{-- <div class="form-group row">
                        <label for="status" class="col-sm-2">स्थिति:</label>
                        <div class="col-sm-10">
                            <label class="ui-checkbox">
                                <input type="hidden" name="status" value=0><span class="input-span"></span>
                                <input type="checkbox" name="status" value=1><span class="input-span"></span>
                            </label>
                        </div>
                    </div> --}}

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
<!--summernote-->
<script src="{{ asset('assets/cms/assets/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{ asset('assets/cms/assets/select2/js/select2.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#is_parent').on('change', function() {
            let is_checked = $(this).prop("checked");
            if (is_checked) {
                $('#parent_id').val('null');
                $('#parent_cat_div').addClass('d-none');
            } else {
                $('#parent_cat_div').removeClass('d-none');
            }
        });
        /***************************summernote *********************/

        $('.summernote').summernote({
            height: 100, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: true // set focus to editable area after initializing summernote
        });
        //select 2
        $(".select-two").select2({
            // allowClear: true
        });
    });
</script>

@endsection

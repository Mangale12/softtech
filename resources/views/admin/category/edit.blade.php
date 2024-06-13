@extends('layouts.admin')
@section('title', 'तालिम')
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
                <li class="breadcrumb-item"><a href="#">तालिम</a></li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route($_base_route.'.update', $data['rows']->id )}}" method="POST" enctype="multipart/form-data">
            <section class="card">
                <header class="card-header">
                    उत्पादन प्रकार
                </header>
                <div class="card-body">
                    @csrf
                    <div class="form-group row">
                        <label for="title" class="col-sm-2">उत्पादन प्रकार:</label>
                        <div class="col-sm-10">
                            <input class="form-control rounded" type="text" id="title" value="@if(isset($data['rows']->title)) {{ $data['rows']->title }} @else {{ old('title') }} @endif" name="title" placeholder="उत्पादन प्रकार">
                            @if($errors->has('title'))
                            <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('title') }}</span></p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-sm-2">Is Parent:</label>
                        <div class="col-sm-10">
                            <label class="ui-checkbox">
                                <input type="checkbox" name="is_parent" id="is_parent" value=1 {{  ($data['rows']->parent_id != null) ? '' : 'checked'  }}><span class="input-span"></span> Yes
                            </label> @if($errors->has('duration'))
                            <p id="name-error" class="help-block" for="duration"><span>{{ $errors->first('duration') }}</span></p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{ ( ($data['rows']->parent_id != null) ? '' : 'd-none' ) }}" id="parent_cat_div">
                        <label for="parent_id" class="col-sm-2 ">उत्पादन प्रकार:</label>
                        <div class="col-sm-10">
                            <select name="parent_id" id="parent_id" class="form-control select-two">
                                <option value=>छान्नुहोस्</option>
                                @foreach($data['category'] as $row)
                                <option value="{{ $row->id }}" @if($data['rows']->parent_id == $row->id) selected @endif >{{ $row->title }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('parent_id'))
                            <p id="name-error" class="help-block " for="parent_id"><span>{{ $errors->first('parent_id') }}</span></p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="summary" class="col-sm-2">बारेमा:</label>
                        <div class="col-sm-10">
                            <textarea name="summary" cols="4" rows="2" id="summary" class="form-control rounded summernote" value="">@if(isset($data['rows']->summary)) {!! $data['rows']->summary !!} @else {{ old('summary') }} @endif</textarea>
                            @if($errors->has('title'))
                            <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('title') }}</span></p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="image" class="col-sm-2">उत्पादन फोटा:</label>
                        <div class="col-sm-10">
                            <input class="form-control rounded" type="file" name="image" id="image" value="" accept="image/png, image/gif, image/jpeg">
                            @if($errors->has('image'))
                            <p id="name-error" class="help-block " for="image"><span>{{ $errors->first('image') }}</span></p>
                            @endif <br>
                            @if($data['rows']->image)
                            <div class="form-group">
                                <img src="{{ $data['rows']->image }}" class="img  img-responsive" width="80px" height="80px" alt="{{ $data['rows']->title }}" title="{{ $data['rows']->title }}">
                            </div>
                            @else
                            फोटा भेटिएन !
                            @endif
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-sm-2">स्थिति:</label>
                        <div class="col-sm-10">
                            <label class="ui-checkbox">
                                <input type="hidden" name="status" value=0><span class="input-span"></span>
                                <input type="checkbox" name="status" value=1 @if($data['rows']->status){{ "checked" }} @endif ><span class="input-span"></span>
                            </label>
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
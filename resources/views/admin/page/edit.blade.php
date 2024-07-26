@extends('layouts.admin')
@section('title')
Admin {{ $_panel }} Edit | SCMS
@endsection
@section('styles')
<!-- PLUGINS STYLES-->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endsection
@section('content')
@include('admin.section.flash_message_error')
<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index')}}"><i class="fa fa-home"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route($_base_route.'.index')}}">{{ $_panel }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route($_base_route.'.update', $data['rows']->post_unique_id )}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                @csrf
                <input name="type" type="hidden" value="page">
                <div class="col-md-8">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Edit Pages</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <input name="category_id " type="hidden" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input class="form-control rounded" type="text" name="title" value="@if(isset($data['rows']->title)) {{ $data['rows']->title   }} @endif" id="title" placeholder="Title">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" id="my-editor" cols="30" rows="5" class="form-control rounded summernote" value="">@if(isset($data['rows']->description)) {{ $data['rows']->description   }} @endif</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Thumbnail</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <div class="panel-body">
                                <div class="form-group ">
                                    <label for="image" class="">Thumbnail Image</label>
                                    <input class=" form-control" type="file" id="image" name="image" value="" accept="image/png, image/gif, image/jpeg">
                                </div>
                            </div>
                            @if($data['rows']->thumbs)
                            <div class="form-group">
                                <img src="{{ $data['rows']->thumbs }}" class="img img-thumbnail img-responsive" width="100px" alt="{{ $data['rows']->title }}" title="{{ $data['rows']->title }}">
                            </div>
                            @endif
                            <div class="panel-body">
                                <div class="form-group ">
                                    <label for="image" class="">Brochure</label>
                                    <input class=" form-control" type="file" id="brochure" name="brochure[]" value="" accept="image/png, image/gif, image/jpeg,application/pdf,application/vnd.ms-excel">
                                </div>
                            </div>
                            @if(isset($data['file']))
                            <table class="display table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>file</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data['file'] as $row)
                                    <tr class="gradeX">
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a href="{{ asset($row->file )}}" target="_file"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></td>
                                        <td>
                                            @include('admin.section.buttons.button-delete-slider')
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @endif
                        </div>
                    </div>
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Course content</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="uploadSliderImages">Course content</label>
                                    <div class="input-group control-group increment">
                                        <input type="text" class="form-control rounded" name="course_content[]">
                                        <button class="btn btn-success btn-img btn-sm" type="button"><i class="fa fa-plus fa-sm text-white-50"></i> Add</button>
                                        <div class="input-group-btn">
                                        </div>
                                    </div>
                                    <div class="slider-image-block">
                                    </div>
                                    <div class="clone-img hidden">
                                        <div class="control-group input-group" style="margin-top:10px">
                                            <input type="text" class="form-control rounded" name="course_content[]">
                                            <div class="input-group-btn">
                                                <button class="btn btn-danger  btn-remove" type="button"><i class="fa fa-trash fa-sm text-white-50"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <?php $featuredArray = json_decode($data['rows']->course_content); ?>
                                    <div class="clone-feature @if(!$featuredArray)hide @endif">
                                        @if($featuredArray)
                                        @foreach($featuredArray as $featured)
                                        <div class="control-group input-group" style="margin-top:10px">
                                            <input type="text" name="course_content[]" class="form-control rounded" placeholder="Enter Featured List" value="{{ $featured }}">
                                            <div class="input-group-btn">
                                                <button class="btn btn-danger  btn-remove" type="button"><i class="fa fa-trash fa-sm text-white-50"></i></button>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Published</label>
                                <div class="form-group">
                                    <label class="ui-checkbox">
                                        <input type="hidden" name="status" value=0><span class="input-span"></span>
                                        <input type="checkbox" name="status" value=1 @if($data['rows']->status){{ "checked" }} @endif ><span class="input-span"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Featured</label>
                                <div class="form-group">
                                    <label class="ui-checkbox">
                                        <input type="hidden" name="featured" value=0><span class="input-span"></span>
                                        <input type="checkbox" name="featured" value=1 @if($data['rows']->featured){{ "checked" }} @endif ><span class="input-span"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group pull-right">
                        <!-- Begin Progress Bar Buttons-->
                        <button class="btn btn-success btn-sm" type="submit" style="cursor:pointer;"> <i class="fa fa-paper-plane"></i> Submit </button>
                        <a href="{{ route($_base_route.'.index')}}" class="btn btn-warning btn-sm "><i class="fa fa-undo"></i> Back</a>
                        <!-- End Progress Bar Buttons-->
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script>
    $(document).ready(function() {
        //summernote
        $(document).ready(function() {
            $('.summernote').summernote({
                tabsize: 2,
                height: 180
            });
        });
        //slider miages
        $(".btn-img").click(function() {
            var html = $(".clone-img").html();
            $(".slider-image-block").append(html);
        });
        $("body").on("click", ".btn-danger", function() {
            $(this).parents(".control-group").remove();
        });
    });
</script>
@endsection
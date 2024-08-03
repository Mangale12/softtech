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

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input class="form-control rounded" type="text" name="title" value="@if(isset($data['rows']->title)) {{ $data['rows']->title   }} @endif" id="title" placeholder="Title">
                            </div>
                            <div class="form-group">
                                <label for="title">Video Url <small>(if applicable)</small></label>
                                <input class="form-control rounded" type="url" name="url" value="{{ old('url', $data['rows']->url) }}" id="url" placeholder="Video Url">
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
                                    <input class=" form-control" type="file" id="blog_thumnail" name="blog_thumnail" accept="image/png, image/gif, image/jpeg">
                                </div>
                            </div>
                            @if($data['rows']->thumbs)
                            <div class="form-group">
                                <img src="{{ asset($data['rows']->thumbs) }}" class="img img-thumbnail img-responsive" width="100px" alt="{{ $data['rows']->title }}" title="{{ $data['rows']->title }}">
                            </div>
                            @else
                            <p>No Image Found</p>
                            @endif


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

@extends('layouts.admin')
@section('title')
Admin {{ $_panel }} Edit | SCMS
@endsection
@section('styles')
<!-- PLUGINS STYLES-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" />
<style>
    .nav-pills {
        justify-content: space-around;
    }

    .help-block {
        color: red;
    }

    .bootstrap-tagsinput {
        width: 100%;
    }

    .label-info {
        background-color: #17a2b8;

    }

    .label {
        display: inline-block;
        padding: .25em .4em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: .25rem;
        transition: color .15s ease-in-out, background-color .15s ease-in-out,
            border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }
</style>

@endsection
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4  text-primary">{{ $_panel }} Edit</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route($_base_route.'.update', $data['rows']->id )}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Edit Destination</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input class="form-control" type="text" name="title" value="{{ old('title', $data['rows']->title) }}" id="title" placeholder="Destination Name">
                                @if($errors->has('title'))
                                <p id="name-error" class="help-block " for="site_email"><span>{{ $errors->first('title') }}</span></p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="image">Thumbnail</label>
                                <input class="form-control" type="file" name="image" value="" id="image"  accept="image/*">
                                @if($data['rows']->image != null)
                                <img src="{{ asset($data['rows']->image) }}" height="100" width="200" alt="Destination Thumbnail">
                                @endif
                                @if($errors->has('image'))
                                <p id="image-error" class="help-block " for="image"><span>{{ $errors->first('image') }}</span></p>
                                @endif

                            </div>
                            <div class="form-group">
                                <label for="image">Description</label>
                                <textarea name="description" id="description" class="form-control">{{ old('description', $data['rows']->description) }}</textarea>
                                @if($errors->has('description'))
                                <p id="description-error" class="help-block " for="description"><span>{{ $errors->first('description') }}</span></p>
                                @endif
                            </div>
                            <div class="col-md-12">
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
                            <div class="form-group ">
                                <!-- Begin Progress Bar Buttons-->
                                <button class="btn btn-success btn-sm" type="submit" style="cursor:pointer;"> <i class="fa fa-paper-plane"></i> Submit </button>
                                <a href="{{ route($_base_route.'.index')}}" class="btn btn-warning btn-sm "><i class="fa fa-undo"></i> Back</a>
                                <!-- End Progress Bar Buttons-->
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('assets/cms/js/scripts/form-plugins.js')}}" type="text/javascript"></script>
<script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js" integrity="sha512-VvWznBcyBJK71YKEKDMpZ0pCVxjNuKwApp4zLF3ul+CiflQi6aIJR+aZCP/qWsoFBA28avL5T5HA+RE+zrGQYg==" crossorigin="anonymous"></script>
<script>
    CKEDITOR.replace('my-editor', options);

    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };

    $(document).ready(function() {
        $(".btn-img").click(function() {
            var html = $(".clone-img").html();
            $(".slider-image-block").append(html);
            // $(".increment").after(html);
        });

        $(".btn-feature").click(function() {
            var html = $(".clone-feature").html();
            $(".featured-block").append(html);
            //   $(".increment-feature").after(html);
        });

        $(".btn-resource").click(function() {
            var html = $(".clone-resource").html();
            $(".resource-info-block").append(html);
        });

        $(".btn-file").click(function() {
            var html = $(".clone-file").html();
            $(".file-block").append(html);
        });

        $("body").on("click", ".btn-danger", function() {
            $(this).parents(".control-group").remove();
        });

        $("body").on("click", ".btn-file-remove", function() {
            $(this).parents(".clone-file").remove();
        });
    });
</script>
@endsection
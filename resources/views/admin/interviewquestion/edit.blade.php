@extends('layouts.admin')
@section('title')
Admin {{ $_panel }} Add | SCMS
@endsection
@section('styles')
<!-- PLUGINS STYLES-->
<link href="{{ asset('assets/cms/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4  text-primary">{{ $_panel }}</h1>
</div>
@include('admin.section.flash_message_error')
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route($_base_route.'.update', $data['rows']->id )}}" method="POST" enctype="multipart/form-data">
            <div class="row">
                @csrf
                <div class="col-md-12">
                    <div class="ibox">
                        <div class="ibox-body">
                            <div class="form-group row">
                                <label for="title" class="col-md-2">Question Types (<em style="color:red">*</em>)</span></label>
                                <select name="category_id" class="form-control category_id select_category col-md-10" id="category_id">
                                    <option value="">Select Category</option>
                                    @foreach($data['category'] as $row)
                                    <option value="{{ $row->id }}" @if($data['rows']->category_id == $row->id) selected @endif >{{ $row->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2" for="title">Question Name(<em style="color:red">*</em>) </label>
                                <input class="form-control rounded col-md-10" type="text" name="title" id="title" value="@if(isset($data['rows']->title)) {{ $data['rows']->title   }} @endif" placeholder="Question Name">
                            </div>
                            <div class="form-group row">
                                <label for="title" class="col-md-2">Question Answer(<em style="color:red">*</em>)</label>
                                <textarea name="description" cols="5" rows="3" class="form-control rounded col-md-10" placeholder="Question Answer" value="">@if(isset($data['rows']->description)) {{ $data['rows']->description   }} @endif</textarea>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2">Published</label>
                                <div class="form-group">
                                    <label class="ui-checkbox">
                                        <input type="hidden" name="status" value=0><span class="input-span"></span>
                                        <input type="checkbox" name="status" value=1 @if($data['rows']->status){{ "checked" }} @endif ><span class="input-span"></span>
                                    </label>
                                </div>
                            </div>
                            <!-- Begin Progress Bar Buttons-->
                            <a href="{{ route($_base_route.'.index')}}" class="btn btn-warning btn-sm"><i class="fa fa-undo"></i> Back</a>
                            <button class="btn btn-success btn-sm" type="submit" style="cursor:pointer;"> <i class="fa fa-paper-plane"></i> Submit </button>
                            <!-- End Progress Bar Buttons-->
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('assets/cms/vendors/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
<script>
    //select 2
    $(".select_category").select2({
        placeholder: "Select",
        allowClear: true
    });
</script>
@endsection
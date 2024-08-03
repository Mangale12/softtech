@extends('layouts.admin')
@section('title')
Admin {{ $_panel }} Edit | SCMS
@endsection
@section('styles')
<!-- PLUGINS STYLES-->
<link href="{{ asset('assets/cms/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
@endsection
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4  text-primary">{{ $_panel }} Edit</h1>
</div>
@include('admin.section.flash_message_error')
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route($_base_route.'.update', $data['rows']->id )}}" method="POST" enctype="multipart/form-data">
            <div class="row">
                @csrf
                <div class="col-md-12">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Add {{ $_panel }}</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <div class="row">
                                <div class="col-sm-4 col-md-4 form-group">
                                    <label>Clients Types</label>
                                    <select name="clients_types" class="form-control category_id select_category" id="category_id">
                                        <option value="">Select Types</option>
                                        <option value="trusted_partner" @if($data['rows']->clients_types == 'trusted_partner') selected @endif>Trusted Partner</option>
                                        <option value="placement_partner" @if($data['rows']->clients_types == 'placement_partner') selected @endif>Placement Partners</option>
                                        <option value="international_association" @if($data['rows']->clients_types == 'international_association') selected @endif>International Association</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="name">Clients Name</label>
                                    <input class="form-control rounded" type="text" name="name" id="name" value="@if(isset($data['rows']->name)) {{ $data['rows']->name   }} @endif" placeholder="Client Name">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="url">Clients Link</label>
                                    <input class="form-control rounded" type="url" name="url" id="url" value="@if(isset($data['rows']->url)) {{ $data['rows']->url   }} @endif" placeholder="Clients Link">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="title">Thumbnail</label>
                                    <input class="form-control rounded" type="file" name="image" id="title" value="" placeholder="Product Url" accept="image/png, image/gif, image/jpeg">
                                </div>

                                <div class="form-group col-md-8">
                                    <label for="title">Remarks</label>
                                    <textarea name="description" id="my-editor" placeholder="Remarks" cols="30" rows="5" class="form-control rounded" value="">@if(isset($data['rows']->description)) {{ $data['rows']->description   }} @endif</textarea>
                                </div>
                                <div class="form-group">
                                    <img src="{{ $data['rows']->image }}" class="img img-thumbnail img-responsive" width="200px" style="max-height: 100px;" alt="">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Published</label>
                                    <div class="form-group">
                                        <label class="ui-checkbox">
                                            <input type="hidden" name="status" value=0><span class="input-span"></span>
                                            <input type="checkbox" name="status" value=1 @if($data['rows']->status){{ "checked" }} @endif ><span class="input-span"></span>
                                        </label>
                                    </div>
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
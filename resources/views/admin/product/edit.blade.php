@extends('layouts.admin')
@section('title', 'उत्पादन सुची')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">उत्पादन सुची</a></li>
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
                    उत्पादन
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="title">नयाँ उत्पादन </label> <br>
                                <select name="udhyog_id" id="udhyog_id" class="form-control select-two">
                                    <option value=>छान्नुहोस्</option>
                                    @if(count($data['category']) != 0)
                                    @foreach($data['category'] as $row)
                                    <option value="{{ $row->id }}" @if($data['rows']->udhyog_id == $row->id) selected @endif>{{ $row->name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="title">नयाँ उत्पादन </label> <br>
                                <input class="form-control rounded" type="text" id="title" value="@if(isset($data['rows']->title)) {{ $data['rows']->title   }} @endif" name="title" placeholder="नयाँ उत्पादन">
                                @if($errors->has('title'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('title') }}</span></p>
                                @endif
                            </div>
                        </div>
                        @include('admin.section.status-create')
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
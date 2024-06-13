@extends('layouts.admin')
@section('title', 'क्षतिको प्रकार')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">क्षतिको प्रकार</a></li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <form action="{{ route($_base_route.'.update', $data['row']->id )}}" method="POST" enctype="multipart/form-data">
            <section class="card">
                <header class="card-header">
                    क्षतिको प्रकार
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="types">क्षतिको प्रकार</label> <br>
                                <input class="form-control rounded" type="text" id="types" value="@if(isset($data['row']->type)) {{ $data['row']->type }} @else {{ old('type') }} @endif" name="type" placeholder="क्षतिको प्रकार">
                                @if($errors->has('type'))
                                <p id="name-error" class="help-block" for="type"><span>{{ $errors->first('type') }}</span></p>
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

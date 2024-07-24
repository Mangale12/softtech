@extends('layouts.admin')
@section('title', 'बिउको जात')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">बिउको जात </a></li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <form action="{{ route($_base_route.'.update', $data['row']->id)}}" method="POST" enctype="multipart/form-data">
            <section class="card">
                <header class="card-header">
                    बिउको जात
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jaat">बिउको जात </label> <br>
                                <input class="form-control rounded" type="text" id="jaat" value="{{ old('jaat', $data['row']->jaat) }}" name="jaat" placeholder="बिउको जात">
                                @if($errors->has('jaat'))
                                <p id="name-error" class="help-block" for="jaat"><span>{{ $errors->first('jaat') }}</span></p>
                                @endif
                            </div>
                        </div>

                       {{-- @include('admin.section.status-create') --}}
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

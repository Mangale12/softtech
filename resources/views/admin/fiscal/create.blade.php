@extends('layouts.admin')
@section('title', 'आर्थिक बर्ष')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">आर्थिक बर्ष</a></li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <form action="{{ route($_base_route.'.store')}}" method="POST" enctype="multipart/form-data">
            <section class="card">
                <header class="card-header">
                आर्थिक बर्ष
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="fiscal_np">आर्थिक बर्ष (नेपाली)</label> <br>
                                <input class="form-control rounded" type="text" id="fiscal_np" value="{{ old('fiscal_np') }}" name="fiscal_np" placeholder="आर्थिक बर्ष (नेपाली)">
                                @if($errors->has('fiscal_np'))
                                <p id="name-error" class="help-block" for="fiscal_np"><span>{{ $errors->first('fiscal_np') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="fiscal_en">आर्थिक बर्ष (अंग्रेजी)</label> <br>
                                <input class="form-control rounded" type="text" id="fiscal_en" value="{{ old('fiscal_en') }}" name="fiscal_en" placeholder="आर्थिक बर्ष (अंग्रेजी)">
                                @if($errors->has('fiscal_en'))
                                <p id="name-error" class="help-block" for="fiscal_en"><span>{{ $errors->first('fiscal_en') }}</span></p>
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
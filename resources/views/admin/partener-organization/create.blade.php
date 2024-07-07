@extends('layouts.admin')
@section('title', 'संस्थाकाे')
@section('css')
<!--Form Wizard-->
<link href="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/css/nepali.datepicker.v3.7.min.css')}}" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script src="https://cdn.ckeditor.com/ckeditor5/35.0.0/classic/ckeditor.js"></script>

@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-weight: bold;">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">संस्था </a></li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route($_base_route.'.store')}}" method="POST" enctype="multipart/form-data">
            <section class="card">
                <header class="card-header" style="font-weight: bold;">
                    संस्था
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="title" style="font-weight: bold;">संस्थाकाे नाम</label> <br>
                                <input class="form-control rounded" type="text" id="name" value="{{ old('name') }}" name="name" placeholder="संस्थाकाे नाम">
                                @if($errors->has('name'))
                                <p id="title-error" class="help-block" for="name"><span>{{ $errors->first('name') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="address" style="font-weight: bold;">संस्थाको ठेगाना</label> <br>
                                <input class="form-control rounded" type="text" id="address"  value="{{ old('address') }}" name="address" placeholder="संस्थाको ठेगाना">
                                @if($errors->has('address'))
                                <p id="address-error" class="help-block" for="address"><span>{{ $errors->first('address') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="email" style="font-weight: bold;">संस्थाको इमेल</label> <br>
                                <input class="form-control rounded" type="email" id="email" value="{{ old('email') }}" name="email" placeholder="संस्थाको इमेल">
                                @if($errors->has('email'))
                                <p id="email-error" class="help-block" for="email"><span>{{ $errors->first('email') }}</span></p>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="phone" style="font-weight: bold;">संगठनको फोन</label> <br>
                                <input class="form-control rounded" type="text" id="phone" value="{{ old('phone') }}" name="phone" placeholder="संगठनको फोन">
                                @if($errors->has('phone'))
                                <p id="location-error" class="help-block" for="location"><span>{{ $errors->first('phone') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="price" style="font-weight: bold;">विवरण</label> <br>
                                <textarea name="description" id="description" class="form-control rounded" rows="6"></textarea>
                                @if($errors->has('description'))
                                <p id="price-error" class="help-block" for="description"><span>{{ $errors->first('description') }}</span></p>
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
@section('js')
<script>
    ClassicEditor
        .create(document.querySelector('#description'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection

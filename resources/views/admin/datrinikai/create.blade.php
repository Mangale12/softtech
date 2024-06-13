@extends('layouts.admin')
@section('title', 'दात्रिनिकाय सहयोग')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">दात्रिनिकाय सहयोग</a></li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route($_base_route.'.store')}}" method="POST" enctype="multipart/form-data">
            <section class="card">
                <header class="card-header">
                    दात्रिनिकाय सहयोग
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name">नाम</label> <br>
                                <input class="form-control rounded" type="text" id="name" value="{{ old('name') }}" name="name" placeholder="नाम">
                                @if($errors->has('name'))
                                <p id="name-error" class="help-block" for="name"><span>{{ $errors->first('name') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="address	">ठेगाना</label> <br>
                                <input class="form-control rounded" type="text" id="address	" value="{{ old('address') }}" name="address" placeholder="ठेगाना">
                                @if($errors->has('address'))
                                <p id="name-error" class="help-block" for="address"><span>{{ $errors->first('address') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="phone">फोन</label> <br>
                                <input class="form-control rounded" type="text" id="phone" value="{{ old('phone') }}" name="phone" placeholder="फोन">
                                @if($errors->has('phone'))
                                <p id="name-error" class="help-block" for="phone"><span>{{ $errors->first('phone') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="amounts">रकम (रु.)</label> <br>
                                <input class="form-control rounded" type="text" id="amounts" value="{{ old('amounts') }}" name="amounts" placeholder="रु.">
                                @if($errors->has('amounts'))
                                <p id="name-error" class="help-block" for="amounts"><span>{{ $errors->first('amounts') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="help">सहयोग</label> <br>
                                <input class="form-control rounded" type="text" id="help" value="{{ old('help') }}" name="help" placeholder="सहयोग">
                                @if($errors->has('help'))
                                <p id="name-error" class="help-block" for="help"><span>{{ $errors->first('help') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="product">सहयोग बस्तु</label> <br>
                                <input class="form-control rounded" type="text" id="product" value="{{ old('product') }}" name="product" placeholder="सहयोग बस्तु">
                                @if($errors->has('product'))
                                <p id="name-error" class="help-block" for="product"><span>{{ $errors->first('product') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="quantity">संख्या</label> <br>
                                <input class="form-control rounded" type="text" id="quantity" value="{{ old('quantity') }}" name="quantity" placeholder="संख्या">
                                @if($errors->has('quantity'))
                                <p id="name-error" class="help-block" for="quantity"><span>{{ $errors->first('quantity') }}</span></p>
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
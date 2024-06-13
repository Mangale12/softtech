@extends('layouts.admin')
@section('title', 'सम्पति बिबरण')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">सम्पति बिबरण</a></li>
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
                    जमिन बिबरण
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="title">जमिन किसिम</label> <br>
                                <select name="worker_list" id="worker_list" class="form-control worker_list">
                                    <option value=>छान्नुहोस्</option>
                                    @if(isset($data['land_category']))
                                    @foreach($data['land_category'] as $row)
                                    <option value="{{ $row->id }}">{{ $row->title }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @if($errors->has('title'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('title') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="title">क्षेत्रफल्</label> <br>
                                <input class="form-control rounded" type="text" id="title" value="{{ old('title') }}" name="title" placeholder="क्षेत्रफल्">
                                @if($errors->has('title'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('title') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="title">रकम</label> <br>
                                <input class="form-control rounded" type="text" id="title" value="{{ old('title') }}" name="title" placeholder="रकम">
                                @if($errors->has('title'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('title') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="title">टिप्पणी</label> <br>
                                <input class="form-control rounded" type="text" id="title" value="{{ old('title') }}" name="title" placeholder="टिप्पणी">
                                @if($errors->has('title'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('title') }}</span></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="card">
                <header class="card-header">
                    गोदाम बिबरण
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="title">गोदाम किसिम</label> <br>
                                <select name="land_type" id="land_type" class="form-control worker_list">
                                    <option value=>छान्नुहोस्</option>
                                    @if(isset($data['store_categort']))
                                    @foreach($data['store_categort'] as $row)
                                    <option value="{{ $row->id }}">{{ $row->title }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @if($errors->has('title'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('title') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="title">रकम</label> <br>
                                <input class="form-control rounded" type="text" id="title" value="{{ old('title') }}" name="title" placeholder="रकम">
                                @if($errors->has('title'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('title') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">टिप्पणी</label> <br>
                                <input class="form-control rounded" type="text" id="title" value="{{ old('title') }}" name="title" placeholder="टिप्पणी">
                                @if($errors->has('title'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('title') }}</span></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="card">
                <header class="card-header">
                    औजार/उपकरण बिबरण
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="title">औजार/उपकरण किसिम</label> <br>
                                <select name="land_type" id="land_type" class="form-control worker_list">
                                    <option value=>छान्नुहोस्</option>
                                    @if(isset($data['equipment_category']))
                                    @foreach($data['equipment_category'] as $row)
                                    <option value="{{ $row->id }}">{{ $row->title }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @if($errors->has('title'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('title') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="title">रकम</label> <br>
                                <input class="form-control rounded" type="text" id="title" value="{{ old('title') }}" name="title" placeholder="रकम">
                                @if($errors->has('title'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('title') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">टिप्पणी</label> <br>
                                <input class="form-control rounded" type="text" id="title" value="{{ old('title') }}" name="title" placeholder="टिप्पणी">
                                @if($errors->has('title'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('title') }}</span></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="card">
                <header class="card-header">
                    सिचाई किसिम बिबरण
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="title">सिचाई किसिम किसिम</label> <br>
                                <select name="land_type" id="land_type" class="form-control worker_list">
                                    <option value=>छान्नुहोस्</option>
                                    @if(isset($data['irrigation_category']))
                                    @foreach($data['irrigation_category'] as $row)
                                    <option value="{{ $row->id }}">{{ $row->title }}</option>
                                    @endforeach
                                    @endif
                                </select> @if($errors->has('title'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('title') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="title">रकम</label> <br>
                                <input class="form-control rounded" type="text" id="title" value="{{ old('title') }}" name="title" placeholder="रकम">
                                @if($errors->has('title'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('title') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">टिप्पणी</label> <br>
                                <input class="form-control rounded" type="text" id="title" value="{{ old('title') }}" name="title" placeholder="टिप्पणी">
                                @if($errors->has('title'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('title') }}</span></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="card">
                <header class="card-header">
                    अन्य बिबरण
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="title">इन्धन किसिम</label> <br>
                                <select name="land_type" id="land_type" class="form-control worker_list">
                                    <option value=>छान्नुहोस्</option>
                                    @if(isset($data['feul_category']))
                                    @foreach($data['feul_category'] as $row)
                                    <option value="{{ $row->id }}">{{ $row->title }}</option>
                                    @endforeach
                                    @endif
                                </select>                                
                                @if($errors->has('title'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('title') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="title">पाहुना घर किसिम</label> <br>
                                <input class="form-control rounded" type="text" id="title" value="{{ old('title') }}" name="title" placeholder="पोखरी किसिम">
                                @if($errors->has('title'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('title') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="title">रकम</label> <br>
                                <input class="form-control rounded" type="text" id="title" value="{{ old('title') }}" name="title" placeholder="रकम">
                                @if($errors->has('title'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('title') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="title">पोखरी किसिम</label> <br>
                                <input class="form-control rounded" type="text" id="title" value="{{ old('title') }}" name="title" placeholder="पोखरी किसिम">
                                @if($errors->has('title'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('title') }}</span></p>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">टिप्पणी</label> <br>
                                <input class="form-control rounded" type="text" id="title" value="{{ old('title') }}" name="title" placeholder="टिप्पणी">
                                @if($errors->has('title'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('title') }}</span></p>
                                @endif
                            </div>
                        </div>
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
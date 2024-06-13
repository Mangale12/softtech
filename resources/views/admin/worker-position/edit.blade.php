@extends('layouts.admin')
@section('title', 'कामदार पद')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">कामदार पद</a></li>
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
                    कामदार प्रकार
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="position">कामदार प्रकार</label> <br>
                                <!-- select ontion worker types -->
                                <select name="worker_id" class="form-control">
                                    <option value="">कामदार प्रकार छान्नुहोस्</option>
                                    @foreach($data['worker-type'] as $row)
                                    <option value="{{$row->id}}" @if($data['rows']->worker_id == $row->id) selected @endif>{{$row->types}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('position'))
                                <p id="name-error" class="help-block" for="position"><span>{{ $errors->first('position') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="salary">पद</label> <br>
                                <input class="form-control rounded" type="text" id="position" value="@if(isset($data['rows']->position)) {{ $data['rows']->position }} @else {{ old('position') }} @endif" name="position" placeholder="पद">
                                @if($errors->has('position'))
                                <p id="name-error" class="help-block" for="position"><span>{{ $errors->first('position') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="salary">तलब</label> <br>
                                <input class="form-control rounded" type="text" id="salary" value="@if(isset($data['rows']->salary)) {{ $data['rows']->salary }} @else {{ old('salary') }} @endif" name="salary" placeholder="तलब">
                                @if($errors->has('salary'))
                                <p id="name-error" class="help-block" for="salary"><span>{{ $errors->first('salary') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="position">भत्ता </label> <br>
                                <input class="form-control rounded" type="text" id="bhatta" value="@if(isset($data['rows']->bhatta)) {{ $data['rows']->bhatta }} @else {{ old('bhatta') }} @endif" name="bhatta" placeholder="भत्ता">
                                @if($errors->has('bhatta'))
                                <p id="name-error" class="help-block" for="bhatta"><span>{{ $errors->first('bhatta') }}</span></p>
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
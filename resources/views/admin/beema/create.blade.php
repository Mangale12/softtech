@extends('layouts.admin')
@section('title', 'बिमा')
@section('css')
<!--Form Wizard-->
<link href="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/css/nepali.datepicker.v3.7.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">बिमा </a></li>
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
                    बिमा
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="beema_id">बिमा प्रकार </label> <br>
                                <select name="beema_id" id="beema_id" class="form-control select-two">
                                    <option value=>छान्नुहोस्</option>
                                    @if(count($data['category']) != 0)
                                    @foreach($data['category'] as $row)
                                    <option value="{{ $row->id }}">{{ $row->title }}</option>
                                    @endforeach
                                    @endif
                                </select> @if($errors->has('beema_id'))
                                <p id="name-error" class="help-block" for="beema_id"><span>{{ $errors->first('beema_id') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="title">बिमा नाम</label> <br>
                                <input class="form-control rounded" type="text" id="title" value="{{ old('title') }}" name="title" placeholder="बिमा नाम">
                                @if($errors->has('title'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('title') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="anudaan">अनुदान प्रतिशत</label> <br>
                                <input class="form-control rounded" type="text" id="anudaan" value="{{ old('anudaan') }}" name="anudaan" placeholder="अनुदान">
                                @if($errors->has('anudaan'))
                                <p id="name-error" class="help-block" for="anudaan"><span>{{ $errors->first('anudaan') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="duration">बिमा अबधि</label> <br>
                                <input class="form-control rounded" type="text" id="duration" value="{{ old('duration') }}" name="duration" placeholder="बिमा अबधि">
                                @if($errors->has('duration'))
                                <p id="name-error" class="help-block" for="duration"><span>{{ $errors->first('duration') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="total_cost">बिमा शुल्क</label> <br>
                                <input class="form-control rounded" type="text" id="total_cost" value="{{ old('total_cost') }}" name="total_cost" placeholder="बिमा शुल्क">
                                @if($errors->has('total_cost'))
                                <p id="name-error" class="help-block" for="total_cost"><span>{{ $errors->first('total_cost') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="area">छेत्रफल</label> <br>
                                <input class="form-control rounded" type="text" id="area" value="{{ old('area') }}" name="area" placeholder="छेत्रफल">
                                @if($errors->has('area'))
                                <p id="name-error" class="help-block" for="area"><span>{{ $errors->first('area') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="start_date">देखि मिति</label> <br>
                                <input class="form-control rounded nep_date" readonly type="text" id="start_date" value="{{ old('start_date') }}" name="start_date" placeholder="देखि मिति">
                                @if($errors->has('start_date'))
                                <p id="name-error" class="help-block" for="start_date"><span>{{ $errors->first('start_date') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="end_date">सम्म मिति</label> <br>
                                <input class="form-control rounded nep_date" readonly type="text" id="end_date" value="{{ old('end_date') }}" name="end_date" placeholder="सम्म मिति">
                                @if($errors->has('end_date'))
                                <p id="name-error" class="help-block" for="end_date"><span>{{ $errors->first('end_date') }}</span></p>
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
<script src="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/js/nepali.datepicker.v3.7.min.js')}}" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        /***************************NepaliDate picker *********************/
        $(".nep_date").nepaliDatePicker({
            ndpYear: true,
            ndpMonth: true,
            ndpYearCount: 1000,
            // unicodeDate: true,
        })
    });
</script>
@endsection
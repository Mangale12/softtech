@extends('layouts.admin')
@section('title', 'कामदार सूची')
@section('css')
<!--Form Wizard-->
<link href="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/css/nepali.datepicker.v3.7.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-weight: bold;">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">कामदार सूची</a></li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route($_base_route.'.store')}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" value="{{ !empty($udhyog) ? $udhyog->id : null}}" name="udhyog_id">
            <section class="card">
                <header class="card-header" style="font-weight: bold;">
                    कामदार सूची
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="full_name" style="font-weight: bold;">पुरा नाम</label> <br>
                                <input class="form-control rounded" type="text" id="full_name" value="{{ old('full_name') }}" name="full_name" placeholder="पुरा नाम">
                                @if($errors->has('full_name'))
                                <p id="name-error" class="help-block" for="full_name"><span>{{ $errors->first('full_name') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="mobile" style="font-weight: bold;">मोबाइल</label> <br>
                                <input class="form-control rounded" type="text" id="mobile" value="{{ old('mobile') }}" name="mobile" placeholder="मोबाइल">
                                @if($errors->has('mobile'))
                                <p id="name-error" class="help-block" for="mobile"><span>{{ $errors->first('mobile') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="gender" style="font-weight: bold;">लिंग</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value=>छान्नुहोस्</option>
                                    <option value="1" @if (old('gender')=='1' ) selected="selected" @endif>पुरुष</option>
                                    <option value="2" @if (old('gender')=='2' ) selected="selected" @endif>महिला</option>
                                    <option value="3" @if (old('gender')=='3' ) selected="selected" @endif>अन्य</option>
                                </select>
                                @if($errors->has('gender'))
                                <p id="name-error" class="help-block " for="gender"><span>{{ $errors->first('gender') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="address" style="font-weight: bold;">ठेगाना</label> <br>
                                <input class="form-control rounded" type="text" id="address" value="{{ old('address') }}" name="address" placeholder="ठेगाना">
                                @if($errors->has('address'))
                                <p id="name-error" class="help-block" for="mobile"><span>{{ $errors->first('address') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="day_of_joining" style="font-weight: bold;">चालु मिति</label> <br>
                                <input class="form-control rounded" type="text" id="start_date" readonly value="{{ old('day_of_joining') }}" name="day_of_joining" placeholder="चालु मिति">
                                @if($errors->has('day_of_joining'))
                                <p id="name-error" class="help-block" for="mobile"><span>{{ $errors->first('day_of_joining') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="worker_position_id" style="font-weight: bold;">पद</label>
                                <select name="worker_position_id" id="worker_position_id" class="form-control">
                                    <option value=>छान्नुहोस्</option>
                                    @if(isset($data['rows']))
                                    @foreach($data['rows'] as $row)
                                    <option value="{{$row->id}}" @if (old('worker_position_id')==$row->id ) selected="selected" @endif>{{$row->position}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @if($errors->has('worker_position_id'))
                                <p id="name-error" class="help-block " for="worker_position_id"><span>{{ $errors->first('worker_position_id') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="work_type_id" style="font-weight: bold;">कामको प्रकार</label>
                                <select name="work_type_id" id="work_type_id" class="form-control">
                                    <option selected disabled>कामको प्रकार छान्नुहोस्</option>
                                    @if(isset($data['work_type']))
                                    @foreach($data['work_type'] as $row)
                                    <option value="{{$row->id}}" @if (old('work_type_id')==$row->id ) selected="selected" @endif>{{$row->types}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @if($errors->has('worker_position_id'))
                                <p id="name-error" class="help-block " for="worker_position_id"><span>{{ $errors->first('worker_position_id') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="salary" style="font-weight: bold;">तलब</label> <br>
                                <input class="form-control rounded" type="text" id="salary" value="{{ old('salary') }}" name="salary" placeholder="तलब">
                                @if($errors->has('salary'))
                                <p id="name-error" class="help-block" for="mobile"><span>{{ $errors->first('salary') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="bhatta" style="font-weight: bold;">भत्ता</label> <br>
                                <input class="form-control rounded" type="text" id="bhatta" value="{{ old('bhatta') }}" name="bhatta" placeholder="भत्ता">
                                @if($errors->has('bhatta'))
                                <p id="name-error" class="help-block" for="bhatta"><span>{{ $errors->first('bhatta') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="image" style="font-weight: bold;">फोटा</label> <br>
                                <input class="form-control rounded" type="file" id="salary" value="{{ old('image') }}" name="image" placeholder="तलब" maxlength="10">
                                @if($errors->has('image'))
                                <p id="name-error" class="help-block" for="mobile"><span>{{ $errors->first('image') }}</span></p>
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
@section('js')
<script src="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/js/nepali.datepicker.v3.7.min.js')}}" type="text/javascript"></script>
<script>
    $("#start_date").nepaliDatePicker({
        ndpYear: true,
        ndpMonth: true,
        ndpYearCount: 1000,
        // disableBefore:
        // unicodeDate: true,
    });
</script>

@endsection

@extends('layouts.admin')
@section('title', 'कामदार पद')
@section('content')
{{-- @php
    dd($data);
@endphp --}}
<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-weight: bold;">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">कामदार पद</a></li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route($_base_route.'.update', $data['rows']->id )}}" method="POST" enctype="multipart/form-data">
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
                                <input class="form-control rounded" type="text" id="full_name" value="{{ old('full_name',$data['rows']['full_name']) }}" name="full_name" placeholder="पुरा नाम">
                                @if($errors->has('full_name'))
                                <p id="name-error" class="help-block" for="full_name"><span>{{ $errors->first('full_name') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="mobile" style="font-weight: bold;">मोबाइल</label> <br>
                                <input class="form-control rounded" type="text" id="mobile" value="{{ old('mobile',$data['rows']['mobile']) }}" name="mobile" placeholder="मोबाइल" maxlength="10">
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
                                    <option value="1" @if (old('gender',$data['rows']['gender'])=='1' ) selected="selected" @endif>पुरुष</option>
                                    <option value="2" @if (old('gender',$data['rows']['gender'])=='2' ) selected="selected" @endif>महिला</option>
                                    <option value="3" @if (old('gender',$data['rows']['gender'])=='3' ) selected="selected" @endif>अन्य</option>
                                </select>
                                @if($errors->has('gender'))
                                <p id="name-error" class="help-block " for="gender"><span>{{ $errors->first('gender') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="address" style="font-weight: bold;">ठेगाना</label> <br>
                                <input class="form-control rounded" type="text" id="address" value="{{ old('address',$data['rows']['address']) }}" name="address" placeholder="ठेगाना">
                                @if($errors->has('address'))
                                <p id="name-error" class="help-block" for="mobile"><span>{{ $errors->first('address') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="day_of_joining" style="font-weight: bold;">चालु मिति</label> <br>
                                <input class="form-control rounded" type="text" id="start_date" readonly value="{{ old('day_of_joining',$data['rows']['day_of_joining']) }}" name="day_of_joining" placeholder="चालु मिति">
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
                                    @if(isset($data['worker-position']))
                                    @foreach($data['worker-position'] as $row)
                                    <option value="{{$row->id}}" @if (old('worker_position_id',$data['rows']['worker_position_id'])==$row->id ) selected="selected" @endif>{{$row->position}}</option>
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
                                <input class="form-control rounded" type="text" id="salary" value="{{ old('salary',$data['rows']['salary']) }}" name="salary" placeholder="तलब">
                                @if($errors->has('salary'))
                                <p id="name-error" class="help-block" for="mobile"><span>{{ $errors->first('salary') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="bhatta" style="font-weight: bold;">भत्ता</label> <br>
                                <input class="form-control rounded" type="text" id="bhatta" value="{{ old('bhatta',$data['rows']['bhatta']) }}" name="bhatta" placeholder="भत्ता">
                                @if($errors->has('bhatta'))
                                <p id="name-error" class="help-block" for="bhatta"><span>{{ $errors->first('bhatta') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="image" style="font-weight: bold;">फोटा</label> <br>
                                <input class="form-control rounded" type="file" id="salary" value="{{ old('image') }}" name="image" placeholder="तलब">
                                @if($errors->has('image'))
                                <p id="name-error" class="help-block" for="mobile"><span>{{ $errors->first('image') }}</span></p>
                                @endif
                            </div>
                            @if($data['rows']['image'])
                                <img src="{{ asset($data['rows']['image']) }}" alt="worker image" width="200" height="150">
                            @endif
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

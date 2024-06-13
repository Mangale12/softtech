@extends('layouts.admin')
@section('title', 'भौतिक संरचना')
@section('css')
<!--Form Wizard-->
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">भौतिक संरचना</a></li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route($_base_route.'.update', $data['rows']->id )}}" method="POST" enctype="multipart/form-data">
            <section class="card">
                <header class="card-header">
                    भौतिक संरचना बिबरण
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="types">संरचना प्रकार</label> <br>
                                <input class="form-control rounded" type="text" id="types" value="@if(isset($data['rows']->types)) {{ $data['rows']->types }} @else {{ old('types') }} @endif" name="types" placeholder=" संरचना प्रकार">
                                @if($errors->has('types'))
                                <p id="name-error" class="help-block" for="types"><span>{{ $errors->first('types') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="bottom">तल्ल</label> <br>
                                <input class="form-control rounded" type="text" id="bottom" value="@if(isset($data['rows']->bottom)) {{ $data['rows']->bottom }} @else {{ old('bottom') }} @endif" name="bottom" placeholder="तल्ल">
                                @if($errors->has('bottom'))
                                <p id="name-error" class="help-block" for="bottom"><span>{{ $errors->first('bottom') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="length">लम्बाई</label> <br>
                                <input class="form-control rounded" type="text" id="length" value="@if(isset($data['rows']->length)) {{ $data['rows']->length }} @else {{ old('length') }} @endif" name="length" placeholder="लम्बाई">
                                @if($errors->has('length'))
                                <p id="name-error" class="help-block" for="length"><span>{{ $errors->first('length') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="width">चौडाई</label> <br>
                                <input class="form-control rounded" type="text" id="width" value="@if(isset($data['rows']->width)) {{ $data['rows']->width }} @else {{ old('width') }} @endif" name="width" placeholder="चौडाई">
                                @if($errors->has('width'))
                                <p id="name-error" class="help-block" for="width"><span>{{ $errors->first('width') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="area">क्षेत्रफल्</label> <br>
                                <input class="form-control rounded" type="text" id="area" value="@if(isset($data['rows']->area)) {{ $data['rows']->area }} @else {{ old('area') }} @endif" name="area" placeholder="क्षेत्रफल्">
                                @if($errors->has('area'))
                                <p id="name-error" class="help-block" for="area"><span>{{ $errors->first('area') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="made_date">बनेको मिति</label> <br>
                                <input class="form-control rounded" type="text" id="made_date" value="@if(isset($data['rows']->made_date)) {{ $data['rows']->made_date }} @else {{ old('made_date') }} @endif" name="made_date" placeholder="बनेको मिति">
                                @if($errors->has('made_date'))
                                <p id="name-error" class="help-block" for="made_date"><span>{{ $errors->first('made_date') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="type_of_makeup">संरचना बनोट किसिम(बनोट र छाना खुलाउने)</label> <br>
                                <input class="form-control rounded" type="text" id="type_of_makeup" value="@if(isset($data['rows']->type_of_makeup)) {{ $data['rows']->type_of_makeup }} @else {{ old('type_of_makeup') }} @endif" name="type_of_makeup" placeholder="संरचना बनोट">
                                @if($errors->has('type_of_makeup'))
                                <p id="name-error" class="help-block" for="type_of_makeup"><span>{{ $errors->first('type_of_makeup') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="use_of">संरचना को प्रयोग (ब्यार औ र स र घ)</label> <br>
                                <input class="form-control rounded" type="text" id="use_of" value="@if(isset($data['rows']->use_of)) {{ $data['rows']->use_of }} @else {{ old('use_of') }} @endif" name="use_of" placeholder="संरचना को प्रयोग">
                                @if($errors->has('use_of'))
                                <p id="name-error" class="help-block" for="use_of"><span>{{ $errors->first('use_of') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user">प्रयोगकर्ता (स्वयम् र भाडा)</label> <br>
                                <input class="form-control rounded" type="text" id="user" value="@if(isset($data['rows']->user)) {{ $data['rows']->user }} @else {{ old('user') }} @endif" name="user" placeholder="प्रयोगकर्ता">
                                @if($errors->has('user'))
                                <p id="name-error" class="help-block" for="user"><span>{{ $errors->first('user') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="remarks">कैफियत (घर नं आदि खुलाउने)</label> <br>
                                <textarea name="remarks" class="form-control" placeholder="कैफियत" id="" cols="30" rows="3">{{ $data['rows']->remarks }}</textarea>
                                @if($errors->has('remarks'))
                                <p id="name-error" class="help-block" for="remarks"><span>{{ $errors->first('remarks') }}</span></p>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="status">स्थिति</label>
                                <div class="form-group">
                                    <label class="ui-checkbox">
                                        <input type="hidden" name="status" value=0><span class="input-span"></span>
                                        <input type="checkbox" name="status" value=1 @if($data['rows']->status){{ "checked" }} @endif ><span class="input-span"></span>
                                    </label>
                                </div>
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
<script>
    //nabalak
    $(function() {
        $("#optional").click(function() {
            if ($(this).is(":checked")) {
                $(".test").show();
            } else {
                $(".test").hide();
            }
        });
    });
</script>
@endsection
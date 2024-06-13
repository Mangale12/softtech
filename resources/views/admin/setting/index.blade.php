@extends('layouts.admin')
@section('title', 'मुख्य सेत्तिंग')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">मुख्य सेत्तिंग</a></li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                मुख्य सेत्तिंग
            </header>
            <div class="card-body">
                <form action="{{ route('admin.setting.update',  $data['setting']->id )}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>प्रोजेक्ट नाम</label> <br>
                                <input class="form-control rounded" type="text" id="site_name" value="@if(isset($data['setting']->site_name)) {{ $data['setting']->site_name }} @else {{ old('site_name') }} @endif" name="site_name" placeholder="Name">
                                @if($errors->has('site_name'))
                                <p id="name-error" class="help-block" for="site_name"><span>{{ $errors->first('site_name') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>इमेल</label>
                                <input class="form-control rounded" type="email" value="@if(isset($data['setting']->site_email)) {{ $data['setting']->site_email }} @else {{ old('site_email') }} @endif" id="site_email" name="site_email" placeholder="Email">
                                @if($errors->has('site_email'))
                                <p id="name-error" class="help-block " for="site_email"><span>{{ $errors->first('site_email') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>फोन नं</label>
                                <input class="form-control rounded" type="text" value="@if(isset($data['setting']->site_phone)) {{ $data['setting']->site_phone }} @else {{ old('site_phone') }} @endif" id="site_phone" name="site_phone" placeholder="Telephone">
                                @if($errors->has('site_phone'))
                                <p id="name-error" class="help-block " for="site_phone"><span>{{ $errors->first('site_phone') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>मोबाइल नं</label>
                                <input class="form-control rounded" type="text" value="@if(isset($data['setting']->site_mobile)) {{ $data['setting']->site_mobile }} @else {{ old('site_mobile') }} @endif" id="site_mobile" name="site_mobile" placeholder="Mobile ">
                                @if($errors->has('site_mobile'))
                                <p id="name-error" class="help-block " for="mobile"><span>{{ $errors->first('site_mobile') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>फ्याक्स नं</label>
                                <input class="form-control rounded" type="text" value="@if(isset($data['setting']->site_fax)) {{ $data['setting']->site_fax }} @else {{ old('site_fax') }} @endif" id="site_fax" name="site_fax" placeholder="Fax">
                                @if($errors->has('site_fax'))
                                <p id="name-error" class="help-block " for="mobile"><span>{{ $errors->first('site_fax') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>ठेगाना</label>
                                <input class="form-control rounded" type="text" value="@if(isset($data['setting']->site_first_address)) {{ $data['setting']->site_first_address }} @else {{ old('site_first_address') }} @endif" id="site_first_address" name="site_first_address" placeholder="Address">
                                @if($errors->has('site_first_address'))
                                <p id="name-error" class="help-block " for="mobile"><span>{{ $errors->first('site_first_address') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>ठेगाना २</label>
                                <input class="form-control rounded" type="text" value="@if(isset($data['setting']->site_second_address)) {{ $data['setting']->site_second_address }} @else {{ old('site_second_address') }} @endif" id="site_second_address" name="site_second_address" placeholder="Address 2">
                                @if($errors->has('site_second_address'))
                                <p id="name-error" class="help-block " for="mobile"><span>{{ $errors->first('site_second_address') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>वेबसाइट</label>
                                <input class="form-control rounded" type="url" value="@if(isset($data['setting']->site_url)) {{ $data['setting']->site_url }} @else {{ old('site_url') }} @endif" id="site_url" name="site_url" placeholder="Link">
                                @if($errors->has('site_url'))
                                <p id="name-error" class="help-block " for="mobile"><span>{{ $errors->first('site_url') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>बारेमा </label>
                                <textarea name="site_description" cols="30" rows="4" placeholder="Description" class="form-control rounded" value="">@if(isset($data['setting']->site_description)) {{ $data['setting']->site_description }} @else {{ old('site_description') }} @endif</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>नक्सा </label>
                                <textarea name="map" cols="30" rows="4" class="form-control rounded" placeholder="Map" value="">@if(isset($data['setting']->map)) {{ $data['setting']->map }} @else {{ old('map') }} @endif</textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <input class="form-control rounded" type="file" name="logo" id="logo" value="" accept="image/png, image/gif, image/jpeg">
                            </div>
                        </div>

                        <div class="col-md-3">
                            @if($data['setting']->logo)
                            <div class="form-group">
                                <label for=""></label><br>
                                <img src="{{ asset($data['setting']->logo) }}" class="img  img-responsive" width="200px" alt="">
                            </div>
                            @endif
                        </div>
                        <div class="col-md-3">
                            <div class="form-group rounded">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group rounded">
                            </div>
                        </div>
                    </div>
                    <!-- Begin Progress Bar Buttons-->                    
                    <div class="form-group pull-right">
                    <a href="{{ route($_base_route.'.index')}}" class="btn btn-danger btn-sm "><i class="fa fa-undo"></i> पछाडि फर्कनुहोस्</a>
                    <button class="btn btn-success btn-sm " type="submit" style="cursor: pointer;"><i class="fa fa-save"></i>  सुरक्षित गर्नुहोस् </button>
                    </div>
                    <!-- End Progress Bar Buttons-->
                </form>
            </div>
        </section>
    </div>
</div>
@endsection
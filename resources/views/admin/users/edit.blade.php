@extends('layouts.admin')
@section('content')
@php
    $legal_documents = [];
    $company = [];
    $social = [];
    if (!empty($user->member)) {
        $legal_documents = json_decode($user->member->legal_documents, true);
        $company = json_decode($user->member->company, true);
        $social = json_decode($user->member->social, true);
    }
@endphp

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 text-primary">Edit User</h1>
        <a href="{{ route('admin.users.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fa fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route($_base_route.'.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <!-- User Information -->
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Edit User Information</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                            <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                        </div>
                    </div>
                    <div class="ibox-body row">
                        <div class="form-group col-md-3">
                            <label for="name">Name</label>
                            <input class="form-control rounded" type="text" name="name" id="name" value="{{ old('name', $user->name) }}" placeholder="Full Name">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="email">Email</label>
                            <input class="form-control rounded" type="email" name="email" id="email" value="{{ old('email', $user->email) }}" placeholder="Email">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="mobile">Phone</label>
                            <input class="form-control rounded" type="text" name="mobile" id="mobile" value="{{ old('mobile', $user->mobile) }}" placeholder="Mobile">
                        </div>

                        <div class="form-group col-md-3 col-12 col-lg-3">
                            <label for="mobile">Member Post</label>
                            <input class="form-control rounded" type="text" name="member_post" id="member_post" value="{{ old('member_post', isset($user->member) ? $user->member->member_post : '') }}" placeholder="Member Post">
                            @if($errors->has('member_post'))
                            <p id="member_post-error" class="help-block " for="member_post"><span>{{ $errors->first('member_post') }}</span></p>
                            @endif
                        </div>

                        <div class="form-group col-md-4 col-12 col-lg-3">
                            <label for="company_name">Member Type</label>
                            <select class="form-control rounded" name="member_type_id" id="member_type">
                                <option selected disabled>Select Member Type</option>
                                @foreach($member_types as $key => $value)
                                    <option value="{{ $value->id }}" {{ old('member_type', isset($user->member) ? $user->member->member_type_id : '') == $value->id ? 'selected' : '' }}>{{$value->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4 col-12 col-lg-3">
                            <label for="avatar">Profile</label>
                            <input class="form-control rounded" type="file" name="avatar" id="avatar" value="{{ old('avatar') }}" placeholder="Profile" accept="image/*">
                            @if($errors->has('avatar'))
                            <p id="avatar-error" class="help-block " for="avatar"><span>{{ $errors->first('avatar') }}</span></p>
                            @endif
                            @if($user->avatar != null)
                            <img src="{{ asset($user->avatar) }}" alt="{{ $user->name }}" height="50" width="50">
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Company Details -->
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Add Company Details</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                            <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                        </div>
                    </div>
                    <div class="ibox-body row">
                        <div class="form-group col-md-3">
                            <label for="company_name">Company Name</label>
                            <input class="form-control rounded" type="text" name="company_name" id="company_name" value="{{ old('company_name', !empty($company['company_name']) ? $company['company_name'] : '') }}" placeholder="Company Name">
                        </div>
                        <div class="form-group col-md-3 col-12 col-lg-3">
                            <label for="company_name">Founded year</label>
                            <input class="form-control rounded" type="text" name="company_founded_year" id="company_founded_year" value="{{ old('company_founded_year', !empty($company['company_founded_year']) ? $company['company_founded_year'] : '') }}" placeholder="Company founded year" >
                        </div>
                        <div class="form-group col-md-3 col-12 col-lg-3">
                            <label for="company_name">Company Website</label>
                            <input class="form-control rounded" type="url" name="company_website" id="company_website" value="{{ old('company_website', !empty($company['company_website']) ? $company['company_website'] : '') }}" placeholder="Company Wesite" >
                        </div>
                        <div class="form-group col-md-3 col-12 col-lg-3">
                            <label for="company_name">Company Logo</label>
                            <input class="form-control rounded" type="file" name="company_logo" id="company_logo" value="{{ old('company_logo') }}" placeholder="Company Logo" accept="image/*">
                            @if(!empty($company['company_logo']))
                                {{-- @if($company['company_logo'] == null || $company['company_logo'] == '') --}}
                                <img src="{{ asset($company['company_logo']) }}" alt="Company Logo" height="50" width="50">
                                {{-- @endif --}}
                            @endif

                        </div>
                        <div class="form-group col-md-3">
                            <label for="company_name">Pan No</label>
                            <input class="form-control rounded" type="text" name="pan_no" id="pan-no" value="{{ old('pan_no', !empty($legal_documents['pan']['pan_no']) ? $legal_documents['pan']['pan_no'] : '') }}" placeholder="Company Name">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="pan">Upload PAN</label>
                            <input class="form-control rounded" type="file" name="pan" id="pan">
                            {{-- @dd($legal_documents); --}}
                            @if(!empty($legal_documents['pan']['image']))
                                <img src="{{ asset($legal_documents['pan']['image']) }}" alt="PAN" class="img-thumbnail mt-2" height="50" width="50">
                            @endif
                        </div>
                        <div class="form-group col-md-3">
                            <label for="company_name">Registration No</label>
                            <input class="form-control rounded" type="text" name="register_no" id="register_no" value="{{ old('register_no', !empty($legal_documents['company']['register_no']) ? $legal_documents['company']['register_no'] : '') }}" placeholder="Registrtaion No">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="register_file">Upload Company Register File</label>
                            <input class="form-control rounded" type="file" name="register_file" id="register-file">
                            @if(!empty($legal_documents['company']['register_file']))
                                <img src="{{ asset($legal_documents['company']['register_file']) }}" alt="Register File" class="img-thumbnail mt-2" height="50" width="50">
                            @endif
                        </div>

                        <div class="form-group col-md-3">
                            <label for="tax_clearance">Tax Clearance Certificate</label>
                            <input class="form-control rounded" type="file" name="tax_clearance" id="tax-clearance">
                            @if(!empty($legal_documents['tax_clearance']))
                                <img src="{{ asset($legal_documents['tax_clearance']) }}" alt="Tax Clearance" class="img-thumbnail mt-2" width="50" height="50">
                            @endif
                        </div>

                        <div class="form-group col-md-3">
                            <label>Is Approved</label>
                            <div class="custom-control custom-switch">
                                <label class="ui-checkbox">
                                    <input type="hidden" name="status" value="0">
                                    <input type="checkbox" name="status" value="1"><span class="input-span"></span>
                                </label>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Social Link</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                            <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                        </div>
                    </div>
                    <div class="ibox-body row">
                        <div class="form-group col-md-3 col-12 col-lg-3">
                            <label for="facebook">Facebook</label>
                            <input class="form-control rounded" type="url" name="facebook" id="facebook" value="{{ old('facebook', !empty($social['facebook']) ? $social['facebook'] : '') }}" placeholder="Company Faceook link">
                        </div>
                        <div class="form-group col-md-3 col-12 col-lg-3">
                            <label for="instagram">Instagram</label>
                            <input class="form-control rounded" type="url" name="instagram" id="instagram" value="{{ old('instagram', !empty($social['instagram']) ? $social['instagram'] : '') }}" placeholder="Company instagram link" >
                        </div>
                        <div class="form-group col-md-3 col-12 col-lg-3">
                            <label for="twiter">Twiter</label>
                            <input class="form-control rounded" type="url" name="twiter" id="twiter" value="{{ old('twiter', !empty($social['twiter']) ? $social['twiter'] : '') }}" placeholder="Company Twiter link" >
                        </div>

                        <div class="form-group col-md-3 col-12 col-lg-3">
                            <label for="youtube">Youtube</label>
                            <input class="form-control rounded" type="url" name="youtube" id="youtube" value="{{ old('youtube', !empty($social['youtube']) ? $social['youtube'] : '') }}" placeholder="Company Youtube link" >
                        </div>

                        <div class="form-group col-md-3 col-12 col-lg-3">
                            <label for="youtube">Linked In</label>
                            <input class="form-control rounded" type="url" name="linked_id" id="linked_id" value="{{ old('linked_id', !empty($social['linked_id']) ? $social['linked_id'] : '') }}" placeholder="Company Linkedin link" >
                        </div>
                    </div>

                </div>

            </div>

            <div class="form-group col-md-12 text-right">
                <a href="{{ route($_base_route.'.index') }}" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                <button class="btn btn-success btn-sm" type="submit"><i class="fa fa-save"></i> Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection

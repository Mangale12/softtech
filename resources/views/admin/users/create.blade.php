@extends('layouts.admin')
@section('title')
Admin {{ $_panel }} Add | SCMS
@endsection

@section('styles')
<!-- PLUGINS STYLES -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" />
@endsection

@section('content')
@include('admin.section.flash_message_error')

<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="fa fa-home"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route($_base_route.'.index') }}">{{ $_panel }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route($_base_route.'.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- User Information -->
                <div class="col-md-12">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Add {{ $_panel }}</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body row">
                            <div class="form-group col-md-2 col-12 col-lg-3">
                                <label for="name">Name</label>
                                <input class="form-control rounded" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Full Name">
                                @if($errors->has('name'))
                                <p id="name-error" class="help-block " for="name"><span>{{ $errors->first('name') }}</span></p>
                                @endif
                            </div>

                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="email">Email</label>
                                <input class="form-control rounded" type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email">
                            </div>
                            @if($errors->has('email'))
                            <p id="name-error" class="help-block " for="email"><span>{{ $errors->first('email') }}</span></p>
                            @endif
                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="mobile">Phone</label>
                                <input class="form-control rounded" type="number" name="mobile" id="mobile" value="{{ old('mobile') }}" placeholder="Mobile">
                                @if($errors->has('mobile'))
                                <p id="name-error" class="help-block " for="mobile"><span>{{ $errors->first('mobile') }}</span></p>
                                @endif
                            </div>
                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="mobile">Member Post</label>
                                <input class="form-control rounded" type="text" name="member_post" id="member_post" value="{{ old('member_post') }}" placeholder="Member Post">
                                @if($errors->has('member_post'))
                                <p id="member_post-error" class="help-block " for="member_post"><span>{{ $errors->first('member_post') }}</span></p>
                                @endif
                            </div>


                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="password">Password</label>
                                <input class="form-control rounded" type="password" name="password" id="password" value="{{ old('password') }}" placeholder="Password">
                                @if($errors->has('password'))
                                <p id="name-error" class="help-block " for="password"><span>{{ $errors->first('password') }}</span></p>
                                @endif
                            </div>
                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="company_name">Member Type</label>
                                <select class="form-control rounded" name="member_type_id" id="member_type">
                                    <option selected disabled>Select Member Type</option>
                                    @foreach($member_types as $key => $value)
                                        <option value="{{ $value->id }}" {{ old('member_type') == $value->id ? 'selected' : '' }}>{{$value->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="avatar">Profile</label>
                                <input class="form-control rounded" type="file" name="avatar" id="avatar" value="{{ old('avatar') }}" placeholder="Profile" accept="image/*">
                                @if($errors->has('avatar'))
                                <p id="avatar-error" class="help-block " for="avatar"><span>{{ $errors->first('avatar') }}</span></p>
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
                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="company_name">Company Name</label>
                                <input class="form-control rounded" type="text" name="company_name" id="company_name" value="{{ old('company_name') }}" placeholder="Company Name">
                            </div>
                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="company_name">Founded year</label>
                                <input class="form-control rounded" type="text" name="company_founded_year" id="company_founded_year" value="{{ old('company_founded_year') }}" placeholder="Company founded year" >
                            </div>
                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="company_name">Company Website</label>
                                <input class="form-control rounded" type="url" name="company_website" id="company_website" value="{{ old('company_website') }}" placeholder="Company Wesite" >
                            </div>

                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="company_name">Company Logo</label>
                                <input class="form-control rounded" type="file" name="company_logo" id="company_logo" value="{{ old('company_logo') }}" placeholder="Company Logo" accept="image/*">
                            </div>

                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="pan">PAN No.</label>
                                <input class="form-control rounded" type="text" name="pan_no" value="{{ old('pan_no') }}" id="pan-no" placeholder="Please Enter Pan no.">
                                @if($errors->has('pan_no'))
                                <p id="name-error" class="help-block " for="pan_no"><span>{{ $errors->first('pan_no') }}</span></p>
                                @endif
                            </div>
                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="pan">Upload PAN</label>
                                <input class="form-control rounded" type="file" name="pan" id="pan" placeholder="Upload PAN" accept="image/*">
                            </div>

                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="register_file">Company Register No.</label>
                                <input class="form-control rounded" type="text" name="register_no" id="register_no" placeholder="Register No.">
                            </div>

                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="register_file">Upload Company Register File</label>
                                <input class="form-control rounded" type="file" name="register_file" id="register_file" placeholder="Register File" accept="image/*">
                            </div>

                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="tax_clearance">Tax Clearance Certificate</label>
                                <input class="form-control rounded" type="file" name="tax_clearance" id="tax_clearance" placeholder="Tax Clearance File" accept="image/*">
                            </div>

                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label>Is Approved</label>
                                <div class="form-group">
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
                                <input class="form-control rounded" type="url" name="facebook" id="facebook" value="{{ old('facebook') }}" placeholder="Company Faceook link">
                            </div>
                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="instagram">Instagram</label>
                                <input class="form-control rounded" type="url" name="instagram" id="instagram" value="{{ old('instagram') }}" placeholder="Company instagram link" >
                            </div>
                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="twiter">Twiter</label>
                                <input class="form-control rounded" type="url" name="twiter" id="twiter" value="{{ old('twiter') }}" placeholder="Company Twiter link" >
                            </div>

                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="youtube">Youtube</label>
                                <input class="form-control rounded" type="url" name="youtube" id="youtube" value="{{ old('youtube') }}" placeholder="Company Youtube link" >
                            </div>
                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="youtube">Linked In</label>
                                <input class="form-control rounded" type="url" name="linked_id" id="linked_id" value="{{ old('linked_id') }}" placeholder="Company Linkedin link" >
                            </div>
                        </div>

                    </div>
                    <div class="form-group text-right">
                        <a href="{{ route($_base_route.'.index') }}" class="btn btn-warning btn-sm"><i class="fa fa-undo"></i> Back</a>
                        <button class="btn btn-success btn-sm" type="submit" style="cursor:pointer;"><i class="fa fa-paper-plane"></i> Submit</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/cms/js/scripts/form-plugins.js') }}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js" integrity="sha512-VvWznBcyBJK71YKEKDMpZ0pCVxjNuKwApp4zLF3ul+CiflQi6aIJR+aZCP/qWsoFBA28avL5T5HA+RE+zrGQYg==" crossorigin="anonymous"></script>

@endsection

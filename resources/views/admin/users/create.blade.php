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
                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="name">Name</label>
                                <input class="form-control rounded" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Full Name">
                            </div>

                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="email">Email</label>
                                <input class="form-control rounded" type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email">
                            </div>

                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="mobile">Phone</label>
                                <input class="form-control rounded" type="number" name="mobile" id="mobile" value="{{ old('mobile') }}" placeholder="Mobile">
                            </div>

                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="password">Password</label>
                                <input class="form-control rounded" type="password" name="password" id="password" value="{{ old('password') }}" placeholder="Password">
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
                                <label for="company_name">Member Type</label>
                                <select class="form-control rounded" name="member_type" id="member_type">
                                    <option value="">Select Member Type</option>
                                    @foreach($member_types as $key => $value)
                                        <option value="{{$key}}" {{ old('member_type') == $key?'selected' : '' }}>{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="pan">PAN No.</label>
                                <input class="form-control rounded" type="text" name="pan_no" id="pan-no" placeholder="Please Enter Pan no.">
                            </div>
                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="pan">Upload PAN</label>
                                <input class="form-control rounded" type="file" name="pan" id="pan" placeholder="Upload PAN">
                            </div>

                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="register_file">Company Register No.</label>
                                <input class="form-control rounded" type="text" name="register_no" id="register_no" placeholder="Register No.">
                            </div>

                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="register_file">Upload Company Register File</label>
                                <input class="form-control rounded" type="file" name="register_file" id="register_file" placeholder="Register File">
                            </div>

                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="tax_clearance">Tax Clearance Certificate</label>
                                <input class="form-control rounded" type="file" name="tax_clearance" id="tax_clearance" placeholder="Tax Clearance File">
                            </div>

                            {{-- <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="tax_clearance">Payment Voucher</label>
                                <input class="form-control rounded" type="file" name="payment_voucher" id="payment_voucher" placeholder="Payment Voucher">
                            </div> --}}

                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label>Is Approved</label>
                                <div class="form-group">
                                    <label class="ui-checkbox">
                                        <input type="hidden" name="status" value="0">
                                        <input type="checkbox" name="status" value="1"><span class="input-span"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group text-right">
                                <a href="{{ route($_base_route.'.index') }}" class="btn btn-warning btn-sm"><i class="fa fa-undo"></i> Back</a>
                                <button class="btn btn-success btn-sm" type="submit" style="cursor:pointer;"><i class="fa fa-paper-plane"></i> Submit</button>
                            </div>
                        </div>
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

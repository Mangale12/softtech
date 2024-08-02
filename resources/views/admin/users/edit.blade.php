@extends('layouts.admin')
@section('content')
@php
    $legal_documents = [];
    $company = [];
    if (!empty($user->member)) {
        $legal_documents = json_decode($user->member->legal_documents, true);
        $company = json_decode($user->member->company, true);
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
                        <div class="form-group col-md-4">
                            <label for="name">Name</label>
                            <input class="form-control rounded" type="text" name="name" id="name" value="{{ old('name', $user->name) }}" placeholder="Full Name">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="email">Email</label>
                            <input class="form-control rounded" type="email" name="email" id="email" value="{{ old('email', $user->email) }}" placeholder="Email">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="mobile">Phone</label>
                            <input class="form-control rounded" type="text" name="mobile" id="mobile" value="{{ old('mobile', $user->mobile) }}" placeholder="Mobile">
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
                        <div class="form-group col-md-4">
                            <label for="company_name">Company Name</label>
                            <input class="form-control rounded" type="text" name="company_name" id="company_name" value="{{ old('company_name', $company['company_name'] ?? '') }}" placeholder="Company Name">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="company_name">Pan No</label>
                            <input class="form-control rounded" type="text" name="pan_no" id="pan-no" value="{{ old('pan_no', !empty($legal_documents['pan']['pan_no']) ?? '') }}" placeholder="Company Name">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="pan">Upload PAN</label>
                            <input class="form-control rounded" type="file" name="pan" id="pan">
                            @if(!empty($legal_documents['pan']['image']))
                                <img src="{{ asset($legal_documents['pan']['image']) }}" alt="PAN" class="img-thumbnail mt-2" width="150">
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="company_name">Registration No</label>
                            <input class="form-control rounded" type="text" name="register_no" id="register_no" value="{{ old('register_no', !empty($legal_documents['company']['register_no']) ?? '') }}" placeholder="Registrtaion No">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="register_file">Upload Company Register File</label>
                            <input class="form-control rounded" type="file" name="register_file" id="register-file">
                            @if(!empty($legal_documents['company']['register_file']))
                                <img src="{{ asset($legal_documents['company']['register_file']) }}" alt="Register File" class="img-thumbnail mt-2" width="150">
                            @endif
                        </div>

                        <div class="form-group col-md-4">
                            <label for="tax_clearance">Tax Clearance Certificate</label>
                            <input class="form-control rounded" type="file" name="tax_clearance" id="tax-clearance">
                            @if(!empty($legal_documents['tax_clearance']))
                                <img src="{{ asset($legal_documents['tax_clearance']) }}" alt="Tax Clearance" class="img-thumbnail mt-2" width="150">
                            @endif
                        </div>

                        <div class="form-group col-md-4">
                            <label>Is Approved</label>
                            <div class="custom-control custom-switch">
                                <label class="ui-checkbox">
                                    <input type="hidden" name="status" value="0">
                                    <input type="checkbox" name="status" value="1"><span class="input-span"></span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group col-md-12 text-right">
                            <a href="{{ route($_base_route.'.index') }}" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                            <button class="btn btn-success btn-sm" type="submit"><i class="fa fa-save"></i> Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

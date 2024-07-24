@extends('layouts.admin')
@section('title', 'सप्लायर्स')
@section('content')
@php
// Extract the udhyog name from the current URL
preg_match('/admin\/udhyog\/([^\/]*)/', request()->path(), $matches);
$udhyogName = $matches[1] ?? '';
// dd($data['udhyog']);
@endphp
<div class="row">
    <div class="col-lg-8">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">सप्लायर्स</a></li>
                <li class="breadcrumb-item"><a href="#">सप्लायर्स</a></li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-10">
        {{-- {{ dd($_base_route) }} --}}
        <form action="{{ route($_base_route.'.store')}}" method="POST" enctype="multipart/form-data">
            <section class="card">
                <header class="card-header">
                    सप्लायर्स
                </header>
                <div class="card-body">
                    @csrf
                    <input type="hidden" name="udhyog" value="{{ $udhyog->name }}">
                    <div class="row">
                        <table class="table table-bordered" id="dynamicTable">
                            <tr>
                                <th>पुरा नाम <span class="text-danger">*</span> </th>
                                <th>फोन <span class="text-danger">*</span></th>
                                <th>इमेल <span class="text-danger">*</span></th>
                                <th>ठेगाना <span class="text-danger">*</span></th>
                            </tr>
                            <tr>
                                <td style="width:30rem">
                                    <input type="text" value="{{ old('name') }}" name="name" placeholder="पुरा नाम" class="form-control" />
                                    @if($errors->has('name'))
                                    <p id="name-error" class="help-block" for="worker_id"><span>{{ $errors->first('name') }}</span></p>
                                    @endif
                                </td>


                                <td style="width:20rem">
                                    <input type="text" value="{{ old('phone') }}" name="phone" placeholder="फोन" class="form-control" />
                                    @if($errors->has('phone'))
                                    <p id="name-error" class="help-block" for="worker_id"><span>{{ $errors->first('phone') }}</span></p>
                                    @endif
                                </td>

                                <td style="width:20rem">
                                    <input type="email" value="{{ old('email') }}" name="email" placeholder="इमेल" class="form-control" />
                                    @if($errors->has('email'))
                                    <p id="name-error" class="help-block" for="worker_id"><span>{{ $errors->first('email') }}</span></p>
                                @endif
                                </td>

                                <td style="width:20rem">
                                    <input type="text" name="address" value="{{ old('address') }}" placeholder="ठेकाना" class="form-control" />
                                    @if($errors->has('address'))
                                    <p id="name-error" class="help-block" for="worker_id"><span>{{ $errors->first('address') }}</span></p>
                                    @endif
                                </td>

                            </tr>


                        </table >
                        <br>
                        <table class="table table-bordered">
                            <tr>
                                <th>सम्पर्क गर्ने व्यक्तिको नाम</th>
                                <th>सम्पर्क गर्ने व्यक्तिको फोन</th>
                            </tr>
                            <tr>
                                <td style="width:20rem">
                                    <input type="text" value="{{ old('contactor_name') }}" name="contactor_name" placeholder="सम्पर्ककर्ताको नाम" class="form-control" />
                                </td>
                                <td style="width:20rem"><input type="text" value="{{ old('contactor_phone') }}" name="contactor_phone" placeholder="सम्पर्ककर्ताको फोन" class="form-control" /></td>

                            </tr>
                        </table>
                    </div>
                </div>
            </section>
            <!-- Begin Progress Bar Buttons-->
            <div class="form-group pull-right">
                <a href="{{ route('admin.udhyog.'.$udhyogName.'.inventory.suppliers.index')}}? udhyog={{ request()->udhyog }}" class="btn btn-danger btn-sm "><i class="fa fa-undo"></i> पछाडि फर्कनुहोस्</a>
                <button class="btn btn-success btn-sm " type="submit" style="cursor: pointer;"><i class="fa fa-save"></i> सुरक्षित गर्नुहोस् </button>
            </div>
            <!-- End Progress Bar Buttons-->
        </form>
    </div>
</div>
@endsection
@section('js')

@endsection

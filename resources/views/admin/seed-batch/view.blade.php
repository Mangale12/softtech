@extends('layouts.admin')
@section('title', 'बीज ब्याच रिपोर्ट')
@section('css')
<!--Form Wizard-->
<link href="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/css/nepali.datepicker.v3.7.min.css')}}" rel="stylesheet" />
<link href="{{ asset('assets/cms/assets/summernote/summernote-bs4.css')}}" rel="stylesheet">
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">बीज ब्याच रिपोर्ट</a></li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        {{-- <form action="{{ route($_base_route.'.update', $data['rows']->id )}}" method="POST" enctype="multipart/form-data"> --}}
            <section class="card">
                <header class="card-header">
                    बीज ब्याच रिपोर्ट
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-2 col-lg-2 col-6">
                            <div class="form-group">
                                <label for="title">ब्याच नं</label> <br>
                                <p>{{ $data['rows']->id }}</p>
                            </div>
                        </div>

                        <div class="col-md-2 col-lg-2 col-6">
                            <div class="form-group">
                                <label for="duration">बिउको नाम </label> <br>
                                <p>{{ $data['rows']->seed->seed_name }}</p>
                            </div>
                        </div>
                        <div class="col-md-2 col-lg-2 col-6">
                            <div class="form-group">
                                <label for="total_cost">उत्पादन भएको मात्रा</label> <br>
                                <p>{{ $data['rows']->quantity_produced }}</p>
                            </div>
                        </div>
                        <div class="col-md-2 col-lg-2 col-6">
                            <div class="form-group">
                                <label for="total_cost">एकाइ</label> <br>
                                <p>{{ $data['rows']->unit->name }}</p>
                            </div>
                        </div>
                        <div class="col-md-2 col-lg-2 col-6">
                            <div class="form-group">
                                <label for="start_date">निर्माण मिति</label> <br>
                                <p>{{ $data['rows']->manufacturing_date }}</p>
                            </div>
                        </div>
                        <div class="col-md-2 col-lg-2 col-6">
                            <div class="form-group">
                                <label for="end_date">म्याद सकिने मिति</label> <br>
                                <p>{{ $data['rows']->expiry_date }}</p>
                            </div>
                        </div>
                        {{-- <div class="col-md-2 col-lg-2 col-6">
                            <div class="form-group">
                                <label for="end_date">स्थिति</label> <br>
                                <input type="checkbox" class="form-control" readonly>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </section>

            <section class="card">
                <header class="card-header">
                    बिउको विवरण
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <table class="table table-striped table-hover table-bordered mynewsofttable">
                            <thead>
                                <tr>
                                    <th>बिउको नाम </th>
                                    <th>प्रयोग गरिएको मात्रा</th>
                                    <th>एकाइ</th>
                                    <th>प्रति एकाइ मूल्य</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($data['rows']->seedBatchProduct as $seedBatch)
                                <tr class="soft-multyfield ">
                                    <td class="col-md-2 form-group ">{{ $seedBatch->seed->seed_name }}</td>
                                    <td class="col-md-2 form-group  has-error ">
                                        {{ $seedBatch->quantity }}
                                    </td>
                                    <td class="col-md-2 form-group ">
                                        {{ $seedBatch->seed->unitName->name }}
                                    </td>
                                    <td class="col-md-2 form-group">
                                        {{ $seedBatch->seed->cost }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <section class="card">
                <header class="card-header">
                    मलको विवरण
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <table class="table table-striped table-hover table-bordered mynewsofttable">
                            <thead>
                                <tr>
                                    <th>मलको नाम </th>
                                    <th>एकाइ</th>
                                    <th>प्रति एकाइ मूल्य (रु)</th>
                                    <th>प्रयोग गरिएको मात्रा</th>
                                    <th>जम्मा मूल्य (रु) </th>

                                </tr>
                            </thead>
                            <tbody>
                                {{-- {{ dd($data['mal_bibaran']) }} --}}
                               @foreach($data['mal_bibaran'] as $mal_bibaran)
                                {{-- <tr class="soft-multyfield ">
                                    <td class="col-md-2 form-group ">{{ $mal_bibaran }}</td>
                                    <td class="col-md-2 form-group  has-error ">
                                        {{ $mal_bibaran[0] }}
                                    </td>
                                    <td class="col-md-2 form-group ">
                                        {{ $mal_bibaran[0] }}
                                    </td>
                                    <td class="col-md-2 form-group">
                                        {{ $mal_bibaran[0] }}
                                    </td>
                                    <td class="col-md-2 form-group">
                                        {{ $mal_bibaran[0] }}
                                    </td>
                                </tr> --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>


            <section class="card">
                <header class="card-header">
                    बिउको विवरण
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <table class="table table-striped table-hover table-bordered mynewsofttable">
                            <thead>
                                <tr>
                                    <th>बिउको नाम </th>
                                    <th>प्रयोग गरिएको मात्रा</th>
                                    <th>एकाइ</th>
                                    <th>प्रति एकाइ मूल्य</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($data['rows']->seedBatchProduct as $seedBatch)
                                <tr class="soft-multyfield ">
                                    <td class="col-md-2 form-group ">{{ $seedBatch->seed->seed_name }}</td>
                                    <td class="col-md-2 form-group  has-error ">
                                        {{ $seedBatch->quantity }}
                                    </td>
                                    <td class="col-md-2 form-group ">
                                        {{ $seedBatch->seed->unitName->name }}
                                    </td>
                                    <td class="col-md-2 form-group">
                                        {{ $seedBatch->seed->cost }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
            <!-- Begin Progress Bar Buttons-->
            <div class="form-group pull-right">
                <a href="{{ route($_base_route.'.index')}}" class="btn btn-danger btn-sm "><i class="fa fa-undo"></i> पछाडि फर्कनुहोस्</a>
                {{-- <button class="btn btn-success btn-sm " type="submit" style="cursor: pointer;"><i class="fa fa-save"></i> सुरक्षित गर्नुहोस् </button> --}}
            </div>
            <!-- End Progress Bar Buttons-->
        {{-- </form> --}}
    </div>
</div>
@endsection

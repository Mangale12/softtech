@extends('layouts.admin')
@section('title', 'तालिम')
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
                <li class="breadcrumb-item"><a href="#">तालिम</a></li>
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
                    तालिम
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-2 col-lg-2 col-6">
                            <div class="form-group">
                                <label for="title">पुरा नाम</label> <br>
                                <p>{{ $data['rows']->name }}</p>
                            </div>
                        </div>

                        <div class="col-md-2 col-lg-2 col-6">
                            <div class="form-group">
                                <label for="duration">फोन</label> <br>
                                <p>{{ $data['rows']->phone }}</p>
                            </div>
                        </div>
                        <div class="col-md-2 col-lg-2 col-6">
                            <div class="form-group">
                                <label for="total_cost">इमेल</label> <br>
                                <p>{{ $data['rows']->email }}</p>
                            </div>
                        </div>

                        <div class="col-md-2 col-lg-2 col-6">
                            <div class="form-group">
                                <label for="start_date">ठेगाना</label> <br>
                                <p>{{ $data['rows']->address }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="card">
                <header class="card-header">
                    तालिमको विवरण
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <table class="table table-striped table-hover table-bordered mynewsofttable">
                            <thead>
                                <tr>
                                    <th>तालिमको शीर्षक </th>
                                    <th>तालिमको अवधि</th>
                                    <th>कुल लागत</th>
                                    <th>सुरू मिति</th>
                                    <th>अन्त्य मिति</th>
                                    <th>स्थिति</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($data['rows']->trainings as $training)
                                <tr class="soft-multyfield ">
                                    <td class="col-md-2 form-group ">{{ $training->title }}</td>
                                    <td class="col-md-2 form-group  has-error ">{{ $training->duration }}</td>
                                    <td class="col-md-2 form-group ">{{ $training->total_cost }}</td>
                                    <td class="col-md-2 form-group">{{ $training->start_date }}</td>
                                    <td class="col-md-2 form-group">{{ $training->end_date }}</td>
                                    <td class="col-md-2 form-group">{{ $training->status }}</td>
                                    <td>
                                        @foreach($training->phases as $phase)
                                            {{ $phase->name }}<br>
                                        @endforeach
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

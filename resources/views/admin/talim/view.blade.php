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
                                <label for="title">तालिम शीर्षक</label> <br>
                                <p>{{ $data['rows']->title }}</p>
                            </div>
                        </div>

                        <div class="col-md-2 col-lg-2 col-6">
                            <div class="form-group">
                                <label for="duration">तालिम अबधि</label> <br>
                                <p>{{ $data['rows']->duration }}</p>
                            </div>
                        </div>
                        <div class="col-md-2 col-lg-2 col-6">
                            <div class="form-group">
                                <label for="total_cost">तालिम शुल्क</label> <br>
                                <p>{{ $data['rows']->total_cost }}</p>
                            </div>
                        </div>

                        <div class="col-md-2 col-lg-2 col-6">
                            <div class="form-group">
                                <label for="start_date">देखि मिति</label> <br>
                                <p>{{ $data['rows']->start_date }}</p>
                            </div>
                        </div>
                        <div class="col-md-2 col-lg-2 col-6">
                            <div class="form-group">
                                <label for="end_date">सम्म मिति</label> <br>
                                <p>{{ $data['rows']->end_date }}</p>
                            </div>
                        </div>
                        <div class="col-md-2 col-lg-2 col-6">
                            <div class="form-group">
                                <label for="end_date">स्थिति</label> <br>
                                <input type="checkbox" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="card">
                <header class="card-header">
                    प्रशिक्षकको विवरण
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <table class="table table-striped table-hover table-bordered mynewsofttable">
                            <thead>
                                <tr>
                                    <th>प्रशिक्षकको नाम </th>
                                    <th>पद</th>
                                    <th>विषय</th>
                                    <th>संपर्क नम्बर</th>
                                    <th>इमेल</th>
                                    <th>संस्थाको नाम</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $featuredArray = json_decode($data['rows']->trainer); ?>
                                @if($featuredArray)
                               @foreach($featuredArray as $resource)
                                <tr class="soft-multyfield ">
                                    <td class="col-md-2 form-group ">{{ $resource[0] }}</td>
                                    <td class="col-md-2 form-group  has-error ">
                                        {{ $resource[1] }}
                                    </td>
                                    <td class="col-md-2 form-group ">
                                        {{ $resource[2] }}
                                    </td>
                                    <td class="col-md-2 form-group">
                                        {{ $resource[3] }}
                                    </td>
                                    <td class="col-md-2 form-group">
                                        {{ $resource[4] }}
                                    </td>
                                    <td class="col-md-2 form-group">
                                        {{ $resource[5] }}
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <section class="card">
                <header class="card-header">
                    प्रशिक्षण चरणको विवरण
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <table class="table table-striped table-hover table-bordered mynewsofttable">
                            <thead>
                                <tr>
                                    <th>चरणको नाम </th>
                                    <th>चरणको विवरण</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($data['rows']->phases as $phase)
                                <tr class="soft-multyfield ">
                                    <td class="col-md-2 form-group ">{{ $phase->name }}</td>
                                    <td class="col-md-2 form-group  has-error ">{{ $phase->description }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>


            <section class="card">
                <header class="card-header">
                    प्रशिक्षणको विवरण
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <table class="table table-striped table-hover table-bordered mynewsofttable">
                            <thead>
                                <tr>
                                    <th>प्रशिक्षणको नाम </th>
                                    <th>संपर्क नम्बर</th>
                                    <th>इमेल</th>
                                    <th>ठेगाना</th>
                                    <th>चरण</th>
                                    <th>कार्य</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($data['rows']->persons as $person)
                                <tr class="soft-multyfield ">
                                    <td class="col-md-2 form-group ">{{ $person->name }}</td>
                                    <td class="col-md-2 form-group  has-error ">{{ $person->phone }}</td>
                                    <td class="col-md-2 form-group ">{{ $person->email }}</td>
                                    <td class="col-md-2 form-group">{{ $person->address }}</td>
                                    @if(count($person->phases))
                                    @foreach ($person->phases as $phase)
                                    <td class="col-md-2 form-group">{{ $phase->name }}</td>
                                    @endforeach
                                    @else
                                    <td class="col-md-2 form-group">not define</td>
                                    @endif

                                    <td class="col-md-2 form-group">
                                        <button id="delete" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete" style="cursor:pointer;"><i class="fa fa-trash-o "></i></button>
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

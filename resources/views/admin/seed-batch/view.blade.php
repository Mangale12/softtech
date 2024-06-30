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
                                <p>{{ $data['rows']->seed_id != null ? $data['rows']->product->name : '' }}</p>
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
                                <p>{{ $data['rows']->unit_id}}</p>
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
                        <table class="table table-striped table-hover table-bordered mynewsofttable view-seed-report">
                            <thead>
                                <tr>
                                    <th>बिउको नाम </th>
                                    <th>बिउको प्रकार </th>
                                    <th>एकाइ</th>
                                    <th>प्रति एकाइ मूल्य</th>
                                    <th>प्रयोग गरिएको मात्रा</th>
                                    <th>जम्मा मूल्य </th>
                                    <th>कार्य</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($data['rows']->seedBatchProduct as $seedBatch)
                                <tr class="soft-multyfield ">
                                    <td class="col-md-2 form-group ">{{ $seedBatch->seed->seed_name }}</td>
                                    <td class="col-md-2 form-group ">
                                        {{ $seedBatch->seed_type_id != null ? $seedBatch->seedType->name : ''   }}
                                    </td>
                                    <td class="col-md-2 form-group  has-error ">
                                        {{ $seedBatch->unit_id != null ? $seedBatch->unit->name : '' }}
                                    </td>
                                    <td class="col-md-2 form-group  has-error ">
                                        {{ $seedBatch->unit_price }}
                                    </td>
                                    <td class="col-md-2 form-group  has-error ">
                                        {{ $seedBatch->quantity }}
                                    </td>
                                    <td class="col-md-2 form-group">
                                        {{ $seedBatch->total_cost }}
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-delete" onclick="DeleteRow(this)">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </td>
                                </tr>

                                @endforeach

                                <tr>
                                    <form action="{{ route('admin.udhyog.hybridbiu.inventory.seed_batch.add_seed') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $data['rows']->id }}" name="seed_batch_id">
                                        <td>
                                            <select class="form-control acctype" name="seed_id">
                                                <option selected disabled>बीउको नाम छान्नुहोस्</option>
                                                @foreach ($data['seeds'] as $index => $value)
                                                    <option value="{{ $value->id }}" >
                                                        {{ $value['seed_name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control acctype" name="seed_type">
                                                <option selected disabled>बीउको प्रकार छान्नुहोस्</option>
                                                @foreach ($data['seed_type'] as $index => $value)
                                                    <option value="{{ $value->id }}" >
                                                        {{ $value['name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control acctype" name="unit_id">
                                                <option selected disabled>एकाई छान्नुहोस्</option>
                                                @foreach ($data['units'] as $index => $value)
                                                    <option value="{{ $value->id }}">
                                                        {{ $value['name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" name="unit_price" class="form-control unit-price">
                                        </td>
                                        <td>
                                            <input type="text" name="quantity" class="form-control seed-quantity" >
                                        </td>
                                        <td>
                                            <input type="text" name="total_cost" class="form-control total-cost" >
                                        </td>
                                        <td>
                                            <button type="submit"><img src="{{ asset('sumit.png') }}" alt="" style="width: 60px; height:20px"></button>
                                        </td>
                                    </form>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td align="right" class="font-weight-bold" colspan="5">बीउको लागि कुल लागत</td>
                                    <td class="font-weight-bold">{{ $data['total_biu_cost'] != null ? $data['total_biu_cost']['total_cost_sum'] : 0 }}</td>
                                </tr>
                            </tfoot>
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
                    <div class="row ">
                        <table class="table table-striped table-hover table-bordered mynewsofttable mal-bibaran">
                            <thead>
                                <tr>
                                    <th>मलको नाम </th>
                                    <th>एकाइ</th>
                                    <th>प्रति एकाइ मूल्य (रु)</th>
                                    <th>प्रयोग गरिएको मात्रा</th>
                                    <th>जम्मा मूल्य (रु) </th>
                                    <th>टिप्पणीहरू</th>
                                    <th>कार्य</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- {{ dd($data['mal_bibaran']) }} --}}
                               @foreach($data['rows']->seedBatchMal as $mal)
                                <tr class="soft-multyfield ">
                                    <td class="col-md-2 form-group ">{{ $mal->mal_id != null ? $mal->mal->title : ''}}</td>
                                    <td class="col-md-2 form-group  has-error ">
                                        {{ $mal->unit_id != null ? $mal->unit->name : ''}}
                                    </td>
                                    <td class="col-md-2 form-group ">
                                        {{ $mal->unit_price }}
                                    </td>
                                    <td class="col-md-2 form-group">
                                        {{ $mal->quantity }}
                                    </td>
                                    <td class="col-md-2 form-group">
                                        {{ $mal->total_cost }}
                                    </td>
                                    <td class="col-md-2 form-group">
                                        {{ $mal->deatils }}
                                    </td>
                                    <td class="col-md-2 form-group">
                                        <button type="button" class="btn btn-danger btn-delete" onclick="DeleteRow(this)">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach

                                <tr class="newtrans prod-multyfield">
                                    <form action="{{ route('admin.udhyog.hybridbiu.inventory.seed_batch.add_mal') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="seed_batch_id" value="{{ $data['rows']->id }}">
                                    <td style="width:15rem">
                                        <select name="mal_id" id="mal_bibran_1" class="form-control">
                                            <option value=>छान्नुहोस्</option>
                                            @if(count($data['mal']) != 0)
                                            @foreach($data['mal'] as $row)
                                            <option value="{{ $row->id }}">{{ $row->title }}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </td>
                                    <td style="width:20rem">
                                        <select name="unit_id" id="unit_5" class="form-control">
                                            <option value=>छान्नुहोस्</option>
                                            @if(count($data['unit']) != 0)
                                            @foreach($data['unit'] as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </td>
                                    <td style="width:20rem">
                                        <input type="number" class="form-control rounded amount unit-price" name="unit_price" id="mal_bibran_2" placeholder="मूल्य">
                                    </td>
                                    <td style="width:20rem">
                                        <input type="number" class="form-control rounded expenditure seed-quantity" name="quantity" id="mal_bibran_3" placeholder="संख्या" >
                                    </td>
                                    <td style="width:20rem">
                                        <input type="number" class="form-control rounded tamount total-cost" name="total_cost" id="mal_bibran_4" readonly placeholder=" कुल रकम">
                                    </td>
                                    <td style="width:30rem">
                                        <input type="text" name="details" id="mal_bibran_5" value="" placeholder="टिप्पणी" class="form-control" />
                                    </td>
                                    <td>
                                        <button type="submit"><img src="{{ asset('sumit.png') }}" alt="" style="width: 60px; height:20px"></button>
                                    </td>
                                </form>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td align="right" class="font-weight-bold" colspan="4">मलको लागि कुल लागत</td>
                                    <td class="font-weight-bold">{{ $data['total_mal_cost'] != null ? $data['total_mal_cost']['total_cost_sum'] : 0 }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </section>


            <section class="card">
                <header class="card-header">
                    कामदारको विवरण
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <table class="table table-striped table-hover table-bordered mynewsofttable worker-bibaran">
                            <thead>
                                <tr>
                                    <th>नाम </th>
                                    <th>काम गरेको दिन</th>
                                    <th>काम गरेको घण्टा</th>
                                    <th>ज्याला प्रति घण्टा</th>
                                    <th>जम्मा मूल्य</th>
                                    <th>कैफियत</th>
                                    <th>कार्य</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- {{ dd($data['rows']->seedBatchWorker) }} --}}
                            @if(count($data['rows']->seedBatchWorker) > 0)
                               @foreach($data['rows']->seedBatchWorker as $workerList)
                                <tr class="soft-multyfield ">
                                    <td class="col-md-2 form-group ">{{ $workerList->worker_id != null ? $workerList->workerDetails->full_name : '' }}</td>
                                    <td class="col-md-2 form-group  has-error ">
                                        {{ $workerList->worked_day }}
                                    </td>
                                    <td class="col-md-2 form-group ">
                                        {{ $workerList->worked_hour }}
                                    </td>
                                    <td class="col-md-2 form-group">
                                        {{ $workerList->wages_per_hour }}
                                    </td>
                                    <td class="col-md-2 form-group">
                                        {{ $workerList->total_wages }}
                                    </td>
                                    <td class="col-md-2 form-group">
                                        {{ $workerList->details }}
                                    </td>
                                    <td class="col-md-2 form-group">
                                        <button type="button" class="btn btn-danger btn-delete" onclick="DeleteRow(this)">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </td>
                                </tr>

                                @endforeach
                                @endif
                                <tr>
                                    <form action="{{ route('admin.udhyog.hybridbiu.inventory.seed_batch.add_worker') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="seed_batch_id" value="{{ $data['rows']->id }}">
                                        <td style="width:15rem">
                                            <select name="worker_id" id="mal_bibran_1" class="form-control">
                                                <option value=>छान्नुहोस्</option>
                                                @if(count($data['worker']) != 0)
                                                {{-- {{ dd($data['worker']) }} --}}
                                                @foreach($data['worker'] as $row)
                                                <option value="{{ $row->id }}">{{ $row->full_name }}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </td>

                                        <td style="width:20rem">
                                            <input type="number" class="form-control rounded amount worked-day" name="worked_day" id="mal_bibran_2" placeholder="मूल्य">
                                        </td>
                                        <td style="width:20rem">
                                            <input type="number" class="form-control rounded expenditure worked-hour" name="worked_hour" id="mal_bibran_3" placeholder="संख्या" >
                                        </td>
                                        <td style="width:20rem">
                                            <input type="text" class="form-control rounded tamount wages-per-hour" name="wages_per_hour" id="mal_bibran_4" placeholder=" कुल रकम">
                                        </td>
                                        <td style="width:20rem">
                                            <input type="text" class="form-control rounded tamount total-wages" name="total_wages" id="mal_bibran_4" readonly placeholder=" कुल रकम">
                                        </td>
                                        <td style="width:30rem">
                                            <input type="text" name="details" id="mal_bibran_5" value="" placeholder="टिप्पणी" class="form-control" />
                                        </td>
                                        <td>
                                            <button type="submit"><img src="{{ asset('sumit.png') }}" alt="" style="width: 60px; height:20px"></button>
                                        </td>
                                    </form>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td align="right" class="font-weight-bold" colspan="4">कामदारको लागि कुल लागत</td>
                                    <td class="font-weight-bold">{{ $data['total_worker_cost'] != null ? $data['total_worker_cost']['total_cost_sum'] : 0 }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </section>

            <section class="card">
                <header class="card-header">
                    मेसिनरीको विवरण
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <table class="table table-striped table-hover table-bordered mynewsofttable machinery-bibaran">
                            <thead>
                                <tr>
                                    <th>सुची</th>
                                    <th class="numeric">यूनिट</th>
                                    <th class="numeric">मूल्य</th>
                                    <th class="numeric">संख्या</th>
                                    <th class="numeric">कुल रकम</th>
                                    <th class="numeric">टिप्पणीहरू</th>
                                    <th class="numeric">कार्य</th>

                                </tr>
                            </thead>
                            <tbody>
                                {{-- {{ dd($data['rows']->seedBatchWorker) }} --}}
                            @if(count($data['rows']->seedBatchMachinery) > 0)
                               @foreach($data['rows']->seedBatchMachinery as $machine)
                                <tr class="soft-multyfield ">
                                    <td class="col-md-2 form-group ">{{ $machine->mesinari_id != null ? $machine->machine->tools : '' }}</td>
                                    <td class="col-md-2 form-group  has-error ">
                                        {{ $machine->unit_id != null ? $machine->unit->name : ' ' }}
                                    </td>
                                    <td class="col-md-2 form-group ">
                                        {{ $machine->unit_price }}
                                    </td>
                                    <td class="col-md-2 form-group">
                                        {{ $machine->quantity }}
                                    </td>
                                    <td class="col-md-2 form-group">
                                        {{ $machine->total_cost }}
                                    </td>
                                    <td class="col-md-2 form-group">
                                        {{ $machine->details }}
                                    </td>
                                    <td class="col-md-2 form-group">
                                        <button type="button" class="btn btn-danger btn-delete" onclick="DeleteRow(this)">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </td>
                                </tr>

                                @endforeach
                                @endif
                                <tr>
                                    <form action="{{ route('admin.udhyog.hybridbiu.inventory.seed_batch.add_machinery') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="seed_batch_id" value="{{ $data['rows']->id }}">
                                        <td style="width:15rem">
                                            <select name="mesinari_id" id="mesinary_1" class="form-control">
                                                <option value=>छान्नुहोस्</option>
                                                @if(count($data['mesinary']) != 0)
                                                @foreach($data['mesinary'] as $row)
                                                <option value="{{ $row->id }}">{{ $row->tools }}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </td>
                                        <td style="width:20rem">
                                            <select name="unit_id" id="unit_5" class="form-control">
                                                <option value=>छान्नुहोस्</option>
                                                @if(count($data['unit']) != 0)
                                                @foreach($data['unit'] as $row)
                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </td>
                                        <td style="width:20rem"><input type="text" class="form-control rounded amount unit-price" name="unit_price" id="mesinary_2" placeholder="मूल्य" value="" ></td>
                                        <td style="width:20rem"><input type="text" class="form-control rounded expenditure seed-quantity" name="quantity" id="mesinary_3" placeholder="संख्या" value=""></td>
                                        <td style="width:20rem"><input type="text" class="form-control rounded tamount total-cost" name="total_cost" id="mesinary_4" readonly placeholder=" कुल रकम" value=""></td>
                                        <td style="width:30rem"><input type="text" name="details" value="" id="mesinary_5" placeholder="टिप्पणी" class="form-control" /></td>
                                        <td>
                                            <button type="submit"><img src="{{ asset('sumit.png') }}" alt="" style="width: 60px; height:20px"></button>
                                        </td>
                                    </form>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td align="right" class="font-weight-bold" colspan="4">मेसिनरीको लागि कुल लागत</td>
                                    <td class="font-weight-bold">{{ $data['total_machinery_cost'] != null ? $data['total_machinery_cost']['total_cost_sum'] : 0 }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </section>

            <section class="card">
                <header class="card-header">
                    अन्य वस्तुहरुको विवरण
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <table class="table table-striped table-hover table-bordered mynewsofttable machinery-bibaran other-material">
                            <thead>
                                <tr>
                                    <th>नाम</th>
                                    <th>आपूर्तिकर्ता</th>
                                    <th>एकाइ</th>
                                    <th>एकाइ मूल्य</th>
                                    <th>मात्रा</th>
                                    <th>जम्मा मूल्य </th>
                                    <th>कार्य</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- {{ dd($data['rows']->seedBatchWorker) }} --}}
                                @if($data['rows']->otherMaterial)
                                @foreach ($data['rows']->otherMaterial as $item)
                                {{-- {{ dd($item->supplier) }} --}}
                                <tr class="new1">
                                    <td >
                                         {{  $item->name }}
                                    </td>
                                    <td >
                                         {{ $item->supplier->name }}
                                    </td>
                                    <td >
                                         {{ $item->unit->name }}
                                    </td>
                                    <td >
                                         {{ $item->unit_price }}
                                    </td>
                                    <td >
                                         {{ $item->quantity }}
                                    </td>
                                    <td >
                                         {{ $item->total_cost }}
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-delete delete-batch" data-id="{{ $item->id }}" data-url="{{ route('admin.inventory.production_batch.delete_other_material', $item->id) }}">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                                <tr class="new1">
                                    <form action="{{ route('admin.udhyog.hybridbiu.inventory.seed_batch.add_other_material') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="batch_id" value="{{ $data['rows']->id }}">
                                        {{-- <td>
                                            <select class="form-control acctype raw-material" name="raw_material_id" required>
                                                <option selected disabled>कच्चा पद्दार्थ छान्नुहोस्</option>
                                                @foreach ($data['raw_materials'] as $index => $value)
                                                    <option value="{{ $value->id }}">{{ $value['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </td> --}}
                                        <td>
                                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                        </td>

                                        <td>
                                            <select class="form-control acctype supplier" name="supplier_id">
                                                <option selected disabled>supplier छान्नुहोस्</option>
                                                @foreach ($data['suppliers'] as $index => $value)
                                                    <option value="{{ $value->id }}" >
                                                        {{ $value['name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control acctype unit-id" name="unit_id">
                                                <option selected disabled>unit छान्नुहोस्</option>
                                                @foreach ($data['units'] as $index => $value)
                                                    <option value="{{ $value->id }}">
                                                        {{ $value['name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" name="unit_price" class="form-control unit-price" >
                                        </td>
                                        <td>
                                            <input type="text" name="quantity" class="form-control seed-quantity" required>
                                        </td>
                                        <td>
                                            <input id="total_cost" type="text" name="total_cost" class="form-control total-cost" readonly>
                                        </td>
                                        <td>
                                            <button type="submit"><img src="{{ asset('sumit.png') }}" alt="" style="width: 60px; height:20px"></button>
                                        </td>

                                    </form>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td align="right" class="font-weight-bold" colspan="5">मेसिनरीको लागि कुल लागत</td>
                                    <td class="font-weight-bold">{{ $data['rows']->otherMaterial != null ? $data['rows']->otherMaterial->sum('total_cost') : 0 }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </section>




            {{-- <div class="card-footer">
                <header class="card-footer">
                    <h5 class="font-weight-bold"> यो सिजन वा ब्याचको लागि लागेको कुल लागत : {{ $data['grant_total_cost'] }}, {{ $data['grant_total_income'] }} </h5>
                </header>
            </div> --}}
            @php
                $total_cost = $data['rows']->seedBatchProduct->sum('total_cost') + $data['rows']->seedBatchMal->sum('total_cost') + $data['rows']->seedBatchWorker->sum('total_wages') + $data['rows']->seedBatchMachinery->sum('total_cost') + $data['rows']->otherMaterial->sum('total_cost');
                $total_earn = $data['rows']->sellItem->sum('total_cost')+$data['total_cost']->sum('total_cost');
                // $damage_unit_price = $batch->unit_price != null ? $batch->unit_price : $batch->inventoryProduct->price;
                // $damage_cost = $batch->damages->sum('total_damage') * $damage_unit_price;
                $profit_loss = $total_earn - $total_cost ;

            @endphp
            <div class="card mt-4 p-5">
                <div class="card-heading">
                    <head class="mt-5">
                        <h6 class="mt-5">यस रिपोर्टमा {{ $data['rows']->inventoryProduct->name }}को ब्याच नम्बर {{ $data['rows']->batch_no }} को नाफा र घाटाको विवरण प्रस्तुत गरिएको छ।</h6>
                    </head>
                </div>
                <div class="card-body row">
                    <div class="col-4">
                        <h6>बिउ उत्पादन लागत</h6>
                        <hr>
                        <p>बिउ उत्पादनमा लागेको कुल खर्चहरू:</p>
                        <ol>
                            <li>बिउ लागत: रु. {{ $data['rows']->seedBatchProduct->sum('total_cost') }}</li>
                            <li>श्रम लागत: रु. {{ $data['rows']->seedBatchWorker->sum('total_wages') }}</li>
                            <li>मलको लागत: रु. {{ $data['rows']->seedBatchMal->sum('total_cost') }}</li>
                            <li>मेसिनरीको लागत: रु. {{ $data['rows']->seedBatchMachinery->sum('total_cost') }}</li>
                            <li>अन्य खर्चहरू: रु. {{ $data['rows']->otherMaterial->sum('total_cost') }}</li>

                        </ol>
                        <p>कुल उत्पादन लागत: रु. {{ $data['rows']->seedBatchProduct->sum('total_cost') + $data['rows']->seedBatchWorker->sum('total_wages') + $data['rows']->seedBatchMal->sum('total_cost') + $data['rows']->seedBatchMachinery->sum('total_cost') + $data['rows']->otherMaterial->sum('total_cost') }}</p>
                    </div>
                    <div class="col-4">
                        <h6>बिउ बिक्री आय</h6>
                        <hr>
                        <p>उत्पादनको बिक्रीबाट प्राप्त आय:</p>
                        <ol>
                            <li>बिक्री मूल्य प्रति युनिट : {{ $data['rows']->unit_price }}</li>
                            <li>कुल बिक्री युनिट     :     {{ $data['rows']->sellItem->sum('quantity') }}</li>
                            {{-- <li>कुल बिक्री आय: रु. {{ $data['rows']->sellItem->sum('total_cost') }}</li> --}}

                        </ol>
                        <p>कुल बिक्री आय: रु. {{ $data['rows']->sellItem->sum('total_cost') }}</p>
                    </div>

                    <div class="col-4">
                        <h6>खाद्यान्न बिक्री आय</h6>
                        <hr>
                        <p>खाद्यान्नको बिक्रीबाट प्राप्त आय:</p>
                        <ol>
                            <li>बिक्री मूल्य प्रति युनिट: {{ $data['rows']->unit_price }}</li>
                            <li>कुल बिक्री युनिट: {{ $data['total_cost']->sum('total_quantity') }}</li>
                            {{-- <li>कुल बिक्री आय: रु. {{  $data['total_cost']->sum('total_cost') }}</li> --}}

                        </ol>
                        <p>कुल बिक्री आय: रु. {{  $data['total_cost']->sum('total_cost') }}</p>
                    </div>
                </div>
                <div class="card-footer">

                    <header>
                        <h4>नाफा/घाटा</h4>
                        <p>कुल नाफा/घाटा: [{{ $profit_loss > 0 ? 'नाफा' : 'घाटा' }}] रु. {{ abs($profit_loss) }}</p>
                    </header>
                </div>
            </div>
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
@section('js')
<script>
    $(document).ready(function() {
        function calculateTotalCost($row) {
            var quantity = parseFloat($row.find('.seed-quantity').val()) || 0;
            var unitPrice = parseFloat($row.find('.unit-price').val()) || 0;
            var totalCost = quantity * unitPrice;
            $row.find('.total-cost').val(totalCost.toFixed(2));
        }

        function calculateTotalWages($row) {
            var worked_hour = parseFloat($row.find('.worked-hour').val()) || 0;
            var worked_day = parseFloat($row.find('.worked-day').val()) || 0;
            var wages_per_hour = parseFloat($row.find('.wages-per-hour').val()) || 0;
            var tatal_wages = worked_hour * wages_per_hour + worked_day*8*wages_per_hour;
            $row.find('.total-wages').val(tatal_wages.toFixed(2));
        }

    // Event listener for quantity and unit price inputs
        $('.view-seed-report').on('input', '.seed-quantity, .unit-price', function() {
            console.log('dldld  ')
            var $row = $(this).closest('tr');
            calculateTotalCost($row);
        });


        $('.mal-bibaran').on('input', '.seed-quantity, .unit-price', function() {
            console.log('dldld  ')
            var $row = $(this).closest('tr');
            calculateTotalCost($row);
        });
        $('.machinery-bibaran').on('input', '.seed-quantity, .unit-price', function() {
            console.log('dldld  ')
            var $row = $(this).closest('tr');
            calculateTotalCost($row);
        });

        $('.worker-bibaran').on('input', '.worked-day, .worked-hour, .wages-per-hour', function() {
            console.log('worded-day')
            var $row = $(this).closest('tr');
            calculateTotalWages($row);
        });

        $('.other-material').on('input', '.quantity, .unit-price', function() {
            console.log('dldld  ')
            var $row = $(this).closest('tr');
            calculateTotalCost($row);
        });
    });
</script>
@endsection

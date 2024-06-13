@extends('layouts.admin')
@section('title', 'खेतबारी विवरण')
@section('css')
<link href="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/css/nepali.datepicker.v3.7.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <h6><a href="#"><i class="fa fa-home"></i> होम /</a></h6>
                </li>&nbsp;
                <h6><a href="#">खेत बिबरण</a> &nbsp;/&nbsp;विवरण</h6>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header" style="font-weight: bold;">
                कार्यतालिका बिबरण
            </header>
            <form action="{{ route($_base_route.'.karyatalika')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input id="farm_id" name="farm_id" type="hidden" value="{{ $data['rows']->id }}">
                <div class="card-body">
                    <div class="row" style="font-weight: bold;">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="title">कार्यतालिका</label> <br>
                                <input class="form-control rounded" type="text" id="title" value="{{ old('title') }}" name="title" placeholder="खेत बिबरण">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="start_date">देखि</label> <br>
                                <input class="form-control rounded " type="text" id="start_date" value="{{ old('start_date') }}" name="start_date" placeholder="देखि" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="end_date">सम्म</label> <br>
                                <input class="form-control rounded" type="text" id="end_date" value="{{ old('end_date') }}" name="end_date" placeholder="सम्म" readonly>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="complete_status">स्थिति </label> <br>
                                <select name="complete_status" id="complete_status" class="form-control select-two">
                                    <option value="">---</option>
                                    <option value="1">भएको</option>
                                    <option value="2">नभएको</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="working_team">जनशक्ति </label> <br>
                                <input class="form-control rounded" type="number" min="0" id="working_team" value="0" name="working_team">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="image">फोटा </label> <br>
                                <input type="file" id="image" value="{{ old('name') }}" name="image" accept="image/png, image/gif, image/jpeg">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="title"></label> <br>
                                <button type="submit" class="btn btn-sm btn-info js-pr2-row-add">सुरक्षित्</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th class="col-md-1">क्र.स</th>
                        <th class="col-md-3">कार्यतालिका</th>
                        <th class="col-md-1">देखि</th>
                        <th class="col-md-1">सम्म</th>
                        <th class="col-md-1">स्थिति</th>
                        <th class="col-md-1">जनशक्ति</th>
                        <th class="col-md-1">फोटा</th>
                        <th class="col-md-2">सम्पादन</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($data['karyatalika']) && $data['karyatalika']->count() > 0)
                    @foreach($data['karyatalika'] as $key=> $row)
                    <tr>
                        <td class="col-md-1">{{ getUnicodeNumber($key+1) }}.</td>
                        <td class="col-md-3">{{ $row->title }}</td>
                        <td class="col-md-1">{{ getUnicodeNumber($row->start_date) }}</td>
                        <td class="col-md-1">{{ getUnicodeNumber($row->end_date) }}</td>
                        <td class="col-md-1"> {{ ($row->complete_status == 1) ? 'भएको' : 'नभएको'}}</td>
                        <td class="col-md-1">{{ getUnicodeNumber($row->working_team) }}</td>
                        <td class="col-md-2"> <img src="{{ asset($row->image) }}" alt="" width="50px"></td>
                        <td>
                            @if(Route::has($_base_route.'.destroy_karyatalika'))
                            <button id="delete" data-id="{{ $row->id }}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete" data-url="{{ URL::route($_base_route.'.destroy_karyatalika', ['id' => $row->id]) }}" style="cursor:pointer;"><i class="fa fa-trash-o "></i></button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="12" class="text-center">कुनै डाटा उपलब्ध छैन </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </section>
        <section class="card">
            <header class="card-header" style="font-weight: bold;">
                खर्च तथा आम्दानी बिबरण
            </header>
            <form action="{{ route($_base_route.'.expenses')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input id="farm_id" name="farm_id" type="hidden" value="{{ $data['rows']->id }}">
                <div class="card-body">
                    <div class="row" style="font-weight: bold;">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="complete_status">प्रकार </label> <br>
                                <select name="types" id="complete_status" class="form-control select-two">
                                    <option value="">छान्नुहोस्</option>
                                    <option value="1" selected>खर्च</option>
                                    <option value="0">आम्दानी </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="purpose">प्रयोजन</label> <br>
                                <select name="purpose" id="purpose" class="form-control select-two">
                                    <option value="">छान्नुहोस्</option>
                                    <option value="पारिश्रमिक खर्च">पारिश्रमिक खर्च</option>
                                    <option value="ढुवानी खर्च">ढुवानी खर्च </option>
                                    <option value="भण्डारण खर्च">भण्डारण खर्च</option>
                                    <option value="अन्य खर्च">अन्य खर्च</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="expenses_date">मिति</label> <br>
                                <input class="form-control rounded " type="text" id="expenses_date" value="{{ old('expenses_date') }}" name="date" placeholder="मिति" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="amount">रकम (रु.)</label> <br>
                                <input class="form-control rounded" type="text" id="amount" value="0" name="amount" placeholder="रु.">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="remarks">टिप्पणी </label> <br>
                                <input class="form-control rounded" type="text" min="0" id="remarks" value="" name="remarks" placeholder="टिप्पणी">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="title"></label> <br>
                                <button type="submit" class="btn btn-sm btn-info js-pr2-row-add">सुरक्षित्</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th class="col-md-1">क्र.स</th>
                        <th class="col-md-1">प्रकार</th>
                        <th class="col-md-2">प्रयोजन</th>
                        <th class="col-md-1">मिति</th>
                        <th class="col-md-1">रकम (रु.)</th>
                        <th class="col-md-2">टिप्पणी</th>
                        <th class="col-md-1">सम्पादन</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($data['expenses']) && $data['expenses']->count() > 0)
                    @foreach($data['expenses'] as $key=> $row)
                    <tr>
                        <td class="col-md-1">{{ getUnicodeNumber($key+1) }}.</td>
                        <td class="col-md-1"> {{ ($row->types == 1) ? 'खर्च' : 'आम्दानी'}}</td>
                        <td class="col-md-2">{{ $row->purpose }}</td>
                        <td class="col-md-1">{{ getUnicodeNumber($row->date) }}</td>
                        <td class="col-md-1">रु. {{ ($row->amount) ? getUnicodeNumber($row->amount) : getUnicodeNumber(0)}} </td>
                        <td class="col-md-2">{{ $row->remarks }}</td>
                        <td>
                            @if(Route::has($_base_route.'.destroy_expenses'))
                            <button id="delete" data-id="{{ $row->id }}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete" data-url="{{ URL::route($_base_route.'.destroy_expenses', ['id' => $row->id]) }}" style="cursor:pointer;"><i class="fa fa-trash-o "></i></button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="12" class="text-center">कुनै डाटा उपलब्ध छैन </td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <div class="row justify-content-end">
                <div class="col-lg-4 invoice-block ">
                    <ul class="unstyled amounts">
                        <li style="font-weight: bold;"><strong>जम्मा खर्च :</strong> रु. {{getUnicodeNumber($data['total_expenses'])}}</li>
                        <li style="font-weight: bold;"><strong>जम्मा आम्दानी :</strong> रु. {{getUnicodeNumber($data['total_income'])}}</li>
                        <!-- <li style="font-weight: bold;"><strong>भ्याट:</strong> INR. {{ getUnicodeNumber(0) }} %</li> -->
                        <li style="font-weight: bold;"><strong>कूल रकम जम्मा :</strong> रु. {{getUnicodeNumber($data['total'])}}</li>
                    </ul>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/js/nepali.datepicker.v3.7.min.js')}}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<script>
    $(document).ready(function() {
        /***************************NepaliDate picker *********************/
        $("#start_date").nepaliDatePicker({
            ndpYear: true,
            ndpMonth: true,
            ndpYearCount: 1000,
            // unicodeDate: true,
        })
        $("#end_date").nepaliDatePicker({
            ndpYear: true,
            ndpMonth: true,
            ndpYearCount: 1000,
            // unicodeDate: true,
        })
        $("#expenses_date").nepaliDatePicker({
            ndpYear: true,
            ndpMonth: true,
            ndpYearCount: 1000,
            // unicodeDate: true,
        })
    });
</script>
@endsection
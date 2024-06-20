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
                <li class="breadcrumb-item"><a href="#">तालिम </a></li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route($_base_route.'.store')}}" method="POST" enctype="multipart/form-data">
            <section class="card">
                <header class="card-header">
                    तालिम
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="title">तालिम शीर्षक</label> <br>
                                <input class="form-control rounded" type="text" id="title" value="{{ old('title') }}" name="title" placeholder="तालिम शीर्षक">
                                @if($errors->has('title'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('title') }}</span></p>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="duration">तालिम अबधि</label> <br>
                                <input class="form-control rounded" type="text" id="duration" value="{{ old('duration') }}" name="duration" placeholder="तालिम अबधि">
                                @if($errors->has('duration'))
                                <p id="name-error" class="help-block" for="duration"><span>{{ $errors->first('duration') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="total_cost">तालिम शुल्क</label> <br>
                                <input class="form-control rounded" type="text" id="total_cost" value="{{ old('total_cost') }}" name="total_cost" placeholder="तालिम शुल्क">
                                @if($errors->has('total_cost'))
                                <p id="name-error" class="help-block" for="total_cost"><span>{{ $errors->first('total_cost') }}</span></p>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="start_date">देखि मिति</label> <br>
                                <input class="form-control rounded nep_date" readonly type="text" id="start_date" value="{{ old('start_date') }}" name="start_date" placeholder="देखि मिति">
                                @if($errors->has('start_date'))
                                <p id="name-error" class="help-block" for="start_date"><span>{{ $errors->first('start_date') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="end_date">सम्म मिति</label> <br>
                                <input class="form-control rounded nep_date" readonly type="text" id="end_date" value="{{ old('end_date') }}" name="end_date" placeholder="सम्म मिति">
                                @if($errors->has('end_date'))
                                <p id="name-error" class="help-block" for="end_date"><span>{{ $errors->first('end_date') }}</span></p>
                                @endif
                            </div>
                        </div>

                       @include('admin.section.status-create')
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="end_date">विषय</label> <br>
                                <textarea name="description" cols="5" rows="3" id="description" class="form-control rounded summernote" value="">{{ old('description') }}</textarea>
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
                                    <th>कार्य</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($resourceArray)
                                @foreach( $resourceArray as $resource)
                                <tr class="soft-multyfield ">
                                    <td class="col-md-3 form-group ">
                                        <input type="text" class="form-control rounded" name="full_name[]" id="full_name" placeholder="प्रशिक्षकको नाम" value="{{ $resource[0] }}">
                                    </td>
                                    <td class="col-md-3 form-group  has-error ">
                                        <input type="text" class="form-control rounded" name="position[]" id="position" placeholder="पद" value="{{ $resource[1] }}">
                                        <p class="help-block"></p>
                                    </td>
                                    <td class="col-md-3 form-group ">
                                        <input type="text" class="form-control rounded" name="subject[]" id="subject" placeholder="विषय" value="{{ $resource[2] }}">
                                        <p class="help-block"></p>
                                    </td>
                                    <td class="col-md-2 form-group ">
                                        <input type="text" class="form-control rounded" name="phone[]" id="phone" placeholder="संपर्क नम्बर" value="{{ $resource[3] }}">
                                        <p class="help-block"></p>
                                    </td>
                                    <td>
                                        <input type="email" class="form-control rounded" name="email[]" id="email" placeholder="इमेल" value="{{ $resource[4] }}">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control rounded" name="organization_name[]" id="organization_name" placeholder="संस्थाको नाम" value="{{ $resource[5] }}">
                                    </td>
                                    <td class="col-md-1">
                                        <a class="js-sw-row-add btn btn-info btn-sm">
                                            <i class="fa fa-plus" title="add"></i>
                                        </a>
                                        <a class="js-sw-row-delete btn btn-danger btn-sm ">
                                            <i class="fa fa-minus" title="remove"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr class="soft-multyfield">
                                    <td class="col-md-2 form-group ">
                                        <input type="text" class="form-control rounded" name="full_name[]" id="full_name" placeholder="प्रशिक्षकको नाम" value="">
                                        <p class="help-block"></p>
                                    </td>

                                    <td class="col-md-2 form-group  has-error ">
                                        <input type="text" class="form-control rounded" name="position[]" id="position" placeholder="पद" value="">
                                        <p class="help-block"></p>
                                    </td>
                                    <td class="col-md-2 form-group ">
                                        <input type="text" class="form-control rounded" name="subject[]" id="subject" placeholder="विषय" value="">
                                        <p class="help-block"></p>
                                    </td>
                                    <td class="col-md-2 form-group ">
                                        <input type="text" class="form-control rounded" name="phone[]" id="phone" placeholder="संपर्क नम्बर" value="">
                                        <p class="help-block"></p>
                                    </td>
                                    <td class="col-md-2 form-group ">
                                        <input type="email" class="form-control rounded" name="email[]" id="email" placeholder="इमेल" value="">
                                    </td>
                                    <td class="col-md-2 form-group ">
                                        <input type="email" class="form-control rounded" name="organization_name[]" id="organization_name" placeholder="संस्थाको नाम" value="">
                                    </td>
                                    <td class="col-md-1">
                                        <a class="js-sw-row-add btn btn-info btn-sm" >
                                            <i class="fa fa-plus" title="add"></i>
                                        </a>
                                        <a class="js-sw-row-delete btn btn-danger btn-sm">
                                            <i class="fa fa-minus" title="remove"></i>
                                        </a>
                                    </td>
                                </tr>
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
                        <table class="table table-striped table-hover table-bordered talim-phase-table">
                            <thead>
                                <tr>
                                    <th>प्रशिक्षण चरण </th>
                                    <th>प्रशिक्षण चरण विवरण</th>
                                    <th>कार्य</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="talim-phase-multyfield">
                                    <td class="col-md-2 form-group ">
                                        <input type="text" class="form-control rounded" name="phase_name[]" id="full_name" placeholder="प्रशिक्षण चरण" value="">
                                        <p class="help-block"></p>
                                    </td>

                                    <td class="col-md-2 form-group  has-error ">
                                        <input type="text" class="form-control rounded" name="phase_description[]" id="position" placeholder="प्रशिक्षण चरण विवरण" value="">
                                        <p class="help-block"></p>
                                    </td>

                                    <td class="col-md-1">
                                        <a class="talim-phase-row-add btn btn-info btn-sm" >
                                            <i class="fa fa-plus" title="add"></i>
                                        </a>
                                        <a class="talim-phase-row-delete btn btn-danger btn-sm">
                                            <i class="fa fa-minus" title="remove"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
            <!-- Begin Progress Bar Buttons-->
            <div class="form-group pull-right">
                <a href="{{ route($_base_route.'.index')}}" class="btn btn-danger btn-sm "><i class="fa fa-undo"></i> पछाडि फर्कनुहोस्</a>
                <button class="btn btn-success btn-sm " type="submit" style="cursor: pointer;"><i class="fa fa-save"></i> सुरक्षित गर्नुहोस् </button>
            </div>
            <!-- End Progress Bar Buttons-->
        </form>
    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/js/nepali.datepicker.v3.7.min.js')}}" type="text/javascript"></script>
<!--summernote-->
<script src="{{ asset('assets/cms/assets/summernote/summernote-bs4.min.js')}}"></script>
<script>
    $(document).ready(function() {
        /***************************NepaliDate picker *********************/
        $(".nep_date").nepaliDatePicker({
            ndpYear: true,
            ndpMonth: true,
            ndpYearCount: 1000,
            // unicodeDate: true,
        })
        /***************************summernote *********************/

        $('.summernote').summernote({
            height: 150, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: true // set focus to editable area after initializing summernote
        });
    });
</script>
<script>
    $(document).on('click', '.js-sw-row-add', function() {
        $('.mynewsofttable').append();
        var data = $('.mynewsofttable').find('tr.soft-multyfield:last').clone();
        data.find('input').val('');
        $('.mynewsofttable').append(data);
    });
    $(document).on('click', '.js-sw-row-delete', function() {
        if ($('.soft-multyfield').length > 1)
            $('.mynewsofttable').find('tr.soft-multyfield:last').remove();
    });

    $(document).on('click', '.talim-phase-row-add', function() {
        $('.talim-phase-table').append();
        var data = $('.talim-phase-table').find('tr.talim-phase-multyfield:last').clone();
        data.find('input').val('');
        $('.talim-phase-table').append(data);
    });
    $(document).on('click', '.talim-phase-row-delete', function() {
        if ($('.talim-phase-multyfield').length > 1)
            $('.talim-phase-table').find('tr.talim-phase-multyfield:last').remove();
    });
</script>
@endsection

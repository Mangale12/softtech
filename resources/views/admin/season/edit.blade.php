@extends('layouts.admin')
@section('title', 'हाइब्रिड बीउ')

@section('content')
<link href="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/css/nepali.datepicker.v3.7.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<div class="row">
    <div class="col-lg-8">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">हाइब्रिड बीउ</a></li>
                <li class="breadcrumb-item"><a href="#">हाइब्रिड बीउ</a></li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-12">
        {{-- {{ dd($_base_route) }} --}}
        <form action="{{ route($_base_route.'.update', $data['row']->id)}}" method="POST" enctype="multipart/form-data">
            <section class="card">
                <header class="card-header">
                    सिजन
                </header>
                <div class="card-body">
                    @csrf
                    <input type="hidden" name="udhyog" value="{{ request()->udhyog }}">
                    <div class="row">
                        <table class="table table-bordered" id="dynamicTable">
                            <tr>
                                <th>सिजनको नाम <span class="text-danger">*</span></th>
                                <th>सिजन सुरु मिति <span class="text-danger">*</span></th>
                                <th> सिजन समाप्त मिति <span class="text-danger">*</span></th>
                                {{-- <th> चेतावनी दिन</th> --}}
                            </tr>
                            <tr>
                                <td style="width:20rem">
                                    <input type="text" name="name" value="{{ old('name', $data['row']->name) }}" class="form-control"/>
                                </td>

                                <td style="width:20rem">
                                    <input class="form-control rounded " type="text" id="date" value="{{getUnicodeNumber( $data['row']->start_date)}}" name="start_date" placeholder="सिजन सुरु मिति" readonly>
                                    @if($errors->has('manufacturing_date'))
                                    <p id="manufacturing_date-error" class="help-block" for="manufacturing_date"><span>{{ $errors->first('manufacturing_date') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:20rem">
                                    <input class="form-control rounded " type="text" id="end-date" value="{{getUnicodeNumber( $data['row']->end_date)}}" name="end_date" placeholder="सिजन समाप्त मिति" readonly>
                                    @if($errors->has('end_date'))
                                    <p id="end_date-error" class="help-block" for="end_date"><span>{{ $errors->first('end_date') }}</span></p>
                                    @endif
                                </td>
                            </tr>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.select-two').select2();
        $('#date').nepaliDatePicker({
            dateFormat: 'DD/MM/YYYY',
            closeOnDateSelect: true
        });
        $('#expiry-date').nepaliDatePicker({
            dateFormat: 'DD/MM/YYYY',
            closeOnDateSelect: true
        });
    });
  // If quantity is valid, continue with row deletion or other actions

</script>


@endsection

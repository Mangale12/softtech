@extends('layouts.admin')
@section('title', 'पशुपन्छी बिबरण')
@section('css')
<!--Form Wizard-->
<link href="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/css/nepali.datepicker.v3.7.min.css')}}" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                <h6><a href="#">पशुपन्छी बिबरण</a></h6>
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
                    <legend>पशुपन्छी बिबरण</legend>
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row" style="font-weight: bold;">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="title">आर्थिक वर्ष</label> <br>
                                <select name="fiscal_year" id="fiscal_year" class="form-control select-two">
                                    <option value=>छान्नुहोस्</option>
                                    @if(count($data['fiscal']) != 0)
                                    @foreach($data['fiscal'] as $row)
                                    <option value="{{ $row->id }}">{{ $row->fiscal_np }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @if($errors->has('fiscal_year'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('fiscal_year') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="animal_cat">पशुपन्छी प्रकार</label> <br>
                                <select name="animal_cat" id="animal_cat" class="form-control select-two">
                                    <option value=>छान्नुहोस्</option>
                                    @if(count($data['animal-category']) != 0)
                                    @foreach($data['animal-category'] as $row)
                                    <option value="{{ $row->id }}">{{ $row->title }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @if($errors->has('fiscal_year'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('fiscal_year') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="animal_id">पशुपन्छी सुची</label> <br>
                                <select name="animal_id" id="animal_id" class="form-control select-two">
                                    <option value=>छान्नुहोस्</option>
                                </select>
                                @if($errors->has('fiscal_year'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('fiscal_year') }}</span></p>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="title">महिना देखि</label> <br>
                                <select name="start_month_id" id="start_month_id" class="form-control select-two">
                                    <option value=>छान्नुहोस्</option>
                                    @if(count($data['month']) != 0)
                                    @foreach($data['month'] as $row)
                                    <option value="{{ $row->id }}">{{ $row->month_np }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @if($errors->has('start_month_id'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('start_month_id') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="title">सम्म</label> <br>
                                <select name="end_month_id" id="end_month_id" class="form-control select-two">
                                    <option value=>छान्नुहोस्</option>
                                    @if(count($data['month']) != 0)
                                    @foreach($data['month'] as $row)
                                    <option value="{{ $row->id }}">{{ $row->month_np }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @if($errors->has('end_month_id'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('end_month_id') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="title">मिति देखि</label> <br>
                                <div class="input-group date dpMonths">
                                    <input type="text" readonly class="form-control nep_date" value="{{ old('start_date') }}" name="start_date" id="start_date" placeholder="मिति देखि" aria-label="Right Icon" aria-describedby="dp-mdo">
                                    <div class="input-group-append">
                                        <button id="dp-mdo" class="btn btn-primary" type="button"><i class="fa fa-calendar f14"></i></button>
                                    </div>
                                </div>
                                @if($errors->has('ritu_id'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('ritu_id') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="title">सम्म</label> <br>
                                <div class="input-group date dpMonths">
                                    <input type="text" readonly class="form-control nep_date" value="{{ old('end_date') }}" name="end_date" id="nep_date_1" placeholder="सम्म" aria-label="Right Icon" aria-describedby="dp-mdo">
                                    <div class="input-group-append">
                                        <button id="dp-mdo" class="btn btn-primary" type="button"><i class="fa fa-calendar f14"></i></button>
                                    </div>
                                </div>
                                @if($errors->has('ritu_id'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('ritu_id') }}</span></p>
                                @endif
                            </div>
                        </div>
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
<script>
    $(document).ready(function() {
        //get Animal Category
        $('#animal_cat').change(function() {
            var animal_cat = this.value;
            $("#animal_id").html('');
            var url = "{{route('getAnimalList')}}";
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    animal_cat: animal_cat,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result) {
                    //debugger;
                    console.log(result.baali);
                    $('#animal_id').html('<option value="">-- छान्नुहोस् --</option>');
                    $.each(result.baali, function(key, value) {
                        $('#animal_id').append('<option value="' + value.id + '">' + value.title + '</option>');
                    });
                }
            });
        });

        /***************************NepaliDate picker *********************/
        $(".nep_date").nepaliDatePicker({
            ndpYear: true,
            ndpMonth: true,
            ndpYearCount: 1000,
            // unicodeDate: true,
        })
        $("#nep_date").nepaliDatePicker({
            ndpYear: true,
            ndpMonth: true,
            ndpYearCount: 1000,
            // unicodeDate: true,
        })
    });
</script>
@endsection
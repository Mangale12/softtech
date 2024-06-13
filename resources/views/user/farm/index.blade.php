@extends('layouts.user')
@section('title', 'खेत बिबरण')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<link href="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/css/nepali.datepicker.v3.7.min.css')}}" rel="stylesheet" />

@endsection
@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">
            <a href="{{route( $_base_route.'.create' )}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus fa-sm text-white-50"></i> नयाँ खेतबारी </a>&nbsp;
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <section class="card">
            <header class="card-header">
                किसान खेतबारी बिबरण
                <span class="tools pull-right d-flex">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="card-body">
                <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="dynamic-table">
                        <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>आर्थिक वर्ष</th>
                                <th>जग्गा </th>
                                <th>बाली प्रकार</th>
                                <th>बालि</th>
                                <th>महिना देखि</th>
                                <th>सम्म</th>
                                <th>मिति देखि</th>
                                <th>सम्म</th>
                                <th>Added By</th>
                                <th class="hidden-phone">सम्पादन</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($data['rows']) != 0)
                            @foreach( $data['rows'] as $row)
                            <tr class="gradeX">
                                <td>{{ getUnicodeNumber(($data['rows']->currentPage() - 1) * $data['rows']->perPage() + $loop->index + 1)  }}.</td>
                                <td>@if(isset($row->fiscalYear)) {{ $row->fiscalYear->fiscal_np }} @endif</td>
                                <td>@if(isset($row->getLand)) {{ $row->getLand->totalbigaha }} @endif</td>
                                <td>@if(isset($row->baaliCategory)) {{ $row->baaliCategory->title }} @endif</td>
                                <td>@if(isset($row->baaliName)) {{ $row->baaliName->title }} @endif</td>
                                <td>@if(isset($row->startMonth)) {{ $row->startMonth->month_np }} @endif</td>
                                <td>@if(isset($row->endMonth)) {{ $row->endMonth->month_np }} @endif</td>
                                <td>{{ getUnicodeNumber($row->start_date)}}</td>
                                <td>{{ getUnicodeNumber($row->end_date) }}</td>
                                <td>{{ Auth::id() ==  $row->added_by  ? 'स्वयम आफै' : $row->getAddedBy->role  }}</td>
                                <td class="col-md-2">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            गतिबिधि
                                        </button>
                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                            <a href="javascript:void(0)" class="btn btn-xs user" data-id="{{ $row->id }}" data-whatever="@mdo" data-toggle="modal" data-target="#exampleModal"> कार्यतालिका बिबरण</a>
                                            <a href="javascript:void(0)" class="btn  btn-xs user" data-id="{{ $row->id }}" data-whatever="@mdo" data-toggle="modal" data-target="#exampleModal1"> अन्य खर्च बिबरण</a>
                                            <a href="javascript:void(0)" class="btn  btn-xs user" data-id="{{ $row->id }}" data-whatever="@mdo" data-toggle="modal" data-target="#exampleModal2"> आम्दानी बिबरण</a>

                                        </div>
                                    </div>
                                    <!-- @if(Route::has($_base_route.'.edit'))
                                    <a href="{{ URL::route($_base_route.'.edit', ['id' => $row->id]) }}">
                                        <button class="btn btn-primary btn-sm m-r-5" data-toggle="tooltip" data-original-title="Edit" style="cursor: pointer;"><i class="fa fa-pencil font-14"></i>&nbsp;सम्पादन</button></a>
                                    @endif -->

                                    @if(Route::has($_base_route.'.destroy'))
                                    <button id="delete" data-id="{{ $row->id }}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete" data-url="{{ URL::route($_base_route.'.destroy', ['id' => $row->id]) }}" style="cursor:pointer;"><i class="fa fa-trash-o "></i>&nbsp;डिलिट</button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <p>डाटा छैन !</p>
                            @endif
                    </table>
                </div>
                <div class="row">
                    @include('admin.section.load-time')
                    {{ $data['rows']->links('vendor.pagination.custom') }}
                </div>
            </div>
        </section>
    </div>

</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModal2">&nbsp; कार्यतालिका बिबरण</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" style="font-weight: bold;">
                    <div class="col-md-3">
                        <input type="text" id="user_id" hidden>

                        <div class="form-group">
                            <label for="title">कार्यतालिका </label> <br>
                            <input type="text" class="form-control" value="" id="title" name="title" placeholder="कार्यतालिका" aria-label="Right Icon" aria-describedby="dp-mdo">
                            @if($errors->has('ritu_id'))
                            <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('ritu_id') }}</span></p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="title">देखि </label> <br>
                            <input type="text" class="form-control nep_date" value="" readonly name="start_date" id="start_date" placeholder="देखि" aria-label="Right Icon" aria-describedby="dp-mdo">
                            @if($errors->has('ritu_id'))
                            <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('ritu_id') }}</span></p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="title">सम्म </label> <br>
                            <input type="text" class="form-control nep_date" value="" readonly name="end_date" id="end_date" placeholder="सम्म" aria-label="Right Icon" aria-describedby="dp-mdo">
                            @if($errors->has('ritu_id'))
                            <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('ritu_id') }}</span></p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="title">भएको/नभएको </label> <br>
                            <select name="complete_status" id="complete_status" class="form-control select-two">
                                <option value=>छान्नुहोस्</option>
                                <option value="1">छ</option>
                                <option value="2">छैन</option>
                            </select>
                            @if($errors->has('ritu_id'))
                            <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('ritu_id') }}</span></p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="title">जनशक्ति </label> <br>
                            <input type="text" class="form-control" value="" name="working_team" id="working_team" placeholder="जनशक्ति" aria-label="Right Icon" aria-describedby="dp-mdo">
                            @if($errors->has('ritu_id'))
                            <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('ritu_id') }}</span></p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="title">फोटा </label> <br>
                            <input type="file" class="form-control" value="" name="image" id="image" placeholder="फोटा" aria-label="Right Icon" aria-describedby="dp-mdo">
                            @if($errors->has('ritu_id'))
                            <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('ritu_id') }}</span></p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">टिप्पणी </label> <br>
                            <input type="text" class="form-control" value="" name="remarks" id="remarks" placeholder="टिप्पणी" aria-label="Right Icon" aria-describedby="dp-mdo">
                            @if($errors->has('ritu_id'))
                            <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('ritu_id') }}</span></p>
                            @endif
                        </div>
                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"> पछाडि फर्कनुहोस्</button>
                <button type="button" class="btn btn-primary add_ac" onclick="shedules(this)" style="cursor:pointer;"> सुरक्षित गर्नुहोस्</button>

            </div>
        </div>
    </div>
</div>
<!-- modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModal2">&nbsp; अन्य खर्च बिबरण</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" style="font-weight: bold;">
                    <div class="col-md-3">
                        <input type="text" id="user_id" hidden>
                        <div class="form-group">
                            <label for="purpose">प्रयोजन </label> <br>
                            <input type="text" class="form-control" value="" id="purpose" name="purpose" placeholder="प्रयोजन" aria-label="Right Icon" aria-describedby="dp-mdo">
                            @if($errors->has('purpose'))
                            <p id="name-error" class="help-block" for="purpose"><span>{{ $errors->first('purpose') }}</span></p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="date">मिति </label> <br>
                            <input type="text" class="form-control expenses" value="" readonly name="date" id="date" placeholder="मिति" aria-label="Right Icon" aria-describedby="dp-mdo">
                            @if($errors->has('date'))
                            <p id="name-error" class="help-block" for="date"><span>{{ $errors->first('date') }}</span></p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="amount">रकम </label> <br>
                            <input type="text" class="form-control " value="" name="amount" id="amount" placeholder="रु." aria-label="Right Icon" aria-describedby="dp-mdo">
                            @if($errors->has('amount'))
                            <p id="name-error" class="help-block" for="amount"><span>{{ $errors->first('amount') }}</span></p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="remark">टिप्पणी </label> <br>
                            <input type="text" class="form-control" value="" name="remark" id="remark" placeholder="टिप्पणी" aria-label="Right Icon" aria-describedby="dp-mdo">
                            @if($errors->has('remark'))
                            <p id="name-error" class="help-block" for="remark"><span>{{ $errors->first('remark') }}</span></p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"> पछाडि फर्कनुहोस्</button>
                <button type="button" class="btn btn-primary add_ac" onclick="expenses(this)" style="cursor:pointer;"> सुरक्षित गर्नुहोस्</button>

            </div>
        </div>
    </div>
</div>
<!-- modal -->
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/js/nepali.datepicker.v3.7.min.js')}}" type="text/javascript"></script>

<script>
    function shedules(e) {
        //ajax crud
        var farm_id = $("#user_id").val();
        var title = $('#title').val();
        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();
        var complete_status = $('#complete_status').val();
        var working_team = $('#working_team').val();
        var remarks = $('#remarks').val();
        var image = $('#image').val();

        $.ajax({
            type: 'POST',
            url: "{{ route($_base_route.'.shedules')}}",
            dataType: 'json',
            data: {
                'farm_id': farm_id,
                'title': title,
                'start_date': start_date,
                'end_date': end_date,
                'complete_status': complete_status,
                'working_team': working_team,
                'remarks': remarks,
                'image': image,
                _token: '{{csrf_token()}}'
            },
            success: function(response) {
                alert(response.success);
                location.reload(true);
            },
            error: function(response) {
                alert("Ajax calling error !");
            }
        });
    }

    function expenses(e) {
        //ajax crud
        var farm_id = $("#user_id").val();
        var purpose = $('#purpose').val();
        var date = $('#date').val();
        var amount = $('#amount').val();
        var remark = $('#remark').val();

        $.ajax({
            type: 'POST',
            url: "{{ route($_base_route.'.expenses')}}",
            dataType: 'json',
            data: {
                'farm_id': farm_id,
                'purpose': purpose,
                'date': date,
                'amount': amount,
                'remark': remark,
                _token: '{{csrf_token()}}'
            },
            success: function(response) {
                alert(response.success);
                location.reload(true);
            },
            error: function(response) {
                alert("Ajax calling error !");
            }
        });
    }
</script>
<script>
    $('.user').on('click', function() {
        var value = $(this).attr('data-id');
        $("#user_id").val(value);
    });

    /***************************NepaliDate picker *********************/
    $(".nep_date").nepaliDatePicker({
        container: "#exampleModal",
        ndpYear: true,
        ndpMonth: true,
        ndpYearCount: 1000,
        // unicodeDate: true,
    })
    /***************************NepaliDate picker *********************/
    $(".expenses").nepaliDatePicker({
        container: "#exampleModal1",
        ndpYear: true,
        ndpMonth: true,
        ndpYearCount: 1000,
        // unicodeDate: true,
    })
</script>

@endsection
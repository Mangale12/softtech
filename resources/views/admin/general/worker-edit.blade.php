@extends('layouts.admin')
@section('title', 'कामदार बिबरण')
@section('css')
<!--Form Wizard-->
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
                <h6><a href="#">कामदार बिबरण </a></h6>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <!--progress bar start-->
        @include('admin.general.edit-stepper')
        <div style="margin-left:1000px; padding-bottom: 5px;">
            <!-- <button type="button" class="js-sw-row-add btn btn-info btn-sm btn-file">
                <i class="fa fa-plus" title="add"> नयाँ थप्नुस</i>
            </button> --> <br>
        </div>
        <form action="{{ route($_base_route.'.worker-update',  $data['single']->unique_id )}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <input id="unique_id" name="unique_id" type="hidden" value="{{ $data['single']->unique_id }}">
            <input id="worker_id" name="worker_id" type="hidden" value="{{ $data['single']->id }}">

            <section class="card">
                <div class="card-body">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="row">
                        <br />
                        @php
                        $resourceArray = json_decode($data['single']->worker_detail);
                        @endphp

                        <table class="table table-striped table-hover table-bordered mynewsofttable">
                            <thead>
                                <tr>
                                    <th>पुरा नाम</th>
                                    <th>मोबाइल नं</th>
                                    <th>लिंग</th>
                                    <th>कामदार प्रकार</th>
                                    <th>समय</th>
                                    <th>कामदार तलब प्रकार</th>
                                    <th>तलब</th>
                                    <th>सम्पादन</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="soft-multyfield ">
                                    <td class="col-md-2 form-group ">
                                        <input type="text" class="form-control rounded" name="full_name" id="full_name" placeholder="पुरा नाम" value="">
                                        <p class="help-block"></p>
                                    </td>
                                    <td class="col-md-1 form-group ">
                                        <input type="text" class="form-control rounded" name="mobile" id="mobile" placeholder=" मोबाइल नं" value="">
                                        <p class="help-block"></p>
                                    </td>
                                    <td class="col-md-1 form-group ">
                                        <select name="gender" id="gender" class="form-control select-two">
                                            <option value=>छान्नुहोस्</option>
                                            <option value="पुरुष">पुरुष</option>
                                            <option value="महिला">महिला</option>
                                            <option value="अन्य">अन्य</option>
                                        </select>
                                        <p class="help-block"></p>
                                    </td>
                                    <td class="col-md-1 form-group ">
                                        <select name="worker_types" id="worker_types" class="form-control select-two">
                                            <option value=>छान्नुहोस्</option>
                                            <option value="किर्षक स्वयम् आफै"> किर्षक स्वयम् आफै</option>
                                            <option value="बाहिरा को कामदार">बाहिरा को कामदार</option>
                                            <option value="अन्य">अन्य</option>
                                        </select>
                                        <p class="help-block"></p>
                                    </td>
                                    <td class="col-md-1 form-group ">
                                        <select name="times" id="times" class="form-control select-two">
                                            <option value=>छान्नुहोस्</option>
                                            <option value="४ घण्टा">४ घण्टा</option>
                                            <option value="८ घण्टा">८ घण्टा</option>
                                            <option value="1२ घण्टा">1२ घण्टा</option>
                                            <option value="२४ घण्टा">२४ घण्टा</option>
                                            <option value="३६ घण्टा">३६ घण्टा</option>
                                        </select>
                                        <p class="help-block"></p>
                                    </td>
                                    <td class="col-md-1 form-group ">
                                        <select name="salary_type" id="salary_type" class="form-control select-two">
                                            <option value=>छान्नुहोस्</option>
                                            <option value="महिनावारि">महिनावारि</option>
                                            <option value="घण्टा अनुसार">घण्टा अनुसार</option>
                                            <option value="अन्य">अन्य</option>
                                        </select>
                                        <p class="help-block"></p>
                                    </td>
                                    <td class="col-md-1 form-group ">
                                        <input type="text" class="form-control rounded" name="salary" id="salary" placeholder="तलब" value="">
                                        <p class="help-block"></p>
                                    </td>
                                    <td class="col-md-1">
                                        <button type="button" id="store_worker" class="btn btn-success btn-sm btn-remove"><i class="fa fa-plus "></i> थप्नुहोस </button>

                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
            <!-- End Progress Bar Buttons-->
            <!-- Begin Progress Bar Buttons-->
            <div class="form-group pull-right">
                <a href="{{ route($_base_route.'.land-edit', ['unique_id' => $data['unique_id']])}}" class="btn btn-danger btn-sm "><i class="fa fa-undo"></i> पछाडि फर्कनुहोस्</a>
                <button class="btn btn-success btn-sm " type="submit" style="cursor: pointer;"><i class="fa fa-save"></i> सुरक्षित गर्नुहोस् </button>
            </div>
            <!-- End Progress Bar Buttons-->
        </form>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <section class="card">
            <header class="card-header no-border">
                कामदार बिबरण
            </header>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>पुरा नाम</th>
                        <th>मोबाइल नं</th>
                        <th>लिंग</th>
                        <th>कामदार प्रकार</th>
                        <th>समय</th>
                        <th>कामदार तलब प्रकार</th>
                        <th>तलब</th>
                        <th>सम्पादन</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($data['worker_list']) && $data['worker_list']->count() > 0)
                    @foreach($data['worker_list'] as $key =>$row)
                    <tr>
                        <td>{{$row->full_name }}</td>
                        <td>{{ $row->mobile }}</td>
                        <td>{{ $row->gender}}</td>
                        <td>{{ $row->worker_types}}</td>
                        <td>{{ $row->times}}</td>
                        <td>{{ $row->salary_type}}</td>
                        <td>{{ $row->salary}}</td>
                        <td>
                            @if(Route::has($_base_route.'.destroyWorker'))
                            <button id="delete" data-id="{{ $row->id }}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete" data-url="{{ URL::route($_base_route.'.destroyWorker', ['id' => $row->id]) }}" style="cursor:pointer;"><i class="fa fa-trash-o "></i></button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="13" class="text-center">कुनै डाटा उपलब्ध छैन</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </section>
    </div>
</div>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script>
    $(document).ready(function() {
        //store land // Store Land Details
        $(document).on('click', '#store_worker', function(e) {
            var worker_id = $('#worker_id').val();
            var unique_id = $('#unique_id').val();
            var full_name = $('#full_name').val();
            var mobile = $('#mobile').val();
            var gender = $('#gender').val();
            var worker_types = $('#worker_types').val();
            var times = $('#times').val();
            var salary_type = $('#salary_type').val();
            var salary = $('#salary').val();
            var url = "{{route('admin.general.storeWorker')}}";
            $.ajax({
                url: url,
                type: "POST",
                dataType: 'json',
                data: {
                    worker_id: worker_id,
                    unique_id: unique_id,
                    full_name: full_name,
                    mobile: mobile,
                    gender: gender,
                    worker_types: worker_types,
                    times: times,
                    salary_type: salary_type,
                    salary: salary,
                    _token: '{{csrf_token()}}'
                },
                success: function(result) {
                    console.log(result);
                    if (result.status == 'success') {
                        toastr.success(result.message);
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                    } else {
                        toastr.error(result.message);
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                    }
                }
            });
        })
    });
</script>
<!-- <script>
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
</script> -->

<script>
    $(document).on('click', "input[type='text']", function() {
        $(this).select();
    });
</script>
@endsection
@extends('layouts.user')
@section('title', 'पारिवारिक बिबरण')
@section('css')
<!--Form Wizard-->
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">पारिवारिक बिबरण</a></li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <!--progress bar start-->
        @include('admin.general.stepper')
        <div style="margin-left:1000px; padding-bottom: 5px;">
            <br>
        </div>
        <form action="{{ route($_base_route.'.family-update',  $data['single']->unique_id )}}" method="POST" enctype="multipart/form-data">
            <section class="card">
                <div class="card-body">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="row">
                        <br />
                        @php
                        $resourceArray = json_decode($data['single']->family_detail);
                        //dd($resourceArray);
                        @endphp

                        <table class="table table-striped table-hover table-bordered mynewsofttable">
                            <thead>
                                <tr>
                                    <th>पुरा नाम </th>
                                    <th>इमेल</th>
                                    <th>मोबाइल नं</th>
                                    <th>पेशा</th>
                                    <th>सम्पादन</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($resourceArray)
                                @foreach( $resourceArray as $resource)
                                <tr class="soft-multyfield ">
                                    <td class="col-md-3 form-group ">
                                        <input type="text" class="form-control rounded" name="full_name[]" id="full_name" placeholder="पुरा नाम" value="{{ $resource[0] }}">
                                        <p class="help-block"></p>
                                    </td>

                                    <td class="col-md-3 form-group  has-error ">
                                        <input type="text" class="form-control rounded" name="email[]" id="email" placeholder="इमेल " value="{{ $resource[1] }}">
                                        <p class="help-block"></p>
                                    </td>
                                    <td class="col-md-3 form-group ">
                                        <input type="text" class="form-control rounded" name="mobile[]" id="mobile" placeholder="मोबाइल नं" value="{{ $resource[2] }}">
                                        <p class="help-block"></p>
                                    </td>
                                    <td class="col-md-2 form-group ">
                                        <input type="text" class="form-control rounded" name="occupation[]" id="occupation" placeholder="पेशा" value="{{ $resource[3] }}">
                                        <p class="help-block"></p>
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
                                <tr class="soft-multyfield ">

                                    <td class="col-md-3 form-group ">
                                        <input type="text" class="form-control rounded" name="full_name[]" id="full_name" placeholder="पुरा नाम" value="">
                                        <p class="help-block"></p>
                                    </td>

                                    <td class="col-md-3 form-group  has-error ">
                                        <input type="text" class="form-control rounded" name="email[]" id="email" placeholder="इमेल " value="">
                                        <p class="help-block"></p>
                                    </td>
                                    <td class="col-md-3 form-group ">
                                        <input type="text" class="form-control rounded" name="mobile[]" id="mobile" placeholder=" मोबाइल नं" value="">
                                        <p class="help-block"></p>
                                    </td>
                                    <td class="col-md-2 form-group ">
                                        <input type="text" class="form-control rounded" name="occupation[]" id="occupation" placeholder=" पेशा" value="">
                                        <p class="help-block"></p>
                                    </td>
                                    <td class="col-md-1">

                                        <a class="js-sw-row-add btn btn-info btn-sm">
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
            <!-- End Progress Bar Buttons-->
            <!-- Begin Progress Bar Buttons-->
            <div class="form-group pull-right">
                <a href="{{ route($_base_route.'.edit', ['unique_id' => $data['unique_id']])}}" class="btn btn-danger btn-sm "><i class="fa fa-undo"></i> पछाडि फर्कनुहोस्</a>
                <button class="btn btn-success btn-sm " type="submit" style="cursor: pointer;"><i class="fa fa-save"></i> सुरक्षित गर्नुहोस् </button>
            </div>
            <!-- End Progress Bar Buttons-->
        </form>
    </div>
</div>
@endsection
@section('js')

<script>
    $(document).on('click', '.js-sw-row-add', function() {
        $('.mynewsofttable').append();
        var data = $('.mynewsofttable').find('tr.soft-multyfield:last').clone();
        data.find('input').val('');
        $('.mynewsofttable').append(data);    });
    $(document).on('click', '.js-sw-row-delete', function() {
        if ($('.soft-multyfield').length > 1)
            $('.mynewsofttable').find('tr.soft-multyfield:last').remove();
    });
</script>

<script>
    $(document).on('click', "input[type='text']", function() {
        $(this).select();
    });
</script>

@endsection
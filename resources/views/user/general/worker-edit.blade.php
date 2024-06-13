@extends('layouts.user')
@section('title', 'कामदार बिबरण')
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
                <li class="breadcrumb-item"><a href="#">कामदार बिबरण </a></li>
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
            <!-- <button type="button" class="js-sw-row-add btn btn-info btn-sm btn-file">
                <i class="fa fa-plus" title="add"> नयाँ थप्नुस</i>
            </button> --> <br>
        </div>
        <form action="{{ route($_base_route.'.worker-update',  $data['single']->unique_id )}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
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
                                @if($resourceArray)
                                @foreach( $resourceArray as $resource)
                                <tr class="soft-multyfield ">
                                    <td class="col-md-2 form-group ">
                                        <input type="text" class="form-control rounded" name="full_name[]" id="full_name" placeholder="पुरा नाम" value="{{ $resource[0]}}">
                                        <p class="help-block"></p>
                                    </td>
                                    <td class="col-md-1 form-group ">
                                        <input type="text" class="form-control rounded" name="mobile[]" id="mobile" placeholder=" मोबाइल नं" value="{{ $resource[1]}}">
                                        <p class="help-block"></p>
                                    </td>
                                    <td class="col-md-1 form-group ">
                                        <select name="gender[]" id="gender" class="form-control select-two">
                                            <option value=>छान्नुहोस्</option>
                                            <option value="पुरुष" @if($resource[2]=='पुरुष' ) selected @endif>पुरुष</option>
                                            <option value="महिला" @if($resource[2]=='महिला' ) selected @endif>महिला</option>
                                            <option value="अन्य" @if($resource[2]=='अन्य' ) selected @endif>अन्य</option>
                                        </select>
                                        <p class="help-block"></p>
                                    </td>
                                    <td class="col-md-1 form-group ">
                                        <select name="worker_types[]" id="worker_types" class="form-control select-two">
                                            <option value=>छान्नुहोस्</option>
                                            <option value="किर्षक स्वयम् आफै" @if($resource[3]=='किर्षक स्वयम् आफै' ) selected @endif> किर्षक स्वयम् आफै</option>
                                            <option value="बाहिरा को कामदार" @if($resource[3]=='बाहिरा को कामदार' ) selected @endif>बाहिरा को कामदार</option>
                                            <option value="अन्य" @if($resource[3]=='अन्य' ) selected @endif>अन्य</option>
                                        </select>
                                        <p class="help-block"></p>
                                    </td>
                                    <td class="col-md-1 form-group ">
                                        <select name="times[]" id="times" class="form-control select-two">
                                            <option value=>छान्नुहोस्</option>
                                            <option value="४ घण्टा" @if($resource[4]=='४ घण्टा' ) selected @endif>४ घण्टा</option>
                                            <option value="८ घण्टा" @if($resource[4]=='८ घण्टा' ) selected @endif>८ घण्टा</option>
                                            <option value="1२ घण्टा" @if($resource[4]=='1२ घण्टा' ) selected @endif>1२ घण्टा</option>
                                            <option value="२४ घण्टा" @if($resource[4]=='२४ घण्टा' ) selected @endif>२४ घण्टा</option>
                                            <option value="३६ घण्टा" @if($resource[4]=='३६ घण्टा' ) selected @endif>३६ घण्टा</option>
                                        </select>
                                        <p class="help-block"></p>
                                    </td>
                                    <td class="col-md-1 form-group ">
                                        <select name="salary_type[]" id="salary_type" class="form-control select-two">
                                            <option value=>छान्नुहोस्</option>
                                            <option value="महिनावारि" @if($resource[5]=='महिनावारि' ) selected @endif>महिनावारि</option>
                                            <option value="घण्टा अनुसार" @if($resource[5]=='घण्टा अनुसार' ) selected @endif>घण्टा अनुसार</option>
                                            <option value="अन्य" @if($resource[5]=='अन्य' ) selected @endif>अन्य</option>
                                        </select>
                                        <p class="help-block"></p>
                                    </td>
                                    <td class="col-md-1 form-group ">
                                        <input type="text" class="form-control rounded" name="occupation[]" id="occupation" placeholder="तलब" value="{{ $resource[6]}}">
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
                                @endforeach
                                @else
                                <tr class="soft-multyfield ">
                                    <td class="col-md-2 form-group ">
                                        <input type="text" class="form-control rounded" name="full_name[]" id="full_name" placeholder="पुरा नाम" value="">
                                        <p class="help-block"></p>
                                    </td>
                                    <td class="col-md-1 form-group ">
                                        <input type="text" class="form-control rounded" name="mobile[]" id="mobile" placeholder=" मोबाइल नं" value="">
                                        <p class="help-block"></p>
                                    </td>
                                    <td class="col-md-1 form-group ">
                                        <select name="gender[]" id="gender" class="form-control select-two">
                                            <option value=>छान्नुहोस्</option>
                                            <option value="पुरुष">पुरुष</option>
                                            <option value="महिला">महिला</option>
                                            <option value="अन्य">अन्य</option>
                                        </select>
                                        <p class="help-block"></p>
                                    </td>
                                    <td class="col-md-1 form-group ">
                                        <select name="worker_types[]" id="worker_types" class="form-control select-two">
                                            <option value=>छान्नुहोस्</option>
                                            <option value="किर्षक स्वयम् आफै"> किर्षक स्वयम् आफै</option>
                                            <option value="बाहिरा को कामदार">बाहिरा को कामदार</option>
                                            <option value="अन्य">अन्य</option>
                                        </select>
                                        <p class="help-block"></p>
                                    </td>
                                    <td class="col-md-1 form-group ">
                                        <select name="times[]" id="times" class="form-control select-two">
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
                                        <select name="salary_type[]" id="salary_type" class="form-control select-two">
                                            <option value=>छान्नुहोस्</option>
                                            <option value="महिनावारि">महिनावारि</option>
                                            <option value="घण्टा अनुसार">घण्टा अनुसार</option>
                                            <option value="अन्य">अन्य</option>
                                        </select>
                                        <p class="help-block"></p>
                                    </td>
                                    <td class="col-md-1 form-group ">
                                        <input type="text" class="form-control rounded" name="occupation[]" id="occupation" placeholder="तलब" value="">
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
                <a href="{{ route($_base_route.'.land-edit', ['unique_id' => $data['unique_id']])}}" class="btn btn-danger btn-sm "><i class="fa fa-undo"></i> पछाडि फर्कनुहोस्</a>
                <button class="btn btn-success btn-sm " type="submit" style="cursor: pointer;"><i class="fa fa-save"></i> सुरक्षित गर्नुहोस् </button>
            </div>
            <!-- End Progress Bar Buttons-->
        </form>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {

        // //Land Detail
        // $(".btn-file").click(function() {
        //     var html = $(".clone-file").html();
        //     $(".file-block").prepend(html);
        // });

        // $("body").on("click", ".btn-remove", function() {
        //     $(this).parents(".control-group").remove();
        // });
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
</script>

<script>
    $(document).on('click', "input[type='text']", function() {
        $(this).select();
    });
</script>
@endsection
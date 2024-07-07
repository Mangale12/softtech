@extends('layouts.admin')
@section('title', 'किसान खेतबारी बिबरण')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

@endsection
@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">
            <a href="{{route( $_base_route.'.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus fa-sm text-white-50"></i> नयाँ बनाउनुहोस्</a>&nbsp;
        </div>
    </div>
</div>
{{-- <div style="justify-content: center">
    <form class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="नाम" aria-label="Search">
        <input class="form-control mr-sm-2" type="search" placeholder="मोबाइल" aria-label="Search">
        <input class="form-control mr-sm-2" type="search" id="dob" placeholder="जन्म मिति" aria-label="Search">
        <input class="form-control mr-sm-2" type="search" id="email" name="email" placeholder="इमेल" aria-label="Search">
        <button class="btn btn-sm btn-info my-2 my-sm-0" type="submit">खोजनुस</button>
    </form><br>
</div> --}}
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
                                <th>शीर्षक</th>
                                <th>कार्यक्रम मिति</th>
                                <th>कुल क्षमता</th>
                                <th>स्थान</th>
                                <th class="hidden-phone">स्थिति</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($data['rows']) != 0)
                            @foreach( $data['rows'] as $key=> $row)
                            <tr class="gradeX">
                                <td>{{ getUnicodeNumber($key+1) }}. </td>
                                <td>{{ getUnicodeNumber($row->name) }}</td>
                                <td>{{ $row->start_date }}</td>
                                <td>{{ $row->capacity }}</td>
                                <td>{{ $row->location }} </td>

                                <td>

                                    @include('admin.section.buttons.button-edit')
                                    @include('admin.section.buttons.button-view')
                                    @include('admin.section.buttons.button-delete')
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <p>माफ गर्नुहोला ! डाटा फेलापरेन !</p>
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
            url: "",
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
            // url: "",
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
@endsection

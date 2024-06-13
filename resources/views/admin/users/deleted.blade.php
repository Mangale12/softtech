@extends('layouts.admin')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">
            <a href="{{route( $_base_route.'.index' )}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fa fa-arrow-left fa-sm text-white-50"></i> पछाडि फर्कनुहोस्</a>&nbsp;
        </div>
    </div>
</div>
<div class="row">

    <div class="col-sm-12">
        <section class="card">
            <header class="card-header">
                डिलिट प्रयोगकर्ता सुची
                <span class="tools pull-right d-flex">
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="खोजनुस.." aria-label="Search">
                        <button class="btn btn-sm btn-info my-2 my-sm-0" type="submit">खोजनुस</button>
                    </form>
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
                                <th>नाम</th>
                                <th>ई-मेल</th>
                                <th>रोल</th>
                                <th class="hidden-phone">स्थिति</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($data['rows']) != 0)
                            @foreach( $data['rows'] as $key=> $row)
                            <tr class="gradeX">
                                <td>{{ $key+1}}.</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->role}}</td>
                                <td>
                                    @if(Route::has($_base_route.'.restore'))
                                    <button id="restore" data-id="{{ $row->id }}" data-url="{{ URL::route($_base_route.'.restore', ['id'=>$row->id]) }}" type="button" class="btn btn-success btn-xs"><i class="fa fa-reply"></i></button>
                                    @endif

                                    @if(Route::has($_base_route.'.delete'))
                                    <button id="delete" data-id="{{ $row->id }}" data-url="{{ URL::route($_base_route.'.delete', ['id'=>$row->id]) }}" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <p>माफ गर्नुहोला ! डाटा फेलापरेन !</p>
                            @endif
                    </table>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        Showing <strong>{{ $data['rows']->firstItem() }}</strong> to <strong>{{ $data['rows']->lastItem() }} </strong> of <strong> {{$data['rows']->total()}}</strong> entries
                        <span> | Takes <b>{{ round((microtime(true) - LARAVEL_START),2) }}</b> seconds to render</span>
                    </div>
                    {{ $data['rows']->links('vendor.pagination.custom') }}
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        //toggle
        $(function() {
            $('#toggle-two').bootstrapToggle({
                on: 'Activate',
                off: 'DeActivate'
            });
        })
        $('.toggle-class').on('change', function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');
            var url = "{{route($_base_route.'.status')}}";
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: url,
                data: {
                    'status': status,
                    'id': id
                },
                success: function(data) {
                    // location.reload(true);
                },
                error: function(data) {
                    // alert("Ajax calling error !");
                }
            });

        });
    });
</script>
@endsection
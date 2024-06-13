@extends('layouts.user')
@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">
            @if(!empty($data['single']))
            @else
            <a href="{{route( $_base_route.'.create' )}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus fa-sm text-white-50"></i> नयाँ बनाउनुहोस्</a>&nbsp;
            @endif
            <a href="" onclick="refreshPage()" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fa fa-refresh"></i> रिफ्रेश गर्नुहोस्</a>
        </div>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fa fa-trash-o fa-sm text-white-50"></i> रिसाइकलबिन</a>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <section class="card">
            <header class="card-header">
                किसान प्रोफाइल सूची
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
                                <th>Unique ID</th>
                                <th>नाम</th>
                                <th>ई-मेल</th>
                                <th>मोबाइल</th>
                                <th>पेशा</th>
                                <th>ब्लड ग्रुप</th>
                                <th>जन्म मिति</th>
                                <th>फोटा</th>
                                <th class="hidden-phone">स्थिति</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($data['single'])
                            <tr class="gradeX">
                                <td>#</td>
                                <td>{{$data['single']->unique_id}}</td>
                                <td>{{ $data['single']->full_name}}</td>
                                <td>{{$data['single']->email}}</td>
                                <td>{{$data['single']->mobile}}</td>
                                <td>{{ $data['single']->occupation}}</td>
                                <td>{{ $data['single']->blood_group}}</td>
                                <td>{{ $data['single']->dob}}</td>
                                <td>
                                    @if( $data['single']->image)
                                    <img src="{{ asset($data['single']->image) }}" class="img img-responsive" height="50px" width="50px">
                                    @else
                                    फोटा भेटिएन !
                                    @endif
                                </td>
                                <td>
                                    @if(Route::has($_base_route.'.edit'))
                                    <a href="{{ URL::route($_base_route.'.edit', ['unique_id' => $data['single']->unique_id]) }}"><button type="button" data-original-title="Edit" data-toggle="tooltip" class="btn btn-primary btn-sm" style="cursor:pointer;"><i class="fa fa-pencil"></i></button></a>
                                    @endif
                                </td>
                            </tr>
                            @else
                            <p>डाटा फेलापरेन !</p>
                            @endif
                    </table>
                </div>

            </div>
        </section>
    </div>
</div>
@endsection
@section('js')
@endsection
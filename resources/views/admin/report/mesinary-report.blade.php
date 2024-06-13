@extends('layouts.admin')
@section('title', 'मेसिनरी बिबरण')
@section('css')
@endsection
@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">
            <h3> मेसिनरी बिबरण</h3>
        </div>
    </div>
</div>
<div style="justify-content: center">
    <form class="form-inline" action="{{ route($_base_route.'.mesinary_search')}}" method="GET">
        @csrf
        <input class="form-control mr-sm-2" type="search" placeholder="प्रयोजन" name="purpose" aria-label="प्रयोजन">
        <input class="form-control mr-sm-2 "  type="search" placeholder="इकाई" name="ekai" aria-label="इकाई">
        <button class="btn btn-sm btn-info my-2 my-sm-0" type="submit">खोजनुस</button>&nbsp;
        <a class="btn btn-primary btn-sm pull-right" href="{{ route($_base_route.'.mesinary_index')}}">सफा गर्नुहोस्</a>
    </form><br>

</div>
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <section class="card">
            <header class="card-header">
            मेसिनरी बिबरण
                <span class="tools pull-right d-flex">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
                <a href="" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm pull-right">Export सूची</a>
            </header>
            <div class="card-body">
                <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="dynamic-table">
                        <thead>
                            <tr style="background-color: green;color:#fff">
                                <th>क्र.स</th>
                                <th>नाम</th>
                                <th>ठेगाना</th>
                                <th>सस्था स्थापना मिति</th>
                                <th>मेसिनरी/उपकरणको बिबरण </th>
                                <th>क्षमता</th>
                                <th>संख्या</th>
                                <th>खरिद भएको वर्ष</th>
                                <th>खरिद को प्रयोजन</th>
                                <th>बर्तमान अवस्था</th>
                                <th>खरिदमा सहयोग गर्ने सस्थाहरु</th>
                                <th class="hidden-phone">बिबरण पठाउने सस्था</th>
                                <th class="hidden-phone">कैफियत</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($data['rows'])
                            @foreach( $data['rows'] as $key=> $row)
                            <tr class="gradeX">
                                <td>{{ getUnicodeNumber($key+1) }}.</td>
                                <td>{{$row->purpose}}</td>
                                <td>{{ $row->ekai}}</td>
                                <td> {{ $row->tools}}</td>
                                <td>{{ $row->criteria}}</td>
                                <td>
                                    @include('admin.section.buttons.button-mesinary-report')
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <p>माफ गर्नुहोला ! डाटा फेलापरेन !</p>
                            @endif
                    </table>
                </div>
                <div class="row">
                    @include('admin.section.load-time-report')
                    @if(isset($data['rows']))
                    {{ $data['rows']->links('vendor.pagination.custom') }}
                    @endif
                </div>
            </div>
        </section>
    </div>

</div>
@endsection
@section('js')

@endsection
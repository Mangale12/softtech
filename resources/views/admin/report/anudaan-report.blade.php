@extends('layouts.admin')
@section('title', 'अनुदान बिबरण')
@section('css')
@endsection
@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">
            <h3>अनुदान बिबरण</h3>
        </div>
    </div>
</div>
<div style="justify-content: center">
    <form class="form-inline" action="{{ route($_base_route.'.anudaan_search')}}" method="GET">
        @csrf
        <select name="category_id" id="category_id" class="form-control select-two col-md-2">
            <option value=>छान्नुहोस्</option>
            @if(count($data['category']) != 0)
            @foreach($data['category'] as $row)
            <option value="{{ $row->id }}">{{ $row->title }}</option>
            @endforeach
            @endif
        </select>&nbsp;
        <input class="form-control mr-sm-2" type="search" name="title" placeholder="शीर्षक" aria-label="Search">
        <input class="form-control mr-sm-2" type="search" name="amount" placeholder="रकम (रु.)" aria-label="Search">
        <input class="form-control mr-sm-2" type="search" name="bibran" placeholder="बिबरण" aria-label="Search">
        <button class="btn btn-sm btn-info my-2 my-sm-0" type="submit">रिपोट खोज्नुस्</button>&nbsp;
        <a class="btn btn-primary btn-sm pull-right" href="{{ route($_base_route.'.anudaan_index')}}">सफा गर्नुहोस्</a>
    </form><br>

</div>
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <section class="card">
            <header class="card-header">
                अनुदान बिबरण
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
                            <tr>
                                <th>क्र.स</th>
                                <th>प्रकार</th>
                                <th>शीर्षक</th>
                                <th>रकम (रु.)</th>
                                <th>बिबरण</th>
                                <th>पटक</th>
                                <th>मापदण्ड</th>
                                <th class="hidden-phone">रिपोट</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($data['rows'])
                            @foreach( $data['rows'] as $key=> $row)
                            <tr class="gradeX">
                                <td>{{ getUnicodeNumber($key+1) }}.</td>
                                <td>@if(isset($row->AnudaanCategory)) {{ $row->AnudaanCategory->title  }} @endif</td>
                                <td> {{ $row->title}}</td>
                                <td> {{ $row->amount}}</td>
                                <td>{{ $row->bibran}}</td>
                                <td>{{ $row->times}}</td>
                                <td>{{$row->criteria}}</td>
                                <td>
                                    @include('admin.section.buttons.button-anudaan-report')
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
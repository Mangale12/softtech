@extends('layouts.admin')
@section('title', ' भौचर')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endsection
@section('content')
{{-- {{ dd($data) }} --}}
{{-- <div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">
            <a href="{{route( $_base_route.'.create' )}}"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus fa-sm text-white-50"></i> खर्च भौचर</a>&nbsp;
            <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus fa-sm text-white-50"></i> आम्दनी भौचर</a>&nbsp;

        </div>
    </div>
</div> --}}
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <section class="card">
            <header class="card-header">
                <h4>{{ $data['voucher']['voucher_name'] }}</h4>
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
                                <th> क्रम संख्या </th>
                                <th> शीर्षक </th>
                                <th>डेबिट</th>
                                <th>क्रेडिट</th>
                                {{-- <th> भौचर प्रकार </th>
                                <th> खाताको प्रकार </th>
                                <th> भौचर नाम </th> --}}
                                {{-- <th class="hidden-phone">स्थिति</th> --}}
                            </tr>

                        </thead>
                        <tbody>
                            @if(count($data['dr_cr_details']) != 0)
                            @foreach( $data['dr_cr_details'] as $key=> $row)
                            <tr class="gradeX">
                                <td> {{ getUnicodeNumber($key+1) }}. </td>
                                <td>{{ $row->title }}</td>
                                <td>{{ $row->dr <= 0 ? '-' : getUnicodeNumber($row->dr) }}</td>
                                <td>{{ $row->cr <= 0 ? '-' : getUnicodeNumber($row->cr)}}</td>
                                {{-- <td> भौचर नाम </td>
                                <td class="hidden-phone">
                                    @include('admin.section.buttons.button-detail')
                                </td> --}}
                            </tr>
                            @endforeach
                            @else
                            <p>माफ गर्नुहोला ! डाटा फेलापरेन !</p>
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                              <td class="font-weight-bold" colspan="2">total</td>
                              <td class="font-weight-bold">{{ getUnicodeNumber($data['dr_cr_sum']['dr_total']) }}</td>
                              <td class="font-weight-bold">{{ getUnicodeNumber($data['dr_cr_sum']['cr_total']) }}</td>
                            </tr>
                          </tfoot>
                    </table>
                </div>
                <div class="row">

                </div>
            </div>
        </section>
    </div>
</div>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
@endsection

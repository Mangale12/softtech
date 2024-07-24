@extends('layouts.admin')
@section('title', ' भौचर')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endsection
@php
    preg_match('/admin\/udhyog\/([^\/]*)/', request()->path(), $matches);
    $udhyogName = $matches[1] ?? '';
    if($udhyogName == 'aluchips') {
        $udhyogName = "alu chips";
    } elseif ($udhyogName == "hybridbiu") {
        $udhyogName = "hybrid biu";
    }
@endphp
@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">
            <a href="{{route( $_base_route.'.index' )}}?udhyog={{ $udhyogName }}"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm {{ $_panel == 'Fianance' ? 'bg-warning' : '' }} "> भाउचर सूची</a>&nbsp;
            <a href="{{route( $_base_route.'.voucher' )}}?udhyog={{ $udhyogName }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">भौचर</a>&nbsp;
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <section class="card">
            <header class="card-header">
            {{ !empty($data['udhyog_voucher']) ? $data['udhyog_voucher']:'' }} भौचर
                <span class="tools pull-right d-flex">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            <a href="{{route( $_base_route.'.create' )}}"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right"><i class="fa fa-plus fa-sm text-white-50"></i> नयाँ सिर्जना गर्नुहोस्</a>&nbsp;

            </header>
            <div class="card-body">

                <div class="adv-table">
                        <table class="display table table-bordered table-striped" id="dynamic-table">
                            <thead>
                                <tr>
                                    <th> क्रम संख्या </th>
                                    <th> आ वा </th>
                                    <th>मिति</th>
                                    <th> भौचर प्रकार </th>
                                    <th> खाताको प्रकार </th>
                                    <th> भौचर नाम </th>
                                    <th class="hidden-phone">स्थिति</th>
                                </tr>

                            </thead>
                            <tbody>
                                @if(count($data['vouchers']) != 0)
                                @foreach( $data['vouchers'] as $key=> $row)
                                <tr class="gradeX">
                                    {{-- @dd($row->fiscal) --}}
                                    <td> {{ getUnicodeNumber($key+1) }}. </td>
                                    <td> {{ $row->fiscal ? (!empty($row->filscalYear->fiscal_np) ? getUnicodeNumber($row->filscalYear->fiscal_np) : '-') : 'No active type' }} </td>
                                    <td>{{ getUnicodeNumber($row['date']) }}</td>
                                    <td>
                                        {{ $row->voucherType ? $row->voucherType->title : 'No active type' }}
                                    </td>
                                    <td> {{ $row->lekhaShirsak ? $row->lekhaShirsak->title : 'No active type' }} </td>
                                    <td>{{ $row->voucher_name ? $row->voucher_name : 'No active type' }}
                                    </td>
                                    <td class="hidden-phone">
                                    <a href="{{ URL::route($_base_route.'.view_report', ['id' => $row->id]) }}"><button type="button" data-original-title="Reports"  onclick="report(this)" data-toggle="tooltip" class="btn btn-info btn-xs" style="cursor:pointer;"><i class="fa fa-file"></i>&nbsp;रिपोर्ट हेर्नुस्</button></a>
                                    {{-- <button id="delete" data-id="{{ $row->id }}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete" data-url="{{ URL::route('admin.voucher.destroy', ['id' => $row->id]) }}" style="cursor:pointer;"><i class="fa fa-trash-o "></i></button> --}}
                                        {{-- @include('admin.section.buttons.button-delete') --}}
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <p>माफ गर्नुहोला ! डाटा फेलापरेन !</p>
                                @endif
                            </tbody>
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

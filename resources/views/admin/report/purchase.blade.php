@extends('layouts.admin')
@section('title', 'खरिद बिबरण')
@section('css')
@endsection
@section('content')
<style>
    .dot_red {
        height: 25px;
        width: 25px;
        background-color: #ee0e0e;
        border-radius: 50%;
        display: inline-block;
    }
    .dot_green {
        height: 25px;
        width: 25px;
        background-color: #7ef410;
        border-radius: 50%;
        display: inline-block;
    }
    .dot_yellow {
        height: 25px;
        width: 25px;
        background-color: #f3fb08;
        border-radius: 50%;
        display: inline-block;
    }
</style>
<link href="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/css/nepali.datepicker.v3.7.min.css')}}" rel="stylesheet" />

<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">
            <h3> खरिद बिबरण</h3>
        </div>
    </div>
</div>
<div style="justify-content: center">
    <form class="form-inline" action="{{ route($_base_route.'.purchase')}}" method="GET">
        <div class="row mr-1">
            <div class="mb-3 col-2">
                <label for="" class="form-label">उद्योग</label>
                <select class="form-control" name="udhyog" id="udhyog">
                    <option selected disabled>उद्योग छान्नुहोस्</option>
                    @foreach ($data['udhyog'] as $row)
                    <option value="{{ $row->id }}" {{ request()->udhyog == $row->id ? 'selected' : '' }}>{{ $row->name }}</option>
                    @endforeach
                </select>
                {{-- <small id="helpId" class="text-muted">Help text</small> --}}
            </div>
            <div class="mb-3 col-2">
                <label for="" class="form-label">सुरू मिति</label>
                <input type="text" name="start_date" id="start_date" class="form-control" value="{{ request()->start_date }}" aria-describedby="helpId" placeholder="YYYY/MM/DD" readonly/>
                {{-- <small id="helpId" class="text-muted">Help text</small> --}}
            </div>
            <div class="mb-3 col-2 mx-5">
                <label for="" class="form-label">अन्त्य मिति</label>
                <input type="text" name="end_date" id="end_date" class="form-control" value="{{ request()->end_date }}" aria-describedby="helpId" placeholder="YYYY/MM/DD" readonly/>
                {{-- <small id="helpId" class="text-muted">Help text</small> --}}
            </div>
            <div class="mb-3 col-2">
                <label for="" class="form-label">भुक्तानी स्थिति</label>
                <select class="form-control" name="payment_status" id="udhyog">
                    <option selected disabled>भुक्तानी स्थिति छान्नुहोस्</option>
                    <option value="paid" {{ request()->payment_status == 'paid' ? 'selected' : '' }}>पूरा भुक्तानी</option>
                    <option value="remaining" {{ request()->payment_status == 'remaining' ? 'selected' : '' }}>अपूर्ण भुक्तानी</option>
                </select>
                {{-- <small id="helpId" class="text-muted">Help text</small> --}}
            </div>
            <div class="mb-3 col-3">
                <button class="btn btn-sm btn-info" type="submit">खोजनुस</button>&nbsp;
                <a class="btn btn-primary btn-sm " href="{{ route($_base_route.'.purchase')}}">सफा गर्नुहोस्</a>
            </div>

        </div>
    </form>
    <br>

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

                    @if(!empty($data['purchase']) && count($data['purchase']) > 0)
                    <table class="display table table-bordered table-striped" id="dynamic-table">
                        <thead>
                            <tr style="background-color: green;color:#fff">
                                <th>क्र.स</th>
                                <th>मिति</th>
                                <th>आपूर्तिकर्ता</th>
                                <th>कूल जम्मा</th>
                                <th>भुक्तानी</th>
                                <th>बाँकी </th>
                                <th>भुक्तानी स्थिति</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['purchase'] as $key=>$item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->transaction_date }}</td>
                                <td>{{ $item->supplier_id != null ? $item->supplier->name : '' }}</td>
                                <td>{{ $item->total_amount }}</td>
                                <td>{{ $item->paid_amount }}</td>
                                <td>{{ $item->remaining_amount }}</td>
                                <td>
                                    @php
                                        $paidPercentage = $item->total_amount > 0 ? ($item->paid_amount / $item->total_amount) * 100 : 0;
                                        $dotClass = '';

                                        if ($paidPercentage < 20) {
                                            $dotClass = 'dot_red';
                                        } elseif ($paidPercentage < 60) {
                                            $dotClass = 'dot_yellow';
                                        } elseif ($paidPercentage >= 100) {
                                            $dotClass = 'dot_green';
                                        }
                                    @endphp
                                    <span class="{{ $dotClass }}"></span>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    @endif

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
<script src="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/js/nepali.datepicker.v3.7.min.js')}}" type="text/javascript"></script>
<script>
    $('#start_date, #end_date').nepaliDatePicker({
            dateFormat: 'YYYY/MM/DD',
            closeOnDateSelect: true
        });
</script>

@endsection

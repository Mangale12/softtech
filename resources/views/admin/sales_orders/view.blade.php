@extends('layouts.admin')
@section('title', 'सप्लायर्स')
{{-- {{ dd($report[0]->total_quantity_used) }} --}}
@section('content')
<link href="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/css/nepali.datepicker.v3.7.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<div class="row">
    <div class="col-lg-8">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">सप्लायर्स</a></li>
                <li class="breadcrumb-item"><a href="#">उत्पादन</a></li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-10">
        {{-- {{ dd($_base_route) }} --}}
            <section class="card">
                <header class="card-header">
                    उत्पादन ब्याच
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <table class="table table-bordered" id="dynamicTable">
                            <tr>
                                <th>डिलरको/व्यक्तिको नाम</th>
                                <th>बिक्री मिति</th>

                                {{-- <th> म्याद समाप्ति </th>
                                <th>उत्पादन भएको मात्रा</th> --}}

                            </tr>
                            <tr>
                                <td >
                                    {{ $data['sales_order']->dealer->name }}
                                </td>
                                <td >
                                    {{ $data['sales_order']->order_date }}
                                </td>
                            </tr>
                        </table>
                        <table class="table table-bordered" id="dynamicTable">
                            <thead>
                                <tr>
                                    <th>उत्पादनको नाम</th>
                                    <th>ब्याच नं</th>
                                    <th>एकाइ</th>
                                    <th>मात्रा</th>
                                    <th>इकाई मूल्य</th>
                                    <th>जम्मा</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['sales_order']->items as $item)
                                <tr>
                                    <td>{{ $item->product->name }} <small class="text-danger">{{ $item->khadhyanna_id != null ? '(खाद्यान्न)' : '' }}</small></td>
                                    <td>
                                        @if($item->production_batch_id != null)
                                            {{ $item->productionBatch->batch_no }}
                                        @elseif($item->seed_batch_id != null)
                                            {{ $item->seedBatch->batch_no }}
                                        @elseif($item->khadhyanna_id != null)
                                            {{ $item->khadhyanna->seedBatch->batch_no }}
                                        @else
                                            <!-- Default value if all conditions are false -->
                                            N/A
                                        @endif
                                    </td>
                                    <td >{{ $item->unit->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->unit_price }}</td>
                                    <td>{{ $item->total_cost }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <th colspan="5">कुल</th>
                                <th>{{ $data['sales_order']->total_amount }}</th>
                            </tfoot>

                        </table>
                    </div>
                </div>
            </section>
    </div>
</div>
@endsection
@section('js')

@endsection

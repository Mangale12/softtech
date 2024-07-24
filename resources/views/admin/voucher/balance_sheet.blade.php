@extends('layouts.admin')
@section('title', 'ब्यालेन्स पाना')
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
    // dd($data);
@endphp
@section('content')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">
            <a href="{{route( $_base_route.'.index' )}}?udhyog={{ $udhyogName }}"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm " > भाउचर सूची</a>&nbsp;
            <a href="{{route( $_base_route.'.voucher' )}}?udhyog={{ $udhyogName }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm {{ $_panel == 'Voucher' ? 'bg-warning' : '' }}">भौचर</a>&nbsp;
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-sm-12">
        {{-- <section class="card">
            <header class="card-header">
            {{ !empty($data['udhyog_voucher']) ? $data['udhyog_voucher']:'' }} ब्यालेन्स पाना
                <span class="tools pull-right d-flex">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            <a href="{{route( $_base_route.'.create' )}}"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right"><i class="fa fa-plus fa-sm text-white-50"></i> नयाँ सिर्जना गर्नुहोस्</a>&nbsp;
            <form action="{{route( $_base_route.'.voucher' )}}" class="mt-5">
                <div class="row">
                    <input type="hidden" name="udhyog" value="{{ $udhyogName }}">
                    <div class="col-sm-4">
                        <label for="udhyog_id">भौचर विवरण</label>
                        <select id="fiscal" name="fiscal" class="form-control">
                            <option value="">सेवा छान्नुहोस्</option>


                        </select>
                    </div>
                    <div class="col-sm-4 mt-4">

                        <button class="btn btn-primary">Submit</button>
                    </div>
            </form>
            </header>

            <div class="card-body">
                <h4 class="text-center mb-3">नमुना एकिकृत सहकारी खेती वीउ उत्पादन समुह</h4>
                <h6 class="text-center mb-5">आम्दानी / खर्च बिवरण २०७८/०७९</h6>
                <div class="adv-table">

                    <div class="row">
                        <table class="display table table-bordered table-striped col-6" id="kharcha-table">
                            <thead>
                                <tr>
                                    <th colspan="3">सम्पत्ति</th>
                                </tr>
                                <tr>
                                    <th>क्रम संख्या</th>
                                    <th>शीर्षक</th>
                                    <th>रकम</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $maxRows = max(count($data['assets']), count($data['liabilities']));
                                @endphp
                                @for ($i = 0; $i < $maxRows; $i++)
                                    <tr class="gradeX">
                                        <td>{{ getUnicodeNumber($i + 1) }}.</td>
                                        <td>
                                            @if (isset($data['assets'][$i]))
                                                {{ $data['assets'][$i]->voucher_type != null ? $data['assets'][$i]->financeTitle->name : '' }}
                                            @endif
                                        </td>
                                        <td>
                                            @if (isset($data['assets'][$i]))
                                                {{ $data['assets'][$i]->dr }}
                                            @endif
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                            <tfoot>
                                <td colspan="2" align="right" class="fw-bold" style="font-weight: bold">जम्मा</td>
                                <th>{{ $data['assets_sum'] }}</th>
                            </tfoot>
                        </table>

                        <table class="display table table-bordered table-striped col-6" id="amdani-table">
                            <thead>
                                <tr>
                                    <th colspan="3">दायित्व</th>
                                </tr>
                                <tr>
                                    <th>क्रम संख्या</th>
                                    <th>शीर्षक</th>
                                    <th>रकम</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < $maxRows; $i++)
                                    <tr class="gradeX">
                                        <td>{{ getUnicodeNumber($i + 1) }}.</td>
                                        <td>
                                            @if (isset($data['liabilities'][$i]))
                                                {{ $data['liabilities'][$i]->voucher_type != null ? $data['liabilities'][$i]->financeTitle->name : '' }}
                                            @endif
                                        </td>
                                        <td>
                                            @if (isset($data['liabilities'][$i]))
                                                {{ $data['liabilities'][$i]->dr }}
                                            @endif
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                            <tfoot>
                                <td colspan="2" align="right" class="fw-bold" style="font-weight: bold">जम्मा</td>
                                <th>{{ $data['liabilities_sum'] }}</th>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>



            <div class="card-footer">
                <a href="{{ route($_base_route.'.voucher') }}?udhyog={{ request()->udhyog }}" class="btn btn-default float-right">पुन: लोड गर्नुहोस्</a>
            </div>
        </section> --}}

        {{-- <div class="card-body">
            <h4 class="text-center mb-3">नमुना एकिकृत सहकारी खेती वीउ उत्पादन समुह</h4>
            <h6 class="text-center mb-5">आम्दानी / खर्च बिवरण २०७८/०७९</h6>
            <div class="adv-table">
                <div class="row">
                    <table class="display table table-bordered table-striped col-6" id="assets-table">
                        <thead>
                            <tr>
                                <th colspan="3">सम्पत्ति</th>
                            </tr>
                            <tr>
                                <th>क्रम संख्या</th>
                                <th>शीर्षक</th>
                                <th>रकम</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['node_hierarchy']['asset'] ?? [] as $hierarchy)
                                @foreach ($hierarchy as $index => $node)
                                    <tr class="gradeX">
                                        <td>{{ getUnicodeNumber($index + 1) }}.</td>
                                        <td>{{ $node->name }}</td>
                                        <td>
                                            @if ($node->isLeaf())
                                                {{ $node->dr }}

                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                        <tfoot>
                            <td colspan="2" align="right" class="fw-bold" style="font-weight: bold">जम्मा</td>
                            <th>{{ $data['assets_sum'] }}</th>
                        </tfoot>
                    </table>

                    <table class="display table table-bordered table-striped col-6" id="liabilities-table">
                        <thead>
                            <tr>
                                <th colspan="3">दायित्व</th>
                            </tr>
                            <tr>
                                <th>क्रम संख्या</th>
                                <th>शीर्षक</th>
                                <th>रकम</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['node_hierarchy']['liabilities'] ?? [] as $hierarchy)
                                @foreach ($hierarchy as $index => $node)
                                    <tr class="gradeX">
                                        <td>{{ getUnicodeNumber($index + 1) }}.</td>
                                        <td>{{ $node->name }}</td>
                                        <td>
                                            @if ($node->isLeaf())
                                                {{ $node->dr }}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                        <tfoot>
                            <td colspan="2" align="right" class="fw-bold" style="font-weight: bold">जम्मा</td>
                            <th>{{ $data['liabilities_sum'] }}</th>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div> --}}


        {{-- <div class="card-body">
            <h4 class="text-center mb-3">नमुना एकिकृत सहकारी खेती वीउ उत्पादन समुह</h4>
            <h6 class="text-center mb-5">आम्दानी / खर्च बिवरण २०७८/०७९</h6>
            <div class="adv-table">
                <div class="row">
                    <table class="display table table-bordered table-striped col-6" id="assets-table">
                        <thead>
                            <tr>
                                <th colspan="3">सम्पत्ति</th>
                            </tr>
                            <tr>
                                <th>क्रम संख्या</th>
                                <th>शीर्षक</th>
                                <th>रकम</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['node_hierarchy']['asset'] ?? [] as $item)
                                @foreach ($item['hierarchy'] as $index => $node)
                                    <tr class="gradeX">
                                        <td>{{ getUnicodeNumber($index + 1) }}.</td>
                                        <td>{{ $node->name }}</td>
                                        <td>
                                            @if ($loop->last)
                                                {{ $item['voucher']->dr }}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                        <tfoot>
                            <td colspan="2" align="right" class="fw-bold" style="font-weight: bold">जम्मा</td>
                            <th>{{ $data['assets_sum'] }}</th>
                        </tfoot>
                    </table>

                    <table class="display table table-bordered table-striped col-6" id="liabilities-table">
                        <thead>
                            <tr>
                                <th colspan="3">दायित्व</th>
                            </tr>
                            <tr>
                                <th>क्रम संख्या</th>
                                <th>शीर्षक</th>
                                <th>रकम</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['node_hierarchy']['liabilities'] ?? [] as $item)
                                @foreach ($item['hierarchy'] as $index => $node)
                                    <tr class="gradeX">
                                        <td>{{ getUnicodeNumber($index + 1) }}.</td>
                                        <td>{{ $node->name }}</td>
                                        <td>
                                            @if ($loop->last)
                                                {{ $item['voucher']->dr }}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                        <tfoot>
                            <td colspan="2" align="right" class="fw-bold" style="font-weight: bold">जम्मा</td>
                            <th>{{ $data['liabilities_sum'] }}</th>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div> --}}


        {{-- <div class="card-body">
            <h4 class="text-center mb-3">नमुना एकिकृत सहकारी खेती वीउ उत्पादन समुह</h4>
            <h6 class="text-center mb-5">आम्दानी / खर्च बिवरण २०७८/०७९</h6>
            <div class="adv-table">
                <div class="row">
                    <table class="display table table-bordered table-striped col-6" id="assets-table">
                        <thead>
                            <tr>
                                <th colspan="3">सम्पत्ति</th>
                            </tr>
                            <tr>
                                <th>क्रम संख्या</th>
                                <th>शीर्षक</th>
                                <th>रकम</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['node_hierarchy']['asset'] ?? [] as $item)
                                @foreach ($item['hierarchy'] as $index => $node)
                                    <tr class="gradeX">
                                        <td>{{ getUnicodeNumber($index + 1) }}.</td>
                                        <td>{{ $node->name }}</td>
                                        <td>
                                            @if ($loop->last)
                                                {{ $item['total_dr'] }}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                        <tfoot>
                            <td colspan="2" align="right" class="fw-bold" style="font-weight: bold">जम्मा</td>
                            <th>{{ $data['assets_sum'] }}</th>
                        </tfoot>
                    </table>

                    <table class="display table table-bordered table-striped col-6" id="liabilities-table">
                        <thead>
                            <tr>
                                <th colspan="3">दायित्व</th>
                            </tr>
                            <tr>
                                <th>क्रम संख्या</th>
                                <th>शीर्षक</th>
                                <th>रकम</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['node_hierarchy']['liabilities'] ?? [] as $item)
                                @foreach ($item['hierarchy'] as $index => $node)
                                    <tr class="gradeX">
                                        <td>{{ getUnicodeNumber($index + 1) }}.</td>
                                        <td>{{ $node->name }}</td>
                                        <td>
                                            @if ($loop->last)
                                                {{ $item['total_dr'] }}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                        <tfoot>
                            <td colspan="2" align="right" class="fw-bold" style="font-weight: bold">जम्मा</td>
                            <th>{{ $data['liabilities_sum'] }}</th>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div> --}}


        {{-- <div class="card-body">
            <h4 class="text-center mb-3">नमुना एकिकृत सहकारी खेती वीउ उत्पादन समुह</h4>
            <h6 class="text-center mb-5">आम्दानी / खर्च बिवरण २०७८/०७९</h6>
            <div class="adv-table">
                <div class="row">
                    @foreach($data['node_hierarchy'] as $type => $hierarchies)
                        <table class="display table table-bordered table-striped col-6">
                            <thead>
                                <tr>
                                    <th colspan="3">{{ ucfirst($type) }}</th>
                                </tr>
                                <tr>
                                    <th>क्रम संख्या</th>
                                    <th>शीर्षक</th>
                                    <th>रकम</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($hierarchies as $item)
                                    @php
                                        $level = $item['hierarchy']->count();
                                    @endphp
                                    @foreach($item['hierarchy'] as $node)
                                        <tr class="gradeX">
                                            <td>{{ getUnicodeNumber($loop->index + 1) }}.</td>
                                            <td style="padding-left: {{ $level * 20 }}px;">
                                                {{ $node->name }}
                                            </td>
                                            <td>
                                                @if($loop->last)
                                                    {{ $item['total_dr'] }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2" align="right" class="fw-bold">जम्मा</td>
                                    <th>
                                        {{ $hierarchies->sum('total_dr') }}
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    @endforeach
                </div>
            </div>
        </div> --}}



        {{-- <div class="card-body">
            <h4 class="text-center mb-3">नमुना एकिकृत सहकारी खेती वीउ उत्पादन समुह</h4>
            <h6 class="text-center mb-5">आम्दानी / खर्च बिवरण २०७८/०७९</h6>
            <div class="adv-table">
                <div class="row">
                    @foreach($data['node_hierarchy'] as $type => $hierarchies)
                        <table class="display table table-bordered table-striped col-6">
                            <thead>
                                <tr>
                                    <th colspan="3">{{ ucfirst($type) }}</th>
                                </tr>
                                <tr>
                                    <th>क्रम संख्या</th>
                                    <th>शीर्षक</th>
                                    <th>रकम</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $displayedParents = [];
                                @endphp
                                @foreach($hierarchies as $item)
                                    @php
                                        $hierarchy = $item['hierarchy'];
                                        $parentIds = $hierarchy->pluck('id')->toArray();
                                    @endphp

                                    @foreach($hierarchy as $node)
                                        @if(!in_array($node->id, $displayedParents))
                                            <tr class="gradeX">
                                                <td>{{ getUnicodeNumber($loop->index + 1) }}.</td>
                                                <td style="padding-left: {{ ($loop->index) * 20 }}px;">
                                                    {{ $node->name }}
                                                </td>
                                                <td>
                                                    @if($loop->last)
                                                        {{ $item['total_dr'] }}
                                                    @endif
                                                </td>
                                            </tr>
                                            @php
                                                $displayedParents[] = $node->id;
                                            @endphp
                                        @endif
                                    @endforeach
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2" align="right" class="fw-bold">जम्मा</td>
                                    <th>
                                        {{ $hierarchies->sum('total_dr') }}
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    @endforeach
                </div>
            </div>
        </div> --}}

        {{-- right code start  --}}
        {{-- <div class="card-body">
            <h4 class="text-center mb-3">नमुना एकिकृत सहकारी खेती वीउ उत्पादन समुह</h4>
            <h6 class="text-center mb-5">आम्दानी / खर्च बिवरण २०७८/०७९</h6>
            <div class="adv-table">
                <div class="row">
                    @foreach($data['node_hierarchy'] as $type => $hierarchies)
                        <table class="display table table-bordered table-striped col-6">
                            <thead>

                                <tr>
                                    <th colspan="3">{{ ucfirst($type) }}</th>
                                </tr>
                                <tr>
                                    <th>क्रम संख्या</th>
                                    <th>शीर्षक</th>
                                    <th>रकम</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalSum = 0;
                                    $displayedNodes = [];
                                @endphp
                                @foreach($hierarchies as $parentId => $item)
                                    @php
                                        $hierarchy = $item['hierarchy'];
                                        $totalDr = $item['total_dr'];
                                        $totalSum += $totalDr;
                                    @endphp

                                    @foreach($hierarchy as $node)
                                        @if(!in_array($node->id, $displayedNodes))
                                            <tr>
                                                <td>{{ getUnicodeNumber($loop->index + 1) }}.</td>
                                                <td style="padding-left: {{ ($loop->index) * 20 }}px;">
                                                    {{ $node->name }}
                                                </td>
                                                <td></td>
                                            </tr>
                                            @php
                                                $displayedNodes[] = $node->id;
                                            @endphp
                                        @endif
                                    @endforeach

                                    @foreach($item['leaf_nodes'] as $leafNodeItem)
                                        <tr>
                                            <td></td>
                                            <td style="padding-left: {{ count($hierarchy) * 20 }}px;">
                                                {{ $leafNodeItem['hierarchy']->last()->name }}
                                            </td>
                                            <td>{{ $leafNodeItem['total_dr'] }}</td>
                                        </tr>
                                    @endforeach

                                    <!-- Display total for the parent node -->
                                    <tr>
                                        <td></td>
                                        <td align="right" class="fw-bold">कुल</td>
                                        <td class="fw-bold">{{ $totalDr }}</td>
                                    </tr>
                                @endforeach

                                <!-- Display total for the current type -->
                                @if(count($hierarchies) > 0)
                                    <tr>
                                        <td colspan="2" align="right" class="fw-bold">कुल</td>
                                        <td class="fw-bold">{{ $totalSum }}</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    @endforeach
                </div>
            </div>
        </div> --}}

        {{-- right code end --}}




        <div class="card-body">
            <h4 class="text-center mb-3">नमुना एकिकृत सहकारी खेती वीउ उत्पादन समुह</h4>
            <h6 class="text-center mb-5">आम्दानी / खर्च बिवरण २०७८/०७९</h6>
            <div class="adv-table">
                <div class="row">
                    @foreach($data['node_hierarchy'] as $type => $hierarchies)
                        <table class="display table table-bordered table-striped col-6">
                            <thead>
                                <tr>
                                    <th colspan="4">{{ ucfirst($type) }}</th>
                                </tr>
                                <tr>
                                    <th>क्रम संख्या</th>
                                    <th>शीर्षक</th>
                                    <th>रकम</th>
                                    <th>उप-योग</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalSum = 0;
                                    $displayedNodes = [];
                                @endphp
                                @foreach($hierarchies as $parentId => $item)
                                    @php
                                        $hierarchy = $item['hierarchy'];
                                        $totalDr = $item['total_dr'];
                                        $totalSum += $totalDr;
                                    @endphp

                                    @foreach($hierarchy as $node)
                                        @if(!in_array($node->id, $displayedNodes))
                                            <tr>
                                                <td>{{ getUnicodeNumber($loop->index + 1) }}.</td>
                                                <td style="padding-left: {{ ($loop->index) * 20 }}px;">
                                                    {{ $node->name }}
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            @php
                                                $displayedNodes[] = $node->id;
                                            @endphp
                                        @endif
                                    @endforeach

                                    @foreach($item['leaf_nodes'] as $leafNodeItem)
                                        <tr>
                                            <td></td>
                                            <td style="padding-left: {{ count($hierarchy) * 20 }}px;">
                                                {{ $leafNodeItem['hierarchy']->last()->name }}
                                            </td>
                                            <td>{{ $leafNodeItem['total_dr'] }}</td>
                                            <td></td>
                                        </tr>
                                    @endforeach

                                    <!-- Display total for the parent node -->
                                    <tr>
                                        <td></td>
                                        {{-- <td align="right" class="fw-bold">कुल</td>
                                        <td class="fw-bold">{{ $totalDr }}</td> --}}
                                        <td class="fw-bold" colspan="3" align="right">{{ $totalDr }}</td>
                                    </tr>
                                @endforeach

                                <!-- Display total for the current type -->
                                @if(count($hierarchies) > 0)
                                    <tr>
                                        <td colspan="3" align="right" class="fw-bold">कुल</td>
                                        <td class="fw-bold">{{ $totalSum }}</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    @endforeach
                </div>
            </div>
        </div>






    </div>
</div>

{{-- test liailities start here  --}}
{{-- <h1>Balance Sheet</h1>

<h2>Assets</h2>
<ul>
    @foreach ($data['node_hierarchy'] as $hierarchy)
        @if ($hierarchy->first()->type == 'asset')
            @include('admin.voucher.node', ['nodes' => $hierarchy])
        @endif
    @endforeach
</ul>
<p>Total Assets: {{ $assets_sum ?? '' }}</p>

<h2>Liabilities</h2>
<ul>
    @foreach ($data['node_hierarchy'] as $hierarchy)
        @if ($hierarchy->first()->type == 'liabilities')
            @include('admin.voucher.node', ['nodes' => $hierarchy])
        @endif
    @endforeach
</ul>
<p>Total Liabilities: {{ $data['assets_sum'] ?? '' }}</p>

<h2>Asset Details</h2>
<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Amount (DR)</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data['assets'] as $asset)
        <tr>
            <td>{{ $asset->title }}</td>
            <td>{{ $asset->dr }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h2>Liabilities Details</h2>
<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Amount (DR)</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data['liabilities'] as $liability)
        <tr>
            <td>{{ $liability->title }}</td>
            <td>{{ $liability->dr }}</td>
        </tr>
        @endforeach
    </tbody>
</table> --}}
{{-- test liailities end here  --}}
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
@endsection

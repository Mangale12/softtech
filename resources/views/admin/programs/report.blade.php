@extends('layouts.admin')
@section('title', 'फार्म विवरण')
@section('css')
<link href="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/css/nepali.datepicker.v3.7.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endsection
@section('content')
{{-- {{ dd($data) }} --}}
<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <h6><a href="#"><i class="fa fa-home"></i> होम /</a></h6>
                </li>&nbsp;
                <h6><a href="#">फार्म बिबरण</a> &nbsp;/&nbsp;विवरण</h6>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header" style="font-weight: bold;">
                {{ $data['row']['start_date'] }} देखि {{ $data['row']['end_date'] }} सम्मको बिबरण
            </header>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>आर्थिक वर्ष</th>
                            <th>ब्लक</th>
                            <th>बाली प्रकार</th>
                            <th>बाली किसिम</th>
                            <th>महिना देखि</th>
                            <th>सम्म</th>
                            {{-- <th>सम्पादन</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ getUnicodeNumber($data['row']->fiscal_year != null ? $data['row']->getFiscalYear->fiscal_np : '') }}</td>
                            {{-- <td>{{ getUnicodeNumber($data['row']->fiscal_year) }}</td> --}}
                            <td>{{ $data['row']->block_id != null ? $data['row']->getBlockId->name : '' }}</td>
                            <td>{{ $data['row']->baali_cat != null ? $data['row']->baaliCategory->title : '' }}</td>
                            <td>{{ $data['row']->baali != null ? $data['row']->baaliName->title : '' }}</td>
                            <td> {{ $data['row']->start_month_id != null ? $data['row']->startMonth->month_np : '' }}</td>
                            <td>{{ $data['row']->end_month_id != null ? $data['row']->endMonth->month_np : '' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        {{-- <section class="card">
            <header class="card-header" style="font-weight: bold;">
                पशुपन्छी बिबरण
            </header>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>पशुपन्छी प्रकार</th>
                            <th>नाम</th>
                            <th>यूनिट</th>
                            <th>मूल्य</th>
                            <th>संख्या</th>
                            <th>कुल रकम</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($data['animal_details'])>0)


                        @foreach ($data['animal_details'] as $key=>$animal)
                        <tr>
                            <td>{{ $animal['animal_type'] ?? 'उपलब्ध छैन'  }}.</td>
                            <td>{{ $animal['animal_name'] ?? 'उपलब्ध छैन' }}</td>
                            <td>{{ $animal['animal_unit'] ?? 'उपलब्ध छैन' }}</td>
                            <td>{{ $animal['animal_unit_price'] ?? 'उपलब्ध छैन' }}</td>
                            <td> {{ $animal['animal_quantity'] ?? 'उपलब्ध छैन' }}</td>
                            <td>{{ $animal['animal_total_cost'] ?? 'उपलब्ध छैन' }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </section> --}}
        <section class="card px-5 text-center">
            <h2>खर्च विवरण </h2>
        </section>
        <section class="card">
            <header class="card-header" style="font-weight: bold;">
                औजारहरू बिबरण
            </header>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            {{-- <th>पशुपन्छी प्रकार</th> --}}
                            <th>नाम</th>
                            <th>यूनिट</th>
                            <th>मूल्य</th>
                            <th>संख्या</th>
                            <th>कुल रकम</th>
                            <th>सम्पादन</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- {{ dd($data['animal_details']) }} --}}
                        @if(count($data['mesinary_details'])>0)
                        {{-- @dd($data['mesinary_details']) --}}
                        @foreach ($data['mesinary_details'] as $key=>$mesinary)
                        {{-- {{ dd($mesinary) }} --}}
                        <tr>
                            <td>{{ $mesinary['mesinary_name'] ?? 'उपलब्ध छैन'  }}.</td>
                            <td>{{ $mesinary['mesinery_unit'] ?? 'उपलब्ध छैन' }}</td>
                            <td>{{ $mesinary['mesinary_amount'] ?? 'उपलब्ध छैन' }}</td>
                            <td>{{ $mesinary['mesinary_quantity'] ?? 'उपलब्ध छैन' }}</td>
                            <td> {{ $mesinary['mesinary_total_cost'] ?? 'उपलब्ध छैन' }}</td>
                            <td><button data-id="{{ $mesinary['id'] }}" class="delete-mesinary"><i class="fa fa-trash-o text-danger"></i></button></td>
                        </tr>
                        @endforeach
                        @endif

                        <tr class="newtrans prod-multyfield">
                            <form action="{{ route('admin.farm.add_mesinary', $data['row']->id) }}" method="POST">
                                @csrf
                            <td style="width:15rem">
                                <select name="mesinary_name" id="mesinary_1" class="form-control select-two">
                                    <option value=>छान्नुहोस्</option>
                                    @if(count($data['mesinary']) != 0)
                                    @foreach($data['mesinary'] as $row)
                                    <option value="{{ $row->tools }}">{{ $row->tools }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </td>
                            <td style="width:20rem">
                                <select name="mesinery_unit" id="unit_5" class="form-control select-two">
                                    <option value=>छान्नुहोस्</option>
                                    @if(count($data['unit']) != 0)
                                    @foreach($data['unit'] as $row)
                                    <option value="{{ $row->name }}">{{ $row->name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </td>
                            <td style="width:20rem"><input type="text" class="form-control rounded amount" name="mesinary_amount" id="mesinary_2" placeholder="मूल्य" value="" onchange="sum(this)"></td>
                            <td style="width:20rem"><input type="text" class="form-control rounded expenditure" name="mesinary_quantity" id="mesinary_3" placeholder="संख्या" value="" onchange="sum(this)"></td>
                            <td style="width:20rem"><input type="text" class="form-control rounded tamount" name="mesinary_total_cost" id="mesinary_4" readonly placeholder=" कुल रकम" value=""></td>
                            {{-- <td style="width:30rem"><input type="text" name="mesinary_5" value="" id="mesinary_details" placeholder="टिप्पणी" class="form-control" /></td> --}}
                            <td style="width:13em"><button type="submit" class="btn btn-sm btn-info js-pr1-row-add add-new-mesinary"> नयाँ</button>
                                {{-- <button type="button" class="btn btn-danger btn-sm remove-tr js-pr1-row-delete">डिलिट</button> --}}
                            </td>
                        </form>
                        </tr>
                    </tbody>
                    <tfoot>
                        <td align="right" colspan="4" class="font-weight-bold">औचारमा भएको जम्मा खर्च </td>
                        <td class="font-weight-bold">{{ getUnicodeNumber($data['row']['total_mesinary_amount'] ?? 0) }}</td>
                    </tfoot>
                </table>
            </div>
        </section>
        <section class="card">
            <header class="card-header" style="font-weight: bold;">
                कामदारको विवरण
            </header>
            <div class="card-body">
                <table class="table worker-bibaran">
                    <thead>
                        <tr>
                            {{-- <th>पशुपन्छी प्रकार</th> --}}
                            <th>नाम</th>
                            <th>काम गरेको दिन	</th>
                            <th>काम गरेको घण्टा	</th>
                            <th>ज्याला प्रति घण्टा</th>
                            <th>कुल रकम</th>
                            {{-- <th>सम्पादन</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($data['worker_details'])>0)
                        @foreach ($data['worker_details'] as $key=>$worker)
                        <tr>
                            <td>{{ $worker['worker_name'] ?? 'उपलब्ध छैन'  }}.</td>
                            <td>{{ $worker['worked_day'] ?? 'उपलब्ध छैन' }}</td>
                            <td>{{ $worker['worked_hour'] ?? 'उपलब्ध छैन' }}</td>
                            <td>{{ $worker['wages_per_hour'] ?? 'उपलब्ध छैन' }}</td>
                            <td> {{ $worker['total_wages'] ?? 'उपलब्ध छैन' }}</td>
                            <td><button data-id="{{ $worker['id'] }}" class="delete-worker"><i class="fa fa-trash-o text-danger"></i></button></td>

                            {{-- <td>{{ $mesinary['animal_total_cost'] ?? 'उपलब्ध छैन' }}</td> --}}
                        </tr>
                        @endforeach
                        @endif
                        <tr class="newtrans prod-multyfield">
                            <form action="{{ route('admin.farm.add_worker', $data['row']->id) }}" method="POST">
                                @csrf
                                <td style="width:15rem">
                                    <select name="worker_name" id="mal_bibran_1" class="form-control">
                                        <option value=>छान्नुहोस्</option>
                                        @if(count($data['worker']) != 0)
                                        {{-- {{ dd($data['worker']) }} --}}
                                        @foreach($data['worker'] as $row)
                                        <option value="{{ $row->full_name }}">{{ $row->full_name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </td>

                                <td style="width:20rem">
                                    <input type="number" class="form-control rounded amount worked-day" name="worked_day" id="mal_bibran_2" placeholder="मूल्य">
                                </td>
                                <td style="width:20rem">
                                    <input type="number" class="form-control rounded expenditure worked-hour" name="worked_hour" id="mal_bibran_3" placeholder="संख्या" >
                                </td>
                                <td style="width:20rem">
                                    <input type="text" class="form-control rounded tamount wages-per-hour" name="wages_per_hour" id="mal_bibran_4" placeholder=" कुल रकम">
                                </td>
                                <td style="width:20rem">
                                    <input type="text" class="form-control rounded tamount total-wages" name="total_wages" id="mal_bibran_4" readonly placeholder=" कुल रकम">
                                </td>
                                {{-- <td style="width:30rem">
                                    <input type="text" name="worker_details" id="mal_bibran_5" value="" placeholder="टिप्पणी" class="form-control" />
                                </td> --}}
                                <td style="width:13em"><button type="submit" class="btn btn-sm btn-info js-pr4-row-add"> नयाँ</button>
                                </td>
                            </form>
                        </tr>
                    </tbody>
                    <tfoot>
                        <td align="right" colspan="4" class="font-weight-bold">कामदारमा भएको जम्मा खर्च </td>
                        <td class="font-weight-bold">{{ getUnicodeNumber($data['row']['total_worker_amount'] ?? 0) }}</td>
                    </tfoot>
                </table>
            </div>
        </section>
        <section class="card">
            <header class="card-header" style="font-weight: bold;">
                अन्य बिबरण
            </header>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            {{-- <th>पशुपन्छी प्रकार</th> --}}
                            <th>नाम</th>
                            <th>यूनिट</th>
                            <th>मूल्य</th>
                            <th>संख्या</th>
                            <th>कुल रकम</th>
                            {{-- <th>सम्पादन</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        {{-- {{ dd($data['animal_details']) }} --}}
                        @if(count($data['other_details'])>0)


                        @foreach ($data['other_details'] as $key=>$other_data)
                        {{-- {{ dd($animal[0]['animal_quantity']) }} --}}
                        <tr>
                            <td>{{ $other_data['anya_bibran_name'] ?? 'उपलब्ध छैन'  }}.</td>
                            <td>{{ $other_data['anya_bibran_unit'] ?? 'उपलब्ध छैन' }}</td>
                            <td>{{ $other_data['anya_bibran_unit_price'] ?? 'उपलब्ध छैन' }}</td>
                            <td>{{ $other_data['anya_bibran_quantity'] ?? 'उपलब्ध छैन' }}</td>
                            <td> {{ $other_data['anya_bibran_total'] ?? 'उपलब्ध छैन' }}</td>
                            <td><button data-id="{{ $other_data['id'] }}" class="delete-mesinary"><i class="fa fa-trash-o text-danger"></i></button></td>
                            {{-- <td>{{ $mesinary['animal_total_cost'] ?? 'उपलब्ध छैन' }}</td> --}}
                        </tr>
                        @endforeach
                        @endif

                        <tr class="newtrans prod-multyfield">
                            <form action="{{ route('admin.farm.add_anya', $data['row']->id) }}" method="POST">
                                @csrf
                                <td style="width:15rem">
                                    <select name="anya_bibran_name" id="mal_bibran_1" class="form-control select-two">
                                        <option value=>छान्नुहोस्</option>
                                        @if(count($data['other_material']) != 0)
                                        @foreach($data['other_material'] as $row)
                                        <option value="{{ $row->name }}">{{ $row->name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </td>
                                <td style="width:20rem">
                                    <select name="anya_bibran_unit" id="unit_5" class="form-control select-two">
                                        <option value=>छान्नुहोस्</option>
                                        @if(count($data['unit']) != 0)
                                        @foreach($data['unit'] as $row)
                                        <option value="{{ $row->name }}">{{ $row->name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </td>
                                <td style="width:20rem"><input type="number" class="form-control rounded amount" name="anya_bibran_unit_price" id="mal_bibran_2" placeholder="मूल्य" value="" onchange="sum(this)"></td>
                                <td style="width:20rem"><input type="number" class="form-control rounded expenditure" name="anya_bibran_quantity" id="mal_bibran_3" placeholder="संख्या" value="" onchange="sum(this)"></td>
                                <td style="width:20rem"><input type="number" class="form-control rounded tamount" name="anya_bibran_total" id="mal_bibran_4" readonly placeholder=" कुल रकम" value=""></td>
                                {{-- <td style="width:30rem"><input type="text" name="anya_bibran_details" id="mal_bibran_5" value="" placeholder="टिप्पणी" class="form-control" /></td> --}}
                                <td style="width:13em"><button type="submit" class="btn btn-sm btn-info js-pr3-row-add"> नयाँ</button>

                                </td>
                            </form>
                        </tr>
                    </tbody>
                    <tfoot>
                        <td align="right" colspan="4" class="font-weight-bold">अन्यमा भएको जम्मा खर्च </td>
                        <td class="font-weight-bold">{{ getUnicodeNumber($data['row']['total_other_amount'] ?? 0) }}</td>
                    </tfoot>
                </table>
            </div>
        </section>
        <section class="card px-5 text-center">
            <h2>आम्दानी विवरण </h2>
        </section>
        <section class="card">
            <header class="card-header" style="font-weight: bold;">
                आम्दानी बिबरण
            </header>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            {{-- <th>पशुपन्छी प्रकार</th> --}}
                            <th> आम्दानी शिर्षक</th>
                            <th>यूनिट</th>
                            <th>मूल्य</th>
                            <th>संख्या</th>
                            <th>कुल रकम</th>
                            {{-- <th>सम्पादन</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        {{-- {{ dd($data['animal_details']) }} --}}
                        @if(count($data['other_details'])>0)


                        @foreach ($data['amdani_details'] as $key=>$amdani)
                        {{-- {{ dd($animal[0]['animal_quantity']) }} --}}
                        <tr>
                            <td>{{ $amdani['amdani_sirshak'] ?? 'उपलब्ध छैन'  }}.</td>
                            <td>{{ $amdani['amdani_unit'] ?? 'उपलब्ध छैन' }}</td>
                            <td>{{ $amdani['amdani_unit_price'] ?? 'उपलब्ध छैन' }}</td>
                            <td>{{ $amdani['amdani_quantity'] ?? 'उपलब्ध छैन' }}</td>
                            <td> {{ $amdani['amdani_total'] ?? 'उपलब्ध छैन' }}</td>
                            <td><button data-id="{{ $amdani['id'] }}" class="delete-mesinary"><i class="fa fa-trash-o text-danger"></i></button></td>

                            {{-- <td>{{ $mesinary['animal_total_cost'] ?? 'उपलब्ध छैन' }}</td> --}}
                        </tr>
                        @endforeach
                        @endif

                        <tr class="newtrans prod-multyfield">
                            <form action="{{ route('admin.farm.add_amdani', $data['row']->id) }}" method="POST">
                                @csrf
                                <td style="width:15rem">
                                    <select name="amdani_sirshak" id="mal_bibran_1" class="form-control select-two">
                                        <option value=>छान्नुहोस्</option>
                                        @if(count($data['amdani']) != 0)
                                        @foreach($data['amdani'] as $row)
                                        <option value="{{ $row->title }}">{{ $row->title }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </td>
                                <td style="width:20rem">
                                    <select name="amdani_unit" id="unit_5" class="form-control select-two">
                                        <option value=>छान्नुहोस्</option>
                                        @if(count($data['unit']) != 0)
                                        @foreach($data['unit'] as $row)
                                        <option value="{{ $row->name }}">{{ $row->name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </td>
                                <td style="width:20rem"><input type="number" class="form-control rounded amount" name="amdani_unit_price" id="mal_bibran_2" placeholder="मूल्य" value="" onchange="sum(this)"></td>
                                <td style="width:20rem"><input type="number" class="form-control rounded expenditure" name="amdani_quantity" id="mal_bibran_3" placeholder="संख्या" value="" onchange="sum(this)"></td>
                                <td style="width:20rem"><input type="number" class="form-control rounded tamount" name="amdani_total" id="mal_bibran_4" readonly placeholder=" कुल रकम" value=""></td>
                                {{-- <td style="width:30rem"><input type="text" name="anya_bibran_details" id="mal_bibran_5" value="" placeholder="टिप्पणी" class="form-control" /></td> --}}
                                <td style="width:13em"><button type="submit" class="btn btn-sm btn-info js-pr3-row-add"> नयाँ</button>

                                </td>
                            </form>
                        </tr>
                    </tbody>
                    <tfoot>
                        <td align="right" colspan="4" class="font-weight-bold">जम्मा आम्दानी </td>
                        <td class="font-weight-bold">{{ getUnicodeNumber($data['row']['total_amdani_amount'] ?? 0) }}</td>
                    </tfoot>
                </table>
            </div>
        </section>
        <section class="card">
            <div class="row justify-content-end">
                <div class="col-lg-4 invoice-block ">
                    <ul class="unstyled amounts">
                        @php
                            $grant_total_expenses = ($data['row']['total_other_amount'] ?? 0)
                                                + ($data['row']['total_worker_amount'] ?? 0)
                                                + ($data['row']['total_mesinary_amount'] ?? 0);
                            $profit_loss = $data['row']['total_amdani_amount'] - $grant_total_expenses
                        @endphp

                        <li style="font-weight: bold;"><strong>जम्मा खर्च :</strong> रु. {{getUnicodeNumber($grant_total_expenses)}}</li>
                        <li style="font-weight: bold;"><strong>जम्मा आम्दानी :</strong> रु. {{ getUnicodeNumber($data['row']['total_amdani_amount'] ?? 0) }}</li>
                        <!-- <li style="font-weight: bold;"><strong>भ्याट:</strong> INR. {{ getUnicodeNumber(0) }} %</li> -->
                        <li style="font-weight: bold;"><strong>कूल रकम जम्मा :</strong> रु. {{ getUnicodeNumber($profit_loss) }}</li>
                    </ul>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/js/nepali.datepicker.v3.7.min.js')}}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<script>
    $(document).ready(function() {
        /***************************NepaliDate picker *********************/
        $("#start_date").nepaliDatePicker({
            ndpYear: true,
            ndpMonth: true,
            ndpYearCount: 1000,
            // unicodeDate: true,
        })
        $("#end_date").nepaliDatePicker({
            ndpYear: true,
            ndpMonth: true,
            ndpYearCount: 1000,
            // unicodeDate: true,
        })
        $("#expenses_date").nepaliDatePicker({
            ndpYear: true,
            ndpMonth: true,
            ndpYearCount: 1000,
            // unicodeDate: true,
        })

    });

    function sum(e) {
        // debugger;
        var qties = document.getElementsByClassName('amount');
        for (var i = 0; i < qties.length; i++) {
            var closest = qties[i].closest('.newtrans');
            var qty = qties[i].value;
            var amount = closest.getElementsByClassName('amount')[0].value || 0;
            var exp = closest.getElementsByClassName('expenditure')[0].value || 0;
            var total = parseFloat(amount) * parseFloat(exp);
            closest.getElementsByClassName('tamount')[0].value = total;
        }
    }
</script>

<script>

    $(document).ready(function(){
        function calculateTotalWages($row) {
            var worked_hour = parseFloat($row.find('.worked-hour').val()) || 0;
            var worked_day = parseFloat($row.find('.worked-day').val()) || 0;
            var wages_per_hour = parseFloat($row.find('.wages-per-hour').val()) || 0;
            var tatal_wages = worked_hour * wages_per_hour + worked_day*8*wages_per_hour;
            $row.find('.total-wages').val(tatal_wages.toFixed(2));
        }
        $('.worker-bibaran').on('input', '.worked-day, .worked-hour, .wages-per-hour', function() {
            console.log('worded-day')
            var $row = $(this).closest('tr');
            calculateTotalWages($row);
        });

    })
</script>>

<script>
    $(document).ready(function(){
        $('.delete-mesinary').on('click', function(){
            console.log("hrh");
            id = $(this).data('id');
            $.ajax({
                url: "{{ route('admin.farm.delete_mesinary', $data['row']->id) }}",
                type: "GET",
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result) {
                    //debugger;
                    window.location.reload();
                    console.log(result);

                }
            });
        })
    })
</script>

<script>
    $(document).ready(function(){
        $('.delete-worker').on('click', function(){
            console.log("hrh");
            id = $(this).data('id');mesinary
            $.ajax({
                url: "{{ route('admin.farm.delete_worker', $data['row']->id) }}",
                type: "GET",
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result) {
                    //debugger;
                    window.location.reload();
                    console.log(result);

                }
            });
        })
    })
</script>
@endsection

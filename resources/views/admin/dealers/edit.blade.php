@extends('layouts.admin')
@section('title', 'डिलर')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">इन्भेन्टरी</a></li>
                <li class="breadcrumb-item"><a href="#">डिलर</a></li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        {{-- {{ dd($_base_route) }} --}}
        <form action="{{ route($_base_route.'.update', $data['row']->id )}}" method="POST" enctype="multipart/form-data">
            <section class="card">
                <header class="card-header">
                    डिलर
                </header>
                <div class="card-body">
                    @csrf
                    <input type="hidden" name="udhyog" value="{{ $data['row']['udhyog_id'] }}">
                    <div class="row">
                        <table class="table table-bordered" id="dynamicTable">
                            <tr>
                                <th>पुरा नाम </th>
                                <th>फोन</th>
                                <th>इमेल</th>
                                <th>ठेगाना</th>
                                <th>डिलर हो ? </th>
                            </tr>
                            <tr>
                                <td style="width:30rem">
                                    <input type="text" value="{{ old('name', $data['row']->name) }}" name="name" placeholder="पुरा नाम" class="form-control" />
                                    @if($errors->has('name'))
                                    <p id="name-error" class="help-block" for="name"><span>{{ $errors->first('name') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:20rem">
                                    <input type="text" value="{{ old('phone',$data['row']->phone) }}" name="phone" placeholder="फोन" class="form-control" />
                                    @if($errors->has('phone'))
                                    <p id="name-error" class="help-block" for="phone"><span>{{ $errors->first('phone') }}</span></p>
                                    @endif
                                </td>

                                <td style="width:20rem">
                                    <input type="email" value="{{ old('email',$data['row']->email) }}" name="email" placeholder="इमेल" class="form-control" />
                                    @if($errors->has('email'))
                                    <p id="name-error" class="help-block" for="email"><span>{{ $errors->first('email') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:20rem">
                                    <input type="text" name="address" value="{{ old('address', $data['row']->address) }}" placeholder="ठेकाना" class="form-control" />
                                    @if($errors->has('address'))
                                    <p id="name-error" class="help-block" for="address"><span>{{ $errors->first('address') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:10rem">
                                    <div class="form-group">
                                        <label class="ui-checkbox">
                                            <input type="hidden" name="is_dealer" value="0"><span class="input-span"></span>
                                            <input style="scale: 1.6;" type="checkbox" name="is_dealer" value="1" id="status-checkbox" {{ $data['row']->is_dealer == 1 ? 'checked' : '' }}><span class="input-span"></span>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <table class="table table-bordered" id="dealer-table">
                            {{-- <h3>डिलर विवरण</h3> --}}
                            <tr>
                                <th>डिलरको सम्पर्ककर्ता <span class="text-danger">*</span> </th>
                                <th>डिलर सम्पर्ककर्ताको फोन <span class="text-danger">*</span></th>
                            </tr>
                            <tr>
                                <td style="width:30rem">
                                    <input type="text" value="{{ old('contactor_name', $data['row']->contactor_name) }}" name="contactor_name" placeholder="पुरा नाम" class="form-control" />
                                    @if($errors->has('contactor_name'))
                                    <p id="contactor_name-error" class="help-block" for="worker_id"><span>{{ $errors->first('contactor_name') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:20rem">
                                    <input type="text" value="{{ old('contactor_phone', $data['row']->contactor_phone) }}" name="contactor_phone" placeholder="फोन" class="form-control" />
                                    @if($errors->has('phone'))
                                    <p id="contactor_phone-error" class="help-block" for="contactor_phone"><span>{{ $errors->first('contactor_phone') }}</span></p>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </section>
            <!-- Begin Progress Bar Buttons-->
            <div class="form-group pull-right">
                <a href="{{ route($_base_route.'.index')}}" class="btn btn-danger btn-sm "><i class="fa fa-undo"></i> पछाडि फर्कनुहोस्</a>
                <button class="btn btn-success btn-sm " type="submit" style="cursor: pointer;"><i class="fa fa-save"></i> सुरक्षित गर्नुहोस् </button>
            </div>
            <!-- End Progress Bar Buttons-->
        </form>
    </div>
</div>
@endsection
@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const statusCheckbox = document.getElementById('status-checkbox');
        const dealerTable = document.getElementById('dealer-table');

        function toggleDealerTable() {
            if (statusCheckbox.checked) {
                dealerTable.style.display = 'table';
            } else {
                dealerTable.style.display = 'none';
            }
        }

        statusCheckbox.addEventListener('change', toggleDealerTable);

        // Initial check
        toggleDealerTable();
    });
</script>
@endsection

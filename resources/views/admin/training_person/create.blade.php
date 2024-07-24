@extends('layouts.admin')
@section('title', 'सप्लायर्स')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">सप्लायर्स</a></li>
                <li class="breadcrumb-item"><a href="#">सप्लायर्स</a></li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        {{-- {{ dd($_base_route) }} --}}
        <form action="{{ route($_base_route.'.store')}}" method="POST" enctype="multipart/form-data">
            <section class="card">
                <header class="card-header">
                    सप्लायर्स
                </header>
                <div class="card-body">
                    @csrf
                    <input type="hidden" name="talim" value="{{ request()->talim }}">
                    <div class="row">
                        <table class="table table-bordered" id="dynamicTable">
                            <tr>
                                <th>पुरा नाम <span class="text-danger">*</span> </th>
                                <th>फोन <span class="text-danger">*</span></th>
                                <th>इमेल <span class="text-danger">*</span></th>
                                <th>ठेगाना <span class="text-danger">*</span></th>
                                <th>तालिम चरण <span class="text-danger">*</span></th>
                            </tr>
                            <tr>
                                <td style="width:30rem">
                                    <input type="text" value="{{ old('name') }}" name="name[]" placeholder="पुरा नाम" class="form-control" required/>
                                    @if($errors->has('name'))
                                    <p id="name-error" class="help-block" for="worker_id"><span>{{ $errors->first('name') }}</span></p>
                                    @endif
                                </td>


                                <td style="width:20rem">
                                    <input type="text" value="{{ old('phone') }}" name="phone[]" placeholder="फोन" class="form-control" required />
                                    @if($errors->has('phone'))
                                    <p id="name-error" class="help-block" for="worker_id"><span>{{ $errors->first('phone') }}</span></p>
                                    @endif
                                </td>

                                <td style="width:20rem">
                                    <input type="email" value="{{ old('email') }}" name="email[]" placeholder="इमेल" class="form-control" required />
                                    @if($errors->has('email'))
                                    <p id="name-error" class="help-block" for="worker_id"><span>{{ $errors->first('email') }}</span></p>
                                @endif
                                </td>

                                <td style="width:20rem">
                                    <input type="text" name="address[]" value="{{ old('address') }}" placeholder="ठेकाना[]" class="form-control" required/>
                                    @if($errors->has('address'))
                                    <p id="name-error" class="help-block" for="worker_id"><span>{{ $errors->first('address') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:20rem">
                                    <select name="training_phase[]" id="traiing-phase" class="form-control">
                                        <option selected disabled>तालिम चरण छान्नुहोस् </option>
                                        @foreach ($data['talim']->phases as $key => $phase )
                                            <option value="{{ $phase->id }}">{{ $phase->name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('address'))
                                    <p id="name-error" class="help-block" for="worker_id"><span>{{ $errors->first('address') }}</span></p>
                                    @endif
                                </td>
                                <td style="width:10rem" colspan="1"><button type="button" name="add" id="add" class="btn btn-sm btn-info"> नयाँ थप्नुस</button></td>
                            </tr>


                        </table >

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
@section('js')
<script type="text/javascript">
    var i = 0;
    $("#add").click(function() {
        ++i;
        $("#dynamicTable").append('<tr><td><input type="text" name="name[]" placeholder="पुरा नाम" class="form-control" required/></td><td><input type="text" name="phone[]" placeholder="9845645678" class="form-control" /></td><td><input type="email" name="email[]" placeholder="personemail@gmail.com" class="form-control" /></td><td><input type="text" name="address[]" placeholder="पूरा ठेगाना" class="form-control" /></td><td style="width:20rem"><select name="training_phase[]" class="form-control"><option selected disabled>तालिम चरण छान्नुहोस् </option>@foreach ($data["talim"]->phases as $key => $phase )<option value="{{ $phase->id }}">{{ $phase->name }}</option>@endforeach</select></td><td><button type="button" class="btn btn-danger btn-sm remove-tr">हटाउनुहोस्</button></td></tr>');
    });
    $(document).on('click', '.remove-tr', function() {
        $(this).parents('tr').remove();
    });
</script>
@endsection
@endsection

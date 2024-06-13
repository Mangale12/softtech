@extends('layouts.admin')
@section('title', 'सप्लाइर्स')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">सप्लाइर्स</a></li>
                <li class="breadcrumb-item"><a href="#">सप्लाइर्स</a></li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-10">
        {{-- {{ dd($_base_route) }} --}}
        <form action="{{ route($_base_route.'.update', $data['row']->id )}}" method="POST" enctype="multipart/form-data">
            <section class="card">
                <header class="card-header">
                    सप्लाइर्स
                </header>
                <div class="card-body">
                    @csrf
                    <input type="hidden" value="{{ $data['row']['udhyog_id'] }}" name="udhyog">
                    <div class="row">
                        <table class="table table-bordered" id="dynamicTable">
                            <tr>
                                <th>पुरा नाम </th>
                                <th>फोन</th>
                                <th>इमेल</th>
                                <th>ठेकाना</th>
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

@endsection

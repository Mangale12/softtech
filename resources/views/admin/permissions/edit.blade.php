@extends('layouts.admin')
@section('title', 'अनुमति')
@section('content')
{{-- {{ dd($data) }} --}}
<div class="row">
    <div class="col-lg-8">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">अनुमति</a></li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <form action="{{ route($_base_route.'.update', ['id' => $data['permission']['id']])}}" method="POST" enctype="multipart/form-data">
            <section class="card">
                <header class="card-header">
                    अनुमति
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="title">अनुमति</label> <br>
                                <input class="form-control rounded" type="text" id="title" value="{{ old('name', $data['permission']['name']) }}" name="name" placeholder="अनुमति">
                                @if($errors->has('name'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('name') }}</span></p>
                                @endif
                            </div>
                        </div>

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

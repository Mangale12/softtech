@extends('layouts.admin')
@section('title', 'नयाँ बालीनाली ')
@section('css')
<!--Form Wizard-->
<link href="{{ asset('assets/cms/assets/select2/css/select2.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="row">
    <div class="col-lg-8">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">नयाँ बालीनाली </a></li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <form action="{{ route($_base_route.'.store')}}" method="POST" enctype="multipart/form-data">
            <section class="card">
                <header class="card-header">
                    नयाँ बालीनाली
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="agricultural_id">बालीनाली प्रकार </label> <br>
                                <select name="agricultural_id" id="agricultural_id" class="form-control select-two">
                                    <option value=>छान्नुहोस्</option>
                                    @if(count($data['rows']) != 0)
                                    @foreach($data['rows'] as $row)
                                    <option value="{{ $row->id }}">{{ $row->title }}</option>
                                    @endforeach
                                    @endif
                                </select> 
                                @if($errors->has('agricultural_id'))
                                <p id="name-error" class="help-block" for="agricultural_id"><span>{{ $errors->first('agricultural_id') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="title">नयाँ बालीनाली </label> <br>
                                <input class="form-control rounded" type="text" id="title" value="{{ old('title') }}" name="title" placeholder="नयाँ बालीनाली">
                                @if($errors->has('title'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('title') }}</span></p>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="status">स्थिति</label>
                                <div class="form-group">
                                    <label class="ui-checkbox">
                                        <input type="hidden" name="status" value=0><span class="input-span"></span>
                                        <input type="checkbox" name="status" value=1><span class="input-span"></span>
                                    </label>
                                </div>
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
@section('js')
<script src="{{ asset('assets/cms/assets/select2/js/select2.min.js')}}"></script>
<script>
    $(document).ready(function() {
        //select 2
        $(".select-two").select2({
            // allowClear: true
        });

    });
</script>
@endsection
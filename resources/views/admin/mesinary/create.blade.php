@extends('layouts.admin')
@section('title', 'मेसिनरी बिबरण')
@section('css')
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">मेसिनरी बिबरण </a></li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route($_base_route.'.store')}}" method="POST" enctype="multipart/form-data">
            <section class="card">
                <header class="card-header">
                    मेसिनरी बिबरण
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="tools">उपकरण</label> <br>
                                <input class="form-control rounded" type="text" id="tools" value="{{ old('tools') }}" name="tools" placeholder="उपकरण">
                                @if($errors->has('tools'))
                                <p id="name-error" class="help-block" for="tools"><span>{{ $errors->first('tools') }}</span></p>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="ekai">इकाई</label> <br>
                                <input class="form-control rounded" type="number" id="ekai" value="{{ old('ekai') }}" name="ekai" placeholder="इकाई">
                                @if($errors->has('ekai'))
                                <p id="name-error" class="help-block" for="ekai"><span>{{ $errors->first('ekai') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="purpose">प्रयोजन</label> <br>
                                <input class="form-control rounded" type="text" id="purpose" value="{{ old('purpose') }}" name="purpose" placeholder="प्रयोजन">
                                @if($errors->has('purpose'))
                                <p id="name-error" class="help-block" for="purpose"><span>{{ $errors->first('purpose') }}</span></p>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="criteria">मूल्य</label> <br>
                                <input class="form-control rounded" type="text" id="title" value="{{ old('criteria') }}" name="criteria" placeholder="मापदण्ड">
                                @if($errors->has('criteria'))
                                <p id="name-error" class="help-block" for="criteria"><span>{{ $errors->first('criteria') }}</span></p>
                                @endif
                            </div>
                        </div>
                        @include('admin.section.status-create')
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
    $(function() {
        $("#optional").click(function() {
            if ($(this).is(":checked")) {
                $(".test").show();
            } else {
                $(".test").hide();
                $("#anudaan").val("");
            }
        });
    });
</script>
@endsection
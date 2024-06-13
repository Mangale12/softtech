@extends('layouts.admin')
@section('title', 'भूमिका')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">नयाँ भूमिका</a></li>
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
                    नयाँ भूमिका
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="title">भूमिका</label> <br>
                                <input class="form-control rounded" type="text" id="title" value="{{ old('name') }}" name="name" placeholder="भूमिका">
                                @if($errors->has('name'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('name') }}</span></p>
                                @endif
                            </div>
                        </div>

                    </div>

                    <div class="row">
                    <div class="col-12 mb-3">
                        <h4>कृपया अनुमतिहरू चयन गर्नुहोस्</h4>

                    </div>
                    <div class="col-12 mb-3">
                        <input type="checkbox" id="select-all" class="select-all"> <label for="select-all" class="font-weight-bold">सबै छान्नु</label>
                        {{-- <div class="row">
                            <div class="col-2">
                                <input type="checkbox" class="d-inline">

                            </div>
                        </div> --}}
                        {{-- <h4>
                            <h6 class="d-inline">सबै छान्नु</h6>
                        </h4> --}}

                    </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                @foreach($data['permission'] as $value)
                                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'permission-checkbox')) }}
                            {{ $value->name }}</label>
                        <br />
                        @endforeach
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
<script>
    document.getElementById('select-all').addEventListener('click', function(event) {
        let checkboxes = document.querySelectorAll('.permission-checkbox');
        checkboxes.forEach((checkbox) => {
            checkbox.checked = event.target.checked;
        });
    });
</script>
@endsection

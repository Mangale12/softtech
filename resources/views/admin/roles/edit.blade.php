@extends('layouts.admin')
@section('content')
<div class="container">
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
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <style>
        .form-control{
            width: 223px;
            height: 32px;
        }
    </style>
    {{-- {!! Form::model($data['role'], ['method' => 'post','route' => ['admin.roles.update', $data['role']->id]]) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permission:</strong>
                <br />
                @foreach($data['permission'] as $value)
                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $data['rolePermissions']) ? true : false, array('class' => 'name')) }}
                    {{ $value->name }}</label>
                <br />
                @endforeach
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button class="btn btn-warning " type="reset"> <i class="fa fa-trash"></i> Reset</button>
            <button class="btn btn-success" type="submit"> <i class="fa fa-paper-plane"></i> Submit</button>
        </div>
    </div>
    {!! Form::close() !!} --}}
<div class="row">
    <div class="col-lg-8">
        {!! Form::model($data['role'], ['method' => 'post','route' => ['admin.roles.update', $data['role']->id]]) !!}
        <section class="card">
            <header class="card-header">
                भूमिका सम्पादन गर्नुहोस्
            </header>
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-8 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control rounded')) !!}
                            @if($errors->has('name'))
                            <p id="name-error" class="help-block"><span>{{ $errors->first('name') }}</span></p>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <h4>कृपया अनुमतिहरू चयन गर्नुहोस्</h4>

                                </div>
                                <div class="col-12 mb-3">
                                    <input type="checkbox" id="select-all" class="select-all"> <label for="select-all" class="font-weight-bold">सबै छान्नु</label>

                                </div>
                            </div>
                            <div class="row">

                                @foreach ($permissions as $guardName => $permissionGroup)
                                    <div class="col-md-4 mb-3">
                                        <h5>{{ $guardName }}</h5>
                                        <div class="form-group">
                                            @foreach ($permissionGroup as $permission)
                                            <label>
                                                {{ Form::checkbox('permission[]', $permission->id, $data['role']->hasPermissionTo($permission->name), ['class' => 'permission-checkbox']) }}
                                                {{ $permission->name }}
                                            </label>
                                            <br>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endforeach
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
    {!! Form::close() !!}
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

</div>
@endsection

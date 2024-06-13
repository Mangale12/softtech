@extends('layouts.admin')
@section('content')
{{-- {{ dd($user) }} --}}
<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">नयाँ प्रयोगकर्ता सम्पादन गर्नुहोस्</a></li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                नयाँ प्रयोगकर्ता सम्पादन गर्नुहोस्
            </header>
            <div class="card-body">
                <form action="{{ route($_base_route.'.update', ['id' => $user->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name">पुरा नाम</label> <br>
                                <input class="form-control rounded" type="text" id="name" value="{{ old('name',$user->name) }}" name="name" placeholder="नाम">
                                @if($errors->has('name'))
                                <p id="name-error" class="help-block" for="name"><span>{{ $errors->first('name') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="username">प्रोफाइल नाम</label> <br>
                                <input class="form-control rounded" type="text" id="username" value="{{ old('username',$user->username) }}" name="username" placeholder="प्रोफाइल नाम">
                                @if($errors->has('username'))
                                <p id="name-error" class="help-block" for="username"><span>{{ $errors->first('username') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="email">इमेल</label> <br>
                                <input class="form-control rounded" type="text" id="email" value="{{ old('email', $user->email) }}" name="email" placeholder="इमेल">
                                @if($errors->has('email'))
                                <p id="name-error" class="help-block" for="email"><span>{{ $errors->first('email') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="mobile">मोबाइल</label> <br>
                                <input class="form-control rounded" type="text" id="mobile" value="{{ old('mobile', $user->mobile) }}" name="mobile" placeholder="मोबाइल">
                                @if($errors->has('mobile'))
                                <p id="name-error" class="help-block" for="mobile"><span>{{ $errors->first('mobile') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="password">पासवर्ड</label> <br>
                                <input class="form-control rounded" type="password" id="password" value="{{ old('password') }}" name="password" placeholder="पासवर्ड">
                                @if($errors->has('password'))
                                <p id="name-error" class="help-block" for="password"><span>{{ $errors->first('password') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="password_confirmation">पासवर्ड पुन: लेख्नुहोस </label> <br>
                                <input class="form-control rounded" type="password" id="password_confirmation" value="{{ old('password_confirmation') }}" name="password_confirmation" placeholder="पासवर्ड पुन:">
                                @if($errors->has('password_confirmation'))
                                <p id="name-error" class="help-block" for="password_confirmation"><span>{{ $errors->first('password_confirmation') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="avatar">प्रोफाइल फोटा </label> <br>
                                <input class="form-control rounded" type="file" id="avatar" value="" name="avatar" accept="">
                                @if($errors->has('avatar'))
                                <p id="name-error" class="help-block" for="avatar"><span>{{ $errors->first('avatar') }}</span></p>
                                @endif
                            </div>
                            @if($user->avatar)
                                <img src="{{ asset($user->avatar) }}" alt="worker image" width="200" height="100">
                            @endif
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="text">रोल </label> <br>
                                    <div class="form-group">
                                        <select class="form-control" name="role">
                                            @foreach($allRoles as $roleId => $roleName)
                                                {{-- {{ $roleId }} --}}
                                                <option value="{{ $roleId }}" {{ in_array($roleId, $userRole) ? 'selected' : '' }}>{{ $roleName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>
                        </div>


                    </div>
                    <!-- Begin Progress Bar Buttons-->
                    <div class="form-group pull-right">
                        <a href="{{ route($_base_route.'.index')}}" class="btn btn-danger btn-sm "><i class="fa fa-undo"></i> पछाडि फर्कनुहोस्</a>
                        <button class="btn btn-success btn-sm " type="submit" style="cursor: pointer;"><i class="fa fa-save"></i> सुरक्षित गर्नुहोस् </button>
                    </div>
                    <!-- End Progress Bar Buttons-->

                    <br>
                    <br>
                    <hr>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <h4>कृपया अनुमतिहरू चयन गर्नुहोस्</h4>

                        </div>
                        <div class="col-12 mb-3">
                            <input type="checkbox" id="select-all" class="select-all"> <label for="select-all" class="font-weight-bold">सबै छान्नु</label>

                        </div>
                        @foreach($data['permission'] as $value)
                            <div class="col-lg-4">
                                <div class="form-group form-check">
                                    {!! Form::checkbox('permission[]', $value->id, in_array($value->id, $data['rolePermissions']), ['class' => 'form-check-input permission-checkbox', 'id' => 'permission_' . $value->id]) !!}
                                    <label class="form-check-label" for="permission_{{ $value->id }}">
                                        {{ $value->name }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{-- <div class="col-xs-12 col-sm-12 col-md-12">
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
                                @foreach($data['permission'] as $value)
                                    <div class="col-lg-4">
                                        <div class="form-group form-check">
                                            {!! Form::checkbox('permission[]', $value->id, in_array($value->id, $data['rolePermissions']), ['class' => 'form-check-input permission-checkbox', 'id' => 'permission_' . $value->id]) !!}
                                            <label class="form-check-label" for="permission_{{ $value->id }}">
                                                {{ $value->name }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div> --}}
                </form>
            </div>
        </section>
    </div>
</div>
<script>
    document.getElementById('select-all').addEventListener('click', function(event) {
        let checkboxes = document.querySelectorAll('.permission-checkbox');
        checkboxes.forEach((checkbox) => {
            checkbox.checked = event.target.checked;
        });
    });
    document.querySelectorAll('.permission-checkbox').forEach((checkbox) => {
        checkbox.addEventListener('click', function(event) {
            // If any checkbox is unchecked, uncheck the 'select-all' checkbox
            if (!event.target.checked) {
                document.getElementById('select-all').checked = false;
            }
        });
    });
</script>
@endsection

@extends('layouts.admin')
@section('title', 'अनुदान')
@section('css')
<!--Form Wizard-->
<link href="{{ asset('assets/cms/assets/select2/css/select2.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">अनुदान</a></li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route($_base_route.'.update', $data['rows']->id )}}" method="POST" enctype="multipart/form-data">
            <section class="card">
                <header class="card-header">
                    अनुदान
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="category_id">अनुदान प्रकार </label> <br>
                                <select name="category_id" id="category_id" class="form-control select-two">
                                    <option value=>छान्नुहोस्</option>
                                    @if(count($data['category']) != 0)
                                    @foreach($data['category'] as $row)
                                    <option value="{{ $row->id }}">{{ $row->title }}</option>
                                    @endforeach
                                    @endif
                                </select> @if($errors->has('category_id'))
                                <p id="name-error" class="help-block" for="category_id"><span>{{ $errors->first('category_id') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="title">शीर्षक</label> <br>
                                <input class="form-control rounded" type="text" id="title" value="@if(isset($data['rows']->title)) {{ $data['rows']->title }} @else {{ old('title') }} @endif" name="title" placeholder="शीर्षक">
                                @if($errors->has('title'))
                                <p id="name-error" class="help-block" for="title"><span>{{ $errors->first('title') }}</span></p>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="amount">रकम (रु.)</label> <br>
                                <input class="form-control rounded" type="text" id="amount" value="@if(isset($data['rows']->amount)) {{ $data['rows']->amount }} @else {{ old('amount') }} @endif" name="amount" placeholder="रु.">
                                @if($errors->has('amount'))
                                <p id="name-error" class="help-block" for="amount"><span>{{ $errors->first('amount') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="bibran">बिबरण</label> <br>
                                <input class="form-control rounded" type="text" id="bibran" value="@if(isset($data['rows']->bibran)) {{ $data['rows']->bibran }} @else {{ old('bibran') }} @endif" name="bibran" placeholder="बिबरण">
                                @if($errors->has('bibran'))
                                <p id="name-error" class="help-block" for="bibran"><span>{{ $errors->first('bibran') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="times">पटक</label> <br>
                                <input class="form-control rounded" type="text" id="times" value="@if(isset($data['rows']->times)) {{ $data['rows']->times }} @else {{ old('times') }} @endif" name="times" placeholder="पटक">
                                @if($errors->has('times'))
                                <p id="name-error" class="help-block" for="times"><span>{{ $errors->first('times') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="daatrinikay_sahayog	">दात्रिनिकाय सहयोग</label> <br>
                                <input class="form-control rounded" type="text" id="daatrinikay_sahayog	" value="@if(isset($data['rows']->daatrinikay_sahayog)) {{ $data['rows']->daatrinikay_sahayog }} @else {{ old('daatrinikay_sahayog') }} @endif" name="daatrinikay_sahayog" placeholder="दात्रिनिकाय सहयोग">
                                @if($errors->has('daatrinikay_sahayog '))
                                <p id="name-error" class="help-block" for="daatrinikay_sahayog	"><span>{{ $errors->first('daatrinikay_sahayog') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <!-- <div class="col-md-3">
                            <div class="form-group">
                                <label for="criteria">मापदण्ड</label> <br>
                                <input class="form-control rounded" type="text" id="criteria" value="@if(isset($data['rows']->criteria)) {{ $data['rows']->criteria }} @else {{ old('criteria') }} @endif" name="criteria" placeholder="मापदण्ड">
                                @if($errors->has('criteria'))
                                <p id="name-error" class="help-block" for="criteria"><span>{{ $errors->first('criteria') }}</span></p>
                                @endif
                            </div>
                        </div> -->

                        @include('admin.section.status-edit')
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
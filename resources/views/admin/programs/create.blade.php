@extends('layouts.admin')
@section('title', 'कार्यक्रम विवरण')
@section('css')
<!--Form Wizard-->
<link href="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/css/nepali.datepicker.v3.7.min.css')}}" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script src="https://cdn.ckeditor.com/ckeditor5/35.0.0/classic/ckeditor.js"></script>

@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-weight: bold;">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> होम</a></li>
                <li class="breadcrumb-item"><a href="#">कार्यक्रम</a></li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route($_base_route.'.store')}}" method="POST" enctype="multipart/form-data">
            <section class="card">
                <header class="card-header" style="font-weight: bold;">
                    कार्यक्रम
                </header>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="title" style="font-weight: bold;">शीर्षक</label> <br>
                                <input class="form-control rounded" type="text" id="title" value="{{ old('title') }}" name="title" placeholder="कार्यक्रम शीर्षक">
                                @if($errors->has('title'))
                                <p id="title-error" class="help-block" for="title"><span>{{ $errors->first('title') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="start_date" style="font-weight: bold;">कार्यक्रम मिति</label> <br>
                                <input class="form-control rounded" type="text" id="start_date" readonly value="{{ old('start_date') }}" name="start_date" placeholder="कार्यक्रम मिति">
                                @if($errors->has('start_date'))
                                <p id="name-error" class="help-block" for="mobile"><span>{{ $errors->first('start_date') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="end_date" style="font-weight: bold;">समाप्त मिति</label> <br>
                                <input class="form-control rounded" type="text" id="end_date" readonly value="{{ old('end_date') }}" name="end_date" placeholder="end_date">
                                @if($errors->has('end_date'))
                                <p id="end_date-error" class="help-block" for="mobile"><span>{{ $errors->first('end_date') }}</span></p>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="location" style="font-weight: bold;">स्थान</label> <br>
                                <input class="form-control rounded" type="text" id="mobile" value="{{ old('location') }}" name="location" placeholder="location">
                                @if($errors->has('location'))
                                <p id="location-error" class="help-block" for="location"><span>{{ $errors->first('location') }}</span></p>
                                @endif
                            </div>
                        </div>
                        {{-- <div class="col-md-3">
                            <div class="form-group">
                                <label for="gender" style="font-weight: bold;">लिंग</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value=>छान्नुहोस्</option>
                                    <option value="1" @if (old('gender')=='1' ) selected="selected" @endif>पुरुष</option>
                                    <option value="2" @if (old('gender')=='2' ) selected="selected" @endif>महिला</option>
                                    <option value="3" @if (old('gender')=='3' ) selected="selected" @endif>अन्य</option>
                                </select>
                                @if($errors->has('gender'))
                                <p id="name-error" class="help-block " for="gender"><span>{{ $errors->first('gender') }}</span></p>
                                @endif
                            </div>
                        </div> --}}


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="price" style="font-weight: bold;">खर्च</label> <br>
                                <input class="form-control rounded" type="text" id="price" value="{{ old('price') }}" name="price" placeholder="खर्च">
                                @if($errors->has('price'))
                                <p id="price-error" class="help-block" for="price"><span>{{ $errors->first('price') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="price" style="font-weight: bold;">प्रायोजकहरुको विवरण</label> <br>
                                <textarea name="sponsor_details" id="sponsor_details" class="form-control rounded description" rows="6"></textarea>
                                @if($errors->has('sponsor_details'))
                                <p id="price-error" class="help-block" for="sponsor_details"><span>{{ $errors->first('sponsor_details') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="price" style="font-weight: bold;">आयोजकको विवरण</label> <br>
                                <textarea name="organizer_details" id="organizer_details" class="form-control rounded description" rows="6"></textarea>
                                @if($errors->has('organizer_details'))
                                <p id="price-error" class="help-block" for="organizer_details"><span>{{ $errors->first('organizer_details') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="price" style="font-weight: bold;">संयोजक संग्स्थाको विवरण</label> <br>
                                <textarea name="coordination_organization" id="coordination_organization" class="form-control rounded description" rows="6"></textarea>
                                @if($errors->has('coordination_organization'))
                                <p id="price-error" class="help-block" for="coordination_organization"><span>{{ $errors->first('coordination_organization') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="price" style="font-weight: bold;">सहभागिताको विवरण</label> <br>
                                <textarea name="participation_details" id="participation_details" class="form-control rounded description" rows="6"></textarea>
                                @if($errors->has('participation_details'))
                                <p id="price-error" class="help-block" for="participation_details"><span>{{ $errors->first('participation_details') }}</span></p>
                                @endif
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="price" style="font-weight: bold;">कार्यक्रमको विवरण</label> <br>
                                <textarea name="description" id="description" class="form-control rounded description" rows="6"></textarea>
                                @if($errors->has('description'))
                                <p id="price-error" class="help-block" for="description"><span>{{ $errors->first('description') }}</span></p>
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
@section('js')
<script src="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/js/nepali.datepicker.v3.7.min.js')}}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $("#start_date, #end_date").nepaliDatePicker({
        ndpYear: true,
        ndpMonth: true,
        ndpYearCount: 1000,
        // disableBefore:
        // unicodeDate: true,
    });

    $(document).ready(function(){
        $('.worker_list').select2();
    })
</script>
<script>
    // ClassicEditor
    //     .create(document.querySelector('.description'))
    //     .catch(error => {
    //         console.error(error);
    //     });

    document.querySelectorAll('.description').forEach(descriptionElement => {
        ClassicEditor
            .create(descriptionElement)
            .catch(error => {
                console.error(error);
            });
    });
</script>



@endsection

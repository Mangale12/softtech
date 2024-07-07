@extends('layouts.admin')
@section('title', 'कार्यक्रम विवरण')
@section('css')
<link href="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/css/nepali.datepicker.v3.7.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <h6><a href="#"><i class="fa fa-home"></i> होम /</a></h6>
                </li>&nbsp;
                <h6><a href="#">कार्यक्रम</a> &nbsp;/&nbsp;विवरण</h6>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header" style="font-weight: bold;">
                कार्यक्रम विवरण
            </header>
            <table class="table">
                <tr>
                    <td>कार्यक्रम शीर्षक</td>
                    <td align="left">{{ $data['row']->name }}</td>
                </tr>
                <tr>
                    <td>कार्यक्रम मिति</td>
                    <td align="left">{{ $data['row']->start_date }}</td>
                </tr>
                <tr>
                    <td>कार्यक्रम समाप्त मिति</td>
                    <td align="left">{{ $data['row']->end_date }}</td>
                </tr>
                <tr>
                    <td>कार्यक्रम स्थान</td>
                    <td align="left">{{ $data['row']->location }}</td>
                </tr>
                <tr>
                    <td>कार्यक्रमको खर्च</td>
                    <td align="left">{{ $data['row']->price }}</td>
                </tr>


            </table>
        </section>

        <section class="card">
            <table class="table">
                <tr>
                    <td>कार्यक्रमको विवरण</td>
                </tr>
                <tr>
                    <td>{!! $data['row']->description !!}</td>
                </tr>

            </table>
        </section>
        <section class="card">
            <table class="table">
                <tr>
                    <td>प्रायोजकहरुको विवरण</td>
                </tr>
                <tr>
                    <td>{!! $data['row']->sponsor_details !!}</td>
                </tr>

            </table>
        </section>
        <section class="card">
            <table class="table">
                <tr>
                    <td>आयोजकको विवरण</td>
                </tr>
                <tr>
                    <td>{!! $data['row']->organizer_details !!}</td>
                </tr>

            </table>
        </section>
        <section class="card">
            <table class="table">
                <tr>
                    <td>संयोजक संग्स्थाको विवरण</td>
                </tr>
                <tr>
                    <td>{!! $data['row']->coordination_organization !!}</td>
                </tr>

            </table>
        </section>
        <section class="card">
            <table class="table">
                <tr>
                    <td>सहभागिताको विवरण</td>
                </tr>
                <tr>
                    <td>{!! $data['row']->participation_details !!}</td>
                </tr>

            </table>
        </section>
    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('assets/cms/plugin/nepali.datepicker.v3.7/js/nepali.datepicker.v3.7.min.js')}}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<script>
    $(document).ready(function() {
        /***************************NepaliDate picker *********************/
        $("#start_date").nepaliDatePicker({
            ndpYear: true,
            ndpMonth: true,
            ndpYearCount: 1000,
            // unicodeDate: true,
        })
        $("#end_date").nepaliDatePicker({
            ndpYear: true,
            ndpMonth: true,
            ndpYearCount: 1000,
            // unicodeDate: true,
        })
        $("#expenses_date").nepaliDatePicker({
            ndpYear: true,
            ndpMonth: true,
            ndpYearCount: 1000,
            // unicodeDate: true,
        })
    });
</script>
@endsection

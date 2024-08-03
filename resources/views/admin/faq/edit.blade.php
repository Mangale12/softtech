@extends('layouts.admin')
@section('title')
Admin {{ $_panel }} Edit | SCMS
@endsection
@section('styles')

@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4  text-primary">{{ $_panel }} Edit</h1>
</div>
@include('admin.section.flash_message_error')
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route($_base_route.'.update', $data['rows']->id )}}" method="POST" enctype="multipart/form-data">
            <div class="row">
                @csrf
                <div class="col-md-12">
                    <div class="ibox">
                        <table class="table table-bordered" id="dynamicTable">
                            <tr>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Status</th>
                            </tr>
                            <tr>
                                <td style="width:20rem"><input type="text" name="question" value="@if(isset($data['rows']->question)) {{ $data['rows']->question   }} @endif" placeholder="Enter Question" class="form-control" /></td>
                                <td style="width:60rem"><input type="text" name="answer" value="@if(isset($data['rows']->answer)) {{ $data['rows']->answer   }} @endif" placeholder="Enter Answer" class="form-control" /></td>
                                <td>
                                    <label class="ui-checkbox">
                                        <input type="hidden" name="status" value=0><span class="input-span"></span>
                                        <input type="checkbox" name="status" value=1 @if($data['rows']->status){{ "checked" }} @endif ><span class="input-span"></span>
                                    </label>
                                </td>
                            </tr>
                        </table>
                        <!-- Begin Progress Bar Buttons-->
                        <a href="{{ route($_base_route.'.index')}}" class="btn btn-warning btn-sm"><i class="fa fa-undo"></i> Back</a>
                        <button class="btn btn-success btn-sm" type="submit" style="cursor:pointer;"> <i class="fa fa-paper-plane"></i> Submit </button>
                        <!-- End Progress Bar Buttons-->
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')

@endsection
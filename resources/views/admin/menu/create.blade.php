@extends('layouts.admin')
@section('title')
Admin {{ $_panel }} Add | SCMS
@endsection
@section('styles')

@endsection
@section('content')
@include('admin.section.flash_message_error')
<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index')}}"><i class="fa fa-home"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route($_base_route.'.index')}}">{{ $_panel }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route($_base_route.'.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="ibox-body">
                <div class="form-group col-md-12">
                    <?php
                    dm_menu_type_dropdown('', 'type', 'Menu Type(<em style="color:red">*</em>)', $data['type']);
                    dm_post_dropdown('', 'page_unique_id', 'Pages', $data['pages']);
                    dm_post_dropdown('', 'post_unique_id', 'Posts', $data['posts']);
                    dm_category_dropdown('', 'category_id', 'Category', $data['categories']);
                    dm_custom_link_hinput('url', 'link', "Custom Link", 'link');
                    dm_menu_hinput('text', 'name', "Menu Name(<em style='color:red'>*</em>)", 'name');
                    ?>
                    @foreach($data['lang'] as $lang)
                    <?php dm_hidden('rows[' . $loop->index . '][lang_id]', $lang->id);
                    dm_menu_hinput('text', 'rows[' . $loop->index . '][lang_name]', "Menu Name (<strong>$lang->name</strong>)(<em style='color:red'>*</em>)", 'rows.' . $loop->index . '.lang_name'); ?>
                    @endforeach
                    <?php
                    dm_hidden('parent_id', Null);
                    dm_hidden('order', 1);
                    dm_menu_dropdown('', 'target', "Target(<em style='color:red'>*</em>)", $data['target']);
                    dm_hcheckbox('checkbox', 'status', 'Public');
                    ?>
                </div>

                <!-- Begin Progress Bar Buttons-->
                <a href="{{ route($_base_route.'.index')}}" class="btn btn-warning btn-sm"><i class="fa fa-undo"></i> Back</a>
                <button class="btn btn-success btn-sm" type="submit" style="cursor:pointer;"> <i class="fa fa-paper-plane"></i> Submit </button>
                <!-- End Progress Bar Buttons-->
            </div>

        </form>
    </div>
</div>
@endsection
@section('scripts')
<script>
    function menuTypeFunction() {
        var menu_type = document.getElementById("type").value;
        if (menu_type == "Page") {
            $("#post_unique_id_Posts").hide();
            $("#category_id_Category").hide();
            $("#link_link").hide();
            $("#page_unique_id_Pages").show();
            $("#institute_unique_id_Institute").hide();
            $("#faculty_unique_id_Faculty").hide();
            $("#branch_id_Branch").hide();
        } else if (menu_type === "Post") {
            $("#post_unique_id_Posts").show();
            $("#category_id_Category").hide();
            $("#link_link").hide();
            $("#page_unique_id_Pages").hide();
            $("#institute_unique_id_Institute").hide();
            $("#faculty_unique_id_Faculty").hide();
            $("#branch_id_Branch").hide();

        } else if (menu_type === "Category") {
            $("#post_unique_id_Posts").hide();
            $("#category_id_Category").show();
            $("#link_link").hide();
            $("#page_unique_id_Pages").hide();
            $("#institute_unique_id_Institute").hide();
            $("#faculty_unique_id_Faculty").hide();
            $("#branch_id_Branch").hide();

        } else if (menu_type === "Institute Page") {
            $("#post_unique_id_Posts").hide();
            $("#category_id_Category").hide();
            $("#link_link").hide();
            $("#page_unique_id_Pages").hide();
            $("#institute_unique_id_Institute").show();
            $("#faculty_unique_id_Faculty").hide();
            $("#branch_id_Branch").hide();

        } else if (menu_type === "Faculty Page") {
            $("#post_unique_id_Posts").hide();
            $("#category_id_Category").hide();
            $("#link_link").hide();
            $("#page_unique_id_Pages").hide();
            $("#institute_unique_id_Institute").hide();
            $("#faculty_unique_id_Faculty").show();
            $("#branch_id_Branch").hide();

        } else if (menu_type === "Branch") {
            $("#post_unique_id_Posts").hide();
            $("#category_id_Category").hide();
            $("#link_link").hide();
            $("#page_unique_id_Pages").hide();
            $("#institute_unique_id_Institute").hide();
            $("#faculty_unique_id_Faculty").hide();
            $("#branch_id_Branch").show();
        } else {
            $("#post_unique_id_Posts").hide();
            $("#category_id_Category").hide();
            $("#link_link").show();
            $("#page_unique_id_Pages").hide();
            $("#institute_unique_id_Institute").hide();
            $("#faculty_unique_id_Faculty").hide();
            $("#branch_id_Branch").hide();
        }
    }
</script>
@endsection
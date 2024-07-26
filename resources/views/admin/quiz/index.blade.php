@extends('layouts.admin')
@section('styles')
<link href="{{ asset('assets/cms/vendors/DataTables/datatables.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">


@endsection
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="#" class="d-none d-sm-inline-block btn btn-xs btn-primary shadow-sm" id="quiz-form"><i class="fa fa-plus fa-sm text-white-50"></i> Add New</a>
    </div>
    <div class="ibox">
        <div class="ibox-body">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="newrequest">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Question</th>
                                <th>Option A</th>
                                <th>Option B</th>
                                <th>Option C</th>
                                <th>Option D</th>
                                <th>Answer</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tablecontents">
                            @foreach( $data['rows'] as $key=> $row)
                            <tr class="row1" data-id="{{ $row->id }}">
                                <td>{{ $key+1}}.</td>
                                <td>{{ $row->question}}</td>
                                <td>{{ $row->option_a }}</td>
                                <td>{{ $row->option_b }}</td>
                                <td>{{ $row->option_c }}</td>
                                <td>{{ $row->option_d }}</td>
                                <td>{{ $row->correct_answer }}</td>
                                <td><span class="badge badge-{{ ($row->status == 1) ? 'success' : 'warning'}} badge-pill m-r-5 m-b-5">{{ ($row->status == 1) ? 'Published' : 'Unpublished'}}</span></td>
                                <td>
                                    <button class="btn btn-default btn-xs m-r-5" id="quiz-edit" data-id='{{ $row->id }}' data-toggle="tooltip" data-original-title="Edit" style="cursor: pointer;"><i class="fa fa-pencil font-14"></i></button></a>
                                    @include('admin.section.buttons.button-delete')
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- <hr> 
                     <h5>Drag and Drop the table rows and <button class="btn btn-success btn-sm" onclick="window.location.reload()">REFRESH</button> </h5>  -->
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.blog.include.modal')

@endsection
@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
</script>

<script type="text/javascript">
    $(function() {
        $("#example-table").DataTable();
    });

    //add
    $(document).on('click', '#quiz-form', function() {
        $.confirm({
            columnClass: 'col-md-6 col-md-offset-4',
            title: 'Quiz Practice Form!',
            content: '' +
                '<form action="" class="formName">' +
                '<div class="form-group">' +
                '<label>Enter Question here</label>' +
                '    <textarea  class="question form-control" style="min-height:100px;height:100%;" ></textarea>' +
                '</div>' +
                '<div class="form-group">' +
                '<label>Option A</label>' +
                '<input type="text" placeholder="Option A" class="option_a form-control" required />' +
                '</div>' +
                '<div class="form-group">' +
                '<label>Option B</label>' +
                '<input type="text" placeholder="Option B" class="option_b form-control" required />' +
                '</div>' +
                '<div class="form-group">' +
                '<label>Option C</label>' +
                '<input type="text" placeholder="Option C" class="option_c form-control" required />' +
                '</div>' +
                '<div class="form-group">' +
                '<label>Option D</label>' +
                '<input type="text" placeholder="Option D" class="option_d form-control" required />' +
                '</div>' +
                '<div class="form-group">' +
                '<label>Correct Answer</label>' +
                '<select name="category_id" class="form-control correct_answer">' +
                '<option value="option_a">Option A</option>' +
                '<option value="option_b">Option B</option>' +
                '<option value="option_c">Option C</option>' +
                '<option value="option_d">Option D</option>' +
                '/select>' +
                '</div>' +
                '</form>',
            buttons: {
                formSubmit: {
                    text: 'Submit',
                    btnClass: 'btn-blue',
                    action: function() {
                        var question = this.$content.find('.question').val();
                        var option_a = this.$content.find('.option_a').val();
                        var option_b = this.$content.find('.option_b').val();
                        var option_c = this.$content.find('.option_c').val();
                        var option_d = this.$content.find('.option_d').val();
                        var correct_answer = this.$content.find('.correct_answer').val();
                        // $.alert(question + option_a + option_b + option_c + option_d);
                        var url = "{{route('admin.quiz.store')}}";
                        $.ajax({
                            type: 'POST',
                            url: url,
                            dataType: 'json',
                            data: {
                                'question': question,
                                'option_a': option_a,
                                'option_b': option_b,
                                'option_c': option_c,
                                'option_d': option_d,
                                'correct_answer': correct_answer,
                                _token: '{{csrf_token()}}'
                            },
                            success: function(response) {},
                            error: function(response) {
                                alert("Update Successfully !");
                                location.reload();
                            }
                        });
                    }
                },
                cancel: function() {
                    //close
                },
            },
            onContentReady: function() {
                // bind to events
                var jc = this;
                this.$content.find('form').on('submit', function(e) {
                    // if the user submits the form by pressing enter in the field.
                    e.preventDefault();
                    jc.$$formSubmit.trigger('click'); // reference the button and click it
                });
            }
        });
    });
    //edit
    $(document).on('click', '#quiz-edit', function() {
        $.confirm({
            columnClass: 'col-md-6 col-md-offset-4',
            title: 'Quiz Practice Form!',
            content: '' +
                '<form action="" class="formName">' +
                '<div class="form-group">' +
                '<label>Enter Question here</label>' +
                '    <textarea  class="question form-control" style="min-height:100px;height:100%;" ></textarea>' +
                '</div>' +
                '<div class="form-group">' +
                '<label>Option A</label>' +
                '<input type="text" placeholder="Option A" class="option_a form-control" value="" required />' +
                '</div>' +
                '<div class="form-group">' +
                '<label>Option B</label>' +
                '<input type="text" placeholder="Option B" class="option_b form-control" required />' +
                '</div>' +
                '<div class="form-group">' +
                '<label>Option C</label>' +
                '<input type="text" placeholder="Option C" class="option_c form-control" required />' +
                '</div>' +
                '<div class="form-group">' +
                '<label>Option D</label>' +
                '<input type="text" placeholder="Option D" class="option_d form-control" required />' +
                '</div>' +
                '<div class="form-group">' +
                '<label>Correct Answer</label>' +
                '<select name="category_id" class="form-control correct_answer">' +
                '<option value="option_a">Option A</option>' +
                '<option value="option_b">Option B</option>' +
                '<option value="option_c">Option C</option>' +
                '<option value="option_d">Option D</option>' +
                '/select>' +
                '</div>' +
                '</form>',
            buttons: {
                formSubmit: {
                    text: 'Submit',
                    btnClass: 'btn-blue',
                    action: function() {
                        var question = this.$content.find('.question').val();
                        var option_a = this.$content.find('.option_a').val();
                        var option_b = this.$content.find('.option_b').val();
                        var option_c = this.$content.find('.option_c').val();
                        var option_d = this.$content.find('.option_d').val();
                        var correct_answer = this.$content.find('.correct_answer').val();
                        // $.alert(question + option_a + option_b + option_c + option_d);
                        var url = "{{route('admin.quiz.store')}}";
                        $.ajax({
                            type: 'POST',
                            url: url,
                            dataType: 'json',
                            data: {
                                'question': question,
                                'option_a': option_a,
                                'option_b': option_b,
                                'option_c': option_c,
                                'option_d': option_d,
                                'correct_answer': correct_answer,
                                _token: '{{csrf_token()}}'
                            },
                            success: function(response) {},
                            error: function(response) {
                                alert("Update Successfully !");
                                location.reload();
                            }
                        });
                    }
                },
                cancel: function() {
                    //close
                },
            },
            onContentReady: function() {
                // bind to events
                var jc = this;
                this.$content.find('form').on('submit', function(e) {
                    // if the user submits the form by pressing enter in the field.
                    e.preventDefault();
                    jc.$$formSubmit.trigger('click'); // reference the button and click it
                });
            }
        });
    });
</script>


@endsection
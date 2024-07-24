@extends('layouts.admin')
@section('title', 'खाता चार्ट')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.12/themes/default/style.min.css" />

<div class="row">
    <div class="col-lg-12 col-sm-12">
        <section class="card">
            <header class="card-header">
                खाता चार्ट
                <span class="tools pull-right d-flex">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="card-body">
                <div id="treeview" style="height: 400px;"></div>
            </div>
        </section>
    </div>
</div>

<!-- Modal -->
<div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Node Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="treeview_form" class="form-vertical" method="post">
                    @csrf
                    <input type="hidden" name="_method" id="method_field" value="POST">
                    <input type="hidden" name="id" id="node_id" value="">
                    <div id="newData" class="row">
                        <div class="col-sm-12">
                            <div class="row form-custom">
                                <label class="col-sm-3"><b>Head Code</b></label>
                                <div class="col-sm-9">
                                    <input type="text" name="txtHeadCode" id="txtHeadCode" class="form_input form-control" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row form-custom">
                                <label class="col-sm-3"><b>Head Name</b></label>
                                <div class="col-sm-9">
                                    <input type="text" name="txtHeadName" id="txtHeadName" class="form_input form-control" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row form-custom">
                                <label class="col-sm-3"><b>Parent Head</b></label>
                                <div class="col-sm-9">
                                    <input type="text" id="txtPHeadName" class="form_input form-control" readonly="readonly" value="">
                                    <input type="hidden" name="txtPHead" id="txtPHead" class="form_input form-control" readonly="readonly" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row form-custom">
                                <label class="col-sm-3"><b>Head Level</b></label>
                                <div class="col-sm-9">
                                    <input type="text" name="txtHeadLevel" id="txtHeadLevel" class="form_input form-control" readonly="readonly" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row form-custom">
                                <label class="col-sm-3"><b>Head Type</b></label>
                                <div class="col-sm-9">
                                    <input type="text" name="txtHeadType" id="txtHeadType" class="form_input form-control" readonly="readonly" value="A">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row mx-0">
                                <div class="col-sm-9 col-sm-offset-3">
                                    <input type="button" name="btnNew" id="btnNew" value="New" class="btn btn-sub btn-info">
                                    <input type="button" name="btnNewSave" id="btnNewSave" value="Save" class="btn btn-sub btn-success">
                                    <input type="button" name="btnUpdate" id="btnUpdate" value="Update" class="btn btn-sub btn-primary" style="display: none;">
                                    <button type="button" class="btn btn-sub btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<!-- Include jQuery -->
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
<!-- Include Bootstrap CSS and JS -->
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script> --}}
<!-- Include jsTree CSS and JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.12/jstree.min.js"></script>

<script>
$(document).ready(function() {
    // Initialize jsTree
    $('#btnNewSave').hide();
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    // Set up the CSRF token in the AJAX setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    });

    $('#treeview').jstree({
        'core': {
            'data': {!! $nodes->toJson() !!}
        }
    });

    // Handle node click event
    $('#treeview').on('select_node.jstree', function(e, data) {
        let selectedNode = data.node;
        let headLevel = data.node.parents.length - 1;
        let parentNodeId = selectedNode.parent;
        let parentNode = parentNodeId === '#' ? { text: 'None' } : $('#treeview').jstree(true).get_node(parentNodeId);
        let parentName = parentNode ? parentNode.text : 'None';

        $('#txtHeadCode').val(selectedNode.id);
        $('#txtHeadName').val(selectedNode.text);
        $('#txtPHead').val(parentNodeId === '#' ? '' : selectedNode.parent);
        $('#txtHeadLevel').val(headLevel);
        $('#txtPHeadName').val(parentName);
        $('#btnNewSave').hide();
        $('#btnUpdate').show();
        $('.modal').modal('show');
    });

    // Handle "New" button click
    $('#btnNew').click(function() {
        var selectedNode = $('#treeview').jstree('get_selected', true)[0];
        if (selectedNode) {
            var newNode = selectedNode.children.length + 1;
            var newHeadCode = selectedNode.id + '.' + newNode;
            var headLevel = selectedNode.parents.length;
            $('#txtHeadCode').val(newHeadCode);
            $('#txtPHead').val(selectedNode.id);
            $('#txtHeadLevel').val(headLevel);
            $('#txtPHeadName').val(selectedNode.text);
            $('#txtHeadName').val('');
        } else {
            $('#txtHeadCode').val('1');
            $('#txtPHead').val('');
            $('#txtHeadLevel').val('0');
            $('#txtPHeadName').val('None');
            $('#txtHeadName').val('');
        }
        $('#btnUpdate').hide();
        $('#btnNewSave').show();
        $('.modal').modal('show');
    });

    // Handle "Save" button click
    $('#btnNewSave').click(function() {
        var formData = {
            txtHeadCode: $('#txtHeadCode').val(),
            txtHeadName: $('#txtHeadName').val(),
            txtPHead: $('#txtPHead').val(),
            txtHeadLevel: $('#txtHeadLevel').val(),
            txtHeadType: $('#txtHeadType').val()
        };

        $.ajax({
            url: '{{ route("admin.coa.store") }}',
            method: 'POST',
            data: formData,
            success: function(response) {
                alert(response.message);
                location.reload();
            },
            error: function(xhr, status, error) {
                alert('An error occurred while saving the node: ' + error);
            }
        });
    });

    // Handle "Update" button click
    $('#btnUpdate').click(function() {
        var nodeId = $('#txtHeadCode').val();
        var formData = {
            txtHeadCode: $('#txtHeadCode').val(),
            txtHeadName: $('#txtHeadName').val(),
            txtPHead: $('#txtPHead').val(),
            txtHeadLevel: $('#txtHeadLevel').val(),
            txtHeadType: $('#txtHeadType').val(),
            _method: 'PUT', // Laravel expects this for PUT requests
            _token: csrfToken // Ensure CSRF token is included
        };

        $.ajax({
            url: '{{ url("/admin/coa/update") }}/' + nodeId, // Directly concatenate node ID
            method: 'PUT', // Use POST with _method=PUT to comply with Laravel's routing
            data: formData,
            success: function(response) {
                alert(response);
                location.reload();
            },
            error: function(xhr, status, error) {
                alert('An error occurred while updating the node: ' + error);
            }
        });
    });
});
</script>
@endsection

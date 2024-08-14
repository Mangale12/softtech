@extends('layouts.admin')
@section('styles')
<link href="{{ asset('assets/cms/vendors/DataTables/datatables.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<style>
    .container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}

.dialog {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    align-items: center;
    justify-content: center;
}

.dialog-content {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    text-align: center;
    width: 300px;
}

.dialog-content .btn {
    margin: 10px;
    padding: 10px 20px;
    border: none;
    color: #fff;
    cursor: pointer;
}

.dialog-content .btn-success {
    background: #4caf50;
}

.dialog-content .btn-danger {
    background: #f44336;
}
</style>
@endsection
@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4  text-primary">Users Management</h1>
        <a href="{{route('admin.users.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus fa-sm text-white-50"></i> Create New User</a>
    </div>

    <div class="card">
        <div class="card-body" style="overflow-x: auto;">
            <table class="table table-bordered table-hover" id="example-table" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Position</th>
                        <th>Member Type</th>
                        <th>Profile</th>
                        <th>Company Name</th>
                        <th>Founded Year</th>
                        <th>Company Logo</th>
                        <th>PAN No</th>
                        <th>PAN Photo</th>
                        <th>Registration No</th>
                        <th>Company Register File</th>
                        <th>Tax Clearance Certificate</th>
                        <th>Is Approved</th>
                        <th>Applied at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $key => $row)
                        @php
                            $legal_documents = $row->member ? json_decode($row->member->legal_documents, true) : [];
                            $company = $row->member ? json_decode($row->member->company, true) : [];
                        @endphp
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->mobile }}</td>
                            <td>{{ $row->member->member_post ?? '' }}</td>
                            <td>{{ $row->member->memberType->title ?? '' }}</td>
                            <td>
                                @if(isset($row->avatar))
                                    <img src="{{ asset($row->avatar) }}" width="45px" class="img-thumbnail" data-toggle="modal" data-target="#imageModal" data-image="{{ asset($row->avatar) }}" />
                                @endif
                            </td>
                            <td>{{ $company['company_name'] ?? '' }}</td>
                            <td>{{ $company['company_founded_year'] ?? '' }}</td>
                            <td>
                                @if(!empty($company['company_logo']))
                                    <img src="{{ asset($company['company_logo']) }}" alt="Company Logo" height="50" width="50" class="img-thumbnail" data-toggle="modal" data-target="#imageModal" data-image="{{ asset($company['company_logo']) }}">
                                @else
                                    <span>Unavailable</span>
                                @endif
                            </td>
                            <td>{{ $legal_documents['pan']['pan_no'] ?? '' }}</td>
                            <td>
                                @if(!empty($legal_documents['pan']['image']))
                                    <img src="{{ asset($legal_documents['pan']['image']) }}" alt="PAN" class="img-thumbnail mt-2" height="50" width="50" data-toggle="modal" data-target="#imageModal" data-image="{{ asset($legal_documents['pan']['image']) }}">
                                @else
                                    <span>Unavailable</span>
                                @endif
                            </td>
                            <td>{{ $legal_documents['company']['register_no'] ?? '' }}</td>
                            <td>
                                @if(!empty($legal_documents['company']['register_file']))
                                    <img src="{{ asset($legal_documents['company']['register_file']) }}" alt="Register File" class="img-thumbnail mt-2" height="50" width="50" data-toggle="modal" data-target="#imageModal" data-image="{{ asset($legal_documents['company']['register_file']) }}">
                                @else
                                    <span>Unavailable</span>
                                @endif
                            </td>
                            <td>
                                @if(!empty($legal_documents['tax_clearance']))
                                    <img src="{{ asset($legal_documents['tax_clearance']) }}" alt="Tax Clearance" class="img-thumbnail mt-2" width="50" height="50" data-toggle="modal" data-target="#imageModal" data-image="{{ asset($legal_documents['tax_clearance']) }}">
                                @else
                                    <span>Unavailable</span>
                                @endif
                            </td>
                            <td>
                                <label class="container">
                                    <input type="checkbox" {{ $row->is_verified == 1 ? 'checked' : '' }} class="is-verified" data-id="{{ $row->id }}">
                                    <span class="checkmark"></span>
                                </label>
                            </td>
                            <td>{{ $row->created_at->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('admin.users.edit', $row->id) }}" class="btn btn-warning btn-xs" data-toggle="tooltip" title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ route('admin.users.show', $row->id) }}" class="btn btn-info btn-xs" data-toggle="tooltip" title="Show">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.admin_users.reset', $row->id) }}" class="btn btn-primary btn-xs" data-toggle="tooltip" title="Reset Password">
                                    <i class="fa fa-key"></i>
                                </a>
                                <a href="{{ route('admin.users.delete', $row->id) }}" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Delete" onClick="return confirm('Do you want to delete?')">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="18" class="text-center">No records found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Image Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Image View</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img id="modal-image" src="" class="img-fluid" alt="Image Preview">
                </div>
            </div>
        </div>
    </div>




</div>

 <!-- Confirmation dialog -->
 <div id="confirmationDialog" class="dialog" >
    <div class="dialog-content" style="margin-left: 39%; margin-top: 13%;">
        <p>Are you sure you want to change the status?</p>
        <button id="confirmYes" class="btn btn-success">Yes</button>
        <button id="confirmNo" class="btn btn-danger">No</button>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('assets/cms/vendors/DataTables/datatables.min.js')}}"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

        $(function() {
            $('#example-table').DataTable({
                pageLength: 10,
                responsive: true

            });
        })
    });
</script>

    <script>
        $(document).ready(function() {
            let currentCheckbox;

            // Open confirmation dialog
            $('.is-verified').on('change', function() {
                currentCheckbox = $(this);
                $('#confirmationDialog').show();
            });

            // Confirm status change
            $('#confirmYes').on('click', function() {
                let id = currentCheckbox.data('id');
                let isChecked = currentCheckbox.is(':checked');
                $.ajax({
                    url: '{{ url("admin/member-list/verified_user") }}/'+id,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        is_verified: isChecked ? 1 : 0
                    },
                    success: function(response) {
                        $('#confirmationDialog').hide();
                    },
                    error: function(xhr) {
                        console.error('Error:', xhr.responseText);
                    }
                });
            });

            // Cancel status change
            $('#confirmNo').on('click', function() {
                $('#confirmationDialog').hide();
                currentCheckbox.prop('checked', !currentCheckbox.is(':checked'));
            });

            // Close the dialog when clicking outside of it
            $(window).on('click', function(event) {
                if ($(event.target).is('#confirmationDialog')) {
                    $('#confirmationDialog').hide();
                }
            });
        });
    </script>

<script>
    $('#imageModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var image = button.data('image');
        var modal = $(this);
        modal.find('#modal-image').attr('src', image);
    });
</script>
@endsection

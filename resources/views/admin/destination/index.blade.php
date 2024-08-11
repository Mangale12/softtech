@extends('layouts.admin')
@section('styles')
<link href="{{ asset('assets/cms/vendors/DataTables/datatables.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endsection
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4  text-primary"> {{ $_panel }} List</h1>
        <a href="{{route( $_base_route.'.create' )}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus fa-sm text-white-50"></i> Add {{ $_panel }} </a>
    </div>
    <div class="ibox">
        <div class="ibox-body">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="newrequest">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Destination</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $data['category'] as $key=> $row)
                            <tr>
                                <td>{{ $key+1}}.</td>
                                <td>{{ $row->title }}</td>
                                <td>
                                    <input data-id="{{ $row->id }}" class="toggle-class" type="checkbox" data-toggle="toggle" data-on="Active" data-off="Inactive" {{ $row->status ? 'checked' : '' }}>
                                </td>
                                <td>
                                    @if(Route::has($_base_route.'.edit'))
                                    <a href="{{ URL::route($_base_route.'.edit', ['id' => $row->id]) }}">
                                        <button class="btn btn-default btn-xs m-r-5" data-toggle="tooltip" data-original-title="Edit" style="cursor: pointer;"><i class="fa fa-pencil font-14"></i></button></a>
                                    @endif
                                    @if(Route::has($_base_route.'.destroy'))
                                    <button id="delete" data-id="{{ $row->id }}" class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Delete" data-url="{{ URL::route($_base_route.'.destroy', ['id' => $row->id]) }}" style="cursor:pointer;"><i class="fa fa-trash font-14"></i></button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/cms/vendors/DataTables/datatables.min.js')}}"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<script>
    $(function() {
        $('.toggle-class').on('change', function() {
            var status = $(this).prop('checked') ? 1 : 0;
            var id = $(this).data('id');

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '{{ route($_base_route.".status") }}',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id': id,
                    'status': status
                },
                success: function(data) {
                    alert(data.success);
                },
                error: function(data) {
                    alert('Error updating status.');
                }
            });
        });

        $('#example-table').DataTable({
            pageLength: 10,
            responsive: true
        });
    });
</script>
@endsection

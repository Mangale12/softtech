@if(Route::has($_base_route.'.destroy'))
{{-- <button id="delete" data-id="{{ $row->id }}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete" data-url="{{ URL::route($_base_route.'.destroy', ['id' => $row->id]) }}" style="cursor:pointer;"><i class="fa fa-trash-o "></i></button> --}}
<button id="delete" data-id="{{ $row->id }}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete" data-url="{{ URL::route($_base_route.'.destroy', ['id' => $row->id]) }}{{ !empty($udhyogName) ? '?udhyog=' . $udhyogName : '' }}" style="cursor:pointer;">
    <i class="fa fa-trash-o"></i>
</button>

@endif

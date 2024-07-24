<td>
    @include('admin.section.buttons.button-edit')
    @if($udhyogName == 'hybridbiu')
        <a href="{{ route('admin.udhyog.'.$udhyogName.'.inventory.seed_order.create') }}?supplier={{ $row->id }}" class="btn btn-primary btn-sm m-r-5" data-toggle="tooltip" data-original-title="Edit" style="cursor: pointer;">
            <i class="fa fa-plus font-14"></i>
        </a>
    @else
        @if (strpos(request()->url(), '/products') == false)
        <a href="{{ route('admin.inventory.raw_materials.create') }}?udhyog={{ request()->udhyog }}&supplier={{ $row->id }}" class="btn btn-primary btn-sm m-r-5" data-toggle="tooltip" data-original-title="Edit" style="cursor: pointer;">
            {{-- <a href="{{ route('admin.udhyog.'.$udhyogName.'.inventory.raw_materials.create') }}?udhyog={{ request()->udhyog }}&supplier={{ $row->id }}" class="btn btn-primary btn-sm m-r-5" data-toggle="tooltip" data-original-title="Edit" style="cursor: pointer;"> --}}
                <i class="fa fa-plus font-14"></i>
            </a>
        @endif
    @endif
    @include('admin.section.buttons.button-view')
    @include('admin.section.buttons.button-delete')

</td>

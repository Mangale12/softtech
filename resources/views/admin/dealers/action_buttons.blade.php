@include('admin.section.buttons.button-edit')
<a href="{{ route('admin.udhyog.'.$udhyogName.'.inventory.dealers.orders',['id'=>$row->id]) }}?udhyog={{ request()->udhyog }}" class="btn btn-primary btn-sm m-r-5" data-toggle="tooltip" data-original-title="Edit" style="cursor: pointer;"><i class="fa fa-plus font-14"></i></a>
@include('admin.section.buttons.button-view')
@include('admin.section.buttons.button-delete')

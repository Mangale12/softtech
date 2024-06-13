@if(Route::has($_base_route.'.view'))
<a class="btn btn-primary btn-sm" href="{{ URL::route($_base_route.'.view', ['id' => $row->id]) }}" style="cursor:pointer;"><i class="fa fa-eye"></i></i></a>
@endif

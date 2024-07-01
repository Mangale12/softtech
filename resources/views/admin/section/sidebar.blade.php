<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion" style="font-weight:bold;">
            @if(Route::has('admin.index'))
            <li><a href="{{ URL::route('admin.index') }}" class="{{ ($_panel == 'Dashboard') ? 'active' : '' }}"><i class="fa fa-dashboard"></i><span>{{__('ड्याशबोर्ड')}}</span></a></li>
            @endif

            <li class="sub-menu">
                <a href="javascript:;" class="{{ ($_panel == 'Other Material' || $_panel == 'Finance Title' || $_panel == 'Damage Type' || $_panel == 'Worker Types' || $_panel == 'Worker Position'|| $_panel == 'Worker List'|| $_panel == 'Fiscal' || $_panel == 'Udhyog List'|| $_panel == 'Product List' || $_panel == 'Unit' || $_panel == 'Block' || $_panel == 'Blod' || $_panel == 'Ritu' || $_panel == 'State Month' || $_panel == 'Animal Category' || $_panel == 'Animal' || $_panel == 'Agriculture Category' || $_panel == 'Beema Category' || $_panel == 'Mal Bibran' || $_panel == 'Anudaan Category'|| $_panel == 'Biu Bijan'|| $_panel == 'Mesinary'|| $_panel == 'Sangrachana' || $_panel == 'Worker Type' ) ? 'active' : '' }}">
                    <i class="fa fa-gears"></i>
                    <span>मुख्य सेटअप</span>
                </a>
                <ul class="sub">
                    <li class="{{ ($_panel == 'Fiscal') ? 'active' : '' }}"><a href="{{ URL::route('admin.fiscal.index') }}"><span> {{ __('आर्थिक बर्ष सेटअप') }}</span></a></li>
                    <li class="{{ ($_panel == 'Unit') ? 'active' : '' }}"><a href="{{ URL::route('admin.unit.index') }}"><span> {{ __('यूनिट/मापन सेटअप') }}</span></a></li>
                     <li class="{{ ($_panel == 'Block') ? 'active' : '' }}"><a href="{{ URL::route('admin.block.index') }}"><span> {{ __('ब्लक सेटअप') }}</span></a></li>
                    <li class="{{ ($_panel == 'Animal Category') || ($_panel == 'Animal')  ? 'active' : '' }}"><a href="{{ URL::route('admin.animal-category.index') }}"><span> {{ __('पशुपन्छी सेटअप') }}</span></a></li>
                    <li class="{{ ($_panel == 'Agriculture Category') || ($_panel == 'Agriculture') ? 'active' : '' }}"><a href="{{ URL::route('admin.agriculture-category.index') }}"><span> {{ __('बालीनाली सेटअप') }}</span></a></li>
                    <li class="{{ ($_panel == 'Beema Category') ? 'active' : '' }}"><a href="{{ URL::route('admin.beema-category.index') }}"><span> {{ __('बिमा सेटअप') }}</span></a></li>
                    <li class="{{ ($_panel == 'Anudaan Category') ? 'active' : '' }}"><a href="{{ URL::route('admin.anudaan-category.index') }}"><span> {{ __('अनुदान सेटअप') }}</span></a></li>
                    <li class="{{ ($_panel == 'Mal Bibran') ? 'active' : '' }}"><a href="{{ URL::route('admin.mal-bibran.index') }}"><span> {{ __('मल बिबरण सेटअप') }}</span></a></li>
                    {{-- <li class="{{ ($_panel == 'Biu Bijan') ? 'active' : '' }}"><a href="{{ URL::route('admin.biu-bijan.index') }}"><span> {{ __('बिउ बिजन सेटअप') }}</span></a></li> --}}
                    <li class="{{ ($_panel == 'Finance Title') ? 'active' : '' }}"><a href="{{ URL::route('admin.finance_titles.index') }}"><span> {{ __('फाइनान्सको शीर्षक') }}</span></a></li>
                    <li class="{{ ($_panel == 'Mesinary') ? 'active' : '' }}"><a href="{{ URL::route('admin.mesinary.index') }}"><span> {{ __('मेसिनरी तथा औजार सेटअप') }}</span></a></li>
                    <li class="{{ ($_panel == 'Sangrachana') ? 'active' : '' }}"><a href="{{ URL::route('admin.sangrachana.index') }}"><span> {{ __('भौतिक संरचना सेटअप') }}</span></a></li>

                    <li class="{{ $_panel == 'Damage Type' ? 'active' : '' }}"><a href="{{ URL::route('admin.inventory.damage_types.index') }}"><span> {{__('क्षतिको प्रकार')}}</span></a></li>
                    <li class="{{ $_panel == 'Other Material' ? 'active' : '' }}"><a href="{{ URL::route('admin.other_material.index') }}"><span> {{__('अन्य सामग्री')}}</span></a></li>

                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="{{ ($_panel == 'Users' || $_panel == 'Role' || $_panel == 'Permission')   ? 'active' : '' }}">
                    <i class="fa fa-users"></i>
                    <span>कार्यालय प्रयोगकर्ता रोल</span>
                </a>
                <ul class="sub">
                    @if(Route::has('admin.users.index'))
                    <li class="{{ ($_panel == 'Users') ? 'active' : '' }}"><a href="{{ URL::route('admin.users.index') }}"><span> {{ __('कार्यालय प्रयोगकर्ता हरु') }}</span></a></li>
                    @endif

                    @if(Route::has('admin.roles.index'))
                    <li class="{{ ($_panel == 'Role') ? 'active' : '' }}"><a href="{{ URL::route('admin.roles.index') }}"><span> {{ __('भूमिका') }}</span></a></li>
                    @endif
                    {{-- @if(Route::has('admin.permissions.index'))
                    <li class="{{ ($_panel == 'Permission') ? 'active' : '' }}"><a href="{{ URL::route('admin.permissions.index') }}"><span> {{ __('अनुमति') }}</span></a></li>
                    @endif --}}
                    {{-- <li><a class="" href="#"></span></a></li> --}}
                </ul>
            </li>

            <li class="sub-menu">
                    <a href="javascript:;" class=" {{ request()->is('admin/udhyog*') ? 'active' : '' }}">
                    <i class="fa fa-shopping-cart"></i>
                    <span>उद्योगहरु </span>
                </a>
                <ul class="sub">
                    <li>
                        <a href="#" class="{{ request()->is('admin/udhyog/achar*') ? 'active' : '' }}"><span>{{__('अचार')}}</span></a>
                        <ul class="sub">
                            <li class="sub-menu">
                                <a href="javascript:;" class="{{ request()->is('admin/udhyog/achar/inventory*') ? 'active' : '' }}">
                                    <i class="fa fa-money"></i>
                                    <span>इन्भेन्टरी सेटअप</span>
                                </a>
                                <ul class="sub">
                                    <li class="{{ request()->is('admin/udhyog/achar/inventory/suppliers*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.achar.inventory.suppliers.index') }}?udhyog=achar"><span> {{__('सप्लाइर्स')}}</span></a></li>
                                    <li class="{{ (request()->is('admin/udhyog/achar/inventory/raw-materials*') || request()->is('admin/udhyog/achar/inventory/raw-material-name*')) ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.achar.inventory.raw_material_name.index') }}?udhyog=achar"><span> {{__('कच्चा पद्दार्थ')}}</span></a></li>
                                    <li class="{{ request()->is('admin/udhyog/achar/inventory/products*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.achar.inventory.products.index') }}?udhyog=achar"><span> {{__('उत्पादन')}}</span></a></li>
                                    <li class="{{ request()->is('admin/udhyog/achar/inventory/production-batch*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.achar.inventory.production_batch.index') }}?udhyog=achar"><span> {{__('उत्पादन ब्याच')}}</span></a></li>
                                    <li class="{{ request()->is('admin/udhyog/achar/inventory/dealers*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.achar.inventory.dealers.index') }}?udhyog=achar"><span> {{__('डिलर/व्यक्ति')}}</span></a></li>
                                    <li class="{{ request()->is('admin/udhyog/achar/inventory/sales_orders*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.achar.inventory.sales_orders.index') }}?udhyog=achar"><span> {{__('बिक्री/बिक्री आदेश')}}</span></a></li>
                                    <li class="{{ request()->is('admin/udhyog/achar/inventory/products*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.achar.inventory.products.inventory') }}?udhyog=achar"><span> {{__('इन्भेन्टरी')}}</span></a></li>
                                    <li class="{{ request()->is('admin/udhyog/achar/inventory/damage-records*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.achar.inventory.damage_records.index') }}?udhyog=achar"><span> {{__('क्षति अभिलेख')}}</span></a></li>
                                    <li class="{{ request()->is('admin/udhyog/achar/inventory/low-stock*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.achar.inventory.products.low_stock') }}?udhyog=achar"><span> {{__('कम स्टक')}}</span></a></li>
                                    <li class="{{ request()->is('admin/udhyog/achar/inventory/production-batch/view-alert*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.achar.inventory.production_batch.view_alert') }}?udhyog=achar"><span> {{__('चेतावनी उत्पादन')}}</span></a></li>



                                </ul>
                            </li>
                            <li class="{{ request()->is('admin/udhyog/achar/worker*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.achar.workers.workerstype.index') }}"><span>{{__('कामदार')}}</span></a></li>
                            <li class="{{ request()->is('admin/udhyog/achar/fianance*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.achar.fianance.index') }}"><span>{{__('फाइनान्स/लेखा शीर्षक')}}</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="{{ request()->is('admin/udhyog/aluchips*') ? 'active' : '' }}"><span>{{__('आलु चिप्स ')}}</span></a>
                        <ul class="sub">
                            <li class="sub-menu">
                                <a href="javascript:;" class="{{ request()->is('admin/udhyog/aluchips/inventory*') ? 'active' : '' }}">
                                    <i class="fa fa-money"></i>
                                    <span>इन्भेन्टरी सेटअप</span>
                                </a>
                                <ul class="sub">
                                    <li class="{{ request()->is('admin/udhyog/aluchips/inventory/suppliers*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.aluchips.inventory.suppliers.index') }}?udhyog=alu chips"><span> {{__('सप्लाइर्स')}}</span></a></li>
                                    <li class="{{ (request()->is('admin/udhyog/aluchips/inventory/raw-materials*') || request()->is('admin/udhyog/aluchips/inventory/raw-material-name*')) ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.aluchips.inventory.raw_materials.index') }}?udhyog=alu chips"><span> {{__('कच्चा पद्दार्थ')}}</span></a></li>
                                    {{-- <li class="{{ ($_panel == 'Raw Material Inventory' || $_panel == 'Low Stock Raw Material') ? 'active' : '' }}"><a href="{{ URL::route('admin.inventory.raw_materials.inventory') }}"><span> {{__('कच्चा पदार्थ सूची')}}</span></a></li> --}}
                                    <li class="{{ request()->is('admin/udhyog/aluchips/inventory/products*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.aluchips.inventory.products.index') }}?udhyog=alu chips"><span> {{__('उत्पादन')}}</span></a></li>
                                    <li class="{{ request()->is('admin/udhyog/aluchips/inventory/production-batch*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.aluchips.inventory.production_batch.index') }}?udhyog=alu chips"><span> {{__('उत्पादन ब्याच')}}</span></a></li>
                                    <li class="{{ request()->is('admin/udhyog/aluchips/inventory/dealers*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.aluchips.inventory.dealers.index') }}?udhyog=alu chips"><span> {{__('डिलर/व्यक्ति')}}</span></a></li>
                                    <li class="{{ request()->is('admin/udhyog/aluchips/inventory/sales_orders*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.aluchips.inventory.sales_orders.index') }}?udhyog=alu chips"><span> {{__('बिक्री/बिक्री आदेश')}}</span></a></li>
                                    <li class="{{ request()->is('admin/udhyog/aluchips/inventory/products*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.aluchips.inventory.products.inventory') }}?udhyog=alu chips"><span> {{__('इन्भेन्टरी')}}</span></a></li>
                                    {{-- <li class="{{ ($_panel == 'Inventory Product') ? 'active' : '' }}"><a href="{{ URL::route('admin.inventory.products.index') }}"><span> {{__('उत्पादन')}}</span></a></li> --}}
                                    {{-- <li class="{{ request()->is('admin/udhyog/aluchips/inventory/damage_types*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.aluchips.inventory.damage_types.index') }}?udhyog=alu chips"><span> {{__('क्षतिको प्रकार')}}</span></a></li> --}}
                                    <li class="{{ request()->is('admin/udhyog/aluchips/inventory/damage-records*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.aluchips.inventory.damage_records.index') }}?udhyog=alu chips"><span> {{__('क्षति अभिलेख')}}</span></a></li>
                                    <li class="{{ request()->is('admin/udhyog/aluchips/inventory/products/low-stock*') || request()->is('admin/udhyog/aluchips/inventory/raw-materials/low-stock*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.aluchips.inventory.products.low_stock') }}?udhyog=alu chips"><span> {{__('कम स्टक')}}</span></a></li>
                                    <li class="{{ request()->is('admin/udhyog/aluchips/inventory/production-batch/view-alert*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.aluchips.inventory.production_batch.view_alert') }}?udhyog=alu chips"><span> {{__('चेतावनी उत्पादन')}}</span></a></li>



                                </ul>
                            </li>
                            {{-- <li class="{{ ($_panel == 'panel') ? 'active' : '' }}"><a href="#"><span>{{__('फाइनान्स')}}</span></a></li> --}}
                            <li class="{{ ($_panel == 'Udhyog Aluchips Workers Type' || $_panel == 'Udhyog Aluchips Workers List' || $_panel == 'Udhyog Alu Chips Workers' || $_panel == 'Udhyog Aluchips Workers Position') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.aluchips.workers.workerstype.index') }}"><span>{{__('कामदार')}}</span></a></li>
                            <li class="{{ ($_panel == 'Udhyog Alu Chips') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.aluchips.fianance.index') }}"><span>{{__('लेखा शीर्षक')}}</span></a></li>
                            <li class="{{ ($_panel == 'Udhyog Alu Chips') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.aluchips.fianance.index') }}"><span>{{__('फाइनान्स')}}</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="{{ request()->is('admin/udhyog/dudh*') ? 'active' : '' }}"><span>{{__('दुध')}}</span></a>
                        <ul class="sub">
                            <li class="sub-menu">
                                <a href="javascript:;" class="{{ request()->is('admin/udhyog/dudh/inventory*') ? 'active' : '' }}">
                                    <i class="fa fa-money"></i>
                                    <span>इन्भेन्टरी सेटअप</span>
                                </a>
                                <ul class="sub">
                                    <li class="{{ request()->is('admin/udhyog/dudh/inventory/suppliers*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.dudh.inventory.suppliers.index') }}?udhyog=dudh"><span> {{__('सप्लाइर्स')}}</span></a></li>
                                    <li class="{{ (request()->is('admin/udhyog/dudh/inventory/raw-materials*') || request()->is('admin/udhyog/dudh/inventory/raw-material-name*')) ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.dudh.inventory.raw_materials.index') }}?udhyog=dudh"><span> {{__('कच्चा पद्दार्थ')}}</span></a></li>
                                    {{-- <li class="{{ ($_panel == 'Raw Material Inventory' || $_panel == 'Low Stock Raw Material') ? 'active' : '' }}"><a href="{{ URL::route('admin.inventory.raw_materials.inventory') }}"><span> {{__('कच्चा पदार्थ सूची')}}</span></a></li> --}}
                                    <li class="{{ request()->is('admin/udhyog/dudh/inventory/products*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.dudh.inventory.products.index') }}?udhyog=dudh"><span> {{__('उत्पादन')}}</span></a></li>
                                    <li class="{{ request()->is('admin/udhyog/dudh/inventory/production-batch*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.dudh.inventory.production_batch.index') }}?udhyog=dudh"><span> {{__('उत्पादन ब्याच')}}</span></a></li>
                                    <li class="{{ request()->is('admin/udhyog/dudh/inventory/dealers*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.dudh.inventory.dealers.index') }}?udhyog=dudh"><span> {{__('डिलर/व्यक्ति')}}</span></a></li>
                                    <li class="{{ request()->is('admin/udhyog/dudh/inventory/sales_orders*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.dudh.inventory.sales_orders.index') }}?udhyog=dudh"><span> {{__('बिक्री/बिक्री आदेश')}}</span></a></li>
                                    <li class="{{ request()->is('admin/udhyog/dudh/inventory/products*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.dudh.inventory.products.inventory') }}?udhyog=dudh"><span> {{__('इन्भेन्टरी')}}</span></a></li>
                                    {{-- <li class="{{ ($_panel == 'Inventory Product') ? 'active' : '' }}"><a href="{{ URL::route('admin.inventory.products.index') }}"><span> {{__('उत्पादन')}}</span></a></li> --}}
                                    <li class="{{ request()->is('admin/udhyog/dudh/inventory/damage-records*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.dudh.inventory.damage_records.index') }}?udhyog=dudh"><span> {{__('क्षति अभिलेख')}}</span></a></li>
                                    <li class="{{ request()->is('admin/udhyog/dudh/inventory/products/low-stock*') || request()->is('admin/udhyog/dudh/inventory/raw-materials/low-stock*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.dudh.inventory.products.low_stock') }}?udhyog=dudh"><span> {{__('कम स्टक')}}</span></a></li>
                                    <li class="{{ request()->is('admin/udhyog/dudh/inventory/production-batch/view-alert*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.dudh.inventory.production_batch.view_alert') }}?udhyog=dudh"><span> {{__('चेतावनी उत्पादन')}}</span></a></li>



                                </ul>
                            </li>
                            {{-- <li class="{{ ($_panel == 'panel') ? 'active' : '' }}"><a href="#"><span>{{__('फाइनान्स')}}</span></a></li> --}}
                            <li class="{{ ($_panel == 'Udhyog Dudh Workers Type' || $_panel == 'Udhyog Dudh Workers Position' || $_panel == 'Udhyog Dudh Workers List' || $_panel == 'Udhyog Dudh Workers') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.dudh.workers.workerstype.index') }}"><span>{{__('कामदार')}}</span></a></li>
                            <li class="{{ ($_panel == 'Udhyog dudh') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.dudh.fianance.index') }}"><span>{{__('फाइनान्स/लेखा शीर्षक')}}</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="{{ request()->is('admin/udhyog/papad*') ? 'active' : '' }}"><span>{{__('पापड')}}</span></a>
                        <ul class="sub">
                            <li class="sub-menu">
                                <a href="javascript:;" class="{{ request()->is('admin/udhyog/papad/inventory*') ? 'active' : '' }}">
                                    <i class="fa fa-money"></i>
                                    <span>इन्भेन्टरी सेटअप</span>
                                </a>
                                <ul class="sub">
                                    <li class="{{ request()->is('admin/udhyog/papad/inventory/suppliers*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.papad.inventory.suppliers.index') }}?udhyog=papad"><span> {{__('सप्लाइर्स')}}</span></a></li>
                                    <li class="{{ (request()->is('admin/udhyog/papad/inventory/raw-materials*') || request()->is('admin/udhyog/aluchips/inventory/raw-material-name*')) ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.aluchips.inventory.raw_materials.index') }}?udhyog=papad"><span> {{__('कच्चा पद्दार्थ')}}</span></a></li>
                                    {{-- <li class="{{ ($_panel == 'Raw Material Inventory' || $_panel == 'Low Stock Raw Material') ? 'active' : '' }}"><a href="{{ URL::route('admin.inventory.raw_materials.inventory') }}"><span> {{__('कच्चा पदार्थ सूची')}}</span></a></li> --}}
                                    <li class="{{ request()->is('admin/udhyog/papad/inventory/products*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.papad.inventory.products.index') }}?udhyog=papad"><span> {{__('उत्पादन')}}</span></a></li>
                                    <li class="{{ request()->is('admin/udhyog/papad/inventory/production-batch*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.papad.inventory.production_batch.index') }}?udhyog=papad"><span> {{__('उत्पादन ब्याच')}}</span></a></li>
                                    <li class="{{ request()->is('admin/udhyog/papad/inventory/dealers*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.papad.inventory.dealers.index') }}?udhyog=papad"><span> {{__('डिलर/व्यक्ति')}}</span></a></li>
                                    <li class="{{ request()->is('admin/udhyog/papad/inventory/sales_orders*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.papad.inventory.sales_orders.index') }}?udhyog=papad"><span> {{__('बिक्री/बिक्री आदेश')}}</span></a></li>
                                    <li class="{{ request()->is('admin/udhyog/papad/inventory/products*') || request()->is('admin/udhyog/papad/inventory/raw-materials*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.papad.inventory.products.inventory') }}?udhyog=papad"><span> {{__('इन्भेन्टरी')}}</span></a></li>
                                    {{-- <li class="{{ ($_panel == 'Inventory Product') ? 'active' : '' }}"><a href="{{ URL::route('admin.inventory.products.index') }}"><span> {{__('उत्पादन')}}</span></a></li> --}}
                                    {{-- <li class="{{ request()->is('admin/udhyog/papad/inventory/damage_types*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.papad.inventory.damage_types.index') }}?udhyog=papad"><span> {{__('क्षतिको प्रकार')}}</span></a></li> --}}
                                    <li class="{{ request()->is('admin/udhyog/papad/inventory/damage-records*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.papad.inventory.damage_records.index') }}?udhyog=papad"><span> {{__('क्षति अभिलेख')}}</span></a></li>
                                    <li class="{{ request()->is('admin/udhyog/papad/inventory/products/low-stock*') || request()->is('admin/udhyog/papad/inventory/raw-materials/low-stock*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.papad.inventory.products.low_stock') }}?udhyog=papad"><span> {{__('कम स्टक')}}</span></a></li>
                                    <li class="{{ request()->is('admin/udhyog/papad/inventory/production-batch/view-alert*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.papad.inventory.production_batch.view_alert') }}?udhyog=papad"><span> {{__('चेतावनी उत्पादन')}}</span></a></li>



                                </ul>
                            </li>
                            {{-- <li class="{{ ($_panel == 'panel') ? 'active' : '' }}"><a href="#"><span>{{__('फाइनान्स')}}</span></a></li> --}}
                            <li class="{{ ( $_panel == 'Udhyog Papad Workers List' || $_panel == 'Udhyog Papad Workers Position' || $_panel == 'Udhyog Papad Workers' || $_panel == 'Udhyog Papad Workers Type') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.papad.workers.workerstype.index') }}"><span>{{__('कामदार')}}</span></a></li>
                            <li class="{{ ($_panel == 'Udhyog Papad') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.papad.fianance.index') }}"><span>{{__('फाइनान्स/लेखा शीर्षक')}}</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="{{ request()->is('admin/udhyog/hybridbiu*') ? 'active' : '' }}"><span>{{__('हैब्रिड बिउ')}}</span></a>
                        <ul class="sub">
                            {{-- <li class="{{ ($_panel == 'panel') ? 'active' : '' }}"><a href="#"><span>{{__('इन्भेन्टरी')}}</span></a></li> --}}
                            {{-- <li class="{{ ($_panel == 'panel') ? 'active' : '' }}"><a href="#"><span>{{__('फाइनान्स')}}</span></a></li> --}}
                            <li class="sub-menu">
                                <a href="javascript:;" class="{{ request()->is('admin/udhyog/hybridbiu/inventory*') ? 'active' : '' }}">
                                    <i class="fa fa-money"></i>
                                    <span>इन्भेन्टरी सेटअप</span>
                                </a>
                                <ul class="sub">
                                    <li class="{{ request()->is('admin/udhyog/hybridbiu/inventory/suppliers*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.hybridbiu.inventory.suppliers.index') }}?udhyog=Hybrid Biu"><span> {{__('सप्लाइर्स')}}</span></a></li>
                                    <li class="{{ request()->is('admin/udhyog/hybridbiu/inventory/seed-types*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.hybridbiu.inventory.seed_types.index') }}"><span> {{__('बिउको प्रकार ')}}</span></a></li>
                                    <li class="{{ request()->is('admin/udhyog/hybridbiu/inventory/seeds*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.hybridbiu.inventory.seeds.index') }}"><span> {{__('बिउ')}}</span></a></li>
                                    <li class="{{ request()->is('admin/udhyog/hybridbiu/inventory/seasons*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.hybridbiu.inventory.seasons.index') }}"><span> {{__('सिजन')}}</span></a></li>
                                    <li class="{{ request()->is('admin/udhyog/hybridbiu/inventory/seed-batch*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.hybridbiu.inventory.seed_batch.index') }}"><span> {{__('बीज उत्पादन ब्याच')}}</span></a></li>
                                    <li class="{{ request()->is('admin/udhyog/hybridbiu/inventory/products*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.hybridbiu.inventory.products.index') }}?udhyog=hybrid biu"><span> {{__('उत्पादन')}}</span></a></li>
                                    <li class="{{ request()->is('admin/udhyog/hybridbiu/inventory/khadhyanna*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.hybridbiu.inventory.khadhyanna.index') }}?udhyog=hybrid biu"><span> {{__('खाद्यान्न')}}</span></a></li>
                                    <li class="{{ request()->is('admin/udhyog/hybridbiu/inventory/dealers*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.hybridbiu.inventory.dealers.index') }}?udhyog=hybrid biu"><span> {{__('डिलर/व्यक्ति')}}</span></a></li>
                                    <li class="{{ request()->is('admin/udhyog/hybridbiu/inventory/sales_orders*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.hybridbiu.inventory.sales_orders.index') }}?udhyog=hybrid biu"><span> {{__('बिक्री/बिक्री आदेश')}}</span></a></li>
                                    <li class="{{ request()->is('admin/udhyog/hybridbiu/inventory/products*') || request()->is('admin/udhyog/papad/inventory/raw-materials*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.hybridbiu.inventory.seed_batch.inventory') }}"><span> {{__('इन्भेन्टरी')}}</span></a></li>
                                    {{-- <li class="{{ ($_panel == 'Inventory Product') ? 'active' : '' }}"><a href="{{ URL::route('admin.inventory.products.index') }}"><span> {{__('उत्पादन')}}</span></a></li> --}}
                                    {{-- <li class="{{ request()->is('admin/udhyog/hybridbiu/inventory/damage_types*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.hybridbiu.inventory.damage_types.index') }}?udhyog=hybrid biu"><span> {{__('क्षतिको प्रकार')}}</span></a></li> --}}
                                    {{-- <li class="{{ request()->is('admin/udhyog/hybridbiu/inventory/damage-records*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.hybridbiu.inventory.damage_records.index') }}?udhyog=hybrid biu"><span> {{__('क्षति अभिलेख')}}</span></a></li> --}}
                                    {{-- <li class="{{ request()->is('admin/udhyog/hybridbiu/inventory/products/low-stock*') || request()->is('admin/udhyog/hybridbiu/inventory/raw-materials/low-stock*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.papad.inventory.products.low_stock') }}?udhyog=hybrid biu"><span> {{__('कम स्टक')}}</span></a></li> --}}
                                    {{-- <li class="{{ request()->is('admin/udhyog/hybridbiu/inventory/production-batch/view-alert*') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.hybridbiu.inventory.production_batch.view_alert') }}?udhyog=hybrid biu"><span> {{__('चेतावनी उत्पादन')}}</span></a></li> --}}
                                </ul>
                            </li>
                            <li class="{{ ($_panel == 'Udhyog Hybrid Biu Workers Type' || $_panel == 'Udhyog Hybrid Biu Workers Position' || $_panel == 'Udhyog Hybrid Biu Workers List' || $_panel == 'Udhyog Hybrid Biu Workers') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.hybridbiu.workers.workerstype.index') }}"><span>{{__('कामदार')}}</span></a></li>
                            <li class="{{ ($_panel == 'Udhyog Hybrid Biu') ? 'active' : '' }}"><a href="{{ URL::route('admin.udhyog.hybridbiu.fianance.index') }}"><span>{{__('फाइनान्स/लेखा शीर्षक')}}</span></a></li>
                        </ul>
                    </li>

                </ul>
            </li>
            {{-- @endcan --}}
            {{-- @if(auth()->user()->can('view Finance Management') || auth()->user()->can('view billing') || auth()->user()->can('view inventory') || auth()->user()->can('view Property breakdown')) --}}
            <li class="sub-menu">
                <a href="javascript:;" class=" {{ ($_panel == 'Land Setup' || $_panel == 'Store Setup'|| $_panel == 'Equipment Setup'|| $_panel == 'Irrigation Setup' || $_panel == 'Feul Setup' || $_panel == 'Property List'  || $_panel == 'Billing List') ? 'active' : '' }}">
                    <i class="fa fa-shopping-cart"></i>
                    <span>फाइनान्स व्यवस्थापन </span>
                </a>
                <ul class="sub">
                    {{-- @if (auth()->user()->hasPermissionTo('view inventory')) --}}
                    <li><a href="#" class="{{ ($_panel == 'Land Setup' || $_panel == 'Store Setup' || $_panel == 'Equipment Setup' || $_panel == 'Irrigation Setup' || $_panel == 'Feul Setup'  || $_panel == 'Product List') ? 'active' : '' }}"><span>{{__('इन्भेन्टरी सेटअप')}}</span></a>
                        <ul class="sub">
                            <li class="{{ ($_panel == 'Land Setup') ? 'active' : '' }}"><a href="{{ URL::route('admin.lnventory_land_category.index') }}"><span>{{__('जमिन किसिम')}}</span></a></li>
                            <li class="{{ ($_panel == 'Store Setup') ? 'active' : '' }}"><a href="{{ URL::route('admin.lnventory_store_category.index') }}"><span>{{__('गोदाम किसिम')}}</span></a></li>
                            <li class="{{ ($_panel == 'Equipment Setup') ? 'active' : '' }}"><a href="{{ URL::route('admin.lnventory_equipment_category.index') }}"><span>{{__('औजार/उपकरण किसिम')}}</span></a></li>
                            <li class="{{ ($_panel == 'Irrigation Setup') ? 'active' : '' }}"><a href="{{ URL::route('admin.lnventory_irrigation_category.index') }}"><span>{{__('सिचाई किसिम')}}</span></a></li>
                            <li class="{{ ($_panel == 'Feul Setup') ? 'active' : '' }}"><a href="{{ URL::route('admin.lnventory_feul_category.index') }}"><span>{{__('इन्धन किसिम')}}</span></a></li>
                        </ul>
                    </li>
                    {{-- @endif --}}
                    {{-- @if (auth()->user()->hasPermissionTo('view Property breakdown')) --}}
                    <li class="{{ ($_panel == 'Property List') ? 'active' : '' }}"><a href="{{ URL::route('admin.property.index') }}"><span>{{__('सम्पति बिबरण')}}</span></a></li>
                    {{-- @endif --}}
                    {{-- @if (auth()->user()->hasPermissionTo('view billing')) --}}
                    <li class="{{ ($_panel == 'Billing List') ? 'active' : '' }}"><a href="{{ URL::route('admin.billing.index') }}"><span>{{__('बिलिंग')}}</span></a></li>
                    {{-- @endif --}}
                </ul>
            </li>
            {{-- @endif --}}
            {{-- @if (auth()->user()->hasPermissionTo('view bussiness')) --}}
            {{-- @can('view bussiness') --}}

            {{-- @if(auth()->user()->can('view bussiness')) --}}

            <li class="sub-menu">
                <a href="javascript:;" class="{{ ($_panel == 'Lekha Sirsak' || $_panel == 'Voucher' || $_panel == 'Voucher Category') ? 'active' : '' }}">
                    <i class="fa fa-money"></i>
                    <span>कारोबार</span>
                </a>
                <ul class="sub">
                    <li class="{{ ($_panel == 'Lekha Sirsak') ? 'active' : '' }}"><a href="{{ URL::route('admin.transactions.index') }}"><span> {{__('लेखा शीर्षक')}}</span></a></li>
                    <li class="{{ ($_panel == 'Voucher Category') ? 'active' : '' }}"><a href="{{ URL::route('admin.voucher_category.index') }}"><span> {{__('भौचर प्रकार')}}</span></a></li>
                    <li class="{{ ($_panel == 'Voucher') ? 'active' : '' }}"><a href="{{ URL::route('admin.voucher.index') }}"><span> {{__('भौचर')}}</span></a></li>
                </ul>
            </li>
            {{-- @endcan --}}
            {{-- @endif --}}
            {{-- <li class="sub-menu">
                <a href="javascript:;" class="{{ ($_panel == 'View Alert' || $_panel == 'Sales Order' || $_panel == 'Dealer' || $_panel == 'Low Stock Raw Material' || $_panel == 'Low Stock Product' || $_panel == 'Raw Material Name' || $_panel == 'Raw Material Inventory' || $_panel == 'Damage Product' || $_panel == 'Damage Raw Material' || $_panel == 'Damage Record' || $_panel == 'Production Batch' || $_panel == 'Inventory Product' || $_panel == 'Raw Material' || $_panel == 'Supplier') ? 'active' : '' }}">
                    <i class="fa fa-money"></i>
                    <span>इन्भेन्टरी सेटअप</span>
                </a>
                <ul class="sub">
                    <li class="{{ ($_panel == 'Supplier') ? 'active' : '' }}"><a href="{{ URL::route('admin.inventory.suppliers.index') }}"><span> {{__('सप्लाइर्स')}}</span></a></li>
                    <li class="{{ ($_panel == 'Raw Material' || $_panel == 'Raw Material Name') ? 'active' : '' }}"><a href="{{ URL::route('admin.inventory.raw_materials.index') }}"><span> {{__('कच्चा पद्दार्थ')}}</span></a></li>
                    <li class="{{ ($_panel == 'Production Batch') ? 'active' : '' }}"><a href="{{ URL::route('admin.inventory.products.index') }}"><span> {{__('उत्पादन')}}</span></a></li>
                    <li class="{{ ($_panel == 'Production Batch') ? 'active' : '' }}"><a href="{{ URL::route('admin.inventory.production_batch.index') }}"><span> {{__('उत्पादन ब्याच')}}</span></a></li>
                    <li class="{{ ($_panel == 'Dealer') ? 'active' : '' }}"><a href="{{ URL::route('admin.inventory.dealers.index') }}"><span> {{__('डिलर/व्यक्ति')}}</span></a></li>
                    <li class="{{ ($_panel == 'Sales Order') ? 'active' : '' }}"><a href="{{ URL::route('admin.inventory.sales_orders.index') }}"><span> {{__('बिक्री/बिक्री आदेश')}}</span></a></li>
                    <li class="{{ ($_panel == 'Raw Material Inventory' || $_panel == 'Inventory Product') ? 'active' : '' }}"><a href="{{ URL::route('admin.inventory.products.inventory') }}"><span> {{__('इन्भेन्टरी')}}</span></a></li>
                    <li class="{{ ($_panel == 'Damage Type') ? 'active' : '' }}"><a href="{{ URL::route('admin.inventory.damage_types.index') }}"><span> {{__('क्षतिको प्रकार')}}</span></a></li>
                    <li class="{{ ($_panel == 'Damage Product' || $_panel == 'Damage Raw Material') ? 'active' : '' }}"><a href="{{ URL::route('admin.inventory.damage_records.index') }}"><span> {{__('क्षति अभिलेख')}}</span></a></li>
                    <li class="{{ ($_panel == 'Low Stock Product') ? 'active' : '' }}"><a href="{{ URL::route('admin.inventory.products.low_stock') }}"><span> {{__('कम स्टक')}}</span></a></li>
                    <li class="{{ ($_panel == 'View Alert') ? 'active' : '' }}"><a href="{{ URL::route('admin.inventory.production_batch.view_alert') }}"><span> {{__('चेतावनी उत्पादन')}}</span></a></li>
                    <li class="{{ ($_panel == 'Seed Type') ? 'active' : '' }}"><a href="{{ URL::route('admin.inventory.seed_types.index') }}"><span> {{__('बिउको प्रकार ')}}</span></a></li>
                    <li class="{{ ($_panel == 'Seed') ? 'active' : '' }}"><a href="{{ URL::route('admin.inventory.seeds.index') }}"><span> {{__('बिउ')}}</span></a></li>
                </ul>
            </li> --}}
            {{-- @can('view Grants and training') --}}
            {{-- @if(auth()->user()->can('view Grants and training') || auth()->user()->can('view anudan') || auth()->user()->can('view training')) --}}
            <li class="sub-menu">
                <a href="javascript:;" class="{{ ($_panel == 'Training Person' || $_panel == 'Datri Nikai' ||$_panel == 'Anudaan' ||$_panel == 'Talim' ||$_panel == 'Beema' ) ? 'active' : '' }}">
                    <i class="fa fa-tasks"></i>
                    <span>अनुदान तथा तालिम</span>
                </a>
                <ul class="sub">
                    <li class="{{ ($_panel == 'Anudaan') ? 'active' : '' }}"><a href="{{ URL::route('admin.anudaan.index') }}"><span> {{ __('अनुदान') }}</span></a></li>
                    <li class="{{ ($_panel == 'Talim') ? 'active' : '' }}"><a href="{{ URL::route('admin.talim.index') }}"><span> {{ __('तालिम सेटअप') }}</span></a></li>
                    <li class="{{ ($_panel == 'Training Person') ? 'active' : '' }}"><a href="{{ URL::route('admin.training_person.index') }}"><span> {{ __('व्यक्तिको सूची') }}</span></a></li>
                    <li class="{{ ($_panel == 'Datri Nikai') ? 'active' : '' }}"><a href="{{ URL::route('admin.datrinikai.index') }}"><span> {{ __('दात्रिनिकाय सहयोग') }}</span></a></li>
                    <li class="{{ ($_panel == 'Beema') ? 'active' : '' }}"><a href="{{ URL::route('admin.beema.index') }}"><span> {{ __('कृषक बीमा') }}</span></a></li>
                </ul>
            </li>
            {{-- @endif --}}
            {{-- @can('view report') --}}
            {{-- @if(auth()->user()->can('view report') || auth()->user()->can('View Farmer Profile Report') || auth()->user()->can('View Farm Report') || auth()->user()->can('View Physical structure description') || auth()->user()->can('View Machinery Report') || auth()->user()->can('View Business Report') || auth()->user()->can('View Income/expenditure Report') || auth()->user()->can('View Physical Training Report') || auth()->user()->can('View Insurance Report') || auth()->user()->can('View Animal Report') || auth()->user()->can('View Animal Report') || auth()->user()->can('View Balinali Report')) --}}
            <li class="sub-menu">
                <a href="javascript:;" class=" {{ ($_panel == 'Profile Report' || $_panel == 'Farm Report'  || $_panel == 'Anudaan Report' || $_panel == 'Talim Report' || $_panel == 'Datrinikai Report' || $_panel == 'Beema Report' || $_panel == 'Sangrachana Report' || $_panel == 'Mesinary Report' || $_panel == 'Biu Bijan Report' || $_panel == 'Animal Report' || $_panel == 'Agriculture Report') ? 'active' : '' }}">
                    <i class="fa fa-gears"></i>
                    <span>रिपोर्ट</span>
                </a>
                <ul class="sub">
                    {{-- @can('View Farmer Profile Report') --}}
                    <li class="{{ ($_panel == 'Profile Report') ? 'active' : '' }}"><a href="{{ URL::route('admin.report.index') }}"><span> {{ __('कृषक बिबरण रिपोर्ट ') }}</span></a></li>
                    {{-- @endcan --}}
                    {{-- @can('View Farm Report') --}}
                    <li class="{{ ($_panel == 'Farm Report') ? 'active' : '' }}"><a href="{{ URL::route('admin.report.farm_index') }}"><span> {{ __('खेत बारी रिपोर्ट ') }}</span></a></li>
                    {{-- @endcan --}}
                    {{-- @can('View Physical structure description') --}}
                    <li class="{{ ($_panel == 'Sangrachana Report') ? 'active' : '' }}"><a href="{{ URL::route('admin.report.sangrachana_index') }}"><span> {{ __('भौतिक संरचना बिबरण') }}</span></a></li>
                    {{-- @endcan --}}

                    <li class="{{ ($_panel == 'Mesinary Report') ? 'active' : '' }}"><a href="{{ URL::route('admin.report.mesinary_index') }}"><span> {{ __('मेसिनरी/उपकरण बिबरण') }}</span></a></li>
                    <li class="{{ ($_panel == 'Anudaan Report') ? 'active' : '' }}"><a href="#"><span> {{ __('कारोबार बिन्रण') }}</span></a></li>
                    <li class="{{ ($_panel == 'Anudaan Report') ? 'active' : '' }}"><a href="#"><span> {{ __('आम्दानी/ खर्च बिबरण') }}</span></a></li>
                    <li class="{{ ($_panel == 'Talim Report') ? 'active' : '' }}"><a href="{{ URL::route('admin.report.talim_index') }}"><span> {{ __('तालिम बिबरण') }}</span></a></li>
                    <li class="{{ ($_panel == 'Talim Report') ? 'active' : '' }}"><a href="{{ URL::route('admin.report.talim_index') }}"><span> {{ __('तालिम बिबरण') }}</span></a></li>
                    <li class="{{ ($_panel == 'Datrinikai Report') ? 'active' : '' }}"><a href="{{ URL::route('admin.report.datrinikai_index') }}"><span> {{ __('दात्रिनिकाय बिबरण') }}</span></a></li>
                    <li class="{{ ($_panel == 'Beema Report') ? 'active' : '' }}"><a href="{{ URL::route('admin.report.beema_index') }}"><span> {{ __('बीमा बिबरण') }}</span></a></li>
                    <li class="{{ ($_panel == 'Animal Report') ? 'active' : '' }}"><a href="{{ URL::route('admin.report.animal_index') }}"><span> {{ __('पशुपन्छी बिबरण') }}</span></a></li>
                    <li class="{{ ($_panel == 'Agriculture Report') ? 'active' : '' }}"><a href="{{ URL::route('admin.report.agriculture_index') }}"><span> {{ __('बालीनाली बिबरण') }}</span></a></li>
                </ul>
            </li>
            {{-- @endif --}}
            {{-- @if (auth()->user()->hasPermissionTo('view setting')) --}}
            {{-- @can('view setting') --}}
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="fa fa-cloud-upload"></i>
                    <span>सेटिङ्हरू</span>
                </a>
                <ul class="sub">
                    <li><a href="#" class="{{ ($_panel == '') ? 'active' : '' }}"><span>{{__('डाटा ब्याकअप')}}</span></a></li>
                    <li><a href="#" class="{{ ($_panel == '') ? 'active' : '' }}"><span>{{__('सोसियल लिंकहरु')}}</span></a></li>
                    <li><a href="#" class="{{ ($_panel == '') ? 'active' : '' }}"><span>{{__('लग')}}</span></a></li>
                </ul>
            </li>
            {{-- @endcan --}}
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="fa fa-cloud-upload"></i>
                    <span>फार्म</span>
                </a>
                <ul class="sub">
                    <li><a href="{{ URL::route('admin.farms.index') }}" class="{{ ($_panel == '') ? 'active' : '' }}"><span>{{__('फार्म')}}</span></a></li>
                    <li><a href="{{ URL::route('admin.farm_amdani.index') }}" class="{{ ($_panel == '') ? 'active' : '' }}"><span>{{__('फारम आम्दानी ')}}</span></a></li>
                </ul>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>

<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion" style="font-weight:bold;">
            @if(Route::has('admin.index'))
            <li><a href="{{ URL::route('user.index') }}" class="{{ ($_panel == 'Dashboard') ? 'active' : '' }}"><i class="fa fa-dashboard"></i><span>{{__('ड्याशबोर्ड')}}</span></a></li>
            @endif
            <li class="sub-menu">
                <a href="javascript:;" class="{{ ($_base_route == 'user.general' || $_panel == 'Farm' || $_panel == 'Report') ? 'active' : '' }}">
                    <i class="fa fa-tasks"></i>
                    <span>किसान बिबरणहरु</span>
                </a>
                <ul class="sub">
                    <li class="{{ ($_panel == 'General Profile') ? 'active' : '' }}"><a href="{{ URL::route('user.general.index') }}"><span> {{ __('प्रोफाइल बिबरण') }}</span></a></li>
                    <li class="{{ ($_panel == 'Farm') ? 'active' : '' }}"><a href="{{ URL::route('user.farm.index') }}"><span> {{ __('खेत बारी बिबरण') }}</span></a></li>
                    <li class="{{ ($_panel == 'Report') ? 'active' : '' }}"><a href="{{ URL::route('user.report.index') }}"><span> {{ __('रिपोर्ट') }}</span></a></li>
                </ul>
            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
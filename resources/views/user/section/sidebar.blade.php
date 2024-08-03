 <!-- START SIDEBAR-->
 <nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                @if($all_view['setting']->logo)
                <img src="{{ asset($all_view['setting']->logo) }}" width="45px" />
                @else
                <img src="{{ asset('assets/cms/img/admin-avatar.png')}}" width="45px" />
                @endif
            </div>
            <div class="admin-info">
                <div class="font-strong">{{auth()->user()->name}}</div><small>{{ ucfirst(auth()->user()->role)}}</small>
            </div>
        </div>
        <ul class="side-menu metismenu">
            <li class="">
                <a class="active" href="{{ route('member.index') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dasboard</span>
                </a>
            </li>
            <li class="heading">FEATURES</li>
            {{-- <li class="{{ ($_panel == 'Banner' || $_panel == 'Popup' || $_panel == 'Carrers' || $_panel == 'Types' ) ? 'active' : '' }}">
                <a href=" javascript:;"><i class="sidebar-item-icon fa fa-briefcase"></i>
                    <span class="nav-label">Widgets</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a class="{{ ($_panel == 'Banner') ? 'active' : '' }}" href="{{ route('admin.banner.index')}}"><i class="sidebar-item-icon fa fa-slideshare"></i>Banner</a>
                    </li>
                    <li>
                       <a class="{{ ($_panel == 'Services') ? 'active' : '' }}" href="{{ route('admin.our_service.index') }}"><i  class="sidebar-item-icon fa fa-slideshare"></i>Services</a>
                    </li>
                    <li>
                        <a class="{{ ($_panel == 'Achievement') ? 'active' : '' }}" href="{{ route('admin.achievement.index')}}"><i class="sidebar-item-icon fa fa-briefcase"></i>Achievements</a>
                    </li>
                    <!-- <li>
                        <a class="{{ ($_panel == 'Popup') ? 'active' : '' }}" href="#"><i class="sidebar-item-icon fa fa-briefcase"></i>Papup Notification</a>
                    </li> -->
                </ul>
            </li> --}}
            <li class="{{ ($_panel == 'Category' || $_panel == 'Blog' || $_panel == 'Section' || $_panel == 'Posts' || $_panel == 'Pages' ||  $_panel == 'Demand' ||  $_panel == 'Programs' ||  $_panel == 'Counter') ? 'active' : '' }}">
                <a href=" javascript:;"><i class="sidebar-item-icon fa fa-bars"></i>
                    <span class="nav-label">Content Management</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">

                    <li>
                        <a class="{{ ($_panel == 'Posts') ? 'active' : '' }}" href="{{ route('member.blog.index')}}"><i class="sidebar-item-icon fa fa-clipboard"></i>Posts</a>
                    </li>
                </ul>
            </li>
            {{-- <li class="{{ ($_panel == 'Menus') ? 'active' : '' }}">
                <a class="" href="{{ route('admin.menu.index')}}"><i class="sidebar-item-icon fa fa-bars"></i>
                    <span class="nav-label">Menus</span>
                </a>
            </li> --}}
            {{-- <li class="{{ ($_panel == 'Interview Types' || $_panel == 'Interview Question' || $_panel == 'Testimonial' || $_panel == 'Clients' ||  $_panel == 'Faq' || $_panel == 'QuizPractice'|| $_panel == 'Gallery' || $_panel == 'Video' ) ? 'active' : '' }}">
                <a href=" javascript:;"><i class="sidebar-item-icon fa fa-picture-o"></i>
                    <span class="nav-label">Accessories</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a class="{{ ($_panel == 'Interview Types') ? 'active' : '' }}" href="{{ route('admin.interviewtypes.index')}}"><i class="sidebar-item-icon fa fa-indent"></i>Interview Types</a>
                    </li>
                    <li>
                        <a class="{{ ($_panel == 'Interview Question') ? 'active' : '' }}" href="{{ route('admin.interviewquestion.index')}}"><i class="sidebar-item-icon fa fa-indent"></i>Interview Question</a>
                    </li>
                    <li>
                        <a class="{{ ($_panel == 'Clients') ? 'active' : '' }}" href="{{ route('admin.clients.index')}}"><i class="sidebar-item-icon fa fa-id-card" aria-hidden="true"></i>Partners List</a>
                    </li>
                    <li>
                        <a class="{{ ($_panel == 'Testimonial') ? 'active' : '' }}" href="{{ route('admin.testimonial.index')}}"><i class="sidebar-item-icon fa fa-male"></i>Testimonials</a>
                    </li>
                    <li>
                        <a class="{{ ($_panel == 'QuizPractice') ? 'active' : '' }}" href="{{ route('admin.quiz.index')}}"><i class="sidebar-item-icon fa fa-comments-o"></i>Quiz Practice</a>
                    </li>
                    <li>
                        <a class="{{ ($_panel == 'Faq') ? 'active' : '' }}" href="{{ route('admin.faq.index')}}"><i class="sidebar-item-icon fa fa-question-circle"></i>Faq</a>
                    </li>
                    <li class="{{ ($_panel == 'Gallery' || $_panel == 'Video' ) ? 'active' : '' }}">
                        <a href=" javascript:;"><i class="sidebar-item-icon fa fa-picture-o"></i>
                            <span class="nav-label">Media</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-3-level collapse">
                            <li>
                                <a class="{{ ($_panel == 'Gallery') ? 'active' : '' }}" href="{{ route('admin.gallery.index')}}"><i class="sidebar-item-icon fa fa-picture-o"></i>Gallery</a>
                            </li>
                            <li>
                                <a class="{{ ($_panel == 'Video') ? 'active' : '' }}" href="{{ route('admin.video.index')}}"><i class="sidebar-item-icon fa fa-video-camera"></i>Video</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li> --}}
            <!-- <li class="{{ ($_panel == 'Staff') ? 'active' : '' }}">
                <a class="" href="{{ route('admin.staff.index')}}"><i class="sidebar-item-icon fa fa-users"></i>
                    <span class="nav-label">Staff</span>
                </a>
            </li> -->
            <li class="{{ ($_panel == 'Setting' || $_panel == 'Social Profile' || $_panel == 'User Profile'  || $_panel == 'Language' ) ? 'active' : '' }}">
                <a href=" javascript:;"><i class="sidebar-item-icon fa fa-cogs"></i>
                    <span class="nav-label">Setting</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a class="{{ ($_panel == 'Setting') ? 'active' : '' }}" href="{{ route('member.setting.index')}}"><i class="sidebar-item-icon fa fa-cog"></i>Setting</a>
                    </li>
                    <li>
                        <a class="{{ ($_panel == 'Social Profile') ? 'active' : '' }}" href="{{ URL::route('member.setting.social.index') }}"><i class="sidebar-item-icon fa fa-heart"></i>Social Link</a>
                    </li>

                    <li>
                        <a class="{{ ($_panel == 'User Profile') ? 'active' : '' }}" href="{{ route('member.user_profile.show')}}"><i class="sidebar-item-icon fa fa-user"></i>Profile & Security</a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</nav>
<!-- END SIDEBAR-->

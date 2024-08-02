<div id="sticky-header" class="techno_nav_manu transparent_menu white d-md-none d-lg-block d-sm-none d-none">
    <div class="container">
        <div class="row">
            <div class="menu">
                @if(isset($all_view['setting']->logo))
                @if(Route::has('site.index'))
                <a href="{{route('site.index')}}" class="logo">
                    <img class="down" src="{{ asset($all_view['setting']->logo) }}" alt="">
                    <img class="main_sticky" src="{{ asset($all_view['setting']->logo) }}" alt="">
                </a>
                @endif
                @endif
                <ul class="clearfix">
                    @if(isset($data['menu']))
                    @foreach($data['menu'] as $row)
                    <li class="@if(array_key_exists('child', $row))dropdown @endif nav-item nav-item-top">
                        <a class="@if(array_key_exists('child', $row))dropdown-toggle @endif nav-link fs-1 " href="{{ url($row['url']) }}" target="{{ $row['target'] }}" @if(array_key_exists('child', $row))id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" @endif>{{ $row['menu_name'] }}</a>
                        @if(array_key_exists('child', $row))
                        <ul>
                            @foreach($row['child'] as $child)
                            <li class="@if(array_key_exists('child', $child))dropdown @endif nav-item">
                                <a class="@if(array_key_exists('child', $child)) @endif nav-link fs-1" href="{{ url($child['url']) }}" target="{{ $child['target'] }}" @if(array_key_exists('child', $child))id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" @endif>{{ $child['menu_name'] }}</a>
                                @if(array_key_exists('child', $child))

                                <ul>
                                    @foreach($child['child'] as $ch)
                                    <li><a class="nav-link " href="{{ url($ch['url']) }}" class="fs-1" target="{{ $ch['target'] }}">{{ $ch['menu_name'] }}</a></li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                    @endif
                    <li>
                        <form action="#" style="width:260px">
                            <div class="subscribe_form">
                                <input type="search" name="text" id="text" class="form-control" placeholder="What do you want to learn">
                            </div>
                        </form>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>

<!----- Techno Mobile Menu Area ----->
<div class="mobile-menu-area d-sm-block d-md-block d-lg-none">
    <div class="mobile-menu">
        <nav class="techno_menu">
            <ul class="clearfix">
                <li>
                    <a href="#">Courses </a>
                    <ul class="course-category">
                        <li><a href="#">Full Stack Developer</a>
                            <ul>
                                <li><a href="training-course.html">Full Stack Development</a></li>
                                <li><a href="training-course.html">Data Science Bootcamps</a></li>
                                <li><a href="training-course.html">Web Development Bootcamps</a></li>
                                <li><a href="training-course.html">Front End Developer</a></li>
                                <li><a href="training-course.html">AI Bootcamps</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Data Science</a>
                            <ul>
                                <li><a href="training-course.html">Machine Learning</a></li>
                                <li><a href="training-course.html">Data Science Bootcamps</a></li>
                                <li><a href="training-course.html">Data analytics</a></li>
                                <li><a href="training-course.html">Data Engineer</a></li>
                                <li><a href="training-course.html">AI Bootcamps</a></li>
                            </ul>
                        </li>
                        <li><a href="training-course.html">Web Developement</a></li>
                        <li><a href="training-course.html">Database</a></li>
                        <li><a href="training-course.html">Software Developement</a></li>
                    </ul>
                </li>

                <li><a href="#">Bootcamps</a>
                    <ul>
                        <li><a href="course-details.html">Full Stack Development</a></li>
                        <li><a href="course-details.html">Data Science Bootcamps</a></li>
                        <li><a href="course-details.html">Web Development Bootcamps</a></li>
                        <li><a href="course-details.html">Front End Developer</a></li>
                        <li><a href="course-details.html">AI Bootcamps</a></li>
                    </ul>
                </li>
                <li><a href="#">Crash Courses</a>
                    <ul>
                        <li><a href="course-details.html">Full Stack Development</a></li>
                        <li><a href="course-details.html">Data Science</a></li>
                        <li><a href="course-details.html">Web Development</a></li>
                        <li><a href="course-details.html">Front End Developer </a></li>
                        <li><a href="course-details.html">AI Bootcamps </a></li>
                    </ul>
                </li>
                <li><a href="#">Resources</a>
                    <ul>
                        <li><a href="blog.html">Blog</a></li>

                        <li><a href="#">Practice Test</a></li>
                        <li><a href="interview-module.html">Interview Question</a></li>
                        <li><a href="#"></a></li>
                    </ul>
                </li>
                <li><a href="#">Help</a>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Contact US</a></li>
                    </ul>
                </li>
                <div class="donate-btn-header">
                    <a class="dtbtn" href="#">Log In</a>
                </div>
            </ul>
        </nav>
    </div>
</div>
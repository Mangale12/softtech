<div class="navbar-area">

    <div class="mobile-nav">
        <a href="index.html" class="logo">
            <img src="assets/img/munal-logo.png" alt="logo">
        </a>
    </div>

    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{route('site.index')}}">
                    <img src="{{ asset($all_view['setting']->logo) }}" @if(isset($all_view['setting']->site_name)) title="{{ $all_view['setting']->site_name }}" @endif alt="logo">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item">
                            <a href="{{route('site.index')}}" class="nav-link  {{ (request()->segment(1) == null) ? 'active' : '' }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('site.about')}}" class="nav-link {{ (request()->segment(1) == 'about-us') ? 'active' : '' }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('site.services')}}" class="nav-link {{ (request()->segment(1) == 'services') ? 'active' : '' }}">Services</a>

                        </li>
                        <li class="nav-item">
                            <a href="{{route('site.abroad')}}" class="nav-link dropdown-toggle">Study Abroad</a>
                            <ul class="dropdown-menu">
                                @if($all_view['country'])
                                @foreach($all_view['country'] as $row)
                                <li class="nav-item">
                                    <a href="{{ route('site.post.show', ['id'=> $row->post_unique_id,]) }}" class="nav-link">{{ $row->title }}</a>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">Test Preparation</a>
                            <ul class="dropdown-menu">
                                @if($all_view['test-prepration'])
                                @foreach($all_view['test-prepration'] as $row)
                                <li class="nav-item">
                                    <a href="{{ route('site.post.show', ['id'=> $row->post_unique_id,]) }}" class="nav-link">{{ $row->title }}</a>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('site.gallery')}}" class="nav-link {{ (request()->segment(1) == 'gallery') ? 'active' : '' }}">Gallery</a>

                        </li>

                        <li class="nav-item">
                            <a href="{{route('site.contact')}}" class="nav-link {{ (request()->segment(1) == 'contact-us') ? 'active' : '' }}">Contact Us</a>
                        </li>
                    </ul>

                </div>
            </nav>
        </div>
    </div>
</div>
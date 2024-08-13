{{-- <nav class="navbar navbar-expand-lg bg-white sticky-top">
  <div class="container">
    @if(isset($all_view['setting']->logo))
    @if(Route::has('site.index'))
    <a class="navbar-brand" href="{{ route('site.index')}}"><img src="{{asset('user/images/taan-logo.jpg')}}" alt="logo"></a>
    @endif
    @endif
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mx-lg-end mx-auto mb-2 mb-lg-0 d-flex justify-content-end">
        @if(isset($data['menu']))
        @foreach($data['menu'] as $row)
        <li class="nav-item dropdown">
          <a class="nav-link" href="{{ url($row['url']) }}" role="button">
            {{ $row['menu_name'] }} @if(array_key_exists('child', $row))<i class="fas fa-chevron-down dropdown-icon"></i> @endif
          </a>
          @if(array_key_exists('child', $row))
          <div class="dropdown-menu d-flex ">
            <div class="sub-menu">
              <div class="sub-count">
                <div class="count-number">
                  <a href="">
                    <span class="text-white">Total Member</span> <br>
                    <h3 class="text-white">
                      2500 +
                  </a>
                  </h3>
                </div>
              </div>
            </div>
            <div class="sub-menu sub-menu-items w-100">
              @foreach($row['child'] as $child)
              <a href="{{ url($child['url']) }}">{{ $child['menu_name'] }}</a>
              @endforeach
            </div>
          </div>
          @endif
        </li>
        @endforeach
        @endif
      </ul>
      <div class="d-flex align-items-center mobile-r-c" role="search">
        <a href="{{ route('scms.login') }}"><button class="btn btn-login be-member" type="submit">Sign In</button></a>
        <a href="{{ route('scms.login') }}"><button class="btn btn-signup btn-bg ms-2" type="submit"><i class="fa-regular fa-user"></i>
            Become a member
          </button></a>
      </div>
    </div>
  </div>
</nav> --}}

<nav class="navbar navbar-expand-lg bg-white sticky-top">
    <div class="container">
      <a class="navbar-brand" href="{{ route('site.index') }}"><img src="{{asset('user/images/taan-logo.jpg')}}" alt="logo"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
        aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mx-lg-end mx-auto mb-2 mb-lg-0 d-flex justify-content-end">
          <li class="nav-item dropdown">
            <a class="nav-link" href="{{ route('site.member') }}" role="button">
              Members <i class="fas fa-chevron-down dropdown-icon"></i>
            </a>
            <div class="dropdown-menu d-flex ">
              <div class="sub-menu">
                <div class="sub-count">
                  <div class="count-number">
                    <a href="">
                      <span class="text-white">Total Member</span> <br>
                      <h3 class="text-white">
                        2500 +
                    </a>
                    </h3>
                  </div>
                </div>
              </div>

              <div class="sub-menu sub-menu-items w-100">
                @if($all_view['member_type']->count() > 0)
                @foreach($all_view['member_type'] as $key=>$type)
                <a href="{{ route('site.memberByType', ['slug'=>$type->slug]) }}">{{ $type->title }}</a>
                @endforeach
                @endif
            </div>

            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link " href="{{ route('site.trails') }}" role="button">
              Trail Profile <i class="fas fa-chevron-down dropdown-icon"></i>
            </a>
            <div class="dropdown-menu d-flex ">
              <div class="sub-menu">
                <div class="sub-count">
                  <div class="count-number ">
                    <a href="">
                      <span class="text-white ">Total Trail </span> <br>
                      <h3 class="text-white ">
                        25 +
                    </a>

                    </h3>
                    <div class="trail-packages pt-3 " style="border-top: 2px solid white;">
                    <a href="" class="d-block">
                        <span class="text-white "> Trail Selection</span> <br>
                        <h3 class="text-white ">
                          100 +
                      </a>

                      </h3>
                    </div>


                  </div>

                </div>
              </div>
              <div class="sub-menu sub-menu-items w-100 ">
                <a href="">Everest Base Camp Trek</a>
                <a href="">Langtang Base Camp Trek
                  Detail</a>
                <a href="">
                  Kanchenjunga Base Camp Trek Cost and Itinerary 2024 </a>

                  <a href="">
                    Kanchenjunga Circuit Trek 19 Days 2024 | 2025</a>


              </div>


            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="{{ route('site.about', ['id'=> $all_view['feature_page'][0]->post_unique_id]) }}" role="button">
              About us <i class="fas fa-chevron-down dropdown-icon"></i>
            </a>
            <div class="dropdown-menu ">

              <div class="sub-menu sub-menu-items w-100">
                @if (Route::has('site.about'))
                <a href="{{ route('site.about', ['id'=> $all_view['feature_page'][0]->post_unique_id]) }}">Introduction</a>
                @endif
                @if (Route::has('site.organization-chart'))
                <a href="{{ route('site.organization-chart', ['id'=> $all_view['feature_page'][4]->post_unique_id]) }}">Organizations Chart</a>
                @endif
              </div>
            </div>
          </li>


          {{-- <li class="nav-item dropdown">
            <a class="nav-link " href="{{route('user.about')}}" role="button">
              About us
            </a>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link" href="https://tims.ntb.gov.np/login" role="button" aria-expanded="false">
              TIMs
            </a>
          </li>
          @if(Route::has('site.faqs'))
          <li class="nav-item">

            <a class="nav-link" href="{{ route('site.faqs', ['id'=>isset($all_view['feature_page'][5]->post_unique_id) ? $all_view['feature_page'][5]->post_unique_id : 'post_unique_id']) }}" role="button" aria-expanded="false">
              FAQs
            </a>
          </li>
          @endif
        </ul>
        <div class="d-flex align-items-center mobile-r-c" role="search">
            @if(auth()->check() && auth()->user()->is_member == 1)
                <a href="{{ route('member.index') }}">
                    <button class="btn btn-login be-member" type="button">Profile</button>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <button class="btn btn-signup btn-bg ms-2" type="button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </button>
            @else
                <a href="{{ route('site.sign_in') }}">
                    <button class="btn btn-login be-member" type="button">Sign In</button>
                </a>
                <a href="{{ route('site.register') }}">
                    <button class="btn btn-signup btn-bg ms-2" type="button"><i class="fa-regular fa-user"></i> Become a member</button>
                </a>
            @endif
        </div>
      </div>
    </div>
  </nav>

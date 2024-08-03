<nav class="navbar navbar-expand-lg bg-white sticky-top">
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
        <a href="{{ route('site.sign_in') }}"><button class="btn btn-login be-member" type="submit">Sign In</button></a>
        <a href="{{ route('site.register') }}"><button class="btn btn-signup btn-bg ms-2" type="submit"><i class="fa-regular fa-user"></i>
            Become a member
          </button></a>
      </div>
    </div>
  </div>
</nav>
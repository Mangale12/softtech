<div class="header">
  <div class="container">
    <div class="header__content d-flex align-itemsp-center flex-wrap">
      @if(isset($all_view['setting']->site_mobile))
      <p class="pe-lg-5">{{ $all_view['setting']->site_mobile }}</p>
      @else
      <p class="pe-lg-5">Number Not Found's !</p>
      @endif
      <div class="d-flex">
        <img src="{{ asset( 'assets/site/images/flag.png') }}" alt="flag">
        <p class="taan">Official website of Trekking Agencies' Association of Nepal (TAAN)</p>
      </div>
    </div>
  </div>
</div>
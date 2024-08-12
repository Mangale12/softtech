<div class="banner">
    @if(!empty($data['banner']))
    @foreach($data['banner'] as $row )
    <div class="banner__details  d-flex justify-content-center">
        <div class="slider">

            <div class="slider__image"><img src="{{asset( asset($row->image) ) }}" alt="banner"></div>

        </div>
        <div class="banner__article">
            <div class="banner__article--content pt-140 position-relative">

                <div id="typed-strings">
                    <p>{{$row->title }}</p>
                </div>
                <h4 class="position-absolute typed-title" id="typed"></h4>
                <h1 id="typingText">{{$row->description }}</h1>

                <div class="member">
                    <form action="#">
                        <div class="d-flex align-items-center justify-content-between member__search">
                            <div class="member__search--input flex-fill">
                                <b><i class="fa-regular fa-user"></i></b>
                                <input id="searchInput" class="member__search--input-type" type="text" placeholder="Where To Go?">
                            </div>
                            <button class="btn-search" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif
</div>
@if(isset($data['feature_page'][2]))
<section class="message my-lg-5 my-3">
    <div class="container">
        <div class="president d-lg-flex flex-column flex-lg-row justify-content-center">
            @if(isset($data['feature_page'][2]))
            <div class="president-message">
                <h3> {{ $data['feature_page'][2]->title }}</h3>
                {!! $data['feature_page'][2]->description !!}
                {{-- <a class="btn" href="{{ route('site.post.show', ['id'=> $data['feature_page'][2]->post_unique_id]) }}">Read More</a> --}}
                <a class="btn" href="{{ isset($data['feature_page'][2]->post_unique_id) ? url('page/' . $data['feature_page'][2]->post_unique_id) : '#' }}">Read More</a>

                {{-- <button>Read More</button> --}}

            </div>
            @endif
            <div class="president-image d-flex justify-content-center p-2">
                @if(isset($data['feature_page'][2]) && $data['feature_page'][2]->thumbs && file_exists(public_path($data['feature_page'][2]->thumbs)))
                <img src="{{ asset($data['feature_page'][2]->thumbs) }}" alt="President Image">
                @endif
            </div>
        </div>
    </div>
</section>
@endif

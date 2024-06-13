<!-- Resource -->
<!-- https://devnote.in/laravel-8-custom-pagination-example/ -->
@if ($paginator->hasPages())
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        @if ($paginator->onFirstPage())
        <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">पछाडी</a>
        </li>
        @else
        <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">पछाडी</a></li>
        @endif

        @foreach ($elements as $element)
        @if (is_string($element))
        <li class="page-item disabled">{{ $element }}</li>
        @endif

        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="page-item active">
            <a class="page-link">{{ getUnicodeNumber($page)  }}</a>
        </li>
        @else
        <li class="page-item">
            <a class="page-link" href="{{ $url }}">{{ getUnicodeNumber($page)  }}</a>
        </li>
        @endif
        @endforeach
        @endif
        @endforeach

        @if ($paginator->hasMorePages())
        <li class="page-item">
            <a class="page-link" href="{{ getUnicodeNumber($paginator->nextPageUrl())  }}" rel="next">अर्को</a>
        </li>
        @else
        <li class="page-item disabled">
            <a class="page-link" href="{{ getUnicodeNumber($paginator->nextPageUrl())  }}">अर्को</a>
        </li>
        @endif
    </ul>
    @endif
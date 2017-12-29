@if ($paginator->hasPages())
    <nav class="pagination is-centered" role="navigation" aria-label="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="pagination-previous disabled"><span>&laquo;</span></a>
        @else
            <a class="pagination-previous" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a>
        @endif

        <ul class="pagination-list" style="list-style: none;">

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span class="pagination-ellipsis">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li><a class="pagination-link is-current" aria-current="page"  aria-label="{{ $page }}">{{ $page }}</a></li>
                    @else
                        <li><a class="pagination-link" aria-label="{{ $page }}" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        </ul>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="pagination-next" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
        @else
            <a class="pagination-next disabled"><span>&raquo;</span></a>
        @endif
    </nav>
@endif

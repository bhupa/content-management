@if ($paginator->hasPages())
<ul class="navigation pagination">
    <div class="nav-links">
        {{-- Previous Page Link --}}


        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-numbers disabled"><span class="page-link">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-numbers current"><span class="page-link">{{ $page }}</span></li>
                    @else
                        <li class="page-numbers"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="page-numbers next" href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a>
        @else
            <li class="page-numbers next"><span class="page-link">next</span></li>

        @endif
    </div>

</ul>
@endif

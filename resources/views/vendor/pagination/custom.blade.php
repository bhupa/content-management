@if ($paginator->hasPages())
    <div class="nav-links" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="page-numbers disabled" aria-disabled="true" aria-label="@lang('pagination.next')">«</span>

        @else

            <a class="page-numbers" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                «
            </a>

        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="page-numbers current" >{{ $page }}</span>
                    @else
                        <a class="page-numbers" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="next page-numbers" href="{{ $paginator->nextPageUrl() }}" rel="next">»</a>

        @else
            <span class="page-numbers disabled" aria-disabled="true" aria-label="@lang('pagination.next')">»</span>

        @endif
    </div>
@endif

@if ($paginator->hasPages())
    <div class="portfolio-pagination">
        <ul>
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a class="pagination-nav pagination-prev" aria-disabled="true" title="Previous">
                    <i class="fas fa-chevron-left" aria-hidden="true"></i>
                </a>
            @else
                <a class="pagination-nav pagination-prev page-link" href="{{ $paginator->previousPageUrl() }}"
                   rel="prev" title="Previous">
                    <i class="fas fa-chevron-left" aria-hidden="true"></i>
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="pagination-nav pagination-next" href="{{ $paginator->nextPageUrl() }}" rel="next" title="Next" aria-label="@lang('pagination.next')">
                        <i class="fas fa-chevron-right" aria-hidden="true"></i>
                    </a>
                </li>
            @else
                <a class="pagination-nav pagination-next" href="javascript:void(0)" title="Next">
                    <i class="fas fa-chevron-right" aria-hidden="true"></i>
                </a>
            @endif
        </ul>
    </div>
@endif

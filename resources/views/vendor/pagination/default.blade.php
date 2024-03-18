@if ($paginator->hasPages())
    <div class="col-lg-12 col-md-12">
        <div class="pagination-area">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a class="prev page-numbers"><i class="ri-arrow-left-s-line"></i>
                </a>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="prev page-numbers"><i
                        class="ri-arrow-left-s-line"></i></a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <a class="disabled" aria-disabled="true"><span>{{ $element }}</span></a>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            {{-- <li class="active" aria-current="page"><span>{{ $page }}</span></li> --}}
                            <span class="page-numbers current" aria-current="page">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="page-numbers">{{ $page }}</a>
                            {{-- <li><a href="{{ $url }}">{{ $page }}</a></li> --}}
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="next page-numbers"><i
                        class="ri-arrow-right-s-line"></i></a>
            @else
                <a class="disabled next page-numbers">
                    <i class="ri-arrow-right-s-line"></i>
                </a>
            @endif
            {{-- <a href="#" class="next page-numbers"><i class="ri-arrow-right-s-line"></i></a> --}}
        </div>
    </div>
@endif

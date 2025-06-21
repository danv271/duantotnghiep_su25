@if ($paginator->hasPages())
    <nav class="d-flex align-items-center">
        <ul class="pagination pagination-sm mb-0">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">
                        <i class="ri-arrow-left-s-line"></i>
                    </span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                        <i class="ri-arrow-left-s-line"></i>
                    </a>
                </li>
            @endif

            @php
                $currentPage = $paginator->currentPage();
                $lastPage = $paginator->lastPage();

                $startPage = max(1, min($currentPage - 1, $lastPage - 2));
                $endPage = min($lastPage, $startPage + 2);

                if ($endPage - $startPage < 2) {
                    $startPage = max(1, $endPage - 2);
                }
            @endphp

            @for ($i = $startPage; $i <= $endPage; $i++)
                @if ($i == $currentPage)
                    <li class="page-item active">
                        <span class="page-link">{{ $i }}</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                    </li>
                @endif
            @endfor

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">
                        <i class="ri-arrow-right-s-line"></i>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link">
                        <i class="ri-arrow-right-s-line"></i>
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif

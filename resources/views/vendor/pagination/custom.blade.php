@if ($paginator->hasPages())
<nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="pagination-nav">
   
    @if ($paginator->onFirstPage())
        <span class="pagination-disabled">
            << Trang {{ $paginator->currentPage() }} trên {{ $paginator->lastPage() }}
        </span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" class="pagination-link">
            << 
        </a>
    @endif

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="pagination-link">
        >>
        </a>
    @else
        <span class="pagination-disabled">
        Trang {{ $paginator->currentPage() }} trên {{ $paginator->lastPage() }} >>
        </span>
    @endif
</nav>
@endif

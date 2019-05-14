@if ($paginator->hasPages())
<nav class="pagination is-centered" role="navigation" aria-label="pagination">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <a class="pagination-previous" disabled>Προηγούμενη</a>
    @else
    <a class="pagination-previous" href="{{ $paginator->previousPageUrl() }}">Προηγούμενη</a>
    @endif

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <a class="pagination-next" href="{{ $paginator->nextPageUrl() }}">Επόμενη Σελίδα</a>
    @else
    <a class="pagination-next" disabled>Επόμενη Σελίδα</a>
    @endif


    {{-- Pagination Elements --}}
    <ul class="pagination-list">
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li><span class="pagination-ellipsis">&hellip;</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li><a class="pagination-link is-current" aria-label="page {{ $page }}" aria-current="page">{{ $page }}</a></li>
        @else
        <li><a href="{{ $url }}" class="pagination-link" aria-label="page {{ $page }}">{{ $page }}</a></li>
        @endif
        @endforeach
        @endif
        @endforeach
    </ul>

</nav>
@endif

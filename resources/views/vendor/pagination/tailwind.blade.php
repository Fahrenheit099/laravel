@if ($paginator->hasPages())
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        @if ($paginator->onFirstPage())
        <li class="page-item disabled"><a class="page-link">{!! __('pagination.previous') !!}</a></li>
        @else
        <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">{!! __('pagination.previous') !!}</a></li>
        @endif
        @if ($paginator->hasMorePages())
        <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}">{!! __('pagination.next') !!}</a></li>
        @else
        <li class="page-item disabled"><a class="page-link">{!! __('pagination.next') !!}</a></li>
        @endif
      </ul>
    </nav>
@endif

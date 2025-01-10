@if ($paginator->hasPages())
    <div class="row justify-content-between">
        <div class="col-auto">
            @if ($paginator->onFirstPage())
            <div class="btn btn-secondary btn-sm page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="page-link" aria-hidden="true">&lsaquo;</span>
            </div>
            @else
            <div class="btn btn-primary btn-sm page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                    aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </div>
            @endif
            
        </div>
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <div class="col-auto">

            <div class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></div>
        </div>
        @endif
        
        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <div class="col-auto">

            {{-- <div class="page-item  btn-light active" aria-current="page"><span class="page-link">{{ $page }}</span></div> --}}
            <div class="page-item btn btn-primary"><a class="page-link" href="{{ $url }}">{{ $page }}</a></div>
        </div>
        @else
        <div class="col-auto">

            <div class="page-item btn btn-light"><a class="page-link" href="{{ $url }}">{{ $page }}</a></div>
        </div>
        @endif
        @endforeach
        @endif
        @endforeach
        <div class="col-auto">
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
            <div class="btn btn-primary btn-sm page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"
                    aria-label="@lang('pagination.next')">&rsaquo;</a>
            </div>
            @else
            <div class="btn btn-secondary btn-sm page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="page-link" aria-hidden="true">&rsaquo;</span>
            </div>
            @endif
        </div>
    </div>
@endif

@if ($paginator->hasPages())
    <div class="row justify-content-between px-2">
        <div class="col-auto  px-0 d-md-inline-block d-none">
            @if ($paginator->onFirstPage())
            <div style="border-radius: 8px;" class="btn btn-secondary btn-sm page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="page-link" aria-hidden="true">Sebelumnya</span>
            </div>
            @else
            <div style="border-radius: 8px;" class="btn btn-primary  btn-sm page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                    aria-label="@lang('pagination.previous')">Sebelumnya</a>
                </div>
            @endif
            
        </div>
        <div class="col-auto d-md-none d-sm-inline-block px-0">
            @if ($paginator->onFirstPage())
            <div  style="border-radius: 8px;" class="btn btn-secondary btn-sm page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="page-link" aria-hidden="true">&lsaquo;</span>
            </div>
            @else
            <div  style="border-radius: 8px;" class="btn btn-primary btn-sm page-item ">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                    aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </div>
            @endif
            
        </div>
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <div class="col-auto px-0">

            <div class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></div>
        </div>
        @endif
        
        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <div class="col-auto px-0">

            {{-- <div class="page-item  btn-light active" aria-current="page"><span class="page-link">{{ $page }}</span></div> --}}
            <div class="page-item btn btn-primary"><a class="page-link" href="{{ $url }}">{{ $page }}</a></div>
        </div>
        @else
        <div class="col-auto px-0">

            <div class="page-item btn btn-light"><a class="page-link" href="{{ $url }}">{{ $page }}</a></div>
        </div>
        @endif
        @endforeach
        @endif
        @endforeach
        <div class="col-auto px-0 d-md-inline-block d-none">
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
            <div  style="border-radius: 8px;" class="btn btn-primary btn-sm page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"
                    aria-label="@lang('pagination.next')">Berikutnya</a>
            </div>
            @else
            <div  style="border-radius: 8px;" class="btn btn-secondary btn-sm page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="page-link" aria-hidden="true">Berikutnya</span>
            </div>
            @endif
        </div>
        <div class="col-auto px-0 d-md-none d-sm-inline-block">
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
            <div  style="border-radius: 8px;" class="btn btn-primary btn-sm page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"
                    aria-label="@lang('pagination.next')">&rsaquo;</a>
            </div>
            @else
            <div  style="border-radius: 8px;" class="btn btn-secondary btn-sm page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="page-link" aria-hidden="true">&rsaquo;</span>
            </div>
            @endif
        </div>
    </div>
@endif

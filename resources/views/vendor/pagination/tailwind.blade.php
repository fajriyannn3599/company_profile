@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="px-4 py-2 mx-1 bg-white text-red-700 border border-red-700 rounded cursor-not-allowed">&lsaquo;</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="px-4 py-2 mx-1 bg-white text-red-500 border border-red-500 rounded hover:bg-red-100">&lsaquo;</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="px-4 py-2 mx-1 bg-white text-red-700 border border-red-700 rounded">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-4 py-2 mx-1 bg-red-700 text-white border border-red-700 rounded">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="px-4 py-2 mx-1 bg-white text-red-700 border border-red-700 rounded hover:bg-red-100">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="px-4 py-2 mx-1 bg-white text-red-700 border border-red-700 rounded hover:bg-red-100">&rsaquo;</a>
        @else
            <span class="px-4 py-2 mx-1 bg-white text-red-700 border border-red-700 rounded cursor-not-allowed">&rsaquo;</span>
        @endif
    </nav>
@endif

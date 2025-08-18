@if ($paginator->hasPages())
    <nav class="flex justify-between items-center">
        <!-- Mobile View -->
        <div class="flex-1 flex justify-between md:hidden">
            <div>
                @if ($paginator->onFirstPage())
                    <span class="px-3 py-1 text-gray-400 cursor-not-allowed">Précédent</span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-1 text-blue-600 hover:bg-blue-100 rounded-lg">Précédent</a>
                @endif
            </div>
            <div>
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-1 text-blue-600 hover:bg-blue-100 rounded-lg">Suivant</a>
                @else
                    <span class="px-3 py-1 text-gray-400 cursor-not-allowed">Suivant</span>
                @endif
            </div>
        </div>

        <!-- Desktop View -->
        <div class="hidden md:flex md:flex-1 md:items-center md:justify-between">
            <!-- Page Info -->
            <div>
                <p class="text-sm text-gray-700">
                    Affichage de
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    à
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    sur
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    résultats
                </p>
            </div>

            <!-- Pagination Links -->
            <div class="flex space-x-1">
                @if ($paginator->onFirstPage())
                    <span class="px-3 py-1 text-gray-400 cursor-not-allowed">«</span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-1 text-blue-600 hover:bg-blue-100 rounded-lg">«</a>
                @endif

                @foreach ($elements as $element)
                    @if (is_string($element))
                        <span class="px-2 py-1 text-gray-500">{{ $element }}</span>
                    @endif
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span class="px-3 py-1 bg-blue-600 text-white rounded-lg">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="px-3 py-1 text-blue-600 hover:bg-blue-100 rounded-lg">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-1 text-blue-600 hover:bg-blue-100 rounded-lg">»</a>
                @else
                    <span class="px-3 py-1 text-gray-400 cursor-not-allowed">»</span>
                @endif
            </div>
        </div>
    </nav>
@endif

@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="paginate_button page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')" id="DataTables_Table_0_previous">
                    <a aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="previous" tabindex="-1" class="page-link">قبلی</a>
                </li>
            @else
                <li class="paginate_button page-item">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-controls="DataTables_Table_0" aria-label="@lang('pagination.previous')" role="link" data-dt-idx="previous" tabindex="0" class="page-link">
                        قبلی
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="paginate_button page-item disabled" aria-disabled="true" id="DataTables_Table_0_ellipsis">
                        <span aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="ellipsis" tabindex="-1" class="page-link">
                            {{ $element }}
                        </span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="paginate_button page-item active" aria-current="page">
                                <span class="page-link" aria-controls="DataTables_Table_0" role="link" aria-current="page" data-dt-idx="{{$page - 1}}" tabindex="0">
                                    {{ $page }}
                                </span>
                            </li>
                        @else
                            <li class="paginate_button page-item">
                                <a href="{{ $url }}" aria-controls="DataTables_Table_0" role="link" data-dt-idx="{{$page - 1}}" tabindex="0" class="page-link">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="paginate_button page-item" id="DataTables_Table_0_next">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" aria-controls="DataTables_Table_0" role="link" data-dt-idx="next" tabindex="0" class="page-link">
                        بعدی
                    </a>
                </li>
            @else
                <li class="paginate_button page-item disabled" id="DataTables_Table_0_next" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true" aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="next" tabindex="-1" class="page-link">
                        بعدی
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif

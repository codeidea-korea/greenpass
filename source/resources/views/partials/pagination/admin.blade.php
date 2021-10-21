@push('styles')
    <style>
        .pg_wrap > ul {
            list-style: none;
        }

        .pg_wrap > ul > li {
            float: left;
        }

        .pg_wrap > ul > li.pg_empty {
            border: 0;
            padding: 0;
        }

        .pg_wrap > ul > li.pg_empty:hover {
            cursor: default;
            color: #0d0d0d;
            background: #ffffff;
        }
    </style>
@endpush
@if($paginator->hasPages())
    <nav class="pg_wrap">
        <ul>
            <li>
                <a href="{{ $paginator->url(1) }}" class="pg_btn first"></a>
            </li>
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" class="pg_btn prev"></a>
            </li>

            @foreach($elements as $element)
                @if(is_string($element))
                    <li class="pg_btn pg_empty">&middot;&middot;&middot;</li>
                @endif

                @if(is_array($element))
                    @foreach($element as $page => $url)
                        <li>
                            <a href="{{ $url }}" class="pg_btn @if($page == $paginator->currentPage()) active @endif">{{ $page }}</a>
                        </li>
                    @endforeach
                @endif
            @endforeach

            <li>
                <a href="{{ $paginator->nextPageUrl() }}" class="pg_btn next"></a>
            </li>
            <li>
                <a href="{{ $paginator->url($paginator->lastPage()) }}" class="pg_btn last"></a>
            </li>
        </ul>
    </nav>
@endif

<ul class="pagination">
    <!-- Previous Page Link -->
    @if($paginator->total() > 0)
    @if ($paginator->onFirstPage())
        <li class="disabled"><span>&laquo;</span></li>
    @else
        <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
    @endif

    @foreach ($elements as $element)
        <!-- "Three Dots" Separator -->
        @if (is_string($element))
            <!-- <li class="disabled"><span>{{ $element }}</span></li> -->
        @endif

        <!-- Array Of Links -->
        @if (is_array($element))
            @if (count($element) > 5)
                    @php
                        $end_no = $paginator->currentPage()+2;
                    @endphp
                    @if($paginator->currentPage()>2)
                        @php
                            $start_no = $paginator->currentPage()-2;
                        @endphp
                    @else
                        @php
                            $start_no = 1;
                            $end_no = 5;
                        @endphp
                    @endif
                    <!-- //if($end_no >= $paginator->lastPage()) -->
                        @php
                            
                        @endphp
                    @if($paginator->lastPage()+2 == $end_no)
                        @php
                            $end_no = $paginator->lastPage();
                            $start_no = $start_no - 2;
                        @endphp
                    @elseif($end_no == $paginator->lastPage()+1)
                        @php
                            $end_no = $paginator->lastPage();
                            $start_no = $start_no - 1;
                        @endphp
                    @endif
                @for ($i=$start_no; $i<=$end_no; $i++)
                    @if ($i == $paginator->currentPage())
                        <li class="active"><span>{{ $i }}</span></li>
                    @else
                        <li><a href="{{ $element[$i] }}">{{ $i }}</a></li>
                    @endif
                @endfor
            @else
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endif
    @endforeach

    <!-- Next Page Link -->
    @if ($paginator->hasMorePages())
        <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
    @else
        <li class="disabled"><span>&raquo;</span></li>
    @endif
    @endif
</ul>
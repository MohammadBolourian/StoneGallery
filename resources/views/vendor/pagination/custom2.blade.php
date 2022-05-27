{{--<nav aria-label="Page navigation example" class="mt-2 mb-2">--}}
{{--    <ul class="pagination justify-content-center">--}}
{{--        <li class="page-item ">--}}
{{--            <a class="page-link" href="#" aria-label="Previous">--}}
{{--                <span aria-hidden="true">&laquo;</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="page-item active"><a class="page-link" href="#">1</a></li>--}}
{{--        <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--        <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--        <li class="page-item">--}}
{{--            <a class="page-link" href="#" aria-label="Next">--}}
{{--                <span aria-hidden="true">&raquo;</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</nav>--}}


@if ($paginator->hasPages())

    <nav aria-label="Page navigation example" class="mt-2 mb-2">
        <ul class = "pagination justify-content-center">

            @if ($paginator->onFirstPage())

                <li class = "page-item disabled"> <a class="page-link" rel="prev" href=""> << </a> </li>
            @else

                <li class = "page-item"> <a class="page-link" rel="prev" href="{{ $paginator->previousPageUrl() }}"> << </a> </li>
            @endif

            @if($paginator->currentPage() > 2)
                <li class="hidden-xs page-item"><a class="page-link" href="{{ $paginator->url(1) }}">1</a></li>

            @endif
            @if($paginator->currentPage() > 3)
                <li class = "page-item disabled"> <a class="page-link"> ... </a> </li>
            @endif
            @foreach(range(1, $paginator->lastPage()) as $i)


                {{--            tedad safahat chap va rast az inja taghir mikonad--}}


                @if($i >= $paginator->currentPage() - 1 && $i <= $paginator->currentPage() + 1)
                    @if ($i == $paginator->currentPage())
                        <li class = "page-item active"> <span class="page-link" > {{ $i }} </span> </li>
                    @else
                        <li class = "page-item"> <a class="page-link" href="{{ $paginator->url($i) }}"> {{ $i }} </a> </li>
                    @endif
                @endif
            @endforeach
            @if($paginator->currentPage() < $paginator->lastPage() - 2)
                <li class = "page-item disabled"> <a class="page-link"> ... </a> </li>
            @endif
            @if($paginator->currentPage() < $paginator->lastPage() - 1)
                <li class="hidden-xs page-item"><a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class = "page-item"> <a class="page-link" rel="next" href="{{ $paginator->nextPageUrl() }}"> >> </a> </li>
            @else
                <li class = "page-item disabled"> <a class="page-link" rel="prev" href=""> >> </a> </li>
            @endif
        </ul>
    </nav>
@endif

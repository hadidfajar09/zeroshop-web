{{-- <div class="text-right">
    <div class="pagination-container">
      <ul class="list-inline list-unstyled">
        <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
        <li><a href="#">1</a></li>
        <li class="active"><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
      </ul>
      <!-- /.list-inline --> 
    </div>
    <!-- /.pagination-container --> </div> --}}
     

        @if ($paginator->hasPages())
        <div class="text-right">
            <div class="pagination-container">
              <ul  class="list-inline list-unstyled">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="prev" >
                    <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                </li>
            @else
                <li class="prev"><a href="{{ $paginator->previousPageUrl() }}"><i class="fa fa-angle-left"></i></a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                
                <li class="next"><a href="{{ $paginator->nextPageUrl() }}"><i class="fa fa-angle-right"></i></a></li>
            @else
                <li class="next"  >
                    <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                </li>
            @endif
        </ul>
        <!-- /.list-inline --> 
      </div>
      <!-- /.pagination-container --> </div>
@endif

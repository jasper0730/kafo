
    {{-- hasPrevPages --}}
    @if( $pageNavigation['hasPrevPages'] )
        <li class="morePages"><a class="dot3" href="{{ $news->url( $pageNavigation['prevPagesMaxPage'] ) }}"></a></li>
    @endif

    @if( !empty($pageNavigation['currentSection']) )
      {{-- 頁碼 --}}
      @foreach( $pageNavigation['pageSections'][ $pageNavigation['currentSection'] ] as $page )

          <?php
              $pageLink = ItemMaker::url('News/'.$cateUrl.'?page='.$page);
          ?>

          @if( $pageNavigation['currentPage'] == $page )
              <li class="on"><a href="{{ $pageLink }}">{{ $page }}</a></li>
          @else
              <li><a href="{{ $pageLink }}">{{ $page }}</a></li>
          @endif

      @endforeach
    @endif


    {{-- hasNextPages --}}
    @if( $pageNavigation['hasNextPages'] )
        <li class="morePages"><a class="dot3" href="{{ $news->url( $pageNavigation['nextPagesMinPage'] ) }}"></a></li>
    @endif



@if( !empty($thisCategory) AND $thisCategory->type == 'horizontal' OR empty($thisCategory->type) )

            <ul class="newsListInn newsPages newsList_r">

              {{-- 圖片尺寸730x490 --}}
              @foreach( $news as $row )

              <?php
                $cateUrl = ItemMaker::processTitleToUrl( $row->category->title );
                $newsUrl = ItemMaker::processTitleToUrl( $row->title );
                $newsLink = ItemMaker::url('News/'.$cateUrl.'/'.$newsUrl);
                $newsImage = ( !empty($row->image) ) ? $row->image : 'http://fakeimg.pl/730x490/fff/e0e0e0/?text=News' ;
              ?>

                  <li>
                      <a href="{{ $newsLink }}">
                          <div class="IMG">
                              <img src="{{ $newsImage }}">
                          </div>
                          <div class="TXT">
                              <div class="date">
                                  <span>{{ date('Y', strtotime($row->date)) }}</span>.
                                  <span>{{ date('F', strtotime($row->date)) }}</span>
                                  <span>{{ date('d', strtotime($row->date)) }}</span>
                              </div>
                              <h4>{!! $row->title !!}</h4>
                              <p>{!! nl2br($row->summary) !!}</p>
                              <span class="viewMoreBtn">view more</span>
                          </div>
                      </a>
                  </li>

              @endforeach


            </ul>

            @if( !empty($thisCategory) )
              <input type="hidden" name="cateTitle" value="{{ $thisCategory->title }}">
            @else
              <input type="hidden" name="cateTitle" value="All">
            @endif


@else
{{-- 第二種版型 (直式) --}}

            <ul class="newsListInn_V newsList_r">


              {{-- 圖片尺寸280x385 --}}
              @foreach( $news as $row )

              <?php
                $cateUrl = ItemMaker::processTitleToUrl( $row->category->title );
                $newsUrl = ItemMaker::processTitleToUrl( $row->title );
                $newsLink = ItemMaker::url('News/'.$cateUrl.'/'.$newsUrl);
                $newsImage = ( !empty($row->image) ) ? $row->image : 'http://fakeimg.pl/280x385/fff/e0e0e0/?text=News' ;
              ?>

                  <li>
                      <div class="IMG">
                          <img src="{{ $newsImage }}">
                          <div class="maskLoading">
                              <span>Loading...</span>
                          </div>
                      </div>
                      <div class="TXT">
                          <div class="date">
                              <span class="Y">{{ date('Y', strtotime($row->date)) }}</span>.
                              <span class="F">{{ date('F', strtotime($row->date)) }}</span>.
                              <span class="D">{{ date('d', strtotime($row->date)) }}</span>
                          </div>
                          <h4>{!! $row->title !!}</h4>
                          <p>{!! $row->summary !!}</p>
                      </div>

                      <a href="{{ $newsLink }}"></a>
                  </li>

              @endforeach

            </ul>


@endif {{-- END 判斷版型 --}}

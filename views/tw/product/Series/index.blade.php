@extends('template')

@section('bodySetting', '')

@section('content')
@section('css')

  <!-- <link rel="stylesheet" href="../../assets/js/vendor/perfect-scrollbar/perfect-scrollbar.min.css"> -->
  <link rel="stylesheet" href="assets/css/product.css">

@stop
<div class="wrapper page-product-d">
<!--產品BANNER-->
  <div class="container top-bar">
    <div class="bread-crumbs">

      <a href="{{ ItemMaker::url('Product') }}">高鋒產品</a><span></span>
      <a href="{{ ItemMaker::url('Product/Category').'/'.$Category->id}}">{{ $Category->title }}</a><span></span>
      <a href="{{ ItemMaker::url('Product/Series').'/'.$Series->id }}">{{ $Series->title }}</a>
    </div>
    <a href="javascript:;" class="btn-back">
      <span class="fa-stack fa-lg">
        <i class="fa fa-circle-thin fa-stack-2x" aria-hidden="true"></i>
        <i class="fa fa-angle-left fa-stack-1x" aria-hidden="true"></i>
      </span>
      回上一層
    </a>
  </div>
<!---->
  <!--產品圖示-->

  <div class="product-d-banner">
  @foreach($SeriesPhoto as $value)
    <div class="product-d-slick">
      <div class="d-slick-img"><!--750x470-->
        <img src="{{ $value->image }}">
      </div>
      <div class="d-slick-txt">
        <p>{{ $Category->title }}</p>
        <p>{{ $value->title }}</p>
      </div>
    </div>
  @endforeach
  </div>

  <!---->


  <!--選單隱藏-->
  <nav class="container product-d-menu">
    <ul>
      <li class="hvr-rectangle-out"><a href="{{ ItemMaker::url('Product/Series').'/'.$Series->id  }}#detail01" class="fontM">特點</a></li>
      <li class="hvr-rectangle-out"><a href="{{ ItemMaker::url('Product/Series').'/'.$Series->id  }}#detail02" class="fontM">規格</a></li>
      @if($Series->accessory_file)
        <li class="hvr-rectangle-out"><a target="_blank" href="{{  $Series->accessory_file }}" class="fontM">選配表</a></li>
      @endif
      {{-- 是否有檔案 --}}
      @if( $Series->catelog_file )
        @if( $Series->download_directory)
          <li class="hvr-rectangle-out"><a href="{{ $Series->catelog_download }}" class="fontM" download>型錄下載</a></li>
        @else
          @if(Session()->has('Member'))
            <li class="hvr-rectangle-out"><a href="{{ $Series->catelog_download }}" class="fontM" download>型錄下載</a></li>
          @else
            <li class="hvr-rectangle-out"><a href="javascript:;" class="fontM box-btn-login" >型錄下載</a></li>
          @endif
        @endif
      @else
          <li class="no_file"><a href="javascript:;" class="no_file" >無提供型錄</a></li>
      @endif
    </ul>
  </nav>

  <section id="detail01" class="features">
    <div class="features01">
      <h2 class="detail-title">{{ $Series->title }}</h2>
      <p class="detail-txt">{{ $Category->title }}</p>
      <p class="fontM detail-p">{{ $Series->brief }}</p>
       {!! $Series->summary !!}
       @if($Series->icon)
        <div class=" img-prize"><img src="{{ $Series->icon }}"></div>
       @endif
      @if($video)
        <!--影片區-->
        <div class="product-d-vedio">
            @foreach($video as $row)
            <div class="vedio">
              <a class="youtube" href="https://www.youtube.com/embed/{{ $row['link'] }}" frameborder="0" allowfullscreen>
                <div class="vedio-txt">
                  <span>{{ $row['title'] }}</span>
                  <span class="img-btn"><i class="fa fa-caret-right" aria-hidden="true"></i></span>
                </div>
                <div class="vedio-bk"></div>
                <!--600x360-->
                  <img src="{{ $row['image_pc'] }}">
              </a>
            </div>
            @endforeach
        </div>
      @endif
    </div>
    <div class="line-dash"></div>

    <div  class="features02">
      <h2 class="detail-txt-title">核心技術</h2>
      <div class="circle-slick-wrap">
        <ul class="circle-slick">
          @if($tech)
            @foreach($tech as $value)
              <li>
                <a class="circle-slick-item" data-info="{{ $value['id'] }}" href="javascript:;">
                  <img src="{{ $value->image_small }}">
                  <p>{{ $value->title }}</p>
                </a>
              </li>
            @endforeach
          @endif

        </ul>
      </div>
    </div>
    <div class="line-dash"></div>

    <!-- SPECIFICATION -->
    @if($Series->spec_id)
    <div id="detail02" class="features03">
      <div class="container">
        <h2 class="detail-txt-title">規格</h2>
        <div class="product-table">
          <table class="table01" cellspacing="0" width="100%">
            <thead>
              {{-- @if($spechead)
                <tr>
                    <th width="15%">型號</th>
                      @foreach($spechead as $row)
                        <th colspan="{{ $row['colspan'] }}">{{ $row['title'] }}</th>
                      @endforeach
                </tr>
              @endif --}}

                @if($specField )
                  <tr>
                      <th>型號</th>
                        @foreach($specField as $key => $row)
                            <th >{!! $row['first'] !!}</th>
                        @endforeach
                  </tr>
                  <tr>
                      <td>&nbsp</td>
                        @foreach($specField as $key => $row)
                            <td >{{ $row['second'] }}</td>
                        @endforeach
                  </tr>
                @endif
              </thead>
              <tbody>

            @foreach($compareSpec as $row)

              <tr>
                {{-- @if($row['is_win'])
                  <th><a class="box-btn-specification Item{{ $row['id'] }}" href="javascript:void(0)" data-info="{{ $row['id'] }}">{!! $row['title'] !!}<br><span>WINNING</span></a></th>
                @else
                   <th><a class="box-btn-specification" href="javascript:void(0)" data-info="{{ $row['id'] }}">{{ $row['title'] }}</a></th>
                @endif --}}

                  <th><a class="box-btn-specification Item{{ $row['id'] }}" href="javascript:void(0)" data-info="{{ $row['id'] }}"><p>{!! $row['title'] !!}</p>

                    @if($row['sub_title'])
                      <p>{{ $row['sub_title'] }}</p>
                    @endif

                    @if($row['is_win'])
                      <span>WINNING</span>
                    @endif


                  </a></th>

                {{-- @if($is_two_title)
                  <th><a class="box-btn-specification" href="javascript:void(0)" data-info="{{ $row['id'] }}">{{ $row['sub_title'] }}</a></th>
                @endif --}}

                @if( isset($row['spec']) )
                  @foreach( $row['spec'] as $key => $row2 )
                    <td ><a class="box-btn-specification" href="javascript:void(0)" data-info="{{ $row['id'] }}">{!!$row2 !!}<span class="tooltiptext">{!! $row['title'] !!}</span></a></td>
                  @endforeach
                @endif
              </tr>

            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    @endif
    <div class="contact-us-block">
      <p class="contact-us-p" style="color:#e60012;">{!! $Series->spec_detail !!}</p>
      <p class="contact-us-p">如果您想要了解更多關於我們的產品，歡迎隨時與我們聯繫。</p>
      <a class="contact-us-button hvr-rectangle-out" href="{{ ItemMaker::url('contact') }}">聯絡我們</a>
    </div>

  </section>


  <!--前後產品欄位-->
  <section class="container product-d-page">
    @if( $PreItem )
    <a class="page-prev-wrap" href="{{ ItemMaker::url('Product/Series') .'/'.$PreItem->id}}">
      <div class="page-hover">
        <div>
          <img src="assets/img/page-prev.png">
          <span>上一則系列</span>
        </div>
      </div>
      <div class="page page-prev">
        <div class="page-img">
          <!--寬度200內-->
          <img src="upload/product/product/product01.png">
        </div>
        <div class="page-txt">
          <p class="page-title">{{ $PreItem->title }}</p>
           <p class="fontM page-title-txt">{{ $PreItem->brief_short }}</p>
        </div>
      </div>
    </a>
    @endif

    @if( $NextItem )

    <a class="page-next-wrap" href="{{ ItemMaker::url('Product/Series') .'/'.$NextItem->id}}">
      <div class="page-hover">
        <div>
          <img src="assets/img/page-next.png">
          <span>下一則系列</span>
        </div>
      </div>
      <div class="page page-next">
        <div class="page-img">
          <img src="upload/product/product/product02.png">
        </div>
        <div class="page-txt">
          <p class="page-title">{{ $NextItem->title }}</p>
          <p class="fontM page-title-txt">{{ $NextItem->brief_short }}</p>
        </div>
      </div>
    </a>
    @endif
  </section>
  <!---->

<!--footer-->
   @include($locale.'.index_footer')
  <!--*****-->
</div>
<script src="assets/js/vendor/jquery.easings.min.js"></script>
<!--光箱-->
<script src="assets/js/vendor/colorbox/jquery.colorbox-min.js"></script>
<!--滾軸-->
<script src="assets/js/vendor/semanticwp/jquery.semanticwp-modal.min.js"></script>
<script src="assets/js/vendor/scrollbar/mCustomScrollbar.concat.min.js"></script>
<!--動畫-->
<script src="assets/js/vendor/waypoints.min.js"></script>
<!--banner輪播-->
<script src="assets/js/vendor/slick/slick.min.js"></script>
<!--table-->
<script src="assets/js/vendor/dataTable.js"></script>
<script src="assets/js/vendor/jquery.dataTables.min.js"></script>
<!-- <script src="../../assets/js/vendor/perfect-scrollbar/perfect-scrollbar.jquery.min.js"></script> -->
<!--共用js-->
<script src="assets/js/main.js"></script>
<!--本頁js-->
<script src="assets/js/product.js"></script>


<script  type="text/javascript" >
  $('.btn-back').click(function(){
     window.history.back();
  });



</script>
      @stop

@stop

@extends('template')

@section('bodySetting', '')

@section('content')
@section('css')
  <link rel="stylesheet" href="assets/css/product.css">
@stop
<div class="wrapper page-product-d">
<!--產品BANNER-->
  <div class="container top-bar">
    <div class="bread-crumbs">
      <a href="{{ ItemMaker::url('/') }}">PRODUCTS</a><span></span>
      <a href="{{ ItemMaker::url('Product/Series').'/'.$Series->id }}">{{ $Series->title }}</a><span></span>
      <a href="javascript:;">{{ $Item->title }}</a>
    </div>
    <a href="javascript:;" class="btn-back">
      <span class="fa-stack fa-lg">
        <i class="fa fa-circle-thin fa-stack-2x" aria-hidden="true"></i>
        <i class="fa fa-angle-left fa-stack-1x" aria-hidden="true"></i>
      </span>
      BACK
    </a>
  </div>
<!---->
  <!--產品圖示-->
  <div class="product-d-banner">
  @foreach($ItemPhoto as $value)
    <div class="product-d-slick">
      <div class="d-slick-img"><!--750x470-->
        <img src="{{ $testingLink.$value->image }}">
      </div>
      <div class="d-slick-txt">
        <p>DV-9A</p>
        <p>VERTICAL MACHINING CENTER</p>
      </div>
    </div>
  @endforeach

  </div>
  <!---->


  <!--選單隱藏-->
  <nav class="container product-d-menu">
    <ul>
      <li class="hvr-rectangle-out"><a href="{{ ItemMaker::url('Product/Item').'/'.$Series->id  }}#detail01" class="fontM">FEATURES</a></li>
      <li class="hvr-rectangle-out"><a href="{{ ItemMaker::url('Product/Item').'/'.$Series->id  }}#detail02" class="fontM">SPECIFICATION</a></li>
      <li class="hvr-rectangle-out"><a href="{{ ItemMaker::url('Product/Item').'/'.$Series->id  }}#detail03" class="fontM">ACCESSORIES</a></li>
      <li class="hvr-rectangle-out"><a href="{{ ItemMaker::url('Product/Item').'/'.$Series->id  }}#detail04" class="fontM" download>PDF DOWNLOAD</a></li>
    </ul>
  </nav>

  <section id="detail01" class="features">
    <div class="features01">
      <h2 class="detail-title">{{ $Item->title }}</h2>
      <p class="detail-txt">{{ $Series->title }}</p>
      <p class="fontM detail-p">{{ $Item->summary }}</p>
      <ul class="advantage fontM">
       {!! $Item->spec !!}
      </ul>
      <div class="img-prize"><img src="upload/product/detail/product_prize.jpg"></div>
      <!--影片區-->
      <div class="product-d-vedio">
        <div class="vedio">
          <a href="javascript:;">
            <div class="vedio-txt">
              <span>VIEW VIDEO</span>
              <span class="img-btn"><i class="fa fa-caret-right" aria-hidden="true"></i></span>
            </div>
            <div class="vedio-bk"></div>
            <!--600x360-->
            <img src="upload/product/detail/vedio/vedio01.jpg">
          </a>
        </div>
        <div class="vedio">
          <a href="javascript:;">
            <div class="vedio-txt">
              <span>VIEW VIDEO</span>
              <span class="img-btn"><i class="fa fa-caret-right" aria-hidden="true"></i></span>
            </div>
            <div class="vedio-bk"></div>
            <!--600x360-->
            <img src="upload/product/detail/vedio/vedio01.jpg">
          </a>
        </div>
        <div class="vedio">
          <a href="javascript:;">
            <div class="vedio-txt">
              <span>VIEW VIDEO</span>
              <span class="img-btn"><i class="fa fa-caret-right" aria-hidden="true"></i></span>
            </div>
            <div class="vedio-bk"></div>
            <!--600x360-->
            <img src="upload/product/detail/vedio/vedio01.jpg">
          </a>
        </div>
        <div class="vedio">
          <a href="javascript:;">
            <div class="vedio-txt">
              <span>VIEW VIDEO</span>
              <span class="img-btn"><i class="fa fa-caret-right" aria-hidden="true"></i></span>
            </div>
            <div class="vedio-bk"></div>
            <!--600x360-->
            <img src="upload/product/detail/vedio/vedio01.jpg">
          </a>
        </div>
        <div class="vedio">
          <a href="javascript:;">
            <div class="vedio-txt">
              <span>VIEW VIDEO</span>
              <span class="img-btn"><i class="fa fa-caret-right" aria-hidden="true"></i></span>
            </div>
            <div class="vedio-bk"></div>
            <!--600x360-->
            <img src="upload/product/detail/vedio/vedio01.jpg">
          </a>
        </div>
        <div class="vedio">
          <a href="javascript:;">
            <div class="vedio-txt">
              <span>VIEW VIDEO</span>
              <span class="img-btn"><i class="fa fa-caret-right" aria-hidden="true"></i></span>
            </div>
            <div class="vedio-bk"></div>
            <!--600x360-->
            <img src="upload/product/detail/vedio/vedio01.jpg">
          </a>
        </div>
      </div>
    </div>
    <div class="line-dash"></div>

    <div  class="features02">
      <h2 class="detail-txt-title">RELATED PRODUCTS TECHNOLOGY</h2>
      <div class="circle-slick-wrap">
        <ul class="circle-slick">

          <li>
            <a class="circle-slick-item" href="javascript:;">
              <img src="upload/product/detail/circle/circle01.png">
              <p>LINEAR GUIDE WAYS</p>
            </a>
          </li>
          
          <li>
            <a class="circle-slick-item" href="javascript:;">
              <img src="upload/product/detail/circle/circle02.png">
              <p>Z AXIS NO BALANCE WEIGHT</p>
            </a>
          </li>

          <li>
            <a class="circle-slick-item" href="javascript:;">
              <img src="upload/product/detail/circle/circle03.png">
              <p>BALLSCREW COOLING SYSTEM</p>
            </a>
          </li>

          <li>
            <a class="circle-slick-item" href="javascript:;">
              <img src="upload/product/detail/circle/circle04.png">
              <p>CUTTING PERFORMANCE</p>
            </a>
          </li>

          <li>
            <a class="circle-slick-item" href="javascript:;">
              <img src="upload/product/detail/circle/circle01.png">
              <p>LINEAR GUIDE WAYS Two</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="line-dash"></div>
  </section>

  <!--前後產品欄位-->
  <section class="container product-d-page">
    @if( $PreItem )
    <a class="page-prev-wrap" href="{{ ItemMaker::url('Product/Item') .'/'.$PreItem->id}}">
      <div class="page-hover">
        <div>
          <img src="assets/img/page-prev.png">
          <span>PREV SERIES</span>
        </div>
      </div>
      <div class="page page-prev">
        <div class="page-img">
          <!--寬度200內-->
          <img src="upload/product/product/product01.png">
        </div>
        <div class="page-txt">
          <p class="page-title">{{ $PreItem->title }}</p>
          <p class="fontM page-title-txt">{{ $PreItem->summary }}</p>
        </div>
      </div>
    </a>
    @endif

    @if( $NextItem )
    
    <a class="page-next-wrap" href="{{ ItemMaker::url('Product/Item') .'/'.$NextItem->id}}">
      <div class="page-hover">
        <div>
          <img src="assets/img/page-next.png">
          <span>NEXT SERIES</span>
        </div>
      </div>
      <div class="page page-next">
        <div class="page-img">
          <img src="upload/product/product/product02.png">
        </div>
        <div class="page-txt">
          <p class="page-title">{{ $NextItem->title }}</p>
          <p class="fontM page-title-txt">{{ $NextItem->summary }}</p>
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
<script src="assets/js/vendor/magnific/jquery.magnific-popup.min.js"></script>
<!--動畫-->
<script src="assets/js/vendor/waypoints.min.js"></script>
<!--banner輪播-->
<script src="assets/js/vendor/slick/slick.min.js"></script>
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

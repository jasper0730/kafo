@extends('template')

@section('bodySetting', '')

@section('content')
@section('css')
  
  <link rel="stylesheet" href="assets/css/support.css">

@stop
<div class="wrapper page-support">
  <!--header-->
    @include($locale.'.headerbanner')
  <!--******-->
  <section class="banner support-banner support-video-banner">
    <h2 class="hideText disNone">Banner</h2>
    <div class="bannerIND">
      @foreach($BannerImage as $row)
      <div class="xsBGshow" data-small="{{ $row->image_mobile}}" data-large="{{ $row->image_pc }}" style="background:url('{{ $row->image_pc }}') no-repeat center center; background-size:cover"><!--PC尺寸1440x490-->
        <div class="indexTit">
          <div class="inner">
            <p class="banner-txt01">{{ $support->video_inner_title }}</p>
            <p class="banner-txt02">{{ $support->video_inner_brief }}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <a href="{{ ItemMaker::url('support/video') }}#video" class="btn-down"></a>
  </section>
  <section id="video" class="video-wrap">
    <div class="container top-bar">
      <div class="bread-crumbs">
        <a href="{{ ItemMaker::url('support') }}">技術支援</a><span></span>
        <a href="{{ ItemMaker::url('support/video') }}">影片</a>
      </div>
      <a href="javascript:;" class="btn-back">
        <span class="fa-stack fa-lg">
          <i class="fa fa-circle-thin fa-stack-2x" aria-hidden="true"></i>
          <i class="fa fa-angle-left fa-stack-1x" aria-hidden="true"></i>
        </span>
        回上一層
      </a>
    </div>
    <!-- 型號篩選 -->
    <div class="product-type">
      <a href="javascript:;"><span class="move title">請選擇分類</span></a>
      <div class="product-select">
        <span class="product-selected jq-selectBtn">FIVE-FACE DOUBLE COLUMN MACHINING</span>
        <ul class="jq-selectBox">
          @foreach($videoCategory as $value)
            <li><a id="{{ $value->id }}" href="{{ ItemMaker::url('support/video') .'/'.$value->id}}">{{ $value->title }}</a></li>
          @endforeach
        </ul>
      </div>
      <hr class="hr01"></hr>
    </div>
    @if($videofirst)
    <div class="video-banner">
      <div class="vedio">
        <a class="youtube" href="https://www.youtube.com/embed/{{ $videofirst->link }}" frameborder="0" allowfullscreen>
          <div class="vedio-txt">
            <span>瀏覽影片</span>
            <span class="img-btn"><i class="fa fa-caret-right" aria-hidden="true"></i></span>
          </div>
          <div class="vedio-bk"></div>
          <!--600x360-->
          <div class="vedio-img" style="background:url('{{ $videofirst->image_pc }}') no-repeat center center; background-size:cover"></div>
        </a>

        <div class="video-txt">
          <small class="fontM">{{ $videofirst->updated_at->format('Y-m-d') }}</small>
          <p class="t">{{ $videofirst->title }}</p>
          @if($videofirst->is_top)
            <p class="fontM txt">{{ $videofirst->brief }}</p>
          @else
            <p class="fontM txt">This is not top file</p>
          @endif
        </div>
      </div>
    </div>
    @endif
    
    @if($video)
    <div class="line-dash"></div>
    <ul class="all-video">

      @foreach($video as $row)
      <li class="video-list">
      
        <a class="youtube" href="https://www.youtube.com/embed/{{ $row->link }}" frameborder="0" allowfullscreen>
          <div class="vedio-txt">
            <span>瀏覽影片</span>
            <span class="img-btn"><i class="fa fa-caret-right" aria-hidden="true"></i></span>
          </div>
          <div class="vedio-bk"></div>
          <!--600x360-->
          <div class="vedio-img" style="background:url('{{ $row->image_pc }}') no-repeat center center; background-size:cover"></div>
        </a>

        <div class="video-txt">
          <small class="fontM">{{ $row->updated_at->format('Y-m-d') }}</small>
          <p class="t">{{ $row->title }}</p>
        </div>
      </li>
      @endforeach
    </ul>
    @endif

  </section>
   
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
<!--共用js-->
<script src="assets/js/main.js"></script>
<!--本頁js-->

<script src="assets/js/support.js"></script>

<script  type="text/javascript" >
  $('.btn-back').click(function(){
     window.history.back();
  });


  $(document).ready(function(){
    /*從網址抓現在的系列 並設定selected選項*/
    var str = location.href
    
    str = str.split("/");
    str = str.pop();
    var seletedTile = $('#'+str).html()
    // 元件 id 相衝
    if( str != "video"){
      $('.product-selected').text(seletedTile)
    }
    
  });

</script>
      @stop

@stop

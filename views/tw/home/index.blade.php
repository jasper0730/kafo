@extends('template')


@section('bodySetting', '')

@section('content')

@section('css')
   <link rel="stylesheet" href="assets/css/home.css"/>
@stop

<div class="wrapper page-home">

  <ul class="left-menu">
    <li class="current"><a href="#home01">首頁</a></li>
    <li><a href="{{ ItemMaker::url('/') }}#home02">最新產品</a></li>
    <li><a href="{{ ItemMaker::url('/') }}#home03">最新消息</a></li>
    <li><a href="{{ ItemMaker::url('/') }}#home04">關於高鋒</a></li>
  </ul>

  <!--header-->
    @include($locale.'.headerbanner')
  <!--******-->
<!--區塊1-->

  <section id="home01" class="banner home-banner">
    <h2 class="hideText disNone">Banner</h2>
    <div class="bannerIND">
      @foreach($BannerImage as $value)
      <div class="xsBGshow" data-small="{{ $value->image_mobile }}" data-large="{{ $value->image_pc }}" style="background:url('{{ $value->image_pc }}') no-repeat center center; background-size:cover"><!--PC尺寸1440x963 Mobill尺寸640x900-->
        {{-- <a href="javascript:;" > 拿掉banne會出現click--}}
          <div class="indexTit">
            <div class="inner">
              <div class="banner-logo hideText">KAFO</div>
              <p class="txt01">{{ $value->title }}</p>
              <p class="txt02">{{ $value->subtitle }}</p>
            </div>
          </div>
        {{-- </a> --}}
      </div>
      @endforeach

    </div>
    <a href="#home02" class="btn-down"></a>
  </section>
<!--****-->

  <!--區塊2-->
  <section id="home02" class="home-product">
  <a href="#home02"><h2 class="title">熱門產品</h2></a>

    <div class="home-product-main">
      <a href="{{ ItemMaker::url('Product') }}" class="btn-square hvr-underline-from-left btn-home-product">
        產品列表
      </a>
      <!--讓客戶自己選擇上底色-->
      <div class="hideText bg-blue" style="background-color: {{ $Banner->backcolor }}">底圖</div>
      <div class="home-product-banner">

        @foreach($ProductSeries as $value)
          <div class="banner-slick">
            <div class="BGshow" data-small="{{ $value->image_pc }}" data-large="{{ $value->image_pc }}" style="background:url('{{ $value->image_pc }}') no-repeat center center; background-size:cover">
            <!--PC尺寸650x460-->
            </div>

            <div class="product-indexTit">
              <div class="inner">
                <h3 class="txt01">{{ $value->title }}</h3>
                <p class="fontM txt02">{{ $value->brief_short }}</p>
                <a href="{{ ItemMaker::url('Product/Series').'/'.$value->id }}" class="fontM hvr-rectangle-out btn-gray">閱讀更多</a>
              </div>
            </div>

          </div>
        @endforeach

      </div>
    </div>
  </section>
<!--****-->

  <!--news還不做-->
  <!--區塊3-->
  <section id="home03" class="home-news">
  <a href="#home03"><h2 class="title">最新消息</h2></a>
    <div class="home-news-bg" style="background: url(upload/home/news/bg-new.png) no-repeat center center; background-size: cover;"><!--1800x945-->
      <img src="upload/home/news/bg-new.png">
    </div>
    <div class="home-news-main">
      <ul class="home-news-slick">

        @foreach($newsItem as $value)
        <li class="home-news-item">
          <a href="{{ ItemMaKER::url('news/detail') }}/{{ $value->id }}">
            <!--172x172-->
            <img src="{{ $value->image_small }}">
            <div class="home-news-txt">
              <h3>{{ $value->category_title }}</h3>
              <p>{{ $value->title }}</p>
            </div>
          </a>
        </li>
        @endforeach

      </ul>
      <a href="{{ ItemMaker::url('news') }}" class="hvr-rectangle-out btn-more">更多新聞</a>
    </div>
  </section>
  <section id="home04" class="home-about">
  <a href="#home04"><h2 class="title">關於高鋒</h2></a>
    <div class="home-about-main">
      <div class="hideText bg">底圖</div>
      <div class="home-about-left">
        <div class="bg-red">
          <div>
            <img src="assets/img/logo.svg" alt="KAFO LOGO">
            <span class="fontM">KAO FONG MACHINERY CO., LTD</span>
          </div>
        </div>
        <img class="leaf" src="assets/img/leaf.png" alt="leaf">
      </div>
      <div class="home-about-right">
        <div class="home-about-txt">
          <h3>
              <span>{{ $Company[0]["title"] }}</span>
              <span>{{ $Company[0]["subtitle"] }}</span>
          </h3>
          <p>{!!$Company[0]["brief"] !!}</p>
          <a href="{{ ItemMaker::url('About') }}" class="fontM hvr-rectangle-out btn-black">閱讀更多</a>
        </div>

        <!--554x369-->
        <div class="home-about-img"><img src="upload/home/about/about01.png"></div>
      </div>
      <div class="home-about-menu">
        <ul>
          @foreach($footMenu as $row)
          <li><a href="{{ App::getLocale()."/".$row->link }}">{{ $row->title }}</a></li>
          @endforeach
        </ul>
        <!--<span class="fontM">選擇高鋒相關單元</span>-->
      </div>
    </div>
  </section>
  <!--****-->

  <!--footer-->
   @include($locale.'.index_footer')
  <!--*****-->

</div>

      @section('script')

      {{-- <script src="assets/js/vendor/jquery.easings.min.js"></script> --}}
      <!--動畫-->
      <script src="assets/js/vendor/waypoints.min.js"></script>
      <!--banner輪播-->
      <script src="assets/js/vendor/slick/slick.min.js"></script>
      <!--左邊選單-->
      <script src="assets/js/vendor/jquery.nav.js"></script>
      <!--共用js-->
      <script src="assets/js/main.js"></script>
      <!--本頁js-->
      <script src="assets/js/home.js"></script>
      @stop

@stop

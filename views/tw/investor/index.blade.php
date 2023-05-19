@extends('template')


@section('bodySetting', '')

@section('content')

@section('css')
    <link rel="stylesheet" href="assets/css/investors.css">
@stop

<div class="wrapper page-investors">

  <!--header-->
    @include($locale.'.headerbanner')
  <!--******-->

  <section class="banner investors-banner">
    <h2 class="hideText disNone">Banner</h2>
    <div class="bannerIND">
    @foreach($BannerImage as $value)
      <div class="b-lazy" data-small="{{ $value->image_small }}" data-src="{{ $value->image_pc }}" style="background:url('{{ $value->image_pc }}') no-repeat center center; background-size:cover">
        <div class="indexTit">
          <div class="inner">
            <p class="banner-txt01">{{ $value->title }}</p>
            <p class="banner-txt02">台灣證券交易所 : 4510</p>
          </div>
        </div>
      </div>
    @endforeach
  </section>

  <!-- 中間選單 -->
  <div class="menu-center">
    <a class="menu-btn jq-menu-btn" href="javascript:void(0)">財務資訊<span>每月營收</span></a>
    <ul class="menu-box jq-menu-box">
      @foreach($titleArray as $key1 => $row)
       @foreach($row as $key2 => $title)
       <li>
        <a class="navbar-main" href="javascript:void(0)">{{ $key2 }}</a>
        <ul class="navsub">
            @foreach($title as $key3 => $branch)
            <li><a href="{{ App::getLocale()."/".$titlelink[$key1][$key2][$key3] }}">{{ $branch }}</a></li>
            @endforeach
         </ul>
      </li>
       @endforeach
      @endforeach
    </ul>
  </div>

  <section id="investors" class="investors-wrap">
    <div class="container">
      <a href="{{ ItemMaker::url("investor") }}#investors">
        <h2 class="title">
          <span class="fontM investors-title">4510</span>
        </h2>
      </a>
      <div class="investors-info">
        <span class="title">{{ $investor->title }}</span>
        <p>{!! $investor->brief !!}</p>
      </div>
      <ul class="investors-main">
        @foreach($titleArray as $key1 => $row)
         @foreach($row as $key2 => $title)

            <li class="investors-list">
              <a href="javascript:void(0)" class="investors-list-img">
                <div><img src="upload/investors/img-hover01.png"></div>
                <img src="{{ $titleImage[$key1]['image'] }}" alt="財務資訊圖片">
              </a>
              <div class="investors-list-txt">
                <span class="cn">{{ $key2 }}</span>
                <span class="en">FINANCIAL INFORMATION</span>
                <ul class="btn-investors">
                  @foreach($title as $key3 => $branch)
                    <li><a href="{{ App::getLocale()."/".$titlelink[$key1][$key2][$key3] }}">{{ $branch }}</a></li>
                  @endforeach
                </ul>
              </div>
            </li>
         @endforeach
        @endforeach

      </ul>
    </div>
  </section>
    <!--footer-->
   @include($locale.'.index_footer')
  <!--*****-->
</div>

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
      <script src="assets/js/investors.js"></script>
      <script src="assets/js/vendor/blazy.js"></script>
       <script>
        // $(document).ready(function(){
        //   var bLazy = new Blazy({
        //   });
        // })
      </script>

      @stop

@stop

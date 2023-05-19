@extends('template')


@section('bodySetting', '')
 
@section('content')

@section('css')
    <link rel="stylesheet" href="assets/css/investors.css">
@stop
<div class="wrapper page-revenue">
  <!--header-->
    @include($locale.'.headerbanner')
  <!--******-->
  <section class="banner investors-banner">
    <h2 class="hideText disNone">Banner</h2>
    <div class="bannerIND">
    @foreach($BannerImage as $value)
      <div class="xsBGshow" data-small="{{ $value->image_small }}" data-large="{{ $value->image_big}}" style="background:url('{{ $value->image_big }}') no-repeat center center; background-size:cover"><!--PC尺寸1440x570-->
        <div class="indexTit">
          <div class="inner">
            <p class="banner-txt01">{{ $value->title }}</p>
            <p class="banner-txt02">台灣證券交易所 : 4510</p>
          </div>
        </div>
      </div>
    @endforeach
    </div>
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

  <section id="revenue" class="revenue-wrap">
    <a href="{{ ItemMaker::url("Policy/directors") }}#revenue">
      <h2 class="move title">
        <span class="fontM">公司治理</span>
      </h2>
    </a>
    <div class="inner">
      <div class="revenue-info">
        <span>董事會</span>
        <span>BOARD OF DIRECTORS</span>
      </div>

      <div class="revenue-year">
        <span>請選擇年度</span>
        <span class="revenue-year-line "></span>
        <div class="revenue-year-select get-content-year">
          <a class="li_first" href="javascript:void(0)"></a>
          <ul class="select_option">
            @foreach($getYear as $value)
            <li><a href="javascript:void(0)">{{ $value }}</a></li>
            @endforeach
          </ul>
        </div>
      </div>

      <section class="director-info">
      
        

      </section>
    </div>
  </section>
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
      <script src="assets/js/getContent.js"></script>
      <script type="text/javascript" >
        $(window).load(function(){
          $(".li_first").text($(".select_option li:first-child").text());
          $(".select_option li:first-child a").click();
        });
      </script>
      @stop

@stop
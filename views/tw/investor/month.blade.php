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
      <div class="xsBGshow" data-small="{{ $value->image_small }}" data-large="{{ $value->image_big }}" style="background:url('{{ $value->image_big }}') no-repeat center center; background-size:cover"><!--PC尺寸1440x570-->
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
    <a href="{{ ItemMaker::url("financal/month") }}#revenue">
      <h2 class="move title">
        <span class="fontM">財務資訊</span>
      </h2>
    </a>
    <div class="inner">
      <div class="revenue-info">
        <span>每月營收</span>
        <span>MONTHLY REVENUE</span>
      </div>
      <div class="revenue-year">
        <span>請選擇年度</span>
        <span class="revenue-year-line"></span>
        <div class="revenue-year-select">
          <a class="first" href="javascript:void(0)">年度</a>
          <ul class="get-year" > 
            @foreach($getyear as $value)
              <li><a href="javascript:void(0)">{{ $value }}年度</a></li>
            @endforeach
          </ul>
        </div>
      </div>
      <span class="revenue-unit">單位:新台幣仟元</span>

      <table class="table-type1">
        <thead>
          <tr>
            <th>月份</th>
            <th>當月營收</th>
            <th>去年同期</th>
            <th>月增率</th>
            <th>去年月增率</th>
            <th>累計營收</th>
            <th>去年累計營收</th>
            <th>年增率</th>
          </tr>
        </thead>
        <tbody class="Income-year-month">
          <tr>
           <!-- 年度月分營收 -->
          </tr>
        </tbody>

      </table>
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
      <script src="assets/js/getIncome.js"></script>
      <script type="text/javascript">
          $(".first").text($(".get-year li:first-child").text());
      </script>
      @stop

@stop



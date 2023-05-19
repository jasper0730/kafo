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
    <a href="#revenue">
      <h2 class="move title">
        <span class="fontM">活動訊息</span>
      </h2>
    </a>
    <div class="inner">
      <div class="revenue-info">
        <span>重大訊息</span>
        <span>IMPORTANT ANNOUNCEMENT</span>
      </div>

      <!--
      <p class="investor-word">歡迎從<a href="javascript:void(0)" class="investor-word-link">公開資訊觀測站</a>之重大訊息與公告，輸入高鋒公司代碼：4510，查詢更多的重大訊息公告。</p>-->

      <p class="investor-word">查詢各年度重大訊息進入「<a href="http://mops.twse.com.tw/mops/web/index" class="investor-word-link">公開資訊觀測站</a>」
      </p>

      <div class="announce-director">
        <ol class="director-doc">
          <li>
            點選「重大訊息」
          </li>
          <li>
            點選「歷史重大訊息-本國第一上市(櫃)公司」
          </li>
          <li>
            輸入本公司代碼：<strong>4510</strong>
          </li>
          <li>
            輸入欲查詢年度
          </li>
        </ol>
      </div>

      <div class="revenue-year">
        <span>請選擇年度</span>
        <span class="revenue-year-line"></span>
        <div class="revenue-year-select">
          <a href="javascript:void(0)">選擇年度</a>

          <ul>
            <li><a href="javascript:void(0)">所有年度</a></li>
            @foreach($getyear as $value)
            <li><a href="javascript:void(0)">{{ $value }}</a></li>
            @endforeach
          </ul>
        </div>
      </div>

      <table class="table-type1 shareholder-table conference-table">
        <thead>
          <tr>
            <th>年度</th>
            <th class="shareholder-title">標題</th>
            <th>連結</th>
          </tr>
        </thead>
        <tbody>
          @foreach($announce as $value)
          <tr>
            <td class="director-num">{{ $value->year }}</td>
            <td class="title_1 shareholder-title" data-title="標題">{{ $value->title }}</td>
            <td class="title_1" data-title="檔案下載">
              @if($value->file)
                <a href="{{ $value->file }}" target="_blank" class="management-click no-rotate"><span class="icon-cross"></span></a>
              @else
                -
              @endif
            </td>
          </tr>
          @endforeach
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
      <script src="assets/js/announce.js"></script>


      @stop

@stop

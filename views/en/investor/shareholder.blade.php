@extends('template')

@section('bodySetting', '')

@section('content')

@section('css')
    <link rel="stylesheet" href="assets/css/investors.css">
@stop

<div class="wrapper page-shareholder">
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
    <a href="{{ ItemMaker::url("board") }}#revenue">
      <h2 class="move title">
        <span class="fontM">股東專區</span>
      </h2>
    </a>
    <div class="inner">
      <div class="revenue-info">
        <span class="sh-revenue-info">台灣證券交易所</span>
      </div>
      <div class="stock-price for-stock clearfix">
        <a href="http://www.twse.com.tw/zh/">
          <span>4510</span>
        </a>
      </div>
      <p class="public-info">由公開資訊觀測站的『股東會及股利-->股利分派情形-董事會通過』取得本公司股利資訊。請記得在公開資訊觀測站輸入本公司股票代號：4510</p>
      <a href="http://www.twse.com.tw/" class="trade-securities hvr-rectangle-out" target="_blank">台灣證券交易所</a>
      <a href="http://mops.twse.com.tw/mops/web/index" class="open-information hvr-rectangle-out" target="_blank">公開資訊觀測站</a>
      <!---->
        <div class="revenue-info">
          <span>{{ $shareholder_page['title'] }}</span>
          <span>{{ $shareholder_page['subtitle'] }}</span>
        </div>
        <span class="revenue-unit mg-LR">{{ $shareholder_page['perstack'] }}</span>
        <table class="table-type1 shareholder-table main-list">
          <thead>
            <tr>
              <th>股東名稱</th>
              <th class="shareholder-title">持有股數</th>
              <th>持股比例</th>
            </tr>
          </thead>
          <tbody>
            @foreach($shareholder_list as $value)
              <tr>
                <td>{{ $value['title'] }}</td>
                <td class="title_1 shareholder-title" data-title="持有股數">{{ $value['number'] }}</td>
                <td class="title_1" data-title="持股比例">{{ $value['percent'] }}%</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      <!---->
      
      <div class="revenue-info">
        <span>股東會</span>
        <span>Shareholders' Meeting</span>
      </div>

      <div class="revenue-shareholder clearfix">
        <div class="revenue-year shareholder-year">
          <span>請選擇年度</span>
          <span class="revenue-year-line shareholder-line"></span>
          <div class="revenue-year-select shareholder-select holder-year-select">
            <a href="javascript:void(0)">選擇年度</a>
            <ul>
              <li ><a class="all chosen" href="javascript:void(0)">所有年度</a></li>
            @foreach($getYear as $value)
              <li><a href="javascript:void(0)">{{ $value }}</a></li>
            @endforeach
            </ul>
          </div>
        </div>
        <div class="revenue-year shareholder-class">
          <span>請選擇類別</span>
          <span class="revenue-year-line shareholder-line"></span>
          <div class="revenue-class-select shareholder-select holder-category-select">
            <a href="javascript:void(0)">選擇類別</a>
            <ul>
              <li ><a class="chosen" href="javascript:void(0)" id="all">所有項目</a></li>
            @foreach($category as $value)
              <li ><a href="javascript:void(0)" id="{{ $value->id }}">{{ $value->title }}</a></li>
            @endforeach
            </ul>
          </div>
        </div>
      </div>

      <table class="table-type1 shareholder-table">
        <thead>
          <tr>
            <th>年度</th>
            <th class="shareholder-title">標題</th>
            <th>檔案下載</th>
          </tr>
        </thead>
        <tbody class="get-file">

        @foreach($board as $value)
          <tr>
            <td>{{ $value->year }}</td>
            <td class="title_1 shareholder-title" data-title="標題">{{ $value->title }}</td>
            @if($value->file)
                <td class="title_1" data-title="檔案下載"><a href="{{ $value->file }}" download=""><span class="icon-download"></span></a>
                </td>
            @else
                <td class="title_1" data-title="檔案下載"></td>
            @endif
          </tr>
        @endforeach

        </tbody>
      </table>
    </div>
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
      <script src="assets/js/getBoard.js"></script>

      @stop

@stop

@extends('template')

@section('bodySetting', '')
 
@section('content')

@section('css')
    <link rel="stylesheet" href="assets/css/investors.css">
@stop

<body>
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
    <a href="{{ ItemMaker::url("Activity/conference") }}#revenue">
      <h2 class="move title">
        <span class="fontM">活動訊息</span>
      </h2>
    </a>
    <div class="inner">
      <div class="revenue-info">
        <span>公司法人說明會簡報</span>
        <span>INVESTOR CONFERENCE</span>
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
            <th>檔案下載</th>
          </tr>
        </thead>
        <tbody>
          @foreach($conference as $value)
          <tr>
            <td class="director-num">{{ $value->year }}</td>
            <td class="title_1 shareholder-title" data-title="標題">{{ $value->title }}</td>
            @if($value->file)
              <td class="title_1 org_download" data-title="檔案下載"><a href="{{ $value->file }}" download="" class="management-click no-rotate"><span class="icon-download"></span></a></td>
            @else
              <td class="title_1 org_download" data-title="檔案下載"></td>
            @endif
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
      <script src="assets/js/conference.js"></script>
 

      @stop

@stop

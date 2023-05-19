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
    <a href="#revenue">
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
          <a href="javascript:void(0)">2016年度</a>
          <ul>
            @foreach($getYear as $value)
            <li><a href="javascript:void(0)">{{ $value }}</a></li>
            @endforeach
          </ul>
        </div>
      </div>

      <section class="director-info">
      
        <article class="director-article clearfix">
          <p class="director-date">2016/10/30</p>
          <ol class="director-doc">
            <li>通過修訂本公司「公司章程」部分條文，提105年股東會議決。</li>
            <li>通過本公司一０四年度個體財務報表及合併財務報表，提105年股東會承認。</li>
            <li>通過本公司一０四年度盈餘分配，提105年股東會議決。</li>
            <li>通過修訂原「董監酬勞分配辦法」為｢董事、監察人及功能性委員酬金給付辦法｣，依辦法執行。</li>
            <li>通過一０四年度董監事酬勞及員工紅利分配案，提105年股東會報告後，併同104年現金股利同時發放。</li>
            <li>通過副總經理人事案。</li>
            <li>通過一０四年度「內部控制聲明書」，已於期限內申報主管機關。</li>
            <li>通過訂定本公司｢內部控制制度自行評估程序｣，依程序執行。</li>
            <li>通過訂定本公司｢獨立董事職責範疇規則｣，依相關規定執行。</li>
            <li>通過本公司｢監察人之職權範疇規則｣，依相關規定執行。</li>
            <li>通過訂定本公司｢誠信經營守則｣，依相關規定執行。</li>
            <li>通過訂定本公司｢道德行為準則｣，依相關規定執行。</li>
            <li>通過修訂本公司｢資金貸與他人作業程序｣，依程序執行。</li>
            <li>通過受理獨立董事候選人提名相關事宜，依相關規定辦理。</li>
            <li>通過提名獨立董事候選人名單案，已於提名期間送件。</li>
            <li>通過董事、監察人於股東會改選，提105年股東會改選。</li>
            <li>通過解除本公司新選任董事競業禁止之限制案，提105年股東會議案。</li>
            <li>通過變更本公司一○三年度國內現金增資發行新股之運用計畫案，已通報辦理變更。</li>
            <li>通過召開一０五年股東常會事宜。</li>
          </ol>
        </article>

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
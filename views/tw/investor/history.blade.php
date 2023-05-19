@extends('template')

@section('bodySetting', '')
 
@section('content')

@section('css')
    <link rel="stylesheet" href="assets/css/investors.css">
@stop

<div class="wrapper page-finance">
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
    <a href="{{ ItemMaker::url("financal/history") }}#revenue">
      <h2 class="move title">
        <span class="fontM">財務資訊</span>
      </h2>
    </a>

    <div class="inner">
      <div class="revenue-info">
        <span>歷年財務</span>
        <span>financial reports</span>
      </div>
      <table class="table-type1">
        <thead>
          <tr>
            <th>年度</th>
            <th>第一季</th>
            <th>第二季</th>
            <th>第三季</th>
            <th>第四季</th>
          </tr>
        </thead>
        <tbody>

          @foreach($history as $value)
          <tr>
            <td>{{ $value->year }}</td>
              <td class="title_1" data-title="第一季">
                @if($value->season_1)
                <a href="{{ $value->season_1 }}" download="">母子公司財報<span class="icon-download"></span></a>
                @endif
                @if($value->season_1_2)
                  <a href="{{ $value->season_1_2 }}" download="">子公司財報<span class="icon-download"></span></a>
                @endif
              </td>

              <td class="title_1" data-title="第一季">
                @if($value->season_2)
                <a href="{{ $value->season_2 }}" download="">母子公司財報<span class="icon-download"></span></a>
                @endif
                @if($value->season_2_2)
                  <a href="{{ $value->season_2_2 }}" download="">子公司財報<span class="icon-download"></span></a>
                @endif
              </td>

              <td class="title_1" data-title="第一季">
                @if($value->season_3)
                <a href="{{ $value->season_3 }}" download="">母子公司財報<span class="icon-download"></span></a>
                @endif
                @if($value->season_3_2)
                  <a href="{{ $value->season_3_2 }}" download="">子公司財報<span class="icon-download"></span></a>
                @endif
              </td>

              <td class="title_1" data-title="第一季">
               @if($value->season_4)
                <a href="{{ $value->season_4 }}" download="">母子公司財報<span class="icon-download"></span></a>
                @endif
                @if($value->season_4_2)
                  <a href="{{ $value->season_4_2 }}" download="">子公司財報<span class="icon-download"></span></a>
                @endif
              </td>
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
 

      @stop

@stop



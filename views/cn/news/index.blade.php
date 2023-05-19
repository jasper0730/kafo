@extends('template')

@section('bodySetting', '')
 
@section('content')

@section('css')
   <link rel="stylesheet" href="assets/css/news.css"/>
@stop

<div class="wrapper page-home">

    <!--header-->
    @include($locale.'.headerbanner')
    <!--******-->
    <section class="banner news-banner">
        <h2 class="hideText disNone">Banner</h2>
        <div class="bannerIND">
            @foreach($BannerImage as $value)
                <div class="xsBGshow" data-small="{{ $value->image_mobile }}" data-large="{{ $value->image_pc }}" style="background:url('{{ $value->image_pc }}') no-repeat  center center; background-size:cover">
                    <!--PC尺寸1440x??-->
                    <div class="indexTit">
                        <div class="inner">
                            <p class="txt01">{{ $value->title }}</p>
                            <p class="txt02">{{ $value->subtitle }}</p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <a href="{{ ItemMaker::url('news') }}#news01" class="btn-down news"></a>
    </section>

    <section class="news-wrap">
        <div class="container">
            <div id="news01" class="news-type">
                <a href="#news01"><span class="title">请选择分类</span></a>
                <div class="news-select">
                    <span class="news-selected jq-selectBtn">FIVE-FACE DOUBLE COLUMN MACHINING</span>
                    <ul class="jq-selectBox">
                        @foreach($newscategory as $value)
                            <li><a id="{{ $value->id }}" href="{{ ItemMaker::url('news') .'/'.$value->id}}">{{ $value->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <hr class="hr01"></hr>
            </div>

            <ul class="news-all">
                @foreach($newsItem as $value)
                    <li>
                        <a href="{{ ItemMaker::url('news/detail') }}/{{ $value->id }}">
                            <div class="news-list">
                                <div class="news-date">
                                    <span class="news-day-m">{{ $value->yearMonth }}</span>
                                    <span class="news-day-d">{{ $value->date }}</span>
                                </div>
                                <div class="news-list-img">
                                    <img src="{{ $value->image_small }}">
                                </div>
                                <div class="news-list-txt">
                                    <h4>{{ $value->category_title }}</h4>
                                    <p>{{ $value->title }}</p>
                                </div>
                            </div>
                        </a>
                        <div class="news-bottomLine clearfix"></div>
                    </li>
                @endforeach

            </ul>
        </div>
    </section>

    <!--footer-->
    @include($locale.'.index_footer')
    <!--*****-->
    </div>
    @section('script')
    <script src="assets/js/vendor/jquery.easings.min.js"></script>
    <!--動畫-->
    <script src="assets/js/vendor/waypoints.min.js"></script>
    <!--banner輪播-->
    <script src="assets/js/vendor/slick/slick.min.js"></script>
    <!--isotope圖片排版-->
    <script src="assets/js/vendor/isotope/isotope.pkgd.min.js"></script>
    <!-- lightbox -->
    <script src="assets/js/vendor/semanticwp/jquery.semanticwp-modal.min.js"></script>
    <!--共用js-->
    <script src="assets/js/main.js"></script>
    <!--本頁js-->
    <script src="assets/js/news.js"></script>

    <script  type="text/javascript" charset="utf-8" async defer>
       $(document).ready(function(){
          /*從網址抓現在的系列 並設定selected選項*/
          var str = location.href
          str = str.split("/");
          var seletedTile = $('#'+str.pop()).html();
          console.log(seletedTile)
          $('.news-selected').text(seletedTile);
  });
      
      </script>
 @stop

@stop

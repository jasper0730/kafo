@extends('template')

@section('bodySetting', '')

@section('content')

@section('css')
   <link rel="stylesheet" href="assets/css/product.css">
@stop

<div class="wrapper page-product">

  <!--header-->
    @include($locale.'.headerbanner')
  <!--******-->
  <section class="banner product-banner">
    <h2 class="hideText disNone">Banner</h2>
    <div class="bannerIND">
      @foreach($BannerImage as $value)
      <div class="xsBGshow" data-small="{{ $value->image_mobile }}" data-large="{{ $value->image_pc }}" style="background:url('{{ $value->image_pc }}') no-repeat center center; background-size:cover"><!--PC尺寸1440x700-->
        <div class="indexTit">
          <div class="inner">
            <p class="txt01">{{ $value->title }}</p>
            <p class="txt02">{{ $value->subtitle }}</p>
          </div>
        </div>
      </div>
      @endforeach

    </div>
    <a href="{{ ItemMaker::url('Product') }}#product01" class="btn-down"></a>
  </section>

  <section  class="product-wrap">
    <div id="product01" class="search-type">
       <a href="javascript:;"><span class="title">搜寻结果</span></a>
    </div>
    <ul class="product-all">
      @if( is_array( $Series ) )
        @foreach($Series as $value)
          <li>
            <div class="product-list">
              <div class="product-list-img"><!--750x360以下-->
                <img src="{{ $value['image_pc'] }}">
              </div>
              <div class="product-list-txt">
                <h2>{{ $value['title'] }}</h2>
                <p class="fontM">{{ $value['brief_short'] }}</p>
                <a href="{{ ItemMaker::url('Product/Series').'/'. $value['id'] }}" class="fontM hvr-rectangle-out btn-gray02">浏览更多</a>
              </div>
            </div>
            <div class="bg-gray"></div>
          </li>
        @endforeach
      @else
        <li>
            <div class="product-list">
              <h2>{{ $Series }}</h2>
            </div>
        </li>
      @endif
    </ul>
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
      <script src="assets/js/product.js"></script>

      @stop
      <script>
        function gotoSelect(getValue) {
          var title = getValue;
          window.location.href = "{{ ItemMaker::url('Product/Category') }}/" + title;
        }

         $(document).ready(function(){
          /*從網址抓現在的系列 並設定selected選項*/
          var str = location.href
          str = str.split("/");
          var seletedTile = $('#'+str.pop()).html();
          //$('.product-select').text(seletedTile);
        });
      </script>


@stop

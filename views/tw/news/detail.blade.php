@extends('template')

@section('bodySetting', '')
 
@section('content')

@section('css')
   <link rel="stylesheet" href="assets/css/news.css"/>
@stop

    <div class="wrapper">
        <div class="container news-community">
          <h2 class="move title">
            <a href="javascript:;" class="btn-close">
              <span class="btn-x">x</span>
            </a>
          </h2>
            <ul class=" community">
                <li class="icon-f"> <a href="javascript:;"></a> </li>
                <li class="icon-t"> <a href="javascript:;"></a> </li>
                {{-- <li class="icon-y"> <a href="javascript:;"></a> </li> --}}
            </ul>
        </div>
        <section class="news-d-wrap">
            <div class="container">
                <div class="txt01">
                    <h4>{{ $newsdetail->category_title }}</h4>
                    <h2>{{ $newsdetail->title }}</h2>
                    <span>{{ $newsdetail->publish_date }}</span>
                </div>
                <div class="txt02">
                    <h4>{{ $newsdetail->during }}</h4>
                    <h4>{{ $newsdetail->location }}</h4>
                    <h4>{{ $newsdetail->booth }}</h4>
                </div>
                <div class="txt03">
                <p>{!! $newsdetail->article !!}</p>
                </div>
                <a target="_blank" href="{{ $newsdetail->website }}">
                    {{ $newsdetail->website_title }}
                </a>
                <div class="grid hide">
                    @foreach($newsdetailphoto as $value)
                	<a href="{{ $value->image }}" class="slick-plant">
	                <div class="grid-item {{ $value->css }}"><img src="{{ $value->image }}"></div>
                    @endforeach
	              <!-- 
	                grid-item--width2   寬度兩倍
	                grid-item--height2  高度兩倍
	                要麻煩後端幫寫class的部分
	               -->
                </div>
            </div>
        </section>
        <div class="news-d-btntop title move animated-slow">
        <a href="javascript:;" class="btn-top">TOP</a>
        </div>
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
    <script src="assets/js/vendor/colorbox/jquery.colorbox-min.js"></script>
    <script src="assets/js/vendor/semanticwp/jquery.semanticwp-modal.min.js"></script>
    <!--共用js-->
    <script src="assets/js/main.js"></script>
    <!--本頁js-->
     <script src="assets/js/vendor/share.js"></script>
    <script src="assets/js/news.js"></script>
    <script  type="text/javascript" >
        $('.btn-close').click(function(){
        window.history.back();
    });

</script>

 @stop

@stop


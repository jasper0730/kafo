@extends('template')

@section('bodySetting', '')

@section('content')
@section('css')
  <link rel="stylesheet" href="assets/css/service.css">
@stop
    
<body>
    <div class="wrapper page-service">
    <!--header-->
    @include($locale.'.headerbanner')
    <!--******-->
        <section class="banner service-banner">
            <h2 class="hideText disNone">Banner</h2>
            <div class="bannerIND">
                @foreach($BannerImage as $value)
                <div class="xsBGshow" data-small="{{ $value->image_mobile }}" data-large="{{ $value->image_pc }}" style="background:url('{{ $value->image_pc }}') no-repeat center center; background-size:cover">
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
            <a href="{{ ItemMaker::url("service")}}#service01" class="btn-down service"></a>
        </section>

        <section class="service-wrap hide">
            <div class="container">
                <div id="service01" class="service-type">
                    <a href="{{ ItemMaker::url("service")}}#service01"><span class="title">SERVICE NETWORK</span></a>
                    <div class="service-select rwd-local-box">
                        <span class="service-selected jq-selectBtn01"></span>
                        <ul class="jq-selectBox01">
                            @foreach($area as $key => $value)
                                @if($key == 0)
                                    <li>
                                        <a class="{{ $value->class }} pick-map" id="{{ $value->class }}" data-info="{{ $value->id }}" href="javascript:;">{{ $value->title }}</a>
                                    </li>
                                @else
                                    <li>
                                        <a class="{{ $value->class }}" id="{{ $value->class }}" data-info="{{ $value->id }}" href="javascript:;">{{ $value->title }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <hr class="hr01"></hr>
                </div>
            </div>
        </section>

        <section>
            <div class="service-map-local hide">
                <ul class="area_box">
                    @foreach($area as $key => $value)
                        @if($key == 0)
                            <li>
                                <a class="{{ $value->class }} pick-map" id="{{ $value->class }}" data-info="{{ $value->id }}" href="javascript:;">{{ $value->title }}</a></li>
                        @else
                            <li>
                                <a class="{{ $value->class }}" id="{{ $value->class }}" data-info="{{ $value->id }}" href="javascript:;">{{ $value->title }}</a></li>
                        @endif
                    @endforeach
                </ul>
               
                <h2>COUNTRIES WE COVER</h2>
                <ul class="service-map-cover">
                    <!-- 地區 -->
                    @foreach($area as $key => $value)
                        @if($key == 0)
                            <li class="{{ $value->class }} pick-map" id="{{ $value->class }}">
                                <p>{{ $value->brief }}</p>
                            </li>
                        @else
                            <li class="{{ $value->class }}" id="{{ $value->class }}">
                                <p>{{ $value->brief }}</p>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="service-map hide">
                <div class="service-map-box">
                    <span class="icon-location2 asia pick-map" id="asia"></span>
                    <span class="icon-location2 america" id="america"></span>
                    <span class="icon-location2 europe" id="europe"></span>
                    <span class="icon-location2 oceania" id="oceania"></span>
                    <span class="icon-location2 africa" id="africa"></span>
                    <span class="icon-location2 middle" id="middle"></span>
                    <img src="upload/service/service-map.jpg">
                </div>
            </div>
        </section>

        <section>
            <div class="container-map">
                <div id="service02" class="service-type">
                    <a href="javascript:;'"><span class="title">SELECT COUNTRY</span></a>
                    <div class="service-select">
                        <span class="service-selected jq-selectBtn02"></span>
                         <!-- 國家 -->
                        <ul class="jq-selectBox02">
                            
                        </ul>
                    </div>
                    <hr class="hr01"></hr>
                </div>
            </div>
        </section>
        <section class="service-map-txt">
            <div class="button-group hide">
                <div class="prev-button icon-circle-left">
                </div>
                <div class="next-button icon-circle-right">
                </div>
            </div>
            <!-- 地區項目 -->
            <div class="regular slider hide">
                
            </div>
            <div class="hr02">
                <hr></hr>
            </div>
        </section>
        <section class="service-contact hide">
            <h3>WE WELCOME YOU TO JOIN US, PLEASE CONTACT US.</h3>
            <a href="{{ ItemMaker::url('contact') }}" class="fontM hvr-rectangle-out btn-gray03">RIGHT NOW</a>
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
    <script src="assets/js/service.js"></script>
    <script src="assets/js/service/serviceClick.js"></script>
    <script src="assets/js/select.js"></script>
    @stop

@stop


@extends('template')

@section('bodySetting', '')

@section('content')
@section('css')
  
  <link rel="stylesheet" href="assets/css/support.css">

@stop
<div class="wrapper page-support">
  <!--header-->
    @include($locale.'.headerbanner')
  <!--******-->
  <section class="banner support-banner support-document-banner">
    <h2 class="hideText disNone">Banner</h2>
    <div class="bannerIND">
      @foreach($BannerImage as $row)
      <div class="xsBGshow" data-small="{{ $row->image_mobile}}" data-large="{{ $row->image_pc }}" style="background:url('{{ $row->image_pc }}') no-repeat center center; background-size:cover"><!--PC尺寸1440x490-->
        <div class="indexTit">
          <div class="inner">
            <p class="banner-txt01">{{ $support->file_inner_title }}</p>
            <p class="banner-txt02">{{ $support->file_inner_brief }}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <a href="javascript:;" class="btn-down"></a>
  </section>
  <section id="document" class="document-wrap">
    <div class="container top-bar">
      <div class="bread-crumbs">
        <a href="{{ ItemMaker::url('support') }}">技术支持</a><span></span>
        <a href="{{ ItemMaker::url('support/file') }}">档案下载</a>
      </div>
      <a href="javascript:;" class="btn-back">
        <span class="fa-stack fa-lg">
          <i class="fa fa-circle-thin fa-stack-2x" aria-hidden="true"></i>
          <i class="fa fa-angle-left fa-stack-1x" aria-hidden="true"></i>
        </span>
        回上一层
      </a>
    </div>
    <!-- 型號篩選 -->
    <div class="product-type">

      <a href="javascript:;"><span class="move title">请选择分类</span></a>
      <div class="product-select">
        <span class="product-selected jq-selectBtn"></span>
        <ul class="jq-selectBox">
          @foreach($fileCategory as $value)
            <li><a id="{{ $value->id }}" href="{{ ItemMaker::url('support/file') .'/'.$value->id}}">{{ $value->title }}</a></li>
          @endforeach
        </ul>
      </div>

      <hr class="hr01"></hr>
    </div>
    <!-- 表格 -->
    <div class="document-download">
      <table>
        <thead>
          <tr>
            <th>标题</th>
            <th>下载</th>
          </tr>
        </thead>
        <tbody>
          @if(Session()->has('Member'))
            @foreach($file as $row)
              <tr>
                <td>{{ $row->title }}</td>
                <td><a target="_blank" href="{{ $row->link }}" class="icon-download" download></a></td>
              </tr>
            @endforeach
          @else
            @foreach($file as $row)
              @if($row->download_directory)
                <tr>
                  <td>{{ $row->title }}</td>
                  <td><a target="_blank" href="{{ $row->link }}" class="icon-download" download></a></td>
                </tr>
              @else
              <tr>
                <td>{{ $row->title }}</td>
                <td><a href="javascript:;" class="fontM icon-download box-btn-login" ></a></td>
              </tr>
              @endif
            @endforeach
          @endif
        </tbody>
      </table>
      <div class="table-page">
        <div class="inner">
          {!! $file->render() !!}
        </div>
      </div>
    </div>
  </section>
  
<!--footer-->
   @include($locale.'.index_footer')
  <!--*****-->
</div>
<script src="assets/js/vendor/jquery.easings.min.js"></script>
<!--光箱-->
<script src="assets/js/vendor/colorbox/jquery.colorbox-min.js"></script>
<!--滾軸-->
<script src="assets/js/vendor/semanticwp/jquery.semanticwp-modal.min.js"></script>
<script src="assets/js/vendor/scrollbar/mCustomScrollbar.concat.min.js"></script>
<!--動畫-->
<script src="assets/js/vendor/waypoints.min.js"></script>
<!--banner輪播-->
<script src="assets/js/vendor/slick/slick.min.js"></script>
<!--共用js-->
<script src="assets/js/main.js"></script>
<!--本頁js-->

<script src="assets/js/support.js"></script>

<script  type="text/javascript" >
  $('.btn-back').click(function(){
     window.history.back();
  });

  $(document).ready(function(){
    /*從網址抓現在的系列 並設定selected選項*/
    var str = location.href

    str = str.split("/");

    var seletedTile = $('#'+str.pop()).html()
    console.log(seletedTile)
    $('.product-selected').text(seletedTile)
  });

  $('.box-btn-login').on( 'click' , function(){
    $.swpmodal({
      type: 'ajax',
      url:　$('base').attr('href')+'/member/download/login',
      afterLoading: function (data) {
        $.getScript( "assets/js/login.js" )
          .done(function( script, textStatus ) {
          })
        .fail(function( jqxhr, settings, exception ) {
          $( "div.log" ).text( "Triggered ajaxError handler." );
        });
      }
    });

  });

</script>
      @stop
 
@stop

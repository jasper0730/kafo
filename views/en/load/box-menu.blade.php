<div class="BOX allMenu">
  <div class="BOX_inner boxMenu">
    <a class="boxmenu_close swpmodal-close" href="javascript:void(0)">
      <span></span>
      <span></span>
    </a>
    <div class="wrapper box-menu">
      <a class="menu-logo" href="{{ ItemMaker::url('/') }}" style="position: relative; background:none;">
        KAFO
        <img src="../../assets/img/logo.svg" alt="" style="position: absolute; left:0; top:0; width:170px;">
      </a>
      <div class="all-menu delay-20s animated-slow">
        <span class="topLine"></span>
        <ul>
          @foreach($Banner as $row)
            @if($row->type == 10)
             <li><a class="privacy" href="javscript:;">{{ $row->title }}</a></li>
            @else
             <li><a href="{{ ItemMaker::url($row->link) }}">{{ $row->title }}</a></li>
            @endif
          @endforeach
         
        </ul>
        <span class="bottomLine"></span>
      </div>
      <div class="menu-language">
        <ul>
          <li class="menu-chose"><a href="{{ url('/en') }}">ENGLISH</a></li>
          <li><a href="{{ url('/tw') }}">繁中</a></li>
          <li><a href="{{ url('/cn') }}">简体</a></li>
        </ul>
      </div>
      <div class="menu-community">
        <ul class="community">
          @foreach($link_items as $value)
            <li><a href="{{ $value['link'] }}" target="_blank"><img src="{{ $value['image_big'] }}"></a></li>
          @endforeach
        </ul>
      </div>
      <small>&copy KAO FONG MACHINERY CO., LTD ALL RIGHTS RESERVED.. <a href="http://www.wddgroup.com" target="_blank" title="威德網頁設計">DESIGNED BY WDD</a></small>
    </div>
  </div>
</div>
<script>
  var winH = $(window).height();
  var base = $("base").attr("href");
  $('.privacy').on('click', function(){
    $.swpmodal({
      type: 'ajax',
      url: base + '/privacy',
      closeOnEsc: false,
      closeOnOverlayClick: false,
      afterLoadingOnShow: function() {
        $('.swpmodal-container_i2.custom').css({
          'vertical-align':'middle',
          'height':winH
        });
        $('.swpmodal-overlay').css({
        'background-color': 'rgb(255, 255, 255)',
        'opacity': '1'
        });
      }
    });
  });
</script>
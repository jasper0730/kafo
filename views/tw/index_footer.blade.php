<footer class="home-footer">
    <div class="footer-main">
      <div class="bg-footer"></div>
      <div class="title"><a href="javascript:;" class="btn-top">TOP</a></div>
      <ul class="community">
        @foreach($link_items as $value)
          <li><a href="{{ $value['link'] }}" target="_blank"><img src="{{ $value['image_big'] }}"></a></li>
        @endforeach
       {{--  <li class="icon-y"><a href="javascript:;"></a></li> --}}
        
      </ul>
      <ul class="footer-menu">
        @foreach($footerMenu as $row)
          @if($row->type == 10)
           <li><a class="privacy" href="javscript:;">{{ $row->title }}</a></li>
          @else
           <li><a href="{{ ItemMaker::url($row->link) }}">{{ $row->title }}</a></li>
          @endif
        @endforeach
      </ul>
      <small>&copy KAO FONG MACHINERY CO., LTD ALL RIGHTS RESERVED.. <a href="http://www.wddgroup.com" target="_blank" title="威德網頁設計">DESIGNED BY WDD</a></small>
    </div>
  </footer>
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
        // $('.swpmodal-overlay').css({
        // 'background-color': 'rgb(255, 255, 255)',
        // 'opacity': '1'
        // });
      }
    });
  });
</script>
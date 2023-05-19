<header>
    <a href="{{ ItemMaker::url('/') }}">
      <h1 class="hideText logo">KAFO</h1>
    </a>
     <div class="top-right">
      <!--語系-->
      <div class="lan">
        <span>語系</span>
        <ul class="lan-select">
          <li class="menu-chose"><a href="{{ url('/en') }}">ENGLISH</a></li>
          <li><a href="{{ url('/tw') }}">繁中</a></li>
          <li><a href="{{ url('/cn') }}">简体</a></li>
        </ul>
      </div>
      <!--搜尋-->
      <div class="search">
        <input type="submit" class="btn-search" value>
        <input type="search" placeholder="輸入產品搜尋" class="search-input" value="">
      </div>
    </div>
    <ul class="top-menu">
      @foreach($headMenu as $row)
      <li><a href="{{ ItemMaker::url($row->link) }}">{{ $row->title }}</a></li>
      @endforeach
      <li>
        <!--漢堡選單區塊-->
        <a href="javascript:;" class="hamburg">
          <span></span>
          <span></span>
          <span></span>
        </a>
      </li>
    </ul>
</header>
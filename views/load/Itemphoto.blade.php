<div class="BOX">
  <div class="BOX_inner boxSpecification">
    <a class="BOX_close swpmodal-close" href="javascript:void(0)">X</a>
    <div class="wrapper box-specification">
      <div class="box-specification-banner">

        @foreach($ItemPhoto as $row)
          <div class="box-slick-img">
            <img src="{{ $row->image }}">
          </div>
        @endforeach
      </div>
      <div class="box-inner">
        <h2>{{ $ProductItem->title }}</h2>
        @if($ProductItem->is_win)
        <div class="box-img-prize"><img src="{{ $ProductItem->icon }}"></div>
        @else
        @endif
      </div>
    </div>
  </div>
</div>

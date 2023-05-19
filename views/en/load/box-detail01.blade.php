<div class="BOX">
  <div class="BOX_inner boxTechnology">
    <a class="BOX_close swpmodal-close" href="javascript:void(0)">X</a>
    <div class="wrapper box-product-d">

      <div class="box-img-banner">
        <div class="box-slick-img">
          <!-- 400x364px -->
          <img src="{{ $data['image_small'] }}">
        </div>
      </div>

      <div class="box-inner">
        <h2>{{ $data['title'] }}</h2>
        <p>
            {!! $data['brief'] !!}
        </p>
        {!! $data['summary'] !!}
      </div>
    </div>
  </div>
</div>

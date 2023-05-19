@if(isset($list_set['title'])&&count($list_set['subcate'])>0)
  {{-- <!-- 分類名稱   --> --}}
  <h2 class='class-name'>{{ $list_set['title'] }}</h2>
  <p class='dep'>選擇型號前往下載</p>
  {{-- <!-- 子分類 --> --}}
  <div class="form-box">
      @foreach ($list_set['subcate'] as $value)
        <div class="item">
          <a href="{{ ItemMaker::url('support/manual/'.$value['url_name']) }}">{{ $value['title'] }}</a>
        </div>
      @endforeach
  </div>
@endif
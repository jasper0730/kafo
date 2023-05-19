{{--網頁標題--}}
@if( $seo['web_title'] )
  @section('title',$seo['web_title'])
@else
  @section('title',$globalSeo['web_title'])
@endif

{{-- Meta關鍵字 --}}
@if( $seo['meta_keyword'] )
    @section('keywords',$ProjectName.', '.$seo['meta_keyword'])
@else
    @section('keywords',$ProjectName.', '.$globalSeo['meta_keyword'])
@endif
{{-- Meta描述 --}}
@if( $seo['meta_description'] )
    @section('description',$ProjectName.', '.$seo['meta_description'])
@else
    @section('description',$ProjectName.', '.$globalSeo['meta_description'])
@endif

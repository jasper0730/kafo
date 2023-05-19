{{-- google analytics --}}
@section('google_analytics')

    @if( $seo['ga_code'] )
        <?php $ga_code = $seo['ga_code'] ?>
    @else
        <?php $ga_code = $globalSeo['ga_code'] ?>
    @endif

    @if( $ga_code )
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', '{{ $ga_code }}', 'auto');
      ga('send', 'pageview');
    </script>
    @endif

@stop


{{--Google Tag Manager--}}
@section('google_gmt')

    @if( $seo['gtm_code'] )
        <?php $gtm_code = $seo['gtm_code'] ?>
    @else
        <?php $gtm_code = $globalSeo['gtm_code'] ?>
    @endif


    @if( $gtm_code )
    <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-NVP6BP"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer',{{ $gtm_code }});</script>
    @endif

@stop

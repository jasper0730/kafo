@extends('template')

@include($locale.'.include.metaSetting.webMeta')

@include($locale.'.include.metaSetting.ga_gtm')


@section('bodySetting', '')

@section('content')
<div class="wrapperINV">
    @include($locale.'.include.header_footer.header')
    <div class="bannerINV">
        <div class="xsBGshow" data-small="upload/financialBg-s.jpg" data-large="upload/financialBg.jpg" style="background:url('upload/financialBg.jpg') no-repeat center center; background-size:cover"><!--PC圖尺寸1440x530--><!--手機尺寸 640x400-->
            <article class="bannerTit-INV">
                <div class="inner">
                    <h2>Financial Service</h2>
                    <p>you can view current and historical financial reports, shareholders' information and other important information.</p>
                </div>
            </article>
        </div>
    </div>

</div>

@include($locale.'.investor.include.middlemenu')

<div class="middleMenu-Fin">
    <ul>
        <li><a href="{{ItemMaker::url('Investor/financial#middlemenu')}}">財務報告</a></li>
        <li><a href="{{ItemMaker::url('Investor/turnover#middlemenu')}}">每月營業額</a></li>
    </ul>
</div>

<section class="advan01 financial">
    <div class="container">
        <div class="tit  wp01">
            <h3>財務報告</h3>
            <hr>        
            <small>歡迎進入慧智基因投資人服務平台，我們講在此傳遞公司營運和財務等
相關資訊，若您有任何問題，歡迎與我們連繫，謝謝。</small>  
        </div>
        <table class="tableRWD tb_style1">
            <thead>
                <tr>
                    <th class="deeBlueTit">年份</th>
                    <th>第一季</th>
                    <th>第二季</th>
                    <th>第三季</th>
                    <th>第四季</th>
                    <th>年報</th>
                </tr>
            </thead>
            <tbody>
            @foreach($Financials as $row)
                <tr>
                    <td data-title="年份">{{$row['year']}}</td>
                    @if(!empty($row['season1']))
                    <td data-title="第一季"><a href="{{$row['season1']}}" class="loadFile"></a></i></a></td>
                    @else
                    <td data-title="第一季"><i class="icon-fin finN"></i></td>
                    @endif
                    @if(!empty($row['season2']))
                    <td data-title="第二季"><a href="{{$row['season2']}}" class="loadFile"></a></i></a></td>
                    @else
                    <td data-title="第二季"><i class="icon-fin finN"></i></td>
                    @endif
                    @if(!empty($row['season3']))
                    <td data-title="第三季"><a href="{{$row['season3']}}" class="loadFile"></a></i></a></td>
                    @else
                    <td data-title="第三季"><i class="icon-fin finN"></i></td>
                    @endif
                    @if(!empty($row['season4']))
                    <td data-title="第四季"><a href="{{$row['season4']}}" class="loadFile"></a></i></a></td>
                    @else
                    <td data-title="第四季"><i class="icon-fin finN"></i></td>
                    @endif
                    @if(!empty($row['annual']))
                    <td data-title="年報"><a href="{{$row['annual']}}" class="loadFile"></a></i></a></td>
                    @else
                    <td data-title="年報"><i class="icon-fin finN"></i></td>
                    @endif
                </tr> 
            @endforeach                                                                                            
            </tbody>
        </table>
    </div>
</section>

@include($locale.'.investor.include.deteItem')

@include($locale.'.include.header_footer.footerAbout')
@include($locale.'.include.header_footer.rainbowLine')
@include($locale.'.include.header_footer.footer')
@include($locale.'.include.header_footer.pcMenu')
@include($locale.'.include.header_footer.phoneMenu')

{{--非共用js區塊--}}
@section('script')

@stop

@stop



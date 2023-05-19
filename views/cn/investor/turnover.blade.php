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


<section class="advan01 financial01">
    <div class="container">
        <div class="tit  wp01">
            <h3>每月營業額</h3>
            <hr>        
            <small>歡迎進入慧智基因投資人服務平台，我們講在此傳遞公司營運和財務等
相關資訊，若您有任何問題，歡迎與我們連繫，謝謝。</small>  
        </div>
        <div class="yearSelectBtn">
            <ul class="yearSelect">
               @foreach($year as $row)
                    <li data-year= {{$row['year']}}><a href="javascript:;">{{$row['year']}}</a></li>
                @endforeach
            </ul>
            <div class="yearSelect_ar">
                <a href="javascript:;" class="yearSelect_arL"></a>
                <a href="javascript:;" class="yearSelect_arR"></a>
            </div>
        </div>
        <table class="tableRWD tb_style1">
            <thead>
                <tr>
                    <th class="deeBlueTit" width="25%">月份</th>
                    <th width="25%"><span>{{$twyear-1}}年度合併營收金額</span><small class="unit">( 單位：新台幣仟元 )</small></th>
                    <th width="25%"><span>{{$twyear}}年度合併營收金額</span><small class="unit">( 單位：新台幣仟元 )</small></th>
                    <th width="25%"><span>合併營收 - 年度增( 減 )比率</span></th>
                </tr>
            </thead>
            <tbody>
            @foreach($data as $row)
                <tr>
                    <td data-title="月份">{{$row['month']}}</td>
                    <td data-title="104年度合併營收金額">{{$row['amount1']}}</td>
                    <td data-title="104年度合併營收金額">{{$row['amount2']}}</td>
                    <td data-title="合併營收 - 年度增( 減 )比率">{{$row['ratio']}}</td>
                </tr>
            @endforeach                                                                                               
                <tr class="grandTotal">
                    <td data-title="本月累計">年累計</td>
                    <td data-title="104年度合併營收金額">{{$Totalamount}}</td>
                    <td data-title="104年度合併營收金額">{{$Totalamount2}}</td>
                    <td data-title="合併營收 - 年度增( 減 )比率">{{$Totalratio}}</td>
                </tr>                                                                                            
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
<script type="text/javascript" src="assets/js/admin/investor/investorTurnover.js"></script>
@stop

@stop

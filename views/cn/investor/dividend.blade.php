@extends('template')

@include($locale.'.include.metaSetting.webMeta')

@include($locale.'.include.metaSetting.ga_gtm')


@section('bodySetting', '')

@section('content')

<div class="wrapperINV">
@include($locale.'.include.header_footer.header')
    <div class="bannerINV">
        <div class="xsBGshow" data-small="upload/meetingBg-s.jpg" data-large="upload/meetingBg.jpg" style="background:url('upload/meetingBg.jpg') no-repeat center center; background-size:cover"><!--PC圖尺寸1440x530--><!--手機尺寸 640x400-->
            <article class="bannerTit-INV">
                <div class="inner">
                    <h2>Investor Service</h2>
                    <p>you can view current and historical financial reports, shareholders' information and other important information.</p>
                </div>
            </article>
        </div>
    </div>

</div>

@include($locale.'.investor.include.middlemenu')

<div class="middleMenu-Fin">
    <ul>
        <li><a href="{{ItemMaker::url('Investor/meeting#middlemenu')}}">股東會</a></li>
        <li><a href="{{ItemMaker::url('Investor/dividend#middlemenu')}}">股利分派</a></li>
        <li><a href="http://mops.twse.com.tw/mops/web/index" target="_blank">股價資訊</a></li>
    </ul>
</div>

<section class="advan01 financial">
    <div class="container">
        <div class="tit wp01">
            <h3>股利分派</h3>
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
        <table class="tableRWD tb_style1 tb_style3">
            <thead>
                <tr>
                    <th class="deeBlueTit">
                        <span>年度</span>
                    </th>
                    <th>
                        <span>股東會日期</span>
                    </th>
                    <th>
                        <span>普通股每股股利股票</span>
                        <span>股利</span><small class="unit">( 新台幣 )</small>
                    </th>
                    <th>
                        <span>普通股每股股利現金</span>
                        <span>股利</span><small class="unit">( 新台幣 )</small>
                    </th>
                    <th><span>除權息交易日</span></th>
                    <th><span>基準日</span></th>
                    <th><span>發放日</span></th>
                </tr>
            </thead>
            <tbody id="dividendtable">
                @foreach($dividends as $row)
                <tr id="dividendtable" data-total = {{$Totaldividends}} data-year = {{$row['year']}} data-id = {{$row['id']}}>
                    <td data-title="年度">{{$row['year']}}</td>
                    <td data-title="股東會日期">{{$row['shareholder']}}</td>
                    <td data-title="普通股每股股利股票">{{$row['stock']}}</td>
                    <td data-title="普通股每股股利現金">{{$row['cash']}}</td>
                    <td data-title="除權息交易日">{{$row['dr']}}</td>
                    <td data-title="基準日">{{$row['reference']}}</td>
                    <td data-title="發放日">{{$row['payment']}}</td>
                </tr> 
                @endforeach                                               
            </tbody>
        </table>
    </div> 
    <a href="javascript:;" id="moreDividend">Load More</a>
</section>


@include($locale.'.investor.include.deteItem')




@include($locale.'.include.header_footer.footerAbout')
@include($locale.'.include.header_footer.rainbowLine')
@include($locale.'.include.header_footer.footer')
@include($locale.'.include.header_footer.pcMenu')
@include($locale.'.include.header_footer.phoneMenu')

{{--非共用js區塊--}}
@section('script')

<script type="text/javascript" src="assets/js/admin/investor/investorDividend.js"></script>

@stop

@stop

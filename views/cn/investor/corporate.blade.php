@extends('template')

@include($locale.'.include.metaSetting.webMeta')

@include($locale.'.include.metaSetting.ga_gtm')


@section('bodySetting', '')

@section('content')

<div class="wrapperINV">
    @include($locale.'.include.header_footer.header')


    <div class="bannerINV">
        <div class="xsBGshow" data-small="upload/corporateBg-s.jpg" data-large="upload/corporateBg.jpg" style="background:url('upload/corporateBg.jpg') no-repeat center center; background-size:cover"><!--PC圖尺寸1440x530--><!--手機尺寸 640x400-->
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
        <li><a href="{{ItemMaker::url('Investor/directors#middlemenu')}}">董事會</a></li>
        <li><a href="{{ItemMaker::url('Investor/rules#middlemenu')}}">公司辦法規章</a></li>
        <li><a href="{{ItemMaker::url('Investor/corporate#middlemenu')}}">組織運作</a></li>
    </ul>
</div>


<section class="advan01 financial">
    <div class="container">
        <div class="tit  wp01">
            <h3>{{$typeId}}</h3>
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
                    <th width="20%" class="deeBlueTit">編號</th>
                    <th width="60%" class="txtAligt-L">標題名稱</th>
                    <th width="20%">詳細資料</th>
                </tr>
            </thead>
            <tbody id="table">
            @foreach($data as $row)
                <tr data-title="編號" data-id={{$row['id']}} data-total={{$Totaldata}} data-year={{$row['year']}} id="table" data-type={{$typeId}}>
                    <td>{{$row['No']}}</td>
                    <td data-title="標題名稱" class="txtAligt-L">{{$row['title']}}</td>
                    @if(!(empty($row['file'])))
                    <td data-title="詳細資料"><a href="{{$row['file']}}" class="loadFile"></a></td>
                    @else
                    <td data-title="詳細資料"><i class="icon-fin finN"></i></td>
                    @endif
                </tr>
            @endforeach                                                                                                                                       
            </tbody>
        </table>
    </div>
    <a href="javascript:;" id="moreBtn">Load More</a>
</section>

@include($locale.'.investor.include.deteItem')


@include($locale.'.include.header_footer.footerAbout')
@include($locale.'.include.header_footer.rainbowLine')
@include($locale.'.include.header_footer.footer')
@include($locale.'.include.header_footer.pcMenu')
@include($locale.'.include.header_footer.phoneMenu')

{{--非共用js區塊--}}
@section('script')
<script type="text/javascript" src="assets/js/admin/investor/investorMeeting.js"></script>
@stop

@stop

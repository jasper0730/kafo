@extends('template')

@include($locale.'.include.metaSetting.webMeta')

@include($locale.'.include.metaSetting.ga_gtm')


@section('bodySetting', '')

@section('content')
<div class="wrapperINV">
        @include($locale.'.include.header_footer.header')
    <div class="bannerINV">
        <div class="xsBGshow" data-small="upload/contactBg-s.jpg" data-large="upload/contactBg.jpg" style="background:url('upload/contactBg.jpg') no-repeat center center; background-size:cover"><!--PC圖尺寸1440x530--><!--手機尺寸 640x400-->
            <article class="bannerTit-INV">
                <div class="inner">
                    <h2>Investor Contacts</h2>
                    <p>you can view current and historical financial reports, shareholders' information and other important information.</p>
                </div>
            </article>
        </div>
    </div>

</div>

@include($locale.'.investor.include.middlemenu')

<div class="middleMenu-Fin">
    <ul>
        <li><a href="{{ItemMaker::url('Investor/contact#middlemenu')}}">聯絡諮詢</a></li>
        <li><a href="{{ItemMaker::url('Investor/faq#middlemenu')}}">問與答</a></li>
    </ul>
</div>
<section class="advan01 financial">
    <div class="container">
        <div class="tit wp01">
            <h3>聯絡諮詢</h3>
            <hr>
            <small>歡迎進入慧智基因投資人服務平台，我們講在此傳遞公司營運和財務等
相關資訊，若您有任何問題，歡迎與我們連繫，謝謝。</small>  
        </div>

        <table class="tableRWD tb_style1">
            <thead>
                <tr>
                    <th width="20%" class="deeBlueTit">編號</th>
                    <th width="60%" class="txtAligt-L">標題名稱</th>
                    <th width="20%">詳細資料</th>
                </tr>
            </thead>
            <tbody id="contacttable">   
                @foreach($data as $row)
                <tr data-title="編號" data-id={{$row['id']}} data-total={{$Totaldata}} id="table" data-type={{$typeId}}>
                    <td>{{$row['No']}}</td>
                    <td data-title="標題名稱" class="txtAligt-L">{{$row['title']}}</td>
                    @if(empty($row['file']) AND empty($row['link']))
                    <td data-title="詳細資料"><i class="icon-fin finN"></i></td>
                    @elseif($row['fileorlink'] == '1')
                    <td data-title="詳細資料"><a href="{{$row['file']}}" class="loadFile"></a></td>
                    @elseif($row['fileorlink'] == '2')
                    <td data-title="詳細資料"><a target="_blank" href="{{$row['link']}}" class="aalink"></a></td>
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
<script type="text/javascript" src="assets/js/admin/investor/investorContactCsr.js"></script>
@stop

@stop
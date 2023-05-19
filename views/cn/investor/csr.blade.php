@extends('template')

@include($locale.'.include.metaSetting.webMeta')

@include($locale.'.include.metaSetting.ga_gtm')


@section('bodySetting', '')

@section('content')
<div class="wrapperINV">
   @include($locale.'.include.header_footer.header')
    <div class="bannerINV">
        <div class="xsBGshow" data-small="upload/csrBg-s.jpg" data-large="upload/csrBg.jpg" style="background:url('upload/csrBg.jpg') no-repeat center center; background-size:cover"><!--PC圖尺寸1440x530--><!--手機尺寸 640x400-->
            <article class="bannerTit-INV">
                <div class="inner">
                    <h2>Investor CSR</h2>
                    <p>you can view current and historical financial reports, shareholders' information and other important information.</p>
                </div>
            </article>
        </div>
    </div>

</div>
@include($locale.'.investor.include.middlemenu')

<div class="middleMenu-Fin">
    <ul>
        <li><a href="{{ItemMaker::url('Investor/shareholder#middlemenu')}}">股東專區</a></li>
        <li><a href="{{ItemMaker::url('Investor/customers#middlemenu')}}">客戶專區</a></li>
        <li><a href="{{ItemMaker::url('Investor/employee#middlemenu')}}">員工專區</a></li>
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

        <table class="tableRWD tb_style1">
            <thead>
                <tr>
                    <th width="20%" class="deeBlueTit">編號</th>
                    <th width="60%" class="txtAligt-L">標題名稱</th>
                    <th width="20%">詳細資料</th>
                </tr>
            </thead>
            <tbody id="csrtable">
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
    <a href="javascript:;" id="morecsrBtn">Load More</a>
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
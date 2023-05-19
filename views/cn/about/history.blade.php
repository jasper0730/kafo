@extends('template')



@include($locale.'.include.metaSetting.webMeta')

@include($locale.'.include.metaSetting.ga_gtm')

@section('css')
    <!--timeLine-->
    <link rel="stylesheet" type="text/css" href="assets/js/vendor/timeLine/style.css">
@stop

@section('bodySetting', '')

@section('content')




<div class="wrapperH100">
    @include($locale.'.include.header_footer.header')

    @include($locale.'.about.include.banner')
    <a href="javascript:;" class="aascroll anchorBtn" data-anchor="middleMenu"><i></i></a>
    <a href="javascript:;" class="aascroll-s anchorBtn" data-anchor="advan01"><i></i></a>
    </div> 
    @include($locale.'.about.include.middlemenu')

<section class="founder">
    <div class="pos01" id="founder"></div>
    <div class="container">
        
        <div class="TXT">
            <h3>創辦人的話</h3>
            <span>「慧智」來自基因科學的生命之樹，為繁衍健康的下一代努力不懈</span>
            <p>十多年前，蘇怡寧醫生曾遇到一名曾產下裘馨氏肌肉萎縮症寶寶的媽媽多次求診，由於這是一種性聯遺傳隱性疾病，讓她不斷被夫家指責，感到無助又痛苦。</p>
            <p>因此，當她再婚步入新家庭，面對生小孩時，心中只有深深的悲傷與恐懼，加上當時基因醫學技術還未臻成熟，蘇醫師也只能陪著這位媽媽焦慮。幸好上天眷顧，懷胎女嬰並沒有遺傳到疾病。緣此蘇醫師決心鑽研基因診斷領域，讓台灣的基因醫學技術與全球同步。</p>
            <p>先在台大醫院成立分子遺傳實驗室，憑著滿腔熱誠與使命，研發技術、發表臨床報告，經過十年的努力才慢慢發展茁壯。但仍受限於國內醫療環境，許多理想窒礙難行。於是，集結號召台灣母胎兒醫學領域、基因遺傳醫學領域與臨床醫學領域之權威醫師與專家顧問，成立慧智基因股份有限公司，建立新世代基因診斷營運平台，以專業和熱忱提供全方位服務，對遺傳疾病病患、家屬提供更多的幫助與照護，讓所有爸媽安心地迎接新生命。</p>
        </div>
        <div class="IMG"><img src="assets/img/docter.jpg"></div>
    </div>
</section>

<section class="pieSide">
    <div class="container">
        <div class="Tit">
            <h3>核心緣由</h3>
            <small>PROUCTS SERVICE</small>
            <hr>
            <p><strong>「慧」</strong>，是我們誠摯的心；<strong>「智」</strong>，是我們智慧的力量，取名<strong>「慧智」</strong>是知識技術、道德上的卓越，代表我們對生命生生不息、美好發展的追求</p>
        </div>
        <div class="pieChart">
            <svg  class="pieSvg" width="100%" height="600" viewbox="0,0,300,300" preserveAspectRatio="xMidYMin"> 
                <path id="chart1" d="M 150,150 L 250,150 A 100,100 0 0,0 180.90169943749476,54.89434837048465 Z"   />
                <path id="chart2" d="M 150,150 L 180.90169943749476,54.89434837048465 A 100,100 0 0,0 69.09830056250527,91.22147477075268 Z"   />
                <path id="chart3" d="M 150,150 L 69.09830056250527,91.22147477075268 A 100,100 0 0,0 69.09830056250526,208.7785252292473 Z"   /> 
                <path id="chart4" d="M 150,150 L 69.09830056250526,208.7785252292473 A 100,100 0 0,0 180.90169943749473,245.10565162951536 Z"   /> 
                <path id="chart5" d="M 150,150 L 180.90169943749473,245.10565162951536 A 100,100 0 0,0 250,150.00000000000003 Z"   /> 
                <circle class="pathCircle" cx="150" cy="150" r="50" fill="#fff"/>
            </svg> 
            <div class="peiCenter">
                <span>SOFIVA</span>
                <hr>
                <span>核心價值</span>
            </div>
            <i class="pieIcon01"></i><!--圓餅圖ICON-->
            <i class="pieIcon02"></i>
            <i class="pieIcon03"></i>
            <i class="pieIcon04"></i>
            <i class="pieIcon05"></i>

            <div class="pieTxt01 pieTxt"><!--圓餅圖外圍文字-->
               <h3>品質力</h3>
               <p>一直以來具有基因醫學發展的領導地位，擁有最新儀器與技術</p>
            </div>
            <div class="pieTxt02 pieTxt">
               <h3>專業度</h3>
               <p>一直以來具有基因醫學發展的領導地位，擁有最新儀器與技術</p>
            </div>
            <div class="pieTxt03 pieTxt">
               <h3>創新性</h3>
               <p>一直以來具有基因醫學發展的領導地位，擁有最新儀器與技術</p>
            </div>
            <div class="pieTxt04 pieTxt">
               <h3>服務心</h3>
               <p>一直以來具有基因醫學發展的領導地位，擁有最新儀器與技術</p>
            </div>
            <div class="pieTxt05 pieTxt">
               <h3>國際觀</h3>
               <p>一直以來具有基因醫學發展的領導地位，擁有最新儀器與技術</p>
            </div>                                               
        </div>

        <div class="piePhone"><!--手機版輪播-->
            <ul class="pie-s">
                <li>
                    <div class="icon"></div>
                    <div class="txt">
                        <h3>品質力</h3>
                        <p>一直以來具有基因醫學發展的領導地位，擁有最新儀器與技術</p>
                    </div>
                </li>
                <li>
                    <div class="icon"></div>
                    <div class="txt">
                        <h3>專業度</h3>
                        <p>一直以來具有基因醫學發展的領導地位，擁有最新儀器與技術</p>
                    </div>
                </li>   
                <li>
                    <div class="icon"></div>
                    <div class="txt">
                        <h3>創新性</h3>
                        <p>一直以來具有基因醫學發展的領導地位，擁有最新儀器與技術</p>
                    </div>
                </li> 
                <li>
                    <div class="icon"></div>
                    <div class="txt">
                        <h3>服務心</h3>
                        <p>一直以來具有基因醫學發展的領導地位，擁有最新儀器與技術</p>
                    </div>
                </li> 
                <li>
                    <div class="icon"></div>
                    <div class="txt">
                        <h3>國際觀</h3>
                        <p>一直以來具有基因醫學發展的領導地位，擁有最新儀器與技術</p>
                    </div>
                </li>                                                           
            </ul>
        </div>
    </div>
</section>

<section class="historySide wp01">
    <div class="history">
        <div class="txt">
            <h3>Company History</h3>
            <p>Sofiva Genomics  Examination was established in Taiwan , Sofiva Genomics certificate of</p>
            <span class="historyBtn upBtn">Read More<i>+</i></span>
        </div>
    </div>
    <div class="timeline">
      <ul>
      @foreach($histories as $row)
        <li>
          <div>
            <time>

                <small>{{$row['date'][0]}}{{$row['date'][1]}}{{$row['date'][2]}}{{$row['date'][3]}}</small>
                <span>{{$row['date'][5]}}{{$row['date'][6]}}</span>
            </time> 
            <div class="timeBox">
                <div class="tit">{{$row['title']}}</div>
                <p>{{$row['summary']}}</p>
            </div>
          </div>
        </li>
        @endforeach
      </ul> 
      <a href="javascript:;" class="goTop" id = "historytop"><i></i><span>Top</span></a>
    </div>
</section>

<section class="advanFoo">
    @include($locale.'.about.include.intro')
</section>





@include($locale.'.include.header_footer.footerAbout')
@include($locale.'.include.header_footer.rainbowLine')
@include($locale.'.include.header_footer.footer')
@include($locale.'.include.header_footer.pcMenu')
@include($locale.'.include.header_footer.phoneMenu')


{{--非共用js區塊--}}
@section('script')
<!--timeLine-->
<script type="text/javascript" src="assets/js/vendor/timeLine/index.js"></script>
<script type="text/javascript" src="assets/js/admin/about/about.js"></script>
@stop



@stop
        <div class="light" id="menuLight"><!--電腦版主選單-->
            <div class="menuLight">
                <ul class="menuList">
                    <li>
                        <div class="inner">
                            <span><i><img src="assets/img/icon-menu01.png"></i><a href="{{ ItemMaker::url('About') }}">關於慧智</a></span>
                            <a href="{{ ItemMaker::url('About/advantage') }}">慧智簡介</a>
                            <a href="{{ ItemMaker::url('About/history') }}">企業沿革</a>
                            <a href="{{ ItemMaker::url('About/authenticate') }}">認證與肯定</a>
                            <a href="{{ ItemMaker::url('About/team') }}">團隊介紹</a>
                        </div>
                    </li>
                    <li>
                        <div class="inner">
                            <span><i><img src="assets/img/icon-menu02.png"></i><a href="{{ ItemMaker::url('Product') }}">檢測與服務</a></span>

                            @foreach( $Menu['productThemes'] as $theme )
                                <a href="{{ $theme->link }}">{{ $theme->title }}</a>
                            @endforeach

                        </div>
                    </li>
                    <li>
                        <div class="inner">
                            <span><i><img src="assets/img/icon-menu03.png"></i><a href="{{ ItemMaker::url('Laboratory') }}">基因 & 生化檢測</a></span>

                            @foreach( $Menu['laboratories'] as $laboratory )
                                <a href="{{ $laboratory->link }}">{{ $laboratory->title }}</a>
                            @endforeach

                        </div>
                    </li>
                    <li>
                        <div class="inner">
                            <span><i><img src="assets/img/icon-menu04.png"></i><a href="{{ ItemMaker::url('News') }}">最新訊息</a></span>

                            @foreach( $Menu['newsCategories'] as $category )
                                <a href="{{ $category->link }}">{{ $category->title }}</a>
                            @endforeach

                        </div>
                    </li>  
                    <li>
                        <div class="inner">
                            <span><i><img src="assets/img/icon-menu05.png"></i><a href="javascript:;">諮詢和據點</a></span>
                            <a href="javascript:;">問與答</a>
                            <a href="javascript:;">服務據點</a>
                        </div>
                    </li> 
                    <li>
                        <div class="inner">
                            <span><i><img src="assets/img/icon-menu06.png"></i><a href="{{ ItemMaker::url('Inquire') }}">查詢服務</a></span>
                            <a href="{{ ItemMaker::url('Inquire') }}">總覽</a>
                            <a target="_blank" href="https://report.sofivagenomics.com.tw/login/">個人線上查詢系統</a>
                            <a target="_blank" href="https://report.sofivagenomics.com.tw/login/index-medical.php">院所及醫院線上查詢</a>
                            <a href="javascript:;">醫師專區</a>
                        </div>
                    </li> 
                    <li>
                        <div class="inner">
                            <span><i><img src="assets/img/icon-menu07.png"></i><a href="{{ ItemMaker::url('Investor') }}">投資人服務</a></span>
                            <a href="{{ ItemMaker::url('Investor/financial') }}">財務資訊</a>
                            <a href="{{ ItemMaker::url('Investor/meeting') }}">股東專區</a>
                            <a href="{{ ItemMaker::url('Investor/directors') }}">公司治裡</a>
                            <a href="{{ ItemMaker::url('Investor/news') }}">投資人活動訊息</a>
                            <a href="{{ ItemMaker::url('Investor/contact') }}">投資人問答集</a>
                            <a href="{{ ItemMaker::url('Investor/shareholder') }}">利害關係人</a>
                        </div>
                    </li> 
                    <li>
                        <div class="inner">
                        <span><i><img src="assets/img/icon-menu08.png"></i><a href="javascript:;">其它</a></span>
                        <a href="javascript:;">聯絡我們</a>
                        <a href="javascript:;">會員專區</a>
                        </div>
                    </li>                                                                                
                </ul>
            </div>
        </div>


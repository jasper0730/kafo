        <div class="phone-menu"> <!--手機板主選單-->
            <ul class="phone-lang">
                <li class="on"><a href="javascript:;">繁</a></li>
                <li><a href="javascript:;">簡</a></li>
                <li><a href="javascript:;">EN</a></li>
            </ul>
            <ul class="phone-menuList">
                <li>
                    <span>關於慧智</span>
                    <ul class="phone-menuListXS">
                        <li><a href="{{ ItemMaker::url('About/advantage') }}">慧智簡介</a></li>
                        <li><a href="{{ ItemMaker::url('About/history') }}">企業簡介</a></li>
                        <li><a href="{{ ItemMaker::url('About/authenticate') }}">認證與肯定</a></li>
                        <li><a href="{{ ItemMaker::url('About/team') }}">團隊介紹</a></li>
                    </ul>
                </li>
                <li>
                    <span>檢測與服務</span>
                    <ul class="phone-menuListXS">
                        <li><a href="{{ ItemMaker::url('Product') }}">總覽</a></li>

                        @foreach( $Menu['productThemes'] as $theme )
                            <li><a href="{{ $theme->link }}">{{ $theme->title }}</a></li>
                        @endforeach

                    </ul>
                </li>
                <li>
                    <span>基因 & 生化檢測</span>
                    <ul class="phone-menuListXS">
                        <li><a href="{{ ItemMaker::url('Laboratory') }}">總覽</a></li>

                        @foreach( $Menu['laboratories'] as $laboratory )
                            <li><a href="{{ $laboratory->link }}">{{ $laboratory->title }}</a></li>
                        @endforeach

                    </ul>
                </li>
                <li>
                    <span>最新訊息</span>
                    <ul class="phone-menuListXS">
                        <li><a href="{{ ItemMaker::url('News') }}">總覽</a></li>

                        @foreach( $Menu['newsCategories'] as $category )
                            <a href="{{ $category->link }}">{{ $category->title }}</a>
                            <li><a href="{{ $category->link }}">{{ $category->title }}</a></li>
                        @endforeach

                    </ul>
                </li>
                <li>
                    <span>諮詢和據點</span>
                    <ul class="phone-menuListXS">
                        <li><a href="javascript:;">問與答</a></li>
                        <li><a href="javascript:;">服務據點</a></li>
                    </ul>
                </li> 
                <li>
                    <span>查詢服務</span>
                    <ul class="phone-menuListXS">
                        <li><a href="{{ ItemMaker::url('Inquire') }}">總覽</a></li>
                        <li><a target="_blank" href="https://report.sofivagenomics.com.tw/login/">個人線上查詢系統</a></li>
                        <li><a target="_blank" href="https://report.sofivagenomics.com.tw/login/index-medical.php">院所及醫院線上查詢</a></li>
                        <li><a href="javascript:;">醫師專區</a></li>
                    </ul>
                </li>
                <li>
                    <span>投資人服務</span>
                    <ul class="phone-menuListXS">
                        <li><a href="{{ ItemMaker::url('Investor') }}">總覽</a></li>
                        <li><a href="{{ ItemMaker::url('Investor/financial') }}">財物資訊</a></li>
                        <li><a href="{{ ItemMaker::url('Investor/meeting') }}">股東專區</a></li>
                        <li><a href="{{ ItemMaker::url('Investor/directors') }}">公司治裡</a></li>
                        <li><a href="{{ ItemMaker::url('Investor/news') }}">投資人活動訊息</a></li>
                        <li><a href="{{ ItemMaker::url('Investor/contact') }}">投資人問答集</a></li>
                        <li><a href="{{ ItemMaker::url('Investor/shareholder') }}">利害關係人</a></li>
                    </ul>
                </li> 
                <li>
                    <span>其它</span>
                    <ul class="phone-menuListXS">
                        <li><a href="javascript:;">聯絡我們</a></li>
                        <li><a href="javascript:;">會員專區</a></li>
                    </ul>
                </li>                                
            </ul>
        </div>

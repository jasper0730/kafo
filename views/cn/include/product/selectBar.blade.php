        <div class="proSelect" >
            <div class="left">
                <div class="level"><a href="{{ $theme->link }}"><i></i><span>{!! $theme->title !!}</span></a></div>
                <div class="wrapCategorySelectOptions">

                    {{-- ajax 載入選項 (product.ajax.stylesOptions) --}}

                </div>
            </div>
            <div class="right">
                <div class="selectBtn" id="colorSel">選擇<span>顏色</span></div>
                    <article class="colorSelect" id="colorSelect">
                        <h5 class="beforeColorSelectOption">請選擇您想搜尋的顏色<span>SElECT COLOR</span></h5>

                        {{-- ajax 載入選項 (product.ajax.colorsOptions) --}}


                    </article>
                {{-- <div class="selectBtn" id="sizeSel">選擇<span>尺寸</span></div>
                <article class="sizeSelect" id="sizeSelect">
                    <h5 class="beforeSizeSelectOption">請選擇您想搜尋的尺寸<span>SELECT SIZE</span></h5>

                        ajax 載入選項 (product.ajax.sizeOptions)


                </article> --}}
            </div>        
        </div>

<section class="proSideB disNon" id="proSideB_L">
    <div class="proSelectB">
        <div class="left">
            <div class="level"><a href="{{ $theme->link }}"><i></i><span>{!! $theme->title !!}</span></a></div>
            <div class="proDrop wrapCategorySelectOptions">

                {{-- ajax 載入選項 (product.ajax.categoriesOptions) --}}

            </div>
        </div>
        <div class="right">
            <div class="selectBtn" id="colorSel_B">選擇<span>顏色</span></div>
                <article class="colorSelect" id="colorSelect01">
                    <h5 class="beforeColorSelectOption">請選擇您想搜尋的顏色<span>SElECT COLOR</span></h5>

                    {{-- ajax 載入選項 (product.ajax.colorsOptions) --}}

                </article>

            {{-- <div class="selectBtn" id="sizeSel_B">選擇<span>尺寸</span></div>

            <article class="sizeSelect" id="sizeSelect01">
                <h5 class="beforeSizeSelectOption">請選擇您想搜尋的尺寸<span>SELECT SIZE</span></h5>

                ajax 載入選項 (product.ajax.sizeOptions)

            </article> --}}
        </div>
    </div>
</section>
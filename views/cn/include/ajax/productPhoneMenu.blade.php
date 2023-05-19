            {{-- 產品種類(男士 > 男鞋) --}}
            <ul data-menu="submenu-{{ $themeId+1 }}" class="menu__level">

                <li class="menu__item"><a class="menu__link" href="{{ $themeLink }}">OVERVIEW</a></li>

            <?php $i = 1; ?>
            @foreach( $categories as $category )
                <li class="menu__item"><a class="menu__link" data-submenu="submenu-{{ $themeId+1 }}-{{ $i }}" href="javascript:;">{{ $category->title }}</a></li>

                <?php $i++; ?>
            @endforeach

            </ul>

            {{-- 產品樣式(男士 > 男鞋 > 皮鞋) --}}

            <?php $k = 1; ?>
            @foreach( $categories as $category )
                <ul data-menu="submenu-{{ $themeId+1 }}-{{ $k }}" class="menu__level">


                    <li class="menu__item"><a class="menu__link" href="{{ $category->link }}">OVERVIEW</a></li>

                @if( !empty($category->style) )
                    @foreach( $category->style as $style )
                        <li class="menu__item"><a class="menu__link" href="{{ $style->link }}">{{ $style->title }}</a></li>
                    @endforeach
                @endif

                </ul>

            <?php $k++; ?>
            @endforeach
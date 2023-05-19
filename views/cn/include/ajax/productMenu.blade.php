                    <div class="nav_wrap">
                        <div class="nav_inn">
                            <div class="nav_firstBlock"><!--第一層-->
                                <span>CATEGORY</span>
                                <ul>

                                @foreach( $categories as $row )
                                    <li data-second="nav_theme{{ $themeId }}_category{{ $row->id }}"><a href="{{ $row->link }}">{{ $row['title'] }}</a></li>
                                @endforeach

                                </ul>
                            </div>

                            <div class="nav_secondBlock"><!--第二層-->
                                <span>STYLE</span>


                                @foreach( $categories as $category )

                                {{--產品樣式--}}
                                <ul class="nav_theme{{ $themeId }}_category{{ $category->id }}">

                                    @if( !empty($category->style) )
                                        @foreach( $category->style as $style )
                                            <li data-img="{{ $style->image }}"><a href="{{ $style->link }}">{{ $style->title }}</a></li>
                                        @endforeach
                                    @endif

                                </ul>
                                @endforeach

                            </div>

                            <div class="nav_thirdBlock"><!--第三層-->
                                <span>PHOTO</span>
                                <img class="nav_img" src="">
                            </div>

                        </div>
                    </div><!--nav_wrapEND-->
<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- END SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed  page-sidebar-menu-compact page-sidebar-menu-closed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="100" data-height="731">
            <?php
                $icon = ['icon-home', 'icon-settings'];
                $count = 0;
            ?>
            @foreach($SileMenu as $key=>$value)
                <?php 
                    if(preg_match("/$key/", urldecode($_SERVER['REQUEST_URI']) )){
                        //echo "path mach";
                        $onThis = 'active open';
                    }else{
                        //echo "path is not mach";
                        $onThis = '';
                    }

                    $thisIcon = ( $count  == 0  )? $icon[0] : $icon[1] ;
                ?>

                @if(is_array($SileMenu[$key]))
                    <li class="nav-item {{ $onThis }}">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="{{ $thisIcon }}"></i>
                            <span class="title">{{$key}}</span><span class="arrow "></span>
                        </a>
                        @if(count($SileMenu[$key])!=0)
                            <ul class="sub-menu">
                                @foreach($value as $key2 => $value2)
                                    <?php 
                                        if(preg_match("/$key2/", urldecode($_SERVER['REQUEST_URI']) )){
                                            //echo "path mach";
                                            $onThis = 'active open';
                                        }else{
                                            //echo "path is not mach";
                                            $onThis = '';
                                        }

                                    ?>
                                    <li class="{{$onThis}}">
                                        <a href="{{ ItemMaker::url($SileMenu[$key][$key2]) }}">{{$key2}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endif

                @if(is_string($SileMenu[$key]))
                    <li class="nav-item {{ $onThis }}">
                        <a href="{{ ItemMaker::url($SileMenu[$key])}}">
                            <i class="{{ $thisIcon }}"></i>
                            <span class="title">{{$key}}</span>
                        </a>
                    </li>
                @endif

                <?php $count++;?>
            @endforeach
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->
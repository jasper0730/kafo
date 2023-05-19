
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="{{ItemMaker::url('Fantasy')}}">
                <img src="vendor/Fantasy/assets/layouts/layout2/img/logo-default.png" alt="logo" class="logo-default" /> </a>
            <div class="menu-toggler sidebar-toggler">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN PAGE ACTIONS -->
        <!-- DOC: Remove "hide" class to enable the page header actions -->
        <div class="page-actions page-actions_us">
            <div class="btn-group ">
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown dropdown-language">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img alt="" src="vendor/Fantasy/assets/global/img/flags/tw.png">
                            <span class="langname"> TW </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu_new">
                            <li>
                                <a href="tw/Fantasy" class="tw" data-info="繁體中文">
                                    <img alt="" src="vendor/Fantasy/assets/global/img/flags/tw.png"> 繁體中文 </a>
                            </li>
                            <li>
                                <a href="en/Fantasy" class="en" data-info="English">
                                    <img alt="" src="vendor/Fantasy/assets/global/img/flags/en.png"> English </a>
                            </li>
                            <li>
                                <a href="cn/Fantasy" class="cn" data-info="简体中文">
                                    <img alt="" src="vendor/Fantasy/assets/global/img/flags/cn.png"> 简体中文 </a>
                            </li>
                            {{-- <li>
                                <a href="jp/Fantasy">
                                    <img alt="" src="vendor/Fantasy/assets/global/img/flags/jp.png"> 日本語 </a>
                            </li>
                            <li>
                                <a href="kr/Fantasy">
                                    <img alt="" src="vendor/Fantasy/assets/global/img/flags/kr.png"> 한국의 </a>
                            </li> --}}
                        </ul>
                    </li>
                </ul>
            </div>
             <div class="user_title">
           <span class="user_id"> {{ $ProjectName }}</span>   <span class="fantsy_id"> 後端管理系統 </span>
        </div>
        </div>


        <!-- END PAGE ACTIONS -->
        <!-- BEGIN PAGE TOP -->
            <div class="page-top">
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN INBOX DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img alt="" class="img-circle" src="vendor/Fantasy/assets/layouts/layout2/img/avatar3_small.jpg" />
                            <span class="username username-hide-on-mobile"> {{Auth::user()->name}} </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            {{-- <li>
                                <a href="page_user_profile_1.html">
                                    <i class="icon-user"></i> My Profile </a>
                            </li> --}}

                            <li>
                                <a href=" {{ ItemMaker::url('auth/logout') }} ">
                                    <i class="icon-key"></i> Log Out </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END QUICK SIDEBAR TOGGLER -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END PAGE TOP -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->

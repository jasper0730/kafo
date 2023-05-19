<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<!--<![endif]-->
<!-- BEGIN HEAD --><head>
    <meta charset="utf-8" lang="{{$locateLang}}" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title> {{ $ProjectName }} - 後台管理系統 </title>
    
    <!-- icon -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/img/ico/apple-touch-icon-144.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/ico/favicon.ico">
    <link rel="icon" type="image/x-icon" href="assets/img/ico/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <base href="{{ ItemMaker::url('/') }}">
    <!-- 引入共用ＣＳＳ -->
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <!--jQuery UI Draggable -->
    <link rel="stylesheet" type="text/css" href="vendor/Fantasy/plugins/smoothness/jquery-ui-1.10.4.custom.css" media="screen" />

    <!--anchorPhoto.css-->
    <link href="vendor/Fantasy/assets/global/css/anchorPhoto.css" rel="stylesheet" type="text/css" />

    <link href="vendor/Fantasy/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="vendor/Fantasy/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="vendor/Fantasy/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="vendor/Fantasy/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
    <link href="vendor/Fantasy/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="vendor/Fantasy/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="vendor/Fantasy/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="vendor/Fantasy/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="vendor/Fantasy/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="vendor/Fantasy/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="vendor/Fantasy/assets/layouts/layout2/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="vendor/Fantasy/assets/layouts/layout2/css/themes/blue.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="vendor/Fantasy/assets/layouts/layout2/css/custom.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
    <!-- select -->
    <link rel="stylesheet" type="text/css" href="vendor/Fantasy/plugins/select2/css/select2.min.css"/>
    
      <link rel="stylesheet" type="text/css" href="vendor/Fantasy/plugins/select2/css/select2-bootstrap.min.css"/>
    <!-- tags -->
    <link rel="stylesheet" type="text/css" href="vendor/Fantasy/plugins/jquery-tags-input/jquery.tagsinput.css"/>

    {{-- color pick  --}}
    
<link href="vendor/Fantasy/plugins/colorpick/evol.colorpicker.min.css" rel="stylesheet" type="text/css"/>

    {{-- toastr alert --}}
    <link href="vendor/Fantasy/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css"/>

    <!-- 新加的css -->
    <link href="vendor/Fantasy/assets/global/css/style.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="favicon.ico" />
    <!--schema css-->
    <link href="vendor/schema/css/schema.css" rel="stylesheet" type="text/css"></script>

    <!-- 非共用的Css --> 
    @yield('css')

    </head>
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-sidebar-fixed page-footer-fixed @yield('body_class')">
    <!-- BEGIN HEADER -->
    <div class="page-header navbar navbar-fixed-top">

    @include( 'Fantasy.include.header' ) 

    <!-- BEGIN HEADER & CONTENT DIVIDER -->
    <div class="clearfix"> </div>
    <!-- END HEADER & CONTENT DIVIDER -->
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- Side Menu -->
        @include( 'Fantasy.include.menu' )  

        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content @yield('otherClass')">
                <!-- BEGIN PAGE HEADER-->
                @yield('content')
            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->

    <!-- <div class="page-footer page-footer-color">
        <div class="page-footer-inner footer-color"> Designed By WDD
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div> -->

        <!-- END FOOTER -->
        <!--[if lt IE 9]>
<script src="vendor/Fantasy/assets/global/plugins/respond.min.js"></script>
<script src="vendor/Fantasy/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="vendor/Fantasy/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="vendor/Fantasy/plugins/jquery-migrate.min.js" type="text/javascript"></script>

        <script src="vendor/Fantasy/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>

        <script src="vendor/Fantasy/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="vendor/Fantasy/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="vendor/Fantasy/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="vendor/Fantasy/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="vendor/Fantasy/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="vendor/Fantasy/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="vendor/Fantasy/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="vendor/Fantasy/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="vendor/Fantasy/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <!--bootsrap內建ajax的JS 
        <script src="vendor/Fantasy/assets/pages/scripts/table-datatables-ajax.min.js" type="text/javascript"></script>-->
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="vendor/Fantasy/assets/pages/scripts/table-datatables-fixedheader.min.js" type="text/javascript"></script>
        <script src="vendor/Fantasy/assets/layouts/layout2/scripts/layout.min.js" type="text/javascript"></script>
        <script src="vendor/Fantasy/assets/layouts/layout2/scripts/demo.min.js" type="text/javascript"></script>
        <script src="vendor/Fantasy/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->

        <!-- select  
        <script src="vendor/Fantasy/plugins/select2/select2.min.js"></script>-->
        <script type="text/javascript" src="vendor/Fantasy/plugins/select2/js/select2.min.js"></script>
        
        <script type="text/javascript" src="vendor/ckeditor/ckeditor.js"></script>

        <!--input mask-->
        <script src="vendor/Fantasy/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>

        <!-- tags -->
        <script src="vendor/Fantasy/plugins/jquery-tags-input/jquery.tagsinput.min.js"></script>

        <!-- BEGIN color picker SCRIPTS -->
        <script src="vendor/Fantasy/plugins/colorpick/evol.colorpicker.min.js"></script>
        <!-- END color picker SCRIPTS -->

        <script src="vendor/Fantasy/plugins/toastr/toastr.min.js"></script>

        <!--anchorPhoto.js-->
        <script src="vendor/main/interact.min.js"></script>
        <script src="vendor/main/anchorPhoto.js"></script>

        <!-- BEGIN SPEC-->
        <script src="vendor/main/filePick.js" type="text/javascript"></script>
        <script src="vendor/main/config.js" type="text/javascript"></script>
        <script src="vendor/main/app.js" type="text/javascript"></script><!-- 套件觸發 -->
        <script src="vendor/main/spec.js" type="text/javascript"></script>
        <!-- END SPEC-->

        <!-- boris js -->
        <script src="vendor/schema/js/addField.js" type="text/javascript"></script>
        {{-- 後台圖片刪除 --}}
        <script src="vendor/deleteImg/deleteImg.js" type="text/javascript"></script>

        <!-- 非共用的 js --> 
        @yield('script')
        <script type="text/javascript">
        
            var lang = $("meta").attr("lang");
                $(".dropdown-language .dropdown-toggle img").attr("src",$("."+lang+" img").attr("src"));
                $(".dropdown-language .langname").html($("."+lang).data("info"));
        </script>
</body>

</html>

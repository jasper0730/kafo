@extends('Fantasy.template')

@section('title', "Quality修改"."-".$ProjectName)
@section('css')

    <link rel="stylesheet" href="vendor/Fantasy/global/plugins/colorbox/colorbox.css" />
    <style type="text/css">
    #showPic{ width: auto!important; max-height: 140px;  }
    </style>
@stop

@section('content')

<!--fancybox for File Manager-->
<a href="" id="toFileManager"></a>

        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title">
            Quality <small>About History Manager</small> </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="{{ ItemMaker::url('Fantasy/')}}">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="{{ ItemMaker::url('Fantasy/'.$routePreFix)}}">Quality</a> <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    Quality修改 </li>
            </ul>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->


            <div class="row">
                <div class="col-md-12">

                    <!--注意事項-->
                     <!-- <div class="note note-danger">
                     <p> 注意事項: <b>新聞內頁大圖</b>項目為非必填; 若此則新聞被選為顯示在首頁，則必須上傳<b>首頁新聞縮圖。</b></p>
                    </div> -->
                    <!--注意事項END-->


                    {!! Form::open( ["url" => ''.$actionUrl.'', 'method'=> 'POST', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'target' => '' ] ) !!}

                            <div class="portlet light portlet-fit portlet-datatable">
                                <div class="portlet-title portlet-title2">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">
                                            {{ ( !empty( $data['title'] ) )? $data['title'] : '' }} - Quality </span>
                                    </div>
                                    <div class="actions btn-set">

                                    @include('Fantasy.include.editActionBtns')

                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <div class="tabbable-line">
                                        <ul class="nav nav-tabs nav_news">
                                            <li class="active">
                                                <a href="#tab_general" data-toggle="tab"> Information </a>
                                            </li>
                                            {{-- <li>
                                                <a href="#tab_seo" data-toggle="tab"> SEO設定 </a>
                                            </li> --}}
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active form-row-seperated" id="tab_general">
                                                <div class="form-body form_news_pad">

                                                    {{ItemMaker::idInput([
                                                        'inputName' => 'Quality[id]',
                                                        'value' => ( !empty($data['id']) )? $data['id'] : ''
                                                    ])}}

                                                    {{ItemMaker::textInput([
                                                        'labelText' => '標題',
                                                        'inputName' => 'Quality[title]',
                                                        'value' => ( !empty($data['title']) )? $data['title'] : ''
                                                    ])}}

                                                    {{ItemMaker::textInput([
                                                        'labelText' => '副標題',
                                                        'inputName' => 'Quality[subtitle]',
                                                        'value' => ( !empty($data['subtitle']) )? $data['subtitle'] : ''
                                                    ])}}

                                                    {{ItemMaker::photo([
                                                        'labelText' => '大圖片',
                                                        'inputName' => 'Quality[image_big]',
                                                        'value' => ( !empty($data['image_big']) )? $data['image_big'] : ''
                                                    ])}}

                                                      {{ItemMaker::photo([
                                                        'labelText' => '小圖片',
                                                        'inputName' => 'Quality[image_small]',
                                                        'value' => ( !empty($data['image_small']) )? $data['image_small'] : ''
                                                    ])}}


                                                </div>
                                            </div>




                                          

                                        </div>
                                    </div>
                                </div>
                            </div>
                        <iframe name="hidFrame" id="hidFrame" style="display:none;"></iframe>
                    <!--</form> 
                     END FORM-->
                     {!! Form::close() !!}
                </div>
            </div>

@stop

@section("script")

<script src="vendor/Fantasy/global/plugins/colorbox/jquery.colorbox.js" type="text/javascript"></script>


<script src="vendor/main/colorpick.js" type="text/javascript"></script>
<script src="vendor/main/datatable.js" type="text/javascript" ></script>
<script src="vendor/main/rank.js" type="text/javascript" ></script>

    <script>
        $(document).ready(function() {

            FilePicke();
            Rank();
            //資料刪除
            dataDelete();

            colorPicker();

            changeStatic();

            @if($Message)
                toastrAlert('success', '{{$Message}}');
            @endif

        });

    </script>
@stop
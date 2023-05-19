@extends('Fantasy.template')

@section('title', "關於高鋒修改"."-".$ProjectName)
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
            關於高鋒 <small>About History Manager</small> </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="{{ ItemMaker::url('Fantasy/')}}">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="{{ ItemMaker::url('Fantasy/'.$routePreFix)}}">關於高鋒</a> <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    關於高鋒修改 </li>
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
                                            {{ ( !empty( $data['title'] ) )? $data['title'] : '' }} - 關於高鋒 </span>
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
                                                        'inputName' => 'Company[id]',
                                                        'value' => ( !empty($data['id']) )? $data['id'] : ''
                                                    ])}}

                                                    {{ItemMaker::textInput([
                                                        'labelText' => '標題',
                                                        'inputName' => 'Company[title]',
                                                        'value' => ( !empty($data['title']) )? $data['title'] : ''
                                                    ])}}

                                                    {{ItemMaker::textInput([
                                                        'labelText' => '副標題',
                                                        'inputName' => 'Company[subtitle]',
                                                        'value' => ( !empty($data['subtitle']) )? $data['subtitle'] : ''
                                                    ])}}

                                                    {{ItemMaker::textInput([
                                                        'labelText' => '小標題',
                                                        'inputName' => 'Company[small_title]',
                                                        'value' => ( !empty($data['small_title']) )? $data['small_title'] : ''
                                                    ])}}


                                                    {{ItemMaker::textarea([
                                                        'labelText' => '敘述',
                                                        'inputName' => 'Company[brief]',
                                                        'value' => ( !empty($data['brief']) )? $data['brief'] : ''
                                                    ])}}

                                                    {{ItemMaker::photo([
                                                        'labelText' => '圖片',
                                                        'inputName' => 'Company[image]',
                                                        'value' => ( !empty($data['image']) )? $data['image'] : ''
                                                    ])}}

                                                    {{ItemMaker::textInput([
                                                        'labelText' => '影片標題',
                                                        'inputName' => 'Company[video_title]',
                                                        'value' => ( !empty($data['video_title']) )? $data['video_title'] : ''
                                                    ])}}

                                                    {{ItemMaker::textInput([
                                                        'labelText' => '影片連結',
                                                        'inputName' => 'Company[video_link]',
                                                        'value' => ( !empty($data['video_link']) )? $data['video_link'] : ''
                                                    ])}}
                                                    <hr>

                                                    {{ItemMaker::textInput([
                                                        'labelText' => '歷史區塊標題',
                                                        'inputName' => 'Company[block_1_title]',
                                                        'value' => ( !empty($data['block_1_title']) )? $data['block_1_title'] : ''
                                                    ])}}

                                                    {{ItemMaker::textInput([
                                                        'labelText' => '歷史區塊副標題',
                                                        'inputName' => 'Company[block_1_subtitle]',
                                                        'value' => ( !empty($data['block_1_subtitle']) )? $data['block_1_subtitle'] : ''
                                                    ])}}

                                                    {{ItemMaker::textInput([
                                                        'labelText' => '歷史區塊描述',
                                                        'inputName' => 'Company[block_1_brief]',
                                                        'value' => ( !empty($data['block_1_brief']) )? $data['block_1_brief'] : ''
                                                    ])}}
                                                    {{ItemMaker::textInput([
                                                        'labelText' => '歷史隱藏小標題',
                                                        'inputName' => 'Company[block_1_small_title]',
                                                        'value' => ( !empty($data['block_1_small_title']) )? $data['block_1_small_title'] : ''
                                                    ])}}
                                                    {{ItemMaker::photo([
                                                        'labelText' => '歷史底圖(大)',
                                                        'inputName' => 'Company[block_1_big_img]',
                                                        'value' => ( !empty($data['block_1_big_img']) )? $data['block_1_big_img'] : ''
                                                    ])}}
                                                    {{ItemMaker::photo([
                                                        'labelText' => '歷史底圖(小)',
                                                        'inputName' => 'Company[block_1_small_img]',
                                                        'value' => ( !empty($data['block_1_small_img']) )? $data['block_1_small_img'] : ''
                                                    ])}}
                                                    <hr>
                                    
                                                    {{ItemMaker::textInput([
                                                        'labelText' => '品質區塊標題',
                                                        'inputName' => 'Company[block_2_title]',
                                                        'value' => ( !empty($data['block_2_title']) )? $data['block_2_title'] : ''
                                                    ])}}

                                                    {{ItemMaker::textInput([
                                                        'labelText' => '品質區塊副標題',
                                                        'inputName' => 'Company[block_2_subtitle]',
                                                        'value' => ( !empty($data['block_2_subtitle']) )? $data['block_2_subtitle'] : ''
                                                    ])}}

                                                    {{ItemMaker::textInput([
                                                        'labelText' => '品質區塊描述',
                                                        'inputName' => 'Company[block_2_brief]',
                                                        'value' => ( !empty($data['block_2_brief']) )? $data['block_2_brief'] : ''
                                                    ])}}
                                                    {{ItemMaker::textInput([
                                                        'labelText' => '品質隱藏小標題',
                                                        'inputName' => 'Company[block_2_small_title]',
                                                        'value' => ( !empty($data['block_2_small_title']) )? $data['block_2_small_title'] : ''
                                                    ])}}
                                                    {{ItemMaker::photo([
                                                        'labelText' => '品質底圖(大)',
                                                        'inputName' => 'Company[block_2_big_img]',
                                                        'value' => ( !empty($data['block_2_big_img']) )? $data['block_2_big_img'] : ''
                                                    ])}}
                                                    {{ItemMaker::photo([
                                                        'labelText' => '品質底圖(小)',
                                                        'inputName' => 'Company[block_2_small_img]',
                                                        'value' => ( !empty($data['block_2_small_img']) )? $data['block_2_small_img'] : ''
                                                    ])}}
                                                    <hr>
                                    
                                                    {{ItemMaker::textInput([
                                                        'labelText' => '程序區塊標題',
                                                        'inputName' => 'Company[block_3_title]',
                                                        'value' => ( !empty($data['block_3_title']) )? $data['block_3_title'] : ''
                                                    ])}}

                                                    {{ItemMaker::textInput([
                                                        'labelText' => '程序區塊副標題',
                                                        'inputName' => 'Company[block_3_subtitle]',
                                                        'value' => ( !empty($data['block_3_subtitle']) )? $data['block_3_subtitle'] : ''
                                                    ])}}

                                                    {{ItemMaker::textInput([
                                                        'labelText' => '程序區塊描述',
                                                        'inputName' => 'Company[block_3_brief]',
                                                        'value' => ( !empty($data['block_3_brief']) )? $data['block_3_brief'] : ''
                                                    ])}}
                                                    {{ItemMaker::textInput([
                                                        'labelText' => '程序隱藏小標題',
                                                        'inputName' => 'Company[block_3_small_title]',
                                                        'value' => ( !empty($data['block_3_small_title']) )? $data['block_3_small_title'] : ''
                                                    ])}}
                                                    {{ItemMaker::photo([
                                                        'labelText' => '程序底圖(大)',
                                                        'inputName' => 'Company[block_3_big_img]',
                                                        'value' => ( !empty($data['block_3_big_img']) )? $data['block_3_big_img'] : ''
                                                    ])}}
                                                    {{ItemMaker::photo([
                                                        'labelText' => '程序底圖(小)',
                                                        'inputName' => 'Company[block_3_small_img]',
                                                        'value' => ( !empty($data['block_3_small_img']) )? $data['block_3_small_img'] : ''
                                                    ])}}
                                                    <hr>
                                    
                                                    {{ItemMaker::textInput([
                                                        'labelText' => '政策區塊標題',
                                                        'inputName' => 'Company[block_4_title]',
                                                        'value' => ( !empty($data['block_4_title']) )? $data['block_4_title'] : ''
                                                    ])}}

                                                    {{ItemMaker::textInput([
                                                        'labelText' => '政策區塊副標題',
                                                        'inputName' => 'Company[block_4_subtitle]',
                                                        'value' => ( !empty($data['block_4_subtitle']) )? $data['block_4_subtitle'] : ''
                                                    ])}}

                                                    {{ItemMaker::textInput([
                                                        'labelText' => '政策區塊描述',
                                                        'inputName' => 'Company[block_4_brief]',
                                                        'value' => ( !empty($data['block_4_brief']) )? $data['block_4_brief'] : ''
                                                    ])}}
                                                    {{ItemMaker::textInput([
                                                        'labelText' => '政策隱藏標題',
                                                        'inputName' => 'Company[block_4_small_title]',
                                                        'value' => ( !empty($data['block_4_small_title']) )? $data['block_4_small_title'] : ''
                                                    ])}}
                                                    {{ItemMaker::photo([
                                                        'labelText' => '政策底圖(大)',
                                                        'inputName' => 'Company[block_4_big_img]',
                                                        'value' => ( !empty($data['block_4_big_img']) )? $data['block_4_big_img'] : ''
                                                    ])}}
                                                    {{ItemMaker::photo([
                                                        'labelText' => '政策底圖(小)',
                                                        'inputName' => 'Company[block_4_small_img]',
                                                        'value' => ( !empty($data['block_4_small_img']) )? $data['block_4_small_img'] : ''
                                                    ])}}
                                                    <hr>
                                    
                                                    {{ItemMaker::textInput([
                                                        'labelText' => '團隊標題',
                                                        'inputName' => 'Company[block_5_title]',
                                                        'value' => ( !empty($data['block_5_title']) )? $data['block_5_title'] : ''
                                                    ])}}

                                                    {{ItemMaker::textInput([
                                                        'labelText' => '團隊副標題',
                                                        'inputName' => 'Company[block_5_subtitle]',
                                                        'value' => ( !empty($data['block_5_subtitle']) )? $data['block_5_subtitle'] : ''
                                                    ])}}

                                                    {{ItemMaker::textInput([
                                                        'labelText' => '團隊描述',
                                                        'inputName' => 'Company[block_5_brief]',
                                                        'value' => ( !empty($data['block_5_brief']) )? $data['block_5_brief'] : ''
                                                    ])}}
                                                    {{ItemMaker::textInput([
                                                        'labelText' => '團隊隱藏標題',
                                                        'inputName' => 'Company[block_5_small_title]',
                                                        'value' => ( !empty($data['block_5_small_title']) )? $data['block_5_small_title'] : ''
                                                    ])}}
                                                    {{ItemMaker::photo([
                                                        'labelText' => '團隊底圖(大)',
                                                        'inputName' => 'Company[block_5_big_img]',
                                                        'value' => ( !empty($data['block_5_big_img']) )? $data['block_5_big_img'] : ''
                                                    ])}}
                                                    {{ItemMaker::photo([
                                                        'labelText' => '團隊底圖(小)',
                                                        'inputName' => 'Company[block_5_small_img]',
                                                        'value' => ( !empty($data['block_5_small_img']) )? $data['block_5_small_img'] : ''
                                                    ])}}
                                                    <hr>
                                    
                                                    {{ItemMaker::textInput([
                                                        'labelText' => '高鋒平面圖標題',
                                                        'inputName' => 'Company[block_6_title]',
                                                        'value' => ( !empty($data['block_6_title']) )? $data['block_6_title'] : ''
                                                    ])}}
                                                    {{ItemMaker::textInput([
                                                        'labelText' => '高鋒平面圖隱藏小標題',
                                                        'inputName' => 'Company[block_6_small_title]',
                                                        'value' => ( !empty($data['block_6_small_title']) )? $data['block_6_small_title'] : ''
                                                    ])}}
                                                    {{ItemMaker::editor([
                                                        'labelText' => '高鋒平面圖敘述',
                                                        'inputName' => 'Company[block_6_brief]',
                                                        'value' => ( !empty($data['block_6_brief']) )? $data['block_6_brief'] : ''
                                                    ])}}
                                                    {{ItemMaker::photo([
                                                        'labelText' => '高鋒平面圖底圖(大)',
                                                        'inputName' => 'Company[block_6_big_img]',
                                                        'value' => ( !empty($data['block_6_big_img']) )? $data['block_6_big_img'] : ''
                                                    ])}}
                                                    {{ItemMaker::photo([
                                                        'labelText' => '高鋒平面圖底圖(小)',
                                                        'inputName' => 'Company[block_6_small_img]',
                                                        'value' => ( !empty($data['block_6_small_img']) )? $data['block_6_small_img'] : ''
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
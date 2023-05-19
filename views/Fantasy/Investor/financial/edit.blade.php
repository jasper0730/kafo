@extends('Fantasy.template')

@section('title', "財務報告修改"."-".$ProjectName)
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
            財務報告 <small>Investor Financial Report Manager</small> </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="{{ ItemMaker::url('Fantasy/')}}">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="{{ ItemMaker::url('Fantasy/'.$routePreFix)}}">財務報告</a> <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    財務報告修改 </li>
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
                                            {{ ( !empty( $data['title'] ) )? $data['title'] : '' }} - 財務報告 </span>
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
                                                        'inputName' => 'InvestorFinancial[id]',
                                                        'value' => ( !empty($data['id']) )? $data['id'] : ''
                                                    ])}}

                                                    {{ItemMaker::radio_btn([
                                                        'labelText' => '是否顯示',
                                                        'inputName' => 'InvestorFinancial[is_visible]',
                                                        'helpText' =>'是否顯示於前台。',
                                                        'options' => $StatusOption,
                                                        'value' => ( !empty($data['is_visible']) )? $data['is_visible'] : ''
                                                    ])}}


                                                    {{ItemMaker::textInput([
                                                        'labelText' => '排序',
                                                        'inputName' => 'InvestorFinancial[rank]',
                                                        'helpText' =>'前台列表顯示之排序',
                                                        'value' => ( !empty($data['rank']) )? $data['rank'] : ''
                                                    ])}}

                                                    {{ItemMaker::textInput([
                                                        'labelText' => '年份',
                                                        'inputName' => 'InvestorFinancial[year]',
                                                        'value' => ( !empty($data['year']) )? $data['year'] : ''
                                                    ])}}

                                                    {{ItemMaker::filePicker([
                                                        'labelText' => '第一季',
                                                        'inputName' => 'InvestorFinancial[season1]',
                                                        'value' => ( !empty($data['season1']) )? $data['season1'] : ''
                                                    ])}}

                                                    {{ItemMaker::filePicker([
                                                        'labelText' => '第二季',
                                                        'inputName' => 'InvestorFinancial[season2]',
                                                        'value' => ( !empty($data['season2']) )? $data['season2'] : ''
                                                    ])}}

                                                    {{ItemMaker::filePicker([
                                                        'labelText' => '第三季',
                                                        'inputName' => 'InvestorFinancial[season3]',
                                                        'value' => ( !empty($data['season3']) )? $data['season3'] : ''
                                                    ])}}

                                                    {{ItemMaker::filePicker([
                                                        'labelText' => '第四季',
                                                        'inputName' => 'InvestorFinancial[season4]',
                                                        'value' => ( !empty($data['season4']) )? $data['season4'] : ''
                                                    ])}}

                                                    {{ItemMaker::filePicker([
                                                        'labelText' => '年報',
                                                        'inputName' => 'InvestorFinancial[annual]',
                                                        'value' => ( !empty($data['annual']) )? $data['annual'] : ''
                                                    ])}}


                                    
                                                   {{--  {{ItemMaker::textInput([
                                                        'labelText' => '認證內容',
                                                        'inputName' => 'InvestorFinancial[summary]',
                                                        'value' => ( !empty($data['summary']) )? $data['summary'] : ''
                                                    ])}} --}}

                                                  {{--   {{ItemMaker::textInput([
                                                        'labelText' => '詳細標題',
                                                        'inputName' => 'InvestorFinancial[detail_title]',
                                                        'value' => ( !empty($data['detail_title']) )? $data['detail_title'] : ''
                                                    ])}}
                                                    {{ItemMaker::textInput([
                                                        'labelText' => '詳細內容',
                                                        'inputName' => 'InvestorFinancial[detail_content]',
                                                        'value' => ( !empty($data['detail_content']) )? $data['detail_content'] : ''
                                                    ])}} --}}

                                                   {{--  {{ItemMaker::photo([
                                                        'labelText' => '認證圖片',
                                                        'inputName' => 'InvestorFinancial[image]',
                                                        'value' => ( !empty($data['image']) )? $data['image'] : ''
                                                    ])}} --}}



                                                {{--     {{ItemMaker::textInput([
                                                        'labelText' => '短述',
                                                        'inputName' => 'InvestorFinancial[summary]',
                                                        'value' => ( !empty($data['summary']) )? $data['summary'] : ''
                                                    ])}} --}}

                                                    {{--  {{ItemMaker::photo([
                                                        'labelText' => '個人照片',
                                                        'inputName' => 'InvestorFinancial[image]',
                                                        'value' => ( !empty($data['image']) )? $data['image'] : ''
                                                    ])}} --}}


                                                    {{-- {{ItemMaker::datePicker([
                                                        'labelText' => '時間',
                                                        'inputName' => 'InvestorFinancial[date]',
                                                        'value' => ( !empty($data['date']) )? $data['date'] : ''
                                                    ])}} --}}




                                                    {{-- {{ItemMaker::colorPicker([
                                                        'labelText' => '詳細標題',
                                                        'inputName' => 'InvestorFinancial[detail_title]',
                                                        'helpText' =>'顯示於首頁',
                                                        'value' => ( !empty($data['detail_title']) )? $data['detail_title'] : ''
                                                    ])}}


                                                    {{ItemMaker::colorPicker([
                                                        'labelText' => '詳細內容',
                                                        'inputName' => 'InvestorFinancial[detail_content]',
                                                        'helpText' =>'顯示於首頁',
                                                        'value' => ( !empty($data['detail_content']) )? $data['detail_content'] : ''
                                                    ])}} --}}


                                                    {{-- {{ItemMaker::colorPicker([
                                                        'labelText' => '按鈕文字顏色',
                                                        'inputName' => 'InvestorFinancial[btn_txt_color]',
                                                        'helpText' =>'顯示於首頁',
                                                        'value' => ( !empty($data['btn_txt_color']) )? $data['btn_txt_color'] : ''
                                                    ])}} --}}

                                                    {{-- {{ItemMaker::textInput([
                                                        'labelText' => '按鈕標題',
                                                        'inputName' => 'InvestorFinancial[btn_title]',
                                                        'value' => ( !empty($data['btn_title']) )? $data['btn_title'] : ''
                                                    ])}} --}}





                                                </div>
                                            </div>




                                            {{-- <div class="tab-pane form-row-seperated" id="tab_seo">
                                                <div class="form-body form_news_pad">

                                                    {{ItemMaker::textInput([
                                                        'labelText' => '網頁標題',
                                                        'inputName' => 'InvestorFinancial[web_title]',
                                                        'helpText' => '10~70字以內',
                                                        'value' => ( !empty($data['web_title']) )? $data['web_title'] : ''
                                                    ])}}

                                                    {{ItemMaker::textInput([
                                                        'labelText' => 'Meta關鍵字',
                                                        'inputName' => 'InvestorFinancial[meta_keyword]',
                                                        'helpText' => '限制100字以內',
                                                        'value' => ( !empty($data['meta_keyword']) )? $data['meta_keyword'] : ''
                                                    ])}}

                                                    {{ItemMaker::textInput([
                                                        'labelText' => 'Meta描述',
                                                        'inputName' => 'InvestorFinancial[meta_description]',
                                                        'helpText' => '限制150字以內',
                                                        'value' => ( !empty($data['meta_description']) )? $data['meta_description'] : ''
                                                    ])}}


                                                    {{ItemMaker::textInput([
                                                        'labelText' => 'GA碼',
                                                        'inputName' => 'InvestorFinancial[ga_code]',
                                                        'helpText' => '只需填入代碼，不需要填入整段程式碼。',
                                                        'value' => ( !empty($data['ga_code']) )? $data['ga_code'] : ''
                                                    ])}}


                                                    {{ItemMaker::textInput([
                                                        'labelText' => 'GTM碼',
                                                        'inputName' => 'InvestorFinancial[gtm_code]',
                                                        'helpText' => '只需填入代碼，不需要填入整段程式碼。',
                                                        'value' => ( !empty($data['gtm_code']) )? $data['gtm_code'] : ''
                                                    ])}}


                                                </div>
                                            </div> --}}

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
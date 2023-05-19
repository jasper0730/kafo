@extends('Fantasy.template')

@section('title', "產品項目修改"."-".$ProjectName)
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
            產品項目 <small>Product Category Manager</small> </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="{{ ItemMaker::url('Fantasy/')}}">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="{{ ItemMaker::url('Fantasy/'.$routePreFix)}}">產品項目</a> <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    產品項目修改 </li>
            </ul>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        
            <div class="row">
                <div class="col-md-12">

                    {!! Form::open( ["url" => ''.$actionUrl.'', 'method'=> 'POST', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'target' => '' ] ) !!}

                            <div class="portlet light portlet-fit portlet-datatable">
                                <div class="portlet-title portlet-title2">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">
                                            {{ ( !empty( $data['title'] ) )? $data['title'] : '' }} - 產品項目 </span>
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
                                            <li >
                                                <a href="#tab_photos" data-toggle="tab"> 產品展示圖 </a>
                                            </li>
                                            <li >
                                                <a href="#tab_file" data-toggle="tab"> 檔案下載 </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active form-row-seperated" id="tab_general">
                                                <div class="form-body form_news_pad">

                                                    {{ItemMaker::idInput([
                                                        'inputName' => 'ProductSeries[id]',
                                                        'value' => ( !empty($data['id']) )? $data['id'] : ''
                                                    ])}}

                                                    {{ItemMaker::radio_btn([
                                                        'labelText' => '是否顯示',
                                                        'inputName' => 'ProductSeries[is_visible]',
                                                        'helpText' =>'是否顯示。',
                                                        'options' => $StatusOption,
                                                        'value' => ( !empty($data['is_visible']) )? $data['is_visible'] : ''
                                                    ])}}

                                                    {{ItemMaker::radio_btn([
                                                        'labelText' => '是否顯示首頁',
                                                        'inputName' => 'ProductSeries[is_show_home]',
                                                        'helpText' =>'是否顯示於首頁。',
                                                        'options' => $StatusOption,
                                                        'value' => ( !empty($data['is_show_home']) )? $data['is_show_home'] : ''
                                                    ])}}

                                                    {{ItemMaker::select([
                                                        'labelText' => '所屬群組',
                                                        'inputName' => 'ProductSeries[category_id]',
                                                        'required'  => true,
                                                        'options'   => $parent['belong']['ProductCategory'],
                                                        'value' => ( !empty($data['category_id']) )? $data['category_id'] : ''
                                                    ])}} 

                                                    {{ItemMaker::textInput([
                                                        'labelText' => '排序',
                                                        'inputName' => 'ProductSeries[rank]',
                                                        'helpText' =>'前台列表顯示之排序',
                                                        'value' => ( !empty($data['rank']) )? $data['rank'] : ''
                                                    ])}}

                                                    {{ItemMaker::textInput([
                                                        'labelText' => '標題',
                                                        'inputName' => 'ProductSeries[title]',
                                                        'value' => ( !empty($data['title']) )? $data['title'] : ''
                                                    ])}}
                                                    
                                                    {{ItemMaker::textInput([
                                                        'labelText' => '副標題',
                                                        'inputName' => 'ProductSeries[sub_title]',
                                                        'value' => ( !empty($data['sub_title']) )? $data['sub_title'] : ''
                                                    ])}}

                                                    {{ItemMaker::textarea([
                                                        'labelText' => '完整敘述',
                                                        'inputName' => 'ProductSeries[brief]',
                                                        'helpText' => '150字以內',
                                                        'value' => ( !empty($data['brief']) )? $data['brief'] : ''
                                                    ])}}

                                                    {{ItemMaker::textarea([
                                                        'labelText' => '系列短敘',
                                                        'inputName' => 'ProductSeries[brief_short]',
                                                        'helpText' => '150字以內',
                                                        'value' => ( !empty($data['brief_short']) )? $data['brief_short'] : ''
                                                    ])}}

                                                    {{ItemMaker::editor([
                                                        'labelText' => '系列特點',
                                                        'inputName' => 'ProductSeries[summary]',
                                                        'helpText' => '150字以內',
                                                        'value' => ( !empty($data['summary']) )? $data['summary'] : ''
                                                    ])}}


                                                    {{ItemMaker::photo([
                                                        'labelText' => 'feature 小圖',
                                                        'inputName' => 'ProductSeries[icon]',
                                                        'value' => ( !empty($data['icon']) )? $data['icon'] : ''
                                                    ])}}

                                                    {{-- <br><br><br><br> --}}

                                                    {{ItemMaker::photo([
                                                        'labelText' => '產品圖(電腦)',
                                                        'inputName' => 'ProductSeries[image_pc]',
                                                        'value' => ( !empty($data['image_pc']) )? $data['image_pc'] : ''
                                                    ])}}


                                                    {{ItemMaker::photo([
                                                        'labelText' => '產品圖(手機)',
                                                        'inputName' => 'ProductSeries[image_mobile]',
                                                        'value' => ( !empty($data['image_mobile']) )? $data['image_mobile'] : ''
                                                    ])}}

                                                    {{ItemMaker::selectMulti([
                                                        'labelText' => '技術項目',
                                                        'inputName' => 'ProductSeries[tech_id][]',
                                                        'required'  => true,
                                                        'options'   => $alltech,
                                                        'value' => ( !empty($data['tech_id']) )? $data['tech_id'] : ''
                                                    ])}}

                                                    {{ItemMaker::selectMulti([
                                                        'labelText' => '規格表頭',
                                                        'inputName' => 'ProductSeries[spec_id][]',
                                                        'required'  => true,
                                                        'options'   => $allspec,
                                                        'value' => ( !empty($data['spec_id']) )? $data['spec_id'] : ''
                                                    ])}}
                                                    {{ItemMaker::textInput([
                                                        'labelText' => '規格注意事項',
                                                        'inputName' => 'ProductSeries[spec_detail]',
                                                        'value' => ( !empty($data['spec_detail']) )? $data['spec_detail'] : ''
                                                    ])}}

                                                    {{ItemMaker::selectMulti([
                                                        'labelText' => '展示影片',
                                                        'inputName' => 'ProductSeries[video_id][]',
                                                        'required'  => true,
                                                        'options'   => $allvideo,
                                                        'value' => ( !empty($data['video_id']) )? $data['video_id'] : ''
                                                    ])}}

                                                </div>
                                            </div>

                                            {{-- 產品展示圖 --}}
                                            <div class="tab-pane form_news_pad" id="tab_photos">
                                                {{ FormMaker::photosTable(
                                                    [
                                                        'nameGroup' => $routePreFix.'-SeriesPhoto',
                                                        'datas' => ( !empty($parent['has']['SeriesPhoto']) )? $parent['has']['SeriesPhoto'] : [],
                                                        'table_set' => $bulidTable['SeriesPhoto'],
                                                        'pic' => true
                                                    ]
                                                 ) }}

                                            </div>

                                            {{-- 檔下載設定 --}}
                                            <div class="form-body form_news_pad" id="tab_file">

                                                    {{ItemMaker::filePicker([
                                                        'labelText' => '配件檔案上傳',
                                                        'inputName' => 'ProductSeries[accessory_file]',
                                                        'helpText' =>'前台列表顯示之排序',
                                                        'value' => ( !empty($data['accessory_file']) )? $data['accessory_file'] : ''
                                                    ])}}
                                                   
                                                    {{ItemMaker::select([
                                                        'labelText' => '選擇型錄檔案',
                                                        'inputName' => 'ProductSeries[catelog_file]',
                                                        'options'   => $parent['belong']['file'],
                                                        'value' => ( !empty($data['catelog_file']) )? $data['catelog_file'] : ''
                                                    ])}} 

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

            /*多選後不要自度排序*/
            $("select").on("select2:select", function (evt) {
              var element = evt.params.data.element;
              var $element = $(element);
              
              $element.detach();
              $(this).append($element);
              $(this).trigger("change");
            });
        });

    </script>
@stop


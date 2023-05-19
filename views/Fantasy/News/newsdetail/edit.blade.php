@extends('Fantasy.template')

@section('title',"文章管理頁面管理頁面修改 "."-".$ProjectName)
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
			文章管理頁面 <small>News Manager</small> </h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="{{ ItemMaker::url('Fantasy/')}}">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="{{ ItemMaker::url('Fantasy/'.$routePreFix)}}">文章管理頁面</a> <i class="fa fa-angle-right"></i>
				</li>
				<li>
					文章管理頁面修改 </li>
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
											{{ ( !empty( $data['title'] ) )? $data['title'] : '' }} - 文章管理頁面 </span>
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
                                                <a href="#tab_photos" data-toggle="tab"> 多圖設定 </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active form-row-seperated" id="tab_general">
                                                <div class="form-body form_news_pad">

													{{ItemMaker::idInput([
														"inputName" => "newsdetail[id]",
														"value" => ( !empty($data["id"]) )? $data["id"] : ""
													])}}
													{{ItemMaker::radio_btn([
														"labelText" => "是否啟用",
														"inputName" => "newsdetail[is_visible]",
														"helpText" =>"是否啟用",
														"options" => $StatusOption,
														"value" => ( !empty($data["is_visible"]) )? $data["is_visible"] : ""
													])}}
													{{ItemMaker::radio_btn([
														"labelText" => "是否顯示於首頁",
														"inputName" => "newsdetail[is_show_home]",
														"helpText" =>"是否顯示於首頁",
														"options" => $StatusOption,
														"value" => ( !empty($data["is_show_home"]) )? $data["is_show_home"] : ""
													])}}
													{{ItemMaker::select([
                                                        'labelText' => '所屬群組',
                                                        'inputName' => 'newsdetail[category_id]',
                                                        'required'  => true,
                                                        'options'   => $parent['belong']['newscategory'],
                                                        'value' => ( !empty($data['category_id']) )? $data['category_id'] : ''
                                                    ])}}
                                                    {{ItemMaker::textInput([
														"labelText" => "排序",
														"inputName" => "newsdetail[rank]",
														"value" => ( !empty($data["rank"]) )? $data["rank"] : ""
													])}}
													{{ItemMaker::textInput([
														"labelText" => "標題",
														"inputName" => "newsdetail[title]",
														"value" => ( !empty($data["title"]) )? $data["title"] : ""
													])}}
													{{ItemMaker::textInput([
														"labelText" => "副標題",
														"inputName" => "newsdetail[subtitle]",
														"value" => ( !empty($data["subtitle"]) )? $data["subtitle"] : ""
													])}}
													{{ItemMaker::textInput([
														"labelText" => "上傳日期",
														"inputName" => "newsdetail[publish_date]",
														"value" => ( !empty($data["publish_date"]) )? $data["publish_date"] : ""
													])}}
													{{ItemMaker::textInput([
														"labelText" => "期間",
														"inputName" => "newsdetail[during]",
														"value" => ( !empty($data["during"]) )? $data["during"] : ""
													])}}
													{{ItemMaker::textInput([
														"labelText" => "地點",
														"inputName" => "newsdetail[location]",
														"value" => ( !empty($data["location"]) )? $data["location"] : ""
													])}}
													{{ItemMaker::textInput([
														"labelText" => "展位",
														"inputName" => "newsdetail[booth]",
														"value" => ( !empty($data["booth"]) )? $data["booth"] : ""
													])}}
													
													{{ItemMaker::editor([
														"labelText" => "文章",
														"inputName" => "newsdetail[article]",
														"value" => ( !empty($data["article"]) )? $data["article"] : ""
													])}}

													{{ItemMaker::textarea([
														"labelText" => "外頁文章短述",
														"inputName" => "newsdetail[article_short]",
														"value" => ( !empty($data["article_short"]) )? $data["article_short"] : ""
													])}}

													{{ItemMaker::photo([
														"labelText" => "外頁小圖",
														"inputName" => "newsdetail[image_small]",
														"value" => ( !empty($data["image_small"]) )? $data["image_small"] : ""
													])}}
													{{ItemMaker::textInput([
														"labelText" => "外連網址",
														"inputName" => "newsdetail[website]",
														"value" => ( !empty($data["website"]) )? $data["website"] : ""
													])}}
													{{ItemMaker::textInput([
														"labelText" => "外連網址標題",
														"inputName" => "newsdetail[website_title]",
														"value" => ( !empty($data["website_title"]) )? $data["website_title"] : ""
													])}}

                                                </div>
                                            </div>

                                            {{-- 產品多圖 --}}
                                            <div class="tab-pane form_news_pad" id="tab_photos">
                                                {{ FormMaker::photosTable(
                                                    [
                                                        'nameGroup' => $routePreFix.'-newsdetailphoto',
                                                        'datas' => ( !empty($parent['has']['newsdetailphoto']) )? $parent['has']['newsdetailphoto'] : [],
                                                        'table_set' => $bulidTable['newsdetailphoto'],
                                                    ]
                                                ) }}

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


@extends('Fantasy.template')

@section('title',"影片管理頁面管理頁面修改 "."-".$ProjectName)
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
			影片管理頁面 <small>Video Manager</small> </h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="{{ ItemMaker::url('Fantasy/')}}">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="{{ ItemMaker::url('Fantasy/'.$routePreFix)}}">影片管理頁面</a> <i class="fa fa-angle-right"></i>
				</li>
				<li>
					影片管理頁面修改 </li>
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
											{{ ( !empty( $data['title'] ) )? $data['title'] : '' }} - 影片管理頁面 </span>
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

                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active form-row-seperated" id="tab_general">
                                                <div class="form-body form_news_pad">

													{{ItemMaker::idInput([
														"inputName" => "video[id]",
														"value" => ( !empty($data["id"]) )? $data["id"] : ""
													])}}
													{{ItemMaker::textInput([
														"labelText" => "排序",
														"inputName" => "video[rank]",
														"value" => ( !empty($data["rank"]) )? $data["rank"] : ""
													])}}
													{{ItemMaker::select([
                                                        "labelText" => "所屬分類",
                                                        "inputName" => "video[type]",
                                                        "options"   => $parent["belong"]["videoCategory"],
                                                        "value" => ( !empty($data["type"]) )? $data["type"] : ""
                                                    ])}}
													{{ItemMaker::radio_btn([
														"labelText" => "是否啟用",
														"inputName" => "video[is_visible]",
														"helpText" =>"是否啟用該權限",
														"options" => $StatusOption,
														"value" => ( !empty($data["is_visible"]) )? $data["is_visible"] : ""
													])}}
													{{ItemMaker::radio_btn([
														"labelText" => "是否置頂",
														"inputName" => "video[is_top]",
														"helpText" =>"是否置頂",
														"options" => $StatusOption,
														"value" => ( !empty($data["is_top"]) )? $data["is_top"] : ""
													])}}
													{{ItemMaker::textInput([
														"labelText" => "標題",
														"inputName" => "video[title]",
                                                        "helpText" =>"使用者姓名",
														"value" => ( !empty($data["title"]) )? $data["title"] : ""
													])}}
													{{ItemMaker::photo([
														"labelText" => "電腦圖示",
														"inputName" => "video[image_pc]",
														"value" => ( !empty($data["image_pc"]) )? $data["image_pc"] : ""
													])}}
													{{-- {{ItemMaker::photo([
														"labelText" => "手機圖示",
														"inputName" => "video[image_mobile]",
                                                        "helpText" =>"使用者姓名",
														"value" => ( !empty($data["image_mobile"]) )? $data["image_mobile"] : ""
													])}} --}}
													{{ItemMaker::textInput([
														"labelText" => "youtube分享碼",
														"inputName" => "video[link]",
														"value" => ( !empty($data["link"]) )? $data["link"] : ""
													])}}
													{{ItemMaker::textarea([
														"labelText" => "影片敘述",
														"inputName" => "video[brief]",
														"value" => ( !empty($data["brief"]) )? $data["brief"] : ""
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


@extends('Fantasy.template')

@section('title',"support管理頁面管理頁面修改 "."-".$ProjectName)
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
			support管理頁面 <small>News Manager</small> </h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="{{ ItemMaker::url('Fantasy/')}}">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="{{ ItemMaker::url('Fantasy/'.$routePreFix)}}">support管理頁面</a> <i class="fa fa-angle-right"></i>
				</li>
				<li>
					support管理頁面修改 </li>
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
											{{ ( !empty( $data['title'] ) )? $data['title'] : '' }} - support管理頁面 </span>
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
														"inputName" => "support[id]",
														"value" => ( !empty($data["id"]) )? $data["id"] : ""
													])}}
													{{ItemMaker::radio_btn([
														"labelText" => "是否啟用",
														"inputName" => "support[is_visible]",
														"helpText" =>"是否啟用",
														"options" => $StatusOption,
														"value" => ( !empty($data["is_visible"]) )? $data["is_visible"] : ""
													])}}
													{{ItemMaker::textInput([
														'labelText' => '小標題',
														"inputName" => "support[small_title]",
														"value" => ( !empty($data["small_title"]) )? $data["small_title"] : ""
													])}}
													{{ItemMaker::textInput([
														'labelText' => '影片區塊標題',
														"inputName" => "support[video_title]",
														"value" => ( !empty($data["video_title"]) )? $data["video_title"] : ""
													])}}
													{{ItemMaker::textarea([
														'labelText' => '影片區塊敘述',
														"inputName" => "support[video_brief]",
														"value" => ( !empty($data["video_brief"]) )? $data["video_brief"] : ""
													])}}
													{{ItemMaker::photo([
														'labelText' => '影片區塊圖片',
														"inputName" => "support[video_image]",
														"value" => ( !empty($data["video_image"]) )? $data["video_image"] : ""
													])}}
													{{ItemMaker::textInput([
														'labelText' => '影片內頁標題',
														"inputName" => "support[video_inner_title]",
														"value" => ( !empty($data["video_inner_title"]) )? $data["video_inner_title"] : ""
													])}}
													{{ItemMaker::textInput([
														'labelText' => '影片內頁短述',
														"inputName" => "support[video_inner_brief]",
														"value" => ( !empty($data["video_inner_brief"]) )? $data["video_inner_brief"] : ""
													])}}
													<hr>
													<hr>
													{{ItemMaker::textInput([
														'labelText' => '檔案區塊title',
														"inputName" => "support[file_title]",
														"value" => ( !empty($data["file_title"]) )? $data["file_title"] : ""
													])}}
													{{ItemMaker::textarea([
														'labelText' => '檔案區塊敘述',
														"inputName" => "support[file_brief]",
														"value" => ( !empty($data["file_brief"]) )? $data["file_brief"] : ""
													])}}
													{{ItemMaker::textInput([
														'labelText' => '檔案區塊內頁標題',
														"inputName" => "support[file_inner_title]",
														"value" => ( !empty($data["file_inner_title"]) )? $data["file_inner_title"] : ""
													])}}
													{{ItemMaker::textInput([
														'labelText' => '檔案區塊內頁短述',
														"inputName" => "support[file_inner_brief]",
														"value" => ( !empty($data["file_inner_brief"]) )? $data["file_inner_brief"] : ""
													])}}
													<hr>
													<hr>
													{{ItemMaker::textInput([
														'labelText' => 'FAQ區標題',
														"inputName" => "support[bottom_title]",
														"value" => ( !empty($data["bottom_title"]) )? $data["bottom_title"] : ""
													])}}
													{{ItemMaker::textarea([
														'labelText' => 'FAQ區敘述',
														"inputName" => "support[bottom_brief]",
														"value" => ( !empty($data["bottom_brief"]) )? $data["bottom_brief"] : ""
													])}}
													{{ItemMaker::textInput([
														'labelText' => 'FAQ區內頁標題',
														"inputName" => "support[faq_inner_title]",
														"value" => ( !empty($data["faq_inner_title"]) )? $data["faq_inner_title"] : ""
													])}}
													{{ItemMaker::textInput([
														'labelText' => 'FAQ區內頁短述',
														"inputName" => "support[faq_inner_brief]",
														"value" => ( !empty($data["faq_inner_brief"]) )? $data["faq_inner_brief"] : ""
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


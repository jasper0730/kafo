<?php
	use App\Http\Models\SupportFile\SupportFileSubcate;
	use Illuminate\Support\Str;
?>
@extends('Fantasy.template')

@section('title',"檔案管理頁面管理頁面修改 "."-".$ProjectName)
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
			檔案管理頁面 <small>News Manager</small> </h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="{{ ItemMaker::url('Fantasy/')}}">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="{{ ItemMaker::url('Fantasy/'.$routePreFix)}}">檔案管理頁面</a> <i class="fa fa-angle-right"></i>
				</li>
				<li>
					檔案管理頁面修改 </li>
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
											{{ ( !empty( $data['title'] ) )? $data['title'] : '' }} - 檔案管理頁面 </span>
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
														"inputName" => "SupportFile[id]",
														"value" => ( !empty($data["id"]) )? $data["id"] : ""
													])}}
													{{ItemMaker::textInput([
														"labelText" => "排序",
														"inputName" => "SupportFile[rank]",
														"value" => ( !empty($data["rank"]) )? $data["rank"] : ""
													])}}
													{{ItemMaker::radio_btn([
														"labelText" => "是否啟用",
														"inputName" => "SupportFile[is_visible]",
														"helpText" =>"是否啟用該權限",
														"options" => $StatusOption,
														"value" => ( !empty($data["is_visible"]) )? $data["is_visible"] : ""
													])}}
													{{ItemMaker::textInput([
														"labelText" => "標題",
														"inputName" => "SupportFile[title]",
                                                        "helpText" =>"類別名稱",
														"value" => ( !empty($data["title"]) )? $data["title"] : ""
													])}}
                                                    {{ItemMaker::select([
                                                        'labelText' => '所屬類別 > 所屬型號',
                                                        'inputName' => 'SupportFile[parent_id]',
                                                        'required'  => true,
                                                        'options'   => SupportFileSubcate::subcateList()->toArray(),
                                                        'value' => ( !empty($data['parent_id']) )? $data['parent_id'] : ''
                                                    ])}} 
                                                    {{ItemMaker::filePicker([
                                                        'labelText' => '檔案上傳',
                                                        'inputName' => 'SupportFile[file]',
                                                        'helpText' =>'',
                                                        'value' => ( !empty($data['file']) )? $data['file'] : ''
                                                    ])}}
													{{-- 若為空就塞入10位數隨機字串 --}}
													<?php
														$temp_str = strtolower(Str::random(10));
														// dd(( isset($data["url_name"])&&!empty($data["url_name"]) ));
													?>
													{{ItemMaker::textInput([
														"labelText" => "下載連結",
														"inputName" => "SupportFile[url_name]",
                                                        "helpText" =>"預設以隨機亂數填入",
														"value" => ( isset($data["url_name"])&&!empty($data["url_name"]) )? $data["url_name"] : $temp_str
													])}}
													<div style="margin-left: 150px;">
														<br>
														<p>
															進入下列網址可直接下載此檔案(若未登入會要求先登入)，若是無瀏覽權限會被導向至上一個可進入的頁面。(若當前有修改內容下方網址需重新整理才會更新)<br>
															{{ ItemMaker::url('support/download/'.(isset($data["url_name"])&&!empty($data["url_name"])?$data["url_name"]:$temp_str)) }}
														</p>
													</div>
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


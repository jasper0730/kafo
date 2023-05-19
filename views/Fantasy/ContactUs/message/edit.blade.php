@extends('Fantasy.template')

@section('title',"聯絡我們訊息管理頁面管理頁面修改 "."-".$ProjectName)
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
			聯絡我們訊息管理頁面 <small>News Manager</small> </h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="{{ ItemMaker::url('Fantasy/')}}">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="{{ ItemMaker::url('Fantasy/'.$routePreFix)}}">聯絡我們訊息管理頁面</a> <i class="fa fa-angle-right"></i>
				</li>
				<li>
					聯絡我們訊息管理頁面修改 </li>
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
											{{ ( !empty( $data['title'] ) )? $data['title'] : '' }} - 聯絡我們訊息管理頁面 </span>
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
														"inputName" => "message[id]",
														"value" => ( !empty($data["id"]) )? $data["id"] : ""
													])}}
													{{ItemMaker::radio_btn([
														"labelText" => "是否啟用",
														"inputName" => "message[is_visible]",
														"helpText" =>"是否啟用",
														"options" => $StatusOption,
														"value" => ( !empty($data["is_visible"]) )? $data["is_visible"] : ""
													])}}
													{{ItemMaker::textInput([
														"labelText" => "姓名",
														"inputName" => "message[name]",
														"value" => ( !empty($data["name"]) )? $data["name"] : ""
													])}}
													{{ItemMaker::textInput([
														"labelText" => "公司名稱",
														"inputName" => "message[company]",
														"value" => ( !empty($data["company"]) )? $data["company"] : ""
													])}}
													{{ItemMaker::textInput([
														"labelText" => "電話",
														"inputName" => "message[phone]",
														"value" => ( !empty($data["phone"]) )? $data["phone"] : ""
													])}}
													{{ItemMaker::textInput([
														"labelText" => "傳真",
														"inputName" => "message[fax]",
														"value" => ( !empty($data["fax"]) )? $data["fax"] : ""
													])}}
													{{ItemMaker::textInput([
														"labelText" => "地址",
														"inputName" => "message[address]",
														"value" => ( !empty($data["address"]) )? $data["address"] : ""
													])}}
													{{ItemMaker::textInput([
														"labelText" => "信箱",
														"inputName" => "message[email]",
														"value" => ( !empty($data["email"]) )? $data["email"] : ""
													])}}
													{{ItemMaker::textInput([
														"labelText" => "處理業務",
														"inputName" => "message[subject]",
														"value" => ( !empty($data["subject"]) )? $data["subject"] : ""
													])}}
													{{ItemMaker::textarea([
														"labelText" => "留言",
														"inputName" => "message[comments]",
														"value" => ( !empty($data["comments"]) )? $data["comments"] : ""
													])}}
													{{ItemMaker::textInput([
														"labelText" => "收信日期",
														"inputName" => "message[created_at]",
														"value" => ( !empty($data["created_at"]) )? $data["created_at"] : "",
														"disabled" => "disabled",
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


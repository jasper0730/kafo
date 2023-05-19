@extends('Fantasy.template')

@section('title',"檔案分類管理頁面管理頁面修改 "."-".$ProjectName)
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
			股東會名單頁面設定 <small>ShareHolder page Manager</small> </h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="{{ ItemMaker::url('Fantasy/')}}">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="{{ ItemMaker::url('Fantasy/'.$routePreFix)}}">股東會名單頁面設定</a> <i class="fa fa-angle-right"></i>
				</li>
				<li>
					股東會名單頁面設定修改 </li>
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
											{{ ( !empty( $data['title'] ) )? $data['title'] : '' }} - 股東會名單頁面 </span>
                                    </div>
                                    <div class="actions btn-set">

                                    <a href=" {{ ItemMaker::url('Fantasy/Board/shareholder_list') }}" type="button" name="back" class="btn default btn-secondary-outline btn-circle tooltips" data-rel="fancybox-button" data-container="body" data-placement="top" data-original-title="返回"> <i class="fa fa-mail-reply"></i> 返回
									</a>

									<button type="submit"  class="btn btn-lg green btn-circle tooltips" data-rel="fancybox-button" data-container="body" data-placement="top" data-original-title="儲存">
									    <i class="fa fa-check"></i> 儲存
									</button>

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
														"inputName" => "shareholder_page[id]",
														"value" => ( !empty($data["id"]) )? $data["id"] : ""
													])}}
													
													{{ItemMaker::textInput([
														"labelText" => "表格標題",
														"inputName" => "shareholder_page[title]",
														"value" => ( !empty($data["title"]) )? $data["title"] : ""
													])}}
													{{ItemMaker::textInput([
														"labelText" => "表格副標題",
														"inputName" => "shareholder_page[subtitle]",
														"value" => ( !empty($data["subtitle"]) )? $data["subtitle"] : ""
													])}}
													{{ItemMaker::textInput([
														"labelText" => "每股面額",
														"inputName" => "shareholder_page[perstack]",
														"value" => ( !empty($data["perstack"]) )? $data["perstack"] : ""
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


@extends('Fantasy.template')

@section('title',"網站基本設定修改 "."-".$ProjectName)

@section('css')

    <link rel="stylesheet" href="vendor/Fantasy/plugins/colorbox/colorbox.css" />
@stop

@section('content')

<!--fancybox for File Manager-->
<a href="" id="toFileManager"></a>

		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
			網站設定 <small>Setting Manager</small>
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="{{ ItemMaker::url('Fantasy/')}}">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="{{ ItemMaker::url('Fantasy/網站設定')}}">網站設定</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					網站設定修改
				</li>
			</ul>
		</div>
		<!-- END PAGE HEADER-->
		<!-- BEGIN PAGE CONTENT-->


			<div class="row">
				<div class="col-md-12">

					{!! Form::open( ["url" => ItemMaker::url('Fantasy/網站設定/update'), 'method'=> 'POST', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'target' => '' ] ) !!}

                            <div class="portlet light portlet-fit portlet-datatable">
                                <div class="portlet-title portlet-title2">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">
											網站設定
										</span>
                                    </div>
                                    <div class="actions btn-set">
 										<a href=" {{ ItemMaker::url('Fantasy/網站設定/') }}" type="button" name="back" class="btn default btn-secondary-outline btn-circle tooltips" data-rel="fancybox-button" data-container="body" data-placement="top" data-original-title="返回">
                                            <i class="fa fa-mail-reply"></i> 返回
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
                                                <a href="#tab_general" data-toggle="tab"> 網站設定 </a>
                                            </li>

                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active form-row-seperated" id="tab_general">
                                                <div class="form-body form_news_pad">

													{{ItemMaker::textarea([
														'labelText' => '電子信箱',
														'inputName' => 'webset[email]',
														'helpText' =>'透過逗點 , 分開多個信箱',
														'value' => ( !empty($data['email']) )? $data['email'] : ''
													])}}
													{{ItemMaker::textinput([
														'labelText' => '分享標題',
														'inputName' => 'webset[shareTitle]',
														'value' => ( !empty($data['shareTitle']) )? $data['shareTitle'] : ''
													])}}
													{{ItemMaker::photo([
														'labelText' => '分享圖片',
														'inputName' => 'webset[shareTitleImage]',
														'value' => ( !empty($data['shareTitleImage']) )? $data['shareTitleImage'] : ''
													])}}
													{{ItemMaker::textarea([
														'labelText' => '分享敘述',
														'inputName' => 'webset[shareTitleBrief]',
														'value' => ( !empty($data['shareTitleBrief']) )? $data['shareTitleBrief'] : ''
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

<script src="vendor/Fantasy/plugins/colorbox/jquery.colorbox.js" type="text/javascript"></script>


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

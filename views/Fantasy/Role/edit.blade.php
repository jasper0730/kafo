@extends('Fantasy.template')

@section('title',"權限修改 "."-".$ProjectName)

@section('css')

    <link rel="stylesheet" href="vendor/Fantasy/plugins/colorbox/colorbox.css" />

@stop

@section('content')

<!--fancybox for File Manager-->
<a href="" id="toFileManager"></a>

		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
			權限管理 <small>News Manager</small>
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="{{ ItemMaker::url('Fantasy/')}}">Home</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="{{ ItemMaker::url('Fantasy/帳號管理/權限')}}">權限管理</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					權限修改
				</li>
			</ul>
		</div>
		<!-- END PAGE HEADER-->
		<!-- BEGIN PAGE CONTENT-->


			<div class="row">
				<div class="col-md-12">

                    <!--注意事項-->
                    {{-- <div class="note note-danger">
                        <p> 注意事項: The below datatable is not connected to a real database so the filter and sorting is just simulated for demo purposes only. </p>
                    </div> --}}
                    <!--注意事項END-->

					<!--<form action="{{ ItemMaker::url('Fantasy/帳號管理/權限/Update')}}" method="POST" class="form-horizontal" enctype="multipart/form-data" target="hidFrame">-->
					{!! Form::open( ["url" => ''.$actionUrl.'', 'method'=> 'POST', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'target' => '' ] ) !!}

                            <div class="portlet light portlet-fit portlet-datatable">
                                <div class="portlet-title portlet-title2">
                                    <div class="caption">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">
											{{ ( !empty( $data['title'] ) )? $data['title'] : '' }} - 權限管理
										</span>
                                    </div>
                                    <div class="actions btn-set">
 										<a href=" {{ ItemMaker::url('Fantasy/帳號管理/權限/') }}" type="button" name="back" class="btn default btn-secondary-outline btn-circle tooltips" data-rel="fancybox-button" data-container="body" data-placement="top" data-original-title="返回">
                                            <i class="fa fa-mail-reply"></i> 返回
                                        </a>

                                        <button type="submit"  class="btn btn-lg green btn-circle tooltips" data-rel="fancybox-button" data-container="body" data-placement="top" data-original-title="儲存">
                                            <i class="fa fa-check"></i> 儲存
                                        </button>
                                        <a href="#" class="btn btn-lg green btn-circle tooltips" data-rel="fancybox-button" data-container="body" data-placement="top" data-original-title="刪除">
                                            <i class="fa fa-external-link"></i> 刪除
                                        </a>

                                        <div class="btn-group">
                                            <a class="btn dark btn-outline btn-circle tooltips" href="javascript:;" data-toggle="dropdown" aria-expanded="false" data-rel="fancybox-button" data-container="body" data-placement="top" data-original-title="進階功能">
                                                <i class="fa fa-cog"></i>
                                                <span class="hidden-xs"> 進階功能 </span>
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;"> Export to Excel </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> Export to CSV </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> Export to XML </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;"> Print Invoices </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- <button class="btn btn-success">
                                            <i class="fa fa-check-circle"></i> Save & Continue Edit</button> -->
                                        <!-- <div class="btn-group">
                                            <a class="btn btn-success dropdown-toggle" href="javascript:;" data-toggle="dropdown">
                                                <i class="fa fa-share"></i> More
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <div class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;"> Duplicate </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> Delete </a>
                                                </li>
                                                <li class="dropdown-divider"> </li>
                                                <li>
                                                    <a href="javascript:;"> Print </a>
                                                </li>
                                            </div>
                                        </div> -->
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
														'inputName' => 'Role[id]',
														'value' => ( !empty($data['id']) )? $data['id'] : ''
													])}}

													{{ItemMaker::radio_btn([
														'labelText' => '是否啟用',
														'inputName' => 'Role[is_visible]',
														'helpText' =>'是否啟用該權限',
														'options' => $StatusOption,
														'value' => ( !empty($data['is_visible']) )? $data['is_visible'] : ''
													])}}

													{{ItemMaker::textInput([
														'labelText' => '標題',
														'inputName' => 'Role[title]',
                                                        'helpText' =>'使用者姓名',
														'value' => ( !empty($data['title']) )? $data['title'] : ''
													])}}

                                                    {{ItemMaker::selectMulti([
														'labelText' => '權限',
														'inputName' => 'Role[permission][]',
                                                        'helpText' =>'使用者帳號與聯絡用信箱',
                                                        "options" => $MenuLinks,
                                                        "type" => "Role",
														'value' => ( !empty($data['permission']) )? $data['permission'] : ''
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
